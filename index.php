<?php include 'includes/header.php'; ?>
<?php
	if(!empty($_POST)){

        $conditions = array();
		$sql = "Select products.*,company.company_name FROM products LEFT JOIN company on products.company_id = company.id";

		if(!empty($_POST['product_name'])){
			$conditions[] = "brand_name  LIKE '%".$_POST['product_name']."%'";
		}

		if(!empty($_POST['company_name'])){
			$conditions[] = "company_name  LIKE '%".$_POST['company_name']."%'";
		}
        echo "<pre>";
		print_r($conditions);
		echo "</pre>";
		
		if(!empty($conditions)){
			$sql = $sql." WHERE ".implode(" AND ", $conditions);
		}
		echo $sql;
		$result = $conn->query($sql);
	}
	else{
			//fetch all products
			$sql = "Select products.*,company.company_name FROM products LEFT JOIN company on products.company_id = company.id";
			$result = $conn->query($sql);
	}
?>
		<div class="content">
			<h3>Search Form</h3>
			<form method="POST" action="">
				<div><label>Product Name</label><input type="text" name="product_name"/></div>
                <div><label>Company Name</label><input type="text" name="company_name"/></div>
                <div><label>Author</label><input type="text" name="author"/></div>
                <div>Created Date:<input type="date"  name="created_from"> To <input type="date" name="created_to"></div>
                <div>
                	pipeline<input type="radio" value="pipeline">
                	marketed<input type="radio" value="marketed">
                	stub<input type="radio" value="stub">
                </div>
                <div>
                	<label>Technology</label>
                	<select>
                		<option></option>
                	</select>
                </div>
                <div>
                	<label>Market Level</label>
                	<select>
                		<option></option>
                	</select>
                </div>
                <div><label>510K Number</label><input type="text" name="510_num"/></div>
                <div><label>PMA Number</label><input type="text" name="pma_num"/></div>
                <input type="submit" value="Search">
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
              <td>&nbsp;</td>
              <td>Approval status</td>
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
					<td><a href="view_product.php?id=<?php echo $row['id']; ?>">View</a></td>
					<td>
					<?php 
					      echo ($row['approval_status']) ? 'Approved':'Pending';
                    ?>
					</td>
					<td>....</td>
				</tr>
			 <?php	}
				}
			    ?>
			</tbody>
		</table>
	  	</div>
		</div>
<?php include 'includes/footer.php'; ?>