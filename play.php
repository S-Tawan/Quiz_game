<?php
//   require 'server.php';
//   if ($_GET != null) {
//     $_SESSION['quiz'] =  $_GET['id'];
//   }
// for($i=0;$i<count($_SESSION['question']);$i++){
//     echo $_SESSION['question'][$i].'<br>';
    
// }
// if(isset($_POST['options'])){

//     $check = $_POST['options'];
//     $count_time = $_POST['time'];
//     echo $count_time;
//     $q_check = "SELECT `answers_id` FROM `answers` WHERE  `answers_id`= '$check' && `answer_correct` = '1'";
//     $re_check = mysqli_query($con, $q_check);
//     if($row_check = mysqli_fetch_assoc($re_check)){
//         $_SESSION['score'] = $_SESSION['score'] +($count_time*100);
//         $_SESSION['correct']++;

//         echo "<br>ถูกต้อง<br>" ;
        
//     }
  

//      $i = ++$_SESSION['counter'] ; 
//    if($i>count($_SESSION['question'])-1){
//        echo "<br>เกิน!!!!!!<br>";
//        header('Location: end_game.php');
//    }
   
//   echo $_SESSION['score'];
// }

// $i = $_SESSION['counter'];
// echo $i;
// $now_q = $_SESSION['question'][$i];
// $q_ans = "SELECT * FROM `answers` WHERE `question_id` = '$now_q' ORDER BY RAND() ";
// $re_ans = mysqli_query($con, $q_ans);
// $q_ques = "SELECT `question_name`,`question_time`,`question_img` FROM `question` WHERE `question_id` ='$now_q' ";
// $re_ques = mysqli_query($con, $q_ques);
// $row_ques = mysqli_fetch_assoc($re_ques);
// $time = $row_ques['question_time'];


// เพิ่มข้อมูล

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
   
  <script>
  function progress(timeleft, timetotal, $element) {
    var progressBarWidth = timeleft * $element.width() / timetotal;
    $element.find('div').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft) );
    if(timeleft > 0) {
        setTimeout(function() {
            progress(timeleft - 1, timetotal, $element);
        }, 1000);
        document.Myform.time.value = timeleft;
        
    }
};


  </script>
    

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
                        <img src="image/<?php echo $row_ques['question_img'] ?>" alt="" style="width:auto;margin-top:10px;height:380px;text-align: center;"  >
                    </div>

                
                </div>
            </div>
                <div class="col-lg-6" name="text_quiz">
                    <div class="container-fluid" style="background-color:green;width:auto;height:400px; font-family: 'Kanit', sans-serif;text-align: center;color:whitesmoke;font-size:50px; ">
                    <div class="container-fluid">
                    <?php echo $row_ques['question_name'] ?>
                    </div>
                      
                    </div>
                </div>
            </div>
            <!-- question answer -->
            <form action="play.php" method="POST" name = 'Myform'>
                <div class="btn-group btn-group-justified" data-toggle="buttons" style="background-color:white;height:200px;margin-top:10px;" required >
                <?php
                while($row_ans = mysqli_fetch_assoc($re_ans)){
                ?>
                    <label class="btn btn-secondary" style ="background-color:black;">
                        <input type="radio" name="options"  autocomplete="off" value = "<?php echo $row_ans['answers_id'] ?>"  required > <?php echo $row_ans['answers_name']  ?>
                    </label>
                   
                <?php } ?>
                </div>
                <div style="margin-top:20px;">
                    <button class="btn btn-success btn-block" style="padding:20px;" type="submit">Submit&Pass</button>
                    <br>
                    <input type="hidden" name="time" value="Content of the extra variable" >
                </div>
            </form>
        </div><input type="text" name="" id="">
        <div class="col-lg-1" ></div>
    </div>
  

</body>
</html>
 <script >
     var time = <?php echo $time ?>;
        progress(time,time, $('#progressBar'));
    </script>