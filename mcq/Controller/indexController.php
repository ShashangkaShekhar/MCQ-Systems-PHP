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

		case 'admission':
			if($option == 'view'){
				require_once 'Views/admission.php';
			}
			else if($option == 'process'){
				require_once 'Views/admission.php';
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