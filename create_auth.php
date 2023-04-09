<?php
// include database parameter connection 
include("config.php");

//to prevent sql_injection is safer to wrap your post values with mysqli_real_escape_string 1=1?id=4344 clone

//since on your instruction there was no based token for creating accounts

/*
lets assume for a loan app getting a username, email, phone number, password will  be enough for the moment then we 
can pass other parameters to validate the user in an orderly session pattern.

*/

$username=mysqli_real_escape_string($conn, $_POST["username"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$phone_number=mysqli_real_escape_string($conn, $_POST["phone_number"]);
$password=mysqli_real_escape_string($conn, $_POST["password"]);
  
// at this point we have to salt the users code

$encpass=password_hash($password, PASSWORD_BCRYPT);
// password has been made default to base_64 encode

// we have to include the sql database attached now

$insert="INSERT INTO `users`(`username`,`email`,`phone_number`,`password`)VALUES('$username','$email','$phone_number','password');

// having a direct link with the database now 
$sql=mysqli_query($conn, $insert);
//setting a boolean value to authenticate
if($sql==true)
{
json_encode("success");
// we are using a json_encode basically because laravel/php cant be embedded with flutter so we use php as an open api 
// so in other for us to pick the validation word we have to convert it to a json

}




?>
