<?php

error_reporting(0);
session_start();
include_once '../oesdb.php';
/************************** Step 1 *************************/
if(!isset($_SESSION['admname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout'])) {
    /************************** Step 2 - Case 1 *************************/
    //Log out and redirect login page
        unset($_SESSION['admname']);
        header('Location: index.php');

    }
    else if(isset($_REQUEST['dashboard'])) {
    /************************** Step 2 - Case 2 *************************/
        //redirect to dashboard
            header('Location: admwelcome.php');

        }

?>
<html>
    <head>
        <title>OES-Manage Results</title>
		</head>
    <body background="../images/img02.jpg">
	
	<?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
	<form name="rsltmng" action="rsltmng.php" method="post">
                <div align=right>
                        <?php if(isset($_SESSION['admname'])) {
                        

                            ?>
                        <input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/>
						<input type="submit" value="DashBoard" name="dashboard" class="subbtn" title="Dash Board"/>
						</div><?php
						
						
						$result=executeQuery("select * from results order by marks desc");
						while($r=mysql_fetch_array($result))
						
						{echo "<br/>";
						echo $r['name']." ";
                         echo $r['marks']." ";
echo $r['percentage'];	
}					 }
						?>
						
		</body>
		</html>