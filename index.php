<?php
    require 'server.php';
    $check = 'start';
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
    
        }
         else {
            $check = 'fail';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizSiJa</title>
    <?php
    require 'link_title.php';
    ?>
</head>
<body style="background-color:#252525">
    <!-- navbar sija -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

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
        <img src="image\BackGround quizSija.png" style="width:100%;margin-top:-110px">

        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="createName">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <!-- header -->
            <div class="modal-header" style="background-color:#E7B818">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-8" ><h2><strong>Quiz ...</strong></h2></div>
                        <div class="col-lg-4" ><h5>Create by ...</h5></div>
                    </div>
            </div>
            <!-- body -->
            <div class="modal-body" >
                <center>
                    <div class="container-fluid" style="border-color:#4d4d4d;border-style:solid;border-radius:5px">
                        <img src="image\tmp_test_img.png" alt="" sizes="width:100px;height:100px" srcset="">
                    </div>
                </center>
                <p></p>
                <div class="container-fluid">
                    <div class="row">
                        <span class="fluid">
                        <div class="col-sm-8" style="border-color:#4d4d4d;border-style:solid;border-radius:5px"><p></p><p>Detail : ...</p></div>
                        <div class="col-sm-4" style="border-color:#4d4d4d;border-style:solid;border-radius:5px">
                            <p></p><span>rate : </span>
                            <p></p>
                            <center><button type="button" class="btn btn-primary" >Enter Quiz</button></center>
                            <p></p>
                        </div>
                        <div class="col-sm-1" style="border-color:black"></div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="modal-footer" style="background-color:#E7B818"></div>
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
                            <input type="text" class="form-control" placeholder="Enter QuizCode" name="s_text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
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
                            <?php } ?>
                            
                      
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    
        
    

</body>
</html>