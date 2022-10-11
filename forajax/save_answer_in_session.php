<?php
session_start();
$q_no = $_GET['q_no'];
$val = $_GET['value1'];
$_SESSION['answer'][$q_no] = $val;
?>