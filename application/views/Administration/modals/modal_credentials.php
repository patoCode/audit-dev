<!-- Click on Modal Button -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalForm">
    AGREGAR CREDENCIALES
</button>
<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Credenciales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-credentials" method="POST" action="<?php echo base_url() ?>Customer/addCredentials" data-uri="<?php echo base_url() ?>Customer/addCredentials">
                    <input type="hidden" value=" <?php echo $id; ?>" name="cliente">

                    <div class="mb-3">
                        <label class="form-label">USUARIO</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="USUARIO" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Institucion</label>
                        <select name="institucion" class="form-control">
                            <option value="0" selected>-- SELECCIONES UNA INSTITURCION --</option>
                            <?php foreach( $instituciones as $elemento):?>
                                <option value="<?php echo $elemento->ID_INSTITUCION ?>"><?php echo $elemento->INSTITUCION; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-primary float-end">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>