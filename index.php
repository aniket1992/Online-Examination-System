<?php
error_reporting(0);

session_start();
include_once 'oesdb.php';
if(isset($_REQUEST['Adminlogin']))
      {
            header('Location: admin/index.php');
      }

if(isset($_REQUEST['register']))
      {
            header('Location: register.php');
      }
else if($_REQUEST['stdsubmit'])
      {
$result=executeQuery("select *,DECODE(stdpassword,'oespass') as std from student where stdname='".htmlspecialchars($_REQUEST['name'],ENT_QUOTES)."' and stdpassword=ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','oespass')");
 if(mysql_num_rows($result)>0)
          {

              $r=mysql_fetch_array($result);
              if(strcmp(htmlspecialchars_decode($r['std'],ENT_QUOTES),(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0)
              {
                  $_SESSION['stdname']=htmlspecialchars_decode($r['stdname'],ENT_QUOTES);
                  $_SESSION['stdid']=$r['stdid'];
                  unset($_GLOBALS['message']);
                  header('Location: stdwelcome.php');
              
              }else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }

          }
          else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }
          closedb();
      }

?>
<html>
<head>


<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
</head>
<title>Online Examination System</title>
<body background="images/img02.jpg">
<img style="margin:10px 2px 2px 10px;float:left;" height="110" width="1366" src="images/logo.png" alt="OES"/>



<?php

        if($_GLOBALS['message'])
        {
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
      ?>
</center>
<form id="stdloginform" action="index.php" method="post">
<p>
</br>
<?php if(isset($_SESSION['stdname']))
{
                          header('Location: stdwelcome.php');
						  }
						  else{  
                          
                        ?>
<div align=right>
<input type="submit" value="Register" name="register" title="Register"/>
<br/>
<br/>
<input type="submit" value="Adminlogin" name="Adminlogin" title="Adminlogin"/>
   <?php } ?>
</div>
<div align=center>
<h3>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' value='' name='name'>
</br>

</br>
Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='password' value=''name='password' >
</br>
</br>

     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='submit' value='Log in' name="stdsubmit">
</div>
</p>
<br/> <br/> <br/> <br/>
<h5><p align=right><br/><br/><br/><br/><br/><br/>Developed By-<b>Aniket,Durgesh,Kunal,Sarvesh </b><br/> </p>
</h5></form>
</body>
</html>