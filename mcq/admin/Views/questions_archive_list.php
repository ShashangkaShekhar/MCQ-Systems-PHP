<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Previous Exam Question List</h2>
    </div>
    <div class="topic_details">
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











    





