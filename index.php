
<?php
session_start();
include 'header.php';

$sql = "SELECT Cover_art, album.Album_ID, highlightedalbums.ID
FROM highlightedalbums,  album
WHERE album.Album_ID = highlightedalbums.ALBUM_ID";

$result = mysqli_query($conn, $sql);

?>
<body>
  <div class="container"style="border-radius: 34px!important;!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">

<div class="row">
  <div class="col-sm-6"><i class="fas fa-compact-disc fa-spin" style="font-size:2000%;"></i></div>
  <div class="col-sm-6"><h3><b>Discover more with Fuji</b></h3>Upload your first track and begin your journey. SoundCloud gives you space to create, find your fans, and connect with other artists.</div>


</div></div>
</body>


<?php

?>


