<?php
ob_start();
session_start();
include "header.php";

$Receiver = $_GET['id'];
$Follower = $_SESSION['ID'];

$Follow = "SELECT *
FROM follows
Where Follower_ID =$Follower AND Receiver_ID = $Receiver";
$FollowResult = mysqli_query($conn, $Follow);
$row_cnt = mysqli_num_rows($FollowResult);
if ($row_cnt > 0) {

    $FollowResult = mysqli_query($conn, $Follow);
    while ($row = mysqli_fetch_assoc($FollowResult)) {
        if ($row['Active'] == null) {
            $UpdateStatus = "UPDATE follows SET Active=1
             Where Follower_ID ='$Follower'AND Receiver_ID = '$Receiver'";
        }

        if ($row['Active'] == 1) {
            $UpdateStatus = "UPDATE follows SET Active=NULL
            Where Follower_ID ='$Follower' AND Receiver_ID = '$Receiver'";
        }
    }
    $Updateresults = mysqli_query($conn, $UpdateStatus);

    if ($Updateresults) {

        header("Location: Profile.php?id=$Receiver");
        ob_end_flush();
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);

} else {

    $sql = "INSERT INTO follows (Follower_ID, Receiver_ID)
    VALUES ('$Follower', '$Receiver')";
    $query = mysqli_query($conn, $sql);

    if ($query) {

        header("Location: Profile.php?id=$Receiver");
        ob_end_flush();
    } else {
        echo mysqli_error($conn);
    }

}
