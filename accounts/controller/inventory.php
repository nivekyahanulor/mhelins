<?php
include('../controller/database.php');


$customer = $mysqli->query("SELECT a.* , b.name as category, b.category_id from pos_items a 
							LEFT JOIN pos_item_category b on b.category_id  = a.category
							");


if(isset($_POST['search'])){
	$item_code = $_POST['item_code'];
	$mysqli->query("select *  FROM  pos_items where item_code ='$item_code' ");
    $row = $mysqli->fetch_row();
	echo json_encode($row);
}

if(isset($_POST['add-item'])){
	
	$name           = $_POST['name'];
	$price          = $_POST['price'];
	$category       = $_POST['category'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	
	$mysqli->query("INSERT INTO pos_items (item_name ,item_price, category,image) 
						VALUES ('$name','$price','$category','$location')");
		
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Menu Data Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "menu.php";
							});
			</script>';
	
}

if(isset($_POST['delete-item'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_items where item_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Menu Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "menu.php";
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id             = $_POST['id'];
	$name           = $_POST['name'];
	$price          = $_POST['price'];
	$category       = $_POST['category'];
	$letter  	    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}

	$mysqli->query("UPDATE pos_items  SET item_name           = '$name',
										  item_price          = '$price',
										  category            = '$category',
										  image               = '$location'
					WHERE item_id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Menu Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "menu.php";
							});
			</script>';
	
}