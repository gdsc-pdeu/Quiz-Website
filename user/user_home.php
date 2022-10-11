
<?php
include "../connection.php";
include "header.php";
include "invalid_login.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quizer - By Vipul</title>
</head>

<body>
    <div>
        <h5 class='text-center m-2'>These are Available Exam Choose You want to Give one</h5>
    </div>
    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
        <?php
        $res = mysqli_query($link, "select * from quiz_category");
        while ($row = mysqli_fetch_array($res)) {
            echo "<div class='card m-2' style = 'width: 300px'>";
            echo "<div class = 'card-body'>";
        ?>
            <input type="button" class="btn btn-success form-control" value="<?php echo $row["subject"]; ?>" style="margin-top: 10px; background-color: blue; color: white" onclick="set_exam_type_session(this.value);">
        <?php
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

<?php
?>
<script type="text/javascript">
    function set_exam_type_session(exam_category) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET", "../forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
        xmlhttp.send(null);
    }
</script>