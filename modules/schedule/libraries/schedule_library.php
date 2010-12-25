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
        
        $day_number = 0; /* 0 for sunday, 1 for monday and so on */
        foreach($days as $day):
            $index = 0;
            $data = array();
            foreach($object[$day] as $item):
                $hr = explode(':',$item,2);
                $hr = $hr[0];
                $data['group_id'] = $group_id;
                $data['day'] = $day;
                $data['start_time'] = $item;
                $data['duration'] = $object[$day][$index++];
                $data['order'] = $index;
                $data['slot'] = $day_number*24 + $hr;
                $this->CI->schedule_model->add_schedule($data);
            endforeach;
            $day_number++;
        endforeach;
        
        flashMsg('success','Schedule added successfully');
        return;
    }
    
    function get_schedules(){
        return $this->CI->schedule_model->get_schedules();    
    }
    
    function find_schedules($where){
        return $this->CI->schedule_model->find_schedules($where);    
    }
    
    
}
?>
