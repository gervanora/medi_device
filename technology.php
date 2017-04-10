<?php include 'includes/header.php';

if(!empty($_POST['technology'])){
	//$sql = "INSERT INTO Indication (indication_name) VALUES ('".mysql_real_escape_string($_POST['indication_name'])."')";
    $sql = "INSERT INTO product_technology (technology) VALUES ('".$_POST['technology']."')";
	$conn->query($sql);
}
//fetching Indications Data
$sql = "Select * FROM product_technology";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="add_form">
    	<form method="POST" action="">
    		<input type="text" name="technology" id="technology" size="60">
    		<input type="submit" value="Add Technology">
    	</form>
    </div>
	  <div class="listings">
	    <div class="listing_title">List of Product Techmologies</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Technology Name</td>
			  <td>&nbsp;</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['technology']; ?></td>
					<td style="text-align:center;"><a href="delete.php?type=technology&id=<?php echo $row['id']; ?>"><img src="images/delete.png"/></a></td>
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