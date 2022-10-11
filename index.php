<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Quizer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"> QUIZER </a>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-header text-center">
                        <strong>Student</strong>
                    </div>
                    <div class="card-body card-block">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Can See All Subject</li>
                            <li class="list-group-item">Can Give Exam For Any Subject</li>
                            <li class="list-group-item">Can See His/Her Exam Results</li>
                        </ul>
                        <div class="card-body">
                            <a href="./user/login.php" class="card-link">LOGIN</a>
                            <a href="./user/register.php" class="card-link">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Admin</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Can Add New Subject</li>
                        <li class="list-group-item">Can Add Questions</li>
                        <li class="list-group-item">See Results of Students</li>
                    </ul>
                    <div class="card-body">
                        <a href="./Admin/login.php" class="card-link">LOGIN</a>
                        <!-- <a href="#" class="card-link" >Register</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>