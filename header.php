<?php

require_once 'config.php'

?>
<html>
  <div class="header"style=" padding-bottom: 5%;">
    <div class="container"  >
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="padding: 0px!important">
    <div class="container" >
  <a class="navbar-brand" href="index.php"><i class="fas fa-mountain" style="font-size:200%!important;"></i> fuji</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto align-items-end ml-auto">

    <li class="nav-item">
        <a class="nav-link" href="Artists.php">Artists</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Music.php">Music</a>
      </li>
      <?php

//not loggedin
if (empty($_SESSION['Name'])) {
    echo '
    <li class="nav-item" >
    <div class="Loginlink">
   <a class="nav-link Loginlink" href="Login.php">Login</a></div>
    </li>

    <li class="nav-item" style="padding-left:2%">
    <div class="Signuplink">
        <a class="nav-link " href="signup.php">Signup</a></div>
    </li>

';
}
//logged in
if (!empty($_SESSION['Name'])) {
    echo '<li class="nav-item dropdown">

  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

  <div class="Profile_image" style = "width:35px;height:35px;" >
  <img class ="img-fluid" id="Profile image" src="Images/' . $_SESSION['Profilepic'] . '"  />
  </div>

  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <a class="dropdown-item" href="Profile.php?id=' . $_SESSION['ID'] . '"> My profile</a>
   <a class="dropdown-item" href="Dashboard.php"><i class="fas fa-border-all" style="font-size:120%"></i> Dashboard</a>

    <a class="dropdown-item" href="Upload_song.php"><i class="fas fa-file-upload" style="font-size:120%"></i> Upload music</a>
    <a class="dropdown-item" href="CreateAlbum.php"><i class="fas fa-pencil-alt" style="font-size:120%"></i> Create Album</a>
    <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="editProfile.php"><i class="fas fa-user-edit" style="font-size:120%"></i> Edit profile</a>
    <a class="dropdown-item" href="logout.php">logout <i class="fas fa-sign-out-alt"></i></a>
  </div>

</li>';
}
?></div>
</div>
    </ul>

</div>
</div>
  </body>
</html>



<style>
  .Loginlink .nav-link{    transition:.3s;
    background-color: #bed8bf;
    border-radius: 39px!important;
    background-color: #bed8bf;
    border-radius: 39px!important;
    color:white!important;
    border:1px solid white;
    width: 75px;
    text-align:center;
  }
 .Loginlink .nav-link:hover{
    border-radius: 39px!important;
    color:#bed8bf!important;
    border:1px solid #bed8bf;
    background-color: white!important;
  }
    .Signuplink .nav-link{
    transition:.3s;
    background-color: white;
    border-radius: 39px!important;
    color:orange!important;
    border:1px solid orange;
    width: 90px;
    text-align:center;

  }
 .Signuplink .nav-link:hover {
    color: white!important;
    background-color:orange;

}
  </style>

