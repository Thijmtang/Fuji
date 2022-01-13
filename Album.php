
<?php
session_start();
ob_start();
include 'header.php';
if ($_SESSION["LOGGED_IN"] == false) {
    header('Location: index.php');
    notifications("Please log in first");
    exit;
}

$Album_ID = $_GET['id'];
$AlbumResults = ReturnAlbum($conn, $Album_ID);
$SongResult = Songs($conn, $Album_ID);
?>

<html>
<body>


 <?php
//if there is a album with the given id
if (mysqli_num_rows($AlbumResults) == 1) {
    while ($row = mysqli_fetch_assoc($AlbumResults)) {
        echo '
        <div class="container transition"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
        <div class="contentcc "style="padding:2%;">
        <div class="row">
            <div class="col-sm-3">

            <div class="albumcover_page"><img class="img-fluid "src="Images/' . $row['Cover_art'] . '"Style="
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;"></div></div>
                  <div class ="col-sm-9 ">

                      <h1 font-size="font-size:200%!important;">' . $row['Title'] . '</h1>
                      <h5>' . $row['Genre'] . '</h5>

               <div class="ArtistProfile">
              <a style = "color:black; text-decoration:none!important"href ="profile.php?id=' . $row['User_ID'] . '">
              ' . $row['Username'] . '</a></div>
              </div></div>';

        while ($row = mysqli_fetch_assoc($SongResult)) {
            echo '
              <div class="col-sm-12" style="padding-left:0!important;padding-right:0!important;">
              <div class="Song" >
                  ' . $row['title'] . '
                  <audio src="Audio/' . $row['File'] . '" controls>

              </audio></div></div>';
        }

    }
} else {
    notifications("Album could not be found");
}
?>

</div>
</br>

</div>

</div>


</div>






<?php

?>

<style>
    .albumcover_page{box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;}
    .Song{margin-top:2%!important;padding:1%!important;width:100%; border-radius: 15px!important;Background-color:#f3f3f4;
        color:black!important; transition:.2s;}
        .Song:hover{
            background-color:#f3f3f4!important;
        }
        .ArtistProfile a:hover{
            transition:.2s;
        }

        .ArtistProfile a:hover{
            color:#bed8bf!important;
        }

    </style>

</body>
</html>