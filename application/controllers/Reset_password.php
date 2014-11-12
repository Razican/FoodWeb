<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

	public function index()
	{
		$this->load->driver('session');
		$this->lang->load('reset');

		if ($this->uri->segment(2))
		{
			redirect('reset_password', 'location', 301);
		}
		elseif ( ! is_null($this->session->userdata('username')))
		{
			redirect('search');
		}
		elseif ($this->input->method() === 'post')
		{
			// TODO
		}
		else
		{
			$head['title'] = lang('reset.reset');

			$reset['error_msg'] = $this->session->flashdata('error_msg');
			$reset['email'] = $this->session->flashdata('email');
			$reset['username'] = $this->session->flashdata('username');
			$reset['password'] = $this->session->flashdata('password');

			$this->load->view('header', $head);
			$this->load->view('reset_password', $reset);
			$this->load->view('footer');
		}
	}
}

/* End of file Reset_password.php */
/* Location: ./application/controllers/Reset_password.php */