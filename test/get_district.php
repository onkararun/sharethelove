<?php
include('connect_base.php');
include('functions.php');

if(!empty($_POST["state_id"])) {
	$query ="SELECT * FROM district WHERE StCode = '" . $_POST["state_id"] . "'";
	$results = mysql_query($query,$db);
    $output = '<option value="">Select District</option>';

	while($rows = mysql_fetch_array($results)) {
	$output .= '<option value="' . $rows['DistrictName']. '">' . $rows['DistrictName'] . '</option>';

  }
}
  echo $output;
?>
