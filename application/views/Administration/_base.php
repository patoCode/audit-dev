<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SIST_NAME; ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/feather/feather.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/theme-v1/js/select.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/theme-v1/css/vertical-layout-light/style.css">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/public/assets/theme-v1/images/favicon.png" />

	<!-- GC -->
	<?php if(isset($css_files)): ?>
		<?php foreach($css_files as $file): ?>
		    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
	<?php endif; ?>
	<!-- END GC -->

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php $this->load->view('Administration/top'); ?>
      <!-- partial -->

      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('Administration/main_menu'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">

                  <h3 class="font-weight-bold">Bienvenido usuario</h3>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
			<?php
				if(isset($output)):
				    $this->load->view('administration/bodyCRUD', $output);
				else:
				    $this->load->view('Administration/'.$view);
			    endif;
		    ?>
          </div>


        <footer class="footer fixed-bottom">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  DoIO.se <br> <a href="#" target="_blank">Audit</a> Software handycraft by DoIO</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

	<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-ui/jquery-ui.min.js "></script>
	<!-- GC JS -->
	<?php if(isset($js_files)): ?>
		<?php foreach($js_files as $file): ?>
		    <script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
	<?php else: ?>
	<?php endif; ?>
	<!-- END GC JS -->


	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/js/vendor.bundle.base.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/chart.js/Chart.min.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/dataTables.select.min.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/off-canvas.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/hoverable-collapse.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/template.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/settings.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/todolist.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/dashboard.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/theme-v1/js/Chart.roundedBarCharts.js"></script>

</body>

</html>

