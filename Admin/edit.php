<?php
include "../connection.php";
include "invalid_nav.php";
$id = $_GET['id'];
$res = mysqli_query($link, "select * from quiz_category where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $subject = $row["subject"];
    $time = $row["time"];
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title> Admin </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="m-4">
            <div class="card">

                <div class="card-body">
                    <div class="card-header">
                        <strong>Edit Quiz Subject</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="subject" class="form-control-label">Quiz Subject</label>
                            <input type="text" id="subject" name="subject" value="<?php echo $subject ?>" placeholder="Enter your Quiz Subject" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="time" class="form-control-label">Quiz time in Minutes</label>
                            <input type="text" id="time" name="time" value="<?php echo $time ?>" placeholder="Enter Quiz time in Minutes" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">
                                Update
                            </button>
                        </div>
                        <div class="alert alert-success" id="success" style="margin-top: 10px; display:none">
                            <strong>Sucess!</strong> Details Updated.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit1'])) {
    mysqli_query($link, "update quiz_category set subject='$_POST[subject]', time='$_POST[time]' where id=$id") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        window.location = 'add_subject.php';
    </script>
<?php
}
?>