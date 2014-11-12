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
			// TODO

			return NULL;
		}
	}
}

/* End of file Foodweb.php */
/* Location: ./application/libraries/Foodweb.php */