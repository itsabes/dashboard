<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('get_day_name_by_date')) {
    function get_day_name_by_date($date) {

        $day = date('D', strtotime($date));
        $day_list = array(
            "Mon" => "SENIN",
            "Tue" => "SELASA",
            "Wed" => "RABU",
            "Thu" => "KAMIS",
            "Fri" => "JUMAT",
            "Sat" => "SABTU",
            "Sun" => "MINGGU"
        );
        return $day_list[$day];
    }
}

if(!function_exists('change_format_date')) {
    function change_format_date($date, $format) {

        return date($format, strtotime($date));
    }
}

if(!function_exists('get_date')) {
    function get_date($format = 'Y-m-d') {
        date_default_timezone_set("Asia/Jakarta");
        return date($format);
    }
}

if(!function_exists('get_time')) {
    function get_time($format = 'H:i:s') {
        date_default_timezone_set("Asia/Jakarta");
        return date($format);
    }
}

if(!function_exists('get_cur_datetime')) {
    function get_cur_datetime($format = 'Y-m-d H:i:s') {
        date_default_timezone_set("Asia/Jakarta");
        return date($format);
    }
}

if(!function_exists('to_timestamp')) {
    function to_timestamp($datetime) {
        date_default_timezone_set("Asia/Jakarta");
        return (new DateTime($datetime))->getTimestamp();
    }
}

if(!function_exists('to_datetime')) {
    function to_datetime($timestamp) {
        date_default_timezone_set("Asia/Jakarta");
        $datetime =  new DateTime();
        $datetime->setTimestamp($timestamp);
        return $datetime->format('Y-m-d H:i:s');
    }
}

if(!function_exists('validangka')) {
    function validangka($angka){
        if (isset($angka)) {
            if(!is_numeric($angka)) {
                return 0;
            }else{
                return $angka;
            }
        }else{
            return 0;
        }
    }
}

if(!function_exists('get_age_from_date')) {
    function get_age_from_date($date) {
        date_default_timezone_set("Asia/Jakarta");
        $birth_date = new DateTime($date);
        $now = new DateTime();
        $interval = $now->diff($birth_date);
        return array("year" => $interval->y, "month" => $interval->m, "day" => $interval->d);
    }
}

if(!function_exists('get_date_diff_by_datenow')) {
    function get_date_diff_by_datenow($date) {
        date_default_timezone_set("Asia/Jakarta");
        $now = new DateTime();
        $date = new DateTime($date);
        $interval = $now->diff($date);
        return $interval;
    }
}

if(!function_exists('get_date_diff_by_date')) {
    function get_date_diff_by_date($date_1, $date_2) {
        date_default_timezone_set("Asia/Jakarta");
        $date_1 = new DateTime($date_1);
        $date_2 = new DateTime($date_2);
        $interval = $date_1->diff($date_2);
        return $interval;
    }
}

/**
 * @desctription untuk membandingkan tanggal
 */
if(!function_exists('datetime_compare')) {
    function datetime_compare($date_1, $modify_value_1 = null, $date_2, $modify_value_2 = null) {
        
        date_default_timezone_set("Asia/Jakarta");
        $date_1 = new DateTime($date_1);
        if($modify_value_1 != null) $date_1->modify($modify_value_1);
        $date_2 = new DateTime($date_2);
        if($modify_value_2 != null) $date_2->modify($modify_value_2);
        return $date_1 > $date_2;
    }
}

if(!function_exists('get_datetime')) {
    function get_datetime($penambahan_detik) {

        // penambahan_detik digunakan untuk mengelabuhi zensiva. sebab akan dianggap spam
        date_default_timezone_set("Asia/Jakarta");
        return date('Y-m-d H:i:s', time() + $penambahan_detik);
    }
}


?>