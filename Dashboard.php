
<?php
ob_start();
session_start();
include 'header.php';

if ($_SESSION["LOGGED_IN"] == false) {
    header('Location: index.php');
    notifications("Please log in first");
    exit;
}

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
<div class="container transition"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
<?php
echo '<h4 style="font-weight: 800; color:Black;"><i class="fas fa-eye"></i> Public Albums</h4>';
echo ' <div class="row" style="padding:1%; ">';

while ($row = mysqli_fetch_assoc($activealbumsresults)) {

    echo '
           <div class="col-sm-12 col-md-3"  >

           <h4 style="font-weight: 600; color:#bed8bf;">' . $row['Title'] . '</h4>
           <a href="ChangeAlbumStatus.php?id=' . $row['Album_ID'] . '" onclick="return confirm(Are you sure?)">
           <button  type="submit" class="btn btn-primary"name="btnSubmit" style ="width:100%!important; margin-bottom:5%" ><i class="fas fa-minus" style="font-size:150%!important"></i> Deactivate </button>
           </a>
           <a href="editAlbum.php?id=' . $row['Album_ID'] . '" onclick="return confirm(Are you sure?)">
           <button type="submit" class="btn btn-primary"name="btnSubmit"style ="width:100%!important;margin-bottom:5%"><i class="fas fa-edit" style="font-size:150%!important"></i> Edit </button>
           </a>
           <div class="albumcover">

                  <img class="img-fluid "src="Images/' . $row['Cover_art'] . '" ;
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">

            </div>
            </div>

          </br>

';

}
?>
</div>
</div></div>

<div class="container transition"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
<?php
echo '<h4 style="font-weight: 800; color:Black;"><i class="fas fa-eye-slash"></i> Unlisted Albums</h4>';
echo ' <div class="row" style="padding:1%; ">';

while ($row2 = mysqli_fetch_assoc($inactivealbumsresults)) {

    echo '
           <div class="col-sm-12 col-md-3"  >

           <h4 style="font-weight: 600; color:#bed8bf;">' . $row2['Title'] . '</h4>
           <a href="ChangeAlbumStatus.php?id=' . $row2['Album_ID'] . '">

           <button type="submit" class="btn btn-primary"name="btnSubmit" style ="width:100%!important; margin-bottom:5%"><i class="fas fa-plus" style="font-size:150%!important"></i> Activate </button>
           </a>
           <button type="submit" class="btn btn-primary"name="btnSubmit"style ="width:100%!important;margin-bottom:5%"><i class="fas fa-edit" style="font-size:150%!important"></i> Edit </button>
            </a>
           <div class="albumcover">

                  <img class="img-fluid "src="Images/' . $row2['Cover_art'] . '" ;
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">

            </div>




            </div>

          </br>

';

}
?>
</div>
</div>


</body>
</html>