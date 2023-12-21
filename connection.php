<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}else 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}
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