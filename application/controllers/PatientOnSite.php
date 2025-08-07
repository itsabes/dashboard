<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientOnSite extends CI_Controller {

    var $orthancTargetAPI = "";
    var $orthancUsername = "";
    var $orthancPassword = "";

    function __construct() {
        parent::__construct();
        $this->load->model('PatientOnSiteModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }
        $this->getPatienOnSitetListView();
    }

    public function getPatientList() {

        echo json_encode(array(
            "data" => $this->PatientOnSiteModel->getAllPatientList(),
            "status" => "200",
            "message" => "founded"
        ));
    }

    public function getPatienOnSitetListView() {

        $this->load->view('header_main');
        $this->load->view('patientOnSite/patientOnSite_list');
        $this->load->view('footer_main');
    }

    public function postSchedulGoHome() {
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }

        $data = array(           
            'no_rawat' => $this->input->post('idPasienInModalSchedulToHome'),
            'tanggal_pulang' =>$this->input->post('dateModalSchedulToHome')
        );
        $this->PatientOnSiteModel->postScheduleGoHome($data);
        $data = array(           
            'status' => 'SCHEDULE'
        );
        $this->db->where('kd_kamar',$this->input->post('roomInModalSchedulToHome'));
        $this->db->update('kamar', $data);
        $this->session->set_flashdata('FlashdataSuccess',array('Berhasil', 'Pasien Telah dijadwalkan Pulang'));
        redirect('/PatientOnSite/index');
    }

    /**
     * @description get logged in status by session
     * @return {boolean}
     */
    public function getLoggedInStatus() {
        return $this->session->userdata('loggedIn');
    }
    
}