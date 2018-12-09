<?php
    require 'server.php';
    echo $_SESSION['score'].'<br>';
    echo $_SESSION['correct'].'/'.count($_SESSION['question']);
    echo "<br>". $_SESSION['quiz']





?>