<script>
    function remove_item(id){
        $("#"+id).remove();
        return false;
    }
    
    $(function(){
        
        var counter = 0;
        
        $('#group').change(function(){
             
        });
        
        $('#sunday_add_schedule').click(function(){
            $html = '<div  id="sunday_'+counter+'"  ><input type="text" name="sunday[]" id="sunday_field_'+counter+'" /> Duration <input type="text" name="sunday_duration[]" ><a href="#" onclick="return remove_item('+"'sunday_"+counter+"'"+')"> Remove </a></div>';
            $('#sunday_schedule').append($html);
            $('#sunday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
        
        $('#monday_add_schedule').click(function(){
            $html = '<div  id="monday_'+counter+'"  ><input type="text" name="monday[]" id="monday_field_'+counter+'" /> Duration <input type="text" name="monday_duration[]" ><a href="#" onclick="return remove_item('+"'monday_"+counter+"'"+')"> Remove </a></div>';
            $('#monday_schedule').append($html);
            $('#monday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
        
        $('#tuesday_add_schedule').click(function(){
            $html = '<div  id="tuesday_'+counter+'"  ><input type="text" name="tuesday[]" id="tuesday_field_'+counter+'" /> Duration <input type="text" name="tuesday_duration[]" ><a href="#" onclick="return remove_item('+"'tuesday_"+counter+"'"+')"> Remove </a></div>';
            $('#tuesday_schedule').append($html);
            $('#tuesday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
        
        $('#wednesday_add_schedule').click(function(){
            $html = '<div  id="wednesday_'+counter+'"  ><input type="text" name="wednesday[]" id="wednesday_field_'+counter+'" /> Duration <input type="text" name="wednesday_duration[]" ><a href="#" onclick="return remove_item('+"'wednesday_"+counter+"'"+')"> Remove </a></div>';
            $('#wednesday_schedule').append($html);
            $('#wednesday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
        
        $('#thursday_add_schedule').click(function(){
            $html = '<div  id="thursday_'+counter+'"  ><input type="text" name="thursday[]" id="thursday_field_'+counter+'" /> Duration <input type="text" name="thursday_duration[]" ><a href="#" onclick="return remove_item('+"'thursday_"+counter+"'"+')"> Remove </a></div>';
            $('#thursday_schedule').append($html);
            $('#thursday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
        
        $('#friday_add_schedule').click(function(){
            $html = '<div  id="friday_'+counter+'"  ><input type="text" name="friday[]" id="friday_field_'+counter+'" /> Duration <input type="text" name="friday_duration[]" ><a href="#" onclick="return remove_item('+"'friday_"+counter+"'"+')"> Remove </a></div>';
            $('#friday_schedule').append($html);
            $('#friday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
        
        $('#saturday_add_schedule').click(function(){
            $html = '<div  id="saturday_'+counter+'"  ><input type="text" name="saturday[]" id="saturday_field_'+counter+'" /> Duration <input type="text" name="saturday_duration[]" ><a href="#" onclick="return remove_item('+"'friday_"+counter+"'"+')"> Remove </a></div>';
            $('#saturday_schedule').append($html);
            $('#saturday_field_'+counter).timepicker({});
            counter++;          
            return false;
            
        });
    });

</script>
<?php echo form_open($this->uri->uri_string); ?>

<fieldset>
    <label>Groups</label>
    
    <select name="group_name" id='group'>
        <?php 
            $groups = get_groups();      
            foreach($groups as $group): 
        ?>
                <option value="<?= $group->group_id ?>" ><?= $group->group_name ?></option>
        <?php endforeach; ?>
    </select>
    
    <label>Sunday <a href="#" id='sunday_add_schedule'>Add Schedule</a></label>
    <div id='sunday_schedule'></div>
    
    <label>Monday <a href="#" id='monday_add_schedule'>Add Schedule</a></label>
    <div id='monday_schedule'></div>
    
    <label>Tuesday <a href="#" id='tuesday_add_schedule'>Add Schedule</a></label>
    <div id='tuesday_schedule'></div>
    
    <label>Wednesday <a href="#" id='wednesday_add_schedule'>Add Schedule</a></label>
    <div id='wednesday_schedule'></div>
    
    <label>Thursday <a href="#" id='thursday_add_schedule'>Add Schedule</a></label>
    <div id='thursday_schedule'></div>
    
    <label>Friday <a href="#" id='friday_add_schedule'>Add Schedule</a></label>
    <div id='friday_schedule'></div>
    
    <label>Saturday <a href="#" id='saturday_add_schedule'>Add Schedule</a></label>
    <div id='saturday_schedule'></div>
    
    
    
    <br/>
    <br/>
    <input type="submit" value="Add Schedule" />

</fieldset>
<?php echo form_close() ?>