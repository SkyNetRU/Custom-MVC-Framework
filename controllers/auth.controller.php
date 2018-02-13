<?php
defined('ROOT') or exit('No direct script access allowed');

class AuthController extends Controller {
	public function __construct()
	{
		parent::__construct();
		$this->model = new Auth_model();
	}

	public function index()
	{

	}

	public function login () {
		if ($_POST)
		{
			if (isset($_POST['csrf_token']) and $_POST['csrf_token'] == $_SESSION['csrf_token'])
			{
				$login = $this->cleanPost($_POST['login']);
				$pass  = md5($this->cleanPost($_POST['password']) . Config::get('salt'));
				$user = $this->model->getUser($login, $pass);

				if ($user){
					Session::set('user', $user);
					Session::setFlash('Hi there '.$user['login'].'!');
					Router::redirect('/users/');
				} else {
					Session::setFlash('Invalid credentials, try again please.');
					Router::redirect('/');
				}
			}
			else
			{
				Session::setFlash('CSRF token is invalid.');
				Router::redirect('/');
			}
		} else {
			Router::redirect('/');
		}
	}

	public function logout() {
		Session::destroy();
		Router::redirect('/');
	}
}