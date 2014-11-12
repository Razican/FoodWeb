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
			if (is_null($error = $this->foodweb->reset(
					$this->input->post('email'),
					$this->input->post('username') === 'on',
					$this->input->post('password') === 'on')))
			{
				redirect('/');
			}
			else
			{
				$this->session->set_flashdata('error_msg', $error);

				$this->session->set_flashdata('email', $this->input->post('email'));
				$this->session->set_flashdata('username', $this->input->post('username') === 'on');
				$this->session->set_flashdata('password', $this->input->post('password') === 'on');

				redirect('reset_password');
			}
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