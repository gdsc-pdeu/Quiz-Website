<?php
include "header.php";
include "invalid_login.php";

if (!isset($_SESSION["username"])) {
?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="text-center m-4">
        Welcome <?php echo $_SESSION["username"]; ?>
    </h1>
</body>

</html>