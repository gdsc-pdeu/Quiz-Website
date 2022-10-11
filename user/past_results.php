<?php
include "../connection.php";
include "header.php";
include "invalid_login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Past Results</title>
</head>

<body>
    <div class="d-flex">
        <div class="col-lg p-4">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Your Records</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Marks</th>
                                <th scope="col">Correct </th>
                                <th scope="col">Wrong</th>
                                <th scope="col">Total Questions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = mysqli_query($link, "select * from exam_result where username='$_SESSION[username]' order by exam_category");
                            $count = 0;
                            while ($row = mysqli_fetch_array($res)) {
                                $count++;
                                echo "<tr>";
                                echo "<td>";
                                echo $count;
                                echo "</td>";
                                echo "<td>";
                                echo $row["exam_category"];
                                echo "</td>";
                                echo "<td>";
                                echo floor(($row['correct']/$row["total"])*100 * 100) / 100;
                                echo " %";
                                echo "</td>";
                                echo "<td>";
                                echo $row["correct"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["wrong"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["total"];
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>