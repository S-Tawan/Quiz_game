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
            <div class="w3-card-4" id="card">
                <div class="container-fluid" >aa</div>
            </div>
            
            <!-- button new quiz -->
            <button  class="w3-button w3-xlarge w3-circle" onclick="document.getElementById('id01').style.display='block'" id="ghost-btn-cir">+</button>
            <!-- mddal new quiz -->
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:500px;">
                    <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2>New Question</h2>
                    </header>
                    <form action="question.php?id=<?php echo $quiz_id ?>" method="post" enctype="multipart/form-data" >
                    <div class="w3-container" id="stm">
                        <p>Question Title : </p>
                            <textarea name="ques_name" id="" cols="35" rows="3"></textarea>
                        <p>Image Title : </p>
                            <input class="w3-input w3-border w3-round" name = "ques_img" type="file">
                        <p>Choice List :</p>
                        <div class="table-responsive">          
                            <table class="table">
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
</body>
</html>