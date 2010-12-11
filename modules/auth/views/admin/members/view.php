<h2><?php print $header?></h2>

<div class="buttons">                
	<a href="<?php print  site_url('auth/admin/members/form')?>">
    <?php print  $this->page->icon('add');?>
    <?php print $this->lang->line('userlib_create_user')?>
    </a>
</div><br/><br/>

<?php print form_open('auth/admin/members/delete')?>
<table class="data_grid" cellspacing="0">
    <thead>
        <tr>
            <th width=5%><?php print $this->lang->line('general_id')?></th>
            <th><?php print $this->lang->line('userlib_username')?></th>
            <th><?php print $this->lang->line('userlib_email')?></th>
            <th><?php print $this->lang->line('userlib_group')?></th>
            <th><?php print $this->lang->line('userlib_last_visit')?></th>
            <th width=5% class="middle"><?php print $this->lang->line('userlib_active')?></th> 
            <th width=5% class="middle"><?php print $this->lang->line('general_edit')?></th>
            <th width=10%><?php print form_checkbox('all','select',FALSE)?><?php print $this->lang->line('general_delete')?></th>        
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan=7>&nbsp;</td>
            <td><?php print form_submit('delete',$this->lang->line('general_delete'),'onClick="return confirm(\''.$this->lang->line('userlib_delete_user_confirm').'\');"')?></td>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach($members->result_array() as $row):
            // Check if this user account belongs to the person logged in
            // if so don't allow them to delete it
            $delete  = ($row['id'] == $this->session->userdata('id')?'&nbsp;':form_checkbox('select[]',$row['id'],FALSE));            
        ?>
        <tr>
            <td><?php print $row['id']?></td>
            <td><?php print $row['username']?></td>
            <td><?php print $row['email']?></td>
            <td><?php print $row['group']?></td>
            <td><?php print $row['last_visit']?></td>
            <td class="middle"><?php print img($this->config->item('shared_assets').'icons/'.($row['active']?'tick':'cross').'.png')?></td>
            <td class="middle"><a href="<?php print site_url('auth/admin/members/form/'.$row['id'])?>"><?php print img($this->config->item('shared_assets').'icons/pencil.png')?></a></td>
            <td><?php print $delete?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php print form_close()?>