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

			if ($this->input->method() === 'post' && $this->input->is_ajax_request())
			{
				$name = $this->input->post('name');
				$type = (int) $this->input->post('type');
				$brand = $this->input->post('brand');
				$price_min = (float) $this->input->post('price_min');
				$price_max = (float) $this->input->post('price_max');

				$result = $this->foodweb->search($name, $type, $brand, $price_min, $price_max);

				array_unshift($result, array(
						'name' => $this->security->get_csrf_token_name(),
						'token' => $this->security->get_csrf_hash()));

				$search['results'] = $result;

				$this->load->view('search_results', $search);
			}
			else
			{
				$this->user->load($this->session->userdata('username'));

				$head['title'] = lang('search.search');
				$head['script'] = $this->load->view('search-js', '', TRUE);

				$search['welcome'] = sprintf(lang('search.welcome'), $this->user->get('name'));

				$this->load->view('header', $head);
				$this->load->view('search', $search);
				$this->load->view('footer');
			}
		}
	}
}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */