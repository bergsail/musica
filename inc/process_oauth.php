<?php

require 'twitter/twitteroauth.php';
require 'config/twconfig.php';
require 'config/functions.php';

session_start();

if(isset($_GET['twitter'])){
    
    if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
    // We've got everything we need
    $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    // Let's request the access token
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
    // Save it in a session var
    $_SESSION['access_token'] = $access_token;
    // Let's get the user's info
    $user_info = $twitteroauth->get('account/verify_credentials');
    // Print user's info
        echo '<pre>';
        print_r($user_info);
        echo '</pre><br/>';
    if (isset($user_info->error)) {
        // Something's wrong, go back to square 1  
        header('Location: login-twitter.php');
    } else {
       $twitter_otoken=$_SESSION['oauth_token'];
       $twitter_otoken_secret=$_SESSION['oauth_token_secret'];
       $email='';
        $uid = $user_info->id;
        $username = $user_info->screen_name;
        $user = new User();
        $userdata = $user->checkUser($uid, 'Twitter', $username, $email, $twitter_otoken, $twitter_otoken_secret);
        if(!empty($userdata)){
            
            $_SESSION['id'] = $userdata['id'];
			$_SESSION['user'] = $userdata['username'];
            $dir = "uploads/".$_SESSION['id'];
            if(!file_exists($dir)){
                mkdir($dir, 777);
            }
            header("Location: index.php");
            }
        }
    } else {
        // Something's missing, go back to square 1
    header('Location: login-twitter.php');
    }
    
}

if(isset($_GET['facebook'])){
    
    require 'inc/db.class.php';
    require 'fb-sdk/src/facebook.php';
    
    define('APPID', '301175843279919');
    define('SECRET', '785c8337a100c35070bb662953cd68cb');
    
    $site_url = 'http://home.ign.im/musica/logout.php';
    
    $facebook = new Facebook(array(
                'appId' => APPID,
            'secret' => SECRET,
    ));
    
    $user = $facebook->getUser();
    if($user){
        $profile = $facebook->api('/me');
        $uid = $profile['id'];
        $username = $profile['username'];
        $email = $profile['email'];
        $user = new User();
        $data = $user->checkUser($uid, 'Facebook', $username, $email, $twitter_otoken, $twitter_otoken_secret);
        if(!empty($data)){
            
            $_SESSION['id'] = $data['id'];
			$_SESSION['user'] = $data['username'];
            $dir = "uploads/". $_SESSION['id'];
                if(!file_exists($dir)){
                    mkdir($dir, 777);
                }
            header("Location: index.php");
        }
    }
}
    

?>
