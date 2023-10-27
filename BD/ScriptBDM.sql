CREATE database BaseMultimedia;
use BaseMultimedia;

/*Tablas Atomizadas*/

create table RolUsuario (
PK_IdRol int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de Rol',
RolDescripcion varchar(50) not null comment 'Descripcion del Rol'
);

create table Activo (
PK_IdActivo int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de Activo',
ActBoolean boolean default 0 not null comment 'Boleeano que define si esta Activo o Inactivo'
);

create table Sexo (
PK_IdSexo int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Sexo',
SexoDescripcion varchar(50) not null comment 'Descripcion del Sexo'
);

create table TipoLista (
PK_IdTipoL int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Tipo de Lista',
TipoLDescripcion varchar(50) not null comment 'Descripcion de la lista'
);

create table TipoProducto (
PK_IdTipoP int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Tipo de Producto',
TipoPDescripcion varchar(50) not null comment 'Descripcion del Tipo de Producto'
);

create table MetodoPago (
PK_IdMetodoPago int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Metodo de Pago',
PagoDescripcion varchar(50) not null comment 'Descripcion del Metodo de Paga'
);

/*Tablas Normales*/

create table Usuarios (
PK_IdUsuario int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Usuario',
UsuCorreo varchar (30) not null comment 'Correo Electrónico del Usuario',
UsuApodo varchar(30) not null comment 'Apodo con el que Iniciar Sesión',
UsuContra varchar(30) not null comment 'Contraseña del Usuario',
UsuFK_IdRol int not null comment 'Rol al que pertenece el Usuario',
UsuAvatar blob not null comment 'Imagen de Avatar del Usuario',
UsuNombres varchar(30) not null comment 'Nombre(s) reales del Usuario',
UsuApellidos varchar(30) not null comment 'Apellido(s) reales del Usuario',
UsuFK_IdSexo int not null comment 'Identificador Foráneo del Sexo del Usuario',
UsuFechaNac date not null comment 'Fecha de Nacimiento del Usuario',
UsuFechaIng date not null comment 'Fecha de Registro del Usuario',
UsuFK_IdActivo int not null comment 'Identificador Foráneo que indica si el Usuario esta Activo o Inactivo',
foreign key (UsuFK_IdRol) references RolUsuario(PK_IdRol),
foreign key (UsuFK_IdSexo) references Sexo(PK_IdSexo),
foreign key (UsuFK_IdActivo) references Activo(PK_IdActivo)
);

create table Categoria (
PK_IdCategoria int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de la Categoria',
CatNombre varchar(30) not null comment 'Nombre de la Categoria',
CatDescripcion varchar(50) not null comment 'Descripcion de la Categoria',
CatFK_IdUsuario int not null comment 'Identificador Foráneo del Usuario Creador',
CatFK_IdActivo int not null comment 'Identificador Foráneo que indica si la Categoria esta Activa o Inactiva',
foreign key (CatFK_IdUsuario) references Usuarios(PK_IdUsuario),
foreign key (CatFK_IdActivo) references Activo(PK_IdActivo)
);

create table Productos (
PK_IdProducto int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Producto',
ProFK_IdUsuario int not null comment 'Identificador del Dueño del Producto',
ProNombre varchar(30) not null comment 'Nombre del Producto',
ProDescripcion varchar(50) not null comment 'Descripcion del Producto',
ProIma1 blob not null comment 'Primera imagen del Producto',
ProIma2 blob not null comment 'Segunda imagen del Producto',
ProIma3 blob not null comment 'Tercera imagen del Producto',
ProVideo blob not null comment 'Video descriptivo del Producto',
ProFK_IdCategoria int not null comment 'Identificador Foránero que indica la Categoria a la que pertenece el Producto',
ProFK_IdTipoP int not null comment 'Identificador Foráneo que indica el Tipo de Producto que es (Cotizar o Vender)',
ProPrecio decimal(6,2) comment 'Precio de venta del Producto',
ProExistencias int not null comment 'Cantidad restante en inventario del Producto',
ProValoracion float comment 'Calificacion de los Clientes sobre el Producto',
ProFK_IdActivo int not null comment 'Identificador Foráneo que indica si el Producto esta Activo o Inactivo',
foreign key (ProFK_IdUsuario) references Usuarios(PK_IdUsuario),
foreign key (ProFK_IdCategoria) references Categoria(PK_IdCategoria),
foreign key (ProFK_IdTipoP) references TipoProducto(PK_IdTipoP),
foreign key (ProFK_IdActivo) references Activo(PK_IdActivo)
);

