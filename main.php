<?php
    require 'server.php';
    $name = $_SESSION['name'];
    $check_img = 0 ;
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

   //insert
    if(isset($_POST['q_name'])){
 
   $ext = pathinfo(basename($_FILES["q_img"]["name"]), PATHINFO_EXTENSION);
   $new_taget_name = 'Quiz_image_' . uniqid() . "." . $ext;
   $target_path = "Quiz_image/";
   $upload_path = $target_path . $new_taget_name;
   $uploadOk = 1;
   
   $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));
   
   if ($_FILES["q_img"]["size"] > 8000000) {
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
       if (move_uploaded_file($_FILES["q_img"]["tmp_name"], $upload_path)) {
           echo 'Move success.';
           $_SESSION['error'] = 0 ;
       }else {
            echo 'Move fail';
            $_SESSION['error'] = 1;
          
       }
   }
   if($_SESSION['error']==0){
    $q_img = $_FILES["q_img"]["name"];
    $img = $new_taget_name;
    $q_name = $_POST['q_name'];
    $detail = $_POST['q_detail'];

    $q_id = 'qz_'.getToken(6);
    $q_qz = "INSERT INTO `quiz`(`quiz_id`, `quiz_name`, `quiz_img`, `count_play`, `quiz_rate`, `quiz_detail`, `quiz_creator`) VALUES ('$q_id','$q_name','$img','0','0','$detail','$name')";
    $re_qz = mysqli_query($con, $q_qz);

    if($re_qz){
        $_SESSION['error']=2;
    }
    else{
        $_SESSION['error']=1;
    }


    }
  
   header('Location:main.php');
}
//end of insert
//update
if(isset($_POST['up_q_name'])){
    if($_FILES["up_q_img"]["name"]!=NULL){
        $ext = pathinfo(basename($_FILES["up_q_img"]["name"]), PATHINFO_EXTENSION);
        $new_taget_name = 'Quiz_image_' . uniqid() . "." . $ext;
        $target_path = "Quiz_image/";
        $upload_path = $target_path . $new_taget_name;
        $uploadOk = 1;
        
        $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));
        
        if ($_FILES["up_q_img"]["size"] > 8000000) {
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
            if (move_uploaded_file($_FILES["up_q_img"]["tmp_name"], $upload_path)) {
                echo 'Move success.';
                $_SESSION['error'] = 0 ;
            }else {
                echo 'Move fail';
                $_SESSION['error'] = 1;
            
            }
        }   
    }
    else{
        $_SESSION['error'] = 0 ;
        $check_img = 1; 
    }
    if($check_img){
        if($_SESSION['error']==0){
            // $img = $new_taget_name;
            $q_name = $_POST['up_q_name'];
            $detail = $_POST['up_q_detail'];
            $q_id = $_POST['quiz_id'];
            $q_qz = "UPDATE `quiz` SET `quiz_name`='$q_name',`quiz_detail`='$detail' WHERE `quiz_id` = '$q_id' ";
            $re_qz = mysqli_query($con, $q_qz);
        
            if($re_qz){
                $_SESSION['error']=2;
            }
            else{
                $_SESSION['error']=1;
            }
        
        
            }
    }
    else{
        if($_SESSION['error']==0){
            $img = $new_taget_name;
            $q_name = $_POST['up_q_name'];
            $detail = $_POST['up_q_detail'];
            $q_id = $_POST['quiz_id'];
            $q_qz = "UPDATE `quiz` SET `quiz_name`='$q_name',`quiz_img`='$img',`quiz_detail`='$detail' WHERE `quiz_id` = '$q_id' ";
            $re_qz = mysqli_query($con, $q_qz);
        
            if($re_qz){
                $_SESSION['error']=2;
            }
            else{
                $_SESSION['error']=1;
            }
        
        
            }
    }
    
   
    header('Location:main.php');
 }
//delete
if(isset($_POST['del_quiz_id'])){
    $del_quiz_id = $_POST['del_quiz_id']; 
    $q_quiz_del = "DELETE FROM `quiz` WHERE `quiz_id` = '$del_quiz_id'";
    $re_quiz_del = mysqli_query($con, $q_quiz_del);
    // $row_quiz_del = mysqli_fetch_assoc($re_quiz_del);
    $q_ques_del = "DELETE FROM `question` WHERE `quiz_id` = '$del_quiz_id'";
    $re_ques_del = mysqli_query($con, $q_ques_del);
    $q_score_del = "DELETE FROM `score` WHERE `quiz_id` = '$del_quiz_id'";
    $re_score_del = mysqli_query($con, $q_score_del);
    // $row_ques_del = mysqli_fetch_assoc($re_ques_del);
    $q_ques = "SELECT `question_id` FROM `question` WHERE `quiz_id` = '$del_quiz_id'";
    $re_ques = mysqli_query($con, $q_ques);
    while($row_ques = mysqli_fetch_assoc($re_ques)){
        $ques_del = $row_ques['question_id'];
        $q_ans_del = "DELETE FROM `answers` WHERE `question_id` = '$ques_del'";
        $re_ans_del = mysqli_query($con, $q_ans_del);
        // $row_ans_del = mysqli_fetch_assoc($re_ans_del);
    }
    

    $_SESSION['error']=2;
    header('Location:main.php');
}



