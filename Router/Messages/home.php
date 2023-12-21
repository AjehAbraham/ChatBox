<?php
//require_once "session.php";


?>

        <div class="message-class-header">
          <p><i class="fa fa-close" id="close-message-group-btn"></i></p>

          <form id="search-data">
          <input type="search" name="name"  oninput="searchUsers()"
           placeholder="username or email..." autofocus="off"  autocomplete="off" 
           onsubmit="return false">
</form>
<div class="search-result"></div>
<br>

          <div class="active-group-status">
<?php            
        
//FTECH FRIENDS LIST//

$list = "SELECT * FROM Friends_list WHERE UniqueID='$_SESSION[uniqueID]' ORDER BY id DESC LIMIT 5";
$listResult = mysqli_query($conn,$list);

if(mysqli_num_rows($listResult) > 0){


while($friends = mysqli_fetch_assoc($listResult)){
$rand = rand();
//FETCH EACH USER LAST SEEN//

$firstCase = "SELECT * FROM Register_db WHERE UniqueID='$friends[FriendID]'
 AND NOW() <= DATE_ADD(Last_seen_date, INTERVAL 3 MINUTE)";

$firstCaseResult = mysqli_query($conn,$firstCase);

if(mysqli_num_rows($firstCaseResult) > 0){

$autoseen = mysqli_fetch_assoc($firstCaseResult);

if($autoseen["Last_seen"] == "Online" or $autoseen["Last_seen"] == "online"){

  $autoLastSeen = "style='color: mediumseagreen;'";

}elseif ($autoseen["Last_seen"] == "Offline" or $autoseen["Last_seen"] == "offline"){

  $autoLastSeen = "style='color: orange;'";

}else{

  $autoLastSeen = "style='color: orange;'";
}


}else{


  //AUTOMATICALLY SET USER TO OFFLINE//
  $autoLastSeen = "style='color: orange'";

}

//FECTH USER IMAGES///

$imagChcker ="SELECT * FROM Register_db WHERE UniqueID ='$friends[FriendID]'";

$ImageResult = mysqli_query($conn,$imagChcker);

$images = mysqli_fetch_assoc($ImageResult);

if($images["Image_path"] == "" or $images["Image_path"] == NULL){

$imagePath = "Images/Null-image.png";

}else{

  $imagePath = "Uploads/" . $images["Image_path"];

}

echo "

<form id='$rand' class='message-form-data'>
<input type='hidden' name='chatID' value='$friends[FriendID]'>
<button>$friends[Username]<img src='$imagePath' style='margin: auto;border-radius: 50%; width:20px;height: 20px;'> 
<i class='fa fa-circle' $autoLastSeen></i></button></form>

";
  
}

}else{



}
?>
          </div>
          <br><br>
        </div>
        <br><br>
<p class="general-message-response-message"></p>

        <div class="message-group-overlay-container">
          <br><br>


        <?php

//FETCH CHATS //

$chats = "SELECT * FROM Friends_list WHERE UniqueID='$_SESSION[uniqueID]' ORDER BY id DESC";


$chatResult = mysqli_query($conn,$chats);

if(mysqli_num_rows($chatResult) > 0){


  while($userChat = mysqli_fetch_assoc($chatResult)){

$rand = rand() . uniqid();

$case = "SELECT * FROM ChatBox_db WHERE 
SenderID='$userChat[FriendID]' AND ReceiverID='$_SESSION[uniqueID]'
OR  SenderID='$_SESSION[uniqueID]' AND ReceiverID='$userChat[FriendID]' ORDER BY id DESC LIMIT 1;
";

$caseResult = mysqli_query($conn,$case);
if(mysqli_num_rows($caseResult) > 0){

$caseData = mysqli_fetch_assoc($caseResult);

//var_dump($caseData);
$messages = $caseData["Message"];

$messages = substr($messages,0,12) . "...";

if($caseData["Status"] == "unseen"){

  $status = "style='color: black;'";
}else{

  $status = "style='color: #777;'";
}

}else{

  $messages = "Send a message to ". $userChat["Username"];

  $status = "style='color: #777;'";
}

//FTECH AUTO LAST SEEN FOR EACH USER//

$firstCase = "SELECT * FROM Register_db WHERE UniqueID='$userChat[FriendID]'
 AND NOW() <= DATE_ADD(Last_seen_date, INTERVAL 3 MINUTE)";

$firstCaseResult = mysqli_query($conn,$firstCase);

if(mysqli_num_rows($firstCaseResult) > 0){

$autoseen = mysqli_fetch_assoc($firstCaseResult);

if($autoseen["Last_seen"] == "Online" or $autoseen["Last_seen"] == "online"){

  $autoLastSeen = "style='color: mediumseagreen;'";

}elseif ($autoseen["Last_seen"] == "Offline" or $autoseen["Last_seen"] == "offline"){

  $autoLastSeen = "style='color: orange;'";

}else{

  $autoLastSeen = "style='color: orange;'";
}


}else{


  //AUTOMATICALLY SET USER TO OFFLINE//
  $autoLastSeen = "style='color: orange'";

}



    echo "
    
<div class='message-group-fluid'>
<form id='$rand' class='message-form-data'>
<input type='hidden' name='chatID' value='$userChat[FriendID]'>
<button>
<p style='font-size: 18px;'> $userChat[Username] <i class='fa fa-circle' $autoLastSeen></i></p>
<i>
<b style='
font-family: 'Courier New', Courier, monospace;'><b $status>$messages</b></b></i>
</button></form>

</div>

    
    ";



  }


}else{


  //NO CHAT RESULT OF HISTORY WAS FOUND//


}
echo "
</div>";
die();

        ?>