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
<body style="background-color:#4d4d4d">
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title">Quiz ...</h2>
            </div>
            <!-- body -->
            <div class="modal-body">
                <center>
                    <div class="container-fluid">
                        <img src="image\tmp_test_img.png" alt="" sizes="width:100px;height:100px" srcset="">
                    </div>
                </center>
                <div class="row">
                    <div class="col-sm-1" style="background-color:green"></div>
                    <div class="col-sm-6" style="background-color:blue"><p>Detail ...</p></div>
                    <div class="col-sm-1" style="background-color:black"></div>
                    <div class="col-sm-4" style="background-color:red">
                        <input type="text" name="a" id="">
                        <center><button type="button" class="btn btn-primary" >Enter Quiz</button></center>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="modal-footer">
                
            </div>
            </div>
        </div>
    </div>
    <script>$('#createName').modal('show')</script>
</body>
</html>