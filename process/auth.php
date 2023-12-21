<?php
if(!isset($_SESSION["session"])){


if(isset($_COOKIE["Username"]) && isset($_COOKIE["password"])){


    if(!empty($_COOKIE["Username"]) && !empty($_COOKIE["password"])){


        $CookieName = htmlspecialchars($_COOKIE["Username"]);
        $CookiePassword = htmlspecialchars($_COOKIE["password"]);

$CookieName = trim($CookieName);
$CookieName = stripslashes($CookieName);
$CookieName = mysqli_real_escape_string($conn,$CookieName);

$CookiePassword = trim($CookiePassword);
$CookiePassword = stripslashes($CookiePassword);
$CookiePassword = mysqli_real_escape_string($conn,$CookiePassword);


$checkCookie = "SELECT * FROM Remember_me WHERE UniqueID='$CookieName' AND Password='$CookiePassword' ";


$RememberMeResult = mysqli_query($conn,$checkCookie);

if(mysqli_num_rows($RememberMeResult) > 0){


    $cookieResult = mysqli_fetch_assoc($RememberMeResult);

    if(password_verify($CookiePassword,$cookieResult["HashID"]) == "password_hash"){

        
session_regenerate_id();

$_SESSION["session"] = $cookieResult["User_id"];

$_SESSION["uniqueID"] = $cookieResult["UniqueID"];


//UPDATE USER LASST SEEN//
$lastSEEN = "Online";
$date = htmlspecialchars(date("Y/m/d H:i:s"));

$update = "UPDATE Register_db SET Last_seen='$lastSEEN',Last_seen_date='$date' WHERE UniqueID='$_SESSION[uniqueID]'";

if(mysqli_query($conn,$update)){

    //DO NOTHING//


}else{


    //DO NOTHING//
}
    
require_once "login-history.php";
require_once "remember-me.php";


    }else{

        

        //COOKIE HAS BEEN MANIPULATED AND IT'S NOT VALID//
        
setcookie("Username", "" , time() - 86400 * 7, "/");


setcookie("password", "" , time() - 86400 * 7, "/");
    }


}else{


    //COOKIE IS FALSE AND HAS BEEN EDITED SO UNSET COOKIE ASAP
    
    
    
setcookie("Username", "" , time() - 86400 * 7, "/");


setcookie("password", "" , time() - 86400 * 7, "/");
}

    }else{

        //DO NOTHING BUT UNSETCOOKIE SINCE IT'S EMPTY//

        
        
setcookie("Username", "" , time() - 86400 * 7, "/");


setcookie("password", "" , time() - 86400 * 7, "/");
    }


}else{

    //DO NOTHING AS COOKIE IS NOT SET//


}


}else{
    

    //DO NOTHING BECAUSE USER SESSION IS ACTIVE AND RUNNING//
}