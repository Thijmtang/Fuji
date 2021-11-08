<?php
session_start();
include 'header.php';

?>
<?php
//submits the data into the database
if (isset($_POST['btnSubmit'])) {

    //Upload image into map and save name into database
    $date = date('m_d_Y-H-i_s');
    $FotoL = 'images/' . $date . $_FILES['upload']['name'];
    $Foto = $date . $_FILES['upload']['name'];

    $Albumtitle = mysqli_real_escape_string($conn, $_POST['Albumtitle']);
    $Description = mysqli_real_escape_string($conn, $_POST['AlbumDescription']);
    $Genre = mysqli_real_escape_string($conn, $_POST['Genre']);
    $Artist_ID = $_SESSION['ID'];

// only insert into database if not empty
    if (empty($Albumtitle) || empty($Genre)) {
        echo "<h3 align=center>Vul alle velden in!</h3> ";
        notifications('<i class="fas fa-check" style="font-size:140%; "></i> Album has been created');
    } else {
        //data for insertion
        move_uploaded_file($_FILES['upload']['tmp_name'], $FotoL) or die("Can't move file to $FotoL");
        //image upload data
        $sql = "INSERT INTO album (Title, Description, Genre, Cover_art, Artist_ID)
        VALUES ('$Albumtitle', '$Description', '$Genre',  '$Foto' ,'$Artist_ID')";
        if (mysqli_query($conn, $sql)) {
            notifications('<i class="fas fa-check" style="font-size:140%; "></i> Album has been created');

        } else {
            echo mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
<html>
  <body>
<div class="container"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
<div class="contentcc "style="padding:2%;">
<form  action="" method="post" autocomplete="off"enctype="multipart/form-data">

    <div class="mb-3" >
     <h3>Create Album</h3>
    </div>
  <div class="mb-3">

    <input type="text" class="form-control" name="Albumtitle" aria-describedby="Album title"placeholder="Album title">
  </div>
  <div class="mb-3">

    <input type="text" class="form-control" name="AlbumDescription" aria-describedby="Album description"placeholder="Description">
  </div>

  <div class="mb-3">
  <label for="exampleFormControlSelect1">Genre</label>
    <select class="form-control" id="exampleFormControlSelect1" name="Genre">
<?php
// Add all genres to the combo box
$sql = "SELECT * FROM genre";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option ";
    echo 'value ="';
    echo $row['Genre_ID'];
    echo '">';
    echo $row['Name'];
    echo "</option>";
}
?>

    </select>
  </div>

  <div class="mb-3">


  <div class="row">
<div class="col-sm-6 col-md-3"  >
<div class="albumcover" style="width=50%!important">
  <img class ="img-fluid" id="blah" src="Images/defaultalbumcoverpng.png" alt="your image" />
  </div>
  </br>
  <input type="file" onchange="readURL(this)" class="form-control-file" id="exampleFormControlFile1" style=""name="upload" accept="image/png, image/jpeg,image/gif">
  </div>
  </div>
  </div>
  </br>
  <button type="submit" class="btn btn-primary"name="btnSubmit"><i class="fas fa-folder-plus" style="font-size:150%!important"></i> Create </button>
</form>
</div>
</body>
</html>

<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
