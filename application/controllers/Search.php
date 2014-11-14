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

			if ($this->input->method() === 'post')
			{
				$search['results'] = array(
						array(
							'name' => $this->security->get_csrf_token_name(),
							'token' => $this->security->get_csrf_hash()),
						array('id' => 1,
							'name' => 'Pringles',
							'type' => 'Food',
							'brand' => 'Pringles',
							'price' => 2.55,
							'desc' => 'Pringles are potato chips',
							'hall' => 2,
							'shelf' => 3),
						array('id' => 2,
							'name' => 'Milk',
							'type' => 'Drink',
							'brand' => 'Valio',
							'price' => 1.15,
							'desc' => 'Great milk at good price',
							'hall' => 1,
							'shelf' => 1),
						array('id' => 5,
							'name' => 'Chocolate',
							'type' => 'Food',
							'brand' => 'KarlFazer',
							'price' => 1.35,
							'desc' => 'Best chocolate ever',
							'hall' => 2,
							'shelf' => 1),
						array('id' => 12,
							'name' => 'Cookies',
							'type' => 'Food',
							'brand' => 'GoodCookies',
							'price' => 1.85,
							'desc' => 'Great cookies',
							'hall' => 3,
							'shelf' => 4)
					);

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