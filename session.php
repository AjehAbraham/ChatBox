<?php
session_start();
require_once "connection.php";

require_once "process/auth.php";

if(isset($_SESSION['session'])){
$ftechDetails = "SELECT * FROM Register_db WHERE UniqueID='$_SESSION[uniqueID]' AND id='$_SESSION[session]'";

$Result = mysqli_query($conn,$ftechDetails);

$User = mysqli_fetch_assoc($Result);


if($User["Username"] == ""){


    require_once "Router/others/create-username-form.php";
    $UserName = "Chief";

}else{

$UserName = $User["Username"];


}

require_once "homePage.php";
exit;

}else{

    require_once "Router/others/login-form.php";
    exit;
}