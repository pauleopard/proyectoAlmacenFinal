
<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>

<div class="row">
  <div class="col-md-12">
    <h2>Listado de Articulos</h2>

    <table class="table table-striped">
      <thead>
        <th>Cod</th>
        <th>Producto</th>
        <th>Marca</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>U. med</th>
        <th>F. Ingreso</th>
        <th>Categoria</th>
        <th>Proveedor</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        <?php
        while ($row = $articulos->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['ArticuloID']}</td>";
          echo "<td>{$row['Producto']}</td>";
          echo "<td>{$row['Marca']}</td>";
          echo "<td>{$row['Descripcion']}</td>";
          echo "<td>{$row['PrecioCompra']}</td>";
          echo "<td>{$row['stock']}</td>";
          echo "<td>{$row['UnidadMedida']}</td>";
          echo "<td>{$row['FechaIngreso']}</td>";
          echo "<td>{$row['NombreCat']}</td>";
          echo "<td>{$row['RazonSocial']}</td>";
          echo "<td><a style='color:#2ae509' href='" . FOLDER_PATH ."/main/articuloLista/{$row['ArticuloID']}'>Editar</a></td>";
          echo "<td><a style='color:red' href='" . FOLDER_PATH ."/main/eliminarArticulo/{$row['ArticuloID']}'>Eliminar</a></td>";
          
          echo '</tr>';
        }
        ?>
        
      </tbody>
    </table>
  
  </div>
</div>