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
<body style="background-color:#4d4d4d;font-family:'Courier New', Courier, monospace;">
    <!-- navbar sija -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Quiz Detail</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- check login -->
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="createName">
        <div class="modal-dialog" role="document" style="background-color:#4d4d4d">
            <div class="modal-content" style="background-color:#4d4d4d">
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
            <div class="modal-body">
                <center>
                    <div class="container-fluid" style="border-color:white;border-style:solid;border-radius:5px">
                        <img src="image\tmp_test_img.png" alt="" sizes="width:100px;height:100px" srcset="">
                    </div>
                </center>
                <p></p>
                <div class="container-fluid" style="color:white">
                    <div class="row">
                        <span class="fluid">
                        <div class="col-sm-7" style="border-color:white;border-style:solid;border-radius:5px"><p></p><p>Detail : ...</p></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4" style="border-color:white;border-style:solid;border-radius:5px">
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
    <script>$('#createName').modal('show')</script>
</body>
</html>