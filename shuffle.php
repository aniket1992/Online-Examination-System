<?php
session_start();

$arr= array(1,2,3,4,5,6,7,8,9,10);
shuffle($arr);
$_SESSION['animals']=$arr;
$_SESSION['a']=0;
echo $_SESSION['a'];
$_SESSION['resume']=$resume;
$targetDate = time() + (1*60);
$_SESSION['targetDate']=$targetDate;
header('Location: stdtest.php');
?>