<?php
$exam_id = $_GET["id"];

date_default_timezone_set('Asia/Dhaka');
$exam_end = date("Y-m-d H:i:s a");

if(!empty($_SESSION["user_name"]))
	{
        $user_id = $_SESSION["user_id"];
        $name = $_SESSION["user_name"];
        $exam_start = $_SESSION["load_time"];

        $checkQuery = "SELECT id FROM tbl_result WHERE user_id = '$user_id' AND exam_id = '$exam_id' LIMIT 1";
        $chk_result = $dbObj->doQuery($checkQuery);
        $num_row = $dbObj->numRows($chk_result);
        if($num_row>0){
            session_start();
            session_destroy();
            echo "<script type='text/javascript'>alert('Multiple Exam Session is Restricted!');</script>";
            echo '<script> window.location = "../index.php"; </script>';
        }
        else{
            $right_answer=0;
            $wrong_answer=0;
            $unanswered=0;
            $total_marks=0;

            $keys=array_keys($_POST);
            $order=join(",",$keys);

            $response=mysql_query("select id,marks,answer FROM tbl_questions WHERE exam_id='$exam_id'");
            while($result=mysql_fetch_array($response)){
                if($result['answer'] == $_POST[$result['id']]){
                    $total_marks += $result['marks'];
                    $right_answer++;
                }
                else if($_POST[$result['id']] == 5){
                    $unanswered++;
                }
                else{
                    $wrong_answer++;
                }

                $question_id = $result['id'];
                $user_answer = $_POST[$result['id']];

                /*echo 'Exam:'.$exam_id.':'.$qs_id.':'.$user_answer.'';*/
                $ans_log = $exam_id.':'.$question_id.':'.$user_answer;
                mysql_query("INSERT INTO tbl_ans_log
                                    SET user_id ='$user_id',
                                    exam_id ='$exam_id',
                                    question_id ='$question_id',
                                    user_answer ='$user_answer',
                                    ans_log = '$ans_log'");

            }

            mysql_query("INSERT INTO tbl_result SET
                                user_id ='$user_id',
                                exam_id = '$exam_id',
                                right_answer='$right_answer',
                                unanswered='$unanswered',
                                wrong_answer='$wrong_answer',
                                score='$total_marks',
                                start_time='$exam_start',
                                post_time = '$exam_end'");

            session_start();
            session_destroy();
            echo "<script type='text/javascript'>alert('Exam Finished Successfully!');</script>";
            echo '<script> window.location = "../index.php"; </script>';
        }

	}

?>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Exam result for <?php if(!empty($_SESSION["user_name"]))
		{
		echo $_SESSION["user_name"];
		}?>
        </h2>
    </div>
    <div class="topic_details">
		<div>
		<p>Total no. of Right answers : <span class="answer"><?php echo $right_answer;?></span></p>
		<p>Total no. of Wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
		<p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p>   
        <hr />
        <p>Total Marks: <span class="answer"><?php echo $total_marks;?></span></p>                
		</div> 
	</div>
<div class="clear">
</div>


