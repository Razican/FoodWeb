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
			if (is_null($error = $this->foodweb->register(
						$this->input->post('name'),
						$this->input->post('lastname'),
						$this->input->post('email'),
						$this->input->post('username'),
						$this->input->post('password'),
						$this->input->post('passconf'),
						array('gluten' => $this->input->post('gluten') === "on",
							'diabetes' => $this->input->post('diabetes') === "on",
							'vegetables' => $this->input->post('vegetables') === "on",
							'milk' => $this->input->post('milk') === "on"))))
			{
				$this->session->set_userdata('username', $this->input->post('username'));
				redirect('search');
			}
			else
			{
				$this->session->set_flashdata('error_msg', $error);

				$this->session->set_flashdata('name', $this->input->post('name'));
				$this->session->set_flashdata('lastname', $this->input->post('lastname'));
				$this->session->set_flashdata('email', $this->input->post('email'));
				$this->session->set_flashdata('username', $this->input->post('username'));

				$this->session->set_flashdata('gluten', $this->input->post('gluten') === "on");
				$this->session->set_flashdata('diabetes', $this->input->post('diabetes') === "on");
				$this->session->set_flashdata('vegetables', $this->input->post('vegetables') === "on");
				$this->session->set_flashdata('milk', $this->input->post('milk') === "on");

				redirect('register');
			}
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