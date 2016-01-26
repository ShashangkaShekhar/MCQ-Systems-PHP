<style type="text/css">
#register-form label.error, .output {color:#C30; text-align:left; width:100%;}
</style>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
<!----------======================Validation for Contact========================------------------------>
<script> 
$(function() {
$("#signup_form").validate({
rules: 
	{
	username: "required",
	email: 
		{
		required: true,
		email: true
		},

	pass: "required",

},

messages: 
	{
	username: "*",
	email: "*",
	pass: "*",
	},

submitHandler: function(form) {
form.submit();
}
});

});
</script>
