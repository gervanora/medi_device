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
	            <div class="form_div"><label>Product Description: </label><textarea class="ckeditor" name="ProductDescription"></textarea></div>
                <div class="form_div"><label>Product Technology : </label><input type="text" name="Prodtechnology" ></div>
                <div class="form_div"><label>Technology Description : </label><input type="text" name="TechnologyDescription" contenteditable="true" 
        spellcheck="true" style="width: 300px;height:150px;font-size:14pt;" ></div>
                <div class="form_div"><label>Product Developing  : </label><input type="text" name="ProductDeveloping"></div>
                <div class="form_div"><label>Development Partners Any : </label><input type="text" name="DevelopmentPartners"></div>
	        </section>
	        <h3>Step 3</h3>
	        <section>
	            <div class="form_div"><label>Product Description: </label><textarea class="ckeditor" name="ProductDescription"></textarea></div>
                <div class="form_div"><label>Product Technology : </label><input type="text" name="Prodtechnology" ></div>
                <div class="form_div"><label>Technology Description : </label><textarea class="ckeditor" name="TechnologyDescription"></textarea></div>
                <div class="form_div"><label>Product Developing  : </label><input type="text" name="ProductDeveloping"></div>
                <div class="form_div"><label>Development Partners Any : </label><input type="text" name="DevelopmentPartners"></div>
	        </section>
	        <h3>Step 4</h3>
	        <section>
	            <div class="form_div"><label>Indication : </label><input type="text" name="ProductDescription" required></div>
                <div class="form_div"><label>Application : </label><input type="text" name="Prodtechnology" > </div>
                <div class="form_div"><label>Product Specifications : </label><textarea class="ckeditor" name="TechnologyDescription" ></textarea></div>
                <div class="form_div"><label>Product Sources  : </label><textarea class="ckeditor" name="ProductDeveloping"></textarea></div>
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