<?php

class Schedule_Model extends Base_model{
    
    var $_TABLES;
    
    function Schedule_Model(){
        parent::Base_model();
        $this->_prefix = 'hj_';
        $this->_TABLES = array( 'Schedule' => $this->_prefix . 'schedule',
                        );
    }
                         
    function get_schedules(){
        $query = $this->fetch('Schedule');
        
        if($query){
            return $query->result();
        }else{
            return false;
        }
    }
    
    function get_schedule($where){
        $this->db->where($where);
        $query = $this->fetch('Schedule');
        
        if($query){
            return $query->first_row();
        }else{
            return false;
        }
    }
    
    function add_schedule($data){
        return $this->insert('Schedule',$data);
    }
    
    function delete_schedule($where){
        return $this->delete('Schedule',$where);
    }
    
    function edit_schedule($data, $where){
        return $this->update('Schedule',$data,$where);
    }
    
    

}    