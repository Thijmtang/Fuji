<?php
ob_start();
include "header.php";

$givenSong = $_GET['id'];
$givenAlbum = $_GET['albumID'];

$songResult = AlbumSongs($conn, $givenAlbum, $givenSong);
$songCount = mysqli_num_rows($songResult);
if ($songCount) {

    while ($row = mysqli_fetch_assoc($songResult)) {
        $UpdateStatus = "UPDATE songs SET Active=0 WHERE SONG_ID =$givenSong AND ALBUM =$givenAlbum";
    }
    $Updateresults = mysqli_query($conn, $UpdateStatus);
    if ($Updateresults) {

        header("Location: editAlbum.php?id=$givenAlbum");
        ob_end_flush();
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
} else {

    header("Location: index.php");
    ob_end_flush();

}
