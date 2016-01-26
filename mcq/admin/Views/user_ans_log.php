<?php 
	$user_id = $_GET["uid"];
    $exam_id = $_GET["exid"];
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Users Answered</h2>
    </div>
    <div class="topic_details">
         <div class="user_list">
         <table width="100%" border="0" cellspacing="1" cellpadding="3" >
               <thead class="thead">
                    <tr>
                        <td width="70%"><label>Question</label></td>
                        <td width="10%"><label>Cr.Answer</label></td>
                        <td width="10%"><label>Answered</label></td>
                        <td width="10%"><label>Status</label></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT
					TANSL.id,
					TQ.question_name,
					TQ.answer,
					TANSL.question_id,
					TANSL.user_answer

					FROM tbl_ans_log AS TANSL
					INNER JOIN tbl_questions AS TQ
					ON TQ.id = TANSL.question_id

					WHERE TANSL.user_id = '$user_id' AND TANSL.exam_id = $exam_id ORDER BY TANSL.id ASC";

					/*$query = "SELECT * FROM tbl_result 
					WHERE user_id = '$user_id' ORDER BY id DESC";*/


                    $result= $dbObj->doQuery($query);
                    while ($row = $dbObj->fetchObject($result)){
                    ?>   
                    <tr>
                        <td style="position:relative"><?php echo $row->question_name; ?></td>
                        <td><?php echo $row->answer; ?></td>
                        <td style="text-align:center ">
                            <?php
                            $user_answer = $row->user_answer;
                            if($user_answer == 5){
                                echo '<img src="resources/ico/skip.png" title="Skipped" height="15px" alt="Applied">';

                            }
                            else{
                                echo $row->user_answer;
                            }

                            ?></td>
                        <td style="text-align:center ">
                            <?php

                            $user_answer = $row->user_answer;
                            $answer = $row->answer;
                            if($answer == $user_answer){
                                echo '<img src="resources/ico/correct.png" title="Correct" height="15px" alt="Applied">';
                            }
                            else{
                                echo '<img src="resources/ico/incorrect.png" title="InCorrect" height="15px" alt="Applied">';
                            }

                        ?></td>
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











    





