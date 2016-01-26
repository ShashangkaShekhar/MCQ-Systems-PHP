<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Exams List</h2>
    </div>
    <div class="topic_details">
       <div class="user_list">
               <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr> 
                        <td width="25%"><label>Exam Name</label></td>
                        <td width="45%"><label>Exam Syllabus</label></td>
                        <td width="10%"><label>Duration</label></td>
                        <td width="15%"><label>Actions</label></td>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
					//TE = tbl_exams //TS = tbl_subjects
                    $query = "SELECT TE.id, TS.subject_name ,TE.exam_name, TE.exam_syllabus, TE.total_score, TE.pass_score,TE.duration,TE.status
					FROM 
						tbl_exams AS TE 
					INNER JOIN 
						tbl_subjects AS TS
					ON TS.id = TE.subject_id WHERE TE.status = 1;";
					
                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->exam_name; ?></td>
                        <td><?php echo $row->exam_syllabus; ?></td>
                        <td><?php echo $row->duration; ?></td>
                        
                        <td class="actBtns">
                        <a href="index.php?route=exams&option=start&id=<?php echo $row->id; ?>" title="Exam" class="exam_button">Take Now</a>
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











    





