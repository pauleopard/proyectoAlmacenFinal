<h2>Salida de  Articulo</h2>
<?php !$info_articulo ? exit('Hubo un error al cargar la información del articulo') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/salidaArticulo' ?>">

      <div class="form-group">
        <label for="Producto">Producto</label>
        <input type="text" name="Producto" class="form-control" id="Producto" placeholder="Producto" value="<?= $info_articulo->Producto ?>" disabled>
      </div>
      <div class="form-group">
        <label for="Marca">Marca</label>
        <input type="Marca" name="Marca" class="form-control" id="Marca" placeholder="Marca" value="<?= $info_articulo->Marca ?>" disabled>
      </div>
      <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" value="<?= $info_articulo->Descripcion ?>" disabled>
      </div>
      <div class="form-group">
        <label for="Stock">Stock</label>
        <input type="text" name="Stock" class="form-control" id="Stock" placeholder="Stock" value="<?= $info_articulo->Stock ?>" >
      </div>

      <div class="form-group">
        <label for="Cantidad">Cantidad de Salida</label>
        <input type="text" name="Cantidad" class="form-control" id="Cantidad" placeholder="Cantidad de salida" >
      </div>
      <div class="form-group">
        <label for="FechaSalida">Fecha Salida</label>
        <input type="text" name="FechaSalida" class="form-control" id="FechaSalida" value="<?php echo gmdate('Y')."-".gmdate('m')."-".gmdate('d') ;  ?>" >
      </div>

      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>
      
      <input type="hidden" name="ArticuloID" value="<?= $info_articulo->ArticuloID ?>">
      <button type="submit" class="btn btn-primary">Generar Salida</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/main/ordenSalida' ?>" role="button">Cancelar</a>
    </form>
  </div>
</div>