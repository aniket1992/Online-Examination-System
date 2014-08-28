<?php

error_reporting(0);
session_start();

if(isset($_REQUEST['logout'])){
                unset($_SESSION['stdname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }

?>
<html>
<head>
</head>
<title>OES-DashBoard</title>
<body background="images/img02.jpg">
<?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
<p>
 
 
<form name="stdwelcome" action="stdwelcome.php" method="post">
<div align="right"><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></div>
</h4><img height="500" width="600" style="border:none;"  src="images/stdwelcome.jpg" alt="image"  usemap="#oesnav" /></p>


<map name="oesnav">
                        <area shape="circle" coords="150,120,70" href="viewresult.php" alt="View Results" title="Click to View Results" />
                        <area shape="circle" coords="450,120,70" href="shuffle.php" alt="Take a New Test" title="Take a New Test" />
                        <area shape="circle" coords="300,250,60" href="editprofile.php?edit=edit" alt="Edit Your Profile" title="Click this to Edit Your Profile." />
                        <area shape="circle" coords="150,375,70" href="practicetest.php" alt="Practice Test" title="Click to take a Practice Test" />
                        <area shape="circle" coords="450,375,70" href="resumetest.php" alt="Resume Test" title="Click this to Resume Your Pending Tests." />
                    </map>

 
</form>
</body>
</html>