
<?php
session_start();
include 'header.php';

$sql = "SELECT Username, COUNT(Album_ID), Profile_Image
FROM album, users
WHERE users.User_ID = album.Artist_ID group by Artist_ID
Having COUNT(Album_ID) > 0";
$result = mysqli_query($conn, $sql);

?>

<html>
<body>

<div class="container"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
<?php
echo ' <div class="row" style="padding:1%; ">';
while ($row = mysqli_fetch_assoc($result)) {

    echo '
           <div class="col-sm-12 col-md-3"  >
           <div class="circle">
           <img class="img-fluid "src="Images/' . $row['Profile_Image'] . '" style=" transition: .4s!important;">
       </div>
            ' . $row['Username'] . '
            </br>

            </div>

          </br>
';

}
?>
  <audio controls>
  <source src="Audio/11_03_2021-19-39_29Killing Me Softly With His Song.mp3">
Your browser does not support the audio element.
</audio>

        </div>
        </div>

</body>
</html>