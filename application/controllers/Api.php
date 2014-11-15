<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		show_404("api");
	}

	public function status()
	{
		if ($this->input->method() === 'post')
		{
			$data['response'] = array("status" => "OK", "error" => NULL);
			$this->load->view('api', $data);
		}
		else
		{
			show_404("api/login");
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->input->method() === 'post' && ! empty($username) && $this->_is_sha1($password))
		{
			$this->lang->load('login');
			$error = $this->foodweb->check_login($username, $password);

			if (is_null($error))
			{
				$data['response'] = array("status" => "OK", "error" => NULL);
			}
			else
			{
				$data['response'] = array("status" => "ERR", "error" => $error);
			}

			$this->load->view('api', $data);
		}
		else
		{
			show_404("api/login");
		}
	}

	public function register()
	{
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$gluten = is_null($this->input->post('gluten')) ? NULL : (bool) $this->input->post('gluten');
		$diabetes = is_null($this->input->post('diabetes')) ? NULL : (bool) $this->input->post('diabetes');
		$vegetables = is_null($this->input->post('vegetables')) ? NULL : (bool) $this->input->post('vegetables');
		$milk = is_null($this->input->post('milk')) ? NULL : (bool) $this->input->post('milk');

		if ($this->input->method() === 'post' && ! empty($name) && ! empty($lastname) &&
			$this->_is_email($email) && ! empty($username) && $this->_is_sha1($password) &&
			is_bool($gluten) && is_bool($diabetes) && is_bool($vegetables) && is_bool($milk))
		{
			$this->lang->load('register');
			$error = $this->foodweb->register($name, $lastname, $email, $username, $password, $password,
											$gluten, $diabetes, $vegetables, $milk);

			if (is_null($error))
			{
				$data['response'] = array("status" => "OK", "error" => NULL);
			}
			else
			{
				$data['response'] = array("status" => "ERR", "error" => $error);
			}

			$this->load->view('api', $data);
		}
		else
		{
			show_404("api/register");
		}
	}

	public function reset_password()
	{
		$email = $this->input->post('email');
		$username = is_null($this->input->post('username')) ? NULL : $this->input->post('username') === "true";
		$password = is_null($this->input->post('password')) ? NULL : $this->input->post('password') === "true";

		if ($this->input->method() === 'post' && $this->_is_email($email) && is_bool($username) && is_bool($password))
		{
			$this->lang->load('reset');
			$error = $this->foodweb->reset($email, $username, $password);

			if (is_null($error))
			{
				$data['response'] = array("status" => "OK", "error" => NULL);
			}
			else
			{
				$data['response'] = array("status" => "ERR", "error" => $error);
			}

			$this->load->view('api', $data);
		}
		else
		{
			show_404("api/reset_password");
		}
	}

	public function search()
	{
		if ($this->input->method() === 'post')
		{
			// TODO
		}
		else
		{
			show_404("api/search");
		}
	}

	private function _is_sha1($password)
	{
		return ! empty($password) && strlen($password) === 40;
	}

	private function _is_email($email)
	{
		return ! empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */