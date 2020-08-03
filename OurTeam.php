<?php  
session_start();
//same as index except it doesn't include the contact form
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
    }
    
    #logo{
    width: 150px
    }
    a:visited {
  color: white;
    }
    
    p {font-size: 16px;}
    .margin {margin-bottom: 45px;}
   
 
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
    
    @media (min-width: 750px){#contact-form{
    margin: 0 45%;
    }}
    
    @media (max-width: 749px){#contact-form{
    margin: 0 30%;
    }}
    
    </style>
  </head>
<body>
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
    <a class="nav-link active" href="OurTeam.php">Our Team</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="QnA.php">FAQ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="BMI.php">BMI</a>
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
<!-- simple team cards | I used stock photos and generic names i found on the internet -->
<div class="bg-6">
  <div id="team" class="container text-center">
  <h3 class="margin">Our Team</h3>
  <div class="card-group">
    <div class="card">
      <img class="p-2 card-img-top rounded-circle" src="ceo.jpg" width="250" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Tiffany Rona</h5>
        <p class="card-text">The woman with the plan, a skilled dietician with more than a decade of experience, Tiffany is also the founder of UniFit </p>
      </div>
      <div class="card-footer">
        <small class="text-muted">CEO and founder of UniFit</small>
      </div>
    </div>
    <div class="card">
      <img class="p-2 card-img-top rounded-circle" src="manager.jpg" width="250" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Juan Pero</h5>
        <p class="card-text">An ambitious and driven individual, Juan has been a very important factor in this company's success</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Project Manager</small>
      </div>
    </div>
    <div class="card">
      <img class="p-2 card-img-top rounded-circle" src="dev.jpg" width="250" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Rebecca Cristobal</h5>
        <p class="card-text">Rebecca, despite being a fairly novice web developer, is one of the most valuable members of the team.</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Web Developer</small>
      </div>
    </div>
  </div>
  <div class="card-group">
    <div class="card">
      <img class="p-2 card-img-top rounded-circle" src="dietician1.jpg" width="250" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Paula Maria</h5>
        <p class="card-text">Paula has been obsessed with fitness since she was a kid and now has well over a decade of experience as a dietician</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">dietician</small>
      </div>
    </div>
    <div class="card">
      <img class="p-2 card-img-top rounded-circle" src="dietician2.jpg" width="250" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Rich Anton</h5>
        <p class="card-text">Despite being young, Rich has an impressive resume, having worked with important people like a famous guy or another famous guy</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">dietician</small>
      </div>
    </div>
    <div class="card">
      <img class="p-2 card-img-top rounded-circle" src="dietician3.jpg" width="250" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Something Something</h5>
        <p class="card-text">Very important person doing diet stuff</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Web Developer</small>
      </div>
    </div>
  </div>
  </div>
  </div>

<!-- both register and login modals are taken from index -->
  <!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog"    aria-labelledby="registerModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg-6">
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
      <div class="modal-content bg-6">
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