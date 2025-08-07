<?php
class PatientOnSiteModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllPatientList() {
        return $this->db->query("
        SELECT
        a.no_rawat,
        c.no_rkm_medis,
        b.nm_pasien,
        b.jk, 
        b.umur,
        d.kd_kamar,
        DATEDIFF( CURRENT_DATE, c.tgl_registrasi ) + 1 AS lama,
        IFNULL(f.tanggal_pulang, 0 ) AS jadwal_pulang
    FROM
        kamar_inap a
        INNER JOIN reg_periksa c ON a.no_rawat = c.no_rawat
        INNER JOIN pasien b ON c.no_rkm_medis = b.no_rkm_medis
        INNER JOIN kamar d ON a.kd_kamar = d.kd_kamar
        INNER JOIN bangsal e ON d.kd_bangsal = e.kd_bangsal
        LEFT JOIN  jadwal_pulang f ON a.no_rawat = f.no_rawat
    WHERE
        stts_pulang = '-' 
        AND c.status_bayar LIKE '%%' 
    ORDER BY
        e.nm_bangsal,
        a.tgl_masuk,
        a.jam_masuk")->result_array();
    }

    function postScheduleGoHome($data) {
        $this->db->replace('jadwal_pulang',$data);
    }


}