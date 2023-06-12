use DB;

#Departamentos
INSERT INTO Departamento(Departamento) VALUE ('Soporte');
INSERT INTO Departamento(Departamento) VALUE ('Administración');
INSERT INTO Departamento(Departamento) VALUE ('Ventas');
INSERT INTO Departamento(Departamento) VALUE ('Recepcion');
INSERT INTO Departamento(Departamento) VALUE ('Cliente');

#añade usuarios a la tabla de Usuarios
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('David', 'Garcia','Alba','Soporte','Administrador');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Maria', 'Gomez','Espinoza','Administración','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Juan', 'Garcia','Alba','Recepcion','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Jose', 'Fernandez','Alba','Recepcion','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Pedro', 'Garcia','Alba','Ventas','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Luis', 'Garcia','Alba','Soporte','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Manolo', 'Rarcia','Alba','Ventas','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Admin', 'dmin','Pruebas','Soporte','Administrador');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('User', 'ser','Pruebas','Soporte','Usuario');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Cliente', 'liente','Pruebas','Cliente','Cliente');
insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('Espaceland', 'Espaceland','Pruebas','Cliente','Cliente');


#Cambiar contraseñas
UPDATE user t SET t.Password = '123' WHERE t.Usuario LIKE 'User' ESCAPE '#';
UPDATE user t SET t.Password = '123' WHERE t.Usuario LIKE 'Admin' ESCAPE '#';
UPDATE user t SET t.Password = '123' WHERE t.Usuario LIKE 'EEspaceland' ESCAPE '#';


#añade tareas a la tabla de Tareas
insert into Tareas (Tarea,Departamento,FechaInicio,Estado) values ('Prueba de todo los campos','Soporte','2023-04-18','Pendiente');
insert into Tareas (Tarea,Departamento,FechaInicio,Estado) values ('Prueba de todo los campos','Administración','2023-04-18','Pendiente');
insert into Tareas (Tarea,Departamento,FechaInicio,Estado) values ('Prueba de todo los campos','Ventas','2023-04-18','Pendiente');
insert into Tareas (Tarea,Departamento,FechaInicio,Estado) values ('Prueba de todo los campos','Recepcion','2023-04-18','Pendiente');
insert into Tareas (Tarea,Departamento,FechaInicio,Estado) values ('Prueba de todo los campos','Soporte','2023-04-18','Pendiente');


