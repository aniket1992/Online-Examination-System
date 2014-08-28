<?php
error_reporting(0);
session_start();
include_once 'oesdb.php';
if(!isset($_REQUEST['submit']))
{
$_SESSION['var']=1;
}
else
{
$_SESSION['var']=$_SESSION['var']+1;
}
if(isset($_REQUEST['Stop']))
{unset($_SESSION['var']);
header('Location: stdwelcome.php');
}
?> 

<html>
<head>
</head>
<title>practice test</title>
<body background="images/img02.jpg">
 
 
</center>
<form id="practicetest" action="practicetest.php" method="post">

<?php


if (isset($_SESSION['stdname'])) {
$result=executeQuery("select * from practicetest where sno='".$_SESSION['var']."'");
$r=mysql_fetch_array($result);
?>
<div align=right>
<input type="submit" value="Stop" name="Stop"/></div>
<textarea cols="100" rows="8" name="question" readonly style="width:96.8%;text-align:left;margin-left:2%;margin-top:2px;font-size:120%;font-weight:bold;margin-bottom:0;color:;padding:2px 2px 2px 2px;"><?php echo $r[question];?></textarea>
&nbsp;&nbsp;&nbsp;&nbsp;1.<input type="radio" name="answer" value="<?php echo $r[a];?>"><?php echo $r[a];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;2.<input type="radio" name="answer" value="<?php echo $r[b];?>"><?php echo $r[b];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;3.<input type="radio" name="answer" value="<?php echo $r[c];?>"><?php echo $r[c];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;4.<input type="radio" name="answer" value="<?php echo $r[d];?>"><?php echo $r[d];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Next">
<?php
}
?>
</form>
 
</body>
</html>

