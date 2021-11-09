<?php
session_start();
include 'header.php';
// Fetch all information for the albums and create a row for each
$results_per_page = 8;
$sql = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username,users.User_ID FROM album,genre,users
WHERE album.Genre = genre.Genre_ID
And album.Artist_ID = users.User_ID
AND Active = 1";

$result = mysqli_query($conn, $sql);

$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (empty($_GET['page'])) {$_GET['page'] = 1;
    $page = 1;} else { $page = $_GET['page'];}

$this_page_first_results = ($page - 1) * $results_per_page;
$sql = "SELECT Album_ID,Title,Description,Cover_art,Name AS Genre, Active, Date, Username,users.User_ID
FROM album,genre,users
WHERE album.Genre = genre.Genre_ID
And album.Artist_ID = users.User_ID
AND Active = 1
LIMIT $this_page_first_results,$results_per_page";
$result = mysqli_query($conn, $sql)
?>

<html>
<body>

<div class="container"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
<?php
//problem weird padding out of
echo ' <div class="row" style="padding:1%; ">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '
    <div class="col-sm-12 col-md-3"  >
           <h4 style="font-weight: 600;">' . $row['Title'] . '</h4>
           <div class="albumcover">

                  <img class="img-fluid "src="Images/' . $row['Cover_art'] . '" ;
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">

            </div>
              <a style = "color:black; text-decoration:none!important"href ="profile.php?id=' . $row['User_ID'] . '">
            <h7 style="font-weight: 600; ">' . $row['Username'] . '</h7></a>
            </br>
                       Genre: ' . $row['Genre'] . '
                       </br>
                       Date: ' . $row['Date'] . '

            </div>

          </br>
';

}

?>
</div>

 <div class="col-sm-12 col-md-1"  >

<?php for ($page = 1; $page <= $number_of_pages; $page++) {

    if ($page == $_GET['page']) {

        echo '<a href="Music.php?page=' . $page . '" style="color:#bed8bf;     text-decoration: underline;"> ' . $page . ' </a>';
    } else {
        echo '<a href="Music.php?page=' . $page . '" style="color:#E8E8E8"> ' . $page . ' </a>';
    }
}
?>
</div>



</body>
</html>

