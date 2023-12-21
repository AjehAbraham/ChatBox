<?php
require_once "session.php";

if(isset($_POST["name"]) && !empty($_POST["name"])){



    $search = htmlspecialchars($_POST["name"]);
    $search = trim($search);
    $search = stripslashes($search);
    $search = mysqli_real_escape_string($conn,$search);
    $search = htmlspecialchars($search);


    //CHECK FOR RELATED//

    $select ="SELECT * FROM Register_db WHERE Username 
    LIKE '%$search%' or Email LIKE '%$search%' AND UniqueID <>'$_SESSION[uniqueID]'";

    

$searhResult = mysqli_query($conn,$select);

if(mysqli_num_rows($searhResult) > 0){


while($newResult = mysqli_fetch_assoc($searhResult)){

  if($newResult["Username"] == "" or $newResult["Username"] == NULL){



    $username = $newResult["Email"];

  }else{


    $username = $newResult["Username"]. "(".$newResult["Email"]. ")";

  }

  if($newResult["UniqueID"] == $_SESSION['uniqueID']){

    continue;
  }

//CHECK IF THIS USERS ARE ALREADY FRIENDS //

if($friends_list_array != NULL){

$firstArray = array($newResult["UniqueID"]);

$secondArray = array($friends_list_array["FriendID"]);

if(array_intersect($firstArray,$secondArray)){

 // die("This user already exist in your conatct");

//USERS ARE FRIENDS ALREADY//

$rand = rand() . uniqid();

echo "

<div class='search-result-container'>
<br>
";
echo "
<p>$username  </p><br><br>
  <form id='$rand' class='add-user-form-data'>
  <input type='hidden' name='chatID' value='$newResult[UniqueID]'>
  <button>Friends<i class='fa fa-chat'></i></button></form>

<br>
";

}else{

  //DO NOTHING//
$rand = uniqid();

echo "

<div class='search-result-container'>
<br>
";
  echo "
  <p>$username</p><br><br>
    <form id='$rand' class='add-user-form-data'>
    <input type='hidden' name='chatID' value='$newResult[UniqueID]'>
    <button>Add User <i class='fa fa-chat'></i></button></form>
  <br>
  ";
  

}
}else{


  //USER DOES NOT HAVE ANY FRIENDS/CONTACT YET//

  
$rand = uniqid();

echo "

<div class='search-result-container'>
<br>
";
echo "
<p>$username</p><br><br>
  <form id='$rand' class='add-user-form-data'>
  <input type='hidden' name='chatID' value='$newResult[UniqueID]'>
  <button>Add User <i class='fa fa-chat'></i></button></form>
<br>
";



}


}
echo "<br><br></div>";

}else{

  echo "

  <div class='search-result-container'><br><br>
  <p style='color: ;font-weight: bold;'>User not found for<i>($search)</i></p><br><br>
  </div>
  
  ";
  
  die();
die("not found");

  $select ="SELECT * FROM Register_db WHERE Username='$search' or Email='$search'";

$searhResult = mysqli_query($conn,$select);

if(mysqli_num_rows($searhResult) > 0){
echo "

<div class='search-result-container'>
";

while($newResult = mysqli_fetch_assoc($searhResult)){
echo "
<p>$newResult[Email] 
  <form class='add-user-form'><button>Send message</button></form></p>
<br>
";



}
echo "</div>";

}else{


//USER NOT FOUND//


echo "

<div class='search-result-container'>
<p style='color: red;font-weight: bold;'>User not found</p>
</div>
";
die();
}

}
}