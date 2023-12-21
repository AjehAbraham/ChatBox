<?php
require_once "session.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["username"]) && !empty($_POST["username"])){

$username = htmlspecialchars($_POST["username"]);

    }else{


        die("enter a username");

    }


    if (!preg_match("/^[a-zA-Z-']*$/",$username)){


        die("Only letters are allowed.Remove numeric,special character and spaces.");

    }



$username = mysqli_real_escape_string($conn,$username);
$username = trim($username);
$username = stripslashes($username);


//CHECK IF USERNAME ALREADY EXIST//

$checkUser = "SELECT * FROM Register_db WHERE Username='$username'";

$usernameResult = mysqli_query($conn,$checkUser);

if(mysqli_num_rows($usernameResult) > 0){

die("Username <b>". $username. "</b> Already exist");

}else{

//USERNAME DOES NOT EXITS SO ADD IN//

$update = "UPDATE Register_db SET Username='$username' WHERE id='$_SESSION[session]'";


if(mysqli_query($conn,$update)){


    die("success");

}else{


    die("Server error,please try again");

}



}

}else{


    die("Bad Gateway");
}