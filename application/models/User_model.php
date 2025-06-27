<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $_table = 'tbl_user';

    public function get_by_username($username)
    {
        return $this->db->get_where($this->_table, ['username' => $username])->row();
    }
}
