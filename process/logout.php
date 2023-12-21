<?php
session_start();

if(isset($_SESSION["session"])){

require_once "connection.php";    
//UPDATE USER LASST SEEN//
$lastSEEN = "Offline";
$date = htmlspecialchars(date("Y/m/d H:i:s"));

$update = "UPDATE Register_db SET Last_seen='$lastSEEN',Last_seen_date='$date' WHERE UniqueID='$_SESSION[uniqueID]'";

if(mysqli_query($conn,$update)){

    //DO NOTHING//


}else{


    //DO NOTHING//
}

    session_destroy();

}
setcookie("Username", "" , time() - 86400 * 7, "/");


setcookie("password", "" , time() - 86400 * 7, "/");

die("success");