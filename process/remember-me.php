<?php

//SET COOKIE FOR REMEMBER ME//

$cookieName ="Username";
$cookieValue = $_SESSION["uniqueID"];
$cookieName2 = "password";
$cookieValue2 =rand(872,1239). uniqid(). rand(846320,1985432). uniqid();

setcookie($cookieName,$cookieValue, time() + 86400 * 7, "/");

setcookie($cookieName2,$cookieValue2, time() + 86400 * 7, "/");

$hash = password_hash($cookieValue2,PASSWORD_DEFAULT);

$expire = "0";
$inserts ="INSERT INTO Remember_me(UniqueID,User_id,Password,HashID,Expire,	
Ip_add,User_agent)

VALUES('$cookieValue','$_SESSION[session]','$cookieValue2','$hash','$expire',
'$ip','$user_agent')";

if(mysqli_query($conn,$inserts)){



}else{



}
