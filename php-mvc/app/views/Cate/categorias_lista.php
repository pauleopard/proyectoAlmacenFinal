<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">
    <h2>Listado de Categorias</h2>

    <table class="table table-striped ">
      <thead >
        <th>Codigo</th>
        <th>Nombre Categoria</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        <?php
        while ($row = $categorias->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['CategoriaID']}</td>";
          echo "<td>{$row['NombreCat']}</td>";
          echo "<td><a style='color:#2ae509' href='" . FOLDER_PATH ."/main/categoriaLista/{$row['CategoriaID']}'>Editar</a></td>";
          echo "<td><a style='color:red' href='" . FOLDER_PATH ."/main/eliminarCategoria/{$row['CategoriaID']}'>Eliminar</a></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>