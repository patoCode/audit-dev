<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edmin</title>
    <link type="text/css" href="<?php echo base_url()?>public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>public/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>public/assets/css/theme.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url()?>public/assets/fontawesome/css/font-awesome.css" rel="stylesheet">
    <!-- GC -->
    <?php foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <!-- END GC -->

  </head>
  <body>
    <?php $this->load->view('Administration/top'); ?>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <?php $this->load->view('Administration/main_menu'); ?>
                    </div>
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <?php
                                    if(isset($output)):
                                        $this->load->view('administration/bodyCRUD', $output);
                                    else:
                                        $this->load->view('Administration/'.$view);
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <!-- GC JS -->
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <!-- END GC JS -->
    <script src="<?php echo base_url() ?>public/assets/theme-js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>public/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>public/assets/theme-js/datatables/jquery.dataTables.js" type="text/javascript"></script>
</body>

</html>
