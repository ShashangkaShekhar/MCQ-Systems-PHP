<?php
$id = $_GET["id"];
$query = "SELECT * FROM tbl_subjects WHERE id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	$sub_name = $_POST["sub_name"];
	$fee = $_POST["fee"];
	$pay_type = $_POST["pay_type"];
	$time_period = $_POST["time_period"];
	$status = $_POST["status"];
	
	if(!empty($id))
	{
			$query = "UPDATE tbl_subjects
					  SET 
						subject_name ='$sub_name', 
						enrollment_fee = '$fee',
						payment_type = '$pay_type',
						time_period = '$time_period',
						status = '$status' WHERE id= $id";
			$dbObj->doQuery($query);
		echo ("<script>window.location='index.php?route=subjects&option=setup&status=2';</script>");
	}
	else
	{
		if(!empty($sub_name))
		{
		$query = "INSERT INTO tbl_subjects
					  SET 
						subject_name ='$sub_name', 
						enrollment_fee = '$fee',
						payment_type = '$pay_type',
						time_period = '$time_period',
						status = '$status'
						";
			$dbObj->doQuery($query);
		 echo ("<script>window.location='index.php?route=subjects&option=setup&status=1';</script>");
		}
	}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Subjects Add</h2>
    </div>
    <div class="topic_details">
     <form action="" method="post" id="Signup_form" novalidate="novalidate">
         
            <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Subject Added successfully!</p>';
					echo '</div>';
					sleep(2);
				 }
				 else if($status == 2){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Subject Updated successfully!</p>';
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
            }?>
        
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                </tr>
                <tr>
                    <td><label>Subject Name:</label></td>
                    <td><input type="text" name="sub_name" class="input_field" value="<?php echo $row->subject_name; ?>" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Enrollment Fee:</label></td>
                    <td><input type="text" name="fee" class="input_field" value="<?php echo $row->enrollment_fee; ?>" style="width:250px"/></td>
                </tr>
                <tr>
                	<td><label>Payment Type:</label></td>
                	<td>
                        <select name="pay_type" id="pay_type" class="input_field" style="width:165px" >
                         <option value="Onetime">One time</option>
                         <option value="Recurring">Recurring</option>
                        </select>
                    </td>
              	</tr>
                <tr>
                	<td><label>Time Period:</label></td>
                	<td>
                        <select name="time_period" id="time_period" class="input_field" style="width:165px" >
                         <option value="Daily">Daily</option>
                         <option value="Weekly">Weekly</option>
                         <option value="Monthly">Monthly</option>
                         <option value="Yearly">Yearly</option>
                        </select>
                    </td>
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
                <input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:130px"/>
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
            <h2>Subjects List</h2>
            <div class="user_list">
               <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr> 
                        <td width="35%"><label>Subject Name</label></td>
                        <td width="15%"><label>Fee</label></td>
                        <td width="15%"><label>payment</label></td>
                        <td width="15%"><label>Period</label></td>
                        <td width="15%"><label>Status</label></td>
                        <td width="5%"><label>Actions</label></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tbl_subjects ORDER BY id DESC";
                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->subject_name; ?></td>
                        <td><?php echo $row->enrollment_fee; ?></td>
                        <td><?php echo $row->payment_type; ?></td>
                        <td><?php echo $row->time_period; ?></td>
                        <td>
                            <?php 
                                $status = $row->status;
                                if($status == 1){
                                    echo "Active";
                                }
                                elseif ($status == 0){
                                    echo "Inactive";
                                } 
                            
                            ?>
                        </td>
                        <td class="actBtns">
                        <a href="index.php?route=subjects&option=update&id=<?php echo $row->id; ?>" title="Update"><img src="resources/ico/tick.png" alt="" /></a>
                        <a href="index.php?route=subjects&option=delete&id=<?php echo $row->id; ?>" title="Delete"><img src="resources/ico/cross.png" alt="" /></a>
    
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











    





