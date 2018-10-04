<?php 

/**
* 
*/
class MainModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }


  function get_categorias(){
  $query = 'SELECT CategoriaID,NombreCat FROM `categoria`';
  $result = $this->db->query($query);
  $listas ='';
  // $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[CategoriaID]'>$row[NombreCat]</option>";
  }
  return $listas;
  }

  function get_proveedores(){
  $query = 'SELECT ProveedorID,RazonSocial FROM `proveedor`';
  $result = $this->db->query($query);
  $listado ='';
  // $listado = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listado .= "<option value='$row[ProveedorID]'>$row[RazonSocial]</option>";
  }
  return $listado;
  }


  public function addArticulo($params)
  {
    $Producto = $this->db->real_escape_string($params['Producto']);
    $Marca = $this->db->real_escape_string($params['Marca']);
    $Descripcion = $this->db->real_escape_string($params['Descripcion']);
    $PrecioCompra = $this->db->real_escape_string($params['PrecioCompra']);
    $Stock = $this->db->real_escape_string($params['Stock']);
    $UnidadMedida = $this->db->real_escape_string($params['UnidadMedida']);
    $FechaIngreso = $this->db->real_escape_string($params['FechaIngreso']);
    $CategoriaID = $this->db->real_escape_string($params['CategoriaID']);
    $ProveedorID = $this->db->real_escape_string($params['ProveedorID']);
    $sql = "INSERT INTO articulo (Producto, Marca, Descripcion,PrecioCompra,Stock,UnidadMedida,FechaIngreso,CategoriaID,ProveedorID) VALUES ('$Producto', '$Marca', '$Descripcion','$PrecioCompra','$Stock','$UnidadMedida','$FechaIngreso','$CategoriaID','$ProveedorID')";
    return $this->db->query($sql);
  }
