<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}else 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}
?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="src/Css/profile.css">
    <link rel="stylesheet" href="src/Css/setting.css">
    <link rel="stylesheet" href="src/Css/home.css">
    <link rel="stylesheet" href="src/Css/homePage.css">

    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>ChatBox</title>


<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Montserrat:ital,wght@1,300&family=Poppins:wght@300&family=Tilt+Prism&display=swap" rel="stylesheet">

      </head>
      <body>


        <div class="header-container-fluid">
          <div class="sub-header-menu">
            <p class="welcome-fuild"><i>Hi <?php echo $UserName; ?>&#9995;,Welcome Back!</i></p>
            <!--div  class="active-class-form">
            <?php
//FTECH FRIENDS LIST//
/*
$list = "SELECT * FROM Friends_list WHERE UniqueID='$_SESSION[uniqueID]'";

$listResult = mysqli_query($conn,$list);

if(mysqli_num_rows($listResult) > 0){


while($friends = mysqli_fetch_assoc($listResult)){

echo "

<form><button>$friends[Username] <i class='fa fa-circle'></i></button></form>

";
  
}

}else{



}
*/
?>
            <p class="more-active">More <i class="fa fa-plus"></i></p>
            </div>
          </div-->
</div>
          <div class="option-container-fluid"><br>
            <p class=""><i class="fa fa-ellipsis-h" id="openOptionBtn"></i></p>
            <div class="option-menu">
              <p><form class="Form-data-class1">
                <input type='hidden' name='data' value='profile'>
                <button><i class="fa fa-user"></i> profile </button> </form></p>
              
              <p><form class="Form-data-class2">
                <input type='hidden' name='data' value='setting'>
                <button><i class="fa fa-cogs"></i> setting</button> </form></p>
              
              <p><form class="Form-data-class3">
                <input type='hidden' value='logout'>
                <button><i class="fa fa-user-times"></i> Logout </button> </form></p>
            </div>
          </div>

          
        </div>

        <div class="sub-header-class-group">
          <p><form class="sub-group-form-data">
            <input type='hidden' name='data' value='message-menu'>
            <button>Messages </i></button></form></p>
          <p><form class="sub-group-form-data2"><button>Help center</button></form></p>

          <p class="alert-message-box"></p>
        </div>


<p class="general-page-loader-reponse"></p>




    <form id="auto-update"></form>

<?php require_once "Router/others/Loader-refresh.php"; 
require_once "Router/others/Network.php";
require_once "Router/others/status-message.php";
?>

  
    <scrtip src="src/Js/homePage.js"></script>

</body>

</html>