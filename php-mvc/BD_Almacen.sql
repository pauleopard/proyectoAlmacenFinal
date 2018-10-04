
DROP DATABASE  IF EXISTS BD_Almacen;
CREATE DATABASE BD_Almacen;

USE BD_Almacen;

-- ----------------------------
--  Estructura de la Tabla `Proveedor`
-- ----------------------------
DROP TABLE IF EXISTS `Proveedor`;
CREATE TABLE `Proveedor` (
  `ProveedorID` INT(11) NOT NULL AUTO_INCREMENT,
  `Ruc` VARCHAR(45) DEFAULT NULL,
  `RazonSocial` VARCHAR(45) DEFAULT NULL,
  `PersonaContacto` VARCHAR(45) DEFAULT NULL,
  `Direccion` VARCHAR(45) DEFAULT NULL,
  `NCelular` VARCHAR(45) DEFAULT NULL,
  `NTelefono` VARCHAR(45) DEFAULT NULL,
  `Correo` VARCHAR(45) DEFAULT NULL,
  `Ciudad` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`ProveedorID`)
);
-- ----------------------------
--  Valores de `proveedor`
-- ----------------------------
BEGIN;
INSERT INTO `Proveedor` (Ruc,RazonSocial,PersonaContacto,Direccion,NCelular,NTelefono,Correo,Ciudad)
VALUES ('1046292215','Importacionnes eirl','Manuel Gomez','av.los euclaliptos 230','987654321','2719924','ventas@gmail.com','Surco'),
       ('1246299875','Msyoristas SAC','Efrain Alcarraz','av.los heroes 760','998755321','4795609','mayoristas@gmail.com','San Juan');                                                                                            
COMMIT;

-- ----------------------------
--  Estructura de la Tabla `Categoria`
-- ----------------------------
DROP TABLE IF EXISTS `Categoria`;
CREATE TABLE `Categoria` (
  `CategoriaID` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreCat` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`CategoriaID`)
);
-- ----------------------------
--  Valores de `Categoria`
-- ----------------------------
BEGIN;
INSERT INTO `Categoria` (NombreCat)
VALUES ('Electrodomesticos'),
       ('Ropas');                                                                                              
COMMIT;

-- ----------------------------
--  Estructura de la Tabla `Artículo`
-- ----------------------------
DROP TABLE IF EXISTS `Articulo`;
CREATE TABLE `Articulo` (
  `ArticuloID` INT(11) NOT NULL AUTO_INCREMENT,
  `Producto` VARCHAR(45) DEFAULT NULL,
  `Marca` VARCHAR(45) DEFAULT NULL,
  `Descripcion` VARCHAR(45) DEFAULT NULL,
  `PrecioCompra` DECIMAL(10,2) DEFAULT NULL,
  `Stock` INT(11) DEFAULT NULL,
  `UnidadMedida` VARCHAR(45) DEFAULT NULL,
  `FechaIngreso` DATE DEFAULT NULL,
  `CategoriaID` INT(11) NOT NULL,
  `ProveedorID` INT(11) NOT NULL,
  PRIMARY KEY (`ArticuloID`),
  FOREIGN KEY(CategoriaID) REFERENCES Categoria(CategoriaID),
  FOREIGN KEY(ProveedorID) REFERENCES Proveedor(ProveedorID)
);

-- ----------------------------
--  Valores de `Articulo`
-- ----------------------------
BEGIN;
INSERT INTO `Articulo` (Producto,Marca,Descripcion,PrecioCompra,stock,UnidadMedida,FechaIngreso,CategoriaID,ProveedorID)
VALUES ('Television','Samsung','Televicion de Full HD','1000.00','9','Unit','2016-02-10','1','2'),
       ('Refrigeradora','LG','Refrigeradora NoFrost','900.00','35','Unit','2017-07-12','1','2');                                                                                         
COMMIT;

-- ----------------------------
--  Estructura de la Tabla `Salida`
-- ----------------------------
DROP TABLE IF EXISTS `Salida`;
CREATE TABLE `Salida` (
  `SalidaID` INT(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` INT(11) DEFAULT NULL,
  `FechaSalida` DATE DEFAULT NULL,
  `ArticuloID` INT(11) NOT NULL,
  PRIMARY KEY (`SalidaID`),
  FOREIGN KEY(ArticuloID) REFERENCES Articulo(ArticuloID)
);
-- ----------------------------
--  Valores de `Salida`
-- ----------------------------
BEGIN;
INSERT INTO `Salida` (Cantidad,FechaSalida,ArticuloID)
VALUES ('4','2016-02-10','1'),
       ('7','2018-02-02','2');                                                                                              
COMMIT;

-- ----------------------------
--  Estructura de la Tabla `TipoUsuario`
-- ----------------------------
DROP TABLE IF EXISTS `TipoUsuario`;
CREATE TABLE `TipoUsuario` (
  `TipoUsuarioID` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) DEFAULT NULL,
  `Cargo` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`TipoUsuarioID`)
);
-- ----------------------------
--  Valores de `TipoUsuario`
-- ----------------------------
BEGIN;
INSERT INTO `TipoUsuario` (Descripcion,Cargo)
VALUES ('admin','administrador'),
       ('user','supervisor'),
       ('user','vendedor'),
       ('user','almacenero');                                                                                             
COMMIT;

-- ----------------------------
--  Estructura de la Tabla `Usuario`
-- ----------------------------
DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE `Usuario` (
  `UsuarioID` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuario` VARCHAR(45) DEFAULT NULL,
  `Clave` VARCHAR(255) DEFAULT NULL,
  `Nombre_Apellido` VARCHAR(45) DEFAULT NULL,
  `Correo` VARCHAR(45) DEFAULT NULL,
  `NCelular` VARCHAR(45) DEFAULT NULL,
  `TipoUsuarioID` INT(11),
  PRIMARY KEY (`UsuarioID`),
  FOREIGN KEY(TipoUsuarioID) REFERENCES TipoUsuario(TipoUsuarioID)
);

-- ----------------------------
--  Valores de `Usuario`
-- ----------------------------
BEGIN;
INSERT INTO `Usuario` (Usuario,Clave,Nombre_Apellido,Correo,NCelular,TipoUsuarioID)
VALUES ('admin','$2y$10$/IKYMpshIx8rPOtDIEnkReKb2x4WIrAUgQxJSxZc6cOd.I5cIHYeS','Dante Altamirano','dante@gmail.com','987654321','1'),
        ('user01','$2y$10$/IKYMpshIx8rPOtDIEnkReKb2x4WIrAUgQxJSxZc6cOd.I5cIHYeS','Luis Alvares','luis@gmail.com','909876789','2');                                                                                        
COMMIT;












