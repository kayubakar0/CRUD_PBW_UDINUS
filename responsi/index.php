<?php
session_start();
$inputEmail = 'admin@admin';
$inputPassword = 'admin';
if (isset($_POST['submit'])) {
    if ($_POST['inputEmail'] ==$inputEmail AND $_POST['inputPassword'] ==$inputPassword){
        //Membuat Session
        $_SESSION["inputEmail"] =$inputEmail; 
        echo "Anda Berhasil Login $inputEmail";
        header("Location:isi.php");
    } else {
        // Tampilkan Pesan Error
        display_login_form();
        echo '<p>Username Atau Password Tidak Benar</p>';
    }
}    
else { 
    display_login_form();
}
function display_login_form(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body{
            background-image: url("fix2.jpg");
            background-size:cover;
        }
    </style>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
                <div class="form-label-group">
                  <label for="inputEmail">Email address</label>
                  <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email address" required autofocus>
                </div>
                <br>
                <div class="form-label-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Password" required>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-primary" type="submit" name="submit" value="login">Sign in</button>
              </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>