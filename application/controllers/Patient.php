<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    var $orthancTargetAPI = "";
    var $orthancUsername = "";
    var $orthancPassword = "";

    function __construct() {
        parent::__construct();
        $this->load->model('PatientModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }
        $this->getPatientListView();
    }

    public function getPatientList() {

        echo json_encode(array(
            "data" => $this->PatientModel->getAllPatientList()->result(),
            "status" => "200",
            "message" => "founded"
        ));
    }

    public function getPatientListView() {

        $this->load->view('header_main');
        $this->load->view('patient/patient_list');
        $this->load->view('footer_main');
    }

    public function postNewDataPatient(){
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }

        $data = array(           
            'id_pasien' =>  date("Ymdhis"),
            'nama_pasien' => strtoupper($this->input->post('namaPasien')),
            'rs_perujuk' =>  $this->input->post('rumahSakitPerujuk'),
            'tgl_rujuk' => date('Y-m-d'),
            'jk' => $this->input->post('jk'),
            'umur' => $this->input->post('umur'),
            'diagnosa' => $this->input->post('diagnosa'),
            'status' => '0',
            'alasan' => '-',
            'ruangan_dituju' => '-',
            'keterangan' => '-',
            'input_time' => date('h:i:s'),
            'update_time' =>'00:00:00'
        );
        $this->PatientModel->postNewDataPatient($data);
        $this->session->set_flashdata('FlashdataSuccess',array('Berhasil', 'Data Telah Disimpan'));
        redirect('/Patient/index');
        
    }

    public function postEditDataPatient(){
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }

        $data = array(           
            'nama_pasien' => strtoupper($this->input->post('editNamaPasien')),
            'rs_perujuk' =>  $this->input->post('editRumahSakitPerujuk'),
            'jk' => $this->input->post('editJk'),
            'umur' => $this->input->post('editUmur'),
            'diagnosa' => $this->input->post('editDiagnosa'),
            'input_time' => date('h:i:s'),
            'update_time' =>'00:00:00'
        );
        
        $this->PatientModel->postEditDataPatient($data,$this->input->post('editIdPasien'));
        $this->session->set_flashdata('FlashdataSuccess',array('Berhasil', 'Data Telah Disimpan'));
        redirect('/Patient/index');
        
    }

    public function getEmptyRoom() {
        echo json_encode(array(
            "data" => $this->PatientModel->getEmptyRoom()->result(),
            "status" => "200",
            "message" => "founded"
        ));
    }

    public function updateStatusPatien(){
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }
        $idPatient = $this->input->post('idPasienInModalChange');
        $idRoom = urldecode($this->input->post('roomInModalChange'));
        $data = array();
        if ($this->input->post('statusInModalChange')!=3) {
            $data = array(           
                'status' => $this->input->post('statusInModalChange'),
                'alasan' =>$this->input->post('alasanInModalChange'),
                'keterangan' =>$this->input->post('keteranganInModalChange'),
                'ruangan_dituju' => $idRoom,
                'update_time' => date('h:i:s'),
            );
            $this->db->where('id_pasien',$idPatient);
            $this->db->update('pasien_spgdt_covid', $data);
        }                
        if ($this->input->post('statusInModalChange') == 1) {
            $data = array(           
                'status' => 'BOOKED'
            );
            $this->db->where('kd_kamar',$idRoom);
            $this->db->update('kamar', $data);
        }else if ($this->input->post('statusInModalChange') == 3) {
            $result = $this->PatientModel->getRoomPatient($idPatient)->row_array();
            $idRoom = $result['ruangan_dituju'];
            $data = array(           
                'status' => 'KOSONG'
            );
            $this->db->where('kd_kamar',$idRoom);
            $this->db->update('kamar', $data);
            $data = array(           
                'status' => $this->input->post('statusInModalChange'),                
                'alasan' =>$this->input->post('alasanInModalChange'),
                'keterangan' =>$this->input->post('keteranganInModalChange'),
                'ruangan_dituju' => $idRoom,
                'update_time' => date('h:i:s'),
            );
            $this->db->where('id_pasien',$idPatient);
            $this->db->update('pasien_spgdt_covid', $data);
        }        
        $this->session->set_flashdata('FlashdataSuccess',array('Berhasil', 'Data Telah Update'));
        redirect('/Patient/index');
        
    }

    public function updatePatienOnSite(){
        if(!$this->getLoggedInStatus()) {
            redirect(site_url('Login'));
        }

        $data = array(           
            'status' => '4'
        );
        $this->db->where('id_pasien',$this->input->get('patientid'));
        $this->db->update('pasien_spgdt_covid', $data);
        
        $this->session->set_flashdata('FlashdataSuccess',array('Berhasil', 'Data Telah Update'));
        redirect('/Patient/index');
        
    }

    public function getDetailPatient(){
        $id_patient = $this->input->post('id_pasien');
        // $this->PatientModel->getDetailPatient($id_patient)->row_array();
        echo json_encode(array(
            "data" =>  $this->PatientModel->getDetailPatient($id_patient)->result(),
            "status" => "200",
            "message" => "founded"
        ));

    }

    /**
     * @description get logged in status by session
     * @return {boolean}
     */
    public function getLoggedInStatus() {
        return $this->session->userdata('loggedIn');
    }
    
}