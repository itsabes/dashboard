<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->view('login/login');
    }

    public function getDataUserByUsernamePassword() {

        $data = $this->LoginModel->getDataUserByUsernamePassword(
            $this->input->post('username', 'true'),
            MD5($this->input->post('password'))
        )->row();

        if(count($data)) {

            $sessionData = array(
                'id_user' => $data->id_user,
                'username' => $data->username,
                'nama' => $data->nama,
                'loggedIn' => true,
                'namaLevel' => $data->nama_level,
            );

            $this->session->set_userdata($sessionData);
            redirect(site_url('Patient'));
        } else {

            $this->session->set_flashdata('FlashdataError', array("Permintaan Ditolak", "Username atau password salah"));
            redirect(site_url('Login'));
        }

    }

    public function logoutAction() {

        $this->session->sess_destroy();
        redirect(site_url('Home'));
    }
}