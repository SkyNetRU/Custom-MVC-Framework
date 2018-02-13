<?php
defined('ROOT') or exit('No direct script access allowed');

class UsersController extends Controller
{
	protected $user;
	public function __construct()
	{
		parent::__construct();
		$this->model = new Users_model();
		if (!Session::get('user')){
			Session::setFlash('Restricted area, only logged users.');
			Router::redirect('/');
		}

		$this->user = Session::get('user');
	}

	public function index()
	{
		$this->data['users'] = $this->model->getUsers();
		$this->data['current_user'] = $this->user;
	}

	public function edit()
	{
		if (isset($this->params[0]))
		{
			$id = strtolower($this->params[0]);
		}
		else
		{
			Session::setFlash('No user id.');
			Router::redirect('/users/');
		}

		if ($this->user['role'] != 'admin'){
			Session::setFlash("Only admin have permissions.");
			Router::redirect('/users/');
		}

		if ($_POST)
		{
			if (isset($_POST['csrf_token']) and $_POST['csrf_token'] == $_SESSION['csrf_token'])
			{
				$user = array(
					'login'     => $this->cleanPost($_POST['login']),
					'email'     => $this->cleanPost($_POST['email']),
					'password'  => md5($this->cleanPost($_POST['password']) . Config::get('salt')),
					'role'      => $this->cleanPost($_POST['role']),
					'is_active' => $this->cleanPost($_POST['status'])
				);

				$result = $this->model->updateUser($id, $user);
				Session::renewCsrfToken();

				if ($result)
				{
					Session::setFlash('User successfully updated.');
					Router::redirect('/users/');
				}
				else
				{
					Session::setFlash('User not updated, some error.');
					Router::redirect('/users/edit/' . $id);
				}
			}
			else
			{
				Session::renewCsrfToken();
				Session::setFlash('CSRF token is invalid.');
				Router::redirect('/users/');
			}
		}
		else
		{
			$this->data['user'] = $this->model->getUserbyId($id);
		}
	}

	public function addUser()
	{
		if ($this->user['role'] != 'admin'){
			Session::setFlash("Only admin have permissions.");
			Router::redirect('/users/');
		}

		if ($_POST)
		{
			if (isset($_POST['csrf_token']) and $_POST['csrf_token'] == $_SESSION['csrf_token'])
			{
				$user = array(
					'login'     => $this->cleanPost($_POST['login']),
					'email'     => $this->cleanPost($_POST['email']),
					'password'  => md5($this->cleanPost($_POST['password']) . Config::get('salt')),
					'role'      => $this->cleanPost($_POST['role']),
					'is_active' => $this->cleanPost($_POST['status'])
				);

				$result = $this->model->addUser($user);

				if ($result)
				{
					Session::setFlash('User successfully added.');
				}
				else
				{
					Session::setFlash('User not added, some error.');
				}

			}
			else
			{
				Session::setFlash('CSRF token is invalid.');
			}

			Router::redirect('/users/');
		}
	}


	public function deleteUser(){
		if ($this->user['role'] != 'admin'){
			Session::setFlash("Only admin have permissions.");
			Router::redirect('/users/');
		}

		if (isset($this->params[0]))
		{
			$id = strtolower($this->params[0]);
		}
		else
		{
			Session::setFlash('No user id.');
			Router::redirect('/users/');
		}

		$result = $this->model->deleteUser($id);

		if ($result)
		{
			Session::setFlash('User successfully deleted.');
		}
		else
		{
			Session::setFlash('User not deleted, some error.');
		}
		Router::redirect('/users/');

	}
}