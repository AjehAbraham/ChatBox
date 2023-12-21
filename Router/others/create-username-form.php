

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Css/">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Create username</title>


<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Montserrat:ital,wght@1,300&family=Poppins:wght@300&family=Tilt+Prism&display=swap" rel="stylesheet">

      </head>
      <body>


<div class="form-group-username-overlay">
<p><i class="fa fa-user"></i> create username</p>

<form id="formData-group">

  <label><b>Username</b></label>
  <input type="text" name="username" placeholder="your username...">
  <br>
  <input type="submit" value="create username">
</form>

</div>
<?php require_once "status-message.php"; ?>

        <style>
          body{
            margin: 0;
            font-size: 12px;
 
          }
       .form-group-username-overlay{
        position: fixed;
      width: 100%;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      transition: 0.1s;
      z-index: 4;
      overflow-y: scroll;
      background-color: white;
       }
       .form-group-username-overlay{
        font-size: 18px;
        color: rgb(0,20,100);
        text-align: center;
        font-weight: bold;
       }
       .form-group-username-overlay label{
        margin: auto;
        display: block;
        text-align: center;
        color: rgb(0,20,100);
       }
     .form-group-username-overlay input[type=text]{
        padding: 8px 8px;
        outline: 0;
        border: 0px ;
        border-bottom: 3px solid rgb(0,20,100);
        margin: auto;
        display: block;
        width: 80%;
        font-size: 18px;
        border-radius: 2rem;
       }
       .form-group-username-overlay input[type=submit]{
        padding: 8px 8px;
        font-size: 15px;
        color: white;
        background-color: rgb(0,20,100);
        border-radius: 2rem;
        margin: auto;
        display: block;
        width: 60%;
        cursor: pointer;
       }
       .form-group-username-overlay button{
        padding: 8px 8px;
        font-size: 15px;
        color: rgb(0,20,100);
        background-color: white;
        border-radius: 2rem;
        margin: auto;
        display: block;
        width: 60%;
        margin-top: 10px;
        cursor: pointer;
       }
       @media screen and (min-width: 600px){
      .form-group-username-overlay input[type=text]{
          width: 40%;
          font-size: 13px;
        }
        .form-group-username-overlay input[type=submit]{
          width: 30%;
        }
        .form-group-username-overlay button{
          width: 30%;
        }
       }
   
       </style>



        

    <script>
    
$(document).ready(function (e) {
      
  $("#formData-group").on('submit', (function(e){
  
  e.preventDefault();
  
  // document.querySelector(".loader-container-overlay").style.display= "block";
  
  $.ajax({
  
  url: 'process/create-username',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
  success:function(Data){
  
  //document.querySelector(".loader-container-overlay").style.display= "none";
  

  function closeStatusMessage(){
    
    document.querySelector(".status-reponse-message-overlay").style.width="0%";
    
    }
    
    var AutoChecker = setTimeout(closeStatusMessage,5000);
  
  
  if(Data == "success"){

        document.querySelector("#formData-group").reset();
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Username created!";
      
        document.querySelector(".form-group-username-overlay").style.width="0%";
  

  }else if(Data == "\r\nsuccess"){
  
  
    document.querySelector("#formData-group").reset();
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Username created!";
      
        document.querySelector(".form-group-username-overlay").style.width="0%";
  
  }else{

        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "red";
      
        document.querySelector(".status-response-message-text").innerHTML = Data;
      
  }
  
      

  
  
  },
  error:function(Data){
 // document.querySelector(".loader-container-overlay").style.display= "none";
 
 document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "red";
      
        document.querySelector(".status-response-message-text").innerHTML = "Unknown error occured"; 

  }
  
  });
  
  
  
  }));
  
  
  });
    </script>

</body>

</html>