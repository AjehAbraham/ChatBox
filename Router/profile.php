<?php
require_once "session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["data"]) && !empty($_POST["data"])){

if($_POST["data"] == "profile"){

    if($User["Username"] == ""){

        $Myusername = "";
    }else{

        $Myusername = $User["Username"];

    }

    

echo '
<div class="form-group-class-profile-overlay">
<p><i class="fa fa-close" id="close-profile-btn"></i></p>
<div class="form-container-profile">

';


echo '

<div class="upload-dp-data-form-container">';


if($User["Image_path"] == "" or $User["Image_path"] == NULL){


$imagePath = "Images/Null-image.png";

}else{


    $imagePath = "Uploads/". $User["Image_path"];

}


  echo "<img src='$imagePath' id='output'>";



  echo '
  <form class="add-image-formData">
<input type="file" name="item-image" onchange ="loadFile(event)"
style="display:none;" id="file">
    
<p class="Add-image-btn" style="text-align: center;cursor: pointer;">
  <label for="file" onclick="upload(event)" style="text-align: center;cursor: pointer;">Select Image</p>

<button id="Upload-btn">Upload <i class="fa fa-upload"></i></button>
</form>
</div>
';



echo "

<p>Username</p>
<input type='text' value='$Myusername' disabled>
<p>E-mail</p>

<input type='text' value='$User[Email]'  disabled>

";
echo '
<p class="change-username-btn">Change Username</p>
</div>

<div class="form-container-profile-fuild">
<p ><i class="fa fa-close" id="close-username-btn"></i></p>
<p>Username</p>
<form id="form-data-class-group">
';
echo "

<input type='text' name='username' value='$Myusername'>
";

echo '
<br><br>
<button>change username</button></form>
</div>

';



}else{


    //RETURN NOTHING

    die("Error");
}


}else{


    //RETURN NTOHING AS REQUEST IS NOT VALID//
    die("Invalid Request");
}


}else{


    die("Bad Gateway");
}