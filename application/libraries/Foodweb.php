<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Foodweb {

	public function check_login($username, $password)
	{
		$CI =& get_instance();

		$CI->db->where('username', $username);
		$CI->db->where('password', $password);
		$CI->db->from('users');

		if ($CI->db->count_all_results())
		{
			return NULL;
		}
		else
		{
			return lang('login.error_incorrect');
		}
	}

	public function register($name, $lastname, $email, $username, $password, $passconf, $health_issues)
	{
		if (empty($name) OR empty($lastname) OR empty($email) OR
			empty($username) OR empty($password) OR empty($passconf))
		{
			return lang('register.error_empty');
		}
		elseif ($password !== $passconf)
		{
			return lang('register.error_pass');
		}
		elseif ( ! filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return lang('register.error_email_1');
		}

		if ($CI->user->exists_user($username))
		{
			return lang('register.error_user');
		}

		$CI->db->where('email', $email);
		$CI->db->from('users');

		if ($CI->db->count_all_results())
		{
			return lang('register.error_email_2');
		}

		$CI->load->helper('string');
		$validation = random_string('alnum', 5);

		$data = array(
			'name' => $name,
			'lastname' => $lastname,
			'email' => $email,
			'confirmation' => $validation,
			'username' => $username,
			'password' => $password,
			'health_issues' => serialize($health_issues));

		$CI->db->insert('users', $data);

		$head['title'] = lang('register.register');
		$email_body['title'] = $head['title'];
		$email_body['body'] = sprintf(lang('register.email_text'), $name, site_url('register/validate/'.$validation));

		$email_head = $CI->load->view('header', $head, TRUE);
		$email_body = $CI->load->view('email', $email_body, TRUE);
		$email_footer = $CI->load->view('footer', '', TRUE);

		$CI->load->library('email');

		$CI->email->from('admin@razican.com', 'Food Finder');
		$CI->email->to($email);

		$CI->email->subject(lang('register.register'));
		$CI->email->message($email_head.$email_body.$email_footer);

		$CI->email->send();

		return NULL;
	}

	public function reset($email, $username, $password)
	{
		if (empty($email))
		{
			return lang('reset.error_no_email');
		}
		elseif ( ! $username && ! $password)
		{
			return lang('reset.error_no_select');
		}
		elseif ( ! filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return lang('reset.error_email_1');
		}
		else
		{
			$CI =& get_instance();

			if ($username)
			{
				$CI->db->select('username');
			}

			$CI->db->select('id');
			$CI->db->where('email', $email);

			$query = $CI->db->get('users');

			if ($query->num_rows() === 0)
			{
				return lang('reset.error_email_2');
			}
			else
			{
				foreach ($query->result() as $user);

				if ($password)
				{
					$CI->load->helper('string');

					$new_pass = random_string();

					$CI->db->where('email', $email);
					$CI->db->set('password', sha1($new_pass));
					$CI->db->update('users');
				}

				if ($username && $password)
				{
					$email_text = sprintf(lang('reset.email_both'), $user->username, $new_pass);
				}
				elseif ($username)
				{
					$email_text = sprintf(lang('reset.email_username'), $user->username);
				}
				else
				{
					$email_text = sprintf(lang('reset.email_password'), $new_pass);
				}

				$head['title'] = lang('reset.reset');
				$email_body['title'] = $head['title'];
				$email_body['body'] = $email_text;

				$email_head = $CI->load->view('header', $head, TRUE);
				$email_body = $CI->load->view('email', $email_body, TRUE);
				$email_footer = $CI->load->view('footer', '', TRUE);

				$CI->load->library('email');

				$CI->email->from('admin@razican.com', 'Food Finder');
				$CI->email->to($email);

				$CI->email->subject(lang('reset.reset'));
				$CI->email->message($email_head.$email_body.$email_footer);

				$CI->email->send();

				return NULL;
			}
		}
	}

	public function search($name, $type, $brand, $price_min, $price_max)
	{
		$result = array();
		$CI =& get_instance();

		if ( ! empty($name))
		{
			$CI->db->like('name', $name);
		}

		$CI->db->where('type', $type);

		if ( ! empty($brand))
		{
			$CI->db->like('brand', $brand);
		}

		$CI->db->where('price >=', (int) ($price_min*100));
		$CI->db->where('price <=', (int) ($price_max*100));

		$health_issues = $CI->user->get('health_issues');

		if ($health_issues['gluten'])
		{
			$CI->db->where('gluten', 1);
		}

		if ($health_issues['diabetes'])
		{
			$CI->db->where('diabetes', 1);
		}

		if ($health_issues['vegetables'])
		{
			$CI->db->where('vegetables', 1);
		}

		if ($health_issues['milk'])
		{
			$CI->db->where('milk', 1);
		}

		$query = $CI->db->get('products');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $product)
			{
				$result[] = array(
					'id' => $product->id,
					'name' => $product->name,
					'type' => lang('search.type_'.$product->type),
					'brand' => $product->brand,
					'price' => $product->price/100,
					'desc' => $product->description,
					'hall' => $product->hall,
					'shelf' => $product->shelf);
			}
		}

		return $result;
	}
}

/* End of file Foodweb.php */
/* Location: ./application/libraries/Foodweb.php */