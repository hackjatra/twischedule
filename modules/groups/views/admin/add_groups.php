<?php echo form_open($this->uri->uri_string); ?>

<fieldset>
    <label>Group Name</label>
    <input type="text" name="group_name" />
    
    <label>Group Unix Name</label>
    <input type="text" name="group_machine_name" />
    
    <br/>
    <br/>
    <input type="submit" value="Add Group" />
    
    
    
</fieldset>

<?php echo form_close() ?>