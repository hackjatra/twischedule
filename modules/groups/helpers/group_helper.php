<?php

if(!function_exists('get_group')){
    function get_group($group_id){
        $CI = & get_instance();
        $CI->load->module_library('groups','group_library');
        $where['group_id'] = $group_id;
        $result = $CI->group_library->get_group($where);
        return $result;
    }
}

if(!function_exists('get_groups')){
    function get_groups(){
        $CI = & get_instance();
        $CI->load->module_library('groups','group_library');
        $results = $CI->group_library->get_groups();
        return $results;
    }
}

if(!function_exists('find_groups')){
    function find_groups($where = array()){
        $CI = & get_instance();
        $CI->load->module_library('groups','group_library');
        $results = $CI->group_library->find_groups($where);
        return $results;
    }
}