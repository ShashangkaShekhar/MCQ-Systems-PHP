<?php
$id = $_GET["id"];
$query = "SELECT * FROM tbl_user WHERE id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{

	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["pass"];
	$status = $_POST["status"];
	
	if(!empty($id))
	{
			$query = "UPDATE tbl_user
					  SET 
						email ='$email', 
						username = '$username',
						password = '$password', 
						status = '$status' 
						WHERE id= $id";
			$dbObj->doQuery($query);
		echo ("<script>window.location='index.php?route=user&option=setup&status=2';</script>");
	}
	else
	{
		if(!empty($username))
		{
            if(isset($_POST['email'])){
                $checkQuery = "SELECT id FROM tbl_user WHERE email = '$email' AND username = '$username'  LIMIT 1";
                $result = $dbObj->doQuery($checkQuery);
                $row = $dbObj->numRows($result);
                if($row>0){
                    echo ("<script>window.location='index.php?route=user&option=setup&status=3';</script>");
                }
                else{
                    $query = "INSERT INTO tbl_user
					  SET
						email ='$email',
						username = '$username',
						password = '$password',
						status = '$status'
						";
                    $dbObj->doQuery($query);
                    echo ("<script>window.location='index.php?route=user&option=setup&status=1';</script>");
                }
            }
		}
	}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Add new Users</h2>
    </div>
    <div class="topic_details">
         <form action="" method="post" id="Signup_form" novalidate="novalidate">
         <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">User Create successfully!</p>';
					echo '</div>';
					sleep(2);
				 }
                 else if($status == 2)
                 {
                     echo '<div class="lbltext">';
                     echo '<img src="resources/ico/tick.png">';
                     echo '<p class="color_green">User Updated successfully!</p>';
                     echo '</div>';
                     sleep(2);
                 }
				 else if($status == 0){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/cross.png">';
						echo '<p class="color_red">Error on saving data!!</p>';
					echo '</div>';
					sleep(2);
				 }

                 else if($status == 3)
                 {
                     echo '<div class="lbltext">';
                     echo '<img src="resources/ico/cross.png">';
                     echo '<p class="color_red">Your User Name already exist! Please choose another name!!</p>';
                     echo '</div>';
                     sleep(2);
                 }
            }?>
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email" class="input_field" style="width:250px" value="<?php echo $row->email ?>"/></td>
                </tr>
                <tr>
                    <td><label>Login Name:</label></td>
                    <td><input type="text" name="username" class="input_field" style="width:250px" value="<?php echo $row->username ?>"/></td>
                </tr>
                <tr>
                	<td><label>Password:</label></td>
                	<td><input type="password" name="pass" id="pass" class="input_field"  style="width:250px" value="<?php echo $row->password ?>"/></td>
              	</tr>
                <tr>
                	<td><label>Status:</label></td>
                	<td>
                        <select name="status" id="status" class="input_field" style="width:165px" >
                         <option value="1">Active</option>
                         <option value="0">InActive</option>
                        </select>
                    </td>
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
            <div class="clear">
</div>
            <h2>Users List</h2>
            <div class="user_list">
               <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr>
                        <td width="40%"><label>Email</label></td>
                        <td width="30%"><label>User Name</label></td>
                        <td width="15%"><label>Status</label></td>
                        <td width="15%"><label>Options</label></td>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
					//TE = tbl_exams //TS = tbl_subjects

                    $query = "SELECT * FROM tbl_user;";
					
                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td>
                            <?php 
									$status = $row->status; 
									if($status == 1){
										echo "<span style='color:green'>Active </span>";
										echo '<img src="resources/ico/tick.png" height="15px" alt="Applied">';

									}
									elseif ($status == 0){
										echo "<span style='color:red'>Inactive </span>";
										echo '<img src="resources/ico/star_icon.png" height="15px" alt="Applied">';
									} 
								?>
                        </td>
                        <td class="actBtns">
                        
                        <a href="index.php?route=user&option=score&id=<?php echo $row->id; ?>" title="Score"><img src="resources/ico/score.png" alt="" /></a>
                                <a href="index.php?route=user&option=update&id=<?php echo $row->id; ?>" title="Update"><img src="resources/ico/edit.png" alt="" /></a>
                                <a href="index.php?route=user&option=delete&id=<?php echo $row->id; ?>" title="Delete"><img src="resources/ico/cross.png" alt="" /></a>   
    
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>    
                 </tbody>
             </table>
 		</div>
    </div>
</div>
<div class="clear">
</div>











    





