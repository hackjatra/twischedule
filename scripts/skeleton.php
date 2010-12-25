<?php

date_default_timezone_set('Asia/Katmandu');

require_once 'my_connection.php';

function mdie($msg){
    echo "<pre>";
    print_r($msg);
    die();
}

$prefix = 'hj_';
$TABLES = array('schedule'=>$prefix."schedule",'group'=>$prefix."group");

$days = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');

//echo "<pre>";
/*print_r(getCompleteSchedule(1,0))."<br>";
print_r(getCompleteSchedule(1,1))."<br>";
print_r(getCompleteSchedule(1,2))."<br>";
print_r(getCompleteSchedule(1,3))."<br>";
print_r(getCompleteSchedule(1,4))."<br>";
print_r(getCompleteSchedule(1,5))."<br>";
print_r(getCompleteSchedule(1,6))."<br>";*/

//print_r(getScheduleInComingUpHr(1));


function getCompleteSchedule($group,$day=null){		// $group => 0-6  $day=> 0-6
    global $TABLES,$days;	
    
    $sql = "
                SELECT * from {$TABLES['schedule']} s
                JOIN  {$TABLES['group']} g on (s.group_id = g.group_id)
                where g.group_machine_name = '{$group}'";    
                
    if(!is_null($day)){
        
        $sql .=" AND day like '{$days[$day]}' ";
        
    }
    
    
    $query = mysql_query($sql);
    
    $schedule = array();
    
    while($data = mysql_fetch_object($query)){
        $schedule[] = $data;
    }
    
    return $schedule;
    
    
    
    // return the sehedule on the basis of $group [and $day]
	// if $day is not set return complete schedule for week
}

function getScheduleInComingUpHr($group){		// $group => 0-6
	global $TABLES,$days;    
    
    $day = strtolower(date('l'));
    $hour = date('H');
    
    $day_number = array_search($day,$days);
    
    $slot = $day_number*24 + $hour;
    
    $sql = "
                SELECT * from {$TABLES['schedule']} s
                JOIN  {$TABLES['group']} g on (s.group_id = g.group_id)
                where g.group_machine_name = '{$group}' AND slot = {$slot}";    
                
    
    $query = mysql_query($sql);
    
    $schedule = false;
    
    if($data = mysql_fetch_object($query)){
        $schedule = $data;
    }
    
    return $schedule;
    // return the schedule for $group that starts within 1hr.
}
