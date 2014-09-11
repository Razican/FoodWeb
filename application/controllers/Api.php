<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		$data['response'] = json_encode(array("message" => "Welcome to the API!"));
		$this->load->view('api', $data);
		// TODO
	}

	public function register()
	{
		// TODO
	}

	public function login()
	{
		// TODO
	}

	public function search()
	{
		// TODO
	}

	public function reset_pass()
	{
		// TODO
	}
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */