<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fuji";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<!doctype html>
<html lang="en">
  <head>
    <title>Fuji</title>
    <link rel="icon" type="image/svg+xml" href="Images/favicon.svg" style="color:red!important;">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Rubik&display=swap" rel="stylesheet">

  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




    <div class="container" style=" padding-bottom: 5%;" >
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="padding: 0px!important">
    <div class="container" >
  <a class="navbar-brand" href="index.php"><i class="fas fa-mountain" style="font-size:200%!important;"></i> fuji</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="Artists.php">Artists</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Music.php">Music</a>
      </li>
      <?php

//only show login options on hover
if (empty($_SESSION['Name'])) {
    echo '<li class="nav-item dropdown">

  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
  <i class="fas fa-user-circle" style="font-size:150%!important;"></i>
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

    <a class="dropdown-item" href="login.php"> Log in</a>
    <a class="dropdown-item" href="signup.php"> Sign up</a>

</li>';
}
//show
if (!empty($_SESSION['Name'])) {
    echo '<li class="nav-item dropdown">

  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
  <i class="fas fa-user-circle" style="font-size:150%!important;"> </i> ' . $_SESSION['Name'] . '

  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
   <a class="dropdown-item" href="Dashboard.php"><i class="fas fa-border-all" style="font-size:120%"></i> Dashboard</a>
    <a class="dropdown-item" href="#"><i class="fas fa-address-card" style="font-size:120%"></i> My profile</a>
    <a class="dropdown-item" href="Upload_song.php"><i class="fas fa-file-upload" style="font-size:120%"></i> Upload music</a>
    <a class="dropdown-item" href="CreateAlbum.php"><i class="fas fa-pencil-alt" style="font-size:120%"></i> Create Album</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="logout.php">logout <i class="fas fa-sign-out-alt"></i></a>
  </div>
</li>';
}
?>
    </ul>
</div>
</div>
</div>

  </body>
</html>


<script>
document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth > 992) {

	document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

		everyitem.addEventListener('mouseover', function(e){

			let el_link = this.querySelector('a[data-bs-toggle]');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.add('show');
				nextEl.classList.add('show');
			}

		});
		everyitem.addEventListener('mouseleave', function(e){
			let el_link = this.querySelector('a[data-bs-toggle]');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.remove('show');
				nextEl.classList.remove('show');
			}


		})
	});

}
// end if innerWidth
});
const navbar = document.querySelector('.navbar');
window.onscroll = () => {
    if (window.scrollY > 1) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active');
    }
};
  </script>


<?php
function notifications($Message)
{
    echo '<div class="container">
    <div class="row" style="">
      <div class="col-sm align-items-center" style="text-align: center;   ">
      <div class="title" style="background-color:#bed8bf;border-radius: .5em; color:white; padding-top:1%;padding-bottom:1%;margin-bottom:5%;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
     <h4>' . $Message . '</h4>
  </div>
  </div>
  </div>';
}
?>