<?php
session_start();
require_once "connection.php";

if(isset($_SESSION['session'])){
    
$ftechDetails = "SELECT * FROM Register_db WHERE UniqueID='$_SESSION[uniqueID]' AND id='$_SESSION[session]'";

$Result = mysqli_query($conn,$ftechDetails);

$User = mysqli_fetch_assoc($Result);


}else{

    die("Please login");

}