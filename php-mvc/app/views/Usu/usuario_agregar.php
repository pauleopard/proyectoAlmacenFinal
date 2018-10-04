<h2>Agregar Usuario</h2>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/addUsuario' ?>">
      <div class="form-group">
        <label for="Usuario">Usuario</label>
        <input type="text" name="Usuario" class="form-control" id="Usuario" placeholder="Usuario" >
      </div>
      <div class="form-group">
        <label for="Clave">Clave</label>
        <input type="password" name="Clave" class="form-control" id="Clave" placeholder="Clave" >
      </div>
      <div class="form-group">
        <label for="Nombre_Apellido">Nombre y Apellido</label>
        <input type="text" name="Nombre_Apellido" class="form-control" id="Nombre_Apellido" placeholder="Nombre y Apellido" >
      </div>
      <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" class="form-control" id="Correo" placeholder="Correo" >
      </div>
      <div class="form-group">
        <label for="NCelular">Numero Celular</label>
        <input type="text" name="NCelular" class="form-control" id="NCelular" placeholder="Numero Celular" >
      </div>
      <div class="form-group">
          <p>Cargo
          <select name="TipoUsuarioID">
           <?php echo $lista; ?>
          </select>
        </p>
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