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
.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #f4f4f4;
    padding: 0;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.5rem;
}

.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
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
    <a class="nav-link active" href="QnA.php">FAQ</a>
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


<!-- simple accordion section for frequently asked questions, which are all Lorem -->
<section class="accordion-section clearfix mt-3 bg-6 aria-label="Question Accordions">
    <div class="container">
    
        <h2>Frequently Asked Questions </h2>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                  Lorem ipsum dolor sit amet consectetur
                </a>
              </h3>
            </div>
            <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius tempore iste perspiciatis? Sunt cum illo eos, libero voluptates aut asperiores maxime neque, ab tempora reiciendis consectetur in labore quidem ratione. Quia odio excepturi temporibus distinctio, sit veritatis. Corporis modi sint quia et, vitae ex doloremque nemo aspernatur tempore quos? Excepturi?</p>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                  Lorem ipsum dolor sit amet.
                </a>
              </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad facere possimus et minima iusto maxime explicabo. Expedita recusandae impedit quos cumque est unde et molestias officia, facere voluptas hic cum.</p>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                  Lorem ipsum dolor sit amet consectetur.
                </a>
              </h3>
            </div>
            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni eligendi vel fugiat totam libero aliquid quas debitis!</p>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </a>
              </h3>
            </div>
            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading4">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                  Lorem ipsum dolor sit amet consectetur adipisicing .
                </a>
              </h3>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading5">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
                  Lorem ipsum sit amet consectetur adipisicing elit.
                </a>
              </h3>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading6">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                  Lorem ipsum dolor amet consectetur adipisicing elit.
                </a>
              </h3>
            </div>
            <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading7">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
                  Lorem ipsum dolor sit consectetur adipisicing elit.
                </a>
              </h3>
            </div>
            <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading8">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapse8">
                  Lorem ipsum dolor sit amet adipisicing elit.
                </a>
              </h3>
            </div>
            <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading9">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="true" aria-controls="collapse9">
                  Lorem ipsum dolor sit amet consectetur adipisicing .
                </a>
              </h3>
            </div>
            <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading10">
              <h3 class="panel-title">
                <a class="collapsed text-dark" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="true" aria-controls="collapse10">
                  Lorem ipsum dolor sit amet consectetur elit.
                </a>
              </h3>
            </div>
            <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quo laborum eius magnam cum! Dolore, expedita. Molestiae, temporibus accusantium? Hic veritatis expedita veniam. Aperiam sunt rem rerum, animi ipsum error ratione excepturi labore repudiandae? Accusantium expedita ipsa, quia autem fuga ducimus. Inventore, cumque obcaecati iusto ducimus hic fugiat officia nemo?</p>
              </div>
            </div>
          </div>

          
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