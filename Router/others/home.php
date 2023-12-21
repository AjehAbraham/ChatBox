
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




        <div class="message-class-header">
          <p><i class="fa fa-close" id="close-message-group-btn"></i></p>
          <input type="search" name="search" placeholder="johndoe@gmail.com..."><br>
          <br>
          <div class="active-group-status">
            
            <form><button><i class="fa fa-circle"></i></button></form>

            <form><button><i class="fa fa-circle"></i></button></form>
            
            <form><button><i class="fa fa-circle"></i></button></form>
          </div>
          <br><br>
        </div>
        <br><br>

        <div class="message-group-overlay-container">
          <br><br>
<div class="message-group-fluid">
  <form>
  <button>
  <p>Ajeh Abraham <i class="fa fa-circle"></i></p>
  <b>Hello John...<b>
  </button></form>
</div>

<div class="message-group-fluid">
  <form>
  <button>
  <p>Ajeh Abraham <i class="fa fa-circle"></i></p>
  <b>Hello John...<b>
  </button></form>
</div>

<div class="message-group-fluid">
  <form>
  <button>
  <p>Ajeh Abraham <i class="fa fa-circle"></i></p>
  <b>Hello John...<b>
  </button></form>
</div>

<div class="message-group-fluid">
  <form>
  <button>
  <p>Ajeh Abraham <i class="fa fa-circle"></i></p>
  <b>Hello John...<b>
  </button></form>
</div>

<div class="message-group-fluid">
  <form>
  <button>
  <p>Ajeh Abraham <i class="fa fa-circle"></i></p>
  <b>Hello John...<b>
  </button></form>
</div>

</div>


        <style>
          body{
            margin: 0;
            font-size: 12px;
 
          }
          .message-class-header{
            background-color: rgb(0,20,120);
            color: white;
            box-shadow: 0px 0px 16px 0px rgb(0,20,100);
            padding: 2px 2px;
            
  overflow-y: scroll;
  /*top: 0;
  position: sticky;*/
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0%;
  z-index: 3;
          }
          #close-message-group-btn{
            color: white;
            font-size: 15px;
            cursor: pointer;
          }
          .message-class-header label{
            margin-left: 10px;
          }
          .message-class-header input[type=search]{
            padding: 8px 8px;
            border: 2px solid white;
            border-radius: 2rem;
            outline: 0;
            width: 80%;
margin-left: 10px;

          }
          @media screen and (min-width: 600px){
            .message-class-header input[type=search]{
              width: 30%;
            }
          }
          
          .active-group-status{
  display: flex;
  margin-left: 10px;
  
  margin-bottom: -15px;
}
.active-group-status button{
  padding: 10px 10px;
  background: white;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  margin-left: -5px;
  cursor: pointer;
  border: none;
}
.active-group-status button i{
  color: mediumseagreen;
  float: right;
z-index: 1;
}
.message-group-overlay-container{
  overflow-y: scroll;
  /*top: 0;
  position: sticky;*/
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  top: 40%;
  background-color: white;
  z-index: 3;
}
.message-group-fluid{
  margin: auto;
  display: block;

}
.message-group-fluid button{
  background-color: white;
  width: 100%;
  border: none;
  box-sizing: border-box;
  float: left;
  text-align: justify;
  background-color: white;
  border: 5px solid #f1f1f1;
  margin-top: 2px;
  margin-bottom: 10px;
  cursor: pointer;
}
.message-group-fluid button p{
  display: block;
  font-weight: bold;
  font-size: 15px;
}
.message-group-fluid i{
  color: mediumseagreen;
}



