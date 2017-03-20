<!DOCTYPE html>
<html>
	<head>
		<title>Medical Device Database System</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script src="js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js'></script>
		<script type="text/javascript" src='js/jquery.steps.js'></script>
		<script type="text/javascript">
			var form = $("#example-form");
				form.validate({
				    errorPlacement: function errorPlacement(error, element) { element.before(error); },
				    rules: {
				        confirm: {
				            equalTo: "#password"
				        }
				    }
				});
				form.children("div").steps({
				    headerTag: "h3",
				    bodyTag: "section",
				    transitionEffect: "slideLeft",
				    onStepChanging: function (event, currentIndex, newIndex)
				    {
				        form.validate().settings.ignore = ":disabled,:hidden";
				        return form.valid();
				    },
				    onFinishing: function (event, currentIndex)
				    {
				        form.validate().settings.ignore = ":disabled";
				        return form.valid();
				    },
				    onFinished: function (event, currentIndex)
				    {
				        alert("Submitted!");
				    }
				});
		</script>
	</head>
	<body>
	 	<div class="header">Medical Device Database System</div>
		<div class="content">
			<form id="example-form" action="#">
			    <div>
			        <h3>Account</h3>
			        <section>
			            <label for="userName">User name *</label>
			            <input id="userName" name="userName" type="text" class="required">
			            <label for="password">Password *</label>
			            <input id="password" name="password" type="text" class="required">
			            <label for="confirm">Confirm Password *</label>
			            <input id="confirm" name="confirm" type="text" class="required">
			            <p>(*) Mandatory</p>
			        </section>
			        <h3>Profile</h3>
			        <section>
			            <label for="name">First name *</label>
			            <input id="name" name="name" type="text" class="required">
			            <label for="surname">Last name *</label>
			            <input id="surname" name="surname" type="text" class="required">
			            <label for="email">Email *</label>
			            <input id="email" name="email" type="text" class="required email">
			            <label for="address">Address</label>
			            <input id="address" name="address" type="text">
			            <p>(*) Mandatory</p>
			        </section>
			        <h3>Hints</h3>
			        <section>
			            <ul>
			                <li>Foo</li>
			                <li>Bar</li>
			                <li>Foobar</li>
			            </ul>
			        </section>
			        <h3>Finish</h3>
			        <section>
			            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
			        </section>
			    </div>
			</form>
		</div>
		<div class="footer">Copyright @2017</div>
	</body>
</html>