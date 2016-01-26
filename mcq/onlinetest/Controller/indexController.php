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


		case 'exams':
			if($option == 'view'){
				require_once 'Views/exams.php';
			}
			else if($option == 'start'){
				require_once 'Views/exam_start.php';
			}
			/*else if($option == 'finish'){
				require_once 'Views/exam_finish.php';
			}*/
			else if($option == 'result'){
				require_once 'Views/exam_result.php';
			}
		break;

		case 'contact':
			if($option == 'view'){
				require_once 'Views/contact.php';
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