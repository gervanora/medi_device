<?php include 'includes/header.php'; ?>
<?php

    $authors_query = "Select * FROM users";
    $authors_list = $conn->query($authors_query);

	if(!empty($_POST)){

		//print_r($_POST);

        $conditions = array();
		$sql = "Select products.*,company.company_name,users.username FROM products LEFT JOIN company on products.company_id = company.id LEFT JOIN users ON products.user_id = users.id";

		if(!empty($_POST['product_name'])){
			$conditions[] = "brand_name  LIKE '%".$_POST['product_name']."%'";
		}

		if(!empty($_POST['company_name'])){
			$conditions[] = "company_name  LIKE '%".$_POST['company_name']."%'";
		}

		if(!empty($_POST['author'])){
			$conditions[] = "products.user_id = ".$_POST['author']." ";
		}

        if(!empty($_POST['product_type'])){
			//$conditions[] = "products.user_id = ".$_POST['author']." ";
			if($_POST['product_type'] == "stub")
			{
				$conditions[] = "products.profile_status = 'Stub'";
			}
			elseif ($_POST['product_type'] == "pipeline") {
				$conditions[] = "products.pipelined_marketed = 'Pipeline'";
			}
			else{
				$conditions[] = "products.pipelined_marketed = 'Markets'";
			}
		}

		if(!empty($_POST['created_from']) && !empty($_POST['created_to'])){
			$conditions[] = "DATE(products.created) BETWEEN '".$_POST['created_from']."' AND '".$_POST['created_to']."'";
		}
		elseif (!empty($_POST['created_from'])) {
			$conditions[] = "DATE(products.created) > '".$_POST['created_from']."'";
		}
		elseif (!empty($_POST['created_to'])) {
			$conditions[] = "DATE(products.created) < '".$_POST['created_to']."'";
		}

		if(!empty($_POST['product_technology']) && !empty($_POST['technology_id'])){
			$tecnology_query = "SELECT GROUP_CONCAT(product_id) as tech_product FROM `product_to_technology` WHERE product_technology_id = ".$_POST['technology_id'];
		    $techology_res = $conn->query($tecnology_query);
		    $tech_product_list = $techology_res->fetch_assoc();
		    $conditions[] = 'products.id IN('.$tech_product_list['tech_product'].')';
		}

		if(!empty($_POST['market_level']) && !empty($_POST['market_level_id'])){
			$market_query = "SELECT GROUP_CONCAT(product_id) as market_product FROM `product_to_classification` WHERE product_classification_id = ".$_POST['market_level_id'];
		    $market_res = $conn->query($market_query);
		    $market_product_list = $market_res->fetch_assoc();
		    $conditions[] = 'products.id IN('.$market_product_list['market_product'].')';
		}

		if(!empty($_POST['510_num'])){
			$num_query = "SELECT GROUP_CONCAT(product_id) as num_product FROM `market_product` WHERE 510_num = '".$_POST['510_num']."'";
		    //echo $num_query;
		    $num_res = $conn->query($num_query);
		    $num_product_list = $num_res->fetch_assoc();
		    if(!empty($num_product_list['num_product'])){
		    	$conditions[] = 'products.id IN('.$num_product_list['num_product'].')';
		    } 
		}

		if(!empty($_POST['pma_num'])){
			$pma_query = "SELECT GROUP_CONCAT(product_id) as pma_product FROM `market_product` WHERE pma_num = '".$_POST['pma_num']."'";
		    //echo $pma_query;
		    $pma_res = $conn->query($pma_query);
		    $pma_product_list = $pma_res->fetch_assoc();
		    if(!empty($pma_product_list['pma_product'])){
		    	$conditions[] = 'products.id IN('.$pma_product_list['pma_product'].')';
		    } 
		}

        //echo "<pre>";
		//print_r($conditions);
		//echo "</pre>";
		
		if(!empty($conditions)){
			$sql = $sql." WHERE ".implode(" AND ", $conditions);
		}
		//echo $sql;
		$result = $conn->query($sql);
	}
	else{
			//fetch all products
			$sql = "Select products.*,company.company_name,users.username FROM products LEFT JOIN company on products.company_id = company.id LEFT JOIN users ON products.user_id = users.id";
			$result = $conn->query($sql);
		//echo $sql;
	}
?>
<div  class="content" align="left">
	<h3>Search Form</h3>
	<form method="POST" action="">
