<?php
require_once "session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["chatID"]) && !empty($_POST["chatID"])){


$chatID = htmlspecialchars($_POST["chatID"]);


}else{



    die("Error");
}


if(isset($_POST["message"]) && !empty($_POST["message"])){


    $Message = htmlspecialchars($_POST["message"]);

}else{


    die("Errors");
}

//CHECK IF THE CHATID IS VALID WITH THE CHATID YOU SET IN SESSION//

if(isset($_SESSION["message_to"]) && !empty($_SESSION["message_to"])){


    $date = date("Y/m/d H:i:s");
    $time = date("H:i:s");
    
    
    $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"tablet"));
    
    
    $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"mobile"));
    
    
    
    $isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"windows"));
    
    
    $isAndriod = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"andriod"));
    
    
    $isIphone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"iphone"));
    
    
    $isIpad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"ipad"));
    
    
    $isIos= $isIpad || $isIphone;
    
    
    
    if($isMob){
    
    if($isTab){
    
    $agent = "Tablet";
    
    }else{
    
    
    $agent = "Mobile";
    }
    
    }else{
    
    $agent = "Desktop";
    
    }
    
    if($isIos){
    
    $user_agent = $agent. " Iphone IOS";
    
    }else if($isAndriod){
    
    $user_agent = $agent . " Andriod";
    
    }else{
    
    $user_agent = $agent. " Windows";
    
    }
    
    function getBrowser() { 
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
      
        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
          $platform = 'linux';
        }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
          $platform = 'mac';
        }elseif (preg_match('/windows|win32/i', $u_agent)) {
          $platform = 'windows';
        }
      
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
          $bname = 'Internet Explorer';
          $ub = "MSIE";
        }elseif(preg_match('/Firefox/i',$u_agent)){
          $bname = 'Mozilla Firefox';
          $ub = "Firefox";
        }elseif(preg_match('/OPR/i',$u_agent)){
          $bname = 'Opera';
          $ub = "Opera";
        }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
          $bname = 'Google Chrome';
          $ub = "Chrome";
        }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
          $bname = 'Apple Safari';
          $ub = "Safari";
        }elseif(preg_match('/Netscape/i',$u_agent)){
          $bname = 'Netscape';
          $ub = "Netscape";
        }elseif(preg_match('/Edge/i',$u_agent)){
          $bname = 'Edge';
          $ub = "Edge";
        }elseif(preg_match('/Trident/i',$u_agent)){
          $bname = 'Internet Explorer';
          $ub = "MSIE";
        }
      
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
      ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
          // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
          //we will have two since we are not using 'other' argument yet
          //see if version is before or after the name
          if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
              $version= $matches['version'][0];
          }else {
              $version= $matches['version'][1];
          }
        }else {
          $version= $matches['version'][0];
        }
      
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
      
        return array(
          'userAgent' => $u_agent,
          'name'      => $bname,
          'version'   => $version,
          'platform'  => $platform,
          'pattern'    => $pattern
        );
      } 
      
      // now try it
      $ua=getBrowser();
      $yourbrowser=  $ua['name'] . " on " . $ua['version'] . " on " .$ua['platform'] ;
      
      $user_agent = $user_agent. " ". $yourbrowser;
      
      $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);





if($_SESSION["message_to"] == $chatID){

//CHATID IS VALID//
//CHECK IF USERS HAS SEND MESSAGE TO EACH OTHER SO THAT YOU CAN SAVE CHATID IN DATABASE
//SO THAT USER CAN HAVE LINK TO THEIR CHATS//

$select = "SELECT * FROM ChatBox_db WHERE 
SenderID='$chatID' AND ReceiverID='$_SESSION[uniqueID]'
OR  SenderID='$_SESSION[uniqueID]' AND ReceiverID='$chatID' ORDER BY id ASC LIMIT 1";

$chatResult = mysqli_query($conn,$select);

if(mysqli_num_rows($chatResult) > 0){

//USER HAS STARTED A CONVO ALREADY SO NOW INSERT//

$transationID  = mysqli_fetch_assoc($chatResult);

$ID = $transationID["ChatID"];

$insert = "INSERT INTO ChatBox_db(ChatID,SenderID,ReceiverID,
Message,Status,Date,Ip_add,User_agent)

VALUES('$ID','$_SESSION[uniqueID]','$chatID','$Message','unseen','$date','$ip','$user_agent')
";

if(mysqli_query($conn,$insert)){

$_SESSION["chatID"] =  $ID;

    die("success");

}else{



    die("server");

}



}else{

    //USERS HAS NEVER EVER HEARD COVERSATION TOGETHER//

$ID = rand(987,1029). uniqid(). rand(45329,972549);

    $insert = "INSERT INTO ChatBox_db(ChatID,SenderID,ReceiverID,
    Message,Status,Date,Ip_add,User_agent)
    
    VALUES('$ID','$_SESSION[uniqueID]','$chatID','$Message','unseen','$date','$ip','$user_agent')
    ";
    
    if(mysqli_query($conn,$insert)){
    
$_SESSION["chatID"] =  $ID;
    
        die("success");
    
    }else{
    
    
    
        die("server");
        
    }
    



}


}else{



    die("reload");

}


}else{


    die("reload");

}



}else{


    die("Bad Gateway");

}