
<?php
ob_start();
session_start();
include 'header.php';

?>
<?php
//if album id exist and the current is the uploader
if (is_numeric($_GET['id']) && isset($_GET['id']) && uploaderAlbumCheck($conn, $_GET['id'], $_SESSION['ID'])) {
    {
        $sql = "SELECT *
FROM album
WHERE ALbum_ID =  $_GET[id]
";
    }
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $currTitle = $row['Title'];
        $currCover_art = $row['Cover_art'];
    }
//submits the data into the database
    if (isset($_POST['btnSubmit'])) {
        $date = date('m_d_Y-H-i_s');
        $Foto = $date . $_FILES['upload']['name'];
        $FotoL = 'Images/' . $date . $_FILES['upload']['name'];
        if (!empty($_FILES['upload']['name']) && $currCover_art != $_FILES['upload']['name']) {

            move_uploaded_file($_FILES['upload']['tmp_name'], $FotoL) or die("Can't move file to $FotoL");
            $currCover_art = $Foto;
        }

        $newTitle = mysqli_real_escape_string($conn, $_POST['Title']);
        $UpdateAlbum = "UPDATE album SET Title='$newTitle', Cover_art= '$currCover_art' WHERE  Album_ID = '$_GET[id]'";
        $Updateresults = mysqli_query($conn, $UpdateAlbum);

        if ($Updateresults) {

            header("Location: Dashboard.php");
            ob_end_flush();

        } else {
            echo mysqli_error($conn);
        }
        mysqli_close($conn);

    }
    ?>




<html>
<body>
<form  action="" method="post" autocomplete="off"enctype="multipart/form-data">
<div class="container transition"style="border-radius: 34px!important; background-color:white;">
      <div class="contentcc "style="padding:2%;">
      <div class="mb-3" >
      <a class ="return"href="Dashboard.php"style="color:black!important">
<i class="fas fa-undo"> </i></a></div>
      <h3 > Edit Album</h3>
  <div class="row" style="">
  <div class="col-sm-6 align-items-center" style="text-align: center;   ">

<div class="albumcover">
<img class ="img-fluid" id="blah" src="Images/<?php
echo $currCover_art ?>" alt="your image"/>

</div>
</br>
</div>
<div class="col-sm-6 align-items-center" style="text-align: center; ">
<div class="Upload">

<a class="nav-link " href="Upload.php?id=<?=$_GET['id']?>">Upload songs</a></div>
<div class="content"></br>
<?php

    $Songs = AlbumSongs($conn, $_GET['id'], "*");

    while ($row = mysqli_fetch_assoc($Songs)) {
        echo '
        <div class="row song    ">

        <div class="col-sm-6">
        <h3 style="font-size:20px;float:left">' . $row['Title'] . '</h3>
        </div>

        <div class="col-sm-6">
       <a class="Delete " href="deleteSong.php?id=' . $row['Song_ID'] . '&albumID=' . $row['Album'] . '">Delete song</a>
        </div>

       </div>
       </br>';
    }
    ?>


</div>
</div>
</div>

</br>
<div class="row" style="">
<div class="col-sm-12 align-items-center" style="text-align: center; ">
<input type="file" onchange="readURL(this)" class="form-control-file" id="exampleFormControlFile1" style=""name="upload" accept="image/png, image/jpeg, image/gif">
</div>

</div>



<hr/>
<textarea name="Title"class="form-control" id="exampleFormControlTextarea1" rows="1"><?php echo $currTitle ?></textarea>
<hr/>
<button type="submit" class="btn btn-primary" name="btnSubmit"><i class="fas fa-save"></i></button>
</form>
</body>
</html>
<?php } else {

    notifications('<i class="fas fa-times" style="font-size:140%; "></i>Album does not exist');
}

?>

<style>
    .albumcover_page{box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;}
  .song{          padding: 2%;
           Background-color:#f3f3f4;
    border-radius: 39px!important;
  }


  .Upload .nav-link{    transition:.3s;
    background-color: #bed8bf;
    border-radius: 39px!important;
    background-color: #bed8bf;
    border-radius: 39px!important;
    color:white!important;
    border:1px solid white;
    width: 150px;
    text-align:center;
  }
 .Upload .nav-link:hover{
    border-radius: 39px!important;
    color:#bed8bf!important;
    border:1px solid #bed8bf;
    background-color: white!important;
  }


 .Delete{    transition:.3s;
    background-color: red;
    border-radius: 10px!important;

padding: 2%;
    color:white!important;
    border:1px solid white;
    width: 100px;
float:right;
  }
  .Delete:hover{

    color:#bed8bf!important;
    border:1px solid #bed8bf;
    background-color: transparent!important;
  }
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
