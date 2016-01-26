<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>All Slider</h2>
    </div>
    <div class="topic_details">
         <div class="user_list">
              <table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
           <thead>
                <tr> 
                    <td width="60%"><label>Slider Images</label></td>
                    <td width="20%"><label>Status</label></td>
                    <td width="20%"><label>Actions</label></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tbl_slider ORDER BY slider_id DESC";
                $result= $dbObj->doQuery($query);
                while ($row = $dbObj->fetchObject($result)){
                ?>   
                <tr>
                    <td align="center">
                        <a href="../sliderengine/images/<?php echo $row->image_path; ?>"
                         title="" rel="lightbox"><img src="../sliderengine/images/<?php echo $row->image_path; ?>" width="250px;" alt="" /></a></td>  
                    </td>
                    <td>
                        <?php 
                            $status = $row->status;
							
							if($status == 1){
                                echo '<img src="resources/ico/correct.png" title="Active" height="15px" alt="Active">';
                            }
                            else{
                                echo '<img src="resources/ico/incorrect.png" title="Inactive" height="15px" alt="Inactive">';
                            }
                        ?>
                    
                    </td>
                    <td class="actBtns">
                <a href="index.php?route=slider&option=update&id=<?php echo $row->slider_id; ?>" title="Update" class="tipS"><img src="resources/ico/edit.png" alt="" /></a>
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











    





