<?php
require_once "session.php";

if(isset($_POST["chatID"]) && !empty($_POST["chatID"])){

//print_r($_POST);

    $chatID = htmlspecialchars($_POST["chatID"]);


    //VERIFY FIRST//

    $verify = "SELECT * FROM Register_db WHERE UniqueID='$chatID'";

$chatResult = mysqli_query($conn,$verify);

if(mysqli_num_rows($chatResult) > 0){


    //A MATCH WAS FOUND//
    //FIRST CHECK IF USER EXITS IN FRIEND LIST//

    $reuteDetails = mysqli_fetch_assoc($chatResult);

    if($reuteDetails["Username"] == "" or $reuteDetails["Username"] == NULL){

        $usernamez = $reuteDetails["Email"];

    }else{

        $usernamez = $reuteDetails["Username"];
    }

    $friendList = "SELECT * FROM Friends_list WHERE FriendID='$chatID' AND UniqueID='$_SESSION[uniqueID]'";


    $friendResult = mysqli_query($conn,$friendList);

    if(mysqli_num_rows($friendResult) > 0){

//USERS ARE ALREADY FRIENDS SO JUST BRING OUT THEIR MESSAGE OR START A NEW CONVO 


die($usernamez ." is already your friend");
        
    }else{


    //NOW ADD USER TO BOTH CURRENT SESSION USER FRIEND LIST AND USER FRIEND LIST//

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
      
    $sessionID = session_id();
    
    $ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);
    


    $insert = "INSERT INTO Friends_list(
        UniqueID,FriendID,Username,Status,Ip_add,User_agent	
        )
        VALUES('$_SESSION[uniqueID]','$chatID','$usernamez','Active','$ip','$user_agent')
        ";
        if(mysqli_query($conn,$insert)){

            //NOW INSERT INTO THE CHAID FRIENDS LIST//

            if($User["Username"] == "" or $User["Username"] == NULL){

                $username = $User["Email"];
            }else{

                $username = $User["Username"];
            }

            $insert = "INSERT INTO Friends_list(
                UniqueID,FriendID,Username,Status,Ip_add,User_agent	
                )
                VALUES('$chatID','$_SESSION[uniqueID]','$username','Active','$ip','$user_agent')
                ";
                if(mysqli_query($conn,$insert)){

//ADD A DEAUFLT MESSAGE TO USER THEN MAKE THE USER THAT ADDED THE FRIEND TO BE THE SENDER//


$ID = rand(987,1029). uniqid(). rand(45329,972549);

$Message = "Start a conversation";

    $insertSS = "INSERT INTO ChatBox_db(ChatID,SenderID,ReceiverID,
    Message,Status,Date,Ip_add,User_agent)
    
    VALUES('$ID','$_SESSION[uniqueID]','$chatID','$Message','unseen','$date','$ip','$user_agent')
    ";
    

    if(mysqli_query($conn,$insertSS)){



    }else{

      die("Unknown error occured");
    }

die($usernamez ." has been added to your contact successful!");
                    

                }else{


                    die("Failed");
                }

        }else{

            die("Failed");
        }



    }




}else{


    die("error");
}


}else{


    //RETURN NOTHING//


}