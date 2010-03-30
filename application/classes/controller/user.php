<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template
{
  
  public $auth;
  
  public function before()
  {
    parent::before();
    $this->auth = Auth::instance();
  }
  
  public function action_index()
  {  
    $this->template->title = 'Index';

    $this->template->content = View::factory('user/index')
      ->set('user', $this->auth->get_user())
      ->set('logged_in', $this->auth->logged_in());
  }
  
  public function action_login()
  {
    if ($_POST)
    {
      $remember = isset($_POST['remember']) ? TRUE : FALSE;      
      $this->auth->login($_POST['username'], $_POST['password'], $remember);
      
      if ($this->auth->logged_in())
      {
        $this->request->redirect(Route::get('user')->uri(array('action' => 'index')));
      }
    }
    
    $this->template->title = 'Login';
    $this->template->content = View::factory('user/login');
  }
  
  public function action_logout()
  {
    $this->auth->logout();
    $this->request->redirect(Route::get('user')->uri(array('action' => 'index')));
  }

  public function action_register()
  {
    $errors = FALSE;
    $user = Jelly::factory('user');
    
    if ($_POST)
    {
      $user = Jelly::factory('user', $_POST);
            
      try
      {
        $user->add('roles', Jelly::select('role')->where('name', '=', 'login')->execute());
        $user->save();
        $this->request->redirect(Route::get('user')->uri(array('action' => 'index')));
      }
      catch (Validate_Exception $e)
      {
        $errors = $e->array->errors('validate');
      }
    }
    
    $this->template->title = 'Register';

    $this->template->content = View::factory('user/register')
      ->set('user', $user)
      ->set('errors', $errors);
  }
  
} // End Controller_User
