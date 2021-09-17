<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SIST_NAME;?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/assets/theme-v1/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/assets/theme-v1/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/assets/theme-v1/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/assets/theme-v1/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>public/ims/logo-mini.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 text-center shadow-sm">
              <div class="brand-logo">
                <img src="<?php echo base_url();?>public/imgs/logo.png" alt="logo">
              </div>
              <h4>Hola empecemos!</h4>
              <h6 class="font-weight-light">Inicia sesión para continuar</h6>
                <form class="form pt-3" action="<?php echo base_url()?>Login/checkLogin" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="INGRESAR">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>public/assets/theme-v1/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>public/assets/theme-v1/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>public/assets/theme-v1/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>public/assets/theme-v1/js/template.js"></script>
  <script src="<?php echo base_url();?>public/assets/theme-v1/js/settings.js"></script>
  <script src="<?php echo base_url();?>public/assets/theme-v1/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
