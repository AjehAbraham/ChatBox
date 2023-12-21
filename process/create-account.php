<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){



if(isset($_POST["email"]) && !empty($_POST["email"])){


    $email = filter_var($_POST["email"]);

}else{


    die("enter your e-mail");
}

if(isset($_POST["password"]) && !empty($_POST["password"])){


$password = htmlspecialchars($_POST["password"]);


 if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){


    die("Password must contain at least one uppercase,one lowercase,one special character and at least 8 in length.");


 }


}else{


    die("Please enter a password");
}


require_once "connection.php";

$email = trim($email);
$email = stripslashes($email);
$email = mysqli_real_escape_string($conn,$email);
$password =trim($password);
$password = htmlspecialchars($password);
//CHECK IF USER ALREADY EXITS//

$check = "SELECT * FROM Register_db WHERE Email='$email'";

$Result = mysqli_query($conn,$check);

if(mysqli_num_rows($Result) > 0){


    //USER ALREADY EXITS//

    die("User already exits.");

}else{


    //DO NOTHING//
}


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

  $ip = htmlspecialchars($_SERVER["REMOTE_ADDR"]);

$sessionID = session_id();

$uniqueID = rand(123,5697) .uniqid(). rand(749632,9876432);

$hash = password_hash($password,PASSWORD_DEFAULT);

$last_seen = "away";
$insert = "INSERT INTO Register_db (UniqueID,Email,Username,Password,Last_seen)
VALUES('$uniqueID','$email','','$hash','$last_seen')
";


if(mysqli_query($conn,$insert)){

    $last_id = mysqli_insert_id($conn);

$isnert2 = "INSERT INTO Register_history(UniqueID,User_id,Ip_add,User_agent)

VALUES('$uniqueID','$last_id','$ip','$user_agent')
";

if(mysqli_query($conn,$isnert2)){



}else{


    die("Error occured");

}

die("success");

}else{


    die("Failed,your request could not be proccess");
}


}else{

    die("Bad Gatway");

}

