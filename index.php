<?php
    require 'server.php';
    $text = 'start';
    if ($_GET != null) {
        $text = $_GET['s_text'];
    }
    if($text!='start'){
        $q = "SELECT * FROM `quiz` WHERE `quiz_id` ='$text'";
        $result = mysqli_query($con, $q);
        if ($row = mysqli_fetch_assoc($result)) {
            $text = $row['quiz_id'];
            $q_name = $row['quiz_name'];
            $q_img =  $row['quiz_img'];
            $q_play = $row['count_play'];
            $q_rate = $row['quiz_rate'];
            $q_detail = $row['quiz_detail'];
            $q_creator = $row['quiz_creator'];
    
        }
        else{
        } else {
            $text = 'bad end';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizSiJa</title>
    <?php
    require 'link_title.php';
    ?>
</head>
<body style="background-color:#252525">
    <!-- navbar sija -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Card -->
    <!-- <div class="wrap">
        <div class="card">
            <div class="container-left">
                <p>G-text 1</p>
                <p>G-text 2</p>
                <p>G-text 3</p>
            </div>
        </div>
    </div> -->

        <!-- background -->
        <img src="image\BackGround quizSija.png" style="width:100%;margin-top:-110px">

        <!-- form search -->
        <div class="row" style="margin-top:50px">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action ="index.php" method="GET">
                    <div class="container-fluid">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter QuizCode" name="s_text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <?php

        echo $text;

        ?>
    

</body>
</html>