<?php

class Schedule extends Admin_Controller{
    
    
    function Schedule(){
        parent::Admin_Controller();
        $this->load->library('schedule_library');
        $this->load->module_helper('groups','group_helper');
    }
    
    function index(){
        $this->show();
    }
    
    function show(){
        $data['header'] = 'List of Groups';
        $data['module'] = 'schedule';
        $data['page'] = $this->config->item('backendpro_template_admin') . 'list_schedule';
        $data['results'] = $this->schedule_library->get_schedules();
        $this->load->view($this->_container,$data);
    }
    
    
    function add(){
        if($_POST){
            $this->schedule_library->add_schedule($_POST);
            redirect('schedule/admin/schedule/show');
        }else{
            $data['header'] = 'Add Schedule';
            $data['module'] = 'schedule';
            $data['page'] = $this->config->item('backendpro_template_admin') . 'add_schedule';
            $this->load->view($this->_container,$data);
        }
        
    }
    
    function edit($group_id=0){
        
        if($_POST){
            $object = $_POST;
            $where['group_id'] = $object['group_id'];
            $this->group_library->edit_group($object,$where);
            redirect('groups/admin/group/show');
            
        }else{
            $data['header'] = 'Edit Group';
            $data['module'] = 'groups';
            $where['group_id'] = $group_id;
            $data['group'] = $this->group_library->get_group($where);
            $data['page'] = $this->config->item('backendpro_template_admin') . 'edit_groups';
            $this->load->view($this->_container,$data);
        }
    }
    
    function delete($group_id){
        
        if($group_id){
            $where['group_id'] = $group_id;
            $this->group_library->delete_group($where);
        }
        redirect('groups/admin/group/show');
    }
    
    
}