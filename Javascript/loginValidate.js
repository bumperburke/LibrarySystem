<script type="text/javascript">
function formValidation()
{
	var user = document.login.username.value;
	var user = user.trim();
	var pass = document.login.password.value;
	var error1 = "Please Enter Username!";
	var error2 = "Please Enter Password!";
	
	if(user == "")
	{
		document.getElementById('error').innerHTML=error1.fontcolor("red");
		return false;
	}
	
	if(pass == "")
	{
		document.getElementById('error').innerHTML=error2.fontcolor("red");
		return false;
	}
}
</script>
