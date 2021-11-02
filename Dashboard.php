
<?php
session_start();
include 'header.php';
// Fetch all information for the albums and create a row for each
$activealbums = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username FROM album,genre,users
WHERE album.Genre = genre.Genre_ID
And album.Artist_ID = users.User_ID
AND Active = 1
AND User_ID =$_SESSION[ID]";

$inactivealbums = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username FROM album,genre,users
WHERE album.Genre = genre.Genre_ID
And album.Artist_ID = users.User_ID
AND Active IS NULL
AND User_ID =$_SESSION[ID]";

$inactivealbumsresults = mysqli_query($conn, $inactivealbums);
$activealbumsresults = mysqli_query($conn, $activealbums);

?>

<html>
<body>
<div class="container"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
</div>
<div class="container"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
      <h1 style="font-weight: 600; color:#3d4036;">Inactive Albums </h1>
<?php

while ($row = mysqli_fetch_assoc($inactivealbumsresults)) {
    echo '
      <div class="row" style="padding:1%; ">

          <div class="col-sm " >
          <h1 style="font-weight: 600; color:#bed8bf;">' . $row['Title'] . '</h1>
      </div>
      </div>

        <div class="row">

           <div class="col-sm-6 col-md-3""  >
           <div class="albumcover">
                  <img class="img-fluid "src="Images/' . $row['Cover_art'] . '" style=" transition: all .4s ease-in-out!important;
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
            </div>
            </div>
            <div class="col-sm-9 md-6"  >
            <button type="submit" class="btn btn-primary"name="btnSubmit"><i class="fas fa-trash-alt" style="font-size:150%!important"></i> Upload </button>
      </br>
                 genre: ' . $row['Genre'] . '
                 </br>
                 date: ' . $row['Date'] . '
            </div>


          </div>

          </br>
';
}
?>

<a href="javascript:confirmDelete('delete.page?id=1')"><i class="fas fa-trash-alt" style="font-size:150%!important"></i></a>
</div>
</div>















<div class="container"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
      <div class="contentcc "style="padding:2%;">
      <h1 style="font-weight: 600; color:#3d4036;">Active Albums </h1>
<?php

echo ' <div class="row" style="padding:1%; ">';
while ($row = mysqli_fetch_assoc($activealbumsresults)) {

    echo '
           <div class="col-sm-12 col-md-3"  >
           <h4 style="font-weight: 600; color:#bed8bf;">' . $row['Title'] . '</h4>
           <div class="albumcover">

                  <img class="img-fluid "src="Images/' . $row['Cover_art'] . '" style=" transition: all .4s ease-in-out!important;
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">

            </div>
            ' . $row['Username'] . '
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

<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
   document.location = delUrl;
  }
}
</script>