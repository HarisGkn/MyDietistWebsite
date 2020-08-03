<?php
session_start();
// Include config file
require_once "config.php";
 
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$email = $_POST["email"];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password, name, email) VALUES (?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $username, password_hash($password, PASSWORD_DEFAULT), $name,$email);
        if(mysqli_stmt_execute($stmt)){
            // Redirect to index page
            header("location: index.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }



}
?>

