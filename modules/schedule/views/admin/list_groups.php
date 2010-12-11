<h2><?php print $header?></h2>

<div class="buttons">                
    <a href="<?php print  site_url('groups/admin/group/add')?>">
    <?php print  $this->page->icon('add');?>
    <?php print "Add Group" ?>
    </a>
</div><br/><br/>

<table class="data_grid" cellspacing="0">
    <thead>
        <tr>
            <th width=5%><?php print "ID" ?></th>
            <th><?php print "Group Name" ?></th>
            <th><?php print "Group Unix Name" ?></th>
            <th width=5% class="middle"><?php print $this->lang->line('general_edit')?></th>
            <th width=5% class="middle"><?php print $this->lang->line('general_delete')?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($results as $row):?>
        <tr>
            <td><?php print $row->group_id?></td>
            <td><?php print $row->group_name?></td>
            <td><?php print $row->group_machine_name?></td>
            <td class="middle"><a href="<?php print site_url('groups/admin/group/edit/'.$row->group_id)?>"><?php print img($this->config->item('shared_assets').'icons/pencil.png')?></a></td>
            <td class="middle"><a href="<?php print site_url('groups/admin/group/delete/'.$row->group_id)?>"><?php print img($this->config->item('shared_assets').'icons/cross.png')?></a></td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
