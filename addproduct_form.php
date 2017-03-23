<?php include 'includes/header.php'; ?>
<div class="content">
	<form id="example-form" action="#">
	    <div>
	        <h3>Step 1</h3>
	        <section>
	            <div class="form_div"><label>Company Name: </label><input type="text" name="cmpname"></div>
                <div class="form_div"><label>Product Type: </label>
                <input type="radio" name="Prodtype" value="UniversityProduct"> University Product      
                <input type="radio" name="Prodtype" value="ProfiledProduct" required> Profiled  Product  
                </div>
                <div class="form_div"><label>Product Brand Name : </label><input type="text" name="prodbrdname" ></div>
                <div class="form_div"><label>Product Alias Name : </label><input type="text" name="prodbrdname" ></div>
                <div class="form_div"><label>Product Classification : </label><input type="text" name="prodbrdname"></div>
                <div class="form_div"><label>Product  Profile Status : </label>
                <input type="radio" name="Prodprofilestatus" value="Stub"> Stub 
                <input type="radio" name="Prodprofilestatus" value="Profile"> Profile 
                </div>
	        </section>
	        <h3>Step 2</h3>
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
	        <h3>Step 3</h3>
	        <section>
	            <ul>
	                <li>Foo</li>
	                <li>Bar</li>
	                <li>Foobar</li>
	            </ul>
	        </section>
	        <h3>Step 4</h3>
	        <section>
	            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
	        </section>
	    </div>
	</form>
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
</div>
<?php include 'includes/footer.php'; ?>