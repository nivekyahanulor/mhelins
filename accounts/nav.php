
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
	  <img src="../assets/img/logo.png" width="120px" alt="">
		<center>
        <span class="d-none d-lg-block">MHENLINS</span>
			</center>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

 

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

   
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
		 
      <li class="nav-item">
        <a class="nav-link <?php echo $a;?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span> DASHBOARD </span>
        </a>
      </li>

	  <li class="nav-item">
        <a class="nav-link  <?php echo $c;?>" data-bs-target="#forms-order" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart-plus"></i>
          <span> ORDERS </span>
        </a>
		  <ul id="forms-order" class="nav-content " data-bs-parent="#sidebar-order">
          <li>
            <a href="orders.php?data=pending">
              <i class="bi bi-circle"></i><span> Pending </span>
            </a>
          </li>
		    <li>
            <a href="orders.php?data=approved">
              <i class="bi bi-circle"></i><span> Approved </span>
            </a>
          </li>
		  <li>
            <a href="orders.php?data=cancelled">
              <i class="bi bi-circle"></i><span>Cancelled</span>
            </a>
          </li> 
		
		  <li>
            <a href="orders.php?data=completed">
              <i class="bi bi-circle"></i><span>Completed</span>
            </a>
          </li>
        </ul>
    </li>
	 
	  <li class="nav-item">
        <a class="nav-link <?php echo $f;?>" href="timetable.php">
         <i class="bi bi-clock"></i>
          <span> TIME TABLE </span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link <?php echo $f;?>" href="customer.php">
          <i class="bi bi-people"></i>
          <span> CUSTOMER </span>
        </a>
      </li>
	
	
	  
	<li class="nav-item">
        <a class="nav-link <?php echo $i;?>" href="system-users.php">
          <i class="bi bi-person-circle"></i>
          <span> SYSTEM USER </span>
        </a>
      </li>
	  
  
     <li class="nav-item">
        <a class="nav-link  <?php echo $j;?>" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i>
          <span> SETTINGS </span>
        </a>
		  <ul id="forms-nav2" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="menu.php">
              <i class="bi bi-circle"></i><span> MENU </span>
            </a>
          </li>
		  
		  <li>
            <a href="category.php">
              <i class="bi bi-circle"></i><span>CATEGORY</span>
            </a>
          </li> 
		  <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>SYSTEM</span>
            </a>
          </li>
        </ul>
    </li>
	
    <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span> SIGN OUT </span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
