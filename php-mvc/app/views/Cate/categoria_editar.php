<h2>Editar Categoria</h2>
<?php !$info_categoria ? exit('Hubo un error al cargar la información de la categoria') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/actualizarCategoria' ?>">


      <div class="form-group">
        <label for="NombreCat">Nombre Categoria</label>
        <input type="text" name="NombreCat" class="form-control" id="NombreCat" placeholder="Nombre Categoria" value="<?= $info_categoria->NombreCat ?>">
      </div>
      
      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>
      
      <input type="hidden" name="CategoriaID" value="<?= $info_categoria->CategoriaID ?>">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/main/categoriasLista' ?>" role="button">Cancelar</a>
    </form>
  </div>
</div>