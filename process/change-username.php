<?php
require_once "session.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["username"]) && !empty($_POST["username"])){


        die("You cannot change your username at the moment");

    }else{

        die("Bad Gateway");
    }
}