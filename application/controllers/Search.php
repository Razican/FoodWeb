<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index()
	{
		$this->load->driver('session');

		if ($this->uri->segment(2))
		{
			redirect('search', 'location', 301);
		}
		elseif (is_null($this->session->userdata('username')))
		{
			redirect('/');
		}
		else
		{
			$this->lang->load('search');
			$this->load->model('user_model', 'user');

			$this->user->load($this->session->userdata('username'));

			$head['title'] = lang('search.search');

			$search['error_msg'] = $this->session->flashdata('error_msg');
			$search['welcome'] = sprintf(lang('search.welcome'), $this->user->get('name'));

			$this->load->view('header', $head);
			$this->load->view('search', $search);
			$this->load->view('footer');
		}
	}
}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */