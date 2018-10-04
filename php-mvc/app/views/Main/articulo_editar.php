<h2>Editar Articulo</h2>
<?php !$info_articulo ? exit('Hubo un error al cargar la información del articulo') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/actualizarArticulo' ?>">

      <div class="form-group">
        <label for="Producto">Producto</label>
        <input type="text" name="Producto" class="form-control" id="Producto" placeholder="Producto" value="<?= $info_articulo->Producto ?>">
      </div>
      <div class="form-group">
        <label for="Marca">Marca</label>
        <input type="Marca" name="Marca" class="form-control" id="Marca" placeholder="Marca" value="<?= $info_articulo->Marca ?>">
      </div>
      <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" value="<?= $info_articulo->Descripcion ?>">
      </div>
      <div class="form-group">
        <label for="PrecioCompra">Precio Compra</label>
        <input type="text" name="PrecioCompra" class="form-control" id="PrecioCompra" placeholder="Precio Compra" value="<?= $info_articulo->PrecioCompra ?>">
      </div>
      <div class="form-group">
        <label for="Stock">Stock</label>
        <input type="text" name="Stock" class="form-control" id="Stock" placeholder="Stock" value="<?= $info_articulo->Stock ?>">
      </div>
      <div class="form-group">
        <label for="UnidadMedida">Unidad de medida</label>
        <input type="text" name="UnidadMedida" class="form-control" id="UnidadMedida" placeholder="Unidad de medida" value="<?= $info_articulo->UnidadMedida ?>">
      </div>
      <div class="form-group">
        <label for="FechaIngreso">Fecha Ingreso</label>
        <input type="text" name="FechaIngreso" class="form-control" id="FechaIngreso" placeholder="YYYY-MM-DD" value="<?= $info_articulo->FechaIngreso ?>">
      </div>
      <div class="form-group">
          <p>Categorias
          <select name="CategoriaID" value="<?= $info_articulo->CategoriaID ?>">
           <?php echo $listas; ?>
          </select>
        </p>
      </div>
      <div class="form-group">
          <p>Proveedores
          <select name="ProveedorID" value="<?= $info_articulo->ProveedorID ?>">
           <?php echo $listado; ?>
          </select>
        </p>
      </div>
      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>


      <input type="hidden" name="ArticuloID" value="<?= $info_articulo->ArticuloID ?>">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/main/articulosLista' ?>" role="button">Cancelar</a>
    </form>
  </div>
</div>