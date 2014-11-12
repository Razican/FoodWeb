<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->load->driver('session');

		if ($this->uri->segment(2))
		{
			redirect('logout', 'location', 301);
		}

		$this->session->sess_destroy();

		redirect('/');
	}
}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */