<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="border-bottom text-center pb-4">
              <img src="<?php echo base_url(); ?>public/assets/theme-v1/images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3">
              <div class="mb-3">
                <h3><?php echo $cliente->RAZON_SOCIAL; ?>  </h3>
                <div class="d-flex align-items-center justify-content-center">
                  <h5 class="mb-0 me-2 text-muted">NIT: <?php echo check_empty($cliente->NIT); ?></h5>

                </div>
              </div>

            </div>

            <div class="border-bottom py-4">
              <p>Actividades</p>
              <div>
                  <?php echo badge_text("prueba"); ?>
                  <?php echo badge_text("Mensaje de prueba "); ?>
                  <?php echo badge_text("Actividades de prueba dos"); ?>
                  <?php echo badge_text("prueba"); ?>
                  <?php echo badge_text("prueba"); ?>
                  <?php echo badge_text("prueba"); ?>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="mt-4 py-2 border-top border-bottom">
              <ul class="nav profile-navbar" role="tablist" id="v-pills-tab" role="tablist">
                <li role="presentation" class=" nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#v-pills-profile" role="tab" aria-selected="false" aria-controls="v-pills-profile" id="v-pills-profile-tab">
                    <i class="ti-user ms-2"></i> Perfil
                    </a>
                  </li>
                  <li role="presentation" class="active nav-item">
                    <a class="nav-link" data-toggle="pill" href="#v-pills-home" role="tab" aria-selected="true" aria-controls="v-pills-home" id="v-pills-home-tab">
                      <i class="ti-agenda"></i> Complementario
                    </a>
                  </li>
              </ul>
            </div>

            <div class="tab-content border-0" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-profile" role="tab-panel" aria-labelledby="v-pills-profile-tab">
                <address>
                  <p class="font-weight-bold">CI:  <?php echo check_empty($cliente->CI).' '.check_empty($cliente->EXP); ?></p>
                  <p class="font-weight-bold">Teléfono Domicilio: <?php echo check_empty($cliente->TELEFONO_DOM);?></p>
                  <p class="font-weight-bold">Celular Rep. Legal: <?php echo check_empty($cliente->CELULAR_REP_LEGAL); ?> </p>
                  <p class="font-weight-bold">Correo Electronico: <?php echo check_empty($cliente->EMAIL); ?></p>
                </address>
              </div>
              <div class="tab-pane fade" id="v-pills-home" role="tab-panel" aria-labelledby="v-pills-home-tab">
                <address>
                  <?php dd($cliente); ?>
                  <p class="d-block me-2">Propietario/Rep. Legal: <?php echo $cliente->PROPIETARIO_REP_LEGAL; ?></p>
                  <p class="">Zona: <?php echo $cliente->ZONA; ?></p>
                  <p class="">Direccion Fiscal: <?php echo $cliente->DIRECCION_BASE; ?></p>
                </address>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>