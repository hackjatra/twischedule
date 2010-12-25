<h2><?php print $header?></h2>

<div class="buttons">                
    <a href="<?php print  site_url('schedule/admin/schedule/add')?>">
    <?php print  $this->page->icon('add');?>
    <?php print "Add Schedule" ?>
    </a>
</div><br/><br/>

<table class="data_grid" cellspacing="0">
    <thead>
        <tr>
            <th><?php print "Group" ?></th>
            <th><?php print "Sunday" ?></th>
            <th><?php print "Monday" ?></th>
            <th><?php print "Tuesday" ?></th>
            <th><?php print "Wednesday" ?></th>
            <th><?php print "Thursday" ?></th>
            <th><?php print "Friday" ?></th>
            <th><?php print "Saturday" ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $days = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday'); ?>
        <?php foreach(get_groups() as $group):?>
        <tr>
            <td><?php print $group->group_name;?></td>
            <?php foreach($days as $day): ?>
                <?php 
                    $where = array();
                    $where['day'] = $day;
                    $where['group_id'] = $group->group_id;
                    $schedules = find_schedules($where);
                    
                    $str = '';
                    foreach($schedules as $schedule):
                        $str .= $schedule->start_time.' / '.$schedule->duration."<br/>";
                    endforeach;
                    
                ?>
                <td><?php print $str;?></td>
            <?php endforeach; ?>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
