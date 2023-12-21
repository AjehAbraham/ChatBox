 
      document.querySelector("#openOptionBtn").addEventListener("click",OpenOption);

      function OpenOption(){

        var Option = document.querySelector(".option-menu");

        if(Option.style.display == "block"){

          Option.style.display = "none";
        }else{

          Option.style.display = "block";

        }
      }
  
      
  
      $(document).ready(function (e) {
      
      $(".Form-data-class1").on('submit', (function(e){
      
      e.preventDefault();
      
      // document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/profile',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
     // document.querySelector(".loader-container-overlay").style.display= "none";
      
     document.querySelector(".general-page-loader-reponse").innerHTML= Data;

     //NESTED FUNCTION TO UPLOAD PROFILE PICTURE 
       
$(document).ready(function (e) {
      
      $(".add-image-formData").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'uploads-pics',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      document.querySelector(".loader-container-overlay").style.display= "none";
      
     if(Data == "\r\nsuccess" || Data =="success"){
    
    alert("Profile picture uploaded successfuly");

     }else{
    
    
      alert(Data);
     }
     
    
      },
      error:function(Data){
    
      document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });
    
      
     

     //END OF FUCNTION TO UPLOAD PROFILE PCITURE//



//SUBMIT CHANGES USERNAME FORM OPEN AND CLOSE USERNAME/OPEN AND CLOSE PROFILE//

  
$(document).ready(function (e) {
      
      $("#form-data-class-group").on('submit', (function(e){
      
      e.preventDefault();
      
       //document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'process/change-username',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      //document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      
      
      
      if(Data == "success"){
      
        document.querySelector(".form-container-profile-fuild").style.width="0%";
        
    
      }else if(Data == "\r\nsuccess"){
      
      
        document.querySelector(".form-container-profile-fuild").style.width="0%";
    
      
      }else{
    
    alert(Data);
    
    
      }
      
      
      
      },
      error:function(Data){
    
      //document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });
    
      
    
      
      document.querySelector("#close-profile-btn").addEventListener("click",closeProfilePage);
    
      function closeProfilePage(){
    
        document.querySelector(".form-group-class-profile-overlay").style.width="0%";
    
      }   
    
    
      document.querySelector("#close-username-btn").addEventListener("click",closeUsernamePage);
    
      function closeUsernamePage(){
    
        document.querySelector(".form-container-profile-fuild").style.width="0%";
    
      }
      
      document.querySelector(".change-username-btn").addEventListener("click",OpenUsernamePage);
    
      function OpenUsernamePage(){
    
        document.querySelector(".form-container-profile-fuild").style.width="100%";
    
      }

      //END OF USERNAME FORM OPEN AND CLOSE BOTH CHANGE USERNAME AND PROFILE FORM

      
      },
      error:function(Data){
     // document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });



        
$(document).ready(function (e) {
      
      $(".Form-data-class2").on('submit', (function(e){
      
      e.preventDefault();
      
      // document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/setting',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
     // document.querySelector(".loader-container-overlay").style.display= "none";
      
     
     document.querySelector(".general-page-loader-reponse").innerHTML= Data;
       

     //FUNCTION TO PERFOMR ALL SETTING ACTIVIITES //


     document.querySelector("#close-password-container").addEventListener("click",closeChangePassword);
    
    function closeChangePassword(){
  
      document.querySelector(".change-password-container-fluid").style.width="0%";
  
    }   
  
  
    document.querySelector(".open-change-password-btn").addEventListener("click",OpenChangePassword);
  
    function OpenChangePassword(){
  
      document.querySelector(".change-password-container-fluid").style.width="100%";
  
    }  
  
  
    
    document.querySelector("#close-setting-btn").addEventListener("click",closeSettingPage);
  
    function closeSettingPage(){
  
      document.querySelector(".container-fluid-setting-overlay").style.width="0%";
  
    }
  


$(document).ready(function (e) {
      
      $("#Form-data-group-setting").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'process/change-password',
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
      
        document.querySelector("#Form-data-group-setting").reset();
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Password changed successfully!";
      
        
    
      }else if(Data == "\r\nsuccess"){
      
        document.querySelector("#Form-data-group-setting").reset();
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "mediumseagreen";
      
        document.querySelector(".status-response-message-text").innerHTML = "Password changed successfully!";
      
    
      
      }else{
        document.querySelector(".status-reponse-message-overlay").style.width="100%";  
        
        document.querySelector(".status-response-message-text").style.backgroundColor= "red";
      
        document.querySelector(".status-response-message-text").innerHTML = Data;
      
    
    
    
      }
      
      
      
    
    
      },
      error:function(Data){
    
      document.querySelector(".loader-container-overlay").style.display= "none";
      
    
      
      }
      
      });
      
      
      
      }));
      
      
      });
    
  //END OF NESTED FUNCTION TO OPEN SETTING/ CLOSE SETIING OPENC AND CLOSE CHNAGE PASSWORD
  //SUBMIT FORM TO CHANGE PASSWORD//    
      
      
      },
      error:function(Data){
     // document.querySelector(".loader-container-overlay").style.display= "none";
      
    // document.querySelector(".general-page-loader-reponse").innerHTML= Data;
      
      }
      
      });
      
      
      
      }));
      
      
      });


