
<?php
ob_start();
session_start();

include 'header.php';
if ($_SESSION["LOGGED_IN"] == false) {
    header('Location: index.php');
    exit;
}

if (is_numeric($_GET['id']) && isset($_GET['id'])) {
    $UserID = $_GET['id'];

    $Receiver = $_GET['id'];
    $Follower = $_SESSION['ID'];
    $FollowResult = followingcheck($conn, $Follower, $Receiver);
    //check if you have followed user before.
    $row_cnt = mysqli_num_rows($FollowResult);
    $Followers_cnt = followerscount($conn, $Receiver);
    $albumresult = Albums($conn, $UserID);
    $userresult = Profile($conn, $UserID);

    if (mysqli_num_rows($userresult) == 1) {

        while ($row = mysqli_fetch_assoc($userresult)) {
            $userprofilepic = $row['Profile_Image'];
            $userSummary = $row['Summary'];
            $username = $row['Username'];

            echo '<div class="container transition"style="border-radius: 34px!important;
            background-color:white;">
        <div class="contentcc "style="padding:2%;">
        <div class="row" style="">
        <h1 style="font-weight:100">' . $username . ' </h1>
           </div>
    <div class="row">
    <div class="col-sm-6 align-items-center" style="text-align: center;">
    <div class="col">
  <div class="circle"><img class="img-fluid "src="Images/' . $userprofilepic . '" style=" transition: all .4s ease-in-out!important;"></div>


  <div class="row" style="float:left">
<div class="col" style="padding:0">
<b>' . $Followers_cnt . '</b> followers
</div>
</div>
</br>
  <div class="row" style">

  <a href="FollowRequest.php?id=' . $UserID . '">';
//Only insert new entry if user hasnt followed receiver. else change active to 1 or null
            while ($row = mysqli_fetch_assoc($FollowResult)) {
                if ($row['Active'] == 1) {
                    echo '
      <button type="submit" class="btn btn-primary"name="btnSubmit"
      style ="    border: 1px solid #b4d9b5;
      color: #b4d9b5!important;
      background-color: white!important;width:100%!important;margin-bottom:5%;float:left"><i class="fas fa-check"></i> Following </button>
      ';
                } else {
                    echo '
        <button type="submit" class="btn btn-primary"name="btnSubmit"
        style ="width:100%!important;margin-bottom:5%;float:left"> Follow </button>';
                }
            }
            //first time follow and not on your own profile
            if ($row_cnt == null && $_SESSION["ID"] != $_GET["id"]) {
                echo '
            <button type="submit" class="btn btn-primary"name="btnSubmit"
            style ="width:100%!important;margin-bottom:5%;float:left"> Follow </button>

                ';

            }
//Summary
            echo '</a></div></div> </br>
  <div class="summary" style = "float:left!important">' . htmlspecialchars($userSummary, ENT_QUOTES) . '</div></div>
      <div class="col-sm-6 align-items-center" style="text-align: center;   ">

          <div class="content"style="box-shadow: rgba(0, 0, 0, 0.1)
          0px 4px 12px;border-radius: 1em;margin-top:2%;margin-bottom:2%;">

          <div id="carouselExampleControls" class="carousel slide"
          data-ride="carousel">
    <div class="carousel-inner">

 ';
            //Album carousal for current Artist page
            $count = 0;
            while ($row = mysqli_fetch_assoc($albumresult)) {
                $count++;
                if ($count == 1) {

                    echo '
         <div class="carousel-item active">
         <a href ="Album.php?id=' . $row['Album_ID'] . '">
  <img class="d-block w-100 hoveranim"src="Images/' . $row['Cover_art'] . '"
  alt="First slide">
  </a></div>';
                } else {
                    echo '           <a href ="Album.php?id=' . $row['Album_ID'] . '"><div class="carousel-item ">
              <img class="d-block w-100 hoveranim"src="Images/' . $row['Cover_art'] . '" alt="Second slide">
              </a></div>';
                }

            }

            if ($count != 1) {
                echo '
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
            </div>
    </div>

    </div>';

            }

        }

    } else {

        notifications("User not found");
    }
} else {

    notifications("User not found");
}
?>

</body>
</html>


<?php

?>

<style>

#module {
  font-size: 14px;
  line-height: 1.5;

}

#module a.collapsed:after  {
  font-family: "Font Awesome 5 Free";
  content: "\f107";
  font-weight: 900;
    float:left!important;
    color: black;
    font-size: 20PX;
 transition: all .3s!important;
}

#module a:not(.collapsed):after {
  font-family: "Font Awesome 5 Free";
  color: black;
    float:left!important;
    content: "\f107";
  font-weight: 900;
  transition: all .5s!important;
  transform: rotate(180deg);
  font-size: 30PX;
}
</style>