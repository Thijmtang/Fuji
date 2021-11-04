<?php
session_start();
include 'header.php';
// Fetch all information for the albums and create a row for each
$sql = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username FROM album,genre,users
WHERE album.Genre = genre.Genre_ID
And album.Artist_ID = users.User_ID
AND Active = 1";
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
           <h4 style="font-weight: 600; color:#bed8bf;">' . $row['Title'] . '</h4>
           <div class="albumcover">

                  <img class="img-fluid "src="Images/' . $row['Cover_art'] . '" ;
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">

            </div>
            <h7 style="font-weight: 600; ">' . $row['Username'] . '</h7>
            </br>
                       Genre: ' . $row['Genre'] . '
                       </br>
                       Date: ' . $row['Date'] . '
            </div>

          </br>
';

}
?>

</div>
</div>





</body>
</html>