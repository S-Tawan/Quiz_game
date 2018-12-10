<?php
    require 'server.php';
    $name = $_SESSION['name'];
    if( $_SESSION['error'] == 1){

//ใส่ตรงนี้นะะะะะะะะะ


        unset($_SESSION['error']);
    }



    if(isset($_POST['q_name'])){
        $_POST['q_name'];
        $_POST['q_img'];
    


   
   $ext = pathinfo(basename($_FILES["q_img"]["name"]), PATHINFO_EXTENSION);
   $new_taget_name = 'Quiz_image_' . uniqid() . "." . $ext;
   $target_path = "Quiz_image/";
   $upload_path = $target_path . $new_taget_name;
   $uploadOk = 1;
   
   $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));
   
   if ($_FILES["banner"]["size"] > 8000000) {
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
       }else {
            echo 'Move fail';
            $_SESSION['error'] = 1;
          
       }
   }
   if(!isset($_SESSION['error'])){}
   $banner = $_FILES["banner"]["name"];
   $img = $new_taget_name;

   $name = $_POST['q_name'];
   $detail = $_POST['q_detail'];
    }
  
//    header('Location:main.php');
}
   


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
                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $name ?></a></li>
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
</body>
</html>