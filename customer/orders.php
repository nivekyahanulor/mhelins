<?php include('header.php');?>
<?php include('controller/order-history.php');?>
<body>
<?php include('nav.php');?>
    <div style="height:60px;"></div>
    <section id="about"  class="section-bg">
      <div class="container">

        <div class="section-header">
          <h1>ORDERS</h1>
        </div>
		<div class="row">
		<div class="col-lg-3 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
                <div class="list-group">
				  <a href="orders.php" class="list-group-item list-group-item-action active"><i class="bi bi-list"></i> Orders</li></a>
				  <a href="order-history.php" class="list-group-item list-group-item-action"><i class="bi bi-journal-check"></i> Order History</li></a>
				</div> 
        </div>
		<div class="col-lg-9">
		<?php if(isset($_GET['cancelled'])){?>
		<div class="alert alert-warning">
					Order Cancelled!
		</div>
		<?php } ?>
		<div class="row">
		<?php while($val1 = $checkout->fetch_object()){	?>
			 <div class="col-md-4">
				<div class="card mb">
				  <div class="card-body mb">
					<h5 class="card-title"><a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val1->trans_code;?>"><?php echo $val1->trans_code;?></a></h5>
					<p class="card-text">
					
						Total : ₱ <?php 
						if($val1->delivery_option == 'Deliver'){ 
						$deliverfee = 30;
						} else {
						$deliverfee = 0;
						}
						echo number_format($val1->price + $deliverfee,2);?> <br>
						Order Status : <?php if($val1->order_status==1){ echo 'Pending'; } ?><br>
						Shipment Status : <?php if($val1->is_delivery==0){ echo 'Pending'; } ?>
						</p>
					<!--<button type="button" class="btn btn-primary mb">Re-Schedule</button>-->
					<button type="button" class="btn btn-warning mb" data-bs-toggle="modal" data-bs-target="#cancel<?php echo $val1->trans_code;?>">Cancel Order</button>
				  </div>
				</div>
				
			</div>
			 <div class="modal fade" id="cancel<?php echo $val1->trans_code;?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Cancel Order </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
					<form method="post">
						Are you sure to cancel this order ?
						<input type="hidden" name="transcode" value="<?php echo $val1->trans_code;?>">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="cancel-order" class="btn btn-warning">Confirm Cancel</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
			</div>
			 <div class="modal fade" id="view-details<?php echo $val1->trans_code;?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"> Order Details </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
					<?php
					$transcode  = $val1->trans_code;
					$orders1    = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_id = b.item_id where a.status = 1 and a.trans_code='$transcode' ");
					while($val2 = $orders1->fetch_object()){	
					?>
                     <div class="alert alert-info">
						Item Name : <?php echo $val2->item_name;?><br>
						Price : <?php echo number_format($val2->item_price,2);?><br>
						Qty : <?php echo $val2->qty;?><br>
						Total : <?php echo number_format($val2->item_price * $val2->qty,2);?>
					</div>
					<?php } ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
			</div>
		
			
		<?php } ?>
		  </div>
		  </div>
		  </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->
<?php include('footer.php');?>
