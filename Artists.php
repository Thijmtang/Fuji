
<?php
session_start();
include 'header.php';

if (empty($_GET['page'])) {$_GET['page'] = 1;
    $page = 1;} else { $page = $_GET['page'];
}
if (is_numeric($_GET['page'])) {

    $results_per_page = 8;
    $number_of_pages = calcPages($conn, $results_per_page, "Artists");
    $result = showArtists($conn, $results_per_page, $page);
    ?>

<html>
<body>
<div class="container transition"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
<?php
echo ' <div class="row" style="padding:1%; ">';
    while ($row = mysqli_fetch_assoc($result)) {

        echo '         <div class="col-sm-12 col-md-3"style="    padding-bottom: 2%;" >
    <a href ="profile.php?id=' . $row['User_ID'] . '">

           <div class ="content" style="    background-color: #f3f4f5;
padding: 5%;
border-radius: 5%;">
           <div class = "Artistpage">
           <div class="circle" >
           <img class="img-fluid "src="Images/' . $row['Profile_Image'] . '" style=" transition: .4s!important;">
           </a>
       </div>
       </div>
       <h3 style="font-size: 100%;"><b>' . $row['Username'] . '</b></h3>


            </br>

            </div>
            </div>
          </br>

';

    }

    ?>    </div>

 <div class="row" style="padding:1%; ">
<?php
echo ' <div class="col ">';
    for ($page = 1; $page <= $number_of_pages; $page++) {

        if ($page == $_GET['page']) {
            echo '<a href="Artists.php?page=' . $page . '" style=" border-radius: 16%;color:White; padding:10px;background-color:#bed8bf;margin-right:1%!important"> ' . $page . ' </a>';
        } else {
            echo '<a href="Artists.php?page=' . $page . '" style=" border-radius: 16%;color:#bed8bf;padding:10px;background-color:#f3f3f4;margin-right:1%!important"> ' . $page . ' </a>';
        }
    }
    echo '</div>';

} else {notifications("Page not found");}

?>
</div>
</div>

</body>
</html>


<style>
    .content{
        transition: .3s;
    }
.content:hover{
    transform: scale(1.05)!important;
    background-color: #bed8bf!important;
    color: white!important;
}


</style>