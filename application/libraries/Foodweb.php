<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Foodweb {

	public function check_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->from('users');

		if ($this->db->count_all__results())
			return NULL;
		else
			return "Incorrect username or password";
	}
}
