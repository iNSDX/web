/* SCRIPT DE CREACIÓN DE TABLAS-RESTRICCIONES-SECUENCIAS */

--------------------------------------------------------
-- Borrado de tablas
--------------------------------------------------------
DROP TABLE LineasFactura;
DROP TABLE Facturas;
DROP TABLE ArticulosPedidos;
DROP TABLE Pedidos;
DROP TABLE ArticulosVendidos;
DROP TABLE VentasMaquinas;
DROP TABLE Ventas;
DROP TABLE ArticulosMaquinas;
DROP TABLE Articulos;
DROP TABLE ArqueosCajas;
DROP TABLE Gastos;
DROP TABLE Ingresos;
DROP TABLE Promociones;
DROP TABLE Proveedores;
DROP TABLE Almacenes;
DROP TABLE Empleados;
DROP TABLE ClientesRegistrados;
DROP TABLE Maquinas;
DROP TABLE USUARIOS;
DROP TABLE CONTACTOS;

--------------------------------------------------------
-- Creación de tablas
--------------------------------------------------------

CREATE TABLE Ingresos (
      idIngreso SMALLINT NOT NULL,
      fecha DATE NOT NULL,
      totalDineroFiadoDevuelto NUMBER(5,2),
      totalNeto NUMBER(6,2) NOT NULL,
      totalBruto NUMBER(7,2) NOT NULL,
    PRIMARY KEY(idIngreso)
    );
DROP SEQUENCE sec_ingresos;
CREATE SEQUENCE sec_ingresos; 
--------------------------------------------------------
CREATE TABLE Gastos (
      idGastos SMALLINT NOT NULL,
      fecha DATE NOT NULL,
      totalProveedor NUMBER(7,2) NOT NULL,
      propios NUMBER(6,2) NOT NULL,
      luz NUMBER(5,2) NOT NULL,
      agua NUMBER(4,2) NOT NULL,
      telefono NUMBER(4,2) NOT NULL,
      tasaAutonomo NUMBER (5,2) NOT NULL,
      sueldoEmpleados NUMBER (6,2) NOT NULL,
      totalFiado NUMBER(6,2) NOT NULL,
    PRIMARY KEY(idGastos)
    );

DROP SEQUENCE sec_gastos;
CREATE SEQUENCE sec_gastos; 
--------------------------------------------------------
CREATE TABLE ArqueosCajas (
      idCaja SMALLINT NOT NULL,
      fecha DATE NOT NULL,
      contadoCaja NUMBER(6,2) NOT NULL,
      totalVentas NUMBER(6,2) NOT NULL,
      dineroFiado NUMBER(5,2) NOT NULL,
      pagoProveedor NUMBER(6,2) NOT NULL,
      dineroFiadoDevuelto NUMBER(5,2) NOT NULL,
      idGastos SMALLINT ,
      idIngreso SMALLINT ,
    PRIMARY KEY(idCaja),
    FOREIGN KEY(idGastos) REFERENCES Gastos,
    FOREIGN KEY(idIngreso)REFERENCES Ingresos
    );
    
DROP SEQUENCE sec_arqueo;
CREATE SEQUENCE sec_arqueo; 
--------------------------------------------------------
CREATE TABLE Promociones (
      idPromocion SMALLINT NOT NULL,
      descripcion VARCHAR(140) NOT NULL,
      fechaInicio DATE NOT NULL,
      fechaFin DATE,
    PRIMARY KEY(idPromocion)
    );
    
DROP SEQUENCE sec_promo;
CREATE SEQUENCE sec_promo; 
--------------------------------------------------------
CREATE TABLE Proveedores(
     idProveedor SMALLINT NOT NULL,
     cif VARCHAR2(20) NOT NULL UNIQUE,
     nombre VARCHAR2(20),
     telefono VARCHAR2(9),
     nSanitario VARCHAR2(20),
     emailContacto VARCHAR2(20),
     tipo VARCHAR2(20),
     PRIMARY KEY(idProveedor)
  );
  
DROP SEQUENCE sec_prov;
CREATE SEQUENCE sec_prov; 
--------------------------------------------------------
CREATE TABLE Almacenes(
      idAlmacen SMALLINT NOT NULL CHECK (idAlmacen BETWEEN 1 AND 2),
      ultimaFechaEntrada DATE NOT NULL,
      PRIMARY KEY(idAlmacen)
  );
--------------------------------------------------------
CREATE TABLE Maquinas(
      idMaquina SMALLINT NOT NULL CHECK (idMaquina BETWEEN 1 AND 6),
      nombreBar VARCHAR2(20) NOT NULL,
      fechaUltimaReposicion DATE NOT NULL,
      PRIMARY KEY(idMaquina)
  );
  
