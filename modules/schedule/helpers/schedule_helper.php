<?php

if(!function_exists('find_schedules')){
    function find_schedules($where = array()){
        $CI = & get_instance();
        $CI->load->module_library('schedule','schedule_library');
        $schedules = $CI->schedule_library->find_schedules($where);
        return $schedules;
    }
}