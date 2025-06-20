<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($nip, $password)
    {
        return $this->db->get_where('pegawai', ['nip' => $nip, 'password' => $password])->row();
    }


    public function get_all_users()
    {
        return $this->db->get('pegawai')->result();
    }

    public function insert_user($data)
    {
        return $this->db->insert('pegawai', $data);
    }

    public function update_user($id_user, $data)
    {
        $this->db->where('id_pegawai', $id_user);
        return $this->db->update('pegawai', $data);
    }

    public function delete_user($id_user)
    {
        $this->db->where('id_pegawai', $id_user);
        return $this->db->delete('pegawai');
    }
}
