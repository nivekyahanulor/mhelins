<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/package.php');?>
<style>
.ui-autocomplete {
z-index: 2150000000;
}
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Package Records</h1>
  
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Package </button></h5>

              <!-- Table with stripped rows -->
              <table class="table" id="inventory-report">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Image</th>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Details</th>
                    <th scope="col"  class="text-center">Price</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><img src="assets/menu/<?php echo $val->image;?>" width="200"></td>
                    <td class="text-center"><?php echo $val->item_name;?></td>
                    <td class="text-center"><?php echo $val->content;?></td>
                    <td class="text-center"> ₱ <?php echo number_format($val->item_price,2);?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->package_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->package_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-item<?php echo $val->package_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Package</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
						   <div class="row">
							<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->package_id;?>" required>
							  <input type="text" class="form-control" name="name" value="<?php echo $val->item_name;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="price"  value="<?php echo $val->item_price;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Details: </label>
							  <textarea type="text" class="form-control" name="content" required><?php echo $val->content;?></textarea>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Image: </label>
							  <input type="file" class="form-control" name="image" id="item_price">
							  <input type="hidden" class="form-control" name="image1"  value="<?php echo $val->image;?>" >
							</div>
							
							</div>
							</div>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-item">Save </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-item<?php echo $val->package_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Package</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Package Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->package_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-item">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
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
	
	    <div class="modal fade" id="add-item" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"> Package Details </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post"  enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Details: </label>
							  <textarea type="text" class="form-control" name="content" required></textarea>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Image: </label>
							  <input type="file" class="form-control" name="image" id="item_price"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							
						</div>
						
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-item">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>