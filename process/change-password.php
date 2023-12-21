<?php
require_once "session.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
if(isset($_POST["old-password"]) && !empty($_POST["old-password"])){

$oldPassword = htmlspecialchars($_POST["old-password"]);


}else{

    die("Please enter your old password");
}


if(isset($_POST["new-password"]) && !empty($_POST["new-password"])){

    $newPassword = htmlspecialchars($_POST["new-password"]);
    
    
    }else{
    
        die("Please enter your new password");
    }
   
    
if(isset($_POST["confirm-password"]) && !empty($_POST["confirm-password"])){

    $conPassword = htmlspecialchars($_POST["confirm-password"]);
    
    
    }else{
    
        die("Please re-enter new password");
    }

if($newPassword != $conPassword){


    die("New password and confirm password must be thesame");
}



if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$newPassword)){


    die("New password must contain at least one uppercase,one lowercase,one special character and at least 8 in length.");


 }

//VERIFY IF OLD PASSWORD IS CORRECT//

$oldPassword = trim($oldPassword);
$oldPassword = stripslashes($oldPassword);
$oldPassword = mysqli_real_escape_string($conn,$oldPassword);

$selects = "SELECT * FROM Register_db WHERE UniqueID='$_SESSION[uniqueID]'";

$PasswordResult = mysqli_query($conn,$selects);

$chekerDog = mysqli_fetch_assoc($PasswordResult);

//COMPARE PASSWORD//

if(password_verify($oldPassword,$chekerDog["Password"]) == "password_hash"){

    //UPDATE USER PASSWORD//
    $hash = password_hash($newPassword,PASSWORD_DEFAULT);

    $update = "UPDATE Register_db SET Password='$hash' WHERE UniqueID='$_SESSION[uniqueID]'";

    if(mysqli_query($conn,$update)){

        die("success");

    }else{

        die("Failed to change password,please try again");

    }

    
}else{


    die("your old password is incorrect");

}

}else{


    die("Bad Gateway");

}