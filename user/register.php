<?php
include "../connection.php";
if(isset($_SESSION['username'])){
  ?>
  <script type="text/javascript">
      window.location = "index.php";
      </script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Register Now</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php"> QUIZER </a>
    <div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">HOME</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container w-25">
    <div class="m-4">
      <h3>Register Now</h3>
      <form action="" method="POST" name='form1' class="">
      <div class="alert alert-success" id="success" style="margin-top:10px; display:none">
          <strong>Success!</strong> Account succefully Created <a href="login.php"> Click Here To Log In</a>
        </div>
        <div class="alert alert-danger" id="failure" style="margin-top:10px; display:none">
          <strong>Failed!</strong> Username Already Exists!!
        </div>
        <div class="form-group ">
          <label>FirstName *</label>
          <input type="text" name="firstname" class="form-control" required />
        </div>
        <div class="form-group ">
          <label>LastName</label>
          <input type="text" name="lastname" class="form-control" />
        </div>
        <div class="form-group ">
          <label>Username *</label>
          <input type="text" name="username" class="form-control" required />
        </div>
        <div class="form-group ">
          <label>Password *</label>
          <input type="password" name="password" class="form-control" required />
        </div>
        <div class="form-group ">
          <label>Email *</label>
          <input type="email" name="email" class="form-control" required />
        </div>
        <div class="form-group ">
          <label>Contact</label>
          <input type="text" name="contact" class="form-control" />
        </div>
        <div class="text-center">
          <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button>
        </div>
        <div class="register-link text-center">
          <p>
            Already have account ?
            <a href="login.php"> Log In Here</a>
          </p>
        </div>
        
      </form>
    </div>
  </div>

  <?php
  if (isset($_POST['submit1'])) {
    $count = 0;
    $res = mysqli_query($link, "select * from registration where username='$_POST[username]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
  ?>
      <script type="text/javascript">
        document.getElementById("failure").style.display = "block";
        setTimeout(() => {
          document.getElementById("failure").style.display = "none";
        }, 2000);
      </script>
    <?php
    } else {
      mysqli_query($link, "insert into registration values(NULL, '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]')") or die(mysqli_error($link));
    ?>
      <script type="text/javascript">
        document.getElementById("success").style.display = "block";
        setTimeout(() => {
          document.getElementById("success").style.display = "none";
        }, 8000);
      </script>
  <?php
    }
  }
  ?>
</body>

</html>