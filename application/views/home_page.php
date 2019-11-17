<?php
	$session_data = $this->session->userdata('logged_in');
	$session_username = $session_data['username'];

	if (!$session_data) {
		redirect(base_url('login_page'));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>static/images/jasper_jean.ico"/>
  <meta name="description" content="Jasper Jean - We Transport People.">
  <meta name="author" content="Tristan Rosales">

  <title>eJBus - Dashboard</title>

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>static/SBAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url(); ?>static/SBAdmin/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>static/SBAdmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>static/css/parsley.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link href="<?php echo base_url(); ?>static/js/libraries/jquery-confirm-v3.3.4/dist/jquery-confirm.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
		
		<?php include 'pages/sidebar.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

				<?php include 'pages/topbar.php';?>
				
        <!-- Begin Reservation -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Reservation List</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btnAddProduct btn btn-dark btn-icon-split" href="#" data-toggle="modal" data-target="#reserveNowModal">
                <span class="icon text-white-50">
                  <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Reserve Now!</span>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tbl_reservation" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Origin</th>
                      <th>Destination</th>
											<th>Date</th>
											<th>Time</th>
											<th>Bus</th>
											<th>Date Reserved</th>
                    </tr>
                  </thead>
                  
                  <tbody>
										<?php foreach($reservations as $reservation){?>
											<tr>
												<td><?php echo $reservation->reservation_origin;?></td>
												<td><?php echo $reservation->reservation_destination;?></td>
												<td><?php echo $reservation->reservation_date;?></td>
												<td><?php echo $reservation->reservation_time;?></td>
												<td><?php echo $reservation->bus_name;?></td>
												<td><?php echo $reservation->date_reserved;?></td>
											</tr> 
                    <?php }?>
                  </tbody>

                  <tfoot>
                    <tr>
											<th>Origin</th>
                      <th>Destination</th>
											<th>Date</th>
											<th>Time</th>
											<th>Bus</th>
											<th>Date Reserved</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
				<!-- End Reservation -->
				
      </div>
      <!-- End of Main Content -->

      <?php include 'pages/footer.php';?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
	</a>

	<?php include 'pages/modals/reserve_now.php';?>
	
	<?php include 'pages/modals/logout.php';?>
	
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>static/SBAdmin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>static/SBAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>static/js/libraries/jquery.maskMoney.min.js"></script>
	
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>static/SBAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>static/SBAdmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>static/SBAdmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>static/SBAdmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
	<script src="<?php echo base_url(); ?>static/SBAdmin/js/demo/datatables-demo.js"></script>
	<script src="<?php echo base_url(); ?>static/js/libraries/parsley.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="<?php echo base_url(); ?>static/js/libraries/jquery-confirm-v3.3.4/js/jquery-confirm.js"></script>
	<script src="<?php echo base_url(); ?>static/js/home.js"></script>

</body>

</html>
