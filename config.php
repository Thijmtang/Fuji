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
    <link rel="icon" type="image/svg+xml" href="Images/favicon.svg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&Montserrat:wght@600&family=Rubik&display=swap" rel="stylesheet">

  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




    <?php
function notifications($Message)
{
    echo '<div id="noti" class="container" style="margin-bottom: 5%;background-color:#bed8bf;border-radius: .5em; color:white; box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px; ">
    <div class="row" style="">
    <div class="col-sm" style="padding:0"><a onclick="myFunction()"><i class="fas fa-times"></i></a></div>
    </div>
    <div class="row" style="">
      <div class="col-sm align-items-center" style="text-align: center;   ">
      <div class="title" >

      <h4>' . $Message . '</h4>
  </div>
  </div>
  </div>
  </div>';
}

?>

<script>
function myFunction() {
  var myobj = document.getElementById("noti");
  myobj.remove();
}


$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 300) {
	    $(".black").css("background" , "blue");
	  }

	  else{
		  $(".black").css("background" , "#333");
	  }
  })
})

</script>


<style>

element.style {

}
a:not([href]):not([tabindex]){
  transition: .4s;
    width: 50px;
    float: right;

    color:white;
    padding: 5px;
    border-radius: 0.5em;
    text-align: center;
}
a:not([href]):not([tabindex]):hover{

  background-color: red;
  color:white;

}
  </style>