$(document).ready(function (e) {
      
  $(".Form-data-class3").on('submit', (function(e){
  
  e.preventDefault();
  
  // document.querySelector(".loader-container-overlay").style.display= "block";
  
  $.ajax({
  
  url: 'process/logout',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
  success:function(Data){
  
 // document.querySelector(".loader-container-overlay").style.display= "none";
  
  if(Data == "success"){
  
    window.location.reload();
  

  }else if(Data == "\r\nsuccess"){
  

    window.location.reload();

  
  }
  
  
  
  },
  error:function(Data){
 // document.querySelector(".loader-container-overlay").style.display= "none";
  
  
  }
  
  });
  
  
  
  }));
  
  
  });



  $(document).ready(function (e) {
      
      $(".sub-group-form-data").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/home',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      document.querySelector(".loader-container-overlay").style.display= "none";
     
     document.querySelector(".general-page-loader-reponse").innerHTML= Data;
      
 //FUNCTION TO OPEN AND CLOSE MESSAGE OVERLAY//
     document.querySelector("#close-message-group-btn").addEventListener("click",closeGroupMessage);

function closeGroupMessage(){

 
 document.querySelector(".message-class-header").style.width="0%";
 document.querySelector(".message-group-overlay-container").style.width="0%";
 
 document.querySelector(".message-class-header").style.padding="0px";
 document.querySelector(".message-group-overlay-container").style.padding="0px";
 
 document.querySelector(".message-class-header").style.padding="0px";
 
 document.querySelector(".message-group-overlay-container").style.padding="0px"
document.querySelector(".search-result-container").style.width="0%";
document.querySelector(".search-result-container").style.overflow="hidden";
}

//END OF NESTED FUNCTION TO OPEN AND CLOSE MESSAGE BOX//


//END OF FUNCTION TO SERACH FOR USER//



//NESTED FUNCTION TO OPEN FRIEND/S CONVERSATION/START A CONVERSATION//


$(document).ready(function (e) {
      
      $(".message-form-data").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/Messages/chat-box',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      document.querySelector(".loader-container-overlay").style.display= "none";
      
      document.querySelector(".general-message-response-message").innerHTML = Data;

      
     document.querySelector("#close-message-btn").addEventListener("click",closeCoversation);

function closeCoversation(){
  document.querySelector(".personal-group-class-message-container").style.width="0%";
  
  document.querySelector(".user-message-container").style.width="0%";
  
  document.querySelector(".message-form-container-fluid").style.width="0%";
  
  
}

//SCROLL INOT VIEW TO THE LASTEST CHAT 


//AUTOMATICALLY TO LATEST MESSAGE//


document.querySelector(".back-to-top-btn").scrollIntoView({
    behavior: 'smooth',
  });

document.querySelector(".back-to-top-btn").addEventListener("click",backTop);

function backTop(){

  document.querySelector(".back-to-bottom").scrollIntoView({
    behavior: 'smooth',
  });


}




document.querySelector(".back-to-bottom").addEventListener("click",backtoBottom);

function backtoBottom(){

  document.querySelector(".back-to-top-btn").scrollIntoView({
    behavior: 'smooth',
  });


}



//NESTED FUNCTION TO SEND MESSAGE TO USER//

  
$(document).ready(function (e) {
      
      $(".send-message-form-data").on('submit', (function(e){
      
      e.preventDefault();
      
       //document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'process/send-message',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      //document.querySelector(".loader-container-overlay").style.display= "none";
      
     // document.querySelector(".general-message-response-message").innerHTML = Data;
      
     
if(Data == "\r\nsuccess" || Data == "success"){

//NESTED FUCNTION FETCH NEW MESSAGE //
document.querySelector(".send-message-form-data").reset();

/*
function AutoSentMessage(){
  
  var form = $("#auto-update");
  
  var url = "process/sent-message";
  
  $.ajax({
  type: 'POST',
  url: url,
  data: form.serialize(),
  dataType: 'json',
  encode: true,
  success: function (data) {
  
  
  },
  error: function (data) {
    if(data.responseText == "" || data.responseText == null){


    }else{
  
    document.querySelector(".automessage").innerHTML= data.responseText;
  
    }

  
  }
  });
  
  }
  var AutoMessageLastest = AutoSentMessage();
*/
alert("Message sent");

}else{


alert("Error occured sending your message,if error occurs again please refresh page");

}


    
      },
      error:function(Data){
    
      //document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });
    
  //END OF NESTED FUNCTION TO SEND MESSAGE//



    
      },
      error:function(Data){
    
      document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });
    
  //END OF NESTED FUNCTION TO START A CONVERSATION//    


      
      },
      error:function(Data){
      document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });

      
  $(document).ready(function (e) {
      
      $(".sub-group-form-data2").on('submit', (function(e){
      
      e.preventDefault();
      
      // document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'process/help-center',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
     // document.querySelector(".loader-container-overlay").style.display= "none";
      
      alert(Data);
      
      
      },
      error:function(Data){
     // document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });



      

//NESTED FUCNTION TO SEARCH FOR USERS

function searchUsers(){
  
  var form = $("#search-data");
  
  var url = "process/search-users";
  
  $.ajax({
  type: 'POST',
  url: url,
  data: form.serialize(),
  dataType: 'json',
  encode: true,
  success: function (data) {
  
  
  },
  error: function (data) {
  
  
  document.querySelector(".search-result").innerHTML = data.responseText;
  //NESTED FUNCTION TO ADD USERS//


   
$(document).ready(function (e) {
      
      $(".add-user-form-data").on('submit', (function(e){
      
      e.preventDefault();
      
       document.querySelector(".loader-container-overlay").style.display= "block";
      
      $.ajax({
      
      url: 'Router/add-new-contact',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      success:function(Data){
      
      document.querySelector(".loader-container-overlay").style.display= "none";
      
     // document.querySelector(".general-message-response-message").innerHTML = Data;
     
     alert(Data);
    
      },
      error:function(Data){
    
      document.querySelector(".loader-container-overlay").style.display= "none";
      
      
      }
      
      });
      
      
      
      }));
      
      
      });
    
  //END OF NESTED FUNCTION TO ADD USERS    
  
  
  }
  });
  
  }
  
  
     //NESTED FUNCTION TO SHOW SELECTED PROFILE IMAGE IMAGE
     
var loadFile = 
function upload(event){
  var image = document.querySelector("#output");
  image.src = URL.createObjectURL(event.target.files[0]);
 // document.querySelector(".upload").innerHTML="Upload";
  }

  
function AutoUpdate(){
  
  var form = $("#auto-update");
  
  var url = "process/auto-update-last-seen";
  
  $.ajax({
  type: 'POST',
  url: url,
  data: form.serialize(),
  dataType: 'json',
  encode: true,
  success: function (data) {
  
  
  },
  error: function (data) {
  
//alert( data.responseText);
  
  
  }
  });
  
  }
  

  
  var AutoUpdates = setInterval(AutoUpdate,20000);
  

