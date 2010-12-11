<?php

class Group extends Admin_Controller{
    
    
    function Group(){
        parent::Admin_Controller();
        $this->load->library('group_library');
    }
    
    function index(){
        $this->show();
    }
    
    function show(){
        $data['header'] = 'List of Groups';
        $data['module'] = 'groups';
        $data['page'] = $this->config->item('backendpro_template_admin') . 'list_groups';
        $data['results'] = $this->group_library->get_groups();
        $this->load->view($this->_container,$data);
    }
    
    
    
    function add(){
        
        if($_POST){
            
            $this->group_library->add_group($_POST);
            redirect('groups/admin/group/show');
            
        }else{
            $data['header'] = 'Add Group';
            $data['module'] = 'groups';
            $data['page'] = $this->config->item('backendpro_template_admin') . 'add_groups';
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