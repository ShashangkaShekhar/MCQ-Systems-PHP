<?php
$exam_id = $_GET["exid"];
$qs_id = $_GET["qid"];

$query = "SELECT * FROM tbl_questions WHERE exam_id = $exam_id AND id ='$qs_id' ";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	$question_name = $_POST["question_name"];
	
	$correct_ans = $_POST["correct_ans"];
	$answer_1 = $_POST["answer_text_1"];
	$answer_2 = $_POST["answer_text_2"];
	$answer_3 = $_POST["answer_text_3"];
	$answer_4 = $_POST["answer_text_4"];
	
	$marks = $_POST["marks"];
	$status = $_POST["status"];
	
	if(!empty($exam_id))
		{
		$query = "UPDATE tbl_questions
					  SET 
						question_name = '$question_name',
						answer = '$correct_ans',
						answer1 = '$answer_1',
						answer2 = '$answer_2',
						answer3 = '$answer_3',
						answer4 = '$answer_4',
						marks = '$marks', 
						status = '$status' 
						WHERE exam_id = $exam_id  AND id ='$qs_id'";
		$dbObj->doQuery($query);
		$row_last_id = mysql_insert_id();
		echo ("<script>window.location='index.php?route=questions&option=setup&id=$exam_id&status=2';</script>");
		}
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Questions Setup</h2>
    </div>
    <div class="topic_details">
     <form action="" method="post" id="Signup_form" novalidate="novalidate">
         <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					 
					echo '<div class="lbltext">';
						echo '<img src="resources/ico/tick.png">';
						echo '<p class="color_green">Question Added successfully!</p>';
					echo '</div>';
					echo $row_last_id;
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
                    <td><label>Question Name:</label></td>
                    <td><textarea name="question_name" class="input_field"  style="width:485px">
					<?php echo $row->question_name ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Marks:</label></td>
                    <td><input type="text" name="marks" class="input_field" style="width:250px" value="<?php echo $row->marks ?>"/></td>
                </tr>
                <tr>
                	<td><label>Status:</label></td>
                	<td>
                        <select name="status" id="status" class="input_field" style="width:165px" >
                         <option value="1">Active</option>
                         <option value="0">Inactive</option>
                        </select>
                    </td>
              	</tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr> 
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
             <h2>Set Answer</h2>
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label style="color:#F00">Set Correct Answer:</label></td>
                    <td><select name="correct_ans" id="correct_ans" class="input_field" style="width:82%" >
                         <option value="1">Answer 1</option>
                         <option value="2">Answer 2</option>
                         <option value="3">Answer 3</option>
                         <option value="4">Answer 4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                </tr> 
                <tr>
                    <td><label>Answer - 1:</label></td>
                    <td><textarea name="answer_text_1" class="input_field" id="answer_text_1"  style="width:485px">
                    <?php echo $row->answer1 ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Answer - 2:</label></td>
                    <td><textarea name="answer_text_2" class="input_field" id="answer_text_2"  style="width:485px">
                    <?php echo $row->answer2 ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Answer - 3:</label></td>
                    <td><textarea name="answer_text_3" class="input_field" id="answer_text_3"  style="width:485px">
                    <?php echo $row->answer3 ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Answer - 4:</label></td>
                    <td><textarea name="answer_text_4" class="input_field" id="answer_text_4"  style="width:485px">
                    <?php echo $row->answer4 ?></textarea></td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr> 
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/>
                    <input type="submit" class="my_input_button icon_reset" name="sub" value="Reset" style="width:130px"/>
                </td>
                </tr> 
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
           </form> 
    </div>
</div>
<div class="clear">
</div>











    





