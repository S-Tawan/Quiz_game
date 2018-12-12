<?php
    require 'server.php';
    // require 'fb-init.php';
    

    //facebook login not doit
    //require 'fb-init.php';
    //if(isset($_SESSION['access_token'])){ ?>
        <!-- <a href="">Logout</a> -->
    <?php //}else{ ?>
        <!-- <a href="<?php //echo $login_url;?>">Login FB</a> -->
    <?php //}
    if(!isset($_SESSION['check_login'])){
      $_SESSION['check_login'] = 0 ;  
    }
    // register
    $re_error = 0;
    if(isset($_POST['re_username'])){
        if($_POST['re_psw']==$_POST['re_con_psw']){
            $re_username=$_POST['re_username'];
            $re_psw = $_POST['re_psw'];
            $q_user = "SELECT `user_id` FROM `user` WHERE `user_id`= '$re_username'";
            $re_user = mysqli_query($con, $q_user);
            if($row_user = mysqli_fetch_assoc($re_user)){
                //Username ซ้ำ
                $re_error = 1;
            }
            else{
                // สำเร็จ
                $q_user_ins = "INSERT INTO `user`(`user_id`,`password`) VALUES ('$re_username','$re_psw')";
                $re_user_ins = mysqli_query($con, $q_user_ins);
                if($re_user_ins){
                   $_SESSION['check_login'] = $re_username ; 
                }
                else{
                    //ผิดพลาด
                    $re_error = 3;
                }
                
            }
           
        }
        else{
            // พาสไม่ตรง
            $re_error = 2;
        }
    }
    // login
    if(isset($_POST['log_username'])){
        // echo "eiei";
        $log_username=$_POST['log_username'];
        $log_psw = $_POST['log_psw'];
        $q_user_log = "SELECT `user_id`,`password` FROM `user` WHERE `user_id`= '$log_username' AND `password` = '$log_psw' ";
        $re_user_log  = mysqli_query($con, $q_user_log );
        if($row_user_log = mysqli_fetch_assoc($re_user_log)){
            //สำเร็จ
            $_SESSION['check_login'] = $log_username ; 
            echo "YESSSSSS";
        }
        else{
            // ไม่สำเร็จ
            echo "NOOOOOO";
        }
    }



    if($_SESSION['check_login']==0){
        $_SESSION['name'] = "I am Guest Mother Fucker";
    }
    else{
        $_SESSION['name'] = $_SESSION['check_login'];
    }
    
    $_SESSION['score'] = 0;
    $_SESSION['counter'] = 0;
    $_SESSION['correct'] = 0;
    $_SESSION['upscore'] = 0;
    $check = 'start';
    $_SESSION['question']=NULL;
    if ($_GET != null) {

        if(isset($_GET['s_text'])){
            $check = $_GET['s_text']; 
        }
        if(isset($_GET['id'])){
            $logout = $_GET['id'];
            if($logout == "logout"){
                session_destroy();
                header("Location: index.php");
            }
        }
        
    }
    if($check!='start'){
        $q = "SELECT * FROM `quiz` WHERE `quiz_id` ='$check' AND `quiz_status` = '1'";
        $result = mysqli_query($con, $q);
        if ($row = mysqli_fetch_assoc($result)) {
            $text = $row['quiz_id'];
            $q_id = $row['quiz_id'];
            $q_name = $row['quiz_name'];
            $q_img =  $row['quiz_img'];
            $q_play = $row['count_play'];
            $q_rate = $row['quiz_rate'];
            $q_detail = $row['quiz_detail'];
            $q_creator = $row['quiz_creator'];
            $check = 'true';
            $q_ques = "SELECT `question_id` FROM `question` WHERE `quiz_id` ='$q_id'   ORDER BY RAND() ";
            $re_ques = mysqli_query($con, $q_ques);
            while($row_ques = mysqli_fetch_assoc($re_ques)){
                $_SESSION['question'][] = $row_ques['question_id'];
            }
            if($_SESSION['question']==NULL){
                $check = 'fail';
            }
        }
         else {
            $check = 'fail';
        }
    }


    // ทดสอบ
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
//    echo $re_error ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>QuizSiJa</title>
</head>
<body>
    <!-- navbar sija -->
    <nav class="navbar navbar-inverse"  style = "background-color:#19261e">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HOME  <?php echo $_SESSION['name'] ?> </a>

            </div>
            <?php if($_SESSION['name']!="I am Guest Mother Fucker"){ ?>
                <a class="navbar-brand" href="main.php">MyQuiz</a>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name'] ?></a></li>
                <li><a href="index.php?id=logout">LOGOUT</a></li>
                </ul>
            <?php } else { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" onclick="document.getElementById('sign_in').style.display='block'"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#" onclick="document.getElementById('login').style.display='block'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            <?php } ?>
        </div>
    </nav>
    <!-- Sign in form -->
    <div id="sign_in" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
        <form class="w3-container" action="index.php" method="post" >
            <div class="w3-section">
                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="re_username" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="re_psw" required>
                <label><b>Confirm-Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Confirm-Password" name="re_con_psw" required>
                <!-- <p></p><label><b>Name</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Name" name="re_name" required> -->
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">register</button>
            </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('sign_in').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        </div>

        </div>
    </div>
    <!-- login form -->
    <div id="login" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">

        <form class="w3-container" action="index.php" method="post">
            <div class="w3-section">
                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="log_username" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="log_psw" required>
                <!-- Incomming -->
                <!-- <a href="<?php //echo $loginUrl ?>" class="fb btnnaja"><i class="fa fa-facebook fa-fw"></i> Login with Facebook</a> -->
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
            </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('login').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        </div>

        </div>
    </div>

    <div id = 'box' ></div>
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
        <!-- <img src="image\BackGround quizSija.png" style="width:100%;margin-top:-110px"> -->
        <div style = "text-align: center;">
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg1"><strong>Q</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg2"><strong>u</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg3"><strong>i</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg4"><strong>z</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg5"><strong>S</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg6"><strong>i</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg7"><strong>J</strong></span>
            <span style = "text-align: center;color:whitesmoke;font-size:350px;font-family: 'Kanit', sans-serif" id = "bg8"><strong>a</strong></span>

        </div>

        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="createName" style="font-family:'Courier New', Courier, monospace;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:#6665FF">
            <!-- header -->
            <div class="modal-header"style="border-color:#6665FF">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-8" style="color:whitesmoke" ><h2><strong><?php echo $q_name ?></strong></h2></div>
                        <div class="col-lg-4" style="color:whitesmoke" ><h5>Create by : <?php echo $q_creator ?></h5></div>
                    </div>
            </div>
            <!-- body -->
            <div class="modal-body" style="background-color:#5B6770" >
                <center>
                    <div class="container-fluid" style="border-color:#6A9955;border-style:solid;border-radius:5px">
                        <img src="image\tmp_test_img.png" alt="" sizes="width:100px;height:100px" srcset="">
                    </div>
                </center>
                <p></p> 
                <div class="container-fluid">
                    <div class="row">
                        <span class="fluid">
                        <div class="col-sm-7" style="border-color:#6A9955;border-style:solid;border-radius:5px;font-family: 'Kanit', sans-serif;text-align: center;color:whitesmoke;font-size:18px;"><p></p><p>Detail :<br><?php echo $q_detail ?></p></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4" style="border-color:#6A9955;border-style:solid;border-radius:5px;font-family: 'Kanit', sans-serif;text-align: center;color:whitesmoke;font-size:18px;">
                            <p></p><span>rate : </span>
                            <p></p>
                            <!-- <form method = "POST" action = "play.php?q_id=<?php echo $q_id ?>"> -->
                            <!-- <a href="play.php?id=<?php echo $q_id ?>"> -->
                            <center><button type="button" class="btn btn-primary" onclick="document.getElementById('require_name').style.display='block'">Enter Quiz</button></center>
                            <!-- </a> -->
                            <!-- <form> -->
                            <div id="require_name" class="w3-modal">
                            <?php  
                            if($_SESSION['name']=='I am Guest Mother Fucker'){

                            
                            ?>
                                <div class="w3-modal-content w3-animate-top w3-card-4">
                                    <header class="w3-container w3-teal"> 
                                        <span onclick="document.getElementById('require_name').style.display='none'" 
                                        class="w3-button w3-display-topright">&times;</span>
                                        <h2>Modal Header</h2>
                                    </header>
                                    <div class="w3-container">
                                        <p>Some text..</p>
                                        <p>Some text..</p>
                                    </div>
                                    <footer class="w3-container w3-teal">
                                        <p>Modal Footer</p>
                                    </footer>
                                </div>
                                <?php } else{ ?>
                                    <div class="w3-modal-content w3-animate-top w3-card-4">
                                    <header class="w3-container w3-teal"> 
                                        <span onclick="document.getElementById('require_name').style.display='none'" 
                                        class="w3-button w3-display-topright">&times;</span>
                                        <h2>Modal Header</h2>
                                    </header>
                                    <div class="w3-container">
                                        <p>Some text..</p>
                                        <p>Some text..</p>
                                    </div>
                                    <footer class="w3-container w3-teal">
                                        <p>Modal Footer</p>
                                    </footer>
                                </div>
                                <?php } ?>
                            </div>
                            
                            <p></p>
                        </div>
                        <div class="col-sm-1" style="border-color:black"></div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="modal-footer" style="background-color:#6665FF;border-color:#6665FF"></div>
            </div>
        </div>
    </div>
                           
        <!-- form search -->
        <div class="row" style="margin-top:50px">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action ="index.php" method="GET">
                    <div class="container-fluid">
                        <div class="input-group">

                            <!-- new search-box -->
                            <!-- <div class="search-box">
                                <input class="search-txt" type="text" name="" id="" placeholder="Enter QuizCode">
                                <a href="" type="search-btn"><i class="fas fa-search"></i></a>
                            </div> -->

                            <!-- old search-box -->
                            <input type="text" class="form-control" placeholder="Enter QuizCode" name="s_text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"  name="asd" >
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                        <?php
                            if($check=='fail'){?>
                               
                                <h3 style = " color:red;text-align: center;">
                                    It's wrong Please try again.
                                </h3>
                            <?php } 
                            else if ($check=='true'){?>
                                <h3 style = " color:green;text-align: center;">
                                Correct !!!!!
                                <script>$('#createName').modal('show')</script>
                                </h3>
                            <?php
                            for($i=0;$i<count($_SESSION['question']);$i++){
                                echo $_SESSION['question'][$i].'<br>';
                                
                            }
                        } 
                        // echo getToken(6);
                        ?>
                            
                      
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    
        
    

</body>
</html>

<script>
    randomfontcolor('bg1');
    randomfontcolor('bg2');
    randomfontcolor('bg3');
    randomfontcolor('bg4');
    randomfontcolor('bg5');
    randomfontcolor('bg6');
    randomfontcolor('bg7');
    randomfontcolor('bg8');

    function randomfontcolor (eiei){

    var random = document.getElementById(eiei);
    random.style.color = getRandomColor();

    setTimeout(function(){
        randomfontcolor (eiei);
        }, 100);
    };


    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>