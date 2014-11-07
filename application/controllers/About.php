<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		if ($this->uri->segment(2))
		{
			redirect('about', 'location', 301);
		}
		else
		{
			$this->load->driver('session');
			$this->lang->load('about');

			$head['title'] = lang('about.about');

			$about['logged_in'] = ! is_null($this->session->userdata('username'));

			$this->load->view('header', $head);
			$this->load->view('about', $about);
			$this->load->view('footer');
		}
	}
}

/* End of file About.php */
/* Location: ./application/controllers/About.php */