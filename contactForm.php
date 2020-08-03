<?php
session_start();
// Include config file
require_once "config.php";
// takes the data from tha ajax call
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Prepare an insert statement
    $sql = "INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
        if(mysqli_stmt_execute($stmt)){
            // Redirect to login page
            header("location: index.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }    
}

?>