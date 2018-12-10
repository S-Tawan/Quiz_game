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

            <!-- card all -->
            <div class="w3-card-4" id="card">
                <div class="container-fluid" >
                    <div class="w3-row ">
                        <a href="javascript:void(0)" onclick="openCity(event, 'quiz','city1','tablink1');">
                        <div class="w3-third tablink1 w3-bottombar w3-hover-light-grey w3-padding ">Quiz</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'view','city1','tablink1');">
                        <div class="w3-third tablink1 w3-bottombar w3-hover-light-grey w3-padding">Views</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'option','city1','tablink1');">
                        <div class="w3-third tablink1 w3-bottombar w3-hover-light-grey w3-padding">Option</div>
                        </a>
                    </div>
                </div>

                <!-- script card -->
                <div id="quiz" class="w3-container city1 w3-animate-opacity" style="display:block">
                    <h2>DC Universe</h2>
                    <img src="image\tmp_test_img.png" class="w3-round" alt="" style="height:100px;max-width:100%" srcset="">
                    <p>คำถามเกี่ยวกับจักรวาร DC.</p>
                </div>

                <div id="view" class="w3-container city1 w3-animate-opacity" style="display:none">
                    <h2>Plays</h2>
                    <p>27 rounds</p>
                    <h2>Rate</h2>
                    <p>10/10</p>
                    <h2>Top Score</h2>
                    <p>3500 points</p>
                </div>

                <div id="option" class="w3-container city1 w3-animate-opacity" style="display:none;margin-top:50px;">
                    <button class="w3-button w3-block w3-round-large w3-large w3-yellow">Edit</button><p></p>
                    <button class="w3-button w3-block w3-round-large w3-large w3-red">Delete</button>
                </div>
            </div>
            <!-- card end -->

            <div class="w3-card-4" id="card">
                <div class="container-fluid" >
                    <div class="w3-row">
                        <a href="javascript:void(0)" onclick="openCity(event, 'quiz2','city2','tablink2');">
                        <div class="w3-third tablink2 w3-bottombar w3-hover-light-grey w3-padding">Quiz</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'view2','city2','tablink2');">
                        <div class="w3-third tablink2 w3-bottombar w3-hover-light-grey w3-padding">Views</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'option2','city2','tablink2');">
                        <div class="w3-third tablink2 w3-bottombar w3-hover-light-grey w3-padding">Option</div>
                        </a>
                    </div>
                </div>

                <!-- script card -->
                <div id="quiz2" class="w3-container city2 w3-animate-opacity" style="display:block">
                    <h2>AC Universe</h2>
                    <img src="image\tmp_test_img.png" class="w3-round" alt="" style="height:100px;max-width:100%" srcset="">
                    <p>คำถามเกี่ยวกับจักรวาร DC.</p>
                </div>

                <div id="view2" class="w3-container city2 w3-animate-opacity" style="display:none">
                    <h2>Plays</h2>
                    <p>27 rounds</p>
                    <h2>Rate</h2>
                    <p>10/10</p>
                    <h2>Top Score</h2>
                    <p>3500 points</p>
                </div>

                <div id="option2" class="w3-container city2 w3-animate-opacity" style="display:none;margin-top:50px;">
                    <button class="w3-button w3-block w3-round-large w3-large w3-yellow">Edit</button><p></p>
                    <button class="w3-button w3-block w3-round-large w3-large w3-red">Delete</button>
                </div>
                <script>
                    openCity(event, 'quiz2','city2','tablink2');
                </script>
            </div>
            
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
                        <p>Quiz Name : </p>
                        <input class="w3-input w3-border w3-round" type="text">
                        <p>Title Miage : </p>
                        <input class="w3-input w3-border w3-round" type="file">
                        <p>Detail Quiz : </p>
                        <textarea name="quiz-detail" id="" cols="35" rows="5"></textarea>
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
        openCity(event, 'quiz','city1','tablink1');
    </script>

</body>
</html>