<?php

class Group_Model extends Base_model{
    
    var $_TABLES;
    
    function Group_Model(){
        parent::Base_model();
        $this->_prefix = 'hj_';
        $this->_TABLES = array( 'Groups' => $this->_prefix . 'group',
                        );
    }
                         
    function get_groups(){
        $query = $this->fetch('Groups');
        
        if($query){
            return $query->result();
        }else{
            return false;
        }
    }
    
    function get_group($where){
        $this->db->where($where);
        $query = $this->fetch('Groups');
        
        if($query){
            return $query->first_row();
        }else{
            return false;
        }
    }
    
    function add_group($data){
        return $this->insert('Groups',$data);
    }
    
    function delete_group($where){
        return $this->delete('Groups',$where);
    }
    
    function edit_group($data, $where){
        return $this->update('Groups',$data,$where);
    }
    
    

}    