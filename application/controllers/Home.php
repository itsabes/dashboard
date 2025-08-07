<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date_helper');
        $this->load->library('session');
        $this->load->model('HomeModel');
    }

    public function index() {
      
        $room = $this->HomeModel->getRoom()->num_rows();
        $pasienDiRawat = $this->HomeModel->getPasienOnDuty()->num_rows();
        $ruangKosong = (int) $room - (int) $pasienDiRawat;
        $booked = $this->HomeModel->getPasienBooked()->num_rows();
        $schedule = 0;

        $data = array(
            'pasienDiRawat' => $pasienDiRawat,
            'ruangKosong' => $ruangKosong,
            'bookedRoom' => $booked,
            'schedule' => $schedule,
            'room' => $room
            
        );
        $this->load->view('home/home2',$data);
    }

    public function bedSabes() {
      
      $room = $this->HomeModel->getRoom()->num_rows();
      $pasienDiRawat = $this->HomeModel->getPasienOnDuty()->num_rows();
      $ruangKosong = (int) $room - (int) $pasienDiRawat;
      $booked = $this->HomeModel->getPasienBooked()->num_rows();
      $schedule = 0;

      $data = array(
          'pasienDiRawat' => $pasienDiRawat,
          'ruangKosong' => $ruangKosong,
          'bookedRoom' => $booked,
          'schedule' => $schedule,
          'room' => $room
          
      );
      $this->load->view('home/home2',$data);
    }

    public function getSummaryData() {
      $room = $this->HomeModel->getRoom()->num_rows();
      $pasienDiRawat = $this->HomeModel->getPasienOnDuty()->num_rows();
      $ruangKosong = (int) $room - (int) $pasienDiRawat;
      $booked = $this->HomeModel->getPasienBooked()->num_rows();
      $schedule = 0;

      echo json_encode(array(
        'pasienDiRawat' => $pasienDiRawat,
        'ruangKosong' => $ruangKosong,
        'bookedRoom' => $booked,
        'schedule' => $schedule,
        'room' => $room
      ));
    }

    public function getList1(){

      $result = array();
      $result_temp = $this->HomeModel->getList1();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList2(){

      $result = array();
      $result_temp = $this->HomeModel->getList2();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList3(){

      $result = array();
      $result_temp = $this->HomeModel->getList3();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList4(){
      
      $result = array();
      $result_temp = $this->HomeModel->getList4();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList5(){
      
      $result = array();
      $result_temp = $this->HomeModel->getList5();
      foreach ($result_temp as $value) {

        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }
    
    public function getList6(){
      
      $result = array();
      $result_temp = $this->HomeModel->getList6();
      foreach ($result_temp as $value) {

        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList7(){

      $result = array();
      $result_temp = $this->HomeModel->getList7();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    } 
    
    public function getList8(){

      $result = array();
      $result_temp = $this->HomeModel->getList8();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList9(){

      $result = array();
      $result_temp = $this->HomeModel->getList9();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList10(){

      $result = array();
      $result_temp = $this->HomeModel->getList10();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList11(){

      $result = array();
      $result_temp = $this->HomeModel->getList11();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList12(){

      $result = array();
      $result_temp = $this->HomeModel->getList12();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList13(){

      $result = array();
      $result_temp = $this->HomeModel->getList13();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function getList14(){

      $result = array();
      $result_temp = $this->HomeModel->getList14();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_dokter' => $value['kd_dokter'],
          'nm_dokter' => $value['nm_dokter'],
          'kd_poli' => $value['kd_poli'],
          'nm_poli' => $value['nm_poli'],
          'jam_mulai' => $value['jammulai'],
          'jam_selesai' => $value['jamselesai'],
          'stts_prak' => $value['stts_prak']
        ));
      }

      echo json_encode($result);
    }

    public function get_kunjungan_dashboard(){
        $from = $this->input->get('from');
        $to = $this->input->get('to');

        if (empty($from) || empty($to)) {
            echo json_encode([
                'status' => 400,
                'message' => 'Tanggal belum diisi'
            ]);
            return;
        }

        $data = $this->HomeModel->get_kunjungan_data($from, $to); //Dashboard_model

        echo json_encode([
            'status' => 200,
            'from' => $from,
            'to' => $to,
            'data' => $data
        ]);
    }


}