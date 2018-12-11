<?php
    require 'server.php';

    //facebook login not doit
    //require 'fb-init.php';
    //if(isset($_SESSION['access_token'])){ ?>
        <!-- <a href="">Logout</a> -->
    <?php //}else{ ?>
        <!-- <a href="<?php //echo $login_url;?>">Login FB</a> -->
    <?php //}

    // $_SESSION['name'] = "Singha_".getToken(6);
    $_SESSION['name'] = "Singha";
    $_SESSION['score'] = 0;
    $_SESSION['counter'] = 0;
    $_SESSION['correct'] = 0;
    $_SESSION['upscore'] = 0;
    $check = 'start';
    unset($_SESSION['question']);
    if ($_GET != null) {
        $check = $_GET['s_text'];
    }
    if($check!='start'){
        $q = "SELECT * FROM `quiz` WHERE `quiz_id` ='$check'";
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
            $q_ques = "SELECT `question_id` FROM `question` WHERE `quiz_id` ='$q_id' ORDER BY RAND() ";
            $re_ques = mysqli_query($con, $q_ques);
            while($row_ques = mysqli_fetch_assoc($re_ques)){
                $_SESSION['question'][] = $row_ques['question_id'];
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
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>QuizSiJa</title>
</head>
<body>
    <!-- navbar sija -->
    <nav class="navbar navbar-inverse"  style = "background-color:#19261e">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#" onclick="document.getElementById('login').style.display='block'"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
            </ul>
        </div>
    </nav>
    <!-- login form -->
    <div id="login" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">

        <form class="w3-container" action="/action_page.php">
            <div class="w3-section">
                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required>
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
                            <a href="play.php?id=<?php echo $q_id ?>">
                            <center><button type="button" class="btn btn-primary" >Enter Quiz</button></center>
                            </a>
                            <!-- <form> -->
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