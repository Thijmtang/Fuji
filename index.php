
<?php
session_start();
include 'header.php';

$sql = "SELECT Cover_art, album.Album_ID, highlightedalbums.ID
FROM highlightedalbums,  album
WHERE album.Album_ID = highlightedalbums.ALBUM_ID";

$result = mysqli_query($conn, $sql);

?>

<html>
<body>

<div class="container">
  <div class="row" style="">
    <div class="col-sm-6 align-items-center" style="text-align: center;   ">
    <div class="title" style="background-color:#b4d9b5;border-radius: .5em; color:white; padding-top:1%;padding-bottom:1%;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
   <h4> <i class="fas fa-chart-bar" style="font-size:140%;  "></i> Top picks! </h4>
</div>
        <div class="content"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 1em;margin-top:2%;margin-bottom:2%;">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
while ($row = mysqli_fetch_assoc($result)) {

    if ($row['ID'] == 1) {
        echo '<div class="carousel-item active">
<img class="d-block w-100"src="Images/' . $row['Cover_art'] . '" alt="First slide">
</div>';
    } else {
        echo '
  <div class="carousel-item ">
  <img class="d-block w-100"src="Images/' . $row['Cover_art'] . '" alt="Second slide">
</div> ';

    }

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


