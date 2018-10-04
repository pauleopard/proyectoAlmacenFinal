<h2>Agregar Articulo</h2>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/addArticulo' ?>">

      <div class="form-group">
        <label for="Producto">Producto</label>
        <input type="text" name="Producto" class="form-control" id="Producto" placeholder="Producto" >
      </div>
      <div class="form-group">
        <label for="Marca">Marca</label>
        <input type="text" name="Marca" class="form-control" id="Marca" placeholder="Marca" >
      </div>
      <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" >
      </div>
      <div class="form-group">
        <label for="PrecioCompra">Precio Compra</label>
        <input type="text" name="PrecioCompra" class="form-control" id="PrecioCompra" placeholder="Precio Compra" >
      </div>
      <div class="form-group">
        <label for="Stock">Stock</label>
        <input type="text" name="Stock" class="form-control" id="Stock" placeholder="Stock" >
      </div>
      <div class="form-group">
        <label for="UnidadMedida">Unidad de medida</label>
        <input type="text" name="UnidadMedida" class="form-control" id="UnidadMedida" placeholder="Unidad de medida" >
      </div>
      <div class="form-group">
        <label for="FechaIngreso">Fecha Ingreso</label>
        <input type="text" name="FechaIngreso" class="form-control" id="FechaIngreso"  value="<?php echo gmdate('Y')."-".gmdate('m')."-".gmdate('d') ;  ?>" >
      </div>
      <div class="form-group">
          <p>Categorias
          <select name="CategoriaID">
           <?php echo $listas; ?>
          </select>
        </p>
      </div>
      <div class="form-group">
          <p>Proveedores
          <select name="ProveedorID">
           <?php echo $listado; ?>
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