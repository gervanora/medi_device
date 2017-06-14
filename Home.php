<?php include 'includes/header.php';

//fetching Companies Data
$sql = "Select products.*,company.company_name FROM products LEFT JOIN company on products.company_id = company.id";
$result = $conn->query($sql);
?>
  <div class="content">
	  <div class="listings">
	    <div class="listing_title">Welcome to Medical Device Database Sytem.</div>
	  </div>
  </div>
<?php include 'includes/footer.php'; ?>