create table Lista (
PK_IdLista int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de la Lista de Productos',
LisNombre varchar(30) not null comment 'Nombre de la Lista de Productos',
LisDescripcion varchar(50) not null comment 'Descripcion de la Lista de Productos',
LisFK_IdTipoL int not null comment 'Identificador Foránero que indica que Tipo de Lista es (Publica o Privada)',
LisFK_IdProducto int not null comment 'Identificador Foráneo que indica el Producto en la lista',
LisFK_IdActivo int not null comment 'Identificador Foráneo que indica si la Lista esta Actica o Inactiva',
foreign key (LisFK_IdTipoL) references TipoLista(PK_IdTipoL),
foreign key (LisFK_IdProducto) references Productos(PK_IdProducto),
foreign key (LisFK_IdActivo) references Activo(PK_IdActivo)
);

create table Carrito (
PK_IdCarrito int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador del Carrito',
CarrFK_IdUsuario int not null comment 'Identificador Foráneo que indica el Cliente dueño del Carrito',
CarrFK_IdProducto int not null comment 'Identificador Foráneo que indica el Producto agregado al Carrito',
CarrCantidad int not null comment 'Cantidad del Producto agregada al Carrito',
CarrPrecio decimal(6,2) not null comment 'Precio total despues de multiplicar Precio Individual por la Cantidad agregada',
CarrCaducidad date comment 'Fecha que indica hasta cuando es valida la Cotizacion (En caso de ser una)',
CarrFK_IdActivo int not null comment 'Identificador Foráneo que indica si el Carrito esta Activo o Inactivo',
foreign key (CarrFK_IdUsuario) references Usuarios(PK_IdUsuario),
foreign key (CarrFK_IdProducto) references Productos(PK_IdProducto),
foreign key (CarrFK_IdActivo) references Activo(PK_IdActivo)
);

create table Ventas (
PK_IdVenta int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de la Venta',
VenFK_IdProducto int not null comment 'Identificador Foráneo que indica el Producto Vendido',
VenFK_IdTipoP int not null comment 'Identificador Foráneo que indica el Tipo de Producto Vendido',
VenNombreProducto varchar(30) not null comment 'Nombre del Producto Vendido',
VenFK_IdCategoria int not null comment 'Identificador Foráneo que indica la Categoria del Producto Vendido',
VenPrecioProducto decimal(6,2) not null comment 'Precio del Producto Vendido',
VenCantidad int not null comment 'Cantidad del Producto Vendido',
VenFecha date not null comment 'Fecha cuando se realizo la Venta',
VenFK_IdUsuVendedor int not null comment 'Identificador Foráneo que indica el Usuario Vendedor',
VenFK_IdUsuCliente int not null comment 'Identificador Foráneo que indica el Usuario Cliente',
VenFK_IdMetPago int not null comment 'Identificador Foránero que indica el Metodo de Pago usado',
VenFK_IdActivo int not null comment 'Identificador que indica si la Venta esta Activa o Inactiva',
foreign key (VenFK_IdProducto) references Productos(PK_IdProducto),
foreign key (VenFK_IdTipoP) references TipoProducto(PK_IdTipoP),
foreign key (VenFK_IdCategoria) references Categoria(PK_IdCategoria),
foreign key (VenFK_IdUsuVendedor) references Usuarios(PK_IdUsuario),
foreign key (VenFK_IdUsuCliente) references Usuarios(PK_IdUsuario),
foreign key (VenFK_IdMetPago) references MetodoPago(PK_IdMetodoPago),
foreign key (VenFK_IdActivo) references Activo(PK_IdActivo)
);

create table Mensajes (
PK_IdMensajes int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de los Mensajes',
MenFK_IdUsuRemitente int not null comment 'Identificador Foráneo que indica el Usuario Remitente del Mensaje',
MenFK_IdUsuDestino int not null comment 'Identificador Foráneo que indica el Destinatario del Mensaje',
MenMensaje varchar(200) not null comment 'Contenido del Mensaje',
MenFK_IdActivo int not null comment 'Identificador Foráneo que indica si el Mensaje esta Activo o Inactivo',
foreign key (MenFK_IdUsuRemitente) references Usuarios(PK_IdUsuario),
foreign key (MenFK_IdUsuDestino) references Usuarios(PK_IdUsuario),
foreign key (MenFK_IdActivo) references Activo(PK_IdActivo)
);

