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
        <h5 class="text-center text-uppercase">Select Subject for Add and Edit Questions</h5>
            <table class="table table-bordered m-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Time</th>
                    <th scope="col">Select</th>
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
                    echo "<td>"; ?> <a href="add_questions.php?id=<?php echo $row["id"]; ?>">Click Here</a> <?php echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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