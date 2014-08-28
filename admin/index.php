<?php

session_start();
      include_once '../oesdb.php';
	  if(isset($_REQUEST['admsubmit']))
      {
          
          $result=executeQuery("select * from adminlogin where admname='".htmlspecialchars($_REQUEST['name'],ENT_QUOTES)."' and admpassword='".md5(htmlspecialchars($_REQUEST['password'],ENT_QUOTES))."'");

if(mysql_num_rows($result)>0)
          {
              
              $r=mysql_fetch_array($result);
              if(strcmp($r['admpassword'],md5(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0)
              {
                  $_SESSION['admname']=htmlspecialchars_decode($r['admname'],ENT_QUOTES);
                  unset($_GLOBALS['message']);
                  header('Location: admwelcome.php');
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
	  if(isset($_REQUEST['Userlogin']))
	  header('Location: ../index.php');
?>

<html>
<head>
</head>
<title>Online Examination System</title>
<body background="../images/img02.jpg">
<img style="margin:10px 2px 2px 10px;float:left;" height="130" width="1366" src="../images/logo.png" alt="OES"/>

<nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...because Examination matters</h4></I></center>
<h4>
<?php
      
        if(isset($_GLOBALS['message']))
        {
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
      ?></h4>
<form id="indexform" action="index.php" method="post">
<div align=right><input type="submit" value="Userlogin" name="Userlogin" class="subbtn" /></div>
              <div align=center>
			  <table >
			  <br/><br/><br/>
              <tr>
                  <td><h3>Admin Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" name="name" value="" size="16" /></td>

              </tr>
              <tr>
                  <td> <h3>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></td>
                  <td><input type="password" name="password" value="" size="16" /></td>
              </tr>

              <tr>
                  <td colspan="2">
                      <input type="submit" value="Log In" name="admsubmit" class="subbtn" />
                  </td><td></td>
              </tr>
            </table>
</div>
        </form>
		<br/> <br/> <br/> <br/>
<p align=right><br/><br/><br/><br/><br/><br/>Developed By-<b>Aniket,Durgesh,Kunal,Sarvesh </b><br/> </p>
</body
</html>