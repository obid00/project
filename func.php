<?php
include 'config.php';

$name = $_POST['name'];
$price = $_POST['mablag'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `product`(`name`, `mablag`) VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $price]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Маълумот бомувафақият ворид карда шуд</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `product`");
$sql->execute();
$result = $sql->fetchAll();



// Update
$edit_name = $_POST['edit_name'];
$edit_mablag = $_POST['edit_mablag'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE product SET name=?, mablag=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_mablag, $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}





// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM product WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
