
<?php
session_start();
include 'header.php';

$sql = "SELECT Username, User_ID,  Profile_Image
FROM album, users
WHERE users.User_ID = album.Artist_ID
AND  active IS NOT NULL
group by Artist_ID
";
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
    <a href ="profile.php?id=' . $row['User_ID'] . '">
           <div class="col-sm-12 col-md-3"  >
           <div class="circle" >
           <img class="img-fluid "src="Images/' . $row['Profile_Image'] . '" style=" transition: .4s!important;">
           </a>
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