/*
  public function articulosLista()
  {
    $sql = 'SELECT * FROM Articulo';
    return $this->db->query($sql);
  }
*/
  public function articulosLista()
  {
    $sql = 'SELECT a.ArticuloID,a.Producto,a.Marca,a.Descripcion,a.PrecioCompra,a.stock,a.UnidadMedida,a.FechaIngreso, c.NombreCat, p.RazonSocial from articulo a inner join categoria c on a.CategoriaID=c.CategoriaId inner join proveedor p on a.ProveedorID=p.ProveedorID';
    return $this->db->query($sql);
  }

  public function articuloLista($ArticuloID)
  {
    $sql = "SELECT * FROM articulo WHERE ArticuloID='{$ArticuloID}'";
    return $this->db->query($sql);
  }

  public function eliminarArticulo($ArticuloID)
  {
    $sql = "DELETE FROM articulo WHERE ArticuloID={$ArticuloID}";
    return $this->db->query($sql);
  }

  public function actualizarArticulo($params)
  {
    $Producto = $this->db->real_escape_string($params['Producto']);
    $Marca = $this->db->real_escape_string($params['Marca']);
    $Descripcion = $this->db->real_escape_string($params['Descripcion']);
    $PrecioCompra = $this->db->real_escape_string($params['PrecioCompra']);
    $Stock = $this->db->real_escape_string($params['Stock']);
    $UnidadMedida = $this->db->real_escape_string($params['UnidadMedida']);
    $FechaIngreso = $this->db->real_escape_string($params['FechaIngreso']);
    $CategoriaID = $this->db->real_escape_string($params['CategoriaID']);
    $ProveedorID = $this->db->real_escape_string($params['ProveedorID']);
    $ArticuloID = $this->db->real_escape_string($params['ArticuloID']);
    $sql = "UPDATE articulo SET Producto='{$Producto}', Marca='{$Marca}', Descripcion='{$Descripcion}', PrecioCompra='{$PrecioCompra}', Stock='{$Stock}', UnidadMedida='{$UnidadMedida}', FechaIngreso='{$FechaIngreso}', CategoriaID='{$CategoriaID}', ProveedorID='{$ProveedorID}' WHERE ArticuloID='{$ArticuloID}'";
    return $this->db->query($sql);
  }

  //Proveedores


  public function proveedoresLista()
  {
    $sql = 'SELECT * from proveedor';
    return $this->db->query($sql);
  }

  public function addProveedor($params)
  {
    $Ruc = $this->db->real_escape_string($params['Ruc']);
    $RazonSocial = $this->db->real_escape_string($params['RazonSocial']);
    $PersonaContacto = $this->db->real_escape_string($params['PersonaContacto']);
    $Direccion = $this->db->real_escape_string($params['Direccion']);
    $NCelular = $this->db->real_escape_string($params['NCelular']);
    $NTelefono = $this->db->real_escape_string($params['NTelefono']);
    $Correo = $this->db->real_escape_string($params['Correo']);
    $Ciudad = $this->db->real_escape_string($params['Ciudad']);
    
    $sql = "INSERT INTO proveedor (Ruc, RazonSocial, PersonaContacto,Direccion,NCelular,NTelefono,Correo,Ciudad) VALUES ('$Ruc', '$RazonSocial', '$PersonaContacto','$Direccion','$NCelular','$NTelefono','$Correo','$Ciudad')";
    return $this->db->query($sql);
  }

  public function proveedorLista($ProveedorID)
  {
    $sql = "SELECT * FROM proveedor WHERE ProveedorID='{$ProveedorID}'";
    return $this->db->query($sql);
  }

  public function actualizarProveedor($params)
  {
    $Ruc = $this->db->real_escape_string($params['Ruc']);
    $RazonSocial = $this->db->real_escape_string($params['RazonSocial']);
    $PersonaContacto = $this->db->real_escape_string($params['PersonaContacto']);
    $Direccion = $this->db->real_escape_string($params['Direccion']);
    $NCelular = $this->db->real_escape_string($params['NCelular']);
    $NTelefono = $this->db->real_escape_string($params['NTelefono']);
    $Correo = $this->db->real_escape_string($params['Correo']);
    $Ciudad = $this->db->real_escape_string($params['Ciudad']);
    $ProveedorID = $this->db->real_escape_string($params['ProveedorID']);
    $sql = "UPDATE proveedor SET Ruc='{$Ruc}', RazonSocial='{$RazonSocial}', PersonaContacto='{$PersonaContacto}', Direccion='{$Direccion}', NCelular='{$NCelular}', NTelefono='{$NTelefono}', Correo='{$Correo}', Ciudad='{$Ciudad}' WHERE ProveedorID='{$ProveedorID}'";
    return $this->db->query($sql);
  }

  public function eliminarProveedor($ProveedorID)
  {
    $sql = "DELETE FROM proveedor WHERE ProveedorID={$ProveedorID}";
    return $this->db->query($sql);
  }

//Categorias

  public function categoriasLista()
  {
    $sql = 'SELECT * from categoria';
    return $this->db->query($sql);
  }

  public function categoriaLista($CategoriaID)
  {
    $sql = "SELECT * FROM categoria WHERE CategoriaID='{$CategoriaID}'";
    return $this->db->query($sql);
  }

  public function actualizarCategoria($params)
  {
    $NombreCat = $this->db->real_escape_string($params['NombreCat']);
    $CategoriaID = $this->db->real_escape_string($params['CategoriaID']);
    $sql = "UPDATE categoria SET NombreCat='{$NombreCat}' WHERE CategoriaID='{$CategoriaID}'";
    return $this->db->query($sql);
  }

  public function addCategoria($params)
  {
    $NombreCat = $this->db->real_escape_string($params['NombreCat']);
    
    $sql = "INSERT INTO categoria (NombreCat) VALUES ('$NombreCat')";
    return $this->db->query($sql);
  }

  public function eliminarCategoria($CategoriaID)
  {
    $sql = "DELETE FROM categoria WHERE CategoriaID={$CategoriaID}";
    return $this->db->query($sql);
  }

