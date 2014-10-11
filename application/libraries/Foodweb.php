<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Foodweb {

	public function check_login($username, $password)
	{
		$CI =& get_instance();

		$CI->db->where('username', $username);
		$CI->db->where('password', $password);
		$CI->db->from('users');

		if ($CI->db->count_all_results())
			return NULL;
		else
			return "Incorrect username or password";
	}
}
