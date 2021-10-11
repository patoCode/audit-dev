<form class="row row-cols-lg-auto align-items-center mb-3" method="POST" data-uri="<?php echo base_url() ?>Customer/profile/" id="filter-customer">
  <div class="col-6">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
    <div class="input-group">
      <select name="customer" class="form-control" placeholder="Cliente" id="input-filter"></select>
    </div>
  </div>
  <div class="col-6">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>