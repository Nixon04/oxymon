<?php
/* 
on this sided script it is very understanding that there are 7 parameters made for users to insert on, well there isn't much security to be placed in here other prompt
calls will be stated in the readme file. so on the parameters we have 
name, email, phone_number, address, salary, amount to borrow and duration.
*/

//include database

include("config.php");

$username=mysqli_real_escape_string($conn, $_POST["username"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$phone_number=mysqli_real_escape_string($conn, $_POST["phone_number"]);
$address=mysqli_real_escape_string($conn, $_POST["address"]);
$salary=mysqli_real_escape_string($conn, $_POST["salary"]);
$amount_to_borrow=mysqli_real_escape_string($conn, $_POST["amount_to_borrow"]);
$duration=mysqli_real_escape_string($conn, $_POST["duration"]);

// lets assume the table for all users request is `application`

$insert= "INSERT INTO `application`(`username`,`email`,`phone_number`,`address`,`salary`,`amount`,`amount_to_borrow`,`duration`)
VALUES('$username', '$email', '$phone_number','$address','$salary','$amount_to_borrow','$duration');

$sql=mysqli_query($conn, $insert);

//set a boolean value to record

if($sql==true)
{
json_encode("application successfully delivered");
}




?>
