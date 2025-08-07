<?php
class LoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    function getDataUserByUsernamePassword($username, $password) {

        $this->db->select('a.id_user, c.nama, a.username, b.nama_level, a.`password`, a.id_level');
        $this->db->from('tm_user a');
        $this->db->join('tm_level b', 'a.id_level = b.id_level', 'left');
        $this->db->join('pegawai c', 'a.id_user = c.nik', 'left');
        $this->db->where('a.username', $username);
        $this->db->where('a.`password`', $password);
        $this->db->limit(1);
        return $this->db->get();
    }
}