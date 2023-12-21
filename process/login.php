<?php
session_start();
session_regenerate_id();

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["username"]) && !empty($_POST["username"])){

$username = htmlspecialchars($_POST["username"]);


}else{


    die("enter your username or email");
}


if(isset($_POST["password"]) && !empty($_POST["password"])){

    $password = htmlspecialchars($_POST["password"]);



}else{

    die("Password cannot be blank");
}



require_once "connection.php";

$username = trim($username);
$username = stripslashes($username);
$username = mysqli_real_escape_string($conn,$username);
$password = htmlspecialchars($password);



$select = "SELECT * FROM Register_db WHERE Email='$username' OR Username='$username' ";

$result = mysqli_query($conn,$select);
if(mysqli_num_rows($result) > 0){

$userResult = mysqli_fetch_assoc($result);

if(password_verify($password,$userResult["Password"]) == "password_hash"){

$_SESSION["session"] = $userResult["id"];

$_SESSION["uniqueID"] = $userResult["UniqueID"];
    
require_once "login-history.php";
require_once "remember-me.php";


//UPDATE USER LASST SEEN//
$lastSEEN = "Online";
$date = htmlspecialchars(date("Y/m/d H:i:s"));

$update = "UPDATE Register_db SET Last_seen='$lastSEEN',Last_seen_date='$date' WHERE UniqueID='$_SESSION[uniqueID]'";

if(mysqli_query($conn,$update)){

    //DO NOTHING//


}else{


    //DO NOTHING//
}
    

die("success");

}else{


    die("Invalid username or password");

}


}else{


    die("Invalid login crediential");

}


}else{


    die("Bad Gateway");
}