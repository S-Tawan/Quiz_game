<?php
require 'server.php';
$quiz_id = $_SESSION['quiz_id'];
$ques_id = $_GET['id'];
echo $ques_id;
$q_ques = "DELETE FROM `question` WHERE `question_id` = '$ques_id'";
$re_ques = mysqli_query($con, $q_ques);
// $row_ques = mysqli_fetch_assoc($re_ques);
$q_ans = "DELETE FROM `answers` WHERE `question_id` = '$ques_id'";
$re_ans = mysqli_query($con, $q_ans);
// $row_ans = mysqli_fetch_assoc($re_ans);
header('Location:question.php?id='.$quiz_id);
?>