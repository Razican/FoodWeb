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
		if ($password !== $passconf)
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
}

/* End of file Foodweb.php */
/* Location: ./application/libraries/Foodweb.php */