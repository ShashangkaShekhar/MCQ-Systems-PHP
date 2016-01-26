<style type="text/css">
	#login_form 
	label.error, 
	.output {
		color:#F60; 
		text-align:left; 
		width:100%;
		}
</style>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
<!----------======================Validation for Contact========================------------------------>
<script> 
$(function() {
$("#login_form").validate({
rules: 
	{
	
	login_name: "required",
	login_password: "required",

},
messages: 
	{
	login_name: "*",
	login_password: "*",
	},

submitHandler: function(form) {
form.sub();
}
});

});
</script>
