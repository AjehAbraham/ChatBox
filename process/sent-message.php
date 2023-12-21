<?php
require_once "session.php";
//SHOW USER THE MESSAGE THEY JUST SENT NOW//

if(isset($_SESSION["chatID"]) && !empty($_SESSION["chatID"])){

$newMessage = "SELECT * FROM ChatBox_db WHERE ChatID='$_SESSION[chatID]' 
AND NOW() <= DATE_ADD(Date,INTERVAL 4 SECOND) ORDER BY id DESC LIMIT 1";
$newResult = mysqli_query($conn,$newMessage);

if(mysqli_num_rows($newResult) > 0){

while($Mychats = mysqli_fetch_assoc($newResult)){

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



}else{


    //RETURN NOTHING//
}

}else{

    //RETURN NOTHING//
    die;
}

