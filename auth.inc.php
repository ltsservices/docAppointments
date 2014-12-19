<?php

/**
 * Process login operation
 */
function login(){
    // Starting Session
    session_start();
    $cookieAuth=$_COOKIE['login'];
    if (isset($cookieAuth) && !empty($cookieAuth)){
        afterLogin($cookieAuth, true);
    }else if(isset($_SESSION['login'])){
        afterLogin($_SESSION['login'], false);
    }else{
        $error=false; // Variable To Store Error Message

        if (isset($_POST['submit'])) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $error = true;
            }
            else
            {
                $username=$_POST['email'];
                $password=$_POST['password'];
                $remember=($_POST['remember'] == 'remember-me');

                if ($username == 'thomas.szadel@gmail.com') {
                    afterLogin($username, $remember);
                } else {
                    $error = true;
                }
            }
        }
    }
    if($error){
        header("location: signin.php");
    }
}

// --- manage login
function afterLogin($username, $keepLogin){
    $_SESSION['login']=$username; // Initializing Session
    session_cache_expire(30);
    if($keepLogin){
        setcookie("login", $username, time() + (86400 * 30), "/"); // 1 month
    }
}

function logout(){

    session_start();

    // Remove the cookie
    setcookie("login", "", time() - 3600, "/");

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header("location: signin.php");
}
?>
