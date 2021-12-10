<?php
ob_start();
session_start();

include 'header.php';
//Can only upload if you are logged or when you are the creator of the album
if ($_SESSION["LOGGED_IN"] == false || uploaderAlbumCheck($conn, $_GET['id'], $_SESSION['ID']) == false) {
    header('Location: index.php');
    exit;
}
?>
<?php
//submits the data into the database
if (isset($_POST['btnSubmit'])) {
    $AlbumID = $_GET['id'];
    $Songtitle = mysqli_real_escape_string($conn, $_POST['title']);
    $Artist = $_SESSION['ID'];
// only insert into database if not empty
    if (empty($Songtitle)) {
        echo "<h3 align=center>Vul alle velden in!</h3> ";
    } else {
        $date = date('m_d_Y-H-i_s');
        $AudioL = 'Audio/' . $date . $_FILES['upload']['name'];
        $Audio = $date . $_FILES['upload']['name'];

        if (move_uploaded_file($_FILES['upload']['tmp_name'], $AudioL)) {
            $sql = "INSERT INTO songs (Title, Artist, File, Album, Active)
            VALUES ('$Songtitle', '$Artist', '$Audio','$AlbumID', 1)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                notifications("Song has been uploaded");
                mysqli_close($conn);
            } else {
                notifications(mysqli_error($conn));
            }

        } else {
            notifications("File is too big! Please adjust 'upload_max_filesize' in php.ini ");

        }

    }
}
?>
<html>
<body >

<div class="container transition"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
<div class="contentcc "style="padding:2%;">
<form  action="" method="post" autocomplete="off"enctype="multipart/form-data">

    <div class="mb-3" >
<a class ="return"href="editAlbum.php?id=<?=$_GET['id']?>"style="color:black!important">
<i class="fas fa-undo"> </i></a></div>



<div class="mb-3" >
     <h3>Upload a song</h3>
    </div>

  <div class="mb-3">

    <input type="text" class="form-control" name="title" aria-describedby="Song title"placeholder="Song title">
  </div>

  <div class="mb-3">
  <input type="file" class="form-control-file" id="exampleFormControlFile1" style=""name="upload" accept="audio;">


  </div>
  <button type="submit" class="btn btn-primary"name="btnSubmit"><i class="fas fa-file-upload" style="font-size:150%!important"></i> Upload </button>
</form>
</div>
</div>
</div>
</body>
</html>
<style>

.return {    transition:.3s;

    background-color: #bed8bf;
    border-radius: 39px!important;
    color:white!important;
    border:1px solid white;
    width: 150px;
    text-align:center;
    padding:1%;
  }
 .return:hover{
    border-radius: 39px!important;
    color:#bed8bf!important;
    border:1px solid #bed8bf;
    background-color: white!important;
  }

    </style>
