<?php

/*


if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}else 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}
*/


require_once "connection.php";

$create = "ALTER TABLE Register_db ADD 
Last_seen_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";

/*
$create = "CREATE TABLE Register_db(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UniqueID VARCHAR(40) NOT NULL,
Email TEXT NOT NULL,
Username TEXT ,
Password VARCHAR(255) NOT NULL,
Last_seen TEXT NOT NULL,
Last_seen_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
Image_path VARCHAR(255),
    )";*/


/*
$create = "CREATE TABLE Register_history(
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UniqueID VARCHAR(40) NOT NULL,
User_id INT(20) NOT NULL,
Date TIMESTAMP  DEFAULT current_timestamp() ON UPDATE current_timestamp(),
Ip_add VARCHAR(30) NOT NULL,
User_agent TEXT NOT NULL
)";*/
/*
$create = "CREATE TABLE Login_history(

id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UniqueID VARCHAR(40) NOT NULL,
User_id INT(20) NOT NULL,
Login_status TEXT NOT NULL,
SessionID VARCHAR(255) NOT NULL,
Permission TEXT NOT NULL,
Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
Time TIME NOT NULL,
Ip_add VARCHAR(30) NOT NULL,
User_agent TEXT NOT NULL
)";*/

/*
$create= "CREATE TABLE Remember_me(
    
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UniqueID VARCHAR(255) NOT NULL,
User_id INT(20) NOT NULL,
Password VARCHAR(255) NOT NULL,
HashID VARCHAR(255) NOT NULL,
Expire INT(2),
Date TIMESTAMP  DEFAULT current_timestamp() ON UPDATE current_timestamp(),
Ip_add VARCHAR(30) NOT NULL,
User_agent TEXT NOT NULL
)";*/

/*

$create ="CREATE TABLE ChatBox_db(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ChatID VARCHAR(255) NOT NULL,
SenderID VARCHAR(255) NOT NULL,
ReceiverID VARCHAR(255) NOT NULL,
Message TEXT NOT NULL,
Status TEXT(8) NOT NULL,
Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
Ip_add VARCHAR(30) NOT NULL,
User_agent TEXT NOT NULL
)";
*/

/*
$create = "CREATE TABLE Friends_list(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 UniqueID VARCHAR(255) NOT NULL,
FriendID VARCHAR(255) NOT NULL,
Username TEXT NOT NULL,
Status TEXT(8) NOT NULL,
Date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
Ip_add VARCHAR(30) NOT NULL,
User_agent TEXT NOT NULL
)";*/

/*
$id1 = "39065802e98b31876753705";
$id2 ="147165815433ecb556646945" ;
$username = "Lazer";
$status = "Active";
$ip = "123:544:00";
$useragent = "Safari";

$create = "INSERT INTO Friends_list(
UniqueID,FriendID,Username,Status,Ip_add,User_agent	
)
VALUES('$id2','$id1','$username','$status','$ip','$useragent')
";*/

/*
$create = "CREATE TABLE Typing(

id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ChatID VARCHAR(255) NOT NULL,
SenderID VARCHAR(255) NOT NULL,
ReceiverID VARCHAR(255) NOT NULL,
SenderStatus TEXT(10) NOT NULL,
ReceiverStatus TEXT(10) NOT NULL

)";*/



    if(mysqli_query($conn,$create)){

        die("Table created");

    }else{


        die("Failed to create table " .mysqli_error($conn));
    }