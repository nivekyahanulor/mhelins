<?php include('header.php');?>
<?php include('controller/order-history.php');?>
<body>
<?php include('nav.php');?>
  <main id="main">
    <div style="height:60px;"></div>
    <!-- ======= About Section ======= -->
    <section id="about"  class="section-bg">
      <div class="container" data-aos="fade-up">

		<div class="row">
		<div class="col-lg-3 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
                <div class="list-group">
				  <a href="orders.php" class="list-group-item list-group-item-action "><i class="bi bi-list"></i> Orders</li></a>
				  <a href="order-history.php" class="list-group-item list-group-item-action active"><i class="bi bi-journal-check"></i> Order History</li></a>
				</div> 
        </div>
		<div class="col-lg-9 " data-aos="fade-up" data-aos-delay="300">
	  <div class="container">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>Order History</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th data-priority="1">Transaction Code</th>
                                <th>Total Price</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
						<?php while($val1 = $checkout1->fetch_object()){	?>
                            <tr>
                                <td><?php echo $val1->transcode;?></td>
                                <td>₱ <?php 
								if($val1->delivery_option == 'Deliver'){ 
									$deliverfee = 30;
									} else {
									$deliverfee = 0;
									}
									echo number_format($val1->price + $deliverfee,2);?>
								</td>
                                <td><?php 
								if($val1->order_status==1){ echo 'Pending'; } 	
								else if($val1->order_status==2){ echo 'Approved'; } 
								else if($val1->order_status==5){ echo 'Cancelled'; } 
								else if($val1->order_status==8){ echo 'On-Going'; } 
								else if($val1->order_status==6){ echo 'Completed'; } 
								?></td>
                            </tr>
						<?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

		  </div>
		  </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->
<?php include('footer.php');?>
