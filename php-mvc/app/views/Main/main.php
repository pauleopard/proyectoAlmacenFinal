<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Main</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">

  <style>
.table-striped tbody tr:nth-child(odd) td,
.table-striped tbody tr:nth-child(odd) th {
  background-color: #DFF0D8;
}
.table-striped tbody tr:nth-child(even) td,
.table-striped tbody tr:nth-child(even) th {
  background-color: #59738c;
    color:#fff;
}
</style>

  <script src="/js/jquery-3.2.0.min.js"></script>
  <script src="js/bootstrap.js"></script> 

</head>
<body >
  <nav class="navbar navbar-inverse">
  <div class="container history">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Almacen</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articulo <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?= FOLDER_PATH . '/main/articulosLista' ?>">Listar Articulo</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= FOLDER_PATH . '/main/form' ?>">Agregar Articulo</a></li> 
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Salida de Articulos <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?= FOLDER_PATH . '/main/ordenSalida' ?>">Orden de salida</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= FOLDER_PATH . '/main/historialSalida' ?>">Historial de salida</a></li> 
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proveedor <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?= FOLDER_PATH . '/main/proveedoresLista' ?>">Listar Proveedores</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= FOLDER_PATH . '/main/formProve' ?>">Agregar Proveedor</a></li> 
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categoria <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?= FOLDER_PATH . '/main/categoriasLista' ?>">Listar Categorias</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= FOLDER_PATH . '/main/formCate' ?>">Agregar Categoria</a></li> 
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?= FOLDER_PATH . '/main/usuariosLista' ?>">Listar Usuarios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= FOLDER_PATH . '/main/formUsu' ?>">Agregar Usuario</a></li> 
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $Usuario ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/php-mvc/main/logout">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div class="container">
    <?php !empty($show_form) ? require 'app/views/Main/form.php' : '' ?>
    <?php !empty($show_articulo_editar) ? require 'app/views/Main/articulo_editar.php' : '' ?>
    <?php !empty($show_articulos_lista) ? require 'app/views/Main/articulos_lista.php' : '' ?>
    <?php !empty($show_proveedores_lista) ? require 'app/views/Prove/proveedores_lista.php' : '' ?>
    <?php !empty($show_proveedor_agregar) ? require 'app/views/Prove/proveedor_agregar.php' : '' ?>
    <?php !empty($show_proveedor_editar) ? require 'app/views/Prove/proveedor_editar.php' : '' ?>
    <?php !empty($show_categorias_lista) ? require 'app/views/Cate/categorias_lista.php' : '' ?>
    <?php !empty($show_categoria_editar) ? require 'app/views/Cate/categoria_editar.php' : '' ?>
    <?php !empty($show_categoria_agregar) ? require 'app/views/Cate/categoria_agregar.php' : '' ?>
    <?php !empty($show_usuarios_lista) ? require 'app/views/Usu/usuarios_lista.php' : '' ?>
    <?php !empty($show_usuario_agregar) ? require 'app/views/Usu/usuario_agregar.php' : '' ?>
    <?php !empty($show_usuario_editar) ? require 'app/views/Usu/usuario_editar.php' : '' ?>
    <?php !empty($show_articulo_osalida) ? require 'app/views/Sali/articulo_osalida.php' : '' ?>
    <?php !empty($show_articulo_salida) ? require 'app/views/Sali/articulo_salida.php' : '' ?>
    <?php !empty($show_articulo_hsalida) ? require 'app/views/Sali/articulo_hsalida.php' : '' ?>
  </div>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  
  
</body>
</html>