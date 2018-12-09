<?php
//   require 'server.php';
// for($i=0;$i<count($_SESSION['question']);$i++){
//     echo $_SESSION['question'][$i].'<br>';
    
// }
// echo $_SESSION['i'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <?php
        require 'link_title.php';
    ?>
    

    <title>QuizSiJa</title>
</head>
<body style="background-color:#252525">
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
                <div class="col-lg-6" name="pic_quiz"><div class="container-fluid" style="background-color:red;width:auto;height:400px;"></div></div>
                <div class="col-lg-6" name="text_quiz"><div class="container-fluid" style="background-color:green;width:auto;height:400px;"></div></div>
            </div>
            <!-- question answer -->
            <form action="#" method="POST">
                <div class="btn-group btn-group-justified" data-toggle="buttons" style="height:200px;margin-top:10px;">
                    <label class="btn btn-success" id="ice">
                        <input type="radio" name="options" id="option1" autocomplete="off"> Active
                    </label>
                    <label class="btn btn-success">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Radio
                    </label>
                    <label class="btn btn-success">
                        <input type="radio" name="options" id="option3" autocomplete="off"> Radio
                    </label>
                </div>
                <div style="margin-top:20px;">
                    <button class="btn btn-success btn-block" style="padding:20px;" type="submit">Submit&Pass</button>
                </div>
            </form>
        </div>
        <div class="col-lg-1" ></div>
    </div>
    <script src="script.js"></script>
    header('Location: ');
</body>
</html>