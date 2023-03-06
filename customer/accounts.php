<?php include('header.php');?>
<?php include('controller/account.php');?>
<body>
<?php include('nav.php');?>
  <main id="main">
    <div style="height:60px;"></div>
    <!-- ======= About Section ======= -->
    <section id="about"  class="section-bg">
      <div class="container" data-aos="fade-up">

		<div class="row">
		<div class="col-lg-3 position-relative about-img" data-aos="fade-up" data-aos-delay="150">
              <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active">Account Information</a>
            </div> 
		</div>
		<div class="col-lg-9 " data-aos="fade-up" data-aos-delay="300">
			<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Your Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
						<?php if(isset($_GET['updated'])){?>
							<div class="alert alert-info">
								Profile Information Updated!
							</div>
							<?php } ?>
		                    <form method="post">
                             <?php while($val = $account->fetch_object()){	?>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="fname" value="<?php echo $val->firstname;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastname" value="<?php echo $val->lastname;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br> 
							  <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mobile Number</label> 
                                <div class="col-8">
                                  <input id="lastname" name="contact" value="<?php echo $val->contact;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br> 
							  <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Address</label> 
                                <div class="col-8">
                                  <textarea name="address" value="" class="form-control here" type="text"><?php echo $val->address;?></textarea>
                                </div>
                              </div>
							  <br>
                             <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name </label> 
                                <div class="col-8">
                                  <input id="username" name="username" value="<?php echo $val->username;?>" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                             <br>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label"> Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="password" value="<?php echo $val->password;?>" class="form-control here" type="password">
                                </div>
                              </div> 
							    <br>
							 <?php } ?>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="update-profile" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>

		  </div>
		  </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->
<?php include('footer.php');?>
