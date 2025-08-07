<?php
class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    function getPasienOnDuty() {

        $this->db->select('a.no_rawat');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa b', 'a.no_rawat = b.no_rawat');
        $this->db->where('a.stts_pulang', '-'); 
        $this->db->like('b.status_bayar', '');
        return $this->db->get(); 
    }

    function getBedCovidEmpty() {

        $this->db->select('kelas');
        $this->db->from('kamar');
        $this->db->where("( kd_bangsal = 'CVD11' OR kd_bangsal = 'CVD21' OR kd_bangsal = 'CVD22' OR kd_bangsal = 'CVD23' OR kd_bangsal = 'CVD24' OR kd_bangsal = 'CVD26'  OR kd_bangsal = 'CVD27' )");
        $this->db->where('statusdata', '1');  
        $this->db->where('STATUS', 'KOSONG'); 
        return $this->db->get(); 
    }

    function getPasienBooked() {
        $this->db->select('kelas');
        $this->db->from('kamar');
        $this->db->where("( kd_bangsal = 'CVD11' OR kd_bangsal = 'CVD21' OR kd_bangsal = 'CVD22' OR kd_bangsal = 'CVD23' OR kd_bangsal = 'CVD24' OR kd_bangsal = 'CVD26'  OR kd_bangsal = 'CVD27' )");
        $this->db->where('statusdata', '1');  
        $this->db->where('STATUS', 'BOOKED'); 
        return $this->db->get();
    }

    function getPasienSchedule() {
        $this->db->select('kelas');
        $this->db->from('kamar');
        $this->db->where("( kd_bangsal = 'CVD11' OR kd_bangsal = 'CVD21' OR kd_bangsal = 'CVD22' OR kd_bangsal = 'CVD23' OR kd_bangsal = 'CVD24' OR kd_bangsal = 'CVD26'  OR kd_bangsal = 'CVD27' )");
        $this->db->where('statusdata', '1');  
        $this->db->where('STATUS', 'SCHEDULE'); 
        return $this->db->get();
    }

    function getListLiliy(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD11');  
        $this->db->like('c.status_bayar', ''); 
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC');
		return $this->db->get();
     }

    function getRuangHCU(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD26');  
        $this->db->like('c.status_bayar', ''); 
		return $this->db->get();
     }

    function getRuangICU(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD14');  
        $this->db->like('c.status_bayar', ''); 
		return $this->db->get();
     }

    function getRuangAnggrek(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD21');  
        $this->db->like('c.status_bayar', '');
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC'); 
		return $this->db->get();
     }

    function getRuangMelati(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD23');  
        $this->db->like('c.status_bayar', '');
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC'); 
		return $this->db->get();
     }
     
    function getRuangMawar(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD22');  
        $this->db->like('c.status_bayar', '');
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC'); 
		return $this->db->get();
     }

    function getRuangKenangga(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD24');  
        $this->db->like('c.status_bayar', '');
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC'); 
		return $this->db->get();
     }

     function getRuangTulip(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD27');  
        $this->db->like('c.status_bayar', '');
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC'); 
		return $this->db->get();
     }

     function getRuangPerina(){
        $this->db->select('b.nm_pasien,
        b.umur,
        a.kd_kamar');
        $this->db->from('kamar_inap a');
        $this->db->join('reg_periksa c', 'a.no_rawat = c.no_rawat');
        $this->db->join('pasien b', 'c.no_rkm_medis = b.no_rkm_medis');
        $this->db->join('kamar d', 'a.kd_kamar = d.kd_kamar');
        $this->db->join('bangsal e', 'd.kd_bangsal = e.kd_bangsal');
        $this->db->where('a.stts_pulang', '-');  
        $this->db->where('e.kd_bangsal', 'CVD25');  
        $this->db->like('c.status_bayar', '');
        $this->db->order_by('LENGTH(a.kd_kamar)', 'ASC');
        $this->db->order_by('a.kd_kamar', 'ASC'); 
		return $this->db->get();
     }
}