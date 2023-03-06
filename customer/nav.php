  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="../assets/img/logo.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="menu.php?data=Breakfast&id=1">Menu</a></li>
          <li><a href="accounts.php">Accounts</a></li>
          <li><a href="orders.php">Orders</a></li>
       
        </ul>
      </nav><!-- .navbar -->

      
      <span>
	  <a href="#"> <?php echo $_SESSION['name'];?> :  </a>
	    <a href="cart.php"> <span class="bi bi-cart4 fs-4"></span><span class="badge badge-warning"><?php echo $cntrow['count_val'];?></span></a> | <a href="logout.php"> Logout</a>
	  </span>
    </div>
  </header><!-- End Header -->
