    <!-- GC -->
    <?php foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <!-- END GC -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Parametros
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/cliente">REGISTRO DE CLIENTES</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/sociedad">REGISTRO DE SOCIEDAD</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/regimen">REGISTRO DE REGIMEN</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/actividad">REGISTRO DE ACTIVIDAD</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/periodo">REGISTRO DE PERIODO</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/certificado">REGISTRO DE CERTIFICADOS</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/pais">REGISTRO DE PAIS</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/ciudad">REGISTRO DE CIUDAD</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/obligacion">REGISTRO DE OBLIGACIONES</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url() ?>Dashboard/institucion">REGISTRO DE INSTITUCIONES</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!-- <table class="table table-hover"> -->
        <?php echo $output; ?>
    <!-- </table> -->

    <!-- GC JS -->
    <?php if(isset($js_files)): ?>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    <?php else: ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <?php endif; ?>
    <!-- END GC JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
