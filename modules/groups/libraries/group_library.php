<?php

class Group_Library{
    
    function Group_Library(){
        $this->CI = & get_instance();
        $this->CI->load->model('group_model');
    }
    
    
    function add_group($object){
        $data['group_name'] = $object['group_name'];
        $data['group_machine_name'] = str_replace (" ", "", $object['group_machine_name']);
        
        return $this->CI->group_model->add_group($data);
    }
    
    function edit_group($object,$where){
        $data['group_name'] = $object['group_name'];
        $data['group_machine_name'] = str_replace (" ", "", $object['group_machine_name']);
        return $this->CI->group_model->edit_group($data,$where);
    }
    
    function get_groups(){
        return $this->CI->group_model->get_groups();    
    }
    
    function get_group($where){
        return $this->CI->group_model->get_group($where);    
    }
    
    function delete_group($where){
        $status = $this->CI->group_model->delete_group($where);
        
        if($status){
            flashMsg('success',"Group Deleted Successfully");    
        }else{
            flashMsg('warning',"Sorry Group Can't be deleted");    
        }
        return;
        
    }
}
?>
