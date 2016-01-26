<?php 
	$user_id = $_GET["id"];
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Users Score</h2>
    </div>
    <div class="topic_details">
         <div class="user_list">
         <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr> 
                        <td width="35%"><label>Exam Name</label></td>
                        <td width="5%"><label>Correct</label></td>
                        <td width="5%"><label>Wrong</label></td>
                        <td width="5%"><label>Unans</label></td>
                        <td width="5%"><label>Score</label></td>
                        <td width="20%"><label>Start Time</label></td>
                        <td width="20%"><label>End Time</label></td>
                        <td width="5%"><label>Action</label></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT 
					TRS.id,
					TRS.exam_id,
					TE.exam_name,
					TRS.right_answer,
					TRS.wrong_answer,
					TRS.unanswered,
					TRS.score,
					TRS.start_time,
					TRS.post_time
					
					FROM tbl_result AS TRS 
					INNER JOIN tbl_exams AS TE 
					ON TE.id = TRS.exam_id  
					
					WHERE TRS.user_id = '$user_id' ORDER BY TRS.id DESC";
					
					/*$query = "SELECT * FROM tbl_result 
					WHERE user_id = '$user_id' ORDER BY id DESC";*/


                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td><?php echo $row->exam_name; ?></td>
                        <td><?php echo $row->right_answer; ?></td>
                        <td><?php echo $row->wrong_answer; ?></td>
                        <td><?php echo $row->unanswered; ?></td>
                        <td><?php echo $row->score; ?></td>
                        <td><?php $date = $row->start_time; 
									$date = date_create($date); 
									echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?></td>
                        <td><?php $date = $row->post_time; 
									$date = date_create($date); 
									echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?></td>

                        <td class="actBtns">
                            <a href="index.php?route=user&option=anslog&uid=<?php echo $user_id; ?>&exid=<?php echo $row->exam_id; ?>" title="Answer Log"><img src="resources/ico/search.png" alt="" /></a>

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











    





