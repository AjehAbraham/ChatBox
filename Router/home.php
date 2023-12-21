<?php
require_once "session.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["data"]) && !empty($_POST["data"])){

    if($_POST["data"] == "message-menu"){


require_once "Messages/home.php";


    }



}else{


    //RETURN NOTHING//
}

}else{


    die("Bad Gateway");
}