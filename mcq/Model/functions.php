<?php 
$garbage_timeout = 3600; // 3600 seconds = 60 minutes = 1 hour
ini_set('session.gc_maxlifetime', $garbage_timeout);

//session_start();

//-------------------------------------
$today=date('Y-m-d');
$Date = date("d/m/Y - H:i - a");

//----- GET IP Address-------------------

function userIP()
{
	$userIP = $_SERVER['HTTP_X_FORWARDED_FOR']; 
	if($userIP == "")
	{
		$userIP = $_SERVER['REMOTE_ADDR'];
	}
	//echo $userIP; exit;		
	// return the IP we've figured out:
	return $userIP;
	
}

//-------- DB Connect --------------

$thishost="localhost";		
$dbuser="sa";		
$dbpassword="sa@12345";		
$database="dbMCQ";

//-------- Local DB Connect --------------

$thishost="localhost";		
$dbuser="sa";		
$dbpassword="sa@12345";		
$database="dbMCQ";

$conn=mysql_connect($thishost,$dbuser,$dbpassword);

mysql_select_db($database) or die( "Unable to select database".mysql_error());

//----------------------------------

//----- email_verifier   ---------
function email_verifier($email)
{
	if(verify_email($email))
	{
		// E-mail address looks to be in the proper format
		// lets check the MX records
	
		if(verify_email_dns($email)){
	
			// E-mail passed both checks
		   // echo 'Success - E-mail address appears to be valid.';
	
		} else {
	
			// E-mail is invalid, no MC record        
			echo ("<script>alert('Error - E-mail domain does not have an MX record.');</script>");
			echo ("<script>top.window.location='post_cv.php';</script>");
			exit;
		}
	
	} else {
	
		// E-mail inst formatted correctly
		// so we don't even check its MX record
		
		echo ("<script>alert('Error - E-mail address appears to be invalid.');</script>");
		echo ("<script>top.window.location='post_cv.php';</script>");
		exit;
	}

}


// Our function to filter our bogus formatted addresses
function verify_email($email){

    if(!preg_match('/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/',$email)){
        return 0;
    } else {
        return 1;
    }
}


// Our function to verify the MX records
function verify_email_dns($email){

    // This will split the email into its front
    // and back (the domain) portions
    list($name, $domain) = explode('@',$email);

    if(!checkdnsrr($domain,'MX')){

        // No MX record found
        return 0;

    } else {

        // MX record found, return email
        return 1;

    }
}



//-------- Current URL With Page----------------
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}



