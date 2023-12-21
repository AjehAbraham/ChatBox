<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

    die("<p>Bad Gateway</p>");
    exit;
    
}
?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="src/Css/login-form.css">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Login</title>


<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Montserrat:ital,wght@1,300&family=Poppins:wght@300&family=Tilt+Prism&display=swap" rel="stylesheet">

      </head>
      <body>


<div class="login-form-container-fluid">
<p><i class="fa fa-user"></i> Login </p>

<form id="FormData">
<label><b>E-mail</b></label>
<input type="text" name="username" placeholder="Username or email..." autocomplete="off">
<br>
<label><b>Password</b></label>
<input type="password" name="password" placeholder="your password..." autocomplete="off">
<br>
<input type="submit" value="Login"></form>

<form class="formData-class1"><input type="hidden" name="data" value="create-acct"><button><i class="fa fa-user-plus"></i> create account </button></form>

<form class="formData-class2"><input type="hidden" value="forgot-password"> 
  <input type="hidden" name="data" value="forgot-password">
  <button><i class="fa fa-cogs"></i> Forgot password?</button> </form>
</div>

<p class="Login-error-message"></p>

<?php require_once "status-message.php"; ?>


    <script>

     
    
$(document).ready(function (e) {
      
  $("#FormData").on('submit', (function(e){
  
  e.preventDefault();
  
   document.querySelector(".loader-container-overlay").style.display= "block";
  
  $.ajax({
  
  url: 'process/login',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
  success:function(Data){
  
  document.querySelector(".loader-container-overlay").style.display= "none";

  function closeStatusMessage(){

document.querySelector(".status-reponse-message-overlay").style.width="0%";

}

var AutoChecker = setTimeout(closeStatusMessage,5000);
  
  if(Data == "success"){
    
    document.querySelector("#FormData").reset();
  
    document.querySelector(".status-response-message-text").innerHTML = "";
  
    window.location.reload();

  }else if(Data == "\r\nsuccess"){
  
    document.querySelector("#FormData").reset();
  
    document.querySelector(".status-response-message-text").innerHTML = "";
  
    window.location.reload();
  
  }else{

    document.querySelector(".status-reponse-message-overlay").style.width="100%";  

    document.querySelector(".status-response-message-text").style.backgroundColor= "red";

    document.querySelector(".status-response-message-text").innerHTML = Data;
  
  }
  
  
  
  },
  error:function(Data){

  document.querySelector(".loader-container-overlay").style.display= "none";
  
  //document.querySelector(".status-response-message-text").innerHTML = Data;
  
  }
  
  });
  
  
  
  }));
  
  
  });

  //#END OF LOGIN FORM


  //#RGISTER/CREATE ACCOUNT FORM//

  
$(document).ready(function (e) {
      
      $(".formData-class1").on('submit', (function(e){
      
      e.preventDefault();
      
       //document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/fetch-login-page-forms',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      //document.querySelector(".loader-container-overlay").style.display= "none";

      document.querySelector(".Login-error-message").innerHTML = Data;
      
  document.querySelector("#close-create-btn").addEventListener("click",closeFormPage);

 //NESTED FUNCTION TO CREATE ACCOUNT//

  $(document).ready(function (e) {
      
      $(".reg-formData").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'process/create-account',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      document.querySelector(".loader-container-overlay").style.display= "none";
    
      function closeStatusMessage(){
    
    document.querySelector(".status-reponse-message-overlay").style.width="0%";
    
    }
    
    var AutoChecker = setTimeout(closeStatusMessage,5000);
      
      if(Data == "success"){
      
        document.querySelector(".reg-formData").reset();
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Account created successful!";
      
    
      }else if(Data == "\r\nsuccess"){
      
        document.querySelector(".reg-formData").reset();

        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Account created successful!";
      
      }else{
    
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
    
        document.querySelector(".status-response-message-text").style.backgroundColor= "red";
    
        document.querySelector(".status-response-message-text").innerHTML = Data;
      
      }
      
      
      
      },
      error:function(Data){
    
      document.querySelector(".loader-container-overlay").style.display= "none";
      
      document.querySelector(".status-response-message-text").innerHTML = Data;
      
      }
      
      });
      
      
      
      }));
      
      
      });
//END OF FUNCTION TO CREATE ACCOUBT SUBMIT BUTTON//    


  //NESTED FUNCTION TO CLOSE AND OPEN CREATE ACCOUNT FORM//

function closeFormPage(){

 document.querySelector(".create-account-form-overlay").style.width="0%";

}
      
      },
      error:function(Data){
    
      //document.querySelector(".loader-container-overlay").style.display= "none";
      
      document.querySelector(".status-response-message-text").innerHTML = Data;
      
      }
      
      });
      
      
      
      }));
      
      
      });






      
  //#SEND REQUEST TO OPEN FORGOT PASSWORD FORM////

  
$(document).ready(function (e) {
      
      $(".formData-class2").on('submit', (function(e){
      
      e.preventDefault();
      
       //document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/fetch-login-page-forms',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      //document.querySelector(".loader-container-overlay").style.display= "none";

      document.querySelector(".Login-error-message").innerHTML = Data;
      
  document.querySelector("#close-create-btn").addEventListener("click",closeFormPage);

 //NESTED FUNCTION TO CREATE ACCOUNT//

  $(document).ready(function (e) {
      
      $(".forgot-formData").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'process/forgot-password',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      document.querySelector(".loader-container-overlay").style.display= "none";
    
      function closeStatusMessage(){
    
    document.querySelector(".status-reponse-message-overlay").style.width="0%";
    
    }
    
    var AutoChecker = setTimeout(closeStatusMessage,5000);
      
      if(Data == "success"){
      
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Account created successful!";
      
        document.querySelector(".forgot-formData").reset();
    
      }else if(Data == "\r\nsuccess"){
      
      
        document.querySelector(".forgot-formData").reset();

        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Account created successful!";
      
      }else{
    
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
    
        document.querySelector(".status-response-message-text").style.backgroundColor= "red";
    
        document.querySelector(".status-response-message-text").innerHTML = Data;
      
      }
      
      
      
      },
      error:function(Data){
    
      document.querySelector(".loader-container-overlay").style.display= "none";
      
     // document.querySelector(".status-response-message-text").innerHTML = Data;
      
      }
      
      });
      
      
      
      }));
      
      
      });
//END OF FUNCTION TO FORGOT PASSWORD SUBMIT BUTTON//    


  //NESTED FUNCTION TO CLOSE AND OPEN CREATE ACCOUNT FORM//

function closeFormPage(){

 document.querySelector(".create-account-form-overlay").style.width="0%";

}
      
      },
      error:function(Data){
    
      //document.querySelector(".loader-container-overlay").style.display= "none";
      
      document.querySelector(".status-response-message-text").innerHTML = Data;
      
      }
      
      });
      
      
      
      }));
      
      
      });

//END OF FORGOT PASSWORD FORM//   
    </script>

<?php require_once "Loader-refresh.php"; ?>
</body>

</html>