<style type="text/css">
#register-form label.error, .output {color:#C30; text-align:left; width:100%;}
</style>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
<!----------======================Validation for Contact========================------------------------>
<script> 
$(function() {
$("#contact_form").validate({
rules: 
	{
	
	name: "required",
	email: 
		{
		required: true,
		email: true
		},
	phone: "required",
	details: "required",

},

messages: 
	{
	name: "*",
	email: "*",
	phone: "*",
	details: "*",
	},

submitHandler: function(form) {
form.submit();
}
});

});
</script>