$q_quiz = "SELECT * FROM `quiz` WHERE `quiz_creator` = '$name'";   
$re_quiz = mysqli_query($con, $q_quiz);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyQuiz</title>

    <!-- boostsratp&MyCSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- W3CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse" style = "background-color:#19261e">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
                <a class="navbar-brand" href="main.php">MyQuiz</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $name ?></a></li>
            </ul>
        </div>
    </nav>
    <div style = "text-align: center;color:whitesmoke;font-size:100px;font-family: 'Kanit', sans-serif;margin-top:-20px;">
            MyQuiz
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <!-- card all -->
            <?php while($row_quiz = mysqli_fetch_assoc($re_quiz)) { 
                $quiz_id = $row_quiz['quiz_id'];
                 $q_TOP = "SELECT * FROM `score` WHERE `quiz_id` = '$quiz_id' ORDER BY score_point DESC LIMIT 1";
                 $re_TOP = mysqli_query($con, $q_TOP);
                 $row_TOP = mysqli_fetch_assoc($re_TOP);
                 $score =  $row_TOP['score_point'];
                
            ?>
            <div class="w3-card-4" id="card">
                <div class="container-fluid" >
                    <div class="w3-row">
                        <a href="javascript:void(0)" onclick="openCity(event, 'quiz_<?php echo $row_quiz['quiz_id'] ?>','main_<?php echo $row_quiz['quiz_id'] ?>','tab_<?php echo $row_quiz['quiz_id'] ?>');">
                        <div class="w3-third tab_<?php echo $row_quiz['quiz_id'] ?> w3-bottombar w3-hover-light-grey w3-padding ">Quiz</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'view_<?php echo $row_quiz['quiz_id'] ?>','main_<?php echo $row_quiz['quiz_id'] ?>','tab_<?php echo $row_quiz['quiz_id'] ?>');">
                        <div class="w3-third tab_<?php echo $row_quiz['quiz_id'] ?> w3-bottombar w3-hover-light-grey w3-padding">Views</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'option_<?php echo $row_quiz['quiz_id'] ?>','main_<?php echo $row_quiz['quiz_id'] ?>','tab_<?php echo $row_quiz['quiz_id'] ?>');">
                        <div class="w3-third tab_<?php echo $row_quiz['quiz_id'] ?> w3-bottombar w3-hover-light-grey w3-padding">Option</div>
                        </a>
                    </div>
                </div>

                <!-- script card -->
                <a href="question.php?id=<?php echo $row_quiz['quiz_id'] ?>" style="text-decoration: none;"><div id="quiz_<?php echo $row_quiz['quiz_id'] ?>" class="w3-container main_<?php echo $row_quiz['quiz_id'] ?> w3-animate-opacity" style="display:block">
                    <h2><?php echo $row_quiz['quiz_name'] ?></h2>
                    <img src="Quiz_image\<?php echo $row_quiz['quiz_img'] ?>" class="w3-round" alt="" style="height:100px;max-width:100%" srcset="">
                    <p><?php echo $row_quiz['quiz_detail'] ?></p>
                </div></a>

                <div id="view_<?php echo $row_quiz['quiz_id'] ?>" class="w3-container main_<?php echo $row_quiz['quiz_id'] ?> w3-animate-opacity" style="display:none">
                    <h2>Plays</h2>
                    <p><?php echo $row_quiz['count_play'] ?></p>
                    <h2>Rate</h2>
                    <p><?php echo $row_quiz['quiz_rate'] ?></p>
                    <h2>Top Score</h2>
                    <p><?php
                    if($score!=NULL){
                      echo $score ;  
                    }
                    else{
                        echo "-----";
                    }
                     
                     

                     ?></p>
                </div>
                <!-- Navbar Option -->
                <div id="option_<?php echo $row_quiz['quiz_id'] ?>" class="w3-container main_<?php echo $row_quiz['quiz_id'] ?> w3-animate-opacity" style="display:none;margin-top:20px;">
                    <strong><p style = "text-align: center;font-size:35px;">ID</p>
                     <p style = "text-align: center;font-size:30px;" ><?php echo $row_quiz['quiz_id'] ?></p></strong>
                    <button class="w3-button w3-block w3-round-large w3-large w3-yellow" data-toggle="modal" data-target="#main_edit_<?php echo $row_quiz['quiz_id'] ?>">Edit</button>
                    <button class="w3-button w3-block w3-round-large w3-large w3-red" style="margin-top:10px;" data-toggle="modal" data-target="#main_del_<?php echo $row_quiz['quiz_id'] ?>">Delete</button>
                </div>

                <!-- mddal update quiz -->
                <div id="main_edit_<?php echo $row_quiz['quiz_id'] ?>" class="modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:500px;margin-top:100px;">
                        <header class="w3-container w3-teal"> 
                            <h2>Edit Quiz</h2>
                        </header>
                        <div class="w3-container" id="stm">
                            <form action="main.php" method="post" enctype="multipart/form-data">

                            <p>Quiz Name : </p>
                            <input class="w3-input w3-border w3-round" type="text" name = "up_q_name" value = "<?php echo $row_quiz['quiz_name'] ?>">
                            <p>Title Miage : </p>
                            <input class="w3-input w3-border w3-round" type="file" name = "up_q_img">
                            <p>Detail Quiz : </p>
                            <textarea name="up_q_detail" id="" cols="35" rows="5"><?php echo $row_quiz['quiz_detail'] ?></textarea>
                            <input class="w3-check" type="checkbox">
                            <label> : Quiz status can play.</label>
                        </div>
                        <footer class="w3-container w3-teal">
                            <!-- <button class="w3-button w3-block w3-teal" style="width:100%">Button</button> -->
                            <div class="w3-panel" style="width:100%">
                                <button class="w3-button w3-block w3-teal" type = "submit">UPDATE</button>
                            </div>
                            <input type="hidden" name="quiz_id" value="<?php echo $row_quiz['quiz_id'] ?>" >
                        </footer>
                            </form>
                        
                    </div>
                </div>

                <!-- modal delete -->
                <div class="modal fade" id="main_del_<?php echo $row_quiz['quiz_id'] ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Question</h4>
                            </div>
                            <div class="modal-body">
                                <form action="main.php" method="post">
                                <button class="w3-button w3-ripple w3-green w3-xlarge">Yes</button><p></p>
                                <input type="hidden" name="del_quiz_id" value="<?php echo $row_quiz['quiz_id'] ?>" >
                                </form>
                                <button class="w3-button w3-ripple w3-red w3-xlarge">No</button>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
                <!-- Script in navbar -->
                <script>
                    openCity(event, 'quiz_<?php echo $row_quiz['quiz_id'] ?>','main_<?php echo $row_quiz['quiz_id'] ?>','tab_<?php echo $row_quiz['quiz_id'] ?>');
                </script>
            </div>
            <?php } ?>
            <!-- card end -->

           
            
            <!-- button new quiz -->
            <button  class="w3-button w3-xlarge w3-circle" onclick="document.getElementById('id01').style.display='block'" id="ghost-btn-cir">+</button>
            <!-- mddal new quiz -->
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:500px;">
                    <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2>New Quiz</h2>
                    </header>
                    <div class="w3-container" id="stm">
                        <form action="main.php" method="post" enctype="multipart/form-data">

                        <p>Quiz Name : </p>
                        <input class="w3-input w3-border w3-round" type="text" name = "q_name">
                        <p>Title Miage : </p>
                        <input class="w3-input w3-border w3-round" type="file" name = "q_img">
                        <p>Detail Quiz : </p>
                        <textarea name="q_detail" id="" cols="35" rows="5"></textarea>
                        <input class="w3-check" type="checkbox">
                        <label> : Quiz status can play.</label>
                        <footer class="w3-container w3-teal">
                            <!-- <button class="w3-button w3-block w3-teal" style="width:100%">Button</button> -->
                            <div class="w3-panel" style="width:100%">
                                <button class="w3-button w3-block w3-teal" type = "submit">Create</button>
                            </div>
                        </footer>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <script>
        function openCity(evt, cityName,city,tablink) {
            var i, x, tablinks;
            x = document.getElementsByClassName(city);
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName(tablink);
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
        }
        var check = <?php echo $alert ?>;
        if(check==2){
          swal("Good job!", "You clicked the button!", "success");  
        }
        else if(check==1){
            swal("Nope!!!", "You clicked the button!", "error");  
        }
    </script>

</body>
</html>