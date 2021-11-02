
<?php
include 'header.php';
ob_start();
session_start();
?>


<?php
if (empty($_SESSION['ID'])) {

    if (isset($_POST['btnSubmit'])) {
        $Username = mysqli_real_escape_string($conn, $_POST['Username']);
        $mail = mysqli_real_escape_string($conn, $_POST['Email']);
        $passw = mysqli_real_escape_string($conn, $_POST['Password']);
        $hashedPIDB = password_hash($passw, PASSWORD_DEFAULT);
        /// only insert data into database if fields arent empty and if the input username and email arent already used.
        if (empty($mail) || empty($passw)) {

            notifications("Please fill in all forms");

        } else {

            $dupmail = mysqli_query($conn, "select * from users where Email='$mail'");
            if (mysqli_num_rows($dupmail) > 0) {
                notifications('<i class="fas fa-times" style="font-size:140%; "></i> Email is already in use ');
            } else {
                $sql = "INSERT INTO users (Username, Email, Password)
          VALUES ('$Username',    '$mail',   '$hashedPIDB')";
                if (mysqli_query($conn, $sql)) {

                    notifications('<i class="fas fa-check" style="font-size:140%; "></i> Account has been sucesfully created');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
        }
    }
} else {
    header("Location: index.php");
    ob_end_flush();

}

?>


<html>
    <div class= "container">
<form  action="" method="post">
    <body>
    <div class="mb-3" >
     <h3>Signup</h3>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="Username" placeholder="Username">
    </div>
  <div class="mb-3">

    <input type="email" class="form-control" name="Email" aria-describedby="emailHelp"placeholder="Email address">
  </div>
  <div class="mb-3">

    <input type="password" class="form-control" name="Password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary"name="btnSubmit"><i class="fas fa-user-plus
  " style="font-size:150%!important"></i> Sign up </button>
</form>
</div>
</body>
</html>