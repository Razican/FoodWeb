<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->driver('session');
		$this->lang->load('register');

		if ($this->uri->segment(2))
		{
			redirect('register', 'location', 301);
		}
		elseif ( ! is_null($this->session->userdata('username')))
		{
			redirect('search');
		}
		elseif ($this->input->method() === 'post')
		{
			// TODO process registration
		}
		else
		{
			$head['title'] = lang('register.register');

			$register['error_msg'] = $this->session->flashdata('error_msg');

			$register['name'] = $this->session->flashdata('name');
			$register['lastname'] = $this->session->flashdata('lastname');
			$register['email'] = $this->session->flashdata('email');
			$register['username'] = $this->session->flashdata('username');
			$register['gluten'] = $this->session->flashdata('gluten');
			$register['diabetes'] = $this->session->flashdata('diabetes');
			$register['vegetables'] = $this->session->flashdata('vegetables');
			$register['milk'] = $this->session->flashdata('milk');

			$this->load->view('header', $head);
			$this->load->view('register', $register);
			$this->load->view('footer');
		}
	}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */