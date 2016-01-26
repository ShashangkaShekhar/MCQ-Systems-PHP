<?php
if($route != null)
{
	switch ($route)
	{ 
		case 'home':
			if($option == 'current'){
				require_once 'Views/Home.php';
			}

		break;

		case 'user':
			if($option == 'view'){
				require_once 'Views/user.php';
			}
			else if($option == 'setup')
			{
				require_once 'Views/user_setup.php';
			}
			else if($option == 'score')
			{
				require_once 'Views/user_score.php';
			}
            else if($option == 'anslog')
            {
                require_once 'Views/user_ans_log.php';
            }
			else if($option == 'update')
			{
				require_once 'Views/user_setup.php';
			}
			else if($option == 'delete')
			{
				$id = $_GET["id"];
				$query = "DELETE FROM tbl_user WHERE id=$id";
    			$dbObj->doQuery($query);
				
				$query_res = "DELETE FROM tbl_result WHERE id=$id";
    			$dbObj->doQuery($query_res);
				echo ("<script>window.location='index.php?route=user&option=view';</script>");
			}
		break;

		case 'subjects':
			if($option == 'view'){
				require_once 'Views/subjects.php';
			}
			else if($option == 'setup')
			{
				require_once 'Views/subject_setup.php';
			}
			else if($option == 'update')
			{
				require_once 'Views/subject_setup.php';
			}
			else if($option == 'delete')
			{
				$id = $_GET["id"];
				$query = "DELETE FROM tbl_subjects WHERE id=$id";
    			$dbObj->doQuery($query);
				echo ("<script>window.location='index.php?route=subjects&option=setup';</script>");
			}
		break;

		case 'exams':
			if($option == 'view'){
				require_once 'Views/exams.php';
			}
			else if($option == 'setup')
			{
				require_once 'Views/exams_setup.php';
			}
			else if($option == 'update')
			{
				require_once 'Views/exams_setup.php';
			}
			else if($option == 'delete')
			{
				$id = $_GET["id"];
				$query = "DELETE FROM tbl_exams WHERE id=$id";
    			$dbObj->doQuery($query);

                $query1 = "DELETE FROM tbl_questions WHERE exam_id=$id";
                $dbObj->doQuery($query1);

				echo ("<script>window.location='index.php?route=exams&option=setup';</script>");
			}

		break;

		case 'questions':
			if($option == 'view'){
				require_once 'Views/questions.php';
			}
			else if($option == 'setup')
			{
				require_once 'Views/questions_setup.php';
			}
			else if($option == 'update')
			{
				require_once 'Views/questions_setup_update.php';
			}
			else if($option == 'delete')
			{
				$ex_id = $_GET["exid"];
				$qs_id = $_GET["qid"];
				$query = "DELETE FROM tbl_questions WHERE id=$qs_id AND exam_id=$ex_id";
    			$dbObj->doQuery($query);
				echo ("<script>window.location='index.php?route=questions&option=setup&id=$ex_id';</script>");
			}
		break;
		
		case 'answer':
			if($option == 'view'){
				require_once 'Views/questions_ans_sestup.php';
			}
			else if($option == 'setup')
			{
				require_once 'Views/questions_ans_sestup.php';
			}
			else if($option == 'update')
			{
				require_once 'Views/questions_ans_sestup.php';
			}
			else if($option == 'delete')
			{
				$id = $_GET["id"];
				$query = "DELETE FROM tbl_question_answer WHERE id=$id";
    			$dbObj->doQuery($query);
				echo ("<script>window.location='index.php?route=answer&option=setup&id=$id';</script>");
			}
		break;
		
		case 'setting':
			if($option == 'change'){
				require_once 'Views/setting.php';
			}
		break;
		
		case 'contact':
			if($option == 'view'){
				require_once 'Views/contact.php';
			}
		break;
		
		case 'announcement':
			if($option == 'setup'){
				require_once 'Views/announcement_setup.php';
			}
			else if($option == 'update')
			{
				require_once 'Views/announcement_setup.php';
			}
			else if($option == 'delete')
			{
				$id = $_GET["id"];
				$query = "DELETE FROM tbl_exam_schedule WHERE id=$id";
    			$dbObj->doQuery($query);
				echo ("<script>window.location='index.php?route=announcement&option=setup&id=$id';</script>");
			}
		break;
		
		case 'help':
			if($option == 'view'){
				require_once 'Views/help.php';
			}
		break;
		
		case 'oldquestions':
			if($option == 'setup'){
				require_once 'Views/questions_archive_setup.php';
			}
			else if($option == 'view')
			{
				require_once 'Views/questions_archive_list.php';
			}
			else if($option == 'update')
			{
				require_once 'Views/questions_archive_setup.php';
			}
			else if($option == 'delete')
			{
				$id = $_GET["id"];
				
				$image = $_GET["img"];
				$path = "../question_file/$image";
				unlink($path);
					
					
				$query = "DELETE FROM tbl_question_archive WHERE id=$id";
    			$dbObj->doQuery($query);
				echo ("<script>window.location='index.php?route=oldquestions&option=setup';</script>");
			}
		break;
		
		case 'slider':
    			if($option == 'setup'){
    				require_once 'Views/slider_setup.php';
    			}
				else if($option == 'list'){
					require_once 'Views/slider_list.php';
				}
				else if($option == 'update'){
					require_once 'Views/slider_update.php';
				}
    			
    		break;
		
	
		default:
		break;
	}
}
else{    	       
	require_once 'Views/Home.php';
}
?>