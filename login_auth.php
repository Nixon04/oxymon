<?php

/* 
for UX latest follows, its always better to let users choose either using their username or email address to pass through when loggin in 

*/
// we create a session to identity each user collectively
session_start();


include("config.php");
$username=mysqli_real_escape_string($conn, $_POST["username"]);
$password=mysqli_real_escape_string($conn, $_POST["password"]);


$select="SELECT * FROM `users` WHERE `username`='$username' || `email`='$email'";
$query=mysqli_query($conn, $select);

// at this point we make move to fetch out the salted password 
$data=mysqli_fetch_assoc($query);
$fetch=$data["password"];
 $username=$data["username"];

// we make comparism with the encrypt password and the password given by the user to authenticate.

if(password_verify($password, $fetch))
{
    
    json_encode("please wait.....");
    ?>
  

$_SESSION["username"]=$username;

}
else{
    json_encode("Oops seems your information are not well known to our database");
}

?>
