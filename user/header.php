<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"> <?php echo $_SESSION['username']  ?></a>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="user_home.php">Select Exam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="past_results.php">Past Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-danger" href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>