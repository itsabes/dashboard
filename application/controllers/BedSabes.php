<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BedSabes extends CI_Controller {

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
        $this->load->view('home/home',$data);
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

    public function getListMerak(){

      $result = array();
      $result_temp = $this->HomeModel->getListMerak();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListAster(){

      $result = array();
      $result_temp = $this->HomeModel->getListAster();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListRaflesia(){

      $result = array();
      $result_temp = $this->HomeModel->getListRaflesia();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getRuangHCU(){
      
      $result = array();
      $result_temp = $this->HomeModel->getRuangHCU();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }
    
    public function getRuangICU(){
      
      $result = array();
      $result_temp = $this->HomeModel->getRuangICU();
      foreach ($result_temp as $value) {

        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getRuangICUIsolasi(){
      
      $result = array();
      $result_temp = $this->HomeModel->getRuangICUIsolasi();
      foreach ($result_temp as $value) {

        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListGaruda(){

      $result = array();
      $result_temp = $this->HomeModel->getListGaruda();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 
    
    public function getListBougenvile(){

      $result = array();
      $result_temp = $this->HomeModel->getListBougenvile();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListCempaka2(){

      $result = array();
      $result_temp = $this->HomeModel->getListCempaka2();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListElang(){

      $result = array();
      $result_temp = $this->HomeModel->getListElang();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListRajawali(){

      $result = array();
      $result_temp = $this->HomeModel->getListRajawali();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListRajawaliBayi(){

      $result = array();
      $result_temp = $this->HomeModel->getListRajawaliBayi();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListKutilang(){

      $result = array();
      $result_temp = $this->HomeModel->getListKutilang();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListEdelweis(){

      $result = array();
      $result_temp = $this->HomeModel->getListEdelweis();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListLili(){

      $result = array();
      $result_temp = $this->HomeModel->getListLili();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }

    public function getListTulip(){

      $result = array();
      $result_temp = $this->HomeModel->getListTulip();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    }  
    
    public function getListAnggrek(){

      $result = array();
      $result_temp = $this->HomeModel->getListAnggrek();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 
    
    public function getListAnggrekBayi(){

      $result = array();
      $result_temp = $this->HomeModel->getListAnggrekBayi();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 

    public function getListAnyelir(){

      $result = array();
      $result_temp = $this->HomeModel->getListAnyelir();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 

    public function getListCemara1(){

      $result = array();
      $result_temp = $this->HomeModel->getListCemara1();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 

    public function getListCemara2(){

      $result = array();
      $result_temp = $this->HomeModel->getListCemara2();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 

    public function getListCemara3(){

      $result = array();
      $result_temp = $this->HomeModel->getListCemara3();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 

    public function getListSeruni(){

      $result = array();
      $result_temp = $this->HomeModel->getListSeruni();
      foreach ($result_temp as $value) {
        
        // cari list rencana kamar
        $list_plan = array();
        // foreach ($this->HomeModel->getListRencanaKamarByKdkamar($value['kd_kmr'], get_date()) as $value_plan) array_push($list_plan, unserialize($value_plan->plan));
        
        array_push($result, array(
          'kd_kmr' => $value['kd_kmr'],
          'status' => $value['status'],
          'no_rawat' => $value['no_rawat'],
          'umur' => $value['umur'],
          'jk' => $value['jk']
        ));
      }

      echo json_encode($result);
    } 


}