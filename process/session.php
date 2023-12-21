<?php
session_start();
require_once "connection.php";

if(isset($_SESSION['session'])){
    
$ftechDetails = "SELECT * FROM Register_db WHERE UniqueID='$_SESSION[uniqueID]' AND id='$_SESSION[session]'";

$Result = mysqli_query($conn,$ftechDetails);

$User = mysqli_fetch_assoc($Result);

//SELECT ALL USER FRIENDS //

$MyfriendsRecord = "SELECT * FROM Friends_list WHERE UniqueID='$_SESSION[uniqueID]'";

$MyfridnsResult = mysqli_query($conn,$MyfriendsRecord);

if(mysqli_num_rows($MyfridnsResult) > 0){


    $friends_list_array = mysqli_fetch_assoc($MyfridnsResult);


}else{


$friends_list_array = [];

}


}else{

    die("Please login");

}