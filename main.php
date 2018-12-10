<?php
    require 'server.php';
    $name = $_SESSION['name'];
    //error
    if(isset($_SESSION['error'])){
        if($_SESSION['error']==1){ //ไม่สำเร็จ
            echo "ไม่สำเร็จ";
        }else{//สำเร็จ
            echo "สำเร็จ";
            ?>
                <script>
                    swal("Good job!", "You clicked the button!", "success");
                </script>
            <?php
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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $name ?></a></li>
            </ul>
        </div>
    </nav>

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
                    <div class="w3-row ">
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

                <div id="option_<?php echo $row_quiz['quiz_id'] ?>" class="w3-container main_<?php echo $row_quiz['quiz_id'] ?> w3-animate-opacity" style="display:none;margin-top:50px;">
                    
                   <a><button class="w3-button w3-block w3-round-large w3-large w3-yellow">Edit</button><p></p>
                    <button class="w3-button w3-block w3-round-large w3-large w3-red">Delete</button>
                </div>
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
                    </div>
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
        swal("Good job!", "You clicked the button!", "success");


    </script>

</body>
</html>