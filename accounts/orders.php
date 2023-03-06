<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/orders.php');?>
<style>
.ui-autocomplete {
z-index: 2150000000;
}
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo strtoupper($_GET['data']);?> Orders</h1>
  
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
		 <?php if(isset($_GET['updated'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Updated!</strong> 
				</div>
		 <?php } ?>
		 <?php if($_GET['data']=='approved' || $_GET['data']=='ongoing' || $_GET['data']=='fordelivery' || $_GET['data']=='pickup'){?>
		  <ul class="nav nav-tabs" role="tablist">
		    <?php if($_GET['data'] == 'approved') {
					$approved = 'active';
					$ongoing = 'a';
					$fordelivery = 'a';
					$pickup = 'a';
			     } else if($_GET['data'] == 'ongoing') {
					$approved = 'a';
					$ongoing = 'active';
					$fordelivery = 'a';
					$pickup = 'a';
				 } else if($_GET['data'] == 'fordelivery') {
					$approved = 'a';
					$ongoing = 'a';
					$fordelivery = 'active';
					$pickup = 'a';
				 } else if($_GET['data'] == 'pickup') {
					$approved = 'a';
					$ongoing = 'a';
					$fordelivery = 'a';
					$pickup = 'active';
				 }
			?>
			<li class="nav-item">
			  <a href="orders.php?data=approved" class="nav-link <?php echo $approved;?>" data-toggle="tab" href="#home" >Approved</a>
			</li>
			<li class="nav-item">
			<a href="orders.php?data=ongoing" class="nav-link <?php echo $ongoing;?>" data-toggle="tab" href="#menu1" >On Going</a>
			</li>
			<li class="nav-item">
			  <a href="orders.php?data=fordelivery" class="nav-link <?php echo $fordelivery;?>" data-toggle="tab" href="#menu2">For Delivery</a>
			</li>
			<li class="nav-item">
			  <a href="orders.php?data=pickup" class="nav-link  <?php echo $pickup;?>" data-toggle="tab" href="#menu2">Pick Up</a>
			</li>
		  </ul>
		 <?php }?>
          <div class="card">
		   
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Transaction Code</th>
                    <th scope="col"  class="text-center">Customer Name</th>
                    <th scope="col"  class="text-center">Total Price</th>
                    <th scope="col"  class="text-center">Pre Order</th>
                    <th scope="col"  class="text-center">Date Ordered</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $checkout->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val->trans_code;?>"><?php echo $val->transcode;?></a></td>
                    <td class="text-center"><?php echo $val->firstname .' '. $val->lastname;?></td>
                    <td class="text-center"> ₱ <?php  if($val->delivery_option == 'Deliver'){ echo number_format($val->price + 30,2);} else { echo number_format($val->price,2); } ?></td>
                    <td class="text-center"><?php if($val->is_preorder == 1){ echo "Yes";} else { echo  "No";}?></td>
                    <td class="text-center"><?php echo $val->created_at;?></td>
                    <td class="text-center">
					<?php if($val->order_status == 6){} else { ?>
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->checkout_id;?>"> <i class="bi bi-pencil-square"></i> </button>
					<?php } ?>
					</td>
                  </tr>
				   <div class="modal fade" id="view-details<?php echo $val->trans_code;?>" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"> Order Details </h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<div class="row">
						<div class="col-lg-6">
						<b> Transaction Details </b>
						<hr>
								<p> Transaction Code : <?php echo $val->trans_code;?> </p>
								<p> Customer Name: <?php echo $val->firstname .' '. $val->lastname;?> </p>
								<p> Contact Number: <?php echo $val->contact;?> </p>
								<p> Email Address: <?php echo $val->email;?> </p>
								<p> Delivery Address: <?php echo $val->address;?> </p>
								<p> Date Ordered: <?php echo $val->created_at;?> </p>
								<p> Payment Method: GCASH </p>
								<p> Meal Status :  <?php echo $val->meal_status;?> </p>
								<p> Pre Order : <?php if($val->is_preorder == 1){ echo "Yes";} else { echo  "No";}?> </p>
						</div>
						<div class="col-lg-6">
						<p> Delivery Date : <?php echo $val->delivery_date;?> </p>
						<p> Delivery Time : <?php echo $val->delivery_time;?> </p>
						<p> Total Amount : ₱ <?php echo number_format($val->price,2);?> </p>
						<b> Order List </b>
						<hr>
						<?php
						$transcode  = $val->trans_code;
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
						</div>
						</div>
						<div class="modal-footer">
						 
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				</div>
					 <div class="modal fade" id="edit-item<?php echo $val->checkout_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Order Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
							   <div class="row">
									<div class="col-12">
									  <label for="inputNanme4" class="form-label"> Order Status: </label>
									  <input type="hidden" class="form-control" name="checkout_id" value="<?php echo $val->checkout_id;?>" required>
									  <input type="hidden" class="form-control" name="trans_code" value="<?php echo $val->trans_code;?>" required>
									  <select  class="form-control" name="status"  id="order_statuse" required>
									  <?php if($val->order_status == 1){?>
										<option value ="" > - Select - </option>
										<option value ="2" > Approved </option>
										<option value ="3" > Cancel </option>
										<option value ="4" > Reschedule </option>
									  <?php } else if($val->order_status == 2){?>
									    <option value ="" > - Select - </option>
										<option value ="7" > For Delivery  </option>
										<option value ="8" > On Going </option>
										<option value ="9" > Pickup </option>
										<option value ="3" > Cancel </option>
										<option value ="4" > Reschedule </option>
									  <?php } else if($val->order_status == 8){?>
									    <option value ="" > - Select - </option>
										<option value ="7" > For Delivery  </option>
										<option value ="9" > Pickup </option>
									  <?php } else if($val->order_status == 7){?>
										<option value ="6" > Completed  </option>
									  <?php } ?>
									  </select>
									</div>
									<!--<div class="col-12" id="reschude_date" style="display:none;">
									  <label for="inputNanme4" class="form-label"> Reschedule Date: </label>
									  <input type="date" class="form-control" name="checkout_id" value="<?php echo $val->checkout_id;?>" >
									</div>	
									<div class="col-12" id="reschude_time" style="display:none;">
									  <label for="inputNanme4" class="form-label"> Reschedule Time: </label>
									  <input type="date" class="form-control" name="checkout_id" value="<?php echo $val->checkout_id;?>" >
									</div>-->
								</div>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-order">Update </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
				
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
		
  </main><!-- End #main -->

<?php include('footer.php');?>