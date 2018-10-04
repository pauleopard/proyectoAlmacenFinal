<h2>Agregar Categoria</h2>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/main/addCategoria' ?>">
      
      <div class="form-group">
        <label for="NombreCat">Nombre Categoria</label>
        <input type="text" name="NombreCat" class="form-control" id="NombreCat" placeholder="Nombre Categoria" >
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