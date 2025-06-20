<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	private $_table = 'user';

	public function get_by_email($email)
	{
		return $this->db->get_where($this->_table, ['email' => $email, 'is_active' => 1])->row_array();
	}
}
