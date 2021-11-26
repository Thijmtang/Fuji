<?php
ob_start();
include "header.php";

$givenAlbum = $_GET['id'];

$Album = "SELECT Active
FROM  album
WHERE Album_ID = $givenAlbum";
$albumresult = mysqli_query($conn, $Album);
$today = date("Y-m-d");
while ($row = mysqli_fetch_assoc($albumresult)) {
    if ($row['Active'] == null) {
        $UpdateStatus = "UPDATE Album SET Active=1, Date=now() WHERE  Album_ID = '$givenAlbum'";
    }

    if ($row['Active'] == 1) {
        $UpdateStatus = "UPDATE Album SET Active=NULL WHERE  Album_ID = '$givenAlbum'";
    }
}
$Updateresults = mysqli_query($conn, $UpdateStatus);

if ($Updateresults) {

    header("Location: Dashboard.php");
    ob_end_flush();
} else {
    echo mysqli_error($conn);
}
mysqli_close($conn);
