<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Subjects</h2>
    </div>
    <div class="topic_details">
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











    





