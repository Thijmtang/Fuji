
<?php
session_start();
include 'header.php';

?>
<?php

$sql = "SELECT *
FROM album
WHERE ALbum_ID =  $_GET[id]
";

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

    $newSummary = mysqli_real_escape_string($conn, $_POST['Summary']);
    $Updateprofile = "UPDATE users SET Summary='$newSummary', Profile_Image= '$currprofilepic' WHERE  User_ID = '$_SESSION[ID]'";
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
      <h1 style="font-weight:600"><i class="fas fa-user-edit"></i> Edit profile</h1>
  <div class="row" style="">
  <div class="col-sm-6 align-items-center" style="text-align: center;   ">

<div class="albumcover">
<img class ="img-fluid" id="blah" src="Images/<?php
echo $currCover_art ?>" alt="your image"/>
</div>
</br>
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
