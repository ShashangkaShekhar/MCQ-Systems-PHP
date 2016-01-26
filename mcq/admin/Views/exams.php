<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Exams</h2>
    </div>
    <div class="topic_details">
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











    





