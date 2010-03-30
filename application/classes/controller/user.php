<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template
{
  
  public $auth; // Auth instance
  
  public $user; // Auth user object
  
  public $logged_in; // Is the user logged in?
  
  public function before()
  {
    $this->auth = Auth::instance();
    
    $this->user = $this->auth->get_user();
    
    $this->logged_in = $this->auth->logged_in('login');
    
    return parent::before();
  }
  
  public function action_index()
  {  
    $this->template->title = 'Index';

    $this->template->content = View::factory('user/index')
      ->set('user', $this->user)
      ->set('logged_in', $this->logged_in);
  }
  
  public function action_login()
  {
    $this->template->title = 'Login';
    $this->template->content = View::factory('user/login');
  }
  
  public function action_logout()
  {
    // Log user out and redirect to index
  }

  public function action_register()
  {
    $errors = NULL;
    
    if ($_POST)
    {
      $user = Jelly::factory('user', $_POST);
      $user->add('roles', Jelly::select('role')->where('name', '=', 'login')->execute());
      
      try
      {
        $user->save();
        $this->request->redirect('user/index');
      } catch (Validate_Exception $e)
      {
        $errors = $e->array->errors('validate');
      }
    } else
    {
      $user = Jelly::factory('user');
    }
    
    $this->template->title = 'Register';

    $this->template->content = View::factory('user/register')
      ->set('user', $user)
      ->set('errors', $errors);
  }
  
} // End Controller_User
