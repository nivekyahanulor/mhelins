<?php include('header.php');?>
<?php include('controller/order.php');?>
<body>
<?php include('nav.php');?>
  <main id="main">
    <div style="height:60px;"></div>
    <!-- ======= About Section ======= -->
    <section id="about"  class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>MENU</h2>
          <p><?php echo $_GET['data'];?></p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-3 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
				<div class="list-group ">
				 <a href="#" class="list-group-item list-group-item-action active">Category</a>
				  <?php
					$category = $mysqli->query("SELECT * from pos_item_category");
					while($val = $category->fetch_object()){	
				  ?>
				 <a href="menu.php?data=<?php echo $val->name;?>&id=<?php echo $val->category_id;?>" class="list-group-item list-group-item-action "> <i class="bi bi-record-fill"></i> <?php echo $val->name;?></a>
				<?php } ?>
				</div> 
          </div>
          <div class="col-lg-9 " data-aos="fade-up" data-aos-delay="300">
		   <?php if(isset($_GET['added'])){?>
		  	<div class="alert alert-info alert-dismissable">
				<strong>Order Added!</strong> Please see your cart!
			</div>
		    <?php } ?>
			<div class="row">
			 <?php
			    $cat_id = $_GET['id'];
				$menu = $mysqli->query("SELECT * from pos_items where category='$cat_id'");
				while($val2 = $menu->fetch_object()){	
				
			   ?> 
			     <div class="col-md-4">
				 <form method="post">
					<div class="card rounded">
						<div class="card-image">
							<img class="img-fluid" src="../accounts/assets/menu/<?php echo $val2->image;?>" style="width:440px;height:220px;" alt="Alternate Text" />
						</div>
						
						<div class="card-body text-center">
							<div class="ad-title m-auto">
								<h5><?php echo $val2->item_name;?></h5>
								<span class="card-detail-badge">₱ <?php echo $val2->item_price;?></span>
							</div>
							<input type="hidden" value="<?php echo $_GET['data'];?>" name="data">
							<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
							<input type="hidden" value="<?php echo $val2->item_id;?>" name="item_id">
							<input type="hidden" value="<?php echo $_SESSION['id'];?>" name="customer_id">
							<button type="submit" class="btn btn-primary btn-md" name="add-order">ADD TO CART</button>
						</div>
					</div>
					  <br><br>
				</form>
				</div>
				
				<?php } ?>
			</div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->
<?php include('footer.php');?>
