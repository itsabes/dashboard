<?php
class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('date_helper');
    }

    function getPasienOnDuty() {

        $this->db->select('a.no_rawat');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa b', 'a.no_rawat = b.no_rawat');
        $this->db->join('kamar c', 'a.kd_kamar = c.kd_kamar');
        $this->db->where('a.stts_pulang', '-'); 
        $this->db->where('c.kd_bangsal !=', 'B0091'); // ANGGREK BAYI
        $this->db->where('c.kd_bangsal !=', 'B0092'); // RAJAWALI BAYI
        $this->db->where('c.kd_bangsal !=', 'B0027'); // OK
        $this->db->where('c.kd_bangsal !=', 'B0059'); // EDELWEIS
        $this->db->where('c.kd_bangsal !=', 'BC022'); // ASOKA
        $this->db->like('b.status_bayar', '');
        return $this->db->get(); 
    }

    function getBedCovidEmpty() {

        $this->db->select('kelas');
        $this->db->from('kamar');       
        $this->db->where('statusdata', '1');  
        $this->db->where('STATUS', 'KOSONG');
        $this->db->where('kd_bangsal !=', 'K3BY');
        return $this->db->get(); 
    }

    function getPasienSchedule() {


        return $this->db->query("
        SELECT
            kamar_inap.no_rawat
        FROM
            kamar_inap
            INNER JOIN reg_periksa ON kamar_inap.no_rawat = reg_periksa.no_rawat
        WHERE
            stts_pulang = '-' 
            AND reg_periksa.status_bayar LIKE '%%' 
        ORDER BY
            kamar_inap.tgl_masuk,
            kamar_inap.jam_masuk
        ");
    }

    function getPasienBooked() {

        $this->db->select('kd_kamar');
        $this->db->from('kamar');        
        $this->db->where('STATUS', 'BOOKED');         
        return $this->db->get();

        
    }

    function getListRencanaKamarByKdkamar($kd_kamar, $tgl_plan) {

        $this->db->select('a.plan');
        $this->db->from('rencana_kamar_inap a');
        $this->db->where('a.kd_kamar', $kd_kamar);
        $this->db->where('a.status', '1');
        $this->db->where('a.tgl_plan >= ', $tgl_plan);
        return $this->db->get()->result();
    }

    function getRoom() {

        $this->db->select('kd_kamar');
        $this->db->from('kamar');
        $this->db->where('statusdata', '1'); 
        $this->db->where('kd_bangsal !=', 'B0091'); // ANGGREK BAYI
        $this->db->where('kd_bangsal !=', 'B0092'); // RAJAWALI BAYI
        $this->db->where('kd_bangsal !=', 'B0027'); // OK
        $this->db->where('kd_bangsal !=', 'B0059'); // EDELWEIS
        $this->db->where('kd_bangsal !=', 'BC022'); // ASOKA
        return $this->db->get();
    }

    function getList1(){ //PENYAKIT DALAM
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_mulai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P05');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }    
    
    function getList2(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_mulai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P09');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    } 

    function getList3(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_mulai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P12');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    } 

    function getList4(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_mulai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P07');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    } 

    function getList5(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_mulai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P01');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    } 

    function getList6(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_mulai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P04');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList7(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P33');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList8(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P38');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList9(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P40');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList10(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P45');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList11(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P36');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList12(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'UP02');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList13(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P47');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList14(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P14');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList15(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P14');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList16(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P14');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList17(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P14');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    function getList18(){ //SYARAF
        $day = date('D', strtotime("now"));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );

        $this->db->select(
                'a.kd_dokter,
                b.nm_dokter,
                a.kd_poli,
                c.nm_poli,
                a.hari_kerja,
                a.jam_mulai,
                SUBSTR(a.jam_mulai, 1,5) as jammulai,
                SUBSTR(a.jam_selesai, 1,5) jamselesai,
                a.jam_selesai,
                a.stts_prak');
        $this->db->from('jadwal a');
        $this->db->join('dokter b', 'a.kd_dokter = b.kd_dokter');
        $this->db->join('poliklinik c', 'a.kd_poli = c.kd_poli');
        $this->db->where('a.kd_poli', 'P14');
        $this->db->where('a.hari_kerja', $day_list[$day]);
        $this->db->order_by('a.jam_mulai', 'ASC');
        return $this->db->get()->result_array();
    }

    public function get_kunjungan_data($from, $to)
    {
        $query = $this->db->query("
            SELECT
                COUNT(DISTINCT rp.no_rawat) AS total_kunjungan,

                (
                    SELECT COUNT(no_rkm_medis)
                    FROM booking_registrasi
                    WHERE tanggal_periksa BETWEEN ? AND ?
                    AND limit_reg = '2. online'
                    AND status <> 'batal'
                ) +
                (
                    SELECT COUNT(DISTINCT no_rawat)
                    FROM referensi_mobilejkn_bpjs
                    WHERE tanggalperiksa BETWEEN ? AND ?
                    AND status <> 'batal'
                ) +
                (
                    (
                        SELECT COUNT(DISTINCT rp.no_rawat)
                        FROM reg_periksa rp
                        LEFT JOIN maping_poli_bpjs mp 
                            ON rp.kd_poli = mp.kd_poli_rs
                        LEFT JOIN booking_registrasi br 
                            ON rp.no_rkm_medis = br.no_rkm_medis
                        WHERE STR_TO_DATE(CONCAT(rp.tgl_registrasi, ' ', rp.jam_reg), '%Y-%m-%d %H:%i:%s')
                            BETWEEN ? AND ?
                        AND rp.stts != 'Batal'
                        AND mp.kd_poli_bpjs IS NOT NULL
                        AND rp.kd_poli NOT IN ('IGDK', 'KPN', 'P18', 'P33', 'P36', 'P39', 'U0083')
                    ) -
                    (
                        SELECT COUNT(no_rkm_medis)
                        FROM booking_registrasi
                        WHERE tanggal_periksa BETWEEN ? AND ?
                        AND limit_reg = '2. online'
                        AND status <> 'batal'
                    )
                ) AS jumlah_online,

                (
                    COUNT(DISTINCT rp.no_rawat) -
                    (
                        (
                            SELECT COUNT(no_rkm_medis)
                            FROM booking_registrasi
                            WHERE tanggal_periksa BETWEEN ? AND ?
                            AND limit_reg = '2. online'
                            AND status <> 'batal'
                        ) +
                        (
                            SELECT COUNT(DISTINCT no_rawat)
                            FROM referensi_mobilejkn_bpjs
                            WHERE tanggalperiksa BETWEEN ? AND ?
                            AND status <> 'batal'
                        ) +
                        (
                            (
                                SELECT COUNT(DISTINCT rp.no_rawat)
                                FROM reg_periksa rp
                                LEFT JOIN maping_poli_bpjs mp 
                                    ON rp.kd_poli = mp.kd_poli_rs
                                LEFT JOIN booking_registrasi br 
                                    ON rp.no_rkm_medis = br.no_rkm_medis
                                WHERE STR_TO_DATE(CONCAT(rp.tgl_registrasi, ' ', rp.jam_reg), '%Y-%m-%d %H:%i:%s')
                                    BETWEEN ? AND ?
                                AND rp.stts != 'Batal'
                                AND mp.kd_poli_bpjs IS NOT NULL
                                AND rp.kd_poli NOT IN ('IGDK', 'KPN', 'P18', 'P33', 'P36', 'P39', 'U0083')
                            ) -
                            (
                                SELECT COUNT(no_rkm_medis)
                                FROM booking_registrasi
                                WHERE tanggal_periksa BETWEEN ? AND ?
                                AND limit_reg = '2. online'
                                AND status <> 'batal'
                            )
                        )
                    )
                ) AS jumlah_onsite,

                ROUND(
                    100.0 *
                    (
                        (
                            SELECT COUNT(no_rkm_medis)
                            FROM booking_registrasi
                            WHERE tanggal_periksa BETWEEN ? AND ?
                            AND limit_reg = '2. online'
                            AND status <> 'batal'
                        ) +
                        (
                            SELECT COUNT(DISTINCT no_rawat)
                            FROM referensi_mobilejkn_bpjs
                            WHERE tanggalperiksa BETWEEN ? AND ?
                            AND status <> 'batal'
                        ) +
                        (
                            (
                                SELECT COUNT(DISTINCT rp.no_rawat)
                                FROM reg_periksa rp
                                LEFT JOIN maping_poli_bpjs mp 
                                    ON rp.kd_poli = mp.kd_poli_rs
                                LEFT JOIN booking_registrasi br 
                                    ON rp.no_rkm_medis = br.no_rkm_medis
                                WHERE STR_TO_DATE(CONCAT(rp.tgl_registrasi, ' ', rp.jam_reg), '%Y-%m-%d %H:%i:%s')
                                    BETWEEN ? AND ?
                                AND rp.stts != 'Batal'
                                AND mp.kd_poli_bpjs IS NOT NULL
                                AND rp.kd_poli NOT IN ('IGDK', 'KPN', 'P18', 'P33', 'P36', 'P39', 'U0083')
                            ) -
                            (
                                SELECT COUNT(no_rkm_medis)
                                FROM booking_registrasi
                                WHERE tanggal_periksa BETWEEN ? AND ?
                                AND limit_reg = '2. online'
                                AND status <> 'batal'
                            )
                        )
                    ) / COUNT(DISTINCT rp.no_rawat),
                    2
                ) AS persen_online,

                ROUND(
                    100.0 *
                    (
                        COUNT(DISTINCT rp.no_rawat) -
                        (
                            (
                                SELECT COUNT(no_rkm_medis)
                                FROM booking_registrasi
                                WHERE tanggal_periksa BETWEEN ? AND ?
                                AND limit_reg = '2. online'
                                AND status <> 'batal'
                            ) +
                            (
                                SELECT COUNT(DISTINCT no_rawat)
                                FROM referensi_mobilejkn_bpjs
                                WHERE tanggalperiksa BETWEEN ? AND ?
                                AND status <> 'batal'
                            ) +
                            (
                                (
                                    SELECT COUNT(DISTINCT rp.no_rawat)
                                    FROM reg_periksa rp
                                    LEFT JOIN maping_poli_bpjs mp 
                                        ON rp.kd_poli = mp.kd_poli_rs
                                    LEFT JOIN booking_registrasi br 
                                        ON rp.no_rkm_medis = br.no_rkm_medis
                                    WHERE STR_TO_DATE(CONCAT(rp.tgl_registrasi, ' ', rp.jam_reg), '%Y-%m-%d %H:%i:%s')
                                        BETWEEN ? AND ?
                                    AND rp.stts != 'Batal'
                                    AND mp.kd_poli_bpjs IS NOT NULL
                                    AND rp.kd_poli NOT IN ('IGDK', 'KPN', 'P18', 'P33', 'P36', 'P39', 'U0083')
                                ) -
                                (
                                    SELECT COUNT(no_rkm_medis)
                                    FROM booking_registrasi
                                    WHERE tanggal_periksa BETWEEN ? AND ?
                                    AND limit_reg = '2. online'
                                    AND status <> 'batal'
                                )
                            )
                        )
                    ) / COUNT(DISTINCT rp.no_rawat),
                    2
                ) AS persen_onsite

            FROM reg_periksa rp
            LEFT JOIN maping_poli_bpjs mp ON rp.kd_poli = mp.kd_poli_rs
            WHERE CONCAT(rp.tgl_registrasi, ' ', rp.jam_reg) BETWEEN ? AND ?
                AND rp.stts != 'Batal'
                AND mp.kd_poli_bpjs IS NOT NULL
        ", [
            $from, $to,               // jumlah_online (booking)
            $from, $to,               // jumlah_online (mobilejkn)
            $from . ' 00:00:00', $to . ' 23:59:59', // subquery online total kunjungan
            $from, $to,               // jumlah_online - booking
            $from, $to,               // jumlah_onsite (booking)
            $from, $to,               // jumlah_onsite (mobilejkn)
            $from . ' 00:00:00', $to . ' 23:59:59', // subquery onsite total kunjungan
            $from, $to,               // jumlah_onsite - booking
            $from, $to,               // persen_online (booking)
            $from, $to,               // persen_online (mobilejkn)
            $from . ' 00:00:00', $to . ' 23:59:59', // subquery persen_online total kunjungan
            $from, $to,               // persen_online - booking
            $from, $to,               // persen_onsite (booking)
            $from, $to,               // persen_onsite (mobilejkn)
            $from . ' 00:00:00', $to . ' 23:59:59', // subquery persen_onsite total kunjungan
            $from, $to,               // persen_onsite - booking
            $from . ' 00:00:00', $to . ' 23:59:59' // total_kunjungan waktu utama
        ]);

        return $query->row_array();
    }



}    