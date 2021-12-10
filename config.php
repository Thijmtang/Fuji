
<!doctype html>
<html lang="en">
  <head>
    <title>Fuji</title>
    <link rel="icon" type="image/svg+xml" href="Images/favicon.svg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&Montserrat:wght@600&family=Rubik&display=swap" rel="stylesheet">

  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fuji";

try {
    $conn = new mysqli($servername, $username, $password, $db);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}
//retun active album query for given artist
function Albums($conn, $UserID)
{
    $Album = "SELECT Cover_art, Album_ID
  FROM  album
  WHERE Active IS NOT NULL
  AND Artist_ID = $UserID";
    return mysqli_query($conn, $Album);
}
// check if the uploader id is the same as the creator of the album
function uploaderAlbumCheck($conn, $albumID, $UserID)
{$Album = "SELECT *
  FROM  album
  WHERE Album_ID = $albumID
  AND Artist_ID = $UserID";
    $AlbumResult = mysqli_query($conn, $Album);
    $AlbumCount = mysqli_num_rows($AlbumResult);
    if ($AlbumCount == 1) {
        return true;} else {return false;}

}
function inactiveAlbums($conn, $User)
{
    $inactivealbums = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username FROM album,genre,users
  WHERE album.Genre = genre.Genre_ID
  And album.Artist_ID = users.User_ID
  AND Active IS NULL
  AND User_ID =$User";

    return mysqli_query($conn, $inactivealbums);
}
function activeAlbums($conn, $User)
{
    $activealbums = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username FROM album,genre,users
  WHERE album.Genre = genre.Genre_ID
  And album.Artist_ID = users.User_ID
  AND Active = 1
  AND User_ID =$_SESSION[ID]";

    return mysqli_query($conn, $activealbums);
}
function updateResults($conn, $currprofilepic)
{

    $newSummary = mysqli_real_escape_string($conn, $_POST['Summary']);
    $Updateprofile = "UPDATE users SET Summary='$newSummary', Profile_Image= '$currprofilepic' WHERE  User_ID = '$_SESSION[ID]'";
    return $Updateresults = mysqli_query($conn, $Updateprofile);
}
function Profile($conn, $UserID)
{
    $User = "SELECT * from Users where User_ID = $UserID";
    return mysqli_query($conn, $User);
}
//return follow results for given follower and receiver.
function followingcheck($conn, $Follower, $Receiver)
{
    $Follow = "SELECT *
  FROM follows
  Where Follower_ID =$Follower AND Receiver_ID = $Receiver";
    return $FollowResult = mysqli_query($conn, $Follow);

}
//return followers count for given users
function followerscount($conn, $User)
{
    $Follow = "SELECT *
    FROM follows
    Where Receiver_ID =   $User And Active IS NOT NULL";
    $FollowersResult = mysqli_query($conn, $Follow);
    $Followers_cnt = mysqli_num_rows($FollowersResult);
    return $Followers_cnt;
}
//shows the artists depending on the page you are on.
function showArtists($conn, $results_per_page, $page)
{
    $this_page_first_results = ($page - 1) * $results_per_page;
    $sql = "SELECT Username, User_ID,  Profile_Image
  FROM album, users
  WHERE users.User_ID = album.Artist_ID
  AND  active IS NOT NULL
  group by Artist_ID ORDER BY Username
  LIMIT $this_page_first_results,$results_per_page";

    return $result = mysqli_query($conn, $sql);
}
function AlbumSongs($conn, $AlbumID, $src)
{
    $sql = "SELECT $src FROM songs where Album ='$AlbumID' And Active =1";

    return $Result = mysqli_query($conn, $sql);

}

function showAlbums($conn, $results_per_page, $page)
{
    $this_page_first_results = ($page - 1) * $results_per_page;
    $sql = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username,users.User_ID
FROM album,genre,users
WHERE album.Genre = genre.Genre_ID
And album.Artist_ID = users.User_ID
AND Active = 1
LIMIT $this_page_first_results,$results_per_page";
    return $result = mysqli_query($conn, $sql);

}

function calcPages($conn, $results_per_page, $option)
{
    if ($option = "Artists") {
        $sql = "SELECT Username, User_ID,  Profile_Image
  FROM album, users
  WHERE users.User_ID = album.Artist_ID
  AND  active IS NOT NULL
  group by Artist_ID";
        $result = mysqli_query($conn, $sql);
        $number_of_results = mysqli_num_rows($result);
    } else {
        $sql = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username,users.User_ID FROM album,genre,users
      WHERE album.Genre = genre.Genre_ID
      And album.Artist_ID = users.User_ID
      AND Active = 1";

        $result = mysqli_query($conn, $sql);
        $number_of_results = mysqli_num_rows($result);
    }

    return $number_of_pages = ceil($number_of_results / $results_per_page);

}

//creates a closeable popup with given $message
function notifications($Message)
{
    echo '<div id="noti" class="container" style="margin-bottom: 5%;background-color:#bed8bf;border-radius: .5em; color:white; box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px; ">
    <div class="row" style="">
    <div class="col-sm" style="padding:0"><a onclick="myFunction()"><i class="fas fa-times"></i></a></div>
    </div>
    <div class="row" style="">
      <div class="col-sm align-items-center" style="text-align: center;   ">
      <div class="title" >

      <h4>' . $Message . '</h4>
  </div>
  </div>
  </div>
  </div>';
}

//remove notifications div
?>
<script>
function myFunction() {
  var myobj = document.getElementById("noti");
  myobj.remove();
}
</script>


<style>

element.style {

}
a:not([href]):not([tabindex]){
  transition: .4s;
    width: 50px;
    float: right;

    color:white;
    padding: 5px;
    border-radius: 0.5em;
    text-align: center;
}
a:not([href]):not([tabindex]):hover{

  background-color: red;
  color:white;

}
  </style>