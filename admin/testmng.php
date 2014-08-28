<?php
error_reporting(0);
session_start();
include_once '../oesdb.php';
if (isset($_REQUEST['logout'])) {
  
    unset($_SESSION['admname']);
    header('Location: index.php');
	} else if (isset($_REQUEST['dashboard'])) {
   
    header('Location: admwelcome.php');
	}
if (isset($_REQUEST['delete'])){
executeQuery('truncate answers');
echo "<h1 align=center>Database answers truncated</h1>";
}
?>
<html>
    <head>
        <title>OES-Manage Tests</title></head>
<body background="../images/img02.jpg">
		<p>
 
 </h4></center>

</p>
<form name="testmng" action="testmng.php" method="post">
<div align=right>
<?php
if (isset($_SESSION['admname'])) {
    
?>
 
						<?php
    
    if (isset($_REQUEST['add'])) {
	header('Location: prepqn.php');
?>
                        <input type="submit" value="Cancel" name="cancel" class="subbtn" title="Cancel"/>
                        <input type="submit" value="Save" name="savea" class="subbtn" title="Save the Changes"/>
						
						<?php
    } else
?>
                        <input type="submit" value="Create new test" name="delete" class="subbtn" title="Delete"/>
                        <input type="submit" value="Add" name="add" class="subbtn" title="Add"/>
						<input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/>
                        <input type="submit" value="DashBoard" name="dashboard" class="subbtn" title="Dash Board"/></div>
						<?php
if (isset($_SESSION['admname'])) {
    // To display the Help Message
    if (isset($_REQUEST['forpq']))
        echo "<div class=\"pmsg\" style=\"text-align:center\"> Which test questions Do you want to Manage? <br/><b>Help:</b>Click on Questions button to manage the questions of respective tests</div>";



	}?>					</form>
						
						<?php 
						}
 ?>
						
						<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
						</body>
						</html>