DROP SEQUENCE sec_maq;
CREATE SEQUENCE sec_maq;   
--------------------------------------------------------
CREATE TABLE Articulos (
      idArticulo SMALLINT NOT NULL,
      nombre VARCHAR2(20) NOT NULL,
      descripcion VARCHAR2(140),
      precioCosto NUMBER(4,2) NOT NULL,
      precioVenta NUMBER(4,2) NOT NULL,
      baseImponible NUMBER(4,2) NOT NULL,
      tipoIva VARCHAR2(5) NOT NULL CHECK (tipoIva IN ('iva1', 'iva2', 'iva3')),
      margen VARCHAR2(8) NOT NULL CHECK (margen IN ('margen1', 'margen2', 'margen3', 'margen4', 'margen5', 'margen6')),
      dadoBaja CHAR(1) NOT NULL,
      numeroVentas NUMBER NOT NULL,
      stock NUMBER NOT NULL,
      nombreFamilia VARCHAR2(20) NOT NULL CHECK (nombreFamilia IN ('comestibles', 'golosinas', 'tabaco', 'papeleria', 'otros')),
      nombreSubFamilia VARCHAR2(20) CHECK (nombreSubFamilia IN ('gominolas', 'chicles', 'patatasFritas', 'cigarrillos','picadura','puros','otros')),
      idProveedor SMALLINT,
      idAlmacen SMALLINT,
      idPromocion SMALLINT,
    PRIMARY KEY(idArticulo),
    FOREIGN KEY(idProveedor) REFERENCES Proveedores,
    FOREIGN KEY(idAlmacen) REFERENCES Almacenes,
    FOREIGN KEY(idPromocion) REFERENCES Promociones
    --FOREIGN KEY(idMaquina) REFERENCES Maquinas
  );
  
DROP SEQUENCE sec_art;
CREATE SEQUENCE sec_art; 
--------------------------------------------------------
CREATE TABLE ArticulosMaquinas (
      idArticuloMaquina SMALLINT NOT NULL,
      idArticulo SMALLINT NOT NULL,
      nombre VARCHAR2(20) NOT NULL,
      numeroVentas NUMBER NOT NULL,
      stock NUMBER NOT NULL,
      idMaquina SMALLINT,
    PRIMARY KEY(idArticuloMaquina),
    FOREIGN KEY(idArticulo) REFERENCES Articulos,
    FOREIGN KEY(idMaquina) REFERENCES Maquinas
  );
  
DROP SEQUENCE sec_artmaq;
CREATE SEQUENCE sec_artmaq; 
--------------------------------------------------------
CREATE TABLE Empleados (
      idEmpleado SMALLINT NOT NULL,
      dni VARCHAR2(9) NOT NULL UNIQUE,
      nombreEmpleado VARCHAR2(20) NOT NULL,
      telefono VARCHAR2 (9),
      salario NUMBER,
    PRIMARY KEY(idEmpleado)
    );
    
DROP SEQUENCE sec_emp;
CREATE SEQUENCE sec_emp; 
--------------------------------------------------------
CREATE TABLE ClientesRegistrados(
     idClienteRegistrado SMALLINT NOT NULL,
     nombre VARCHAR2(20) NOT NULL,
     NIF VARCHAR2(10) NOT NULL,
     telefono VARCHAR2(9),
     cantidadFiada NUMBER(5,2),
    PRIMARY KEY(idClienteRegistrado)
    );
    
DROP SEQUENCE sec_clienre;
CREATE SEQUENCE sec_clienre; 
--------------------------------------------------------
CREATE TABLE Ventas (
      idVenta SMALLINT NOT NULL,
      fecha DATE NOT NULL,
      importe NUMBER(4,2) NOT NULL,
      idEmpleado SMALLINT,
      fiado CHAR(1),
      idCaja SMALLINT,
      idIngreso SMALLINT,
      idClienteRegistrado SMALLINT,
    PRIMARY KEY(idVenta),
    FOREIGN KEY(idEmpleado) REFERENCES Empleados(idEmpleado),
    FOREIGN KEY(idCaja) REFERENCES ArqueosCajas(idCaja),
    FOREIGN KEY(idIngreso) REFERENCES Ingresos(idIngreso),
    FOREIGN KEY(idClienteRegistrado) REFERENCES ClientesRegistrados(idClienteRegistrado)
    );

DROP SEQUENCE sec_ven;
CREATE SEQUENCE sec_ven; 
--------------------------------------------------------
CREATE TABLE VentasMaquinas (
      idVentaMaquina SMALLINT NOT NULL,
      idMaquina SMALLINT NOT NULL,
      idIngreso SMALLINT NOT NULL ,
      idArticuloMaquina SMALLINT NOT NULL ,
      fecha DATE NOT NULL,
      importe NUMBER NOT NULL,
      importeIva NUMBER NOT NULL,
      nombre VARCHAR2(20) NOT NULL,
      precioVenta NUMBER (3,2) NOT NULL,
      precioCosto NUMBER (3,2) NOT NULL,
      baseImponible NUMBER NOT NULL,
      tipoIva CHAR(5) NOT NULL CHECK (tipoIva IN ('iva1', 'iva2', 'iva3')),
      margen CHAR(8) NOT NULL CHECK (margen IN ('margen1', 'margen2', 'margen3', 'margen4', 'margen5', 'margen6')),
    PRIMARY KEY(idVentaMaquina),
    FOREIGN KEY(idMaquina) REFERENCES Maquinas,
    FOREIGN KEY(idIngreso) REFERENCES Ingresos,
    FOREIGN KEY(idArticuloMaquina) REFERENCES ArticulosMaquinas
    );
    
