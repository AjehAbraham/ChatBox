<?php

$servername = "localhost";
$usernames = "root";
$passwords = "";
$dbname = "Chatbox";

$conn = mysqli_connect($servername,$usernames,$passwords,$dbname);

if(!$conn){


    die("Error occured connecting to Server");
    
}else{


    //die("success");
}