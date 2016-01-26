<?php 
if( isset($_POST['sub']))
{
	$old_pass = $_POST["old_pass"];					
	$new_pass = $_POST["n_pass"];
	$retype_new_pass = $_POST["r_n_pass"];	
					
	/*$old_pass_md5 = md5($old_pass);*/
	$query = "SELECT id FROM tbl_admin WHERE login_pass = '$old_pass' AND id = 1";
	$result= $dbObj->doQuery($query);
	$num = $dbObj->numRows($result);
	if($new_pass == $retype_new_pass){
		if($num == 1){
			$query = "UPDATE tbl_admin
						 SET login_pass = '$new_pass' WHERE id = 1";
				$dbObj->doQuery($query);
			echo ("<script>window.location='index.php?route=setting&option=change&status=1';</script>");
			}
		else{
			echo ("<script>window.location='index.php?route=setting&option=change&status=0';</script>");
			
			}
	}
	else{
		echo ("<script>window.location='index.php?route=setting&option=change&status=2';</script>");
		}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Security Settings</h2>
    </div>
    <div class="topic_details">
    <br />
     <form id="validate" class="form" method="post" action="" >
     <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Password Changed successfully!</p>';
					echo '</div>';
					sleep(2);
				 }
				 else if($status == 2){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/cross.png">';
						echo '<p class="color_red">Retype password and New password are not same!!</p>';
					echo '</div>';
					sleep(2);
				 }
				 else if($status == 0){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/cross.png">';
						echo '<p class="color_red">Wrong old Password!!</p>';
					echo '</div>';
					sleep(2);
				 }
            }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
            <tr>
                <td width="32%"><label>Old Password:</label></td>
                <td width="68%"><input type="password" name="old_pass" id="old_pass" class="input_field"  style="width:300px"/></td>
            </tr>
            <tr>
                <td><label>Your New Password:</label></td>
                <td><input type="password" name="n_pass" id="n_pass" class="input_field"  style="width:300px"/></td>
            </tr>
            <tr>
                <td><label>Retype Password:</label></td>
                <td><input type="password" name="r_n_pass" id="r_n_pass" class="input_field"  style="width:300px"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" class="my_input_button icon_save" name="sub" value="Change" style="width:180px"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
        </table>
        </form>
 
    </div>
</div>
<div class="clear">
</div>











    





