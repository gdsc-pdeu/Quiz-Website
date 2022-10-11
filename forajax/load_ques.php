<?php
session_start();
include "../connection.php";
$q_no = "";
$q = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$count = 0;
$answer = "";
$ans = "";

$q_no = $_GET["q_no"];

if (isset($_SESSION["answer"][$q_no])) {
    $ans = $_SESSION["answer"][$q_no];
}

$res = mysqli_query($link, "select * from questions where subject = '$_SESSION[exam_category]' && q_no = '$q_no'");
$count = mysqli_num_rows($res);
if ($count == 0) {
    echo 0;
} else {
    while ($row = mysqli_fetch_array($res)) {
        $q_no = $row["q_no"];
        $q = $row["q_title"];
        $opt1 = $row["op_1"];
        $opt2 = $row["op_2"];
        $opt3 = $row["op_3"];
        $opt4 = $row["op_4"];
        $answer = $row["answer"];
    }
?>
    <table>
        <tr>
            <td colspan="2" class="font-weight-bold">
                <?php echo "(" . $q_no . ") " . $q . ""; ?>
            </td>
        </tr>
    </table>

    <table class="" style="margin-left: 20px;">
        <tr>
            <div class="bg-info">
                <td >
                    <input type="radio" name="r1" id="r1" value="<?php echo $opt1 ?>" onclick="radio_click(this.value, <?php echo $q_no ?>)"
                    <?php
                if ($ans == $opt1) {
                    echo "Checked";
                }
                ?>/>
            </td>
            <td classs = 'm-t-4'>
                <?php
                echo "<span>" . $opt1 . "</span>";
                ?>
            </td>
        </div>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt2 ?>" onclick="radio_click(this.value, <?php echo $q_no ?>)"
                <?php
                if ($ans == $opt2) {
                    echo "Checked";
                }
                ?>/>
            </td>
            <td>
                <?php
                echo $opt2
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt3 ?>" onclick="radio_click(this.value, <?php echo $q_no ?>)"
                <?php
                if ($ans == $opt3) {
                    echo "Checked";
                }
                ?>/>
            </td>
            <td>
                <?php
                echo $opt3
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt4 ?>" onclick="radio_click(this.value, <?php echo $q_no ?>)"
                <?php
                if ($ans == $opt4) {
                    echo "Checked";
                }
                ?>/>
            </td>
            <td>
                <?php
                echo $opt4
                ?>
            </td>
        </tr>
    </table>
<?php
}
?>