DROP SEQUENCE sec_ventmaq;
CREATE SEQUENCE sec_ventmaq; 
--------------------------------------------------------
CREATE TABLE ArticulosVendidos (
      idVendido SMALLINT NOT NULL,
      nombre VARCHAR2(20) NOT NULL,
      cantidad NUMBER NOT NULL,
      precioCosto NUMBER(4,2) NOT NULL,
      precioVenta NUMBER(4,2) NOT NULL,
      baseImponible NUMBER(4,2) NOT NULL,
      tipoIva VARCHAR2(5) NOT NULL CHECK (tipoIva IN ('iva1', 'iva2', 'iva3')),
      margen VARCHAR2(8) NOT NULL CHECK (margen IN ('margen1', 'margen2', 'margen3', 'margen4', 'margen5', 'margen6')),
      idVenta SMALLINT,
      idArticulo SMALLINT,
      PRIMARY KEY(idVendido),
      FOREIGN KEY(idVenta)REFERENCES Ventas,
      FOREIGN KEY(idArticulo)REFERENCES Articulos
  );
  
DROP SEQUENCE sec_artven;
CREATE SEQUENCE sec_artven; 
--------------------------------------------------------
CREATE TABLE Pedidos(
     idPedido SMALLINT NOT NULL,
     fechaRealizacion DATE NOT NULL,
     fechaEntrega DATE,
     importeCompra NUMBER NOT NULL,
     idProveedor SMALLINT,
     idAlmacen SMALLINT,
     PRIMARY KEY(idPedido),
     FOREIGN KEY(idProveedor) REFERENCES Proveedores,
     FOREIGN KEY(idAlmacen) REFERENCES Almacenes
    );

DROP SEQUENCE sec_pedido;
CREATE SEQUENCE sec_pedido;   
--------------------------------------------------------  
CREATE TABLE ArticulosPedidos(
      idArticuloPedido SMALLINT NOT NULL,
      idArticulo SMALLINT NOT NULL,
      cantidad NUMBER NOT NULL,
      precio NUMBER NOT NULL,
      idPedido SMALLINT ,
      PRIMARY KEY(idArticuloPedido),
      FOREIGN KEY(idArticulo)REFERENCES Articulos,
      FOREIGN KEY(idPedido)REFERENCES Pedidos
  );
  
DROP SEQUENCE sec_artped;
CREATE SEQUENCE sec_artped;
--------------------------------------------------------  
CREATE TABLE Facturas (
      idFactura SMALLINT NOT NULL,
      idVenta SMALLINT ,
      fechaEmision DATE NOT NULL,
      numLineas INTEGER NOT NULL,
    PRIMARY KEY(idFactura),
    FOREIGN KEY(idVenta) REFERENCES Ventas
    );

DROP SEQUENCE sec_fac;
CREATE SEQUENCE sec_fac; 
--------------------------------------------------------
CREATE TABLE LineasFactura (
      nombreArticulo VARCHAR2(20) NOT NULL,
      cantidad NUMBER NOT NULL,
      precioUnidad NUMBER(3,2) NOT NULL,
      precioTotal NUMBER(5,2) NOT NULL,
      idVendido SMALLINT,
      idFactura SMALLINT,
    PRIMARY KEY(idVendido,idFactura),
    FOREIGN KEY(idVendido) REFERENCES ArticulosVendidos,
    FOREIGN KEY(idFactura) REFERENCES Facturas
    );
--------------------------------------------------------
CREATE TABLE USUARIOS (
  IDCLIENTE INTEGER NOT NULL,
	NOMBRE VARCHAR2(25) NOT NULL,
	APELLIDOS VARCHAR2(75),
  FECHA_NACIMIENTO DATE,
	EMAIL VARCHAR2(75) NOT NULL UNIQUE,
	PASS VARCHAR2(75) NOT NULL,
	ACEPTADO CHAR(1),
  TIPO VARCHAR2(30) NOT NULL CHECK (TIPO IN ('Propietario', 'Gerente', 'Empleado', 'Cliente')),
	PRIMARY KEY (IDCLIENTE) );
  
DROP SEQUENCE SEC_IDCLIENTE;
CREATE SEQUENCE SEC_IDCLIENTE;
--------------------------------------------------------
CREATE TABLE CONTACTOS (
  IDCONTACTO INTEGER NOT NULL,
	NOMBRE VARCHAR2(25) NOT NULL,
	APELLIDOS VARCHAR2(75) NOT NULL,
	EMAIL VARCHAR2(75) NOT NULL,
  MENSAJE VARCHAR2(150) NOT NULL,
	PRIMARY KEY (IDCONTACTO) );
  
DROP SEQUENCE SEC_IDCONTACTO;
CREATE SEQUENCE SEC_IDCONTACTO;