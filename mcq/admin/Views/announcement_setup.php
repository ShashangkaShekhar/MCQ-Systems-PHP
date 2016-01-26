<?php
$id = $_GET["id"];
$query = "SELECT * FROM tbl_exam_schedule WHERE id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{

	$exam_id = $_POST["exam_id"];
	$p_text = $_POST["p_text"];
	$date_start = $_POST["date_start"];
	$date_end = $_POST["date_end"];
	$status = $_POST["status"];
	
	if(!empty($id))
	{
			$query = "UPDATE tbl_exam_schedule
					  SET 
						exam_id ='$exam_id', 
						text = '$p_text',
						start_time = '$date_start', 
						end_time = '$date_end', 
						status = '$status'
						WHERE id= $id";
			$dbObj->doQuery($query);
		echo ("<script>window.location='index.php?route=announcement&option=setup&status=2';</script>");
	}
	else
	{
		if(!empty($exam_id))
		{
		$query = "INSERT INTO tbl_exam_schedule
					  SET 
						exam_id ='$exam_id', 
						text = '$p_text',
						start_time = '$date_start', 
						end_time = '$date_end', 
						status = '$status'
						";
			$dbObj->doQuery($query);
		 echo ("<script>window.location='index.php?route=announcement&option=setup&status=1';</script>");
		}
	}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Publish Exam Schedule</h2>
    </div>
    <div class="topic_details">
         <form action="" method="post" id="Signup_form" novalidate="novalidate">
         <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Schedule Added successfully!</p>';
					echo '</div>';
					sleep(2);
				 }
				
				else if($status == 2){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_red">Schedule Updated successfully!</p>';
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
                    <td></td>
                </tr>
                <tr>
                    <td><label>Exam :</label></td>
                    <td>
                    <?php
						$query_sub = "SELECT * FROM tbl_exams WHERE status = 1 ORDER BY exam_name";
						$result_sub = $dbObj->doQuery($query_sub);
						?>
						<select name="exam_id" id="exam_id" class="input_field" style="width:265px" >
							<?php while($rowsub = $dbObj->fetchObject($result_sub))
							{ ?>
							<option value="<?php echo $rowsub->id ?>"><?php echo ucfirst($rowsub->exam_name); ?></option>
							<?php 
							} ?>
						</select>
                        </td>
                </tr>
                <tr>
                    <td><label>Publish Text:</label></td>
                    <td><input type="text" name="p_text" class="input_field" style="width:250px" value="<?php echo $row->text ?>"/></td>
                </tr>
                <tr>
                	<td><label>Start Date:</label></td>
                	<td><input type="text" name="date_start" class="input_field" style="width:220px" value="<?php echo $row->start_time ?>"/>
						<script type="text/javascript">
                            $(function(){
                                $('*[name=date_start]').appendDtpicker();
                            });
                        </script>
                    </td>
              	</tr>
                <tr>
                	<td><label>End Date:</label></td>
                	<td><input type="text" name="date_end" class="input_field" style="width:220px" value="<?php echo $row->end_time ?>"/>
						<script type="text/javascript">
                            $(function(){
                                $('*[name=date_end]').appendDtpicker();
                            });
                        </script>
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
                        <td width="30%"><label>Exam</label></td>
                        <td width="30%"><label>Message</label></td>
                        <td width="20%"><label>Start time</label></td>
                        <td width="20%"><label>End time</label></td>
                        <td width="15%"><label>Status</label></td>
                        <td width="15%"><label>Actions</label></td>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
					$query = "SELECT 
					TES.id,
					TE.exam_name,
					TES.text,
					TES.start_time,
					TES.end_time,
					TES.status
					
					FROM tbl_exam_schedule AS TES 
					INNER JOIN tbl_exams AS TE 
					ON TE.id = TES.exam_id ORDER BY TES.id DESC";
					
                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->exam_name; ?></td>
                        <td><?php echo $row->text; ?></td>
                        <td><?php $date = $row->start_time; 
									$date = date_create($date); 
									echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?></td>
                                    
                        <td><?php $date = $row->end_time; 
									$date = date_create($date); 
									echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?></td>
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
                                <a href="index.php?route=announcement&option=update&id=<?php echo $row->id; ?>" title="Update"><img src="resources/ico/edit.png" alt="" /></a>
                                <a href="index.php?route=announcement&option=delete&id=<?php echo $row->id; ?>" title="Delete"><img src="resources/ico/cross.png" alt="" /></a>   
    
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











    





