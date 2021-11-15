
<?php
session_start();
ob_start();
include 'header.php';

?>

<?php
if (empty($_SESSION['ID'])) {
    if (isset($_POST['btnSubmit'])) {
        $naam = mysqli_real_escape_string($conn, $_POST['Email']);
        $passw = mysqli_real_escape_string($conn, $_POST['Password']);
        if (empty($naam) || empty($passw)) {
            notifications('<i class="fas fa-times" style="font-size:140%; "></i> Please fill in all forms');
        }
/// If the user exist in the database check if the input password matches with the encoded password in database
        else {
            $sql = "select * from users where Email='$naam'";
            $dupnaam = mysqli_query($conn, $sql);

            if (mysqli_num_rows($dupnaam) > 0) {
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_array($result)) {
                        if (password_verify($passw, $row['Password'])) {
                            $_SESSION['Name'] = $row['Username'];
                            $_SESSION['ID'] = $row['User_ID'];
                            $_SESSION['Profilepic'] = $row['Profile_Image'];
                            notifications('<i class="fas fa-circle-notch" style="font-size:140%; "></i>  You have been logged in');

                            header("Location: index.php");
                            ob_end_flush();

                        } else {

                            notifications('<i class="fas fa-lock" style="font-size:140%; "></i> Incorrect password');

                        }
                    }
                }
            }
            if (mysqli_num_rows($dupnaam) <= 0) {
                notifications('<i class="fas fa-times" style="font-size:140%; "></i> No user with that email found');

            }
        }
    }

} else {
    header("Location: index.php");
    ob_end_flush();

}

?>

<html>
    <div class= "container a" >
<form  action="" method="post">
    <body >
    <div class="mb-3" >
     <h3>Login</h3>
    </div>
  <div class="mb-3">

    <input type="email" class="form-control" name="Email" aria-describedby="emailHelp"placeholder="Email address">
  </div>
  <div class="mb-3">

    <input type="password" class="form-control" name="Password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary"name="btnSubmit"><i class="fas fa-fingerprint" style="font-size:150%!important"></i> Log in </button>
</form>
</div>
</body>
</html>


<style>
  </style>