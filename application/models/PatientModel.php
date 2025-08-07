<?php
class PatientModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllPatientList() {
        // return $this->db->query('')->result_array();
        $this->db->select('*');
        $this->db->from('pasien_spgdt_covid');
        $this->db->order_by('tgl_rujuk', 'DESC');
        $this->db->order_by('input_time', 'DESC');
        return $this->db->get();
    }

    function postNewDataPatient($data){
        $this->db->insert('pasien_spgdt_covid',$data);
    }

    function postEditDataPatient($data,$id_patient) {
        $this->db->set($data);
        $this->db->where('id_pasien', $id_patient);
        $this->db->update('pasien_spgdt_covid');   
    }

    function getEmptyRoom() {
        $this->db->select('kd_kamar, kd_bangsal');
        $this->db->from('kamar');
        $this->db->where("(status = 'KOSONG' OR status = 'SCHEDULE')");
        $this->db->where('statusdata', '1');
        return $this->db->get();
    }

    function getRoomPatient($id_patient){
        $this->db->select('ruangan_dituju');
        $this->db->from('pasien_spgdt_covid');
        $this->db->where('id_pasien', $id_patient);
		return $this->db->get();
    }

    function getDetailPatient($id_patient){
        $this->db->select('*');
        $this->db->from('pasien_spgdt_covid');
        $this->db->where('id_pasien', $id_patient);
		return $this->db->get();
    }


}