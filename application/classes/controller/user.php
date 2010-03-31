<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template
{
  // Auth instance
  public $auth;
  
  public function before()
  {
    parent::before();
    
    // Retrieve the auth instance
    $this->auth = Auth::instance();
  }
  
  public function action_index()
  {
    // Set template title
    $this->template->title = 'Index';
    
    // Display the 'index' template
    $this->template->content = View::factory('user/index')
      // $user will be `FALSE` if not logged in
      ->set('user', $this->auth->get_user())
      ->set('logged_in', $this->auth->logged_in());
  }
  
  public function action_login()
  {
    // Check if the form was submitted
    if ($_POST)
    {
      // See if user checked 'Stay logged in'
      $remember = isset($_POST['remember']) ? TRUE : FALSE;
      
      // Try to log the user in
      $this->auth->login($_POST['username'], $_POST['password'], $remember);
      
      // Redirect to the index page if the user was logged in successfully
      if ($this->auth->logged_in())
      {
        $this->request->redirect(Route::get('user')->uri(array('action' => 'index')));
      }
    }

    // Set template title
    $this->template->title = 'Login';
    
    // Display the 'login' template
    $this->template->content = View::factory('user/login');
  }
  
  public function action_logout()
  {
    // Log the user out
    $this->auth->logout();
    
    // Redirect to the index page
    $this->request->redirect(Route::get('user')->uri(array('action' => 'index')));
  }

  public function action_register()
  {
    // There are no errors by default
    $errors = FALSE;
    
    // Create an instance of Model_Auth_User
    $user = Jelly::factory('user');
    
    // Check if the form was submitted
    if ($_POST)
    {
      /**
       * Load the $_POST values into our model.
       * 
       * We use Arr::extract() and specify the fields to add
       * by hand so that a malicious user can't do (for example)
       * `$_POST['roles'][] = 1;` and make themselves an administrator.
       */
      $user->set(Arr::extract($_POST, array(
          'email', 'username', 'password', 'password_confirm'
      )));
      
      // Add the 'login' role to the user model
      $user->add('roles', 1);
      
      try
      {
        // Try to save our user model
        $user->save();
        
        // Redirect to the index page
        $this->request->redirect(Route::get('user')->uri(array('action' => 'index')));
      }
      // There were errors saving our user model
      catch (Validate_Exception $e)
      {
        // Load custom error messages from `messages/forms/user/register.php`
        $errors = $e->array->errors('forms/user/register');
      }
    }
    
    // Set template title
    $this->template->title = 'Register';

    // Display the 'register' template
    $this->template->content = View::factory('user/register')
      ->set('user', $user)
      ->set('errors', $errors);
  }
  
} // End Controller_User
