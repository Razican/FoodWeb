<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		$data['response'] = json_encode(array("message" => "Welcome ".$this->input->post('name')."!"));
		$this->load->view('api', $data);
		// TODO
	}

	public function register()
	{
		// TODO
	}

	public function login()
	{
		if (isnull($error = $this->foodweb->checkLogin()))
			$data['response'] = json_encode(array("status" => "OK", "error" => NULL));
		else
			$data['response'] = json_encode(array("status" => "ERR", "error" => $error));

		$this->load->view('api', $data);
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
