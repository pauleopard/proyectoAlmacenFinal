<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Main/MainModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class MainController extends Controller
{
  private $session;

  private $model;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if($this->session->getStatus() === 1 || empty($this->session->get('Usuario')))
      exit('Acceso denegado');
    $this->model = new MainModel();
  }

  public function exec()
  {
    $this->articulosLista();
  }

  public function logout()
  {
    $this->session->close();
    header('location: /php-mvc/login');
  }

  public function form($message = '')
  {
    $listas = $this->model->get_categorias();
    $listado = $this->model->get_proveedores();
    $params = array('Usuario' => $this->session->get('Usuario'),'show_form' => true, 'message' => $message, 'listas'=>$listas, 'listado'=>$listado);
    $this->render(__CLASS__, $params);
  }

  public function articulosLista($message = '', $message_type = 'success')
  {
    $articulos = $this->model->articulosLista();

    $params = array('Usuario' => $this->session->get('Usuario'),'show_articulos_lista' => true, 'message_type' => $message_type, 'message' => $message, 'articulos' => $articulos);
    return $this->render(__CLASS__, $params);
  }

  public function articuloLista($ArticuloID)
  {
    $listas = $this->model->get_categorias();
    $listado = $this->model->get_proveedores();

    $result = $this->model->articuloLista($ArticuloID);

    $info_articulo = !$result->num_rows
    ? $info_articulo = array()
    : $info_articulo = $result->fetch_object();

    $params = array('Usuario' => $this->session->get('Usuario'), 'show_articulo_editar' => true, 'info_articulo' => $info_articulo,'listas' =>$listas,'listado' =>$listado);
    return $this->render(__CLASS__, $params);
  }

  public function addArticulo($request_params)
  {
    if(!$this->verify($request_params))
      return $this->form('Son necesarios todos los campos');

    $result = $this->model->addArticulo($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->form('Hubo un error al agregar el articulo');
    
    return $this->articulosLista('articulo dado de alta');
  }

  private function verify($request_params)
  {
    foreach ($request_params as $param)
      if(empty($param)) return false;

    return true;
  }

  public function eliminarArticulo($ArticuloID)
  {
    if(empty($ArticuloID))
      return $this->articulosLista('No se recibió el ID del articulo', 'warning');

    if(!is_numeric($ArticuloID))
      return $this->articulosLista('El ID del articulo debe ser numérico', 'warning');

      $result = $this->model->eliminarArticulo($ArticuloID); 
    
    if(!$result || !$this->model->affected_rows())
      return $this->articulosLista("Hubo un error al eliminar el Articulo número {$ArticuloID} : El articulo está siendo usada en otra tabla", 'warning');

    $this->articulosLista("Articulo número {$ArticuloID} Eliminado");
  }

  public function actualizarArticulo($request_params)
  {
    if(!$this->verify($request_params))
      return $this->articulosLista('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['ArticuloID']))
      return $this->articulosLista('El ID del articulo debe ser numérico para editar', 'warning');

    $result = $this->model->actualizarArticulo($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->articulosLista("Hubo un error al editar el articulo número {$request_params['ArticuloID']}", 'warning');

    $this->articulosLista("Articulo número {$request_params['ArticuloID']} actualizado");
  }
  
//Proveedores

  public function proveedoresLista($message = '', $message_type = 'success')
  {
    $proveedores = $this->model->proveedoresLista();

    $params = array('Usuario' => $this->session->get('Usuario'),'show_proveedores_lista' => true, 'message_type' => $message_type, 'message' => $message, 'proveedores' => $proveedores);
    return $this->render(__CLASS__, $params);
  }

   public function formProve($message = '')
  {
    $params = array('Usuario' => $this->session->get('Usuario'),'show_proveedor_agregar' => true, 'message' => $message);
    $this->render(__CLASS__, $params);
  }

  public function addProveedor($request_params)
  {
    if(!$this->verify($request_params))
      return $this->formProve('Son necesarios todos los campos');

    $result = $this->model->addProveedor($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->formProve('Hubo un error al agregar el Proveedor');
    
    return $this->proveedoresLista('Proveedor dado de alta');
  }

  public function proveedorLista($ProveedorID)
  {

    $result = $this->model->proveedorLista($ProveedorID);

    $info_proveedor = !$result->num_rows
    ? $info_proveedor = array()
    : $info_proveedor = $result->fetch_object();

    $params = array('Usuario' => $this->session->get('Usuario'), 'show_proveedor_editar' => true, 'info_proveedor' => $info_proveedor);
    return $this->render(__CLASS__, $params);
  }

  public function actualizarProveedor($request_params)
  {
    if(!$this->verify($request_params))
      return $this->proveedoresLista('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['ProveedorID']))
      return $this->proveedoresLista('El ID del Proveedor debe ser numérico para editar', 'warning');

    $result = $this->model->actualizarProveedor($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->proveedoresLista("Hubo un error al editar el Proveedor número {$request_params['ProveedorID']}", 'warning');

    $this->proveedoresLista("Proveedor número {$request_params['ProveedorID']} actualizado");
  }

  public function eliminarProveedor($ProveedorID)
  {
    if(empty($ProveedorID))
      return $this->proveedoresLista('No se recibió el ID del proveedor', 'warning');

    if(!is_numeric($ProveedorID))
      return $this->proveedoresLista('El ID del Proveedor debe ser numérico', 'warning');

    $result = $this->model->eliminarProveedor($ProveedorID);

    if(!$result || !$this->model->affected_rows())
      return $this->proveedoresLista("Hubo un error al eliminar el Proveedor número {$ProveedorID}", 'warning');

    $this->proveedoresLista("Proveedor número {$ProveedorID} Eliminado");
  }

//Categorias

  public function categoriasLista($message = '', $message_type = 'success')
  {
    $categorias = $this->model->categoriasLista();

    $params = array('Usuario' => $this->session->get('Usuario'),'show_categorias_lista' => true, 'message_type' => $message_type, 'message' => $message, 'categorias' => $categorias);
    return $this->render(__CLASS__, $params);
  }
  
   public function categoriaLista($CategoriaID)
  {

    $result = $this->model->categoriaLista($CategoriaID);

    $info_categoria = !$result->num_rows
    ? $info_categoria = array()
    : $info_categoria = $result->fetch_object();

    $params = array('Usuario' => $this->session->get('Usuario'), 'show_categoria_editar' => true, 'info_categoria' => $info_categoria);
    return $this->render(__CLASS__, $params);
  }

  public function actualizarCategoria($request_params)
  {
    if(!$this->verify($request_params))
      return $this->categoriasLista('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['CategoriaID']))
      return $this->categoriasLista('El ID del Categoria debe ser numérico para editar', 'warning');

    $result = $this->model->actualizarCategoria($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->categoriasLista("Hubo un error al editar el Categoria número {$request_params['CategoriaID']}", 'warning');

    $this->categoriasLista("Categoria número {$request_params['CategoriaID']} actualizado");
  }

  public function formCate($message = '')
  {
    $params = array('Usuario' => $this->session->get('Usuario'),'show_categoria_agregar' => true, 'message' => $message);
    $this->render(__CLASS__, $params);
  }

  public function addCategoria($request_params)
  {
    if(!$this->verify($request_params))
      return $this->formCate('Son necesarios todos los campos');

    $result = $this->model->addCategoria($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->formCate('Hubo un error al agregar el Categoria');
    
    return $this->categoriasLista('Categoria dado de alta');
  }

  public function eliminarCategoria($CategoriaID)
  {
    if(empty($CategoriaID))
      return $this->categoriasLista('No se recibió el ID de la categoria', 'warning');

    if(!is_numeric($CategoriaID))
      return $this->categoriasLista('El ID de la Categoria debe ser numérico', 'warning');

    $result = $this->model->eliminarCategoria($CategoriaID);

    if(!$result || !$this->model->affected_rows())
      return $this->categoriasLista("Hubo un error al eliminar el Categoria número {$CategoriaID}", 'warning');

    $this->categoriasLista("Categoria número {$CategoriaID} Eliminado");
  }

  //Usuario

  public function usuariosLista($message = '', $message_type = 'success')
  {
    $usuarios = $this->model->usuariosLista();

    $params = array('Usuario' => $this->session->get('Usuario'),'show_usuarios_lista' => true, 'message_type' => $message_type, 'message' => $message, 'usuarios' => $usuarios);
    return $this->render(__CLASS__, $params);
  }

  public function formUsu($message = '')
  {
    $lista = $this->model->get_cargos();
    $params = array('Usuario' => $this->session->get('Usuario'),'show_usuario_agregar' => true, 'message' => $message, 'lista'=>$lista);
    $this->render(__CLASS__, $params);
  }
//Agregar Usuario Encriptando
  public function addUsuario($request_params)
  {
    if(!$this->verify($request_params))
      return $this->formUsu('Son necesarios todos los campos');

    $hashpassword = password_hash($_POST['Clave'], PASSWORD_DEFAULT);

    $request_params = array('Usuario' => $_POST['Usuario'],'Clave' => $hashpassword,
        'Nombre_Apellido'=>$_POST['Nombre_Apellido'],'Correo' => $_POST['Correo'],'NCelular' => $_POST['NCelular'],
        'TipoUsuarioID' => $_POST['TipoUsuarioID']);                                                 

    $result = $this->model->addUsuario($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->formUsu('Hubo un error al agregar el usuario');
    
    return $this->usuariosLista('usuario dado de alta');
  }

  public function usuarioLista($UsuarioID)
  {
    $lista = $this->model->get_cargos();

    $result = $this->model->usuarioLista($UsuarioID);

    $info_usuario = !$result->num_rows
    ? $info_usuario = array()
    : $info_usuario = $result->fetch_object();

    $params = array('Usuario' => $this->session->get('Usuario'), 'show_usuario_editar' => true, 'info_usuario' => $info_usuario,'lista' =>$lista);
    return $this->render(__CLASS__, $params);
  }

  public function actualizarUsuario($request_params)
  {
    if(!$this->verify($request_params))
      return $this->usuariosLista('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['UsuarioID']))
      return $this->usuariosLista('El ID del usuario debe ser numérico para editar', 'warning');

    $hashpassword = password_hash($_POST['Clave'], PASSWORD_DEFAULT);

    $request_params = array('UsuarioID' => $_POST['UsuarioID'],'Usuario' => $_POST['Usuario'],'Clave' => $hashpassword,
        'Nombre_Apellido'=>$_POST['Nombre_Apellido'],'Correo' => $_POST['Correo'],'NCelular' => $_POST['NCelular'],
        'TipoUsuarioID' => $_POST['TipoUsuarioID']);

    $result = $this->model->actualizarUsuario($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->usuariosLista("Hubo un error al editar el usuario número {$request_params['UsuarioID']}", 'warning');

    $this->usuariosLista("usuario número {$request_params['UsuarioID']} actualizado");
  }

  public function eliminarUsuario($UsuarioID)
  {
    if(empty($UsuarioID))
      return $this->usuariosLista('No se recibió el ID del usuario', 'warning');

    if(!is_numeric($UsuarioID))
      return $this->usuariosLista('El ID del usuario debe ser numérico', 'warning');

    $result = $this->model->eliminarUsuario($UsuarioID);

    if(!$result || !$this->model->affected_rows())
      return $this->usuariosLista("Hubo un error al eliminar el usuario número {$UsuarioID}", 'warning');

    $this->usuariosLista("usuario número {$UsuarioID} Eliminado");
  }



  //Orden de salida de articulos

  public function ordenSalida($message = '', $message_type = 'success')
  {
    $articulos = $this->model->ordenSalida();

    $params = array('Usuario' => $this->session->get('Usuario'),'show_articulo_osalida' => true, 'message_type' => $message_type, 'message' => $message, 'articulos' => $articulos);
    return $this->render(__CLASS__, $params);
  }


  public function articuloListado($ArticuloID)
  {
    
    $result = $this->model->articuloListado($ArticuloID);

    $info_articulo = !$result->num_rows
    ? $info_articulo = array()
    : $info_articulo = $result->fetch_object();

    $params = array('Usuario' => $this->session->get('Usuario'), 'show_articulo_salida' => true, 'info_articulo' => $info_articulo);
    return $this->render(__CLASS__, $params);
  }

  public function salidaArticulo($request_params)
  {
    if(!$this->verify($request_params))
      return $this->ordenSalida('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['ArticuloID']))
      return $this->ordenSalida('El ID del articulo debe ser numérico para editar', 'warning');

    $Stock=$_POST['Stock'];
    $Cantidad=$_POST['Cantidad'];

    if($Cantidad > $Stock) {
       return $this->ordenSalida('La cantidad es mayor al Stock que hay en almacen', 'warning');
    }else{ // actualizo la db con los datos nuevos!
       $result = $this->model->salidaArticulo($request_params);
    }

    $request_paramet =  $request_params;
    $this->model->addSalida($request_paramet);

    if(!$result || !$this->model->affected_rows())
      return $this->ordenSalida("Hubo un error al generar salida del articulo número {$request_params['ArticuloID']}", 'warning');

    $this->ordenSalida("Se registró salida de:{$request_params['Cantidad']} articulos");
  }


  public function historialSalida($message = '', $message_type = 'success')
  {
    $articulos = $this->model->historialSalida();

    $params = array('Usuario' => $this->session->get('Usuario'),'show_articulo_hsalida' => true, 'message_type' => $message_type, 'message' => $message, 'articulos' => $articulos);
    return $this->render(__CLASS__, $params);
  }

  public function eliminarSalida($SalidaID)
  {
    if(empty($SalidaID))
      return $this->historialSalida('No se recibió el ID de la salida', 'warning');

    if(!is_numeric($SalidaID))
      return $this->historialSalida('El ID del salida debe ser numérico', 'warning');

    $result = $this->model->eliminarSalida($SalidaID);

    if(!$result || !$this->model->affected_rows())
      return $this->historialSalida("Hubo un error al eliminar la salida número {$SalidaID}", 'warning');

    $this->historialSalida("salida número {$SalidaID} Eliminado");
  }



}
