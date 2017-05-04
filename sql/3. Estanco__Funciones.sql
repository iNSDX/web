/* SCRIPT DE CREACIÓN DE FUNCIONES*/

--------------------------------------------------------
-- Borrado de funciones
--------------------------------------------------------
DROP FUNCTION obtener_ingresos_mes_bruto;
DROP FUNCTION obtener_ingresos_año_bruto;
DROP FUNCTION obtener_ingresos_mes_neto;
DROP FUNCTION obtener_ingresos_año_neto;
DROP FUNCTION obtener_gastos_mes;
DROP FUNCTION obtener_gastos_año;
DROP FUNCTION obtener_importe_ventamaquina;
DROP FUNCTION obtener_ingresonetomes_maquina;
DROP FUNCTION obtener_ingresonetoañomaquina;
DROP FUNCTION obtener_ingresonetomesmaquinas;
DROP FUNCTION obteneringresonetoañomaquinas;
DROP FUNCTION obtener_importe_venta_articulo;
DROP FUNCTION obtener_importotal_compra_art;
DROP FUNCTION obtener_importetotal_artlinfac;

--------------------------------------------------------
-- Creacion Funciones
--------------------------------------------------------

--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS MES BRUTO
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresos_mes_bruto(
w_fecha IN ingresos.fecha%TYPE)
RETURN NUMBER IS ingresoMensualBruto ingresos.totalBruto%TYPE;
BEGIN
SELECT sum(totalVentas) INTO ingresoMensualBruto FROM arqueosCajas
WHERE EXTRACT(MONTH FROM fecha)=EXTRACT(MONTH FROM w_fecha) AND EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresoMensualBruto);
END obtener_ingresos_mes_bruto;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS BRUTO AÑO
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresos_año_bruto(
w_fecha IN ingresos.fecha%TYPE)
RETURN NUMBER IS ingresoAnualBruto ingresos.totalBruto%TYPE;
BEGIN
SELECT sum(totalVentas) INTO ingresoAnualBruto FROM arqueosCajas
WHERE EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresoAnualBruto);
END obtener_ingresos_año_bruto;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS MES NETO
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresos_mes_neto(
w_fecha IN ingresos.fecha%TYPE)
RETURN NUMBER IS ingresoMensualNeto ingresos.totalNeto%TYPE;
BEGIN
SELECT sum(totalVentas)-sum(dineroFiado)-sum(pagoProveedor)+sum(dineroFiadoDevuelto) INTO ingresoMensualNeto FROM arqueosCajas
WHERE EXTRACT(MONTH FROM fecha)=EXTRACT(MONTH FROM w_fecha) AND EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresoMensualNeto);
END obtener_ingresos_mes_neto;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS NETO AÑO
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresos_año_neto(
w_fecha IN ingresos.fecha%TYPE)
RETURN NUMBER IS ingresoAnualNeto ingresos.totalNeto%TYPE;
BEGIN
SELECT sum(totalVentas)-sum(dineroFiado)-sum(pagoProveedor)+sum(dineroFiadoDevuelto) INTO ingresoAnualNeto FROM arqueosCajas
WHERE EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresoAnualNeto);
END obtener_ingresos_año_neto;
/

