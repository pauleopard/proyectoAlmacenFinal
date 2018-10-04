<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">
    <h2>Generar orden de salida</h2>

    <table class="table table-striped">
      <thead class="danger">
        <th>Cod</th>
        <th>Producto</th>
        <th>Marca</th>
        <th>Descripcion</th>
        <th>Stock</th>
        <th>Salida</th>
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
          echo "<td>{$row['stock']}</td>";
          echo "<td><a style='color:#2ae509' href='" . FOLDER_PATH ."/main/articuloListado/{$row['ArticuloID']}'>Salida</a></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>