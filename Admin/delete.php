<?php
include "../connection.php";
include "invalid_nav.php";
$id = $_GET['id'];
mysqli_query($link, "delete from quiz_category where id=$id");
?>

<script type="text/javascript">
    window.location.href = "add_subject.php";
</script>