
<?php
session_start();
include 'header.php';
$results_per_page = 4;
$sql = "SELECT Username, User_ID,  Profile_Image
FROM album, users
WHERE users.User_ID = album.Artist_ID
AND  active IS NOT NULL
group by Artist_ID";
$result = mysqli_query($conn, $sql);

$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (empty($_GET['page'])) {$_GET['page'] = 1;
    $page = 1;} else { $page = $_GET['page'];}

$this_page_first_results = ($page - 1) * $results_per_page;

$sql = "SELECT Username, User_ID,  Profile_Image
FROM album, users
WHERE users.User_ID = album.Artist_ID
AND  active IS NOT NULL
group by Artist_ID ORDER BY Username
LIMIT $this_page_first_results,$results_per_page";
$result = mysqli_query($conn, $sql)
;

?>

<html>
<body>

<div class="container"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
<?php
echo ' <div class="row" style="padding:1%; ">';
while ($row = mysqli_fetch_assoc($result)) {

    echo '
    <a href ="profile.php?id=' . $row['User_ID'] . '">
           <div class="col-sm-12 col-md-3"  >
           <div class = "Artistpage">
           <div class="circle" >
           <img class="img-fluid "src="Images/' . $row['Profile_Image'] . '" style=" transition: .4s!important;">
           </a>
       </div>
       </div>
            ' . $row['Username'] . '
            </br>

            </div>

          </br>
';

}

?>
  </div>
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
?>
</div>


</body>
</html>