<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/dashboard.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">PRE-ORDERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-basket3"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalpreorders;?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
			
			<div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">PENDING ORDERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bag"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalpendingorders;?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

			<div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">ONGOING ORDERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check2-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalongoingorders;?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

			<div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">FOR DELIVERY ORDERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
					<i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totaldeliveryorders;?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

			<div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">COMPLETED ORDERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
					<i class="bi bi-check-square-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalcompletedorders;?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>


            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">CANCELLED ORDERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
					<i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalcancelledorders;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>
			
		
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL CUSTOMERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalcustomers;?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div>
			
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL ADMINISTRATORS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalpos_users;?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div>

    
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('footer.php');?>