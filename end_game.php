<?php
    require 'server.php';
   $sc =  $_SESSION['score'];
   $cr =  $_SESSION['correct'].'/'.count($_SESSION['question']);
   $qz =  $_SESSION['quiz'];
   $name = $_SESSION['name'];



   function getToken($length){
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited
   for ($i=0; $i < $length; $i++) {
       $token .= $codeAlphabet[random_int(0, $max-1)];
   }
   return $token;
}
    if($_SESSION['upscore'] == 0){
    $score_id = 'sc_'.getToken(6);
    $q_sc = " INSERT INTO `score`(`score_id`, `score_point`, `user_name`, `quiz_id`) VALUES ('$score_id','$sc','$name','$qz')";
    $re_sc = mysqli_query($con, $q_sc);

    if($re_sc){
        $_SESSION['upscore']++;
    }
    }
//    INSERT INTO `score`(`score_id`, `score_point`, `user_name`, `quiz_id`) VALUES (,[value-2],[value-3],[value-4])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- booststrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

    <title>End game</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $name ?></a></li>
            </ul>
        </div>
    </nav>

    <p>End Game</p>
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid" id="con-endgame" style="background-color:red;">
                <p style="color:#03FF80">Score</p>
                <p><?php echo $sc ?></p>
                <p style="color:#EBFF01">Rank</p>
                <p>#1</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="container-fluid" id="con-endgame" style="background-color:blue;">
                <p>#Top 10</p>
            </div>
        </div>
    </div>

</body>
</html>
