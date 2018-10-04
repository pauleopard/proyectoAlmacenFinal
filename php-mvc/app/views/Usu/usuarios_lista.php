<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">
    <h2>Listado de Usuarios</h2>

    <table class="table table-striped">
      <thead class="danger">
        <th>Codigo</th>
        <th>Usuario</th>
        <th>Nombre y apellidos</th>
        <th>Correo</th>
        <th>NCelular</th>
        <th>Cargo</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        <?php
        while ($row = $usuarios->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['UsuarioID']}</td>";
          echo "<td>{$row['Usuario']}</td>";
          echo "<td>{$row['Nombre_Apellido']}</td>";
          echo "<td>{$row['Correo']}</td>";
          echo "<td>{$row['NCelular']}</td>";
          echo "<td>{$row['Cargo']}</td>";
          echo "<td><a style='color:#2ae509' href='" . FOLDER_PATH ."/main/usuarioLista/{$row['UsuarioID']}'>Editar</a></td>";
          echo "<td><a style='color:red' href='" . FOLDER_PATH ."/main/eliminarUsuario/{$row['UsuarioID']}'>Eliminar</a></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>