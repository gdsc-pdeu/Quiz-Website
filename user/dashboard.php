<?php
include "header.php";
include "invalid_login.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizer - By Vipul</title>
</head>

<body>
    <div class="bg-info p-2 text-center text-white">Remaining Time
        <div id="countdown">
            <!-- Countdown time will be shown here -->
        </div>
    </div>
    <div class="card">
        <div class="flex flex-col-reverse card-header">
            <div>
                <!-- div containing current question number and total question like 3/20 -->
                <span class="text-danger" id="curr_q">
                    0
                </span>
                <span>/</span>
                <span id="total_q">0</span>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="flex" id="load_q">
                <!-- Question will be displayed here dynamically -->
            </div>
            <div class="d-flex align-items-center pt-3">
                <input type="button" class="btn btn-warning m-1" value="Previous" onclick="load_prev()">
                <input type="button" class="btn btn-success" value="Next" onclick="load_next()">
            </div>
        </div>
    </div>
    <script>
        load_ques(1);

        //function for updating time left
        setInterval(function() {
            timer();
        }, 1000);

        function timer() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (xmlhttp.responseText == "00:00:01") {
                        window.location = "result.php";
                    }
                    document.getElementById('countdown').innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", '../forajax/load_timer.php', true);
            xmlhttp.send(null);
        }

        var total_q = 0;
        //function for loading total questions count
        function load_total_que() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('total_q').innerHTML = xmlhttp.responseText;
                    total_q = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", '../forajax/load_total_q.php', true);
            xmlhttp.send(null);
        }

        //function for load a perticular number question
        var q_no = 1

        function load_ques(q_no) {
            load_total_que();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == 0) {
                        console.log("over");
                        user_want_to = confirm("All questions are completed - Want to submit?");
                        if (user_want_to == true) {
                            window.location = "result.php";
                        }
                    } else {
                        document.getElementById('curr_q').innerHTML = q_no;
                        document.getElementById('load_q').innerHTML = xmlhttp.responseText;
                    }
                    console.log(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", '../forajax/load_ques.php?q_no=' + q_no, true);
            xmlhttp.send(null);
        }

        //prev question functionality
        function load_prev() {
            if (q_no == "1") {
                alert("This is the first question");
            } else {
                q_no = eval(q_no) - 1;
                load_ques(q_no);
            }
        }

        //next question functionality
        function load_next() {
            q_no = parseInt(q_no) + 1;
            console.log(q_no)
            load_ques(q_no);
        }

        //saving selected answer
        function radio_click(val, q_no) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //TODO: do something when user select option
                }
            };
            xmlhttp.open("GET", '../forajax/save_answer_in_session.php?q_no=' + q_no + "&value1=" + val, true);
            xmlhttp.send(null);
        }
    </script>
</body>

</html>