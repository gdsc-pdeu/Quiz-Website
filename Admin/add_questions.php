<?php
include "../connection.php";
include "header.php";
include "invalid_nav.php";

$subject = '';
$res = mysqli_query($link, "select * from quiz_category where id = $_GET[id]");
while ($row = mysqli_fetch_array($res)) {
    $subject = $row["subject"];
}
$added_q_count = 0;
$res = mysqli_query($link, "select * from questions where subject = '$subject'") or die(mysqli_error($link));
$added_q_count = mysqli_num_rows($res);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title> Admin </title>
</head>

<body>
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong>Add New Questions</strong>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body card-block">
                            <div class="alert alert-success" id="success" style="margin-top: 10px; display:none">
                                <strong>Success!</strong> Question added.
                            </div>
                            <div class="form-group">
                                <label for="q_title" class="form-control-label">Question</label>
                                <input type="text" id="q_title" name="q_title" placeholder="Enter Question here" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="op_1" class="form-control-label">Option 1</label>
                                <input type="text" id="op_1" name="op_1" placeholder="Enter Option 1 here" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="op_2" class="form-control-label">Option 2</label>
                                <input type="text" id="op_2" name="op_2" placeholder="Enter Option 2 here" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="op_3" class="form-control-label">Option 3</label>
                                <input type="text" id="op_3" name="op_3" placeholder="Enter Option 3 here" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="op_4" class="form-control-label">Option 4</label>
                                <input type="text" id="op_4" name="op_4" placeholder="Enter Option 4 here" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="answer" class="form-control-label">Correct Answer</label>
                                <input type="text" id="answer" name="answer" placeholder="Enter Correct Option here" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Instructions</strong>
                    </div>
                    <div class="card-body card-block">
                        <p>1. Enter the question in the first field.</p>
                        <p>2. Enter the options in the next 4 fields.</p>
                        <p style="color:red" >3. Enter the correct answer in the last field. If answer is fourth option then type <b>4</b></p>
                        <p>4. Click on Add button to add the question.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong>Quiz Info. for <span style="color : blue"> <?php echo $subject ?> </span></strong>
                    </div>
                    <div class="card-body card-block">
                        <li>Total Number of Questions : <?php echo "TODO" ?></li>
                        <li>Number of Questions Added : <?php echo $added_q_count ?></li>
                        <li>Number of Questions Remaining : <?php echo "TODO" ?></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Question Table -->
    <div class="col-lg-12 ">

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Sr No</td>
                        <td>Question</td>
                        <td>Option 1</td>
                        <td>Option 2</td>
                        <td>Option 3</td>
                        <td>Option 4</td>
                    </tr>

                    <?php
                    $res = mysqli_query($link, "select * from questions where subject = '$subject' order by q_no asc");
                    $count = 0;
                    while ($row = mysqli_fetch_array($res)) {
                        $count = $count + 1;
                        echo "<tr>";
                        echo "<td>";
                        echo $count;
                        echo "</td>";
                        echo "<td>";
                        echo $row["q_title"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["op_1"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["op_2"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["op_3"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["op_4"];
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
        </div>

    </div>

    </div>
    </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit1'])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "select * from questions where subject = '$subject' order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set q_no = $loop where id = $row[id]") or die(mysqli_error($link));
        }
    }
    $loop = $loop + 1;
    mysqli_query($link, "insert into questions values(NULL, '$loop','$_POST[q_title]','$_POST[op_1]','$_POST[op_2]','$_POST[op_3]','$_POST[op_4]','$_POST[answer]', '$subject')") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        document.getElementById("success").style.display = "block";
        window.location.href = window.location.href;
        setTimeout(function() {
            document.getElementById("success").style.display = "none";
        }, 2000);
    </script>
<?php
}
?>