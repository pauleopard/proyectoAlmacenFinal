<h2>Editar Proveedor</h2>
<?php !$info_proveedor ? exit('Hubo un error al cargar la información del proveedor') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/actualizarProveedor' ?>">


      <div class="form-group">
        <label for="Ruc">Ruc</label>
        <input type="text" name="Ruc" class="form-control" id="Ruc" placeholder="Ruc" value="<?= $info_proveedor->Ruc ?>">
      </div>
      <div class="form-group">
        <label for="RazonSocial">Razon social</label>
        <input type="text" name="RazonSocial" class="form-control" id="RazonSocial" placeholder="Razon Social" value="<?= $info_proveedor->RazonSocial ?>">
      </div>
      <div class="form-group">
        <label for="PersonaContacto">Persona Contacto</label>
        <input type="text" name="PersonaContacto" class="form-control" id="PersonaContacto" placeholder="Persona Contacto" value="<?= $info_proveedor->PersonaContacto ?>">
      </div>
      <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Direccion" value="<?= $info_proveedor->Direccion ?>">
      </div>
      <div class="form-group">
        <label for="NCelular">N. Celular</label>
        <input type="text" name="NCelular" class="form-control" id="NCelular" placeholder="Numero Celular" value="<?= $info_proveedor->NCelular ?>">
      </div>
      <div class="form-group">
        <label for="NTelefono">N. Telefono</label>
        <input type="text" name="NTelefono" class="form-control" id="NTelefono" placeholder="Numero Telefono " value="<?= $info_proveedor->NTelefono ?>">
      </div>
      <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" class="form-control" id="Correo" placeholder="Correo" value="<?= $info_proveedor->Correo ?>">
      </div>
      <div class="form-group">
        <label for="Ciudad">Ciudad</label>
        <input type="text" name="Ciudad" class="form-control" id="Ciudad" placeholder="Ciudad" value="<?= $info_proveedor->Ciudad ?>">
      </div>

      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>


      <input type="hidden" name="ProveedorID" value="<?= $info_proveedor->ProveedorID ?>">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/main/proveedoresLista' ?>" role="button">Cancelar</a>
    </form>
  </div>
</div>