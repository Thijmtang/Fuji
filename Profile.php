
<?php
session_start();
include 'header.php';

$sql = "SELECT Cover_art, album.Album_ID, highlightedalbums.ID
FROM highlightedalbums,  album
WHERE album.Album_ID = highlightedalbums.ALBUM_ID
AND album.Artist_ID = 9";

$result = mysqli_query($conn, $sql);

?>

<html>
<body>

<div class="container"style="border-radius: 34px!important; background-color:white;">
      <div class="contentcc "style="padding:2%;">
  <div class="row" style="">
  <div class="col-sm-6 align-items-center" style="text-align: center;   ">
  <h1>Keshi</h1>
<div class="circle">
           <img class="img-fluid "src="https://yt3.ggpht.com/5PWVj9wPhRvJvY0RgLPnrMavM_RgS2jLSCgC4fUTsv8EAMzzQIYekw7FOdlA3RToXFEihTabYw=s900-c-k-c0x00ffffff-no-rj" style=" transition: all .4s ease-in-out!important;">
</div>

<div id="module" class="container">
<h3>About</h3>
<p class="collapse" id="collapseExample" aria-expanded="false">
    Bacon ipsum dolor amet doner picanha tri-tip biltong leberkas salami meatball tongue filet mignon landjaeger tail. Kielbasa salami tenderloin picanha spare ribs, beef ribs strip steak jerky cow. Pork chop chicken ham hock beef ribs turkey jerky. Shoulder beef capicola doner, tongue tail sausage short ribs andouille. Rump frankfurter landjaeger t-bone, kielbasa doner ham hock shankle venison. Cupim capicola kielbasa t-bone, ball tip chicken andouille venison pork chop doner bacon beef ribs kevin shankle. Short loin leberkas tenderloin ground round shank, brisket strip steak ham hock ham.
</p>
<a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
</a>

</div>

</div>


    <div class="col-sm-6 align-items-center" style="text-align: center;   ">
    <div class="title" style="background-color:#b4d9b5;border-radius: .5em; color:white; padding-top:1%;padding-bottom:1%;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
   <h4> <i class="fas fa-music" style="font-size:140%;  "></i> Discography </h4>
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

<style>

#module {

  font-size: 14px;
  line-height: 1.5;
}

#module a.collapsed:after  {
    content: '+ Show More';
}

#module a:not(.collapsed):after {
    content: '- Show Less';
}
</style>
