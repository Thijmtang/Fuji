
<?php
session_start();
include 'header.php';

?>
<?php
//if given value is a number and exist
if (is_numeric($_GET['id']) && isset($_GET['id'])) {
    { $sql = "SELECT *
FROM album
WHERE ALbum_ID =  $_GET[id]
";
    }
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $currDescription = $row['Description'];
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

        $newSummary = htmlspecialchars($conn, $_POST['Summary']);
        $UpdateAlbum = "UPDATE album SET Summary='$newSummary', Profile_Image= '$currprofilepic' WHERE  User_ID = '$_SESSION[ID]'";
        $Updateresults = mysqli_query($conn, $Updateprofile);

        if ($Updateresults) {
            notifications('<i class="fas fa-save"></i> Changes have been saved');
            $_SESSION['Profilepic'] = $currprofilepic;

        } else {
            echo mysqli_error($conn);
        }
        mysqli_close($conn);

    }
    ?>




<html>
<body>
<form  action="" method="post" autocomplete="off"enctype="multipart/form-data">
<div class="container"style="border-radius: 34px!important; background-color:white;">
      <div class="contentcc "style="padding:2%;">
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
<div class="Upload"><a class="nav-link " href="Upload.php?id=<?=$_GET['id']?>">Upload songs</a></div>
<div class="content"></br>
<?php

    $Songs = AlbumSongs($conn, $_GET['id']);
    while ($row = mysqli_fetch_assoc($Songs)) {
        echo '   <div class="col-sm-12">
       <div class="Song"><h3 style="font-size:20px;">' . $row['Title'] . '</h3>  </div>
       <a class="Delete"href="deleteSong.php?id=' . $row['Song_ID'] . '">Delete </a>
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
<textarea name="Summary"class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $currDescription ?></textarea>
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
    .Song{padding:1%!important;
        border-radius: 15px!important;Background-color:#f3f3f4;
        color:black!important; transition:.2s}
        .Song:hover{
            background-color:#f3f3f4!important;
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
    background-color: #bed8bf;
    border-radius: 10px!important;
    background-color: #bed8bf;

    color:white!important;
    border:1px solid white;
    width: 100px;
float:right
  }
  .Delete:hover{

    color:#bed8bf!important;
    border:1px solid #bed8bf;
    background-color: transparent!important;
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
