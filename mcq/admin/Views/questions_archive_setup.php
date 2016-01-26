<?php
$id = $_GET["id"];
$query = "SELECT * FROM tbl_question_archive WHERE id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	$title = $_POST["title"];
	$date_used = $_POST["date_used"];
	$question = $_POST["date_end"];
	$status = $_POST["status"];
	
	$old_image =$_POST["old_image"];
	$old_name = $old_image;
	
	if(!empty($id))
	{
			$path = "../question_file/$old_image";
			unlink($path);
			
			$file_name = $old_name;
    		$filePath = "../question_file/" . $file_name;
	
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)){
			$query = "UPDATE tbl_question_archive
					  SET 
						title ='$title', 
						question = '$file_name', 
						date_used = '$date_used',  
						status = '$status'
						WHERE id= $id";
			$dbObj->doQuery($query);
		echo ("<script>window.location='index.php?route=oldquestions&option=setup&status=2';</script>");
		}
	}
	else
	{
		if(!empty($title))
		{
			 $file_name = rand(5,5468).basename($_FILES['file']['name']);
    		 $filePath = "../question_file/" . $file_name;
	
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)){
			$query = "INSERT INTO tbl_question_archive
					  SET 
						title ='$title', 
						question = '$file_name', 
						date_used = '$date_used',  
						status = '$status'
						";
			$dbObj->doQuery($query);
		 echo ("<script>window.location='index.php?route=oldquestions&option=setup&status=1';</script>");
		 }
		}
	}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Previous Exam Question</h2>
    </div>
    <div class="topic_details">
         <form action="" method="post" id="Signup_form" novalidate="novalidate" enctype="multipart/form-data">
         <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Old Question Added successfully!</p>';
					echo '</div>';
					sleep(2);
				 }
				
				else if($status == 2){
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_red">Old Question Updated successfully!</p>';
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
                    <td><label>Question Title:</label></td>
                    <td><input type="text" name="title" class="input_field" style="width:250px" value="<?php echo $row->title ?>"/></td>
                </tr>
                <tr>
                	<td><label>Season primarily used:</label></td>
                	<td><input type="text" name="date_used" class="input_field" style="width:220px" value="<?php echo $row->date_used ?>"/>
						<script type="text/javascript">
                            $(function(){
                                $('*[name=date_used]').appendDtpicker();
                            });
                        </script>
                    </td>
              	</tr>
                <tr>
                    <td><label>Question File:</label></td>
                    <td><input type="hidden" name="old_image" value="<?php echo $row->question; ?>" />
                    <input type="file" name="file" id="file" class="input_field" style="width:250px" multiple/>
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
            <h2>Previous Exam Question List</h2>
            <div class="user_list">
               <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr> 
                        <td width="30%"><label>Title</label></td>
                        <td width="20%"><label>Used Date</label></td>
                        <td width="15%"><label>Status</label></td>
                        <td width="15%"><label>Actions</label></td>
                    </tr>
                </thead>
                <tbody>
                
                    <?php $query = "SELECT * FROM tbl_question_archive";
					
                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->title; ?></td>
                        <td><?php $date = $row->date_used; 
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
                                <a href="index.php?route=oldquestions&option=update&id=<?php echo $row->id; ?>" title="Update"><img src="resources/ico/edit.png" alt="" /></a>
                                <a href="index.php?route=oldquestions&option=delete&id=<?php echo $row->id; ?>&img=<?php echo $row->question;?>" title="Delete"><img src="resources/ico/cross.png" alt="" /></a>   
    
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











    