create table Valoraciones (
PK_IdValoracion int PRIMARY KEY NOT NULL AUTO_INCREMENT comment 'Identificador de las Valoraciones',
ValFK_IdProducto int not null comment 'Identificador Foráneo que indica el Producto al que pertenece la Valoracion',
ValFK_IdCliente int not null comment 'Identificador Foráneo que indica el Cliente que hizo la Valoracion',
ValPuntuacion float not null comment 'Calificacion dada al Producto por el Usuario',
ValComentario varchar(100) not null comment 'Comentario del Cliente sobre la Calidad del Producto',
foreign key (ValFK_IdProducto) references Productos(PK_IdProducto),
foreign key (ValFK_IdCliente) references Usuarios(PK_IdUsuario)
);

/*Store Procedures*/

DELIMITER //
CREATE PROCEDURE SP_RegistrarUsuario (_UsuCorreo varchar(30), _UsuApodo varchar(30), _UsuContra varchar(30), _UsuFK_IdRol int, _UsuAvatar varchar(100), 
_UsuNombres varchar(30), _UsuApellidos varchar(30), _UsuFK_IdSexo int, _UsuFechaNac date, _UsuFK_IdActivo int)
BEGIN
insert into Usuarios (UsuCorreo, UsuApodo, UsuContra, UsuFK_IdRol, UsuAvatar, UsuNombres, UsuApellidos, UsuFK_IdSexo, UsuFechaNac, UsuFechaIng, UsuFK_IdActivo)
values (_UsuCorreo, _UsuApodo, _UsuContra, _UsuFK_IdRol, 'imagenjaj', _UsuNombres, _UsuApellidos, _UsuFK_IdSexo, _UsuFechaNac, current_date(), 2);
END
//DELIMITER ;

select * from Usuarios;
update Usuarios set UsuNombres="Usuario Cliente" where PK_IdUsuario = 1;

DELIMITER //
CREATE PROCEDURE SP_ActualizarUsuario (_UsuCorreo varchar(30), _UsuApodo varchar(30), _UsuContra varchar(30), _UsuAvatar varchar(100), 
_UsuNombres varchar(30), _UsuApellidos varchar(30), _UsuFK_IdSexo int, _UsuFechaNac date, _PK_IdUsuario int)
BEGIN
update Usuarios set UsuCorreo = _UsuCorreo, UsuApodo = _UsuApodo, UsuContra = _UsuContra, UsuAvatar = _UsuAvatar, UsuNombres = _UsuNombres,
UsuApellidos = _UsuApellidos, UsuFK_IdSexo = _UsuFK_IdSexo, UsuFechaNac = _UsuFechaNac where PK_IdUsuario = _PK_IdUsuario;
END
//DELIMITER ;

/*Trigger para Validacion de Contrasena*/
drop trigger if exists TR_ValidarContra;
delimiter //
create trigger TR_ValidarContra
before insert on Usuarios
for each row
begin
if not (NEW.UsuContra regexp '^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$') then
signal sqlstate '45000'
set message_text = 'Contrasena No valida';
end if;

end//
delimiter ;

insert into sexo (SexoDescripcion) values('Hombre');
insert into sexo (SexoDescripcion) values('Mujer');

insert into activo(ActBoolean) values(0);
insert into activo(ActBoolean) values(1);

insert into rolusuario(RolDescripcion) values('Cliente');
insert into rolusuario(RolDescripcion) values('Vendedor');
insert into rolusuario(RolDescripcion) values('Administrador');

insert into Usuarios (UsuCorreo, UsuApodo, UsuContra, UsuFK_IdRol, UsuAvatar, UsuNombres, UsuApellidos, UsuFK_IdSexo, UsuFechaNac, UsuFechaIng, UsuFK_IdActivo)
values ('correo@prueba.com', 'Prueba', 'Contra7*', 1, 'imagenjaj', 'Cliente Usuario', 'De La Prueba', 1, '2001-9-11', current_date(), 2);



select * from rolusuario;





