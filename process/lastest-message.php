<?php
require_once 'session.php';
if(isset($_SESSION['message_to']) && !empty($_SESSION['message_to'])){

    
$realChats = "SELECT * FROM ChatBox_db WHERE 
SenderID='$_SESSION[message_to]' AND ReceiverID='$_SESSION[uniqueID]'
OR  SenderID='$_SESSION[uniqueID]' AND ReceiverID='$_SESSION[message_to]' /*AND NOW() <= DATE_ADD(Date,INTERVAL 10 SECOND)*/ 

";




$chatsConvo = mysqli_query($conn,$realChats);

if(mysqli_num_rows($chatsConvo) > 0){

  //UPDATE CHATBOX MESSAGE AND SET ALL MESSAGE TO SEEN


  echo "
  
  <div class='user-message-container'>
  <p class='back-to-bottom'>Start a conversation</p>
    
  ";
$IDs = mysqli_fetch_assoc($chatsConvo);

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

echo "
<br><br>
<p class='back-to-top-btn'>Back to top</p>
<br><br><br>
<p class='automessage'></p>
        </div>";

//END OF LOOP//

}else{

//RETURN NOTHING//


    die();
}


}
