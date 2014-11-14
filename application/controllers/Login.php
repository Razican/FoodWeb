<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->driver('session');
		$this->lang->load('login');

		if ($this->uri->segment(1))
		{
			redirect('/', 'location', 301);
		}
		elseif ( ! is_null($this->session->userdata('username')))
		{
			redirect('search');
		}
		elseif ($this->input->method() === 'post')
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if (empty($username) OR
				empty($password))
			{
				$this->session->set_flashdata('error_msg', lang('login.error_empty'));

				if ( ! empty($username))
				{
					$this->session->set_flashdata('username', $this->input->post('username'));
				}

				redirect('/');
			}
			elseif (is_null($error = $this->foodweb->check_login(
						$this->input->post('username'),
						sha1($this->input->post('password')))))
			{
				$this->session->set_userdata('username', $this->input->post('username'));
				redirect('search');
			}
			else
			{
				$this->session->set_flashdata('error_msg', $error);
				$this->session->set_flashdata('username', $this->input->post('username'));

				redirect('/');
			}
		}
		else
		{
			$head['title'] = lang('login.login');

			$login['error_msg'] = $this->session->flashdata('error_msg');
			$login['username'] = $this->session->flashdata('username');

			$this->load->view('header', $head);
			$this->load->view('login', $login);
			$this->load->view('footer');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */