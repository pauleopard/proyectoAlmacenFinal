<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">
    <h2>Listado de Proveedores</h2>

    <table class="table table-striped">
      <thead class="danger">
        <th>Cod</th>
        <th>Ruc</th>
        <th>Razon Social</th>
        <th>Persona Contacto</th>
        <th>Direccion</th>
        <th>N. Celular</th>
        <th>N. Telefono</th>
        <th>Correo</th>
        <th>Ciudad</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        <?php
        while ($row = $proveedores->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['ProveedorID']}</td>";
          echo "<td>{$row['Ruc']}</td>";
          echo "<td>{$row['RazonSocial']}</td>";
          echo "<td>{$row['PersonaContacto']}</td>";
          echo "<td>{$row['Direccion']}</td>";
          echo "<td>{$row['NCelular']}</td>";
          echo "<td>{$row['NTelefono']}</td>";
          echo "<td>{$row['Correo']}</td>";
          echo "<td>{$row['Ciudad']}</td>";
          echo "<td><a style='color:#2ae509' href='" . FOLDER_PATH ."/main/proveedorLista/{$row['ProveedorID']}'>Editar</a></td>";
         echo "<td><a style='color:red' href='" . FOLDER_PATH ."/main/eliminarProveedor/{$row['ProveedorID']}'>Eliminar</a></td>";
         echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>