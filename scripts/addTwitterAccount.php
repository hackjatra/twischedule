<?php
session_start();

require_once '../lib/twitteroauth.php';
require_once '../twitter.conf.php';


if (!isset($_GET['c'])){
    $connection  = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
    $request_token=$connection->getRequestToken();

    /* Save temporary credentials to session. */
    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    $url = $connection->getAuthorizeURL($request_token['oauth_token']);

    echo "Go to this url and enter the pin code below:";
    echo "<div>$url</div>";
    echo "<hr/>";
    echo "<form>Code:<input name='c'/><input type='submit' value='Go!'/></form>";
}
else{
    $connection  = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    unset($_SESSION['oauth_token']);
    unset($_SESSION['oauth_token_secret']);

    $access_token= $connection->getAccessToken($_GET["c"]);

    if ($connection->http_code==200){
        echo "Access Token:<hr/><pre>";
        print_r($access_token);
    }
    else return false;
}

