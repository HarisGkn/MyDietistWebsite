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
   
  
    .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
    }

    
    .bg-6 { 
      background-color: #f5f5f5; /* Black Gray */
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
    <a class="nav-link" href="BMI.php">BMI</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="blogPage.php">blog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="Contact.php">Contact us</a>
  </li>
  <?php     
  // it only shows the logout option if the user is logged in, just like index
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo '<li class="nav-item"><a class="nav-link " href="logout.php">Logout</a></li>';
    } else {
      echo '<li class="nav-item"><a class="nav-link" style="cursor:pointer" data-toggle="modal"data-target="#loginModal">login</a></li>';           echo '<li class="nav-item"><a class="nav-link" style="cursor:pointer" data-toggle="modal"data-target="#registerModal">Register</a></li>';
    }
  ?>
</ul>
</div>
  </div>
</nav>



<!-- simple blog using bootstrap media that I filled with Lorem dummy text-->
<section class="bg-6">
<div class="media">
    <img class="align-self-start mr-3" src="generic1.jpg" >
    <div class="media-body">
      <h5 class="mt-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, placeat.</h5>
      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
      <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse doloribus doloremque eaque, praesentium dolore repellat cumque veniam, quaerat enim eos nostrum totam ab debitis quas consequuntur molestias? Saepe, a consectetur! Soluta dignissimos fuga quibusdam doloremque.</p>
    </div>
  </div>
  <br>
  <div class="media">
    <img class="align-self-start mr-3" src="generic1.jpg">
    <div class="media-body">
      <h5 class="mt-0">Lorem ipsum dolor sit amet consectetur.</h5>
      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
      <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti ipsum placeat saepe aut dignissimos est doloremque ullam quam officiis similique natus ut cupiditate et at exercitationem, ex corporis voluptas voluptatibus. Impedit commodi, architecto magni amet in ipsum dolor dolorem, aliquid nobis aperiam rem. Dolore labore dolorem consequatur aut delectus adipisci veritatis, impedit unde at blanditiis harum quod commodi quam, nihil eius ratione rem quia soluta consequuntur animi vero expedita. Provident, culpa numquam eveniet velit molestiae consequatur laboriosam necessitatibus soluta quod iusto cumque fuga sapiente dolorem dolore! Cupiditate quasi velit tempora, suscipit, distinctio quidem perspiciatis error quibusdam officiis aspernatur ab iste accusantium obcaecati eos doloremque neque laudantium nemo mollitia culpa alias ullam vero nesciunt quisquam. Quae voluptates esse eaque dolorem voluptas recusandae, id consequatur mollitia qui similique sequi accusantium unde tempora commodi eius? Repellat alias culpa consequuntur aperiam tempora velit nam vero doloremque necessitatibus excepturi ipsa aspernatur accusantium earum magni esse, unde beatae molestiae dolor similique obcaecati, vitae ab neque. Ullam pariatur distinctio voluptas dolorem excepturi. Sit id quam vel eum dicta a nostrum deleniti veniam, porro laudantium soluta laboriosam quod vitae quibusdam numquam voluptas ratione. Accusamus aliquid vel adipisci molestias ut nesciunt est error quam? Deleniti ratione unde nemo praesentium?</p>
    </div>
  </div>
  <br>
  <div class="media">
    <img class="align-self-start mr-3" src="generic1.jpg">
    <div class="media-body">
      <h5 class="mt-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio sapiente libero laudantium dicta unde eius!</h5>
      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
      <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem architecto sed ut nulla eos dolor ipsa dolorem dolorum natus maiores iste incidunt non magnam autem hic expedita voluptas sapiente voluptate, quos laboriosam at quis ullam quasi vel. Repudiandae sed nulla omnis vel quam alias ratione hic, non sapiente culpa quaerat, sit molestias accusamus nam atque nemo perferendis natus? Consequatur dolor earum aliquid atque eaque suscipit expedita porro sed? Totam, voluptates dicta accusantium molestiae ab et amet fugit inventore iusto, odit, mollitia corporis nemo illo dolor. Dolorem nisi ex distinctio reprehenderit illum repudiandae beatae reiciendis qui. Amet vel laudantium tempore consequatur!</p>
    </div>
  </div>
  <br>
  <div class="media">
  <img class="align-self-start mr-3" src="generic1.jpg" >
  <div class="media-body">
    <h5 class="mt-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus blanditiis obcaecati expedita.</h5>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi praesentium voluptate fugit. Repellendus sed temporibus vel eos, adipisci, libero quisquam magni fugit unde, odit deserunt omnis ipsam excepturi tempore quasi voluptas quos possimus ea. Beatae, placeat provident illo modi explicabo esse cumque, magni architecto, ipsa itaque nostrum distinctio dolorem nemo.</p>
  </div>
</div>
</section>

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