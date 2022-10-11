<?php
include "../connection.php";
include "header.php";
include "invalid_login.php";

$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>

<body>



    <div class="d-flex justify-content-center m-t-4" style="border: 20px solid transparent">
        <div class="w-50" id="result">
            <?php
            $correct = 0;
            $wrong = 0;
            if (isset($_SESSION['answer'])) {
                for ($i = 1; $i < sizeof($_SESSION['answer']); $i++) {
                    $answer = "";
                    $res = mysqli_query($link, "select * from questions where subject = '$_SESSION[exam_category]' && q_no = '$i'");
                    while ($row = mysqli_fetch_array($res)) {
                        $answer = $row["answer"];
                    }

                    if (isset($_SESSION['answer'][$i])) {
                        $ans = $_SESSION['answer'][$i];
                        if ($ans == $answer) {
                            $correct++;
                        } else {
                            $wrong++;
                        }
                    } else {
                        $wrong++;
                    }
                }

                $res = mysqli_query($link, "select * from questions where subject = '$_SESSION[exam_category]'");
                $count = mysqli_num_rows($res);
                $wrong = $count - $correct;
            ?>
                <div class="card text-center">
                    <div class="card-header">
                        <?php $per = ($correct / $count) * 100;
                        if ($correct / $count > 0.5) {
                            echo "<h4> <span class = 'text-success text-center'> Pass!! </span> You scored :  $per" . "% </h4>";
                        } else {
                            echo "<h4><span class = 'text-danger text-center' > Failed!! </span> You scored :  $per" . "% </h4>";
                        }  ?>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Your Score For <span class="text-primary font-bold"> <?php echo $_SESSION['exam_category'] ?> </span> </h5>
                        <p class="card-text"><?php echo "Correct Answers: " . $correct; ?></p>
                        <p class="card-text"><?php echo "Wrong Answers: " . $wrong; ?></p>
                        <p class="card-text"><?php echo "Total Questions: " . $wrong; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_SESSION['exam_start'])) {
    mysqli_query($link, "insert into exam_result values('','$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");
}

if (isset($_SESSION['exam_start'])) {
    unset($_SESSION['exam_start']);
?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
<?php
}
    ?>