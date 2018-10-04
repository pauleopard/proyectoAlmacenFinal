<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">
    <h2>Historial de Salida</h2>

    <table class="table table-striped">
      <thead class="danger">
        <th>Cod Salida</th>
        <th>Producto</th>
        <th>Marca</th>
        <th>Descripcion</th>
        <th>Cantidad salida</th>
        <th>Fecha ingreso</th>
        <th>Fecha Salida</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        <?php
        while ($row = $articulos->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['SalidaID']}</td>";
          echo "<td>{$row['Producto']}</td>";
          echo "<td>{$row['Marca']}</td>";
          echo "<td>{$row['Descripcion']}</td>";
          echo "<td>{$row['Cantidad']}</td>";
          echo "<td>{$row['FechaIngreso']}</td>";
          echo "<td>{$row['FechaSalida']}</td>";
          echo "<td><a style='color:red' href='" . FOLDER_PATH ."/main/eliminarSalida/{$row['SalidaID']}'>Eliminar</a></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>