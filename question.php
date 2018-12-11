<?php
$quiz_id = $_GET['id'];
require 'server.php';
$name = $_SESSION['name'];
$alert = 0;
    //error
    if(isset($_SESSION['error'])){
        if($_SESSION['error']==1){ //ไม่สำเร็จ
            $alert =1;
        }else{//สำเร็จ
            $alert = 2;
            
        }
        unset($_SESSION['error']);
    }
    //random
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

   if(isset($_POST['ques_name'])){
 
    $ext = pathinfo(basename($_FILES["ques_img"]["name"]), PATHINFO_EXTENSION);
    $new_taget_name = 'Question_image_' . uniqid() . "." . $ext;
    $target_path = "Question_image/";
    $upload_path = $target_path . $new_taget_name;
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));
    
    if ($_FILES["ques_img"]["size"] > 8000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg"&&$imageFileType != "png") {
        echo "Sorry, only png,jpg files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    }
    
    else {
        if (move_uploaded_file($_FILES["ques_img"]["tmp_name"], $upload_path)) {
            echo 'Move success.';
            $_SESSION['error'] = 0 ;
        }else {
             echo 'Move fail';
             $_SESSION['error'] = 1;
           
        }
    }
    if($_SESSION['error']==0){
     $ques_img = $_FILES["ques_img"]["name"];
     $img = $new_taget_name;
     $q_name = $_POST['ques_name'];
     
     $ques_id = 'qs_'.getToken(6);
     
        $q_qs = "INSERT INTO `question`(`question_id`, `question_name`, `question_img`, `question_time`, `quiz_id`) VALUES ('$ques_id','$q_name','$img','30','$quiz_id')";
        $re_qs = mysqli_query($con, $q_qs);
 
        if($re_qs){
         $_SESSION['error']=2;
        }
        else{
         $_SESSION['error']=1;
        }  



     for($i=1;$i<6;$i++){

         $ans_id = 'as_'.getToken(6);
         $ans = 'ans'.$i;
         $check = 'check'.$i;
         $ans_name = $_POST[$ans];
         if($i<3){
            $checked ='on';
         }else{
            if(isset($_POST[$check])){
                $checked = $_POST[$check] ; 
             }else{
                $checked ='off';
             }
         }
         
         
        if($i==1){
            $q_ans = "INSERT INTO `answers`(`answers_id`, `answers_name`, `answer_correct`, `answers_show`, `question_id`) VALUES ('$ans_id','$ans_name','1','$checked','$ques_id')";
        }else{
            $q_ans = "INSERT INTO `answers`(`answers_id`, `answers_name`, `answer_correct`, `answers_show`, `question_id`) VALUES ('$ans_id','$ans_name','0','$checked','$ques_id')";

        }
         
         $re_ans = mysqli_query($con, $q_ans);
  
         if($re_ans){
          $_SESSION['error']=2;
         }
         else{
          $_SESSION['error']=1;
         }  

     }
    
     
 
 
 
     }
   
    header('Location:question.php?id='.$quiz_id);
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Question</title>

    <!-- boostsratp&MyCSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- W3CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php //echo $name ?></a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Top Card -->
            <div class="w3-card-4" id="card">
                <!-- navbar question -->
                <div class="w3-bar w3-deep-purple w3-animate-opacity">
                    <button class="w3-bar-item w3-button" onclick="openCity('question')">Question</button>
                    <button class="w3-bar-item w3-button" onclick="openCity('answer')">Answer</button>
                    <button class="w3-bar-item w3-button" onclick="openCity('option')">Options</button>
                </div>
                <!-- link on navbar -->
                <div id="question" class="w3-container w3-display-container city" style="display:block;margin-top:0px;font-size: 4vw;">
                    <h4>กิ้นบดคือ?</h4>
                    <img src="image/kinbod.jpg" alt="" style="height:120px;max-width:100%;" srcset="">
                </div>
                <div id="answer" class="w3-container w3-display-container city w3-center" style="display:none;margin-top:50px;">
                    <center><i class="glyphicon glyphicon glyphicon-ok"></i></center>
                    <p>"กิ้นบดก็คือคนที่ไม่รักดี จะต้องถูกทำโทษด้วยการอดมาดูเธียเตอร์นะค้า~~"</p>
                </div>
                <div id="option" class="w3-container w3-display-container city w3-center" style="display:none;margin-top:50px;">
                    <button class="w3-button w3-ripple w3-yellow w3-xlarge" data-toggle="modal" data-target="#edit_1">Edit</button><p></p>
                    <button class="w3-button w3-ripple w3-red w3-xlarge" data-toggle="modal" data-target="#del_1">Delete</button>
                </div>

                <!-- madal edit -->
            <div id="edit_1" class="modal fade" role="dialog">
                <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:500px;">
                    <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2>Edit Question</h2>
                    </header>
                    <form action="question.php?id=<?php echo $quiz_id ?>" method="post" enctype="multipart/form-data" >
                    <div class="w3-container" id="stm">
                        <p>Question Title : </p>
                            <textarea name="quiz-detail" id="" cols="35" rows="3"></textarea>
                        <p>Time for Quiz :</p>
                            <select class="w3-select" name="option">
                                <option value="" disabled selected>Choose time</option>
                                <option value="10">10s</option>
                                <option value="15">15s</option>
                                <option value="20">20s</option>
                            </select>
                        <p>Image Title : </p>
                            <input class="w3-input w3-border w3-round" name = "ques_img" type="file">
                        <p>Choice List :</p>
                        <div class="table-responsive">          
                            <table class="table" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th class="col-md-1" style="text-align:center;border-style:solid;border-width: 7px;">Show</th>
                                        <th style="text-align:center;border-style:solid;border-width: 7px;">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check1" id="" checked disabled></td>
                                        <td>
                                            <div class="form-group has-success has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans1">
                                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check2" id="" checked disabled></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans2">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check3" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans3">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check4" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans4">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check5" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans5">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="w3-container w3-teal">
                        <!-- <button class="w3-button w3-block w3-teal" style="width:100%">Button</button> -->
                        <div class="w3-panel" style="width:100%">
                            <button class="w3-button w3-block w3-teal">Update</button>
                        </div>
                    </footer>
                    </form>
                </div>
            </div>

                <!-- modal delete -->
                <div class="modal fade" id="del_1" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Question</h4>
                            </div>
                            <div class="modal-body">
                                <button class="w3-button w3-ripple w3-green w3-xlarge">Yes</button><p></p>
                                <button class="w3-button w3-ripple w3-red w3-xlarge">No</button>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom Card -->
            
            <!-- button new quiz -->
            <button  class="w3-button w3-xlarge w3-circle" data-toggle="modal" data-target="#id01" id="ghost-btn-cir">+</button>
            <!-- mddal new quiz -->
            <div id="id01" class="modal fade" role="dialog">
                <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:500px;">
                    <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2>New Question</h2>
                    </header>
                    <form action="question.php?id=<?php echo $quiz_id ?>" method="post" enctype="multipart/form-data" >
                    <div class="w3-container" id="stm">
                        <p>Question Title : </p>
                            <textarea name="quiz-detail" id="" cols="35" rows="3"></textarea>
                        <p>Time for Quiz :</p>
                            <select class="w3-select" name="option">
                                <option value="" disabled selected>Choose time</option>
                                <option value="10">10s</option>
                                <option value="15">15s</option>
                                <option value="20">20s</option>
                            </select>
                        <p>Image Title : </p>
                            <input class="w3-input w3-border w3-round" name = "ques_img" type="file">
                        <p>Choice List :</p>
                        <div class="table-responsive">          
                            <table class="table" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th class="col-md-1" style="text-align:center;border-style:solid;border-width: 7px;">Show</th>
                                        <th style="text-align:center;border-style:solid;border-width: 7px;">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check1" id="" checked disabled></td>
                                        <td>
                                            <div class="form-group has-success has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans1">
                                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check2" id="" checked disabled></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans2">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check3" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans3">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check4" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans4">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" value = "on"  name="check5" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess" name = "ans5">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="w3-container w3-teal">
                        <!-- <button class="w3-button w3-block w3-teal" style="width:100%">Button</button> -->
                        <div class="w3-panel" style="width:100%">
                            <button class="w3-button w3-block w3-teal">Create</button>
                        </div>
                    </footer>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!-- script -->
    <script>
        // call navbar
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(cityName).style.display = "block";  
        }
    </script>
</body>
</html>