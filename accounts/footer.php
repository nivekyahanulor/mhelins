
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ORDERING SYSTEM</span></strong>. All Rights Reserved 2022
    </div>
    <div class="credits">
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/moment.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/datatable/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>

  <?php
    $time_table = $mysqli->query("SELECT a.* ,b.* from pos_checkout_order a LEFT JOIN pos_customer b on a.customer_id = b.customer_id");
	$calendar = array();
	
			while($res = $time_table->fetch_object()){ 
				 $start = $res->delivery_date;
				 $startDate  = date("Y-m-d", strtotime($start));
				 $calendar[] = array( 
									  "transcode" => $res->transcode,
									  "contact" => $res->contact,
									  "email" => $res->email,
									  "date_added" => $res->date_added,
									  "meal_status" => $res->meal_status,
									  "status" => $res->status,
									  "delivery_date" => $res->delivery_date,
									  "title" => $res->firstname . ' ' . $res->lastname,
									  "start" => $startDate."T00:00:00.000",
									  "end"   => $startDate."T23:59:00",
									  "backgroundColor" => "blue",
									  "count" => "0",
									);
			}
  ?>
  <script>
  	
	$(document).ready(function() {
		$('#closecalendar').click(function() {
			$('#calendarmodal').modal('hide');
		});
		$('#calendar').fullCalendar({
			defaultView: 'agendaWeek',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaWeek'
			},
			  views: {
				month: { columnHeaderFormat: 'ddd', displayEventEnd: true, eventLimit: 3 },
				week: { columnHeaderFormat: 'ddd DD', titleRangeSeparator: ' \u2013 ' },
				day: { columnHeaderFormat: 'dddd' },
			},
			selectable: true,
			events: <?php echo json_encode($calendar);?>,
			

			eventClick:  function(event, jsEvent, view) {
					 $('#calendarmodal').modal('show');
					 $('.modal').find('#name').html('Customer Name :' + event.title + '<br>'); 
					 $('.modal').find('#contact').html('Contact # :' + event.contact + '<br>'); 
					 $('.modal').find('#email').html('Email : ' + event.email + '<br>'); 
					 $('.modal').find('#transcode').html('Trans Code : ' + event.transcode + '<br>'); 
					// $('.modal').find('#orderdate').html('Date Ordered : <br>' +$.fullCalendar.moment(event.date_added).format('YYYY/MM/DD')+ '<br><br>');
					 $('.modal').find('#orderdate').html('Date Ordered: ' + event.date_added + '<br>'); 
					 $('.modal').find('#delivery_date').html('Delivery Date: ' + event.delivery_date + '<br>'); 
					 if(status != 1){
						$('.modal').find('#paymentstatus').html('Payment Status: Paid' + '<br>');
					 }					 
					$('.modal').find('#paymentmethod').html('Payment Method: GCASH' + '<br>');
					$('.modal').find('#mealstatus').html('Meal Status: '  + event.meal_status + '<br>'); 
					$('.modal').find('#view_orders').html('<a href="order-details.php?data='+ event.transcode + '" target="_blank">View Orders</a>'); 
					 
					
        }, eventRender: function(info,cell) {
			if(info.count ==1){
				$('.fc-day[data-date="'+$.fullCalendar.moment(info.start).format()+'"]').css('background', "red");
			}
		  }
		});
		
	});
  
  
  </script>
  	<div class="modal" id="calendarmodal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Order Details</h5>
              
              </div>
              <div class="modal-body">
											
						 <div id="name"></div>
						 <div id="contact"></div>
						 <div id="email"></div>
						 <div id="transcode"></div>
						 <div id="orderdate"></div>
						 <div id="delivery_date"></div>
						 <div id="paymentstatus"></div>
						 <div id="paymentmethod"></div>
						 <div id="mealstatus"></div>
						 <div id="view_orders"></div>
					
											
              </div>
			   <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" id="closecalendar" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
		
</body>

</html>