<?php include 'includes/header.php'; ?>
<?php include 'addproduct_info.php' ?>
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
                <div class="form_div"><label>Product Generic Name : </label><input type="text" name="generic_name" ></div>
                <div class="form_div"><label>Product Brand Name : </label><input type="text" name="brand_name" id="brand_name" ></div>
                <div class="form_div"><label>Product Alias Name : </label><input type="text" name="product_alias" ></div>
                <div class="form_div"><label>Product Classification : </label><input type="text" name="product_classification" id="product_classification"></div>
                <div id='classification_list'>
                </div>
                <div class="form_div"><label>Product  Profile Status : </label>
                <input type="radio" name="profile_status" value="Stub"> Stub 
                <input type="radio" name="profile_status" value="Profile"> Profile 
                </div>
                <div style="display:none;" class="save-stub"><a href="javascript:void(0);">Save Stub Product</a></div>
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
                    <label>Country Specific Regulatory Bodies: </label>
                    <select onChange="myFunction()" id="country_reg_body">
                      <option value="select">select</option>
                      <option value="510k">510k</option>
                      <option value="PMA">PMA</option>
                      <option value="CE">CE</option>
                    </select>
                  </div>
                  <div class="form_div">
                    <label>Developing Country(Pipeline Territory): </label>
                    <select id='pipeline_country'>
                      <?php foreach($countries as $country) { ?>
                        <option value="<?php echo $country[2]; ?>"><?php echo $country[2]; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form_div">
                    <label>Approved in other regions: </label>
                    <select id="approved_country">
                      <?php foreach($countries as $country) { ?>
                        <option value="<?php echo $country[2]; ?>"><?php echo $country[2]; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form_div">
                  <label>Estimated Approval Date : </label>
                    <select id="estimated_approval_month">
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                    <select id="estimated_approval_year">
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                    </select>
                </div>
                  <div class="form_div">
                  <label>Estimated Launch Date : </label>
                  <select id="estimated_launch_month">
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                    <select id="estimated_launch_year">
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                    </select>
                </div>
                  <div class="form_div">
                    <label>Device Class: </label>
                    <select id="device_class">
                      <option value="select">select</option>
                      <option value="device_class-1">test device class</option>
                    </select>
                  </div>
                  <div class="form_div">
                    <label>Analyst Notes : </label><input type="text" id="AnalystNotes">
                  </div>
                  <div id="save_pipeline">
                    <a href="javascript:void(0);">Save</a>
                  </div>
                  <div id='pipeline_list'>
                    <table width="100%" border="1">
                      <thead>
                        <td>Regulatory Body</td>
                        <td>Developing Country</td>
                        <td>Approved in other</td>
                        <td>Estimated Approval</td>
                        <td>Estimated Launch</td>
                        <td>Device Class</td>
                        <td>Analyst Notes</td>
                        <td>Action</td>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="Markets box" style="display:none;">
                    <div class="sub-title">Marketed Products info</div>

                <div class="form_div">
                  <label>Approved Country: </label>
                    <select id='approved_country'>
                      <?php foreach($countries as $country) { ?>
                        <option value="<?php echo $country[2]; ?>"><?php echo $country[2]; ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form_div">
                    <label>Concern Regulatory body : </label>
                    <select onChange="myFunction()" id="country_reg_body">
                      <option value="select">select</option>
                      <option value="510k">510k</option>
                      <option value="PMA">PMA</option>
                      <option value="CE">CE</option>
                    </select>
                </div>
                  <div class="form_div"><label>510K Number : </label><input type="text" id="510k_num"></div>
                  <div class="form_div"><label>PMA Number : </label><input type="text" id="pma_num"></div>
                  <div class="form_div"><label>Submission date : </label><input type="date" id="submission_date" ></div>
                  <div class="form_div"><label>Approval Date  : </label><input type="date" id="approval_date" ></div>
                  <div class="form_div"><label>Product launch date : </label><input type="date" id="launch_date" ></div>
                  <div class="form_div"><label>510K Modification No.  : </label><input type="text" id="510k_mod_num" > </div>
                  <div class="form_div"><label>PMA Modification No.  : </label><input type="text" id="pma_mod_num" > </div>
                  <div id="save_marketed">
                    <a href="javascript:void(0);">Save</a>
                  </div>
                  <div id='marketed_list'>
                    <table width="100%" border="1">
                      <thead>
                        <td>Appr. Country</td>
                        <td>Reg. Body</td>
                        <td>510k num</td>
                        <td>Pma num</td>
                        <td>Submission date</td>
                        <td>Approval date</td>
                        <td>Launch date</td>
                        <td>510k mod num</td>
                        <td>Pma mod num</td>
                        <td>Action</td>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div>
                Product MileStones : <a href="javascript:void(0);" id='extra_milestone'>Add More Milestones</a>
                    <table border="1" width="100%" class="milestone_list">
                      <thead>
                        <tr>
                          <td width="10%">Date</td>
                          <td width="70%">Title</td>
                          <td width="20%">Type</td>
                        </tr>
                        <tbody class="milestone_entry">
                          <tr>
                            <td><input type="date" name="Milestonedate_1" ></td>
                            <td><input type="text" name="Milestonetitle_1" ></td>
                            <td>
                                <select name="Milestonetype_1">
                                  <option value="type1">Type1</option>
                                  <option value="type2">Type2</option>
                                </select>
                            </td>
                          </tr>
                        </tbody>
                      </thead>
                    </table>
                    <!--div class="form_div"><label>Milestone date  : <label><input type="date" name="Milestonedate" > </div>
                    <div class="form_div"><label>Milestone title : <label><input type="text" name="Milestonetitle" > </div>
                    <div class="form_div"><label>Milestone type  : <label><input type="text" name="Milestonetype" > </div-->  
                </div>  
          </section>
          <h3>Step 3</h3>
          <section>
              <div class="form_div"><label>Product Description: </label><textarea class="ckeditor" name="product_description"></textarea></div>
                <div class="form_div"><label>Product Technology : </label><input type="text" name="product_technology" id="product_technology" ></div>
                <div id='technology_list'>
                </div>
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
            var curr_milestone = 2;
            var curr_pipeline = 0;
            var curr_marketed = 0;
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

                    $("#product_classification").autocomplete({
                      source: 'search_classification.php',
                      select:function (event, ui) {
                        //alert(ui.item.id);
                        //alert(ui.item.label)
                        $('#classification_list').append('<div id="classification'+ui.item.id+'">'+ui.item.label+'<input type="hidden" name="classifications[]" value="'+ui.item.id+'"><div class="del_classification"><img src="images/delete.png"/></div></div>')
                      }
                  }); 

                  $("#classification_list").on("click","img",function(){
                    //alert('');
                    $(this).parents().eq(1).remove();
                  });

                  $("#product_technology").autocomplete({
                      source: 'technology_search.php',
                      select:function (event, ui) {
                        //alert(ui.item.id);
                        //alert(ui.item.label)
                        $('#technology_list').append('<div id="technology'+ui.item.id+'">'+ui.item.label+'<input type="hidden" name="technologies[]" value="'+ui.item.id+'"><div class="del_technology"><img src="images/delete.png"/></div></div>')
                      }
                  }); 

                  $("#technology_list").on("click","img",function(){
                    //alert('');
                    $(this).parents().eq(1).remove();
                  });

                  $('#extra_milestone').click(function(){
                    $('.milestone_entry').append('<tr><td><input type="date" name="Milestonedate_'+curr_milestone+'" ></td><td><input type="text" name="Milestonetitle_'+curr_milestone+'" ></td><td><select name="Milestonetype_'+curr_milestone+'"><option value="type1">Type1</option><option value="type2">Type2</option></select></td></tr>');
                    curr_milestone++;
                  });

                  $('input[name="profile_status"]').click(function(){
                    if($(this).val() == 'Stub'){
                      $('.save-stub').css('display','block');
                    }
                    else{
                      $('.save-stub').css('display','none');
                    }
                  });

                  $('.save-stub a').click(function(){
                    $('#product_form').submit();
                  });
                  
                  $('#save_pipeline a').click(function(){
                    var country_reg_body = $('#country_reg_body').val();
                    var pipeline_country = $('#pipeline_country').val();
                    var approved_country = $('#approved_country').val();
                    var estimated_approval = $('#estimated_approval_year').val()+'-'+$('#estimated_approval_month').val();
                    var estimated_launch = $('#estimated_launch_year').val()+'-'+$('#estimated_launch_month').val();
                    var device_class = $('#device_class').val();
                    var AnalystNotes = $('#AnalystNotes').val();

                    $('#pipeline_list tbody').append('<tr><td><input name="pipeline_data['+curr_pipeline+'][country_reg_body]" type="text" value="'+country_reg_body+'"/></td><td><input name="pipeline_data['+curr_pipeline+'][pipeline_country]" type="text" value="'+pipeline_country+'"/></td><td><input name="pipeline_data['+curr_pipeline+'][approved_country]" type="text" value="'+approved_country+'"/></td><td><input name="pipeline_data['+curr_pipeline+'][estimated_approval]" type="text" value="'+estimated_approval+'"/></td><td><input name="pipeline_data['+curr_pipeline+'][estimated_launch]" type="text" value="'+estimated_launch+'"/></td><td><input name="pipeline_data['+curr_pipeline+'][device_class]" type="text" value="'+device_class+'"/></td><td><input name="pipeline_data['+curr_pipeline+'][AnalystNotes]" type="text" value="'+AnalystNotes+'"/></td><td class="del_pipelinedata"><img src="images/delete.png"/></td></tr>');
                    curr_pipeline++;
                  });

                   $('#save_marketed a').click(function(){
                    var approved_country = $('#approved_country').val();
                    var country_reg_body = $('#country_reg_body').val();
                    var k_num = $('#510k_num').val();
                    var pma_num = $('#pma_num').val();
                    var submission_date = $('#submission_date').val();
                    var approval_date = $('#approval_date').val();
                    var launch_date = $('#launch_date').val();
                    var k_mod_num = $('#510k_mod_num').val();
                    var pma_mod_num = $('#pma_mod_num').val();

                    $('#marketed_list tbody').append('<tr><td><input name="market_data['+curr_marketed+'][approved_country]" type="text" value="'+approved_country+'"/></td><td><input name="market_data['+curr_marketed+'][country_reg_body]" type="text" value="'+country_reg_body+'"/></td><td><input name="market_data['+curr_marketed+'][510k_num]" type="text" value="'+k_num+'"/></td><td><input name="market_data['+curr_marketed+'][pma_num]" type="text" value="'+pma_num+'"/></td><td><input name="market_data['+curr_marketed+'][submission_date]" type="text" value="'+submission_date+'"/></td><td><input name="market_data['+curr_marketed+'][approval_date]" type="text" value="'+approval_date+'"/></td><td><input name="market_data['+curr_marketed+'][launch_date]" type="text" value="'+launch_date+'"/></td><td><input name="market_data['+curr_marketed+'][510k_mod_num]" type="text" value="'+k_mod_num+'"/></td><td><input name="market_data['+curr_marketed+'][pma_mod_num]" type="text" value="'+pma_mod_num+'"/></td><td class="del_marketdata"><img src="images/delete.png"/></td></tr>');
                    curr_marketed++;
                  });

                    $("#pipeline_list").on("click","img",function(){
                    //alert('');
                    $(this).parents().eq(1).remove();
                  });

                    $("#marketed_list").on("click","img",function(){
                    //alert('');
                    $(this).parents().eq(1).remove();
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