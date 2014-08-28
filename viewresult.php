<?php
//error_reporting(0);

session_start();
include_once 'oesdb.php';

if(!isset($_SESSION['stdname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout'])) {
    //Log out and redirect login page
        unset($_SESSION['stdname']);
        header('Location: index.php');

    }
    else if(isset($_REQUEST['back'])) {
        //redirect to View Result

            header('Location: viewresult.php');

        }
        else if(isset($_REQUEST['dashboard'])) {
        //redirect to dashboard

            header('Location: stdwelcome.php');

        }

?>
<html>
<head>
</head>
<title>Result</title>
<body background="../images/img02.jpg">
 
 </center>
<form action="viewresult.php" method="POST">
<div align=right>
<input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/>

</div>
<?php
if(isset($_SESSION['stdname']))
{

$result=executeQuery("select * from question , answers where question.qno=answers.qno1 and question.correct=answers.ans and answers.name='".$_SESSION['stdname']."'");
$count=0;
while($r=mysql_fetch_array($result))
{
$count++;
}
echo "<br/>";
echo "Total number of correct answers are   ";
echo $count;
?>
<h3 style="color:#0000cc;text-align:center;">Test Summary</h3> 
                         
                         
                             <hr style="color:#ff0000;border-width:4px;"/> 
                         
                         
                             <h3><B>Student Name  -</B >
                             <?php echo $_SESSION['stdname']; ?> 
							 
							 <br/>
							 <br/>
							 <br/>
                         
                         
                             
                         
                             <B>Subject  -</B>
                             C Programming Language
							 <br/>
							 <br/>
							 <br/>
                         
                         
                             
                         <B>
                             Max. Marks  -</B>
                             30
							 <br/><br/><br/>
                         
                         <B>
                             Obtained Marks  -</B>
							 <?php 
							 
							 echo " ".$count*3; ?> 
							 <br/><br/><br/>
							 <B>
							 Percentage  -</B>
							 <?php
							 $per=(($count*3*100)/30);
							 echo $per."%";
							 ?>
							 <br/><br/><br/>
							 <?php 
							 $result=executeQuery("insert into results values('".$_SESSION['stdname']."',$count*3,'$per')");
							 ?>
							 
                             
<?php
}
?>
</form>
</body>
</html>
