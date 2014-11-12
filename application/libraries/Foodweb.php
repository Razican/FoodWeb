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

		$CI =& get_instance();

		$CI->db->where('username', $username);
		$CI->db->from('users');

		if ($CI->db->count_all_results())
		{
			return lang('register.error_user');
		}

		$CI->db->where('email', $email);
		$CI->db->from('users');

		if ($CI->db->count_all_results())
		{
			return lang('register.error_email_2');
		}

		// TODO confirmation email

		$data = array(
			'name' => $name,
			'lastname' => $lastname,
			'email' => $email,
			'username' => $username,
			'password' => sha1($password),
			'health_issues' => serialize($health_issues));

		$CI->db->insert('users', $data);

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
			return lang('reset.error_email');
		}
		else
		{
			$CI =& get_instance();

			if ($username)
			{
				$this->db->select('username');
			}

			$this->db->select('id');
			$this->db->where('email', $email);

			$query = $this->db->get('users');

			if ($query->num_rows() === 0)
			{
				return lang('reset.error_email');
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
				$email['body'] = $email_text;

				$email_head = $this->load->view('header', $head, TRUE);
				$email_body = $this->load->view('email', $email, TRUE);
				$email_footer = $this->load->view('header', '', TRUE);

				$this->load->library('email');

				$this->email->from('admin@razican.com', 'Food Finder');
				$this->email->to($email);

				$this->email->subject(lang('reset.reset'));
				$this->email->message($email_head.$email_body.$email_footer);

				$this->email->send();

				return NULL;
			}
		}
	}
}

/* End of file Foodweb.php */
/* Location: ./application/libraries/Foodweb.php */