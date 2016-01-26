<?php
	$query = "SELECT 
	TES.id,
	TE.exam_name,
	TES.text,
	TES.start_time,
	TES.end_time,
	TES.status
	
	FROM tbl_exam_schedule AS TES 
	INNER JOIN tbl_exams AS TE 
	ON TE.id = TES.exam_id WHERE TES.status = '1' ORDER BY TES.id DESC";
	$result_anc= $dbObj->doQuery($query);

?>

<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Welcome to MCQ System</h2>
        
    </div>
    <ul id="js-news" class="js-hidden">
		<?php while ($row = $dbObj->fetchObject($result_anc)){?>
			<li class="news-item"><?php echo $row->exam_name; ?><?php echo $row->text; ?>
            <?php $date = $row->start_time; $date = date_create($date); 
			echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?></li>
        <?php }?>  
	</ul><div class="clear">
</div>
    <div class="topic_details">
        <p>The best way to prepare for multiple choice question exams is to practice MCQs. Students MCQ System is the best software tool for writing, collecting and practicing MCQs.</p>
        <div class="home_sec_ad">
            <ul class="home_sec_ad_listyle">
                <li>Prepare Question Online</li>
                <li>Automatic Result Publish</li>
                <li>100% Accurate Result</li>
                <li>Easy Installation Process</li>
            </ul>
        </div>
    </div>
</div>
<div class="clear">
</div>

