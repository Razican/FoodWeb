<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $id;
	private $name;
	private $lastname;
	private $email;
	private $confirmation;
	private $username;
	private $password;
	private $health_issues = array();

	public function load($username)
	{
		$CI =& get_instance();

		$CI->db->where('username', $username);
		$query = $CI->db->get('users');

		if ($query->num_rows() !== 0)
		{
			$result = $query->result();

			foreach ($result[0] as $key => $value)
			{
				$this->$key = $value;
			}

			$this->health_issues = unserialize($this->health_issues);
		}
		else
		{
			log_message('error', 'Requested to load user "'.$username.'" but it does not exist.');
		}
	}

	public function get($key)
	{
		if (isset($this->$key))
		{
			return $this->$key;
		}
		else
		{
			log_message('error', 'Tried to retrieve the key "'.$key.'" from the User model, but it does not exist.');
			return NULL;
		}
	}

	public function validate($code)
	{
		$CI =& get_instance();

		$CI->db->where('confirmation', $code);
		$CI->db->set('confirmation', NULL);
		$CI->db->update('users');
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */