
<?php
error_reporting(0);
session_start();
include_once 'oesdb.php';
if (!isset($_SESSION['stdname'])) {
    $_GLOBALS['message'] = "Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
	}

if (isset($_REQUEST['logout'])) {
    //Log out and redirect login page
	unset($_SESSION['targetDate']);
    unset($_SESSION['stdname']);
    header('Location: index.php');
}
 else if(isset($_REQUEST['dashboard'])) 
 {
    header('Location: stdwelcome.php');
	}
	if(isset($_REQUEST['submit']))
	{$_SESSION['a']=$_SESSION['a']+1;
	$ans=$_POST['answer'];
	$qno=$_POST['qno'];
	
	
	$result=executeQuery("insert into answers values('".$_SESSION['stdname']."',$qno,'$ans')");
}
	
	
	?>
	<?php
$dateFormat = "d F Y -- g:i a";
//Change the 25 to however many minutes you want to countdown
$targetDate=$_SESSION['targetDate'];
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);
?>
<html>
<head>
<script type="text/javascript">
  var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?> 
function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
  if (hours < 0){
      days--;
      hours = 23
  }
  document.getElementById("remain").innerHTML ="<h1 align='center'>"+minutes+":"+seconds+"</h1>";
  SD=window.setTimeout( "setCountDown()", 1000 );
  if (minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
   		//window.alert("Time is up. Press OK to continue."); // change timeout message as required
  		window.location = "viewresult.php" // Add your redirect url
 	} 

}

</script></head>
<title>student welcome</title>
<body background="../images/img02.jpg" onload="setCountDown();">

<?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
<p>
 
 </center>
<form name="stdtest" action="stdtest.php" method="post">
<div align="right">
<input type="submit" value="Logout" name="logout" class="subbtn">
<input type="submit" value="Dashboard" name="dashboard" class="subbtn"></div>
<div id="remain"><?php echo " $remainingMinutes minutes, $remainingSeconds seconds";?></div>
<?php

if (isset($_SESSION['stdname'])) {
$b=$_SESSION['a'];
echo $b;
$c=$_SESSION['animals'][$b];
$result=executeQuery("select * from question where qno=$c");
$r=mysql_fetch_array($result);

?>
Question <input type="text" value="<?php echo $r[qno]; ?>" name="qno" maxlength="3" readonly>
<textarea cols="100" rows="8" name="question" readonly style="width:96.8%;text-align:left;margin-left:2%;margin-top:2px;font-size:120%;font-weight:bold;margin-bottom:0;color:;padding:2px 2px 2px 2px;"><?php echo $r[question];?></textarea>

&nbsp;&nbsp;&nbsp;&nbsp;1.<input type="radio" name="answer" value="a"><?php echo $r[a];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;2.<input type="radio" name="answer" value="b"><?php echo $r[b];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;3.<input type="radio" name="answer" value="c"><?php echo $r[c];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;4.<input type="radio" name="answer" value="d"><?php echo $r[d];?><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Next">




</form>
<?php
if($b==9)
{
header('Location: viewresult.php');
}
}
?>
</body>
</html>