<table class="div_label">
 <tr class="div_label">
    <td>
	
		<div>
			<label>Product Name</label>
		</div>
	</td>
    <td>	
		<div>
			<input type="text" name="product_name" id="product_name"/>
		</div>
	</td >
	<td> &nbsp;</td>
	<td> &nbsp;</td>
 </tr>
 <tr class="div_label">
		<td>
			<div ><label>Company Name</label></div>
		</td>
		<td>	
				<div><input type="text" name="company_name" id="company_name"/></div>
		</td>		
		<td> &nbsp;</td>
		<td> &nbsp;</td>
 </tr>
 <tr class="div_label">
    <td>
		
                <div ><label>Author</label></div>
    </td>
    <td>
				<select name="author">
                	        <option value=""></option>
                		<?php while($row = $authors_list->fetch_assoc()) { ?>
                			<option value="<?php echo $row['id']; ?>"><?php echo $row['username']?></option>
                		<?php } ?>
                	</select>
		</td>	
	<td> &nbsp;</td>
	<td> &nbsp;</td>
 </tr>	

 <tr class="div_label">
        <td colspan=2>
               <div><label>Created Date: FROM </label>
				<input type="date"  name="created_from">
				</div>				
	</td>
	<td colspan=2><div>
				<label>To  </label><input type="date" name="created_to">
				</div>
	</td>
 </tr>
 <tr class="div_label">
		<td>                
			<div>
                		pipeline<input name="product_type" type="radio" value="pipeline">
			</div>
		</td>
		<td>  
		 	<div>
                		marketed<input name="product_type" type="radio" value="marketed">
			</div>
		</td>
		<td>  
			<div>
                		stub<input name="product_type" type="radio" value="stub">

                	</div>
		</td>
	<td> &nbsp;</td>
 </tr>

  <tr class="div_label">
    <td>
            <label>Technology</label>

	</td>
	<td>
            <input type="text" name="product_technology" id="product_technology">
            <input type="hidden" name="technology_id" id="technology_id" value="">       
	</td>
</tr>
<tr class="div_label">
	<td>
    	<label>Market Level</label>
	</td>
	<td colspan="3">
		<input type="text" name="market_level" id="market_level" style="width:360px;">
		<input type="hidden" name="market_level_id" id="market_level_id" value="">
	</td>
</tr>

  <tr class="div_label">

	<td width=25%>
                <div><label>510K Number</label></div></td>
	<td width=25%><div><input type="text" name="510_num"/></div>
     </td>
     <td width=25%> &nbsp;</td> 
<tr class="div_label">
	<td width=25%><div><label>PMA Number</label></div></td>
	<td width=25%><div><input type="text" name="pma_num"/></div></td>
</tr>
<tr>
        <td width=25%><input type="submit" value="Search"></td>
				
				
</tr>
</table>
			</form>
		</div>

		<div class="listings">
	    <div class="listing_title">List of Products</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Product Name</td>
			  <td>Status</td>
			  <td>Company</td>
			  <td>Author</td>
              <td>&nbsp;</td>
              <td>Approval status</td>
              <td>Last Modified Date</td>
              <td>&nbsp;</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['brand_name']; ?></td>
					<td>
						<?php
							if($row['profile_status'] == 'Stub'){
								echo 'Stub';
							}
							elseif($row['pipelined_marketed'] =='Pipeline'){
								echo 'Pipeline';
							}
							else{
								echo 'Marketed';
							}
						?>
					</td>
					<td><?php echo $row['company_name']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><a href="view_product.php?id=<?php echo $row['id']; ?>">View</a></td>
					<td>
					<?php 
					      echo ($row['approval_status']) ? 'Approved':'Pending';
                    ?>
					</td>
					<td><?php echo date('d/m/Y H:i:s',strtotime($row['modified'])); ?></td>
					<td>....</td>
				</tr>
			 <?php	}
				}
			    ?>
			</tbody>
		</table>
	  	</div>
		</div>
<script type="text/javascript">
	$('document').ready(function(){
		$("#company_name").autocomplete({
                source: 'company_search.php'
            });

		$("#product_name").autocomplete({
                source: 'brand_search.php'
            });

		$("#product_technology").autocomplete({
            source: 'technology_search.php',
            select:function (event, ui) {
                $('#technology_id').val(ui.item.id);
              }        
        }); 

        $("#market_level").autocomplete({
	          source: 'search_classification.php',
	          select:function (event, ui) {
                $('#market_level_id').val(ui.item.id);
              }
	      });

	});
</script>
<?php include 'includes/footer.php'; ?>