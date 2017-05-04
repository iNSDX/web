/* SCRIPT DE CREACIÓN DE TRIGGERS */

--Ver todos los triggers de una tabla
SELECT trigger_name, status FROM ALL_TRIGGERS WHERE table_name ='ARTICULOS';
SELECT trigger_name, status FROM ALL_TRIGGERS WHERE table_name ='CLIENTESREGISTRADOS';
--Desactiva un trigger específico
ALTER TRIGGER bajaArticulo DISABLE;
ALTER TRIGGER bajaClienteRegistrado DISABLE;
ALTER TRIGGER checkFiar DISABLE;
ALTER TRIGGER checkLimite DISABLE;
--Desactiva todos los triggers de una tabla
ALTER TABLE articulos DISABLE ALL TRIGGERS;
ALTER TABLE clientesregistrados DISABLE ALL TRIGGERS;
--Borrar triggers
DROP TRIGGER bajaArticulo;
DROP TRIGGER bajaClienteRegistrado;
DROP TRIGGER checkFiar;
DROP TRIGGER checkLimite;

--Crear Triggers
CREATE OR REPLACE TRIGGER bajaArticulo
BEFORE
UPDATE OF dadoBaja ON Articulos
FOR EACH ROW
DECLARE
w_stock articulos.stock%TYPE;
BEGIN
SELECT stock INTO w_stock FROM articulos;
IF :NEW.dadoBaja='1' AND w_stock<>0 
THEN raise_application_error(-20001,'El articulo tiene stock');
END IF;
END;
/

CREATE OR REPLACE TRIGGER bajaClienteRegistrado
BEFORE
DELETE ON ClientesRegistrados
FOR EACH ROW
DECLARE
w_cantidadFiada clientesregistrados.cantidadfiada%TYPE;
BEGIN
SELECT cantidadFiada INTO w_cantidadFiada FROM clientesregistrados;
IF w_cantidadFiada<>0 
THEN raise_application_error(-20002,'El cliente todavia tiene articulos fiados');
END IF;
END;
/
ALTER TRIGGER bajaClienteRegistrado DISABLE;

CREATE OR REPLACE TRIGGER checkFiar
BEFORE
UPDATE OF cantidadFiada ON ClientesRegistrados
FOR EACH ROW
BEGIN
IF :OLD.cantidadFiada IS NULL
THEN raise_application_error(-20003,'Tenemos datos de cliente pero no esta registrado');
END IF;
END;
/

CREATE OR REPLACE TRIGGER checkLimite
BEFORE
UPDATE OF cantidadFiada ON ClientesRegistrados
FOR EACH ROW
BEGIN
IF :NEW.cantidadFiada>300
THEN raise_application_error(-20004,'No se puede fiar mas de 300€');
END IF;
END;
/

CREATE OR REPLACE TRIGGER checkTelefonoProv 
BEFORE INSERT OR UPDATE  
ON Proveedores
FOR EACH ROW 
BEGIN  
    IF NOT REGEXP_LIKE(:NEW.telefono ,'[0-9]{9}$') THEN  
      raise_application_error(-20005,'Numero de telefono no valido');
    END IF;  
END;
/
CREATE OR REPLACE TRIGGER checkTelefonoClien
BEFORE INSERT OR UPDATE  
ON ClientesRegistrados
FOR EACH ROW 
BEGIN  
    IF NOT REGEXP_LIKE(:NEW.telefono ,'[0-9]{9}$') THEN  
      raise_application_error(-20005,'Numero de telefono no valido');
    END IF;  
END;
/
CREATE OR REPLACE TRIGGER checkTelefonoEmpl
BEFORE INSERT OR UPDATE  
ON Empleados
FOR EACH ROW 
BEGIN  
    IF NOT REGEXP_LIKE(:NEW.telefono ,'[0-9]{9}$') THEN  
      raise_application_error(-20005,'Numero de telefono no valido');
    END IF;  
END;
/

CREATE OR REPLACE TRIGGER checkDniEmpl
BEFORE INSERT OR UPDATE  
ON Empleados
FOR EACH ROW 
DECLARE
TYPE letraArray IS VARRAY(23) OF VARCHAR2(2);
letra letraArray;
resto NUMBER;
BEGIN 
    letra:=letraArray('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
    resto:= MOD(TO_NUMBER(SUBSTR(:NEW.dni,1,8)),23)+1;
    dbms_output.put_line(resto);
    IF (NOT REGEXP_LIKE(:NEW.dni ,'[0-9]{8}[A-Z]{1}')) OR letra(resto) <> SUBSTR(:NEW.dni,9,9)  THEN  
      raise_application_error(-20006,'DNI no valido');
    END IF;  
END;
/

CREATE OR REPLACE TRIGGER checkNifClien
BEFORE INSERT OR UPDATE  
ON ClientesRegistrados
FOR EACH ROW 
DECLARE
TYPE letraArray IS VARRAY(23) OF VARCHAR2(2);
letra letraArray;
resto NUMBER;
BEGIN 
    letra:=letraArray('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
    resto:= MOD(TO_NUMBER(SUBSTR(:NEW.nif,1,8)),23)+1;
    dbms_output.put_line(resto);
    IF (NOT REGEXP_LIKE(:NEW.nif ,'[0-9]{8}[A-Z]{1}')) OR letra(resto) <> SUBSTR(:NEW.nif,9,9)  THEN  
      raise_application_error(-20006,'NIF no valido');
    END IF;  
END;
/

CREATE OR REPLACE TRIGGER checkCif
BEFORE INSERT OR UPDATE  
ON Proveedores
FOR EACH ROW 
BEGIN 
    IF NOT REGEXP_LIKE(:NEW.cif ,'[A-Z]{1}[0-9]{8}') THEN  
      raise_application_error(-20007,'CIF no valido');
    END IF;  
END;
/

CREATE OR REPLACE TRIGGER checkEmail
BEFORE INSERT OR UPDATE  
ON Proveedores
FOR EACH ROW 
BEGIN 
    IF NOT REGEXP_LIKE(:NEW.emailcontacto ,'^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9_\-]+\.)+(com|org|edu|net|ca|au|coop|de|ee|es|fm|fr|gr|ie|in|it|jp|me|nl|nu|ru|uk|us|za)$') THEN  
      raise_application_error(-20008,'Email no valido');
    END IF;  
END;
/

CREATE OR REPLACE TRIGGER CHECK_INSERTAR_IDCLIENTE
BEFORE INSERT ON CLIENTES
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT SEC_IDCLIENTE.NEXTVAL INTO :NEW.IDCLIENTE FROM DUAL;
END;
/