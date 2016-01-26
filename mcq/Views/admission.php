<?php include 'validationform_admission.php'; ?>
<?php
if( isset($_POST['sub']))
{
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["pass"];
	$status = $_POST["status"];
	
	if(!empty($username))
	{
		if(isset($_POST['email'])){
			$checkQuery = "SELECT id FROM tbl_user WHERE email = '$email' AND username = '$username'  LIMIT 1";
			$result = $dbObj->doQuery($checkQuery);
			$row = $dbObj->numRows($result);
			if($row>0){
				echo ("<script>window.location='index.php?route=admission&option=process&status=2';</script>");
			}
			else{
				$query = "INSERT INTO tbl_user
				  SET 
					email ='$email', 
					username = '$username',
					password = '$password', 
					status = '0'
					";
				$dbObj->doQuery($query);
				echo ("<script>window.location='index.php?route=admission&option=process&status=1';</script>");
			}
		}
	}
 }
?>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Online Admission</h2>
    </div>
    <div class="topic_details">
    <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Application Submitted successfully!</p>';
					echo '</div>';
					sleep(2);
				 }

				 else if($status == 0){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/cross.png">';
						echo '<p class="color_red">Error on Application Process!!</p>';
					echo '</div>';
					sleep(2);
				 }
				 
				 else if($status == 2)
				{
                    echo '<div class="lbltext">';
						echo '<img src="resources/ico/cross.png">';
						echo '<p class="color_red">Your User Name already exist! Please choose another name!!</p>';
					echo '</div>';
					sleep(2);
                }
            }?>
            <br />
     <form action="" method="post" id="signup_form" novalidate="novalidate">
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Login Name:</label></td>
                    <td><input type="text" name="username" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                	<td><label>Password:</label></td>
                	<td><input type="password" name="pass" id="pass" class="input_field"  style="width:250px"/></td>
              	</tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                <input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:150px"/>
                <input type="submit" class="my_input_button icon_reset" name="reset" value="Reset" style="width:130px"/>
                </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            </form>
 
    </div>
</div>
<div class="clear">
</div>











    