.personal-group-class-message-container{
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  position: fixed;
  z-index: 5;
  background-color: white;
  transition: 0.1s;
  width: 100%;
  overflow-y: scroll;
}
.message-header-sub-group{
  background-color: rgb(0,20,120);
  color: white;
  padding: 2px 2px;

}
#close-message-btn{
  cursor: pointer;
  color: white;
  font-size: 18px;
  margin-left: 10px;
}
.message-header-sub-group{
  z-index: 2;
}
.message-header-sub-group p:nth-child(2){
color: white;
font-size: 18px;
font-weight: bold;
text-align: center;
}
.message-header-sub-group p:nth-child(2) img{
  border-radius: 50%;
  width: 50px;
  height: 50px;
  border: 2px solid white;
  margin: auto;
  display: block;
}
.message-header-sub-group p:nth-child(2) i{
color: mediumseagreen;
}
.user-message-container{
  overflow-y: scroll;
  /*top: 0;
  position: sticky;*/
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  top: 40%;
}
.group-message-fulid{
  padding: 1px 4px;
  background-color: rgb(0,0,150);
  color: white;
  text-align: center;
  width: 50%;
  border-radius: 2rem;
  margin-left: 6px;
  margin-top: 5px;
  margin-bottom: 5px;
  font-size: 13px;
}
.group-message-fulid-two{
  padding: 1px 4px;
  background-color: #ccc;
  color: #555;
  text-align: center;
  width: 50%;
  border-radius: 2rem;
  margin-right: 6px;
  margin-top: 5px;
  margin-bottom: 5px;
  float: right;
  font-size: 13px;
}
.message-form-container-fluid{
position: fixed;
bottom: 0;
  z-index: 1;
  left: 0;
  right: 2%;
  top: 90%;
  padding: 4px 4px;
  overflow-y: scroll;
}
.message-form-container-fluid textarea{
  width: 65%;
  padding: 2px 2px;
  border: 2px solid rgb(0,20,100);
  border-radius: 2rem;
  outline: 0;
  font-size: 18px;
}
.message-form-container-fluid input[type=submit]{
padding: 10px 10px;
border: none;
background-color: rgb(0,20,100);
color: white;
cursor: pointer;
border-radius: 2rem;
width: 30%;
font-size: 15px;
position: absolute;
margin-left: 6px;
}
.back-to-top-btn{
  text-align: center;
  color: rgb(0,20,120);
  cursor: pointer;
}
.back-to-bottom{
  
  text-align: center;
  color: rgb(0,20,120);
  cursor: pointer;
}
       </style>



        <div class="personal-group-class-message-container">
          <div class="message-header-sub-group">
          <b><i class="fa fa-close" id='close-message-btn'></i></b>
          <p>Ajeh Abraham <i class="fa fa-circle"></i> <img src=''></p>
          </div>
        
          <div class="user-message-container">
            <p class="back-to-bottom">Latest</p>
        <div class="group-message-fulid">
          <p>Hello John i just wanna thank you for yesteday
            Hello John i just wanna thank you for yesteday
            Hello John i just wanna thank you for yesteday
          </p>
        </div>
        <br><br><br>
        
        <div class="group-message-fulid-two">
          <p>You're welcome!</p>
        </div>
<br><br><br><br>
<div class="group-message-fulid">
  <p>Hello John i just wanna thank you for yesteday
    Hello John i just wanna thank you for yesteday
    Hello John i just wanna thank you for yesteday
  </p>
</div>
<br><br><br>

<div class="group-message-fulid-two">
  <p>You're welcome!</p>
</div>
<br><br><br><br>

<div class="group-message-fulid-two">
  <p>You're welcome!</p>
</div>
<br><br><br><br>


<p class="back-to-top-btn">Back to top</p>
<br><br><br>
        </div>


        
        <div class="message-form-container-fluid">
         <p><form><textarea></textarea><input type="submit" value="send"></form></p>
          <p>#END OF CONVO</p>
        </div>
        </div>
        

    <script>

  
document.querySelector("#close-message-btn").addEventListener("click",closeGroupMessage);

function closeGroupMessage(){

 document.querySelector(".personal-group-class-message-container").style.width="0%";

 document.querySelector(".message-header-sub-group").style.width="0%";
 
 document.querySelector(".user-message-container").style.width="0%";
 
 document.querySelector(".message-form-container-fluid").style.width="0%";
 
 document.querySelector(".message-header-sub-group").style.width="0%";
}
      


      document.querySelector("#close-message-btn").addEventListener("click",closeMessage);

      function closeMessage(){

       document.querySelector(".personal-group-class-message-container").style.width="0%";

       document.querySelector(".message-header-sub-group").style.width="0%";
       
       document.querySelector(".user-message-container").style.width="0%";
       
       document.querySelector(".message-form-container-fluid").style.width="0%";
       
       document.querySelector(".message-header-sub-group").style.width="0%";
      }
    
$(document).ready(function (e) {
      
  $("#Add-bal-form").on('submit', (function(e){
  
  e.preventDefault();
  
   document.querySelector(".loader-container-overlay").style.display= "block";
  
  $.ajax({
  
  url: 'Process/Add-balance',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
  success:function(Data){
  
  document.querySelector(".loader-container-overlay").style.display= "none";
  
  document.querySelector(".Add_bal_error_message").innerHTML = Data;
  
  
  
  if(Data == "success"){
  
    alert("successful");
  

  }else if(Data == "\r\nsuccess"){
  
  
    alert("successful");

  
  }
  
  
  
  },
  error:function(Data){
  document.querySelector(".loader-container-overlay").style.display= "none";
  
  document.querySelector(".Add_bal_error_message").innerHTML = Data;
  
  }
  
  });
  
  
  
  }));
  
  
  });
    </script>

</body>

</html>