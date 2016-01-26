<?php
if(isset($_POST['sub']))
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$contact = $_POST["phone"];
		$address = $_POST["address"];
		$message = $_POST["message"];
		$city = $_POST["city"];
		$zip = $_POST["zip"];
		$state = $_POST["state"];
		$country = $_POST["country"];
		$date = date("Y-m-d H:i:s");

		$query = "INSERT INTO tbl_contact 
					SET name ='$name',
						email ='$email',
						contact = '$contact',
						address ='$address',
						message = '$message',
						city = '$city',
						zip = '$zip',
						state = '$state',
						date = '$date'";
						 
		$result = $dbObj->doQuery($query);
			if($result)
			{
	echo ("<script>window.location='index.php?route=contact&option=view&status=1';</script>");
			}
			else
			{
	echo ("<script>window.location='index.php?route=contact&option=view&status=0';</script>");
			
			}
	}
	 ?>

<div class="clear">
</div>
<div class="content_box_Details">
    <div class="topic_title">
    	<h2>Help</h2>
    </div>
    <div class="topic_details">
    	<form action="" method="post" id="Signup_form" novalidate="novalidate">
        <b style="font-weight:bold; font-size:18px; position:relative;padding-left:22px">
            <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					echo "<img style='color:green;border:none;position:absolute;left:0px' src='Resources/ico/tick.png'>Query sent successfully";
					sleep(2);
				 }
				 else if($status == 0){
					echo "<img style='color:red;border:none;position:absolute;left:0px' src='Resources/ico/cross.png'>Unable to send";
					sleep(2);
				 }
            }?>
        </b>
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label>Full Name:</label></td>
                    <td><input type="text" name="name" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Phone/Mobile:</label></td>
                    <td><input type="text" name="phone" class="input_field" style="width:150px"/></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type="text" name="city" class="input_field" style="width:150px"/></td>
                </tr>
                <tr>
                    <td><label>State:</label></label></td>
                    <td><input type="text" name="state" class="input_field" style="width:150px"/></td>
                </tr>
                <tr>
                    <td><label>Zip:</label></td>
                    <td><input type="text" name="zip" class="input_field" style="width:150px"/></td>
                </tr>
                <!--<tr>
                    <td>Country:</td>
                    <td><input type="text" name="country" class="input_field" style="width:150px"/></td>
                </tr>-->
                <tr>
                	<td><label>Message:</label></td>
                	<td><textarea type="text" class="input_field" name="message" style="width:250px ; height:100px;" ></textarea>
                </td>
              	</tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                <input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/></td>
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







    