--------------------------------------------------------
-- Creacion Funcion OBTENER GASTOS MES
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_gastos_mes(
w_fecha IN gastos.fecha%TYPE)
RETURN NUMBER IS gastomensual gastos.totalProveedor%TYPE;
BEGIN
SELECT (totalProveedor+propios+luz+agua+telefono+tasaAutonomo+sueldoEmpleados+totalFiado) INTO gastomensual FROM gastos
WHERE EXTRACT(MONTH FROM fecha)=EXTRACT(MONTH FROM w_fecha) AND EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(gastomensual);
END obtener_gastos_mes;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER GASTOS AÑO 
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_gastos_año(
w_fecha IN gastos.fecha%TYPE)
RETURN NUMBER IS gastoanual gastos.totalProveedor%TYPE;
BEGIN
SELECT totalProveedor+propios+luz+agua+telefono+tasaAutonomo+sueldoEmpleados+totalFiado INTO gastoanual FROM gastos
WHERE EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(gastoanual);
END obtener_gastos_año;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER IMPORTE VENTAMAQUINA ID
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_importe_ventamaquina(
w_idVentaMaquina IN ventasmaquinas.idVentaMaquina%TYPE)
RETURN NUMBER IS importe ventasmaquinas.importe%TYPE;
BEGIN
SELECT importe INTO importe FROM ventasmaquinas
WHERE idVentaMaquina=w_idVentaMaquina;
RETURN(importe);
END obtener_importe_ventamaquina;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS NETO MES MAQUINA ID
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresonetomes_maquina(
w_fecha IN ventasmaquinas.fecha%TYPE,
w_idMaquina IN ventasmaquinas.idMaquina%TYPE)
RETURN NUMBER IS ingresoneto NUMBER;
BEGIN
SELECT sum(precioVenta)-sum(precioCosto) INTO ingresoneto FROM ventasmaquinas
WHERE idMaquina=w_idMaquina AND EXTRACT(MONTH FROM fecha)=EXTRACT(MONTH FROM w_fecha) AND EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresoneto);
END obtener_ingresonetomes_maquina;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS NETO AÑO MAQUINA ID
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresonetoañomaquina(
w_fecha IN ventasmaquinas.fecha%TYPE,
w_idMaquina IN ventasmaquinas.idMaquina%TYPE)
RETURN NUMBER IS ingresonetoanual NUMBER;
BEGIN
SELECT sum(precioVenta)-sum(precioCosto) INTO ingresonetoanual FROM ventasmaquinas
WHERE idMaquina=w_idMaquina and EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresonetoanual);
END obtener_ingresonetoañomaquina;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS NETO MES TOTAL MAQUINAS
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_ingresonetomesmaquinas(
w_fecha IN ventasmaquinas.fecha%TYPE)
RETURN NUMBER IS ingresonetomestotal NUMBER;
BEGIN
SELECT sum(precioVenta)-sum(precioCosto) INTO ingresonetomestotal FROM ventasmaquinas
WHERE EXTRACT(MONTH FROM fecha)=EXTRACT(MONTH FROM w_fecha) AND EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresonetomestotal);
END obtener_ingresonetomesmaquinas;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER INGRESOS NETO AÑO TOTAL MAQUINAS
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obteneringresonetoañomaquinas(
w_fecha IN ventasmaquinas.fecha%TYPE)
RETURN NUMBER IS ingresonetoanualtotal NUMBER;
BEGIN
SELECT sum(precioVenta)-sum(precioCosto) INTO ingresonetoanualtotal FROM ventasmaquinas
WHERE EXTRACT(YEAR FROM fecha)=EXTRACT(YEAR FROM w_fecha);
RETURN(ingresonetoanualtotal);
END obteneringresonetoañomaquinas;
/
--------------------------------------------------------
-- Creacion Funcion OBTENER IMPORTE VENTA ID
--------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_importe_venta_articulo(
w_idVenta IN articulosvendidos.idVenta%TYPE,
w_idArticulo IN articulosvendidos.idArticulo%TYPE)
RETURN NUMBER IS importeventaarticulo ventas.importe%TYPE;
BEGIN
SELECT cantidad*precioVenta INTO importeventaarticulo FROM articulosvendidos
WHERE idVenta=w_idVenta and idArticulo=w_idArticulo;
RETURN(importeventaarticulo);
END obtener_importe_venta_articulo;
/
----------------------------------------------------------------------
-- Creacion Funcion OBTENER IMPORTE TOTAL ARTICULO PEDIDO PROVEEDOR
----------------------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_importotal_compra_art(
w_idArticulo IN articulospedidos.idArticulo%TYPE,
w_idPedido IN articulospedidos.idPedido%TYPE)
RETURN NUMBER IS importearticulopedido ventas.importe%TYPE;
BEGIN
SELECT cantidad*precio INTO importearticulopedido FROM articulospedidos
WHERE idPedido=w_idPedido and idArticulo=w_idArticulo;
RETURN(importearticulopedido);
END obtener_importotal_compra_art;
/
----------------------------------------------------------------------
-- Creacion Funcion OBTENER IMPORTE TOTAL ARTICULO LINEFACTURA
----------------------------------------------------------------------
CREATE OR REPLACE FUNCTION obtener_importetotal_artlinfac(
w_nombreArticulo IN lineasfactura.nombreArticulo%TYPE,
w_idFactura IN lineasfactura.idFactura%TYPE)
RETURN NUMBER IS precioTotal ventas.importe%TYPE;
BEGIN
SELECT cantidad*precioUnidad INTO precioTotal FROM lineasfactura
WHERE nombreArticulo=w_nombreArticulo and idFactura=w_idFactura;
RETURN(precioTotal);
END obtener_importetotal_artlinfac;
/
----------------------------------------------------------------------
-- Creacion Funcion AUXILIAR COMPARE
----------------------------------------------------------------------
CREATE OR REPLACE FUNCTION ASSERT_EQUALS(salida BOOLEAN,salida_esperada BOOLEAN)
RETURN VARCHAR2 AS
BEGIN
IF(salida=salida_esperada) THEN
RETURN 'EXITO';
ELSE
RETURN 'FALLO';
END IF;
END ASSERT_EQUALS;
