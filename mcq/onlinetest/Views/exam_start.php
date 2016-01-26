<?php
session_start();
$exam_id = $_GET["id"];
$query = "SELECT * FROM tbl_exams WHERE id = $exam_id ";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

function time_to_sec($time) {
    $hours = substr($time, 0, -6);
    $minutes = substr($time, -5, 2);
    $seconds = substr($time, -2);
    return $hours * 3600 + $minutes * 60 + $seconds;
}

$time_limit=time_to_sec($row->duration);
if(!isset($_SESSION["start_time"])){
	$_SESSION["start_time"] = mktime(date(G),date(i),date(s),date(m),date(d),date(Y)) + $time_limit;
	} // Add $time_limit (total time) to start time. And store into session variable.
if(!isset($_SESSION["load_time"])){
	date_default_timezone_set('Asia/Dhaka');
	$_SESSION["load_time"] = date("Y-m-d H:i:s a");
}
?>
<style>
#countdown {
	border:0px solid red;
	font-family:verdana;
	font-size:16pt;
	font-weight:bold;
	background: none;
	width:  90%;
	text-align: left;
	color:#000000;
	margin-bottom:10px;
	margin-left:15px;
}
</style>
<script>
function calculate_time()
{
	
 var end_time = "<?php echo $_SESSION["start_time"]; ?>"; // Get end time from session variable (total time in seconds).
 var dt = new Date(); // Create date object.
 var time_stamp = dt.getTime()/1000; // Get current minutes (converted to seconds).
 var total_time = end_time - Math.round(time_stamp); // Subtract current seconds from total seconds to get seconds remaining.

 var hours = Math.floor(total_time / (3600));
 var mins = Math.floor((total_time - (hours*3600)) / 60); // Extract minutes from seconds remaining. 
 var secs = total_time - (hours*3600) - (mins * 60); // Extract remainder seconds if any.
	
 if(secs < 10){
	 secs = "0" + secs;
	 } // Check if seconds are less than 10 and add a 0 in front.
	 document.getElementById("countdown").value = 
	 "You have " + hours + ":" + mins + ":" + secs + " Seconds to answer the questions!!" ; // Display remaining minutes and seconds.
  
  // Check for end of time, stop clock and display message.
	 if(mins <= 0)
	 {
	  if(secs <= 0 || mins < 0)
	  {
	   clearInterval(countdownTimer);
	   /*document.getElementById("countdown").value = "0:00";*/
	   document.exam.submit();
	   }
	  }
 }
 var countdownTimer = setInterval("calculate_time()",1000); // Start clock.
</script>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Exam: <?php echo $row->exam_name; ?> <b style="color:#F90">[Duration <?php echo $row->duration; ?>]</b></h2>
        <div class="timer_alt"><input id="countdown" readonly></div>
    </div>
    <br />
<div class="topic_details">
   <form name="exam" class="form-horizontal" role="form" id='myexam' method="post" action="index.php?route=exams&option=result&id=<?php echo $exam_id; ?>">
		<?php 
        $res = mysql_query("SELECT * FROM tbl_questions WHERE exam_id='$exam_id' ORDER BY id");
        $rows = mysql_num_rows($res);
        $i=1;
    while($result=mysql_fetch_array($res)){?>
        
        
        <?php if($i==1){?>  
               
        <div id='question<?php echo $i;?>' class='cont'>
            <div class='questions' id="qname<?php echo $i;?>">
				<p><?php echo 'Q - '.$i?>. </p><?php echo $result['question_name'];?></div>
            <ul class="ans_section">
                <li><input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer1'];?></label></li>
                
                <li><input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer2'];?></label></li>
                
                <li><input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer3'];?></label></li>
                
               <li><input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer4'];?></label></li>
                <br/>
            <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>  </ul>  
                                                                             
            <div class="ans_sub">
            <p style="color:#d2322d">To Continue. Click on Next Question.Otherwise Click on Finish Exam!</p>
            <button id='<?php echo $i;?>' class='next btn btn-success my_input_button' type='button'>Next Question</button>
            <button id='<?php echo $i;?>' class='next btn btn-success my_input_button' type='submit'>Finish Exam</button>
            </div>
        </div>     
          
        <?php }elseif($i<1 || $i<$rows){?>
         
        <div id='question<?php echo $i;?>' class='cont'>
            <div class='questions' id="qname<?php echo $i;?>">
				<p><?php echo 'Q - '.$i?>. </p><?php echo $result['question_name'];?></div>
            <ul class="ans_section">
                <li><input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer1'];?></label></li>
                
                <li><input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer2'];?></label></li>
                
                <li><input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer3'];?></label></li>
                
               <li><input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer4'];?></label></li>
                <br/>
            <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>  </ul> 
                                                                             
            <div class="ans_sub">
            <p style="color:#d2322d">To Continue. Click on Next Question.Otherwise Click on Finish Exam!</p>
            <!--<button id='<?php echo $i;?>' class='previous btn btn-success my_input_button' type='button'>Previous</button>  -->                  
            <button id='<?php echo $i;?>' class='next btn btn-success my_input_button' type='button' >Next Question</button>
            <button id='<?php echo $i;?>' class='next btn btn-success my_input_button' type='submit'>Finish Exam</button>
            </div>
        </div>
  
       <?php }elseif($i==$rows){?>
       
        <div id='question<?php echo $i;?>' class='cont'>
            <div class='questions' id="qname<?php echo $i;?>">
				<p><?php echo 'Q - '.$i?> .</p><?php echo $result['question_name'];?></div>
            <ul class="ans_section">
                <li><input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer1'];?></label></li>
                
                <li><input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer2'];?></label></li>
                
                <li><input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer3'];?></label></li>
                
               <li><input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <label for='radio1_<?php echo $result['id'];?>'><span><span></span></span><?php echo $result['answer4'];?></label></li>
                <br/>
            <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>  </ul> 
                                                                          
            <div class="ans_sub">
            <p style="color:#d2322d">No More Question,Click on Finish Exam to Submit Answer!</p>         
            <button id='<?php echo $i;?>' class='next btn btn-success my_input_button' type='submit'>Finish Exam</button>
            </div>
        </div>
        <?php } $i++;} ?>
        
    </form>

     <br /> <br /><br />   
     <style>
		.container {
		margin-top: 110px;
		}
		.error {
		color: #B94A48;
		}
		.form-horizontal {
		margin-bottom: 0px;
		}
		.hide{display: none;}
		</style>
		
		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		$('#question'+1).removeClass('hide');
		
		$(document).on('click','.next',function(){
		 last=parseInt($(this).attr('id'));     
		 nex=last+1;
		 $('#question'+last).addClass('hide');
		 
		 $('#question'+nex).removeClass('hide');
		});
		
		$(document).on('click','.previous',function(){
		 last=parseInt($(this).attr('id'));     
		 pre=last-1;
		 $('#question'+last).addClass('hide');
		 
		 $('#question'+pre).removeClass('hide');
		});
		
	</script>     
     </div>
    </div>
</div>
<div class="clear">
</div>