<?php

date_default_timezone_set('Asia/Katmandu');

$DEBUG=false;
ob_start();
require_once '../lib/twitteroauth.php';
require_once '../twitter.conf.php';
require_once 'my_connection.php';

$GROUP_ALIAS = array("","g","group","samuha","schedule");
$ALPHABET_NE_ROMANISED = array("ka","kha","ga","gha","na","cha","chha");

$account = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $auth["tweetnea"]["oauth_token"], $auth["tweetnea"]["oauth_token_secret"]);

/**
 * Retun schedule(string) for the group.
 */
function getSchedule($group){
    
    $sql = "SELECT group_id from hj_group where group_machine_name = '{$group}'";
    $query = mysql_query($sql);
    if($data = mysql_fetch_object($query)){
        $group_id = $data->group_id;
    }
    
    $day = strtolower(date('l'));
    $sql = "SELECT * from hj_schedule where group_id = '{$group_id}' and day = '{$day}'";
    
    $query = mysql_query($sql);
    
    $str = '';
    
    while($data = mysql_fetch_object($query)){
        $str .= "Start Time: ".$data->start_time." Duration:".$data->duration." ";
    }
    
    return $str;
}


/**
 * Extract the group/samuha from the tags
 */
function getGroup($tags){
    global $GROUP_ALIAS,$ALPHABET_NE_ROMANISED,$ALPHABET_NE;
    $ret=array();
    foreach($tags as $tag){
        preg_match("/([^0-9]*)([0-9]*)/i",$tag,$matches);
        array_shift($matches);
        /* In the tag is just string */
        if(empty($matches[1])){
            /* Check if the string is romanized nepali (samuha) */
            if($key=array_search($matches[0],$ALPHABET_NE_ROMANISED))
                $ret[]=((int)$key);
        }
        /* If there is number attached */
        else{
            if(in_array($matches[0],$GROUP_ALIAS))
                $ret[]=((int)$matches[1]);
        }
    }
    return array_unique($ret);
}

function save_id_str($id){
    $sql=sprintf('INSERT INTO `loadshedding_revealed`.`hj_replied` (`status_id`) VALUES ("%s");',$id);
    $res = mysql_query($sql);
    // TODO: Check for error.
}

function is_replied($id){
    $sql=sprintf('SELECT * FROM `hj_replied` WHERE `status_id` LIKE "%s"',$id);
    $res = mysql_query($sql);
    if($a=@mysql_fetch_object($res))      // Such id exist in database
        return true;
    return false;
}

/* Post Status */
function postStatus($text,$in_reply_to=NULL){
    global $account;
    if($in_reply_to!=NULL){
        $text= "@".$in_reply_to->user->screen_name.", ".$text;
        $response=$account->post('statuses/update', array('status' => $text, "in_reply_to_status_id" => $in_reply_to->id_str));
    }
    else $response=$account->post('statuses/update', array('status' => $text));
    echo "[*] ".$text;
}

/** 
 * Reply the schedule of the groups(array) to the user(tweet)
 */
function replySchedule($tweet,$groups){
    foreach ($groups as $group){
        $message=getSchedule($group);
        postStatus("Under Construction", $tweet);
    }
}

/* get the mentions and process the request */
$response=$account->get('statuses/mentions');
foreach ($response as $key => $tweet){
    if(is_replied($tweet->id_str)) continue;
    preg_match_all("/#([^ ]*)/i",$tweet->text,$matches);
    $matches=$matches[1];
    $groups=getGroup($matches);
    if(!empty($groups)) 
        replySchedule($tweet,$groups);
    save_id_str($tweet->id_str);		// Mark this tweet as replied
}

$ob_output = ob_get_clean();

if(!$DEBUG) exit;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <meta charset="utf-8" />
  </head>
<body>
<?= $ob_output ?>
</body>
</html>
