<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {

        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }

        $header['nama'] = $this->session->userdata('nama');

        $this->load->view('header_main', $header);
        $this->load->view('contactus/contact_us');
        $this->load->view('footer_main');
    }

    /**
     * @description get logged in status by session
     * @return {boolean}
     */
    public function getLoggedInStatus() {

        return $this->session->userdata('loggedIn');
    }
}