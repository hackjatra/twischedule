<?php
ob_start();
require_once 'lib/twitteroauth.php';
require_once 'lib/twitter.conf.php';

$GROUP_ALIAS = array("","g","group","samuha","schedule");
$ALPHABET_NE_ROMANISED = array("ka","kha","ga","gha","na","cha","chha");

$account = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $auth["tweetnea"]["oauth_token"], $auth["tweetnea"]["oauth_token_secret"]);

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
            //else echo "<hr>"; print_r($matches);  echo "<hr/>";
        }
        /* If there is number attached */
        else{
            if(in_array($matches[0],$GROUP_ALIAS))
                $ret[]=((int)$matches[1]);
        }
    }
    return array_unique($ret);
}

/* Post a message */
function postText($text,$in_reply_to=NULL){
    global $account;
    if($in_reply_to!=NULL) 
     $response=$account->post('statuses/update', array('status' => "@".$in_reply_to->user->screen_name.", ".$text, "in_reply_to_status_id" => $in_reply_to->id_str));
    else $response=$account->post('statuses/update', array('status' => $text));
}

/** 
 * Reply to the user
 */
function replySchedule($tweet,$groups){
    foreach ($groups as $group){
        //TODO
        echo "Reply ". $tweet->user->screen_name ." => ".$group;
        postText("Under Construction", $tweet);
    }
}

/* get the mentions and process the request */
$response=$account->get('statuses/mentions');
foreach ($response as $key => $tweet){
    preg_match_all("/#([^ ]*)/i",$tweet->text,$matches);
    $matches=$matches[1];
    $groups=getGroup($matches);
    if(!empty($groups)) 
        replySchedule($tweet,$groups);
}

$ob_output = ob_get_clean();

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
