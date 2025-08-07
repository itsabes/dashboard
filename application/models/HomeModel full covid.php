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
        $this->db->join('kamar c', 'a.kd_kamar = c.kd_kamar');
        $this->db->where('a.stts_pulang', '-'); 
        $this->db->like('b.status_bayar', '');
        return $this->db->get(); 
    }

    function getBedCovidEmpty() {

        $this->db->select('kelas');
        $this->db->from('kamar');       
        $this->db->where('statusdata', '1');  
        $this->db->where('STATUS', 'KOSONG'); 
        return $this->db->get(); 
    }

    function getPasienSchedule() {


        return $this->db->query("
        SELECT
            kamar_inap.no_rawat
        FROM
            kamar_inap
            INNER JOIN reg_periksa ON kamar_inap.no_rawat = reg_periksa.no_rawat
            INNER JOIN jadwal_pulang ON kamar_inap.no_rawat = jadwal_pulang.no_rawat
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

    function getRoom() {

        $this->db->select('kd_kamar');
        $this->db->from('kamar');        
        $this->db->where('statusdata', '1'); 
        $this->db->where('kd_bangsal !=', 'CVD13'); 
        return $this->db->get();        
    }

    function getListLiliy(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD11' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getListAnyelir(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD17' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getListEdelwis(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD16' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

     function getRuangAlamanda(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD18' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

     function getListLotus(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'NCVD8'
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

     function getListCempaka(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'NCVD7'
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getRuangHCU(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD26' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getRuangICU(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD14' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getRuangDahlia(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD15' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getRuangAnggrek(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD21' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getRuangMelati(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD23' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }
     
    function getRuangMawar(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD22' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

    function getRuangKenangga(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD24' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

     function getRuangTulip(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD27' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

     function getRuangBougenvil(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD28' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }

     function getRuangPerina(){
        return $this->db->query("
        SELECT
            a.kd_kmr,
            a.STATUS,
            c.nm_pasien,
            c.umur,
            a.nama_pasien_spgdt,
            a.umur_pasien_spgdt 
        FROM
            (
            SELECT
                a.kd_kamar AS kd_kmr,
                a.`status`,
                (SELECT a.no_rawat FROM kamar_inap a WHERE a.kd_kamar = kd_kmr AND a.stts_pulang = '-' ) AS no_rawat,
                (SELECT a.nama_pasien FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS nama_pasien_spgdt, 
                (SELECT a.umur FROM pasien_spgdt_covid a WHERE a.ruangan_dituju = kd_kmr AND a.STATUS = '1' ) AS umur_pasien_spgdt 	
            FROM
                kamar a 
            WHERE
                a.kd_bangsal = 'CVD25' 
                AND a.statusdata = '1' 
            ) AS a
            LEFT JOIN reg_periksa b ON a.no_rawat = b.no_rawat
            LEFT JOIN pasien c ON b.no_rkm_medis = c.no_rkm_medis 
        ORDER BY
            LENGTH( a.kd_kmr ) ASC,
            a.kd_kmr ASC")->result_array();
     }
}