//Usuarios

  public function usuariosLista()
  {
    $sql = 'SELECT u.UsuarioID,u.Usuario,u.Nombre_Apellido,u.Correo,u.NCelular,t.Cargo from usuario u inner join tipousuario t on u.TipoUsuarioID=t.TipoUsuarioID';
    return $this->db->query($sql);
  }

  function get_cargos(){
  $query = 'SELECT TipoUsuarioID,Cargo FROM `tipousuario`';
  $result = $this->db->query($query);
  $lista ='';
 // $lista = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $lista .= "<option value='$row[TipoUsuarioID]'>$row[Cargo]</option>";
  }
  return $lista;
  }

  public function addUsuario($params)
  {
    $Usuario = $this->db->real_escape_string($params['Usuario']);
    $Clave = $this->db->real_escape_string($params['Clave']);
    $Nombre_Apellido = $this->db->real_escape_string($params['Nombre_Apellido']);
    $Correo = $this->db->real_escape_string($params['Correo']);
    $NCelular = $this->db->real_escape_string($params['NCelular']);
    $TipoUsuarioID = $this->db->real_escape_string($params['TipoUsuarioID']);

    $sql = "INSERT INTO usuario (Usuario, Clave, Nombre_Apellido,Correo,NCelular,TipoUsuarioID) VALUES ('$Usuario', '$Clave', '$Nombre_Apellido','$Correo','$NCelular','$TipoUsuarioID')";
    return $this->db->query($sql);
  }

  public function usuarioLista($UsuarioID)
  {
    $sql = "SELECT * FROM usuario WHERE UsuarioID='{$UsuarioID}'";
    return $this->db->query($sql);
  }

  public function actualizarUsuario($params)
  {
    $Usuario = $this->db->real_escape_string($params['Usuario']);
    $Clave = $this->db->real_escape_string($params['Clave']);
    $Nombre_Apellido = $this->db->real_escape_string($params['Nombre_Apellido']);
    $Correo = $this->db->real_escape_string($params['Correo']);
    $NCelular = $this->db->real_escape_string($params['NCelular']);
    $TipoUsuarioID = $this->db->real_escape_string($params['TipoUsuarioID']);
    $UsuarioID = $this->db->real_escape_string($params['UsuarioID']);
    $sql = "UPDATE usuario SET Usuario='{$Usuario}', Clave='{$Clave}', Nombre_Apellido='{$Nombre_Apellido}', Correo='{$Correo}', NCelular='{$NCelular}', TipoUsuarioID='{$TipoUsuarioID}' WHERE UsuarioID='{$UsuarioID}'";
    return $this->db->query($sql);
  }

  public function eliminarUsuario($UsuarioID)
  {
    $sql = "DELETE FROM usuario WHERE UsuarioID={$UsuarioID}";
    return $this->db->query($sql);
  }


  //Orden de salida de articulos

  public function ordenSalida()
  {
    $sql = 'SELECT ArticuloID,Producto,Marca,Descripcion,stock from articulo order by Producto';
    return $this->db->query($sql);
  }

  public function salidaArticulo($params)
  {
    $Cantidad = $this->db->real_escape_string($params['Cantidad']);
    $Stock = $this->db->real_escape_string($params['Stock']);
    $ArticuloID = $this->db->real_escape_string($params['ArticuloID']);

    $sql = "UPDATE articulo SET  Stock='{$Stock}'-'{$Cantidad}' WHERE ArticuloID='{$ArticuloID}'";
    return $this->db->query($sql);
  }

  public function articuloListado($ArticuloID)
  {
    $sql = "SELECT * FROM articulo WHERE ArticuloID='{$ArticuloID}'";
    return $this->db->query($sql);
  }

  public function addSalida($params)
  {
    
    $Cantidad = $this->db->real_escape_string($params['Cantidad']);
    $FechaSalida = $this->db->real_escape_string($params['FechaSalida']);
    $ArticuloID = $this->db->real_escape_string($params['ArticuloID']);

    $sql = "INSERT INTO salida (Cantidad,FechaSalida,ArticuloID) VALUES ('$Cantidad','$FechaSalida','$ArticuloID')";
    return $this->db->query($sql);
  }

  public function historialSalida()
  {
    $sql = 'SELECT s.SalidaID,a.Producto,a.Marca,a.Descripcion,s.Cantidad,a.FechaIngreso,s.FechaSalida from salida s inner join articulo a on s.ArticuloID=a.ArticuloID order by s.SalidaID';
    return $this->db->query($sql);
  }

  public function eliminarSalida($SalidaID)
  {
    $sql = "DELETE FROM salida WHERE SalidaID={$SalidaID}";
    return $this->db->query($sql);
  }

}