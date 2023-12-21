<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["data"])){

    $data = htmlspecialchars($_POST["data"]);

    if($data == "create-acct"){


        echo '
        


<div class="create-account-form-overlay">
<p><i class="fa fa-close" id="close-create-btn"></i></p>

<p><i class="fa fa-user-plus"></i> create account</p>

<form class="reg-formData">
<label><b>Email</b></label>
<input type="email" name="email" placeholder="your email..">
<br>
<label><b>Password</b></label>

<input type="password" name="password">
<br>

<input type="submit" value="create account">
</form>

</div>

      
        ';
        die();

    }elseif($data == "forgot-password"){


        echo '
        
<div class="create-account-form-overlay">
<p><i class="fa fa-close" id="close-create-btn"></i></p>

<p><i class="fa fa-cogs"></i>Reset password</p>
<form class="forgot-formData">
<label><b>Email</b></label>
<input type="email" name="email" placeholder="your email...">
<br>
<input type="submit" value="Reset password">
</form>
</div>

        ';
        die();
    }else{


        die("Error occured");
    }


}else{

    die("Error occured");
}


}else{


    die("Bad Gateway");
}