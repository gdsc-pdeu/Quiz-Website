<?php
include "../connection.php";
include "header.php";
include "invalid_nav.php";

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title> Admin </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <div class="row">
            <form action="" method="POST" class="col">
                <div class="card w-100">
                    <div class="card-header">
                        <strong>Add Quiz</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="subject" class="form-control-label">Quiz Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Enter your Quiz Subject" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="time" class="form-control-label">Quiz time in Minutes</label>
                            <input type="text" id="time" name="time" placeholder="Enter Quiz time in Minutes" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">
                                Add
                            </button>
                        </div>
                        <div class="alert alert-success" id="success" style="margin-top: 10px; display:none">
                            <strong>Sucess!</strong> Quiz added Successfully.
                        </div>
                    </div>
                </div>
            </form>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Quiz Category</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Edit </th>
                                    <th scope="col">Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($link, "select * from quiz_category");
                                $count = 0;
                                while ($row = mysqli_fetch_array($res)) {
                                    $count++;
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $count;
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["subject"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["time"];
                                    echo "</td>";
                                    echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a> <?php echo "</td>";
                                                                                                                        echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo "</td>";
                                                                                                                                                                                                            echo "</tr>";
                                                                                                                                                                                                        }
                                                                                                                                                                                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit1'])) {
    mysqli_query($link, "insert into quiz_category values(NULL,'$_POST[subject]','$_POST[time]')") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        document.getElementById("success").style.display = "block";
        window.location.href = window.location.href;
        setTimeout(function() {
            document.getElementById("success").style.display = "none";
        }, 3000);
    </script>
<?php
}
?>