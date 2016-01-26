<?php require_once 'process/slider_update_process.php';?>

<div class="clear">
</div>
<div class="content_box_Details">
	<div class="topic_title">
    	<h2>Slider Change</h2>
    </div>
    <div class="topic_details">
	<form id="validate" class="form" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="80%">&nbsp;</td>
          </tr>
          <tr>
            <td><label>Slider Image:</label></td>
            <td>
            <input type="hidden" name="old_image" value="<?php echo $row->image_path; ?>" />
            <img src="../sliderengine/images/<?php echo $row->image_path; ?>" width="380px" height="150px" />
            <br />
            <input type="file" id="file" name="file"  class="input_field" style="width:365px"/>
            </td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="my_input_button icon_save" name="sub" value="Change" style="width:180px"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        </form>
</div>
</div>
<div class="clear">
</div>











    





