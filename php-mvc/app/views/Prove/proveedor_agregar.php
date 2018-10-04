<h2>Agregar Proveedor</h2>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/addProveedor' ?>">
      <div class="form-group">
        <label for="Ruc">Ruc</label>
        <input type="text" name="Ruc" class="form-control" id="Ruc" placeholder="Ruc" >
      </div>
      <div class="form-group">
        <label for="RazonSocial">Razon social</label>
        <input type="text" name="RazonSocial" class="form-control" id="RazonSocial" placeholder="Razon Social" >
      </div>
      <div class="form-group">
        <label for="PersonaContacto">Persona Contacto</label>
        <input type="text" name="PersonaContacto" class="form-control" id="PersonaContacto" placeholder="Persona Contacto" >
      </div>
      <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Direccion" >
      </div>
      <div class="form-group">
        <label for="NCelular">N. Celular</label>
        <input type="text" name="NCelular" class="form-control" id="NCelular" placeholder="Numero Celular" >
      </div>
      <div class="form-group">
        <label for="NTelefono">N. Telefono</label>
        <input type="text" name="NTelefono" class="form-control" id="NTelefono" placeholder="Numero Telefono " >
      </div>
      <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" class="form-control" id="Correo" placeholder="Correo" >
      </div>
      <div class="form-group">
        <label for="Ciudad">Ciudad</label>
        <input type="text" name="Ciudad" class="form-control" id="Ciudad" placeholder="Ciudad" >
      </div>
      
      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>
      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
  </div>
</div>