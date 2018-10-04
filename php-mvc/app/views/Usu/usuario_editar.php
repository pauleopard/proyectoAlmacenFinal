<h2>Editar Usuario</h2>
<?php !$info_usuario ? exit('Hubo un error al cargar la información del usuario') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/actualizarUsuario' ?>">

      <div class="form-group">
        <label for="Usuario">Usuario</label>
        <input type="text" name="Usuario" class="form-control" id="Usuario" placeholder="Usuario" value="<?= $info_usuario->Usuario ?>">
      </div>
      <div class="form-group">
        <label for="Clave">Clave</label>
        <input type="password" name="Clave" class="form-control" id="Clave" placeholder="Clave" value="<?= $info_usuario->Clave ?>">
      </div>
      <div class="form-group">
        <label for="Nombre_Apellido">Nombre y Apellido</label>
        <input type="text" name="Nombre_Apellido" class="form-control" id="Nombre_Apellido" placeholder="Nombre y Apellido" value="<?= $info_usuario->Nombre_Apellido ?>">
      </div>
      <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" class="form-control" id="Correo" placeholder="Correo" value="<?= $info_usuario->Correo ?>">
      </div>
      <div class="form-group">
        <label for="NCelular">Numero Celular</label>
        <input type="text" name="NCelular" class="form-control" id="NCelular" placeholder="Numero Celular" value="<?= $info_usuario->NCelular ?>">
      </div>
      <div class="form-group">
          <p>Cargo
          <select name="TipoUsuarioID" value="<?= $info_usuario->Clave ?>">
           <?php echo $lista; ?>
          </select>
        </p>
      </div>

      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>


      <input type="hidden" name="UsuarioID" value="<?= $info_usuario->UsuarioID ?>">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/main/usuariosLista' ?>" role="button">Cancelar</a>
    </form>
  </div>
</div>