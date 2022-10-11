<?php
session_start();
include "../connection.php";
$total_q = 0;
$subject = $_SESSION['exam_category'];
$res = mysqli_query($link, "select * from questions where subject = '$subject'");
$total_q = mysqli_num_rows($res);
echo $total_q;
?>