//-------- Current Page----------------
function curPageName() 
{
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
	// store current url to get there again after login
$_SESSION['CPg']=curPageURL();
	
//echo curPageURL();
//echo " <br>The current page name is ".curPageName();
$cur_url='';
$full_url=explode("/",curPageURL());
for($i=0; $i<count($full_url)-1; $i++)
{
	$cur_url.=$full_url[$i]."/";
}



//----------- Count Words in string
function count_word($str)
{
	$Arr=@explode(" ",$str);
	$Arr = count($Arr)-1;
	return $Arr;
}


//----- reducing image quality.-------
function reduceImage($img, $imgPath, $prefix, $quality)
{	
	//$quality=20; // 100=best, 0=dull
	$original = imagecreatefromjpeg("$img") or die("Error Opening original (<em>$img</em>)");
	list($width, $height, $type, $attr) = getimagesize("$img");
	
	// Resample the image.
	$tempImg = imagecreatetruecolor($width, $height) or die("Cant create temp image");
	imagecopyresized($tempImg, $original, 0, 0, 0, 0, $width, $height, $width, $height) or die("Cant resize copy");
	
	// Create the new file name.
	$newNameE = explode("/", $img);
	$filename_pos=count($newNameE)-1;
	$newName = $prefix.$newNameE[$filename_pos];
	
	// Save the image.
	imagejpeg($tempImg, "$imgPath/$newName", $quality) or die("Cant save image");
	
	imagedestroy($tempImg);
	return true;
}


//---------------------------------
function monthName($theMonth)
{
	if($theMonth=='01')
		return 'January';
	elseif($theMonth=='02')
		return 'February';
	elseif($theMonth=='03')
		return 'March';
	elseif($theMonth=='04')
		return 'April';
	elseif($theMonth=='05')
		return 'May';
	elseif($theMonth=='06')
		return 'June';
	elseif($theMonth=='07')
		return 'July';
	elseif($theMonth=='08')
		return 'August';
	elseif($theMonth=='09')
		return 'September';
	elseif($theMonth=='10')
		return 'October';
	elseif($theMonth=='11')
		return 'November';
	else
		return 'December';
}
function BanglaMonth($MonthVal)
{
	 $theMonth= intval($MonthVal);
	// echo $TheMonth."<br>";
	if($theMonth==1)
		return '&#2460;&#2494;&#2472;&#2497;&#2527;&#2494;&#2480;&#2495;';
	elseif($theMonth==2)
		return '&#2475;&#2503;&#2476;&#2509;&#2480;&#2497;&#2527;&#2494;&#2480;&#2495;';
	elseif($theMonth==3)
		return '&#2478;&#2494;&#2480;&#2509;&#2458;';
	elseif($theMonth==4)
		return '&#2447;&#2474;&#2509;&#2480;&#2495;&#2482;';
	elseif($theMonth==5)
		return '&#2478;&#2503;';
	elseif($theMonth==6)
		return '&#2460;&#2497;&#2472;';
	elseif($theMonth==7)
		return '&#2460;&#2497;&#2482;&#2494;&#2439;';
	elseif($theMonth==8)
		return '&#2438;&#2455;&#2488;&#2509;&#2463;';
	elseif($theMonth==9)
		return '&#2488;&#2503;&#2474;&#2509;&#2463;&#2503;&#2478;&#2509;&#2476;&#2480;';
	elseif($theMonth==10)
		return '&#2437;&#2453;&#2509;&#2463;&#2507;&#2476;&#2480;';
	elseif($theMonth==11)
		return '&#2472;&#2477;&#2503;&#2478;&#2509;&#2476;&#2480;';
	elseif($theMonth==12)
		return '&#2465;&#2495;&#2488;&#2503;&#2478;&#2509;&#2476;&#2480;';

}

//echo $today." / ". BanglaMonth("06");

// Bangla date
function BanglaNum($string)
{
	//Encoding method is not necessary for the area between 0x00 and 0xFF
	$encoding = "ISO-8859-1";
	$convmap = array(0x0030, 0x0039,  0x09B6, 0xFFFF);
	//For prototype visit at http://www.php.net/manual/en/function.mb-encode-numericentity.php
	$cstring = mb_encode_numericentity($string, $convmap, $encoding); 
	return $cstring; 
}
// display today's bangla date
function todaysdate_bn($givendate) 
{
	//echo date('Y-m-d');
	$parts=@explode("-",$givendate);
	//echo BanglaNum($parts[2]."/".$parts[1]."/".$parts[0])." &#2468;&#2494;&#2480;&#2495;&#2454; ";
	echo BanglaMonth($parts[1])." ". BanglaNum($parts[2].", ".$parts[0]);
}
function todaysdate_en($givendate) 
{
	//echo date('Y-m-d');
	$parts=@explode("-",$givendate);
	//echo BanglaNum($parts[2]."/".$parts[1]."/".$parts[0])." &#2468;&#2494;&#2480;&#2495;&#2454; ";
	echo monthName($parts[1])." ". $parts[2].", ".$parts[0];
}


// display bangla date with time
function Date_bn($thedate) 
{
	//echo date("d/m/Y - H:i");
	$sections=@explode("-",$thedate);
	//print_r($sections);
	$parts1=@explode("/",$sections[0]);
	echo BanglaMonth($parts1[1])." ". BanglaNum($parts1[0].", ".$parts1[2]);
	if(trim($sections[2])=="am")
		echo " &#2488;&#2453;&#2494;&#2482; ";
	elseif(trim($sections[2])=="pm")
		echo " &#2476;&#2495;&#2453;&#2494;&#2482; ";
	$parts2=@explode(":",$sections[1]);
	echo " - ".BanglaNum($parts2[0].":".$parts2[1]);	
}





//-- -----------------------------------Pagination Script ---------------------------------------------------


function Paging($Ptable, $Pquery, $Psql, $PLimit)
{
//echo $Ptable,"<br>", $Pquery,"<br>", $PLimit,"<br>";
$tbl_name=$Ptable;		//your table name
// How many adjacent pages should be shown on each side?
$adjacents =2;

/* 
   First get total number of rows in data table. 
   If you have a WHERE clause in your query, make sure you mirror it here.
*/

$query = $Pquery;
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];

/* Setup vars for query. */
$targetpage = curPageName(); 	//your file name  (the name of this file)
$limit = $PLimit; //how many items to show per page

$page = $_GET['page'];
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;								//if no page var is given, set start to 0

/* Get data. */
$sql = $Psql;
$sql.=" LIMIT $start, $limit";
//echo $sql;
$Presult = $sql;
$P_ret_val=$Presult;
/* Setup page vars for display. */
if ($page == 0) $page = 1;					//if no page var is given, default to 1.
$prev = $page - 1;							//previous page is page - 1
$next = $page + 1;							//next page is page + 1
$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;						//last page minus 1

/* 
	Now we apply our rules and draw the pagination object. 
	We're actually saving the code to a variable in case we want to draw it more than once.
*/
$pagination = "";
$pagination2 = "";
if($lastpage > 1)
{	
	$pagination .= "<div class=\"pagination\">";
	//previous button
	if ($page > 1) 
		$pagination2.= "<a href=\"$targetpage?page=$prev\"> &nbsp;&laquo;  </a>";//previous
	else
		$pagination2.= "<span class=\"disabled\"> &nbsp;&laquo;  </span>";	//previous
	
	//pages	
	if ($lastpage <5 + ($adjacents * 2))	//not enough pages to bother breaking it up
	{	
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
			if ($counter == $page)
				$pagination.= "<span class=\"current\">".$counter.",</span>";
			else
				$pagination.= "<a href=\"$targetpage?page=$counter\">".$counter.",</a>";					
		}
	}
	elseif($lastpage >5+ ($adjacents * 2))	//enough pages to hide some
	{
		//close to beginning; only hide later pages
		if($page < 1 + ($adjacents * 2))		
		{
			for ($counter = 1; $counter < 3 + ($adjacents * 2); $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">".$counter.",</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">".$counter.",</a>";					
			}
			$pagination.= "..";
			$pagination.= "<a href=\"$targetpage?page=$lpm1\">".BanglaNum($lpm1).",</a>";
			$pagination.= "<a href=\"$targetpage?page=$lastpage\">".BanglaNum($lastpage).",</a>";		
		}
		//in middle; hide some front and some back
		elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
		{
			$pagination.= "<a href=\"$targetpage?page=1\">".BanglaNum(1).",</a>";
			$pagination.= "<a href=\"$targetpage?page=2\">".BanglaNum(2).",</a>";
			$pagination.= "..";
			for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">".$counter.",</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">".$counter.",</a>";					
			}
			$pagination.= "..";
			$pagination.= "<a href=\"$targetpage?page=$lpm1\">".BanglaNum($lpm1).",</a>";
			$pagination.= "<a href=\"$targetpage?page=$lastpage\">".BanglaNum($lastpage).",</a>";		
		}
		//close to end; only hide early pages
		else
		{
			$pagination.= "<a href=\"$targetpage?page=1\">".BanglaNum(1).",</a>";
			$pagination.= "<a href=\"$targetpage?page=2\">".BanglaNum(2).",</a>";
			$pagination.= "..";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">".$counter.",</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">".$counter.",</a>";					
			}
		}
	}
	
	//next button
	if ($page < $counter - 1) 
	$pagination2.= "<a href=\"$targetpage?page=$next\">&nbsp; &raquo;</a>";//next
	else
		$pagination2.= "<span class=\"disabled\"> &nbsp; &raquo;</span>";//next
	$pagination.=$pagination2;
	$pagination.= "</div>\n";		
}
$P_ret_val.="^".$pagination;
 return $P_ret_val;
}



// ##############   Pagin Function ####################### 


function Pagings($Ptable, $Pquery, $Psql, $PLimit)
{
//echo $Ptable,"<br>", $Pquery,"<br>", $PLimit,"<br>";
$tbl_name=$Ptable;		//your table name
// How many adjacent pages should be shown on each side?
$adjacents =2;

/* 
   First get total number of rows in data table. 
   If you have a WHERE clause in your query, make sure you mirror it here.
*/

$query = $Pquery;
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];

/* Setup vars for query. */
$targetpage = curPageName(); 	//your file name  (the name of this file)
$limit = $PLimit; //how many items to show per page

$pages = $_GET['pages'];
if($pages) 
	$start = ($pages - 1) * $limit; 			//first item to display on this page
else
	$start = 0;								//if no page var is given, set start to 0

/* Get data. */
$sql = $Psql;
$sql.=" LIMIT $start, $limit";
//echo $sql;
$Presult = $sql;
$P_ret_val=$Presult;
/* Setup page vars for display. */
if ($pages == 0) $pagess = 1;					//if no pages var is given, default to 1.
$prev = $pages - 1;							//previous pages is pages - 1
$next = $pages + 1;							//next pages is pages + 1
$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;						//last page minus 1

/* 
	Now we apply our rules and draw the pagination object. 
	We're actually saving the code to a variable in case we want to draw it more than once.
*/
$pagination = "";
$pagination2 = "";
if($lastpage > 1)
{	
	$pagination .= "<div class=\"pagination\">";
	//previous button
	if ($pages > 1) 
		$pagination2.= "<a href=\"$targetpage?pages=$prev\"> &nbsp;&laquo;  </a>";//previous
	else
		$pagination2.= "<span class=\"disabled\"> &nbsp;&laquo;  </span>";	//previous
	
	//pages	
	if ($lastpage <5 + ($adjacents * 2))	//not enough pages to bother breaking it up
	{	
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
			if ($counter == $pages)
				$pagination.= "<span class=\"current\">".$counter.",</span>";
			else
				$pagination.= "<a href=\"$targetpage?pages=$counter\">".$counter.",</a>";					
		}
	}
	elseif($lastpage >5+ ($adjacents * 2))	//enough pages to hide some
	{
		//close to beginning; only hide later pages
		if($pages < 1 + ($adjacents * 2))		
		{
			for ($counter = 1; $counter < 3 + ($adjacents * 2); $counter++)
			{
				if ($counter == $pages)
					$pagination.= "<span class=\"current\">".$counter.",</span>";
				else
					$pagination.= "<a href=\"$targetpage?pages=$counter\">".$counter.",</a>";					
			}
			$pagination.= "..";
			$pagination.= "<a href=\"$targetpage?pages=$lpm1\">".BanglaNum($lpm1).",</a>";
			$pagination.= "<a href=\"$targetpage?pages=$lastpage\">".BanglaNum($lastpage).",</a>";		
		}
		//in middle; hide some front and some back
		elseif($lastpage - ($adjacents * 2) > $pages && $pages > ($adjacents * 2))
		{
			$pagination.= "<a href=\"$targetpage?pages=1\">".BanglaNum(1).",</a>";
			$pagination.= "<a href=\"$targetpage?pages=2\">".BanglaNum(2).",</a>";
			$pagination.= "..";
			for ($counter = $pages - $adjacents; $counter <= $pages + $adjacents; $counter++)
			{
				if ($counter == $pages)
					$pagination.= "<span class=\"current\">".$counter.",</span>";
				else
					$pagination.= "<a href=\"$targetpage?pages=$counter\">".$counter.",</a>";					
			}
			$pagination.= "..";
			$pagination.= "<a href=\"$targetpage?pages=$lpm1\">".BanglaNum($lpm1).",</a>";
			$pagination.= "<a href=\"$targetpage?pages=$lastpage\">".BanglaNum($lastpage).",</a>";		
		}
		//close to end; only hide early pages
		else
		{
			$pagination.= "<a href=\"$targetpage?pages=1\">".BanglaNum(1).",</a>";
			$pagination.= "<a href=\"$targetpage?pages=2\">".BanglaNum(2).",</a>";
			$pagination.= "..";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			{
				if ($counter == $pages)
					$pagination.= "<span class=\"current\">".$counter.",</span>";
				else
					$pagination.= "<a href=\"$targetpage?pages=$counter\">".$counter.",</a>";					
			}
		}
	}
	
	//next button
	if ($pages < $counter - 1) 
	$pagination2.= "<a href=\"$targetpage?pages=$next\">&nbsp; &raquo;</a>";//next
	else
		$pagination2.= "<span class=\"disabled\"> &nbsp; &raquo;</span>";//next
	$pagination.=$pagination2;
	$pagination.= "</div>\n";		
}
$P_ret_val.="^".$pagination;
 return $P_ret_val;
}



// ################### Paging Funtion For Special Url ######################33



function Pagingurl($Ptable, $Pquery, $Psql, $PLimit, $url)
{
//echo $Ptable,"<br>", $Pquery,"<br>", $PLimit,"<br>";
$tbl_name=$Ptable;		//your table name
// How many adjacent pages should be shown on each side?
$adjacents =2;

/* 
   First get total number of rows in data table. 
   If you have a WHERE clause in your query, make sure you mirror it here.
*/

$query = $Pquery;
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];

/* Setup vars for query. */
$targetpage = curPageName(); 	//your file name  (the name of this file)
$limit = $PLimit; //how many items to show per page

$pages = $_GET['pages'];
if($pages) 
	$start = ($pages - 1) * $limit; 			//first item to display on this page
else
	$start = 0;								//if no page var is given, set start to 0

/* Get data. */
$sql = $Psql;
$sql.=" LIMIT $start, $limit";
//echo $sql;
$Presult = $sql;
$P_ret_val=$Presult;
/* Setup page vars for display. */
if ($pages == 0) $pagess = 1;					//if no pages var is given, default to 1.
$prev = $pages - 1;							//previous pages is pages - 1
$next = $pages + 1;							//next pages is pages + 1
$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;						//last page minus 1

/* 
	Now we apply our rules and draw the pagination object. 
	We're actually saving the code to a variable in case we want to draw it more than once.
*/
$pagination = "";
$pagination2 = "";
if($lastpage > 1)
{	
	$pagination .= "<div class=\"pagination\">";
	//previous button
	if ($pages > 1) 
		$pagination2.= "<a href=\"$targetpage?$url&pages=$prev\">&laquo;&nbsp;Prev </a>";//previous
	else
		$pagination2.= "<span class=\"disabled\">&laquo;&nbsp;Prev </span>";	//previous
	
	//pages	
	$pagination.=$pagination2;
	if ($lastpage <5 + ($adjacents * 2))	//not enough pages to bother breaking it up
	{	
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
			if ($counter == $pages)
				$pagination.= "<span class=\"current\">".$counter." </span>";
			else
				$pagination.= "<a href=\"$targetpage?$url&pages=$counter\">".$counter." </a>";					
		}
	}
	elseif($lastpage >5+ ($adjacents * 2))	//enough pages to hide some
	{
		//close to beginning; only hide later pages
		if($pages < 1 + ($adjacents * 2))		
		{
			for ($counter = 1; $counter < 3 + ($adjacents * 2); $counter++)
			{
				if ($counter == $pages)
					$pagination.= "<span class=\"current\">".$counter."</span>";
				else
					$pagination.= "<a href=\"$targetpage?$url&pages=$counter\">".$counter."</a>";					
			}
			$pagination.= "..";
			//$pagination.= "<a href=\"$targetpage?$url&pages=$lpm1\">".BanglaNum($lpm1).",</a>";
			//$pagination.= "<a href=\"$targetpage?$url&pages=$lastpage\">".BanglaNum($lastpage).",</a>";		
		}
		//in middle; hide some front and some back
		elseif($lastpage - ($adjacents * 2) > $pages && $pages > ($adjacents * 2))
		{
			//$pagination.= "<a href=\"$targetpage?$url&pages=1\">".BanglaNum(1).",</a>";
			//$pagination.= "<a href=\"$targetpage?$url&pages=2\">".BanglaNum(2).",</a>";
			$pagination.= "..";
			for ($counter = $pages - $adjacents; $counter <= $pages + $adjacents; $counter++)
			{
				if ($counter == $pages)
					$pagination.= "<span class=\"current\">".$counter."</span>";
				else
					$pagination.= "<a href=\"$targetpage?$url&pages=$counter\">".$counter."</a>";					
			}
			$pagination.= "..";
			//$pagination.= "<a href=\"$targetpage?$url&pages=$lpm1\">".BanglaNum($lpm1).",</a>";
			//$pagination.= "<a href=\"$targetpage?$url&pages=$lastpage\">".BanglaNum($lastpage).",</a>";		
		}
		//close to end; only hide early pages
		else
		{
			//$pagination.= "<a href=\"$targetpage?$url&pages=1\">".BanglaNum(1).",</a>";
			//$pagination.= "<a href=\"$targetpage?$url&pages=2\">".BanglaNum(2).",</a>";
			$pagination.= "..";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			{
				if ($counter == $pages)
					$pagination.= "<span class=\"current\">".$counter."</span>";
				else
					$pagination.= "<a href=\"$targetpage?$url&pages=$counter\">".$counter."</a>";					
			}
		}
	}
	
	//next button
	if ($pages < $counter - 1) 
	$pagination2= "<a href=\"$targetpage?$url&pages=$next\"> Next&nbsp;&raquo;</a>";//next
	else
		$pagination2= "<span class=\"disabled\"> Next&nbsp;&raquo;</span>";//next
	$pagination.=$pagination2;
	$pagination.= "</div>\n";		
}
$P_ret_val.="^".$pagination;
 return $P_ret_val;
}
//-- -----------------------------------Pagination Script ---------------------------------------------------

?>