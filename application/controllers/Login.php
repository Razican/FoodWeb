<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->language('login');

		$head = array();
		$login = array();

		$head['title'] = lang('login.login');

		$this->load->view('header', $head);
		$this->load->view('login', $login);
		$this->load->view('footer');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */