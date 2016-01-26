<?php
	error_reporting(0);
	session_start();
	$route = $_GET["route"];
	$option = $_GET["option"];
    require_once 'Model/dbclass.php';
    $dbObj = new Model_DBClass();
	
	if(!isset($_SESSION["admin_name"]))
	{
		header("Location: login.php");
	}
	else
	{
		$admin_name = $_SESSION["admin_name"];
	}
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="Be Enlightened with Accounting Intelligence" />
    <meta name="robots" content="default, follow" />
    <meta name="author" content="Administrator" />
    <meta name="googlebot" content="noodp" />
    <meta name="application-name" content=">Accounting Gurubd" />
    <title>Admin Panel || MCQ System</title>
    <link rel="Shortcut Icon" href="#" />
    <!--======================menu link start========================-->
    <link href="Style/global_style.css" rel="stylesheet" type="text/css" />
    <link href="Style/layout_style.css" rel="stylesheet" type="text/css" />
    <link href="Style/font.css" rel="stylesheet" type="text/css" />
    <link href="Style/default_style.css" rel="stylesheet" type="text/css" />
    <!--======================menu link start========================-->
    <link rel="stylesheet" type="text/css" href="menu/ddsmoothmenu.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="menu/ddsmoothmenu.js"></script>
    <script type="text/javascript">
        ddsmoothmenu.init({ mainmenuid: "smoothmenu1", orientation: 'h', classname: 'ddsmoothmenu', contentsource: "markup" })
    </script>
    <!--=====================menu link End==========================-->

    <script type="text/javascript" src="v_menu/ddaccordion.js"></script>
    <script type="text/javascript" src="v_menu/ddmenu.js"></script>
    <link href="v_menu/ddmenu_style.css" rel="stylesheet" type="text/css" />
    <!-- editor -->
    <!--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">
	bkLib.onDomLoaded(nicEditors.allTextAreas);
	bkLib.onDomLoaded(function() {
          var myNicEditor = new nicEditor();
          myNicEditor.setPanel('myNicPanel');
          myNicEditor.addInstance('myInstance1');
     });
    </script>-->
    <script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript">
        tinyMCE.init({
            // General options
            mode: "textareas",
            theme: "advanced",
            plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,gsynuhimgupload,paste",
            theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
            paste_auto_cleanup_on_paste : true,
            content_css : "css/custom_content.css",
            theme_advanced_font_sizes: "10px,11px,12px,13px,14px,16px,18px,20px,25px,30px,35px",
            font_size_style_values : "10px,11px,12px,13px,14px,16px,18px,20px,25px,30px,35px",
            theme_advanced_blockformats : "p,address,pre,div,h1,h2,h3,h4,h5,h6,blockquote,dt,dd,code,samp",
            
            
            // Theme options
	        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect,removeformat,cleanup",
	        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,gsynuhimgupload,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen,insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	        theme_advanced_buttons4 : "",
	        theme_advanced_toolbar_location : "top",
	        theme_advanced_toolbar_align : "left",
	        theme_advanced_statusbar_location : "bottom",
            plugin_insertdate_dateFormat : "%Y-%m-%d",
            plugin_insertdate_timeFormat : "%H:%M:%S",
	        theme_advanced_resizing : true,
            theme_advanced_disable : "help,styleselect",
	        skin : "o2k7",
	        skin_variant : "silver",

           
        });

    </script>
						
    <!-- editor -->
    
    <!--Datepicker -->
    <script type="text/javascript" src="datetime_picker/jquery.simple-dtpicker.js"></script>
    <link type="text/css" href="datetime_picker/jquery.simple-dtpicker.css" rel="stylesheet" />
    <!--Datepicker -->
</head>
<body id="page">
    <!------------------------------container Section------------------------------->
    <div id="container">

        <!------------------------------Header Section------------------------------->
        <div id="header">
            <div class="header_box">
                <div class="">
                    <a href="index.php?route=home&option=current" title="Home">
                            <h3>MCQ System<h3/>
                    </a>
                </div>
                <div class="top_text"></div>
              
                <div class="site_login">
                   <p>Hello! <span style="color:#C30;font-weight:900">
				   <?php echo $admin_name; ?></span> | Status: <?php if($_SESSION["status"] == 1){echo 'active';}
                else{echo 'inactive';} ?> | <a href="logout.php" title="">Logout</a></p>
                  </div>
            </div>
        </div>
        <!------------------------------Header Section------------------------------->
        <!------------------------------navigation Section------------------------------->
        <div id="navigation">
            <div class="navigation_box">
                <div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                        <li><a href="index.php?route=home&option=current" title="Home Page">
                        	<img src="menu/link.gif"/></a></li>
                        <li><a href="#" title="">User</a>
                            <ul>
                                <li><a href="index.php?route=user&option=setup" title="">User Add</a></li> 
                                <li><a href="index.php?route=user&option=view" title="">User List</a></li> 
                            </ul>
                        </li> 
                        <li><a href="#" title="">Subjects</a>
                            <ul>
                                <li><a href="index.php?route=subjects&option=setup" title="">Subjects Add</a></li> 
                                <li><a href="index.php?route=subjects&option=view" title="">Subjects List</a></li> 
                            </ul>
                        </li> 
                        <li><a href="index.php?route=exams&option=view" title="">Exams</a>
                        	<ul>
                                <li><a href="index.php?route=exams&option=setup" title="">Exams Add</a></li> 
                                <li><a href="index.php?route=exams&option=view" title="">Exams List</a></li> 
                                <li><a href="index.php?route=announcement&option=setup" title="">Exams Announcement</a></li>
                            </ul>
                        </li> 
                        <li><a href="index.php?route=announcement&option=setup" title="">Announcement</a>
                            <ul>
                                <li><a href="index.php?route=oldquestions&option=setup" title="">Add Previous Questions</a></li> 
                                <li><a href="index.php?route=oldquestions&option=view" title="">Previous Questions List</a></li> 
                            </ul>
                        </li>
                        <li><a href="index.php?route=setting&option=changep" title="">Setting</a>
                            <ul>
                                 <li><a href="index.php?route=setting&option=change" title="">Account Setting</a></li> 
                            </ul>
                        </li>
                       
                        <li><a class="last" href="index.php?route=help&option=view" title="">Help?</a></li> 

                    </ul>
                </div>
            </div>
        </div>
        <!------------------------------navigation Section------------------------------->
        <!------------------------------content Section------------------------------->
        <div id="content">
            <div class="content_box">
            <?php require_once 'Controller/indexController.php'; ?>
            </div>
        </div>
        <div class="clear">
        </div>
        <!-------------------------------content Section--------------------------------->
        
        <!------------------------------footer Section----------------------------------->
        <div id="footer">
            <div class="footer_box">
                <div class="copyright">
                    <div class="colms_2">
                        <p>Copyright &copy;  <?php echo date("Y"); ?> MCQ System</p>
                    </div>
                    <div class="colms_2">
                    <span style="text-align:right;float:right">
                 				
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------footer Section------------------------------->
       
    </div>
    <!------------------------------container Section------------------------------->
</body>
</html>
