<?php  
session_start();
//same as index except it doesn't include contact
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
  include "register.php";
  include "login.php";

}

 ?>
<html lang="en">
  <head>
    <title>UniFit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- simple ajax calls, same as index -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#btnsubmit').click(function() {
          $.ajax({
            method: "POST",
            url: 'register.php',
            data: {
              username: $("#username").val(),
              password: $("#password").val(),
              name: $("#name").val(),
              email: $("#email").val()
            }
          });
          window.location.replace('index.php');
        });
      });
    </script>

      <script type="text/javascript">
        $(document).ready(function() {
        $('#btnsubmit').click(function() {
          $.ajax({
            type: "POST",
            url: 'login.php',
            data: {
              username: $("#username").val(),
              password: $("#password").val()
            },
            success: function(data)
            {
              if (data === 'success') {
                window.location.replace('index.php');
              }
              else {
                alert("Wrong combination of username and password!");
              }
            }
          });
        });
        });
      </script>

    <style>
    body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
      display:flex; 
      flex-direction:column; 
    }
    
    #logo{
    width: 150px
    }
    a:visited {
  color: white;
    }
    
    p {font-size: 16px;}
    .margin {margin-bottom: 45px;}

    .bg-3 { 
      background-color: #ffffff;
      color: #555555;
    }
    .bg-4 { 
      background-color: #2f2f2f;
      color: #fff;
    }
    .bg-6 { 
      background-color: #f5f5f5;
      color: #242424;
    padding: 50px 0;
    }
    

    
    .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
    }
    .navbar {
      padding-top: 0px;
      padding-bottom: 0px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
    }
    
    nav{
    background: #2f2f2f;
    }
    
    footer{
      margin-top:auto; 
    }

    h2 {
    font-family: Arial, Verdana;
    font-weight: 800;
    font-size: 2.5rem;
    color: #091f2f;
    text-transform: uppercase;
}





    @media (min-width: 750px){#contact-form{
    margin: 0 45%;
    }}
    
    @media (max-width: 749px){#contact-form{
    margin: 0 30%;
    }}
    



    
    </style>
  </head>
<body>
<!-- <?php
include "config.php";
?> -->
  <!-- Navbar --->
<nav class="navbar navbar-default ">
  <div class="container">
		<div class="col-sm-2">
			<a class="navbar-brand" href="index.php"><img id="logo" src="UnifitLogo.png"></a>
		</div>
		<div id="mainmenu" class="col-sm-10">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="OurTeam.php">Our Team</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="QnA.php">FAQ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="BMI.php">BMI</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="blogPage.php">blog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="Contact.php">Contact us</a>
  </li>
  <?php     
  // it only shows the logout option if the user is logged in, just like index
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo '<li class="nav-item"><a class="nav-link " href="logout.php">Logout</a></li>';
    } else {
      echo '<li class="nav-item"><a class="nav-link" style="cursor:pointer" data-toggle="modal"data-target="#loginModal">login</a></li>';   
      echo '<li class="nav-item"><a class="nav-link" style="cursor:pointer" data-toggle="modal"data-target="#registerModal">Register</a></li>';
    }
  ?>
</ul>
</div>
  </div>
</nav>

<!-- simple form takes required user input and then uses a script to calculate the result and show it on screen -->
<form class="bg-6">
  <fieldset>
    <div class="form-group">
      <label for="Height">Height(m)</label>
      <input type="number" step="0.01" class="form-control" id="hgt" placeholder="Enter your height in metres">
    </div>
    <div class="form-group">
      <label for="Weight">Weight(kg)</label>
      <input type="number" step="0.01" class="form-control" id="wgt" placeholder="Enter your weight in kg">
    </div>
    <div class="form-check">
      <input type="radio" id="male" name="gender" value="male" >
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="female" >
      <label for="female">Female</label>
    </div>
    <button type="button" id="calculate" class="btn btn-primary">Submit</button>
    <div class="form-group">
      <label> BMI </label>
      <output class="bg-3" id="result">0</output>
    </div>
    <div class="form-group">
      <label> Status </label>
      <output class="bg-3" id="category"></output>
    </div>   
  </fieldset>
</form>
  <p class="bg-3"> <span id=bmi></span></p>
<script>
    $("#calculate").click(function(e){
    var height = $("#hgt").val();
    var weight = $("#wgt").val();
    // calculates bmi
    var bmi = parseFloat(weight)/parseFloat(Math.pow(height, 2));
    // shows it on screen
    $('#result').html(bmi);
    // checks if male or female is cheched, then checks what the bmi range is and shows the appropriate result
    if($('#male').is(':checked')) {
      if(bmi<19.5){
        $('#category').html("Underweight");
      }
      else if(bmi<24.9){
        $('#category').html("Average");
      }
      else if(bmi<29.9){
        $('#category').html("class I obesity");
      }
      else if(bmi<40){
        $('#category').html("class II obesity");
      }
      else if(bmi>=40){
        $('#category').html("class III obesity");
      }
    }
    else if($('#female').is(':checked')) {
      if(bmi<18.5){
        $('#category').html("Underweight");
      }
      else if(bmi<23.5){
        $('#category').html("Average");
      }
      else if(bmi<28.6){
        $('#category').html("class I obesity");
      }
      else if(bmi<40){
        $('#category').html("class II obesity");
      }
      else if(bmi>=40){
        $('#category').html("class III obesity");
      }
    }
    e.preventDefault();
  })
</script>

<!-- both register and login modals are taken from index -->
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog"    aria-labelledby="registerModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLongTitle">Contact Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="bg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-row ">
                <label>Username</label>
                <input type="text" name="username" class="form-control" >
            </div>    
            <div class="form-row ">
                <label>Name</label>
                <input type="text" name="name" class="form-control" >
            </div>     
            <div class="form-row ">
                <label>Email</label>
                <input type="text" name="email" class="form-control" >
            </div> 
            <div class="form-row ">
                <label>Password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-row">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>

        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"    aria-labelledby="loginModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLongTitle">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-row">
                <label>Username</label>
                <input type="text" name="username" class="form-control" >
            </div>    
            <div class="form-row ">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-row">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright &copy; UniFit</p> 
</footer>

</body>
</html>