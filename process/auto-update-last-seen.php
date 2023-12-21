<?php
require_once "session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$lastSeenStatus = "Online";
$date = htmlspecialchars(date("Y/m/d H:i:s"));

$autoUpdate = "UPDATE Register_db SET Last_seen='$lastSeenStatus',Last_seen_date='$date' WHERE UniqueID='$_SESSION[uniqueID]'";


if(mysqli_query($conn,$autoUpdate)){


    die("success");
    
}else{


    die("Failed to update last seen");

}


}else{


    die("Bad Gateway");
}