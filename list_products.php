<?php include 'includes/header.php';

//fetching Companies Data
$sql = "Select products.*,company.company_name FROM products LEFT JOIN company on products.company_id = company.id";
$result = $conn->query($sql);
?>
  <div class="content">
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
					<td>......</td>
				</tr>
			 <?php	}
				}
			    ?>
			</tbody>
		</table>
	  </div>
	</div>
  </div>
<?php include 'includes/footer.php'; ?>