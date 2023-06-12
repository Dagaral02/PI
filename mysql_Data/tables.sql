DROP DATABASE IF EXISTS DB;
CREATE DATABASE DB;
use DB;
#creae un tabla de usuarios con codigo de empleado de primary key y id de empleado
DROP TABLE IF EXISTS Departamento;
CREATE TABLE Departamento(
    Departamento VARCHAR(50) NOT NULL primary key
);
CREATE TABLE Usuarios (
    CodigoEmpleado integer auto_increment PRIMARY KEY,
    Nombre varchar(50) NOT NULL,
    Apellido1 varchar(50) NOT NULL,
    Apellido2 varchar(50) NOT NULL,
    Departamento varchar(50) NOT NULL,
    Roles varchar(50) NOT NULL,
    FOREIGN KEY (Departamento) REFERENCES Departamento(Departamento)
);

#crea una tabla de tareas con codigo de tarea de primary key y codigo de empleado de foreign key y que cuando se
# elimine al empleado se ponga null el usuario
DROP TABLE IF EXISTS Tareas;
CREATE TABLE Tareas (
    CodigoTarea int NOT NULL PRIMARY KEY auto_increment,
    Departamento varchar(50) NOT NULL,
    Tarea varchar(1000) NOT NULL,
    FechaInicio date NOT NULL,
    FechaFin date,
    Estado varchar(50) NOT NULL,
    FOREIGN KEY (Departamento) REFERENCES Departamento(Departamento)
);

#crea una tabla de registros con codigo de registro de primary key y codigo de tarea de foreign key y que no se borre
# nada si se borra la tareao el usuario
DROP TABLE IF EXISTS Registros_Tareas;
CREATE TABLE Registros_Tareas (
    CodigoRegistro int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    CodigoTarea int ,
    Departamento varchar(50),
    FechaInicio date NOT NULL,
    Fechafin date,
    Descripcion varchar(1000),
    Estado varchar(20)
);

drop table if exists Registro_Usuarios;
CREATE TABLE Registro_Usuarios (
    CodigoRegistro  int NOT NULL AUTO_INCREMENT,
    CodigoEmpleado VARCHAR(50) NOT NULL,
    Usuario varchar(50) NOT NULL,
    Roles varchar(50) NOT NULL,
    Descripcion varchar(1000),
    PRIMARY KEY (CodigoRegistro)
);

drop table if exists user;
CREATE TABLE user(
    CodigoEmpleado int not null ,
    Usuario VARCHAR(50) NOT NULL primary key ,
    Password VARCHAR(200) NOT NULL,
    Roles VARCHAR(50) NOT NULL,
    FOREIGN KEY (CodigoEmpleado) REFERENCES Usuarios(CodigoEmpleado) ON DELETE CASCADE ON UPDATE CASCADE
);

