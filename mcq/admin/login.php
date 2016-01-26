<?php
error_reporting(0);
session_start();
$route = $_GET["route"];
$option = $_GET["option"];
require_once 'Model/dbclass.php';
$dbObj = new Model_DBClass();

if( isset($_POST['sub']))
{
/*------------------------------- */ 
require_once 'Model/Authentication.php';
$authenticationObj = new Model_Authentication();

$data["admin_name"]=$_POST["login_name"];
$data["password"] = $_POST["login_password"];
/*------------------------------- */ 
if(!empty($data["admin_name"]) && !empty($data["password"]))
{
	$result = $authenticationObj->loginUser($data);
	$num = $authenticationObj->numRows($result);
	if($num == 1)
	{
		 $row = $authenticationObj->fetchObject($result);
		 $_SESSION["admin_id"] = $row->id;
		 $_SESSION["admin_name"] = $row->login_name;
		 $_SESSION["status"] = $row->status;
		echo '<script>window.location = "index.php?status=1"; </script>';
	}
	else 
	{
		echo '<script>window.location = "index.php?status=0"; </script>';
	}
}
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="" />
    <meta name="robots" content="default, follow" />
    <meta name="author" content="Administrator" />
    <meta name="googlebot" content="noodp" />
    <meta name="application-name" content="" />
    <title>MCQ System | Admin Login</title>
    <link rel="Shortcut Icon" href="" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <!-- masterContent  -->   
    <link href="Style/style_index.css" rel="stylesheet" />

</head>
<body id="page">
    <div class="container">
       <header>

      </header>
      <div id="main_content">
          <div class="content">
          	<div class="content_left">
            <div class="logo">
            	
            </div>
            <h2>Admin Area</h2>
            <p>Copyright &copy;  <?php echo date("Y"); ?> MCQ System</p>
            </div>
			<div>
            <?php include 'validationloginform.php'; ?>
            <form action="" method="post" id="login_form" class="form" novalidate="novalidate">
                <fieldset>
                <table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                <td colspan="2" align="center"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                </tr>
                <tr>
                    <td width="20%" valign="middle"><label for="login">User Name:</label></td>
                    <td width="80%" align="left"><input type="text" name="login_name" class="textBox" id="login" /></td>
                </tr>
                <tr>
                    <td valign="middle"><label for="pass">Password:</label></td>
                    <td align="left"><input type="password" name="login_password" class="textBox" id="pass" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td> </td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td align="left"><input name="sub" type="submit" value="Login" class="button" />
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td> </td>
                </tr>
                </table>
                </fieldset>
                </form>
                </div>
            <div class="clear"></div>
          </div>
      </div>
      
    </div>
</body>
</html>