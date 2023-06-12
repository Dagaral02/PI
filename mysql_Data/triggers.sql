Use DB;
Drop Trigger if exists agregar_usuario;
CREATE TRIGGER agregar_usuario AFTER INSERT ON Usuarios
FOR EACH ROW
BEGIN
    DECLARE pass VARCHAR(10);
    DECLARE username VARCHAR(30);
    SET pass = CONCAT(SUBSTRING(MD5(RAND()) FROM 1 FOR 7), '1a');
    SET username = CONCAT(LEFT(NEW.Nombre, 1), NEW.Apellido1);

    INSERT INTO user (CodigoEmpleado, Usuario, Password, Roles) VALUES (NEW.CodigoEmpleado, username, pass, NEW.Roles);

    INSERT INTO Registro_Usuarios (CodigoEmpleado,Usuario, Roles, Descripcion) VALUES (NEW.CodigoEmpleado, username, NEW.Roles, 'Dado de alta');
END;


Drop Trigger if exists eliminar_usuario;
CREATE TRIGGER eliminar_usuario
AFTER DELETE ON Usuarios
FOR EACH ROW
BEGIN
    DECLARE username VARCHAR(30);
    SET username = CONCAT(LEFT(OLD.Nombre, 1), OLD.Apellido1);
    INSERT INTO Registro_Usuarios (CodigoEmpleado, Usuario, Roles, Descripcion)
    VALUES (OLD.CodigoEmpleado, username, OLD.Roles, 'Dado de baja');
END;

DROP TRIGGER IF EXISTS actualizar_usuario;
CREATE TRIGGER actualizar_usuario
AFTER UPDATE ON Usuarios
FOR EACH ROW
BEGIN
    INSERT INTO Registro_Usuarios (CodigoEmpleado, Usuario, Roles, Descripcion)
    VALUES (OLD.CodigoEmpleado, OLD.Nombre, OLD.Roles, 'Actualizado');
END;

DROP TRIGGER IF EXISTS cambiar_password;
CREATE TRIGGER cambiar_password
AFTER UPDATE ON user
FOR EACH ROW
BEGIN
    IF NEW.Password <> OLD.Password THEN
        INSERT INTO Registro_Usuarios (CodigoEmpleado, Usuario, Roles, Descripcion)
        VALUES (OLD.CodigoEmpleado, OLD.Usuario, OLD.Roles, 'Password cambiada');
    END IF;
END;

DROP TRIGGER IF EXISTS cambiar_Usuario;
CREATE TRIGGER cambiar_Usuario
AFTER UPDATE ON Usuarios
FOR EACH ROW
BEGIN
    DECLARE username VARCHAR(30);
    SET username = CONCAT(LEFT(NEW.Nombre, 1), NEW.Apellido1);
    IF NEW.Nombre <> OLD.Nombre OR NEW.Apellido1 <> OLD.Apellido1 THEN
        UPDATE user SET Usuario = username WHERE CodigoEmpleado = OLD.CodigoEmpleado;
        INSERT INTO Registro_Usuarios (CodigoEmpleado, Usuario, Roles, Descripcion)
        VALUES (OLD.CodigoEmpleado, username, OLD.Roles, 'Usuario cambiado');
    END IF;
END;

#------------------------------------------------------------------------------------------------------------------------
DROP TRIGGER IF EXISTS añadir_tareas;
CREATE TRIGGER añadir_tareas
AFTER INSERT ON Tareas
FOR EACH ROW
BEGIN
    INSERT INTO Registros_Tareas (CodigoTarea, FechaInicio,Departamento, FechaFin, Descripcion, Estado)
    VALUES (NEW.CodigoTarea, NEW.FechaInicio,NEW.Departamento, NEW.FechaFin, NEW.Tarea,NEW.Estado);
END;

DROP TRIGGER IF EXISTS eliminar_tareas;
CREATE TRIGGER eliminar_tareas
AFTER DELETE ON Tareas
FOR EACH ROW
BEGIN
    INSERT INTO Registros_Tareas (CodigoTarea, FechaInicio,Departamento, FechaFin, Descripcion,Estado)
    VALUES (OLD.CodigoTarea, OLD.FechaInicio,OLD.Departamento, OLD.FechaFin, OLD.Tarea,OLD.Estado);
END;

DROP TRIGGER IF EXISTS modificar_estado_tareas;
CREATE TRIGGER modificar_estado_tareas
AFTER UPDATE ON Tareas
FOR EACH ROW
BEGIN
    IF NEW.Estado <> OLD.Estado THEN
        INSERT INTO Registros_Tareas (CodigoTarea, FechaInicio,Departamento, FechaFin, Descripcion,Estado)
        VALUES (NEW.CodigoTarea, NEW.FechaInicio,NEW.Departamento, NEW.FechaFin, NEW.Tarea,NEW.Estado);
    END IF;
END;

DROP TRIGGER IF EXISTS modificar_tareas;
CREATE TRIGGER modificar_tareas
AFTER UPDATE ON Tareas
FOR EACH ROW
BEGIN
    INSERT INTO Registros_Tareas (CodigoTarea, FechaInicio,Departamento, FechaFin, Descripcion,Estado)
    VALUES (NEW.CodigoTarea, NEW.FechaInicio, NEW.Departamento ,NEW.FechaFin, NEW.Tarea,NEW.Estado);
END;
