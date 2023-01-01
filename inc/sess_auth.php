<?php 
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI'];
if(!strpos($link, 'login.php') && !strpos($link, 'register.php') && (!isset($_SESSION['userdata']) || (isset($_SESSION['userdata']['login_type']) && $_SESSION['userdata']['login_type'] != 2)) ){
	redirect('login.php');
}
if(strpos($link, 'login.php') && isset($_SESSION['userdata']['login_type']) && $_SESSION['userdata']['login_type'] == 2){
	redirect('index.php');
}
