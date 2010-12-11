<?php echo form_open($this->uri->uri_string,array('method'=>'post'),array('group_id'=>$group->group_id)); ?>

<fieldset>
    <label>Group Name</label>
    <input type="text" name="group_name" value="<?= $group->group_name ?>" />
    
    <label>Group Unix Name</label>
    <input type="text" name="group_machine_name"  value="<?= $group->group_machine_name ?>" />
    
    <br/>
    <br/>
    <input type="submit" value="Edit Group" />
    
    
    
</fieldset>

<?php echo form_close() ?>