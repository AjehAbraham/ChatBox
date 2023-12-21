<?php
require_once "session.php";

if(isset($_POST["chatID"]) && !empty($_POST["chatID"])){

$chatID = htmlspecialchars($_POST["chatID"]);

  //NO MESSAGE HAS BEEN SENT//

//YOU CAN INSERT GENERAL MESSAGE//

//NOW STILL OPEN CHAT BOX BUT THIS TIME THE MESSAGE WILL BE NULL//

$fetchChat = "SELECT * FROM Register_db WHERE UniqueID='$chatID'";


$fetchResult = mysqli_query($conn,$fetchChat);

if(mysqli_num_rows($fetchResult) > 0){

  $newChat = mysqli_fetch_assoc($fetchResult);

  
//FTECH USER LAST SEEN//

$fetchLast = "SELECT * FROM Register_db WHERE UniqueID='$newChat[UniqueID]' AND NOW() <= DATE_ADD(Last_seen_date, INTERVAL 3 MINUTE)";

$seenResult = mysqli_query($conn,$fetchLast);

if(mysqli_num_rows($seenResult) > 0){

  $lastseen = mysqli_fetch_assoc($seenResult);


  if($lastseen["Last_seen"] == "online" or $lastseen["Last_seen"] == "Online"){

    $lastSeenColor= "style='color: mediumseagreen'";



  }else if($lastseen["Last_seen"] == "offline" or $lastseen["Last_seen"] == "Offline"){

    $lastSeenColor= "style='color: #f1f1f1'";


  }else{

    if($lastseen["Last_seen"] == "away"){

    $lastSeenColor= "style='color: orange'";


    }else{


      $lastSeenColor ="style='color: #f1f1f1;'";
    }

  }



}else{

//USER FAILED TO UPDATE THEIR LAST SEEN WITHIN ONE MINUTE SO THE USER IS OFFLINE//

$lastSeenColor ="style='color: #f1f1f1;'";



}
  
  if($newChat["Image_path"] == NULL or $newChat["Image_path"] == ""){


    $image_path = "Images/Null-image.png";


  }else{

    $image = $newChat["Image_path"];

    $image_path = "Uploads/".$image;
  }
 
$_SESSION["message_to"] =$newChat["UniqueID"];

if($newChat["Username"] == "" or $newChat["Username"] == NULL){


  $username = $newChat["Email"];
}else{


  $username = $newChat["Username"];
}

  echo "
  
  <div class='personal-group-class-message-container'>
  <div class='message-header-sub-group'>
  <b><i class='fa fa-close' id='close-message-btn'></i></b>
  <p>$username <i class='fa fa-circle' $lastSeenColor></i> <img src='$image_path'></p>
  </div>
  
  ";
  //MESSAGE BOX CONTAINER//

//FETCH CONVO BETWWEN YOUR FRIEND  AND YOU,REMEBER THAT WHO SO EVER SEND MESSAGE FIRST
// IS THE SENDER WHILE THE OTHER PERSON IS THE RECIEVER//

$realChats = "SELECT * FROM ChatBox_db WHERE 
SenderID='$newChat[UniqueID]' AND ReceiverID='$_SESSION[uniqueID]'
OR  SenderID='$_SESSION[uniqueID]' AND ReceiverID='$newChat[UniqueID]' ORDER BY id ASC
";


$chatsConvo = mysqli_query($conn,$realChats);

if(mysqli_num_rows($chatsConvo) > 0){

  //UPDATE CHATBOX MESSAGE AND SET ALL MESSAGE TO SEEN

$IDs = mysqli_fetch_assoc($chatsConvo);


$id = $IDs["ChatID"];

$update = "UPDATE ChatBox_db SET Status='seen' WHERE ChatID='$id'";

if(mysqli_query($conn,$update)){

  //DO NOTIHNG


}else{


  //STILL DO NOTINHG

}


  echo "
  
<div class='user-message-container'>
<p class='back-to-bottom'>Scroll to lastest</p>
  
";
while($Mychats = mysqli_fetch_assoc($chatsConvo)){


 

if($Mychats["ReceiverID"] == $_SESSION["uniqueID"]){

  $data= "
   <br>
<div class='group-message-fulid'>
<p>$Mychats[Message]
</p>
</div>



  ";



}else{

  $data ="
<p style='padding: 10px 10px;'></p>
<div class='group-message-fulid-two'>
<p>$Mychats[Message]</p>
</div>
<br><br><br>

  ";
}

echo $data ;

}



//END OF LOOP//



}else{
//NO COVO HAS STARTED YET//

echo "
  
<div class='user-message-container'>
<p class='back-to-bottom'>Start a conversation</p>
  
";

}


echo "
<br><br>
<p class='back-to-top-btn'>Back to top</p>
<br><br><br>
<p class='automessage'></p>
        </div>



<div class='message-form-container-fluid'>
<p><form class='send-message-form-data'>
<input type='hidden' value='$_SESSION[message_to]' name='chatID'>
<textarea name='message'></textarea><input type='submit' value='send'></form></p>
 <p>#END OF CONVO</p>
</div>
</div>

  ";

}else{



  die("User does not exist");
}



}


die();
?>