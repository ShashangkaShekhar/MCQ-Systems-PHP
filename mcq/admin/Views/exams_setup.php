<?php
$id = $_GET["id"];
$query = "SELECT * FROM tbl_exams WHERE id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{

	$subject_id = $_POST["subject_id"];
	$exam = $_POST["exam"];
	$exam_syllabus = $_POST["exam_syllabus"];
	
	$exam_duration = $_POST["exam_duration"];
	/*$timestamp = strtotime($_POST['exam_duration']);
	$exam_duration = date("H:m:s", $timestamp);*/
	
	$exam_marks = $_POST["exam_marks"];
	$exam_pass_marks = $_POST["exam_pass_marks"];
	$status = $_POST["status"];
	
	
 
	if(!empty($id))
	{
			$query = "UPDATE tbl_exams
					  SET 
						subject_id ='$subject_id', 
						exam_name = '$exam',
						exam_syllabus = '$exam_syllabus',
						total_score = '$exam_marks',
						pass_score = '$exam_pass_marks',
						duration = '$exam_duration', 
						status = '$status' 
						WHERE id= $id";
			$dbObj->doQuery($query);
		echo ("<script>window.location='index.php?route=exams&option=setup&status=2';</script>");
	}
	else
	{
		if(!empty($exam))
		{
		$query = "INSERT INTO tbl_exams
					  SET 
						subject_id ='$subject_id', 
						exam_name = '$exam',
						exam_syllabus = '$exam_syllabus',
						total_score = '$exam_marks',
						pass_score = '$exam_pass_marks',
						duration = '$exam_duration' ,
						status = '$status' 
						";
			$dbObj->doQuery($query);
		 echo ("<script>window.location='index.php?route=exams&option=setup&status=1';</script>");
		}
	}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Exams Setup</h2>
    </div>
    <div class="topic_details">
     <form action="" method="post" id="Signup_form" novalidate="novalidate">
         <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Exam Added successfully!</p>';
					echo '</div>';
					sleep(2);
				 }
				 else if($status == 2){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Exam Updated successfully!</p>';
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
                    <td><label>Subject:</label></td>
                    <td>
                    <?php
						$query_sub = "SELECT * FROM tbl_subjects WHERE status = 1 ORDER BY subject_name";
						$result_sub = $dbObj->doQuery($query_sub);
						?>
						<select name="subject_id" id="subject_id" class="input_field" style="width:265px" >
							<?php while($rowsub = $dbObj->fetchObject($result_sub))
							{ ?>
							<option value="<?php echo $rowsub->id ?>"><?php echo ucfirst($rowsub->subject_name); ?></option>
							<?php 
							} ?>
						</select>
                        </td>
                </tr>
                <tr>
                    <td><label>Exam Name:</label></td>
                    <td><input type="text" name="exam" class="input_field" value="<?php echo $row->exam_name ?>" style="width:250px"/></td>
                </tr>
                <tr>
                	<td><label>Exam Syllabus:</label></td>
                	<td>
                       <textarea name="exam_syllabus" class="input_field ckeditor"  style="width:485px">
					   <?php echo $row->exam_syllabus ?></textarea>
                    </td>
              	</tr>
                <tr>
                	<td><label>Duration:</label></td>
                	<td><input type="text" name="exam_duration" class="input_field" placeholder="00:00:00" value="<?php echo $row->duration ?>" style="width:150px"/>
                    </td>
              	</tr>
                <tr>
                	<td><label>Total Marks:</label></td>
                	<td><input type="text" name="exam_marks" class="input_field" value="<?php echo $row->total_score ?>" style="width:150px"/>
                    </td>
              	</tr>
                <tr>
                	<td><label>Pss Marks:</label></td>
                	<td><input type="text" name="exam_pass_marks" class="input_field" value="<?php echo $row->pass_score ?>" style="width:150px"/>
                    </td>
              	</tr>
                <tr>
                	<td><label>Status:</label></td>
                	<td>
                        <select name="status" id="status" class="input_field" style="width:165px" >
                         <option value="1">Available</option>
                         <option value="0">Unavailable</option>
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
            <h2>Exam List</h2>
            <div class="user_list">
               <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr> 
                        <td width="25%"><label>Subject Name</label></td>
                        <td width="30%"><label>Exam</label></td>
                        <td width="5%"><label>Score</label></td>
                        <td width="5%"><label>Pass</label></td>
                        <td width="5%"><label>Duration</label></td>
                        <td width="15%"><label>Status</label></td>
                        <td width="15%"><label>Actions</label></td>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
					//TE = tbl_exams //TS = tbl_subjects

                    $query = "SELECT TE.id, TS.subject_name ,TE.exam_name, TE.total_score, TE.pass_score,TE.duration,TE.status
					FROM 
						tbl_exams AS TE 
					INNER JOIN 
						tbl_subjects AS TS
					ON TS.id = TE.subject_id ;";
					
                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->subject_name; ?></td>
                        <td><?php echo $row->exam_name; ?></td>
                         <td><?php echo $row->total_score; ?></td>
                        <td><?php echo $row->pass_score; ?></td>
                        <td><?php echo $row->duration; ?></td>
                        <td>
							<?php 
								$status = $row->status;
								if($status == 1){
									echo "<span style='color:green'>Available </span>";
									echo '<img src="resources/ico/tick.png" height="15px" alt="Applied">';
									}
								elseif ($status == 0){
									echo "<span style='color:red'>Unavailable </span>";
									echo '<img src="resources/ico/star_icon.png" height="15px" alt="Applied">';
									} 
                            ?>
                            
                        </td>
                        <td class="actBtns">
                        <a href="index.php?route=questions&option=setup&id=<?php echo $row->id; ?>" title="Question Setup"><img src="resources/ico/add_qs.png" alt="" /></a>
                        <a href="index.php?route=exams&option=update&id=<?php echo $row->id; ?>" title="Update"><img src="resources/ico/edit.png" alt="" /></a>
                        <a href="index.php?route=exams&option=delete&id=<?php echo $row->id; ?>" title="Delete"><img src="resources/ico/cross.png" alt="" /></a>
    
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











    





