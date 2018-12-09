<?php
//   require 'server.php';
// // for($i=0;$i<count($_SESSION['question']);$i++){
// //     echo $_SESSION['question'][$i].'<br>';
    
// // }
// $_SESSION['i']++;
// $i = $_SESSION['i'];
// $now_q = $_SESSION['question'][$i];
// $q_ans = "SELECT * FROM `answers` WHERE `question_id` = '$now_q' ORDER BY RAND() ";
// $re_ans = mysqli_query($con, $q_ans);
// $q_ques = "SELECT `question_name` FROM `question` WHERE `question_id` ='$now_q' ";
// $re_ques = mysqli_query($con, $q_ques);
// $row_ques = mysqli_fetch_assoc($re_ques);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        #progressBar {
            width: 90%;
            margin: 10px auto;
            height: 22px;
            background-color: #0A5F44;
        }
        
        #progressBar div {
            height: 100%;
            text-align: right;
            padding: 0 10px;
            line-height: 22px; /* same as #progressBar height if we want text middle aligned */
            width: 0;
            background-color: #CBEA00;
            box-sizing: border-box;
        }
        .ice{
            background-color:red;
        }
        
    </style>
    

    <title>QuizSiJa</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <a class="navbar-brand" href="#">WebSiteName</a>
    </nav>
    <div class="row">
        <div class="col-lg-1" ></div>
        <div class="col-lg-10">
            <!-- progress bar -->
            <div id="progressBar">
                <div class="bar"></div>
            </div>
            <!-- <form action="play.php" method="GET">
                <div class="btn-group btn-group-justified" name="q_a">
                    <a href="#" class="btn btn-primary" value="apple">Apple</a>
                    <a href="#" class="btn btn-primary">Samsung</a>
                    <a href="#" class="btn btn-primary">Sony</a>
                </div>
            </form> -->

            <!-- question -->
            <div class="row">
                <div class="col-lg-6" name="pic_quiz">
                    <div class="container-fluid" style="background-color:red;width:auto;height:400px;">
                    <div class="container-fluid" style="text-align: center" >
                        <img src="image/enterprise-blockchain.png" alt="" style="width:auto;margin-top:10px;height:380px;text-align: center;"  >
                    </div>

                
                </div>
            </div>
                <div class="col-lg-6" name="text_quiz"><div class="container-fluid" style="background-color:green;width:auto;height:400px;"><?php echo $row_ques['question_name'] ?></div></div>
            </div>
            <!-- question answer -->
            <form action="insert_ans.php" method="POST">
                <div class="btn-group btn-group-justified" data-toggle="buttons" style="background-color:white;height:200px;margin-top:10px;">
                <?php
                while($row_ans = mysqli_fetch_assoc($re_ans)){
                ?>
                    <label class="btn btn-secondary" >
                        <input type="radio" name="options"  autocomplete="off" value = "<?php echo $row_ans['answers_id'] ?>"> <?php echo $row_ans['answers_name'] ?>
                    </label>
                   
                <?php } ?>
                </div>
                <div style="margin-top:20px;">
                    <button class="btn btn-success btn-block" style="padding:20px;" type="submit">Submit&Pass</button>
                </div>
            </form>
        </div><input type="text" name="" id="">
        <div class="col-lg-1" ></div>
    </div>
    <script src="script.js"></script>
</body>
</html>