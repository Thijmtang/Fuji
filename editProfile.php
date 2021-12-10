
<?php
session_start();
ob_start();
include 'header.php';
if ($_SESSION["LOGGED_IN"] == false) {
    header('Location: index.php');
    exit;
}
?>
<?php

$sql = "SELECT *
FROM users
WHERE User_ID =  $_SESSION[ID]
";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $currsummary = $row['Summary'];
    $currprofilepic = $row['Profile_Image'];
}
//submits the data into the database
if (isset($_POST['btnSubmit'])) {
    $date = date('m_d_Y-H-i_s');
    $Foto = $date . $_FILES['upload']['name'];
    $FotoL = 'Images/' . $date . $_FILES['upload']['name'];
    if (!empty($_FILES['upload']['name']) && $currprofilepic != $_FILES['upload']['name']) {

        move_uploaded_file($_FILES['upload']['tmp_name'], $FotoL) or die("Can't move file to $FotoL");
        $currprofilepic = $Foto;
    }

    $newSummary = mysqli_real_escape_string($conn, $_POST['Summary']);
    $Updateresults = updateResults($conn, $currprofilepic, $newSummary);

    if ($Updateresults) {
        $_SESSION['Profilepic'] = $currprofilepic;
        header("Location: Profile.php?id=$_SESSION[ID]");
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
<div class="container"style="border-radius: 34px!important; background-color:white;">
      <div class="contentcc "style="padding:2%;">
      <h1 style="font-weight:600"><i class="fas fa-user-edit"></i> Edit profile</h1>
  <div class="row" style="">
  <div class="col-sm-6 align-items-center" style="text-align: center;   ">

<div class="circle">
<img class ="img-fluid" id="blah" src="Images/<?php
echo $currprofilepic ?>" alt="your image"/>
</div>
</br>
<input type="file" onchange="readURL(this)" class="form-control-file" id="exampleFormControlFile1" style=""name="upload" accept="image/png, image/jpeg, image/gif">
</div>
</div>
<hr/>
<textarea name="Summary"class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $currsummary ?></textarea>
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
