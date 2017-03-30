<?php include 'includes/header.php';

if(!empty($_POST['company_name'])){
	//$sql = "INSERT INTO company (company_name) VALUES ('".mysql_real_escape_string($_POST['company_name'])."')";
    $sql = "INSERT INTO company (company_name) VALUES ('".$_POST['company_name']."')";
	$conn->query($sql);
}
//fetching Companies Data
$sql = "Select * FROM product_classification";
$result = $conn->query($sql);
?>
  <div class="content">
    <div class="classification_form">
    	<form method="POST" action="">
            <div class="form_div">
    			<label>Classification name: </label>
    			<input type="text" name="company_name" id="classification_name" size="60">
    		</div>
            <div class="form_div">
    			<label>Parent Classification: </label>
    			<input type="text" name="parent_id" id="parent_id" size="60">
    		</div>
            <div class="form_div">
            <label>Level: </label>
             <select name="level">
            	<option value="Market Level">Market Level</option>
            	<option value="Segment Level">Segment Level</option>
            	<option value="Sub Segment Level">Sub Segment Level</option>
            </select>
            </div>
    		<input type="submit" value="Add Classification">
    	</form>
    </div>
	  <div class="classification_listing">
	    <div class="listing_title">Product Classifications</div>
		<div><table border="1" align="center">
		    <thead>
			  <td>Sr. no.</td>
			  <td>Classification Name</td>
			  <td>Classification Full Path</td>
			  <td>Level</td>
			</thead>
			<tbody>
             <?php if ($result->num_rows > 0) {
             			while($row = $result->fetch_assoc()) {
             ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['classification_name']; ?></td>
					<td><?php echo $row['classification_name']; ?></td>
					<td><?php echo $row['level']; ?></td>
				</tr>
			 <?php	}
				}
			    ?>
			</tbody>
		</table>
	  </div>
	</div>
  </div>
  <script type="text/javascript">
  	$(document).ready(function(){     
            $("#parent_id").autocomplete({
                source: 'search_classification.php'
            }); 
        });
  </script>
<?php include 'includes/footer.php'; ?>