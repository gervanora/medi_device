<?php include 'includes/header.php'; ?>
<div class="content">
	<form id="product_form" action="add_product.php" method="POST">
	    <div>
	        <h3>Step 1</h3>
	        <section>
	            <div class="form_div"><label>Company Name: </label><input type="text" name="company_name" id="company_name"></div>
                <div class="form_div"><label>Product Type: </label>
                <input type="radio" name="prod_type_1" value="UniversityProduct"> University Product      
                <input type="radio" name="prod_type_1" value="ProfiledProduct" required> Profiled  Product  
                </div>
                <div class="form_div"><label>Product Brand Name : </label><input type="text" name="brand_name" id="brand_name" ></div>
                <div class="form_div"><label>Product Alias Name : </label><input type="text" name="product_alias" ></div>
                <div class="form_div"><label>Product Classification : </label><input type="text" name="product_classification"></div>
                <div class="form_div"><label>Product  Profile Status : </label>
                <input type="radio" name="profile_status" value="Stub"> Stub 
                <input type="radio" name="profile_status" value="Profile"> Profile 
                </div>
	        </section>
	        <h3>Step 2</h3>
	        <section>
                <div class="form_div"> 
                    <label>Product  Type : </label>
                    <input type="radio" name="prod_type_2" value="Pipeline" class='step2_radio'> Pipeline
                    <input type="radio" name="prod_type_2" value="Markets" class='step2_radio'> Markets
                </div>
                <div class="Pipeline box" style="display:none;">
                  <div class="sub-title">Pipeline Products info</div>

                  <div class="form_div">
                    <label>Country Specific Regulatory Bodies: </label><input type="text" name="cntryspecify">
                  </div>
                  <div class="form_div">
                  <label>Estimated Approval Date : </label>
                    <select>
                      <option value="Jan">Jan</option>
                      <option value="Feb">Feb</option>
                      <option value="Mar">Mar</option>
                      <option value="Apr">Apr</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="Aug">Aug</option>
                      <option value="Sep">Sep</option>
                      <option value="Oct">Oct</option>
                      <option value="Nov">Nov</option>
                      <option value="Dec">Dec</option>
                    </select>
                    <select>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                    </select>
                </div>
                  <div class="form_div">
                  <label>Estimated Launch Date : </label>
                  <select>
                      <option value="Jan">Jan</option>
                      <option value="Feb">Feb</option>
                      <option value="Mar">Mar</option>
                      <option value="Apr">Apr</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="Aug">Aug</option>
                      <option value="Sep">Sep</option>
                      <option value="Oct">Oct</option>
                      <option value="Nov">Nov</option>
                      <option value="Dec">Dec</option>
                    </select>
                    <select>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                    </select>
                </div>
                  <div class="form_div">
                    <label>Analyst Notes : </label><input type="text" name="AnalystNotes" >
                  </div>

                </div>
                <div class="Markets box" style="display:none;">
                    <div class="sub-title">Marketed Products info</div>

                <div class="form_div">
                  <label>Approved Country: </label>
                    <select>
                      <option value="US">US</option>
                      <option value="Europe">Europe</option>
                      <option value="Others">Others</option>
                    </select>
                </div>

                <div class="form_div">
                    <label>Concern Regulatory body : </label>
                    <select id="CRbody" onChange="myFunction()">
                      <option value="select">select</option>
                      <option value="510k">510k</option>
                      <option value="PMA">PMA</option>
                      <option value="CE">CE</option>
                    </select>
                </div>

                <div class="510k">
                  <div class="form_div"><label>Number : </label><input type="text" name="Deviceregulatory"></div>
                  <div class="form_div"><label>Submission date : </label><input type="date" name="USFDAApproved" ></div>
                  <div class="form_div"><label>Approval Date  : </label><input type="date" name="ModificationsSupliments" ></div>
                  <div class="form_div"><label>Product launch date : </label><input type="date" name="USFDAApproved" ></div>
                  <div class="form_div"><label>Modification and Specification  : </label><input type="text" name="ModificationsSupliments" > </div>
                </div>

                </div>
                <div>
                Product MileStones ::
                    <div class="form_div"><label>Milestone date  : <label><input type="date" name="Milestonedate" > </div>
                    <div class="form_div"><label>Milestone title : <label><input type="text" name="Milestonetitle" > </div>
                    <div class="form_div"><label>Milestone type  : <label><input type="text" name="Milestonetype" > </div>  
                </div>  
	        </section>
	        <h3>Step 3</h3>
	        <section>
	            <div class="form_div"><label>Product Description: </label><textarea class="ckeditor" name="product_description"></textarea></div>
                <div class="form_div"><label>Product Technology : </label><input type="text" name="product_technology" ></div>
                <div class="form_div"><label>Technology Description : </label><textarea class="ckeditor" name="technology_description"></textarea></div>
                <div class="form_div"><label>Product Developing  : </label><input type="text" name="product_developing"></div>
                <div class="form_div"><label>Development Partners Any : </label><input type="text" name="development_partners"></div>
	        </section>
	        <h3>Step 4</h3>
	        <section>
	            <div class="form_div"><label>Indication : </label><input type="text" name="indication" id="indication" required></div>
                <div class="form_div"><label>Application : </label><input type="text" name="application" id="application" > </div>
                <div class="form_div"><label>Product Specifications : </label><textarea class="ckeditor" name="product_specification" ></textarea></div>
                <div class="form_div"><label>Product Sources  : </label><textarea class="ckeditor" name="product_source"></textarea></div>
	        </section>
	    </div>
	</form>
    <script type="text/javascript">
            var form = $("#product_form");
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
                        $('#product_form').submit();
                    }
                });

                $(document).ready(function(){
                    $('.step2_radio').click(function(){
                        var inputValue = $(this).attr("value");
                        var targetBox = $("." + inputValue);
                        $(".box").not(targetBox).hide();
                        $(targetBox).show();
                    });

                    $("#company_name").autocomplete({
                        source: 'company_search.php'
                    });

                    $("#brand_name").autocomplete({
                        source: 'brand_search.php'
                    });

                    $("#indication").autocomplete({
                        source: 'indication_search.php'
                    });

                    $("#application").autocomplete({
                        source: 'application_search.php'
                    });

                    
                });

                function myFunction() {
                    var xVal = document.getElementById("CRbody").value;
                    var x = document.getElementById(xVal);
                    if (x.style.display === 'block') {
                        x.style.display = 'none';
                    } else {
                        x.style.display = 'block';
                    }
                }
        </script>
</div>
<?php include 'includes/footer.php'; ?>