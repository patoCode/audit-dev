<button type="button" class="btn btn-primary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#modalActividades">
    <i class="ti-plus"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="modalActividades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Actividad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-actividad" method="POST" action="<?php echo base_url() ?>Customer/addActividad" data-uri="<?php echo base_url() ?>Customer/addActividad">
                    <input type="hidden" value=" <?php echo $id; ?>" name="cliente">
                    <div class="mb-3">
                        <label class="form-label">Actividades</label>
                        <select name="actividad" class="form-control">
                            <option value="0" selected>-- SELECCIONES UNA ACTIVIDAD --</option>
                            <?php foreach( $actividadList as $elemento):?>
                                <option value="<?php echo $elemento->ID_ACTIVIDAD ?>"><?php echo $elemento->ACTIVIDAD_ECONOMICA; ?></option>
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