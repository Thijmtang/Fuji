<?php
ob_start();
include "header.php";

$givenSong = $_GET['id'];

$Song = "SELECT *
FROM  songs
WHERE Song_ID = $givenSong";
$songResult = mysqli_query($conn, $Song);

while ($row = mysqli_fetch_assoc($songResult)) {
    $UpdateStatus = "UPDATE songs SET Active=0";
}
$Updateresults = mysqli_query($conn, $UpdateStatus);

if ($Updateresults) {

    header("Location: editAlbum.php");
    ob_end_flush();
} else {
    echo mysqli_error($conn);
}
mysqli_close($conn);
