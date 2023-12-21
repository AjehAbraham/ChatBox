<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Chatbox";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){


    die("Error occured connecting to Server");
    
}else{


    //die("success");
}