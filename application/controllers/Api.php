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
			$data['response'] = json_encode(array("status" => "OK", "error" => NULL));
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

			if (is_null($error = $this->foodweb->check_login($username, $password)))
			{
				$data['response'] = json_encode(array("status" => "OK", "error" => NULL));
			}
			else
			{
				$data['response'] = json_encode(array("status" => "ERR", "error" => $error));
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
		if ($this->input->method() === 'post')
		{
			// TODO
		}
		else
		{
			show_404("api/login");
		}
	}

	public function reset_password()
	{
		if ($this->input->method() === 'post')
		{
			// TODO
		}
		else
		{
			show_404("api/login");
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
			show_404("api/login");
		}
	}

	private function _is_sha1($password)
	{
		return ! empty($password) && strlen($password) === 40;
	}
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */