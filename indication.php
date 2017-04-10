<?php include 'includes/header.php';

if(!empty($_POST['indication_name'])){
	//$sql = "INSERT INTO Indication (indication_name) VALUES ('".mysql_real_escape_string($_POST['indication_name'])."')";
    $sql = "INSERT INTO indication (indication_name) VALUES ('".$_POST['indication_name']."')";
	$conn->query($sql);
}
//fetching Indications Data
$sql = "Select * FROM indication";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="add_form">
    	<form method="POST" action="">
    		<input type="text" name="indication_name" id="indication_name" size="60">
    		<input type="submit" value="Add Indication">
    	</form>
    </div>
	  <div class="listings">
	    <div class="listing_title">List of Indications</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Indication Name</td>
			  <td>&nbsp;</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['indication_name']; ?></td>
					<td style="text-align:center;"><a href="delete.php?type=indication&id=<?php echo $row['id']; ?>"><img src="images/delete.png"/></a></td>
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