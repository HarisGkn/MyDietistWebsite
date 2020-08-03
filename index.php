<!-- I used stock/copyright free images that I downloaded from pexels.com for the entire page -->
<!-- ta sxolia einai sta agglika giati eixa provlima me ta ellinika sto vs code sta ubuntu -->
<?php  
session_start();
// includes these files when the method of a form that is entered is post
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
  include "register.php";
  include "login.php";
  include "contactForm.php";
}


 ?>

<!DOCTYPE html>
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
    <!-- simple ajax calls for login, register and contact form -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#submit').click(function() {
          $.ajax({
            method: "POST",
            url: 'register.php',
            data: {
              // passes the required variables to register.php
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
        $('#submit').click(function() {
          $.ajax({
            type: "POST",
            url: 'login.php',
            data: {
              // passes the required variables to login.php
              username: $("#username").val(),
              password: $("#password").val()
            }
            success: function(data)
            {
              //if the login is succesfull it redirects the user to index.php
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

    <script type="text/javascript">
      $(document).ready(function() {
        $('#submit').click(function() {
          $.ajax({
            method: "POST",
            url: 'contactForm.php',
            data: {
              // passes the required variables to contactForm.php
              name: $("#name").val(),
              email: $("#email").val(),
              subject: $("#subject").val(),
              message: $("#message").val()
            }
          });
          window.location.replace('index.php');
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
    .bg-5 { 
      background-color: #242424; 
      color: #fff;
    }
    
    .bg-6 { 
      background-color: #f5f5f5; 
      color: #242424;
    padding: 50px 0;
    }
    
    .bg-7 { 
      background-color: #131313; 
      color: #f5f5f5;
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
    
    .carousel-caption {
      bottom: 50%;
      background: rgba(0,0,0,0.6);
    }
    
    .modal-title, .modal-body{
      color: #242424;
  }
    </style>
  </head>
<body>
  <!-- Navbar --->
<nav class="navbar navbar-default ">
  <div class="container">
		<div class="col-sm-2">
			<a class="navbar-brand" href="#"><img  id="logo" src="UnifitLogo.png"></a>
		</div>
		<div id="mainmenu" class="col-sm-10">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#home">Home</a>
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
    <a class="nav-link" href="blogPage.php">blog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="Contact.php">Contact us</a>
  </li>
  <?php     
  // if the user is logged in it only shows the logout option, if he isn't it shows both login and register options
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

<!-- Carousel  -->
<div id="home" class="p-0 container-fluid bg-4 text-center">
  <div class="bd-example">
   <div id="carouselUnifitCaptions" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
       <li data-target="#carouselCaptions" data-slide-to="1"></li>
       <li data-target="#carouselCaptions" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img src="fitness1.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h3>Fitness</h3>
           <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem reiciendis libero facilis enim error quod hic deserunt voluptatem facere similique.</p>
         </div>
       </div>
       <div class="carousel-item">
         <img src="fitness2.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h3>Lifestyle</h3>
           <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt saepe iure praesentium quam labore aliquam.</p>
         </div>
       </div>
       <div class="carousel-item">
         <img src="fitness3.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-lg-block">
           <h3>Wellness</h3>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro placeat iste labore, eum expedita minima consequuntur sequi!</p>
         </div>
       </div>
     </div>
     <a class="carousel-control-prev" href="#carouselUnifitCaptions" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselUnifitCaptions" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
 </div>
 </div>

<!-- About us -->
<div id="contact" class="container-fluid bg-7 text-center">    
  <h3 class="margin">About Us</h3>
  <div class="row">
	<div class="px-4 col-sm-6"> 
	<div class="embed-responsive embed-responsive-16by9">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZHi_A6tC40Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	</div>
	<div class="col-sm-6"> 
		<h4>About Us</h4>
		<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio maxime at enim illo quasi quae cumque temporibus, impedit ea tempore molestiae nobis ipsa. Nisi, laudantium atque et iste, accusamus assumenda eos impedit minus tempore doloremque ex cum veritatis nulla culpa, saepe expedita voluptas quo quod repellendus ipsum totam repellat veniam!</p>
	</div>
  </div>
  <div class="mt-4 row" id="contact-form">
    <!-- Button trigger modal -->
<a class="btn btn-primary" href="OurTeam.php">Meat our team</a>
</div>
</div>



<!-- testimonials -->
<div id="testimonials" class="container-fluid bg-5 text-center">    
  <h3 class="margin">Our Clients Said</h3>
  <div id="carouselUnifitTestimonials" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselTestimonials" data-slide-to="0" class="active"></li>
      <li data-target="#carouselTestimonials" data-slide-to="1"></li>
      <li data-target="#carouselTestimonials" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
		<div class="row">
		<div class="col-md-3">
		<img class="rounded-circle img-fluid" src="avatar1.jpg" alt="...">
		</div>
		<div class="col-md-9">
          <blockquote>
			<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse nisi praesentium dolore assumenda, sapiente quibusdam harum odit perspiciatis sint neque alias magni suscipit iure doloremque animi nobis delectus quae atque! Reiciendis adipisci error molestias repellendus, quas deleniti illo vero sequi itaque asperiores numquam pariatur laudantium ut cupiditate! Aliquid rem deleniti ab hic. Incidunt, minus consequatur? Enim, labore alias. Optio error in aperiam fugit amet accusamus ducimus architecto cupiditate maiores praesentium, laudantium placeat ea, ex quas qui nesciunt. Obcaecati doloribus deserunt fuga numquam atque amet sint unde ducimus officia maiores sequi ex, provident pariatur ipsum consequuntur deleniti quaerat quis reiciendis repellendus.</p>
    		<footer>John whatever</footer>
			</blockquote>
		</div>
		</div>
      </div>
      <div class="carousel-item">
		<div class="row">
		<div class="col-md-3">
		<img class="rounded-circle img-fluid" src="avatar2.jpg" alt="...">
		</div>
		<div class="col-md-9">
          <blockquote>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum eos, provident commodi unde, eveniet atque nisi sapiente rem consectetur velit deleniti aspernatur sequi excepturi repellat iusto dolorem temporibus vel? Temporibus fugit iure obcaecati molestias et quidem blanditiis hic id consequuntur magnam amet soluta dolor nobis, modi ea aliquid qui aliquam nesciunt voluptatibus dolorum nulla sit. Atque quibusdam vero quas, tenetur omnis obcaecati rem optio id, accusantium provident tempore magni totam ipsum eaque adipisci consequuntur cumque. Iste ipsam voluptatibus voluptas corporis optio distinctio repellendus laboriosam, sed voluptates numquam nemo sunt ullam iusto tenetur! Assumenda aliquid officia ducimus magni accusamus dicta dolore?</p>
    		<footer>Mary something</footer>
		</blockquote>
		</div>
		</div>
      </div>
      <div class="carousel-item">
		<div class="row">
		<div class="col-md-3">
			<img class="rounded-circle img-fluid" src="avatar3.jpg" alt="...">
		</div>
		<div class="col-md-9">
          <blockquote>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At aspernatur tenetur suscipit adipisci exercitationem repudiandae magnam necessitatibus repellat amet tempore reiciendis sunt recusandae sequi corporis laborum, perspiciatis a enim soluta et! Inventore nesciunt ullam voluptatum sapiente ipsam illo unde, distinctio ratione. Commodi ab necessitatibus consequatur dignissimos possimus adipisci accusamus eius quod, at, eaque itaque saepe voluptatem aliquam explicabo totam dicta quae placeat quasi. Quisquam beatae similique perferendis ex repudiandae dicta hic, porro cum commodi vero dolorem aliquid aliquam incidunt mollitia qui veritatis dignissimos molestiae! Nisi, expedita corporis rerum voluptate ex tenetur id nulla, ducimus odio perferendis enim laudantium ea debitis.</p>
    		<footer>George etc</footer>
		</blockquote>
		</div>
		</div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselUnifitTestimonials" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselUnifitTestimonials" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<!-- Contact form -->
<div id="contact" class="container-fluid bg-7 text-center">    
  <h3 class="margin">Contact Us</h3>
  <div class="row">
	<div class="px-4 col-sm-6"> 
	<div class="embed-responsive embed-responsive-16by9">
    <iframe src="https://www.google.com/maps/d/embed?mid=1t2U4Oe_T5nkk5rurn6h-bgqtQRc" width="640" height="480"></iframe>
	</div>
	</div>
	<div class="col-sm-6"> 
		<h4>Contact Address</h4>
		<p><i class="fas fa-home"></i> Καραολή και Δημητρίου 80, Πειραιάς 185 34</p>
		<p><i class="fas fa-phone"></i> Tel: 00000000000000</p>
	</div>
  </div>
  <div class="mt-4 row" id="contact-form">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unifitContactModalCenter">
  <i class="fas fa-message"></i> Contact Form
</button>

<!-- Modal -->
<div class="modal fade" id="unifitContactModalCenter" tabindex="-1" role="dialog"    aria-labelledby="unifitContactModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="unifitContactModalLongTitle">Contact Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <!-- form provides ajax call with required data-->
        <form class="bg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-row ">
                <label>Name</label>
                <input type="text" name="name" class="form-control" >
            </div>    
            <div class="form-row ">
                <label>Email</label>
                <input type="text" name="email" class="form-control" >
            </div>     
            <div class="form-row ">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" >
            </div> 
            <div class="form-row ">
                <label>Message</label>
                <input type="text" name="message" class="form-control" >
            </div>
            <div class="form-row">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>



<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog"    aria-labelledby="registerModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLongTitle">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <!-- form provides ajax call with required data-->
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
        <!-- form provides ajax call with required data-->
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


  <!-- show users modal, triggered by button in footer -->
  <div class="modal fade " id="adminModal" tabindex="-1" role="dialog"    aria-labelledby="adminModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminModalLongTitle">Users</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php
        // takes the id, username and email from all users and displays it
            $sql = "SELECT id,username,name,email FROM users";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $username = $row["username"];
                $id = $row["id"];
                $email = $row["email"];
                $name = $row["name"];
        ?>
                <div >
                  <h1>User id: <?php echo $id.'<br />'; ?></h1>
                  <h2>Username: <?php echo $username.' <br />'; ?></h2>
                  <h2>name: <?php echo $name.' <br />'; ?></h2>
                  <h2>User email: <?php echo $email.'<br />'; ?></h2>
                  <br/>
                </div>
        <?php
              }
          } 
        ?>
        </div>
      </div>
    </div>
  </div>

        



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright &copy; UniFit</p> 
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminModal">
  <i class="fas fa-message"></i> Show users
</button>
</footer>

</body>

</html>