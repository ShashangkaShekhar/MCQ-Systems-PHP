<?php
	error_reporting(0);
	session_start();
	$route = $_GET["route"];
	$option = $_GET["option"];
    require_once 'Model/dbclass.php';
    $dbObj = new Model_DBClass();
	
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
    <title>MCQ System</title>
    <link rel="Shortcut Icon" href="http://accountinggurubd.com/resources/ico/fvicon.png" />
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
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">
	bkLib.onDomLoaded(nicEditors.allTextAreas);
	bkLib.onDomLoaded(function() {
          var myNicEditor = new nicEditor();
          myNicEditor.setPanel('myNicPanel');
          myNicEditor.addInstance('myInstance1');
     });
    </script>
						
    <!-- editor -->
    
    <link href="news_ticker/styles/ticker-style.css" rel="stylesheet" type="text/css" />
	<script src="news_ticker/includes/jquery.ticker.js" type="text/javascript"></script>
	<script src="news_ticker/includes/site.js" type="text/javascript"></script>
</head>
<body id="page">
    <!------------------------------container Section------------------------------->
    <div id="container">
        <!------------------------------navigation Section------------------------------->
        <div id="navigation">
            <div class="navigation_box">
                <div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                        <li><a href="index.php?route=home&option=current" title="Home Page">
                        	<img src="menu/link.gif"/></a></li>
                        <li><a href="index.php?route=admission&option=view" title="">Register</a></li> 
                        <li><a href="onlinetest/index.php" title="">Online Test</a></li> 
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
        <!-------------------------------content Section--------------------------------->
        <div id="action_bar">
            <div class="action_bar_box">
            <h2>Need a MCQ Software?</h2>
                <p><img src="resources/ico/phone.png"> Call@ +8801929515253</p>
            </div>
        </div>
        
        <!------------------------------footer Section----------------------------------->
        <div id="footer">
            <div class="footer_box">
                <div class="copyright">
                    <div class="colms_2">
                        <p>Copyright &copy;  <?php echo date("Y"); ?> mcq || <a href="admin/login.php">Admin Panel</a></p>
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
