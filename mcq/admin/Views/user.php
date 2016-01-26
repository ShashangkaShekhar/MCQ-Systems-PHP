<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Users View</h2>
    </div>
    <div class="topic_details">
         <div class="user_list">
              <!-------------------------pagination --------->
                <?php
                  $query = mysql_query("SELECT * FROM tbl_user");
                  $total_rows = mysql_num_rows($query);
                
                  $per_page = 20;//number of results to shown per page 
                  $num_links = 5;// how many links you want to show
                  $total_rows = $total_rows; 
                  $cur_page = 1;// set default current page to 1
                  
                    if(isset($_GET['paging']))
                    {
                      $cur_page = $_GET['paging'];
                      $cur_page = ($cur_page < 1)? 1 : $cur_page;//if page no. in url is less then 1 or -ve
                    }
                    $offset = ($cur_page-1)*$per_page; //setting offset
                    $pages = ceil($total_rows/$per_page);// no of page to be created
                    $start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
                    $end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
                    $res = mysql_query("SELECT * FROM tbl_user LIMIT ".$per_page." OFFSET ".$offset);
                ?>
                <!-------------------------pagination --------->
                <?php
                include("pagination.php"); 
                ?>
                <?php
                if(isset($res))
                {	//creating table
                    $date = date_create($result[dop]);
                    
                            echo '<table width="100%" border="0" cellspacing="1" cellpadding="3" >
                           <thead>
                                <tr> 
									<td width="40%"><label>Email</label></td>
                                    <td width="30%"><label>User Name</label></td>
									<td width="15%"><label>Status</label></td>
                                    <td width="15%"><label>Options</label></td>
                                </tr>
                            </thead>';
                            echo '<tbody>';
                            while($result = mysql_fetch_assoc($res))
                            {
                            ?>   
                            <tr>
                             	<td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td>
                                    <?php 
                                        $status = $result['status']; 
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
                                <a href="index.php?route=user&option=score&id=<?php echo $result['id']; ?>" title="Score"><img src="resources/ico/score.png" alt="" /></a>
                                <a href="index.php?route=user&option=update&id=<?php echo $result['id']; ?>" title="Update"><img src="resources/ico/edit.png" alt="" /></a>
                                <a href="index.php?route=user&option=delete&id=<?php echo $result['id']; ?>" title="Delete"><img src="resources/ico/cross.png" alt="" /></a>   
                                </td>
                            </tr>
                            <?php 
                            } 
                         echo '</tbody>';
                         echo '</table>';
                        }
                     ?>
                    <?php
                    include("pagination.php"); 
                    ?>
            </div>
 
    </div>
</div>
<div class="clear">
</div>











    





