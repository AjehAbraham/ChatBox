<?php
require_once "session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){



    if(isset($_POST["data"]) && !empty($_POST["data"])){

if($_POST["data"] == "setting"){


    echo '
    <div class="container-fluid-setting-overlay">

    <p><i class="fa fa-close" id="close-setting-btn"></i></p>

    <p class="setting-header">Setting</p>
    <div class="setting-container">
      <p class="open-change-password-btn">Change Password</p>
      
    </div>
<div class="change-password-container-fluid">
<p><i class="fa fa-close" id="close-password-container"></i></p>
<p>Change password</p>
<form id="Form-data-group-setting">
<label><b>Old password</b></label>
<input type="text" name="old-password" style="-webkit-text-security: disc;" placeholder="your old password">


<label><b>New password</b></label>
<input type="text" name="new-password" style="-webkit-text-security: disc;" placeholder="your new password">


<label><b>confirm password</b></label>
<input type="text" name="confirm-password" style="-webkit-text-security: disc;" placeholder="re-enter your new password">

<br><br>
<button>change password</button>
</form>
</div>

    
   </div>

    ';
}else{


    //RETURN NOTHING


}


    }else{


        //RETURN NOTHING//
    }
}