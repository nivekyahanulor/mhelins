<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/customer.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Performance Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Customer</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
	  	 
        <div class="col-lg-12">
		 <ul class="nav nav-tabs" role="tablist">
		   
			<li class="nav-item">
			  <a href="customer.php" class="nav-link " data-toggle="tab" href="#home" >Customers</a>
			</li>
			<li class="nav-item">
			<a href="customer-record.php" class="nav-link active" data-toggle="tab" href="#menu1" >Customers Behavior</a>
			</li>
			
		  </ul>
          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Address</th>
                    <th scope="col"  class="text-center">Contact</th>
                    <th scope="col"  class="text-center">Number of Orders</th>
                    <th scope="col"  class="text-center">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer_record->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->firstname . ' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->address;?></td>
                    <td class="text-center"><?php echo $val->contact;?></td>
                    <td class="text-center"><?php echo $val->count_order;?></td>
                    <td class="text-center">
					₱ 
					<?php
					$transcode =  $val->transcode;
					$order_total = $mysqli->query("SELECT SUM(a.qty * b.item_price) total from pos_order a left join pos_items b on a.item_id = b.item_id where a.trans_code='$transcode'");
					$row = $order_total->fetch_row();
					echo number_format($row[0],2);
					?>
					
					</td>
                  </tr>
				
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