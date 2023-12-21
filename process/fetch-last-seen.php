<?php
require_once "session.php";

if(isset($_SESSION["message_to"]) && !empty($_SESSION["message_to"])){

$id =htmlspecialchars($_SESSION["message_to"]);


$select = "SELECT * FROM Register_db WHERE UniqueID='$id'";

$Result = mysqli_query($conn,$select);

if(mysqli_num_rows($Result) > 0){
$onlineChecker = mysqli_fetch_assoc($Result);


if($onlineChecker["Last_seen"] == "Online" or $onlineChecker["Last_seen"] == "online"){


    $last_seen = "Online";
    
}elseif($onlineChecker["Last_seen"] == "away"){


    $last_seen = "away";

}else{

    $last_seen = "Offline";

}


}else{


    $last_seen = "Offline";
}


die($last_seen);
}