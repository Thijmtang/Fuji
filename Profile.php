
<?php
session_start();
include 'header.php';
$UserID = $_GET['id'];
$Album = "SELECT Cover_art, Album_ID ,count(Album_ID)
FROM  album
WHERE Active IS NOT NULL
AND Artist_ID = $UserID";

$User = "SELECT Username,Profile_Image, Summary from Users where User_ID = $UserID";

$albumresult = mysqli_query($conn, $Album);

$userresult = mysqli_query($conn, $User);

while ($row = mysqli_fetch_assoc($userresult)) {
    $userprofilepic = $row['Profile_Image'];
    $userSummary = $row['Summary'];
    $username = $row['Username'];

}
?>

<html>
<body>

<div class="container"style="border-radius: 34px!important; background-color:white;">
      <div class="contentcc "style="padding:2%;">
      <h1 style="font-weight:600"><?php echo $username ?></h1>
  <div class="row" style="">
  <div class="col-sm-6 align-items-center" style="text-align: center;   ">

<div class="circle">
           <img class="img-fluid "src="Images/<?php echo $userprofilepic ?>" style=" transition: all .4s ease-in-out!important;">
</div>
<?php
echo '</br><div class="summary" style = "float:left">' . $userSummary . '</div>';
?>


</div>


    <div class="col-sm-6 align-items-center" style="text-align: center;   ">

        <div class="content"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 1em;margin-top:2%;margin-bottom:2%;">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
$count = 2;
if ($row = mysqli_fetch_assoc($albumresult)) {

    if ($count == 1) {
        echo '<div class="carousel-item active">
<img class="d-block w-100"src="Images/' . $row['Cover_art'] . '" alt="First slide">
</div>';
    }

    echo '
  <div class="carousel-item ">
  <img class="d-block w-100"src="Images/' . $row['Cover_art'] . '" alt="Second slide">
</div> ';

}

?>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
            </div>
    </div>

    </div>




</body>
</html>


<?php

?>

<style>

#module {
  font-size: 14px;
  line-height: 1.5;

}

#module a.collapsed:after  {
  font-family: "Font Awesome 5 Free";
  content: "\f107";
  font-weight: 900;
    float:left!important;
    color: black;
    font-size: 20PX;
 transition: all .3s!important;
}

#module a:not(.collapsed):after {
  font-family: "Font Awesome 5 Free";
  color: black;
    float:left!important;
    content: "\f107";
  font-weight: 900;
  transition: all .5s!important;
  transform: rotate(180deg);
  font-size: 30PX;
}
</style>