
<?php
session_start();
include 'header.php';

$sql = "SELECT Username, COUNT(Album_ID)
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
           <img class="img-fluid "src="https://i.scdn.co/image/ab6761610000e5ebd3f8c537654b0aba24b8763f" style=" transition: all .4s ease-in-out!important;">
       </div>
            ' . $row['Username'] . '
            </br>

            </div>

          </br>
';

}
?>


        </div>
        </div>

</body>
</html>