<?php
session_start();

			
$customerid = $_SESSION['id'];
$transcodes = $_SESSION['transcode'];

$ordercnt   = $mysqli->query("select count(*)count_val from pos_order where status = 0 and customer_id='$customerid'");
$cntrow     = $ordercnt->fetch_assoc();

$orders     = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_id = b.item_id where a.status = 0 and a.customer_id='$customerid'");
$checkout   = $mysqli->query("SELECT * from pos_checkout_order where status = 0 and transcode='$transcodes' and customer_id='$customerid'");


if(isset($_POST['checkout-order'])){
	
	if(isset($_POST['checkbox'])){
		$is_preorder = 1;
		$checkdate	 = $_POST['checkdate'];
	} else {
		$is_preorder = 0;
		$checkdate	 = '';
	}
	$transcode	     = $_POST['transcode'];
	$customerid      = $_POST['customerid'];
	$delivery_option = $_POST['delivery_option'];
	$meal_status     = $_POST['meal_status'];
	
	$checkdate       = $_POST['checkdate'];
	$checktime       = $_POST['checktime'];
	
	$checkdatenow    = $_POST['checkdatenow'];
	$checktimenow    = $_POST['checktimenow'];
	
	if($checkdate ==""){
		$date = $_POST['checkdatenow'];
	} else {
		$date = $_POST['checkdate'];
	}
	
	if($checktime == "" ){
		$time = $_POST['checktimenow'];
	} else {
		$time = $_POST['checktime'];
	}
	
	$mysqli->query("INSERT INTO pos_checkout_order (customer_id ,transcode, delivery_option,is_preorder,delivery_date,delivery_time,meal_status) 
						VALUES ('$customerid','$transcode','$delivery_option','$is_preorder','$date','$time','$meal_status')");
		
		
	echo '<script>window.location.href="checkout.php"</script>';
	
}


if(isset($_POST['add-order'])){
	
	
	$item_id		= $_POST['item_id'];
	$customer_id    = $_POST['customer_id'];
	$data   		= $_POST['data'];
	$id             = $_POST['id'];
	$transcode      = $_SESSION['transcode'];
	
	$mysqli->query("INSERT INTO pos_order (customer_id ,trans_code, item_id,qty) 
						VALUES ('$customer_id','$transcode','$item_id',1)");
		
		
	echo '<script>window.location.href="menu.php?data='.$data.'&id='.$id.'&added"</script>';
	
}

if(isset($_POST['confirm-order'])){
	
	
	
	$transcode      = $_SESSION['transcode'];
	
	
	$mysqli->query("UPDATE pos_order set status='1'  where trans_code='$transcode'");
	$mysqli->query("UPDATE pos_checkout_order set status='1'  where transcode='$transcode'");
	
	
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
	}
	
    $transcode1 =  implode($pass);
	$_SESSION['transcode']    = $transcode1;
		
	echo '<script>window.location.href="orders.php?success"</script>';
	
}

if(isset($_POST['update-cart'])){
	
	
	$order_id	 = $_POST['order_id'];
	$cnt		 = $_POST['cnt'];
	$meal_status = $_POST['meal_status'];
	
	$mysqli->query("UPDATE pos_order set qty='$cnt' , meal_status='$meal_status' where order_id='$order_id'");
		
		
	echo '<script>window.location.href="cart.php?updated"</script>';
	
}

if(isset($_POST['delete-cart'])){
	
	$order_id	 = $_POST['order_id'];

	$mysqli->query("DELETE FROM  pos_order where order_id ='$order_id' ");
	
	
	echo '<script>window.location.href="cart.php?deleted"</script>';

}
