<?php
error_reporting(0);

session_start();
include_once '../oesdb.php';
if(isset($_REQUEST['dashboard'])){
header('Location: admwelcome.php');

}
if(isset($_REQUEST['logout'])){
                unset($_SESSION['admname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
if(isset($_REQUEST['submit']))
{
$question=$_POST['question'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$correct=$_POST['correct'];
$result=executeQuery("insert into question values('','$question','$a','$b','$c','$d','$correct')");
}


?>
<html>
<head>
</head>
<title>Add questions</title>
<body background="../images/img02.jpg">
<img style="margin:10px 2px 2px 10px;float:left;" height="130" width="1366" src="../images/logo.png" alt="OES"/>
<?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
<?php
if(isset($_SESSION['admname']))
{
?>
<form action="prepqn.php" method="post">
<h2 align="center">Enter the question</h2>
<div align=right>
<input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/>
<input type="submit" value="Dashboard" name="dashboard" class="subbtn">
</div>
<br/>
<textarea cols="100" rows="7" name="question">
</textarea >
<br/>
a<input type="text" value="" name="a">

<br/>
b<input type="text" value="" name="b">

<br/>
c<input type="text" value="" name="c">

<br/>
d<input type="text" value="" name="d">
<br/>
correct answer <input type="text" value="" name="correct">
<br/>
<input type="submit" value="Add Next" name="submit">
</form>
<?php
}
else
echo "session timeout";
?>

</body>
</html>
