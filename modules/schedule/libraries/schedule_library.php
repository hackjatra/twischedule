<?php

class Schedule_Library{
    
    function Schedule_Library(){
        $this->CI = & get_instance();
        $this->CI->load->model('schedule_model');
    }
    
    
    function add_schedule($object){
        $group_id = $object['group_name'];
        
        $where['group_id'] = $group_id;
        $this->CI->schedule_model->delete_schedule($where);
        
        $days = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
        $index = 0;
        
        foreach($days as $day):
            $index = 0;
            $data = array();
            foreach($object[$day] as $item):
                $data['group_id'] = $group_id;
                $data['day'] = $day;
                $data['start_time'] = $item;
                $data['duration'] = $object[$day][$index++];
                $data['order'] = $index;
                
                $this->CI->schedule_model->add_schedule($data);
            endforeach;
        endforeach;
        
        flashMsg('success','Schedule added successfully');
        return;
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
