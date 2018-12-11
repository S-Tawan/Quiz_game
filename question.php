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
                    <button class="w3-button w3-ripple w3-yellow w3-xlarge">Edit</button><p></p>
                    <button class="w3-button w3-ripple w3-red w3-xlarge" target="#myModal">Delete</button>
                </div>
                <!-- madal edit -->
                <!-- modal delete -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                <p>This is a small modal.</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom Card -->
            
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
                            <input class="w3-input w3-border w3-round" type="file">
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
                                        <td><input class="w3-check" type="checkbox" name="" id="" checked disabled></td>
                                        <td>
                                            <div class="form-group has-success has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess">
                                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" name="" id="" checked disabled></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" name="" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" name="" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess">
                                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="w3-check" type="checkbox" name="" id=""></td>
                                        <td>
                                            <div class="form-group has-error has-feedback">
                                                <input type="text" class="form-control" id="inputSuccess">
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