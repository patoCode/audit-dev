  <?php $this->load->view('administration/adds/filter_profile'); ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="border-bottom text-center pb-4">
              <div class="mb-3">
                <h3><?php echo $cliente->RAZON_SOCIAL; ?>  </h3>
                <div class="d-flex align-items-center justify-content-center">
                  <h5 class="mb-0 me-2 text-muted">NIT: <?php echo check_empty($cliente->NIT); ?></h5>
                </div>
              </div>
              <img src="<?php echo base_url(); ?>public/assets/theme-v1/images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3">
            </div>
            <div class="border-bottom py-4">
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
                      <i class="ti-agenda"></i> Servicios
                    </a>
                  </li>
                   <li role="presentation" class="active nav-item">
                    <a class="nav-link" data-toggle="pill" href="#v-pills-documents" role="tab" aria-selected="true" aria-controls="v-pills-documents" id="v-pills-documents-tab">
                      <i class="ti-book"></i> Documentos
                    </a>
                  </li>
                  <li role="presentation" class="active nav-item">
                    <a class="nav-link" data-toggle="pill" href="#v-pills-credentials" role="tab" aria-selected="true" aria-controls="v-pills-credentials" id="v-pills-credentials-tab">
                      <i class="ti-book"></i> Credenciales
                    </a>
                  </li>
              </ul>
            </div>

            <div class="tab-content border-0" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-profile" role="tab-panel" aria-labelledby="v-pills-profile-tab">
                <address>
                  <p class="font-weight-bold">
                    CI:  <?php echo check_empty($cliente->CI).' '.check_empty($cliente->EXP); ?>
                  </p>
                  <p class="font-weight-bold">
                    Teléfono Domicilio: <?php echo check_empty($cliente->TELEFONO_DOM);?>
                  </p>
                  <p class="font-weight-bold">
                    Celular Rep. Legal: <?php echo check_empty($cliente->CELULAR_REP_LEGAL); ?>
                  </p>
                  <p class="font-weight-bold">
                    Correo Electronico: <?php echo check_empty($cliente->EMAIL); ?>
                  </p>
                  <p class="d-block me-2">
                    Propietario/Rep. Legal: <?php echo $cliente->PROPIETARIO_REP_LEGAL; ?>
                  </p>
                  <p class="">
                    Zona: <?php echo $cliente->ZONA; ?>
                  </p>
                  <p class="">
                    Direccion Fiscal: <?php echo $cliente->DIRECCION_BASE; ?>
                  </p>
                </address>
              </div>
              <div class="tab-pane fade" id="v-pills-home" role="tab-panel" aria-labelledby="v-pills-home-tab">
                complementario
              </div>
              <!-- CREDENCIALES -->
              <div class="tab-pane fade" id="v-pills-credentials" role="tab-panel" aria-labelledby="v-pills-credentials-tab">
                <?php  $this->load->view('Administration/modals/modal_credentials', array('instituciones' => $instituciones, 'id'=>$cliente->ID_CLIENTE)); ?>
                <?php if($credenciales != null): ?>
                <table class="table table-bordered">
                  <thead>
                    <th>Ususario</th>
                    <th>Password</th>
                    <th>Institucion</th>
                    <th> - </th>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($credenciales as $credencial):?>
                      <tr data-id="<?php echo $credencial->ID_CREDENCIALES; ?>">
                        <td><?php echo $credencial->USER; ?></td>
                        <td>
                          <input type="password" value="<?php echo $credencial->PASSWORD; ?>" readonly class="border-0 input-sm" id="password-<?php echo $credencial->ID_CREDENCIALES; ?>">
                          <i class="ti-eye" onclick="viewPassword(<?php echo $credencial->ID_CREDENCIALES; ?>);">
                          </i>
                        </td>
                        <td>
                          <?php echo $credencial->INSTITUCION; ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-info">
                            <i class="ti-pencil-alt"></i>
                          </button>
                           <button type="button" class="btn btn-danger" onclick="removeCredential(<?php echo $credencial->ID_CREDENCIALES; ?>,'<?php echo base_url()."Customer/deleteCredencials" ?>')">
                            <i class="ti-trash" ></i>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach;
                      ?>
                  </tbody>
                </table>
              <?php else: ?>
                <p class="alert alert-warning">
                  Este cliente no tiene credenciales asociadas
                </p>
                <?php endif; ?>

              </div>

              <!-- DOCUMENTS -->
              <div class="tab-pane fade" id="v-pills-documents" role="tab-panel" aria-labelledby="v-pills-documents-tab">
                UPLOAD
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="border-bottom py-4">
      <p>Actividades</p>
      <div>
      <?php
        if($actividades != null): ?>
        <?php foreach ($actividades as $actividad):?>
            <?php echo badge_text_remove($actividad->actEconomica, $actividad->ID_CLI_ACT);?>
          <?php endforeach;?>
          <?php  else: ?>
            <p class="alert alert-warning">
              Ninguna actividad asociada
            </p>
        <?php endif;?>
        <?php $this->load->view('Administration/modals/modal_actividades', array('actividadList'=>$actividadList,'id'=>$cliente->ID_CLIENTE)); ?>
      </div>
    </div>
  </div>
</div>