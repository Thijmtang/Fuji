<?php
session_start();
include 'header.php';

?>
<?php
//submits the data into the database
if (isset($_POST['btnSubmit'])) {

    //Upload image into map and save name into database

    $d = $_FILES["upload"]["type"];

    $date = date('m_d_Y-H-i_s');
    $AudioL = 'Audio/' . $date . $_FILES['upload']['name'];
    $Audio = $date . $_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'], $AudioL);

    $Songtitle = mysqli_real_escape_string($conn, $_POST['title']);
    $Artist = $_SESSION['ID'];
// only insert into database if not empty
    if (empty($Songtitle)) {
        echo "<h3 align=center>Vul alle velden in!</h3> ";
    } else {
        //data for insertion

        //image upload data

        $sql = "INSERT INTO songs (Title, Artist, File)
        VALUES ('$Songtitle', '$Artist', '$Audio')";
        if (mysqli_query($conn, $sql)) {
            echo '<div class="container">
            <div class="row" style="">
              <div class="col-sm align-items-center" style="text-align: center;   ">
              <div class="title" style="background-color:#bba9ff;border-radius: .5em; color:white; padding-top:1%;padding-bottom:1%;margin-bottom:5%;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
             <h4> <i class="fas fa-check" style="font-size:140%; "></i> Song has been uploaded</h4>
          </div>
          </div>
          </div>';

        } else {
            echo mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
<html>
<body >

    <div class= "container" >
<form  action="" method="post" autocomplete="off"enctype="multipart/form-data">

    <div class="mb-3" >
     <h3>Upload a song</h3>
    </div>
  <div class="mb-3">

    <input type="text" class="form-control" name="title" aria-describedby="Song title"placeholder="Song title">
  </div>

  <div class="mb-3">
  <input type="file" class="form-control-file" id="exampleFormControlFile1" style=""name="upload">
  </div>
  <button type="submit" class="btn btn-primary"name="btnSubmit"><i class="fas fa-file-upload" style="font-size:150%!important"></i> Upload </button>
</form>
</div>
</body>
</html>
<style>

audio {

    width: 100%;
    height: 20px;

}
    </style>
