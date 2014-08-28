<?php
error_reporting(0);
/********************* Step 1 *****************************/
session_start();
if(isset($_REQUEST['logout'])){
           
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
?>
<html>
    <head>
        <title>OES-DashBoard</title>
		</head>
   <body background="../images/img02.jpg">


 
 
 <?php
       /********************* Step 2 *****************************/
        if(isset($_GLOBALS['message'])) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
<form name="admwelcome" action="admwelcome.php" method="post">
<div align=right>
<?php if(isset($_SESSION['admname'])){ ?>
<input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></div>

<p><img height="500" width="600" style="border:none;"  src="../images/admwelcome.jpg" alt="image"  usemap="#oesnav" /></p>

<map name="oesnav">
                        <area shape="circle" coords="150,120,70" href="usermng.php" alt="Manage Users" title="This takes you to User Management Section" />
                        <area shape="circle" coords="450,120,70" href="submng.php" alt="Manage Subjects" title="This takes you to Subjects Management Section" />
                        <area shape="circle" coords="300,250,60" href="rsltmng.php" alt="Manage Test Results" title="Click this to view Test Results." />
                        <area shape="circle" coords="150,375,70" href="testmng.php?forpq=true" alt="Prepare Questions" title="Click this to prepare Questions for the Test" />
                        <area shape="circle" coords="450,375,70" href="testmng.php" alt="Manage Tests" title="This takes you to Tests Management Section" />
                    </map>
					 
					</form>
</body>
</html>
<?php } ?>