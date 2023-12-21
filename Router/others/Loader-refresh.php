<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  exit;

}
?>

<div class="loader-container-overlay">
    <div class="loader-container">
        <p id="Loader-refresh"></p>
    </div>
</div>

<style>
     .loader-container-overlay{
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                /*overflow-y: scroll;*/
                background-color: rgba(255,255,255,0.4);
            
                display: none;
                z-index: 10;
            }
            .loader-container{
position: absolute;
margin:  -50px 0 0 -50px;
left: 54%;
right: 54%;
top: 50%;
      text-align: center;
                
            }
            #Loader-refresh{
                border-radius: 50%;
                width: 42px;
                height: 42px;
                border: solid red;
                border-top:  solid transparent;
                animation: Loader 1s linear infinite;
                
            }
            @keyframes Loader {
                0%{
                    transform: rotate(0deg);
                }
                100%{
                    transform: rotate(360deg);
                }
            }
           
.Dark-mode .loader-container-overlay{
    background-color: rgba(0,0,56);
    color: white;
}
.Dark-mode #Loader-refresh{
    border: solid red;
    
    border-top:  solid transparent;
}
</style>

      