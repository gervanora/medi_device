<?php include 'includes/header.php';

//fetching Companies Data
$sql = "Select * FROM products";
$result = $conn->query($sql);
?>
  <div class="content">
	  <div class="listings">
	    <div class="listing_title">List of Products</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Generic Name</td>
			  <td>Alias Name</td>
			  <td></td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['generic_name']; ?></td>
					<td><?php echo $row['alias_name']; ?></td>
					<td><a href="view_product.php?id=<?php echo $row['id']; ?>">View Details</a></td>
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