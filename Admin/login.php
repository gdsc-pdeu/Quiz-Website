<?php
session_start();
if(isset($_SESSION['admin_session'])){
    ?>
    <script type="text/javascript">
        window.location = "index.php";
        </script>
    <?php
}
include("../connection.php");
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> Admin LogIn</title>
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
    <div class="container w-25 ">
        <div class="m-4">
            <h2 > ADMIN LOGIN </h2>
            <div class="login-form">
                <form action="" method="POST" name="form1">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="username" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>

                    <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">
                        Sign in
                    </button>
                    <div class="alert alert-danger" id="failure" style="margin-top: 10px; display:none">
                        <strong>Invalid</strong> Username Or Password.
                    </div>
                    <!-- <div class="register-link m-t-15 text-center">
                            <p>
                                Don't have account ?
                                <a href="#"> Sign Up Here</a>
                            </p>
                        </div> -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST["submit1"])) {
    $count = 0;
    $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password='$_POST[password]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count == 0) {
?>
        <script type="text/javascript">
            document.getElementById("failure").style.display = "block";
        </script>
    <?php
    } else {
        $_SESSION['admin_session'] = $_POST["username"];
    ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
<?php
    }
}
