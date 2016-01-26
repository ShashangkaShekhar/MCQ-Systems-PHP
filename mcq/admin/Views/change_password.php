<?php
if( isset($_POST['sub']))
{
	$catname = $_POST["cat_name"];
	$position = $_POST["position"];
	
	if(!empty($catname))
	{
		$query = "INSERT INTO category_master SET category_name='$catname', position = '$position'";
		$dbObj->doQuery($query);
    }
		
	echo ("<script>window.location='index.php?route=category&option=setup&status=1';</script>");
}
?>
<div class="clear">
</div>
<div class="content_box_Details">
    <div class="topic_title">
    <h2>
        Password Setup</h2>
    </div>
    <div class="topic_details">
      <div class="result">
            <?php if( isset($_GET['status']) )
            {
                $status = $_GET['status'];
                if($status == 1)
				{
                    echo "<img src='Resources/ico/tick.png'><p>Category added successfully</p>";
                    sleep(2);
                }
                else if($status == 0)
				{
                    echo "<img src='Resources/ico/cross.png'><p>Error on data Saving!</p>";
                    sleep(2);
                }
            }?>
        </div>
        <form id="validate" class="form" method="post" action="" >
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
            <tr>
                <td width="32%"><label>Old Password:</label></td>
                <td width="68%"><input type="password" name="old_pass" id="old_pass" class="input_field"  style="width:350px"/></td>
            </tr>
            <tr>
                <td><label>Your New Password:</label></td>
                <td><input type="password" name="n_pass" id="n_pass" class="input_field"  style="width:350px"/></td>
            </tr>
            <tr>
                <td><label>Retype Password:</label></td>
                <td><input type="password" name="r_n_pass" id="r_n_pass" class="input_field"  style="width:350px"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" class="my_input_button icon_save" name="sub" value="Change" style="width:180px"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<div class="clear">
</div>

