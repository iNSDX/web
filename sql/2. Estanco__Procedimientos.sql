/* SCRIPT DE CREACIÓN DE PROCEDIMIENTOS Y FUNCIONES*/
--------------------------------------------------------
-- Borrado Procedimientos
--------------------------------------------------------
DROP PROCEDURE nuevo_almacen;
DROP PROCEDURE mod_almacen;
DROP PROCEDURE del_almacen;
DROP PROCEDURE nuevo_arqueoCaja;
DROP PROCEDURE mod_arqueoCaja;
DROP PROCEDURE del_arqueoCaja;
DROP PROCEDURE nuevo_articulo;
DROP PROCEDURE mod_articulo;
DROP PROCEDURE mod_articuloprom;
DROP PROCEDURE del_articulo;
DROP PROCEDURE nuevo_articuloMaquina;
DROP PROCEDURE mod_articuloMaquina;
DROP PROCEDURE del_articuloMaquina;
DROP PROCEDURE nuevo_articuloPedido;
DROP PROCEDURE mod_articuloPedido;
DROP PROCEDURE del_articuloPedido;
DROP PROCEDURE nuevo_articuloVendido;
DROP PROCEDURE mod_articuloVendido;
DROP PROCEDURE del_articuloVendido;
DROP PROCEDURE nuevo_clienreg;
DROP PROCEDURE mod_clienreg;
DROP PROCEDURE del_clienreg;
DROP PROCEDURE contratar_empleado;
DROP PROCEDURE mod_empleado;
DROP PROCEDURE del_empleado;
DROP PROCEDURE nueva_factura;
DROP PROCEDURE del_factura;
DROP PROCEDURE nuevo_gasto;
DROP PROCEDURE mod_gasto;
DROP PROCEDURE del_gasto;
DROP PROCEDURE nuevo_ingreso;
DROP PROCEDURE mod_ingreso;
DROP PROCEDURE del_ingreso;
DROP PROCEDURE nueva_lineaFactura;
DROP PROCEDURE mod_lineaFactura;
DROP PROCEDURE del_lineaFactura;
DROP PROCEDURE nueva_maquina;
DROP PROCEDURE mod_maquina;
DROP PROCEDURE del_maquina;
DROP PROCEDURE nuevo_pedido;
DROP PROCEDURE mod_pedido;
DROP PROCEDURE del_pedido;
DROP PROCEDURE crear_promo;
DROP PROCEDURE mod_promo;
DROP PROCEDURE del_promo;
DROP PROCEDURE nuevo_proveedor;
DROP PROCEDURE mod_proveedor;
DROP PROCEDURE del_proveedor;
DROP PROCEDURE nueva_venta;
DROP PROCEDURE mod_venta;
DROP PROCEDURE del_venta;
DROP PROCEDURE nueva_ventamaq;
DROP PROCEDURE mod_ventamaq;
DROP PROCEDURE del_ventamaq;
DROP PROCEDURE INSERTAR_NUEVO_CLIENTE;
DROP PROCEDURE MOD_CLIENTE;
DROP PROCEDURE DEL_CLIENTE;

--------------------------------------------------------
-- Creación Procedimientos ALMACENES
--------------------------------------------------------

--Insertar Almacén
CREATE OR REPLACE PROCEDURE nuevo_almacen(
w_idAlmacen  IN almacenes.idAlmacen%TYPE,
w_ultimaFechaEntrada IN almacenes.ultimaFechaEntrada%TYPE) IS
BEGIN
INSERT INTO almacenes(idAlmacen,ultimaFechaEntrada)
VALUES (w_idAlmacen, w_ultimaFechaEntrada);
COMMIT WORK;
END nuevo_almacen;
/

--Modificar Almacén
CREATE OR REPLACE PROCEDURE mod_almacen(
w_idAlmacen IN almacenes.idAlmacen%TYPE,	
w_ultimaFechaEntrada IN almacenes.ultimaFechaEntrada%TYPE) IS
BEGIN
UPDATE almacenes
SET idAlmacen = w_idAlmacen, ultimaFechaEntrada = w_ultimaFechaEntrada
WHERE idAlmacen = w_idAlmacen;
COMMIT WORK;
END mod_almacen;
/

--Borrar Almacén
CREATE OR REPLACE PROCEDURE del_almacen(
w_idAlmacen IN almacenes.idAlmacen%TYPE) IS
BEGIN
DELETE FROM almacenes WHERE idAlmacen = w_idAlmacen;
COMMIT WORK;
END del_almacen;
/

--------------------------------------------------------
-- Creación Procedimientos ARQUEOS CAJAS
--------------------------------------------------------
--Insertar Arqueo Caja
CREATE OR REPLACE PROCEDURE nuevo_arqueoCaja(	
w_fecha IN arqueosCajas.fecha%TYPE,
w_contadoCaja IN arqueosCajas.contadoCaja%TYPE,
w_totalVentas IN arqueosCajas.totalVentas%TYPE,
w_dineroFiado IN arqueosCajas.dineroFiado%TYPE, 
w_pagoProveedor IN arqueosCajas.pagoProveedor%TYPE, 
w_dineroFiadoDevuelto IN arqueosCajas.dineroFiadoDevuelto%TYPE
) IS
BEGIN
INSERT INTO arqueosCajas(idCaja, fecha, contadoCaja, totalVentas, dineroFiado, pagoProveedor, dineroFiadoDevuelto,idGastos,idIngreso)
VALUES (sec_arqueo.nextval, w_fecha, w_contadoCaja, w_totalVentas, w_dineroFiado, w_pagoProveedor, w_dineroFiadoDevuelto, sec_gastos.currval, sec_ingresos.currval);
COMMIT WORK;
END nuevo_arqueoCaja;
/

--Modificar Arqueo Caja
CREATE OR REPLACE PROCEDURE mod_arqueoCaja(
w_idCaja IN arqueosCajas.idCaja%TYPE,
w_fecha IN arqueosCajas.fecha%TYPE,
w_contadoCaja IN arqueosCajas.contadoCaja%TYPE,
w_totalVentas IN arqueosCajas.totalVentas%TYPE,
w_dineroFiado IN arqueosCajas.dineroFiado%TYPE, 
w_pagoProveedor IN arqueosCajas.pagoProveedor%TYPE, 
w_dineroFiadoDevuelto IN arqueosCajas.dineroFiadoDevuelto%TYPE,
w_idGastos IN arqueosCajas.idGastos%TYPE,
w_idIngreso IN arqueosCajas.idIngreso%TYPE
) IS
BEGIN
UPDATE arqueosCajas
SET fecha = w_fecha,contadoCaja = w_contadoCaja,totalVentas = w_totalVentas,
dineroFiado = w_dineroFiado, pagoProveedor = w_pagoProveedor, dineroFiadoDevuelto = w_dineroFiadoDevuelto, idGastos= w_idGastos, idIngreso = w_idIngreso
WHERE idCaja = w_idCaja;
COMMIT WORK;
END mod_arqueoCaja;
/

--Borrar Arqueo Caja
CREATE OR REPLACE PROCEDURE del_arqueoCaja(
w_idCaja IN arqueosCajas.idCaja%TYPE) IS
BEGIN
DELETE FROM arqueosCajas WHERE idCaja = w_idCaja;
COMMIT WORK;
END del_arqueoCaja;
/

--------------------------------------------------------
-- Creación Procedimientos ARTÍCULOS
--------------------------------------------------------

--Insertar Artículo
CREATE OR REPLACE PROCEDURE nuevo_articulo(
w_nombre IN articulos.nombre%TYPE,
w_descripcion IN articulos.descripcion%TYPE,
w_precioCosto IN articulos.precioCosto%TYPE,
w_precioVenta IN articulos.precioVenta%TYPE,
w_baseImponible IN articulos.baseImponible%TYPE,
w_tipoIva IN articulos.tipoIva%TYPE,
w_margen IN articulos.margen%TYPE,
w_dadoBaja IN articulos.dadoBaja%TYPE,
w_numeroVentas IN articulos.numeroVentas%TYPE,
w_stock IN articulos.stock%TYPE,
w_nombreFamilia IN articulos.nombreFamilia%TYPE,
w_nombreSubFamilia articulos.nombreSubFamilia%TYPE,
w_idProveedor IN articulos.idProveedor%TYPE,
w_idAlmacen IN articulos.idalmacen%TYPE,
w_idPromocion IN articulos.idpromocion%TYPE
) IS
BEGIN
INSERT INTO articulos(idArticulo, nombre, descripcion, precioCosto, precioVenta, baseImponible, tipoIva, margen, dadoBaja, numeroVentas, stock, nombreFamilia, nombreSubFamilia,idProveedor,idAlmacen,idPromocion)
VALUES (sec_art.nextval, w_nombre, w_descripcion, w_precioCosto, w_precioVenta, w_baseImponible, w_tipoIva, w_margen, w_dadoBaja, w_numeroVentas, w_stock, w_nombreFamilia, w_nombreSubFamilia,w_idProveedor,w_idAlmacen,w_idPromocion);
COMMIT WORK;
END nuevo_articulo;
/

--Modificar Artículo
CREATE OR REPLACE PROCEDURE mod_articulo(
w_idArticulo IN articulos.idArticulo%TYPE,
w_nombre IN articulos.nombre%TYPE,
w_descripcion IN articulos.descripcion%TYPE,
w_precioCosto IN articulos.precioCosto%TYPE,
w_precioVenta IN articulos.precioVenta%TYPE,
w_baseImponible IN articulos.baseImponible%TYPE,
w_tipoIva IN articulos.tipoIva%TYPE,
w_margen IN articulos.margen%TYPE,
w_dadoBaja IN articulos.dadoBaja%TYPE,
w_numeroVentas IN articulos.numeroVentas%TYPE,
w_stock IN articulos.stock%TYPE,
w_nombreFamilia IN articulos.nombreFamilia%TYPE,
w_nombreSubFamilia articulos.nombreSubFamilia%TYPE,
w_idProveedor IN articulos.idProveedor%TYPE,
w_idAlmacen IN articulos.idalmacen%TYPE,
w_idPromocion IN articulos.idpromocion%TYPE) IS
BEGIN
UPDATE articulos
SET descripcion = w_descripcion, precioCosto = w_precioCosto, precioVenta = w_precioVenta, baseImponible = w_baseImponible, tipoIva = w_tipoIva, margen = w_margen, 
dadoBaja = w_dadoBaja, numeroVentas = w_numeroVentas, stock = w_stock, nombreFamilia = w_nombreFamilia, nombreSubFamilia = nombreSubFamilia,idProveedor = w_idProveedor,idAlmacen=w_idAlmacen,idPromocion=w_idPromocion
WHERE idArticulo=w_idArticulo;
COMMIT WORK;
END mod_articulo;
/

--Modificar Artículo solo añadir promocion
CREATE OR REPLACE PROCEDURE mod_articuloprom(
w_idArticulo IN articulos.idArticulo%TYPE,
w_idPromocion IN articulos.idpromocion%TYPE) IS
BEGIN
UPDATE articulos
SET idPromocion=w_idPromocion
WHERE idArticulo=w_idArticulo;
COMMIT WORK;
END mod_articuloprom;
/

--Borrar Artículo
CREATE OR REPLACE PROCEDURE del_articulo(
w_idArticulo IN articulos.idArticulo%TYPE) IS
BEGIN
DELETE FROM articulos WHERE idArticulo = w_idArticulo;
COMMIT WORK;
END del_articulo;
/

--------------------------------------------------------
-- Creación Procedimientos ARTÍCULOS MAQUINA
--------------------------------------------------------

--Insertar Artículo Maquina
CREATE OR REPLACE PROCEDURE nuevo_articuloMaquina(
w_idArticulo IN articulosmaquinas.idarticulo%TYPE,
w_idMaquina IN articulosmaquinas.idmaquina%TYPE,
w_nombre IN articulosmaquinas.nombre%TYPE,
w_numeroventas IN articulosmaquinas.numeroventas%TYPE,
w_stock IN articulosmaquinas.stock%TYPE) IS
BEGIN
INSERT INTO articulosMaquinas(idArticuloMaquina,idArticulo,idMaquina,nombre,numeroventas,stock)
VALUES (sec_artmaq.nextval, w_idArticulo, w_idMaquina,w_nombre,w_numeroventas,w_stock);
COMMIT WORK;
END nuevo_articuloMaquina;
/

--Modificar Artículo Maquina
CREATE OR REPLACE PROCEDURE mod_articuloMaquina(
w_idArticulo IN articulosmaquinas.idarticulo%TYPE,
w_idMaquina IN articulosmaquinas.idmaquina%TYPE,
w_nombre IN articulosmaquinas.nombre%TYPE,
w_numeroventas IN articulosmaquinas.numeroventas%TYPE,
w_stock IN articulosmaquinas.stock%TYPE) IS
BEGIN
UPDATE articulosMaquinas
SET nombre = w_nombre, numeroventas = w_numeroventas,stock=w_stock
WHERE idArticulo = w_idArticulo AND idMaquina=w_idMaquina;
COMMIT WORK;
END mod_articuloMaquina;
/

--Borrar Artículo Maquina
CREATE OR REPLACE PROCEDURE del_articuloMaquina(
w_idArticulo IN articulosmaquinas.idArticulo%TYPE,
w_idMaquina IN articulosmaquinas.idMaquina%TYPE) IS
BEGIN
DELETE FROM articulosmaquinas WHERE idArticulo = w_idArticulo AND idMaquina=w_idMaquina;
COMMIT WORK;
END del_articuloMaquina;
/

--------------------------------------------------------
-- Creación Procedimientos ARTÍCULOS PEDIDOS
--------------------------------------------------------

--Insertar Artículo Pedido
CREATE OR REPLACE PROCEDURE nuevo_articuloPedido(
w_idArticulo IN articulosPedidos.idarticulo%TYPE,
w_idPedido IN articulosPedidos.idPedido%TYPE,
w_cantidad IN articulosPedidos.cantidad%TYPE,
w_precio IN articulosPedidos.precio%TYPE) IS
BEGIN
INSERT INTO articulosPedidos(idArticuloPedido,idArticulo,idPedido, cantidad, precio)
VALUES (sec_artped.nextval,w_idArticulo,w_idPedido, w_cantidad, w_precio);
COMMIT WORK;
END nuevo_articuloPedido;
/

--Modificar Artículo Pedido
CREATE OR REPLACE PROCEDURE mod_articuloPedido(
w_idArticuloPedido IN articulosPedidos.idArticuloPedido%TYPE,
w_idArticulo IN articulosPedidos.idarticulo%TYPE,
w_idPedido IN articulosPedidos.idPedido%TYPE,
w_cantidad IN articulosPedidos.cantidad%TYPE,
w_precio IN articulosPedidos.precio%TYPE) IS
BEGIN
UPDATE articulosPedidos
SET idArticulo = w_idArticulo,idPedido=w_idPedido, cantidad = w_cantidad, precio = w_precio
WHERE idArticuloPedido = w_idArticuloPedido;
COMMIT WORK;
END mod_articuloPedido;
/

--Borrar Artículo Pedido
CREATE OR REPLACE PROCEDURE del_articuloPedido(
w_idArticuloPedido IN articulosPedidos.idArticuloPedido%TYPE) IS
BEGIN
DELETE FROM articulosPedidos WHERE idArticuloPedido = w_idArticuloPedido;
COMMIT WORK;
END del_articuloPedido;
/

--------------------------------------------------------
-- Creación Procedimientos ARTICULOS VENDIDOS
--------------------------------------------------------
--Nuevo Articulo Vendido
CREATE OR REPLACE PROCEDURE nuevo_articuloVendido(
w_idArticulo IN articulosvendidos.idArticulo%TYPE,
w_nombre IN articulosVendidos.nombre%TYPE,
w_cantidad IN articulosVendidos.cantidad%TYPE,
w_precioVenta IN articulosVendidos.precioVenta%TYPE,
w_baseImponible IN articulosVendidos.baseImponible%TYPE,
w_precioCosto IN articulosVendidos.precioCosto%TYPE,
w_tipoIva IN articulosVendidos.tipoIva%TYPE, 
w_margen IN articulosVendidos.margen%TYPE) IS 
BEGIN
INSERT INTO articulosVendidos(idVendido, nombre, cantidad, precioVenta,baseImponible, precioCosto, tipoIva, margen,idVenta,idArticulo)
VALUES (sec_artven.nextval, w_nombre, w_cantidad, w_precioVenta,w_baseImponible,w_precioCosto, w_tipoIva, w_margen,sec_ven.currval,w_idArticulo);
COMMIT WORK;
END nuevo_articuloVendido;
/

--Modificar Articulo Vendido
CREATE OR REPLACE PROCEDURE mod_articuloVendido(
w_idVendido IN articulosVendidos.idVendido%TYPE,
w_cantidad IN articulosVendidos.cantidad%TYPE,
w_precioVenta IN articulosVendidos.precioVenta%TYPE, 
w_precioCosto IN articulosVendidos.precioCosto%TYPE,
w_TipoIva IN articulosVendidos.TipoIva%TYPE, 
w_margen IN articulosVendidos.margen%TYPE) IS
BEGIN
UPDATE articulosVendidos
SET cantidad = w_cantidad, precioVenta = w_precioVenta, precioCosto = w_precioCosto, 
TipoIva = w_TipoIva, margen = w_margen
WHERE idVendido = w_idVendido;
COMMIT WORK;
END mod_articuloVendido;
/

--Borrar Articulo Vendido
CREATE OR REPLACE PROCEDURE del_articuloVendido(
w_idVendido IN articulosVendidos.idVendido%TYPE) IS
BEGIN
DELETE FROM articulosVendidos WHERE idVendido = w_idVendido;
COMMIT WORK;
END del_articuloVendido;
/
--------------------------------------------------------
-- Creación Procedimientos CLIENTE REGISTRADO
--------------------------------------------------------
--Insertar Cliente Registrado
CREATE OR REPLACE PROCEDURE nuevo_clienreg(
w_nombre IN clientesRegistrados.nombre%TYPE,
w_NIF IN clientesRegistrados.NIF%TYPE,
w_telefono IN clientesRegistrados.telefono%TYPE,
w_cantidadFiada IN clientesRegistrados.cantidadFiada%TYPE) IS
BEGIN
INSERT INTO clientesRegistrados(idClienteRegistrado, nombre, NIF, telefono, cantidadFiada)
VALUES (sec_clienre.nextval, w_nombre, w_NIF, w_telefono, w_cantidadFiada);
COMMIT WORK;
END nuevo_clienreg;
/

--Modificar Cliente Registrado
CREATE OR REPLACE PROCEDURE mod_clienreg(
w_idClienteRegistrado IN clientesRegistrados.idClienteRegistrado%TYPE,
w_nombre IN clientesRegistrados.nombre%TYPE,
w_NIF IN clientesRegistrados.NIF%TYPE,
w_telefono IN clientesRegistrados.telefono%TYPE,
w_cantidadFiada IN clientesRegistrados.cantidadFiada%TYPE) IS
BEGIN
UPDATE clientesRegistrados
SET nombre = w_nombre, NIF = w_NIF, telefono = w_telefono, cantidadFiada = w_cantidadFiada
WHERE idClienteRegistrado = w_idClienteRegistrado;
COMMIT WORK;
END mod_clienreg;
/

--Borrar Cliente Registrado
CREATE OR REPLACE PROCEDURE del_clienreg(
w_idClienteRegistrado IN clientesRegistrados.idClienteRegistrado%TYPE) IS
BEGIN
DELETE FROM clientesRegistrados WHERE idClienteRegistrado = w_idClienteRegistrado;
COMMIT WORK;
END del_clienreg;
/

--------------------------------------------------------
-- Creación Procedimientos EMPLEADOS
--------------------------------------------------------

--Insertar Empleado
CREATE OR REPLACE PROCEDURE contratar_empleado(
w_nombreEmpleado IN empleados.nombreEmpleado%TYPE,
w_salario IN empleados.salario%TYPE,
w_dni IN empleados.dni%TYPE,
w_telefono IN empleados.telefono%TYPE) IS
BEGIN
INSERT INTO empleados(idEmpleado, nombreEmpleado, salario, DNI, telefono)
VALUES (sec_emp.nextval, w_nombreEmpleado, w_salario, w_DNI, w_telefono);
COMMIT WORK;
END contratar_empleado;
/

--Modificar Empleado
CREATE OR REPLACE PROCEDURE mod_empleado(
w_idEmpleado IN empleados.idEmpleado%TYPE,
w_nombreEmpleado IN empleados.nombreEmpleado%TYPE,
w_salario IN empleados.salario%TYPE,
w_DNI IN empleados.DNI%TYPE,
w_telefono IN empleados.telefono%TYPE) IS
BEGIN
UPDATE empleados
SET nombreEmpleado = w_nombreEmpleado, salario = w_salario, DNI = w_DNI,
telefono = w_telefono
WHERE idEmpleado = w_idEmpleado;
COMMIT WORK;
END mod_empleado;
/

--Borrar Empleado
CREATE OR REPLACE PROCEDURE del_empleado(
w_idEmpleado IN empleados.idEmpleado%TYPE) IS
BEGIN
DELETE FROM empleados WHERE idEmpleado = w_idEmpleado;
COMMIT WORK;
END del_empleado;
/

--------------------------------------------------------
-- Creacion Procedimientos FACTURA
--------------------------------------------------------
--Insertar Factura
CREATE OR REPLACE PROCEDURE nueva_factura(
w_fechaEmision IN facturas.fechaEmision%TYPE,
w_numLineas IN facturas.numLineas%TYPE) IS
BEGIN
INSERT INTO facturas(idFactura,idVenta, fechaEmision, numLineas)
VALUES (sec_fac.nextval, sec_ven.currval, w_fechaEmision, w_numLineas);
COMMIT WORK;
END nueva_factura;
/

--Borrar factura
CREATE OR REPLACE PROCEDURE del_factura(
w_idFactura IN facturas.idFactura%TYPE) IS
BEGIN
DELETE FROM facturas WHERE idFactura = w_idFactura;
COMMIT WORK;
END del_factura;
/

--------------------------------------------------------
-- Creacion Procedimientos GASTOS
--------------------------------------------------------
--Insertar Gasto
CREATE OR REPLACE PROCEDURE nuevo_gasto(
w_fecha IN gastos.fecha%TYPE,
w_totalProveedor IN gastos.totalProveedor%TYPE,
w_propios IN gastos.propios%TYPE,
w_luz IN gastos.luz%TYPE,
w_agua IN gastos.agua%TYPE,
w_telefono IN gastos.telefono%TYPE,
w_tasaAutonomo IN gastos.tasaAutonomo%TYPE,
w_sueldoEmpleados IN gastos.sueldoEmpleados%TYPE,
w_totalFiado IN gastos.totalFiado%TYPE) IS
BEGIN
INSERT INTO gastos(idGastos, fecha, totalProveedor, propios, luz, agua, telefono, tasaAutonomo, sueldoEmpleados, totalFiado)
VALUES (sec_gastos.nextval, w_fecha, w_totalProveedor, w_propios, w_luz, w_agua, w_telefono, w_tasaAutonomo, w_sueldoEmpleados, w_totalFiado);
COMMIT WORK;
END nuevo_gasto;
/

--Modificar Gasto
CREATE OR REPLACE PROCEDURE mod_gasto(
w_idGastos IN gastos.idGastos%TYPE,
w_fecha IN gastos.fecha%TYPE,
w_totalProveedor IN gastos.totalProveedor%TYPE,
w_propios IN gastos.propios%TYPE,
w_luz IN gastos.luz%TYPE,
w_agua IN gastos.agua%TYPE,
w_telefono IN gastos.telefono%TYPE,
w_tasaAutonomo IN gastos.tasaAutonomo%TYPE,
w_sueldoEmpleados IN gastos.sueldoEmpleados%TYPE,
w_totalFiado IN gastos.totalFiado%TYPE) IS
BEGIN
UPDATE gastos
SET fecha = w_fecha, totalProveedor = w_totalProveedor, propios = w_propios, luz = w_luz, agua = w_agua, telefono = w_telefono, tasaAutonomo = w_tasaAutonomo, sueldoEmpleados = w_sueldoEmpleados, totalFiado = w_totalFiado
WHERE idGastos=w_idGastos;
COMMIT WORK;
END mod_gasto;
/

--Borrar Gasto
CREATE OR REPLACE PROCEDURE del_gasto(
w_idGastos IN gastos.idGastos%TYPE) IS
BEGIN
DELETE FROM gastos WHERE idGastos=w_idGastos;
COMMIT WORK;
END del_gasto;
/

--------------------------------------------------------
-- Creacion Procedimientos INGRESOS
--------------------------------------------------------
--Nuevo Ingreso
CREATE OR REPLACE PROCEDURE nuevo_ingreso(	
w_fecha IN ingresos.fecha%TYPE,
w_totalDineroFiadoDevuelto IN ingresos.totalDineroFiadoDevuelto%TYPE,
w_totalNeto IN ingresos.totalNeto%TYPE, 
w_totalBruto IN ingresos.totalBruto%TYPE) IS 
BEGIN
INSERT INTO ingresos(idIngreso, fecha, totalDineroFiadoDevuelto, totalNeto, totalBruto)
VALUES (sec_ingresos.nextval, w_fecha, w_totalDineroFiadoDevuelto, w_totalNeto, w_totalBruto);
COMMIT WORK;
END nuevo_ingreso;
/

--Modificar Ingreso
CREATE OR REPLACE PROCEDURE mod_ingreso(
w_idIngreso IN ingresos.idIngreso%TYPE,
w_fecha IN ingresos.fecha%TYPE,
w_totalDineroFiadoDevuelto IN ingresos.totalDineroFiadoDevuelto%TYPE,
w_totalNeto IN ingresos.totalNeto%TYPE, 
w_totalBruto IN ingresos.totalBruto%TYPE) IS
BEGIN
UPDATE ingresos
SET fecha = w_fecha, totalDineroFiadoDevuelto = w_totalDineroFiadoDevuelto, totalNeto = w_totalNeto, totalBruto = w_totalBruto
WHERE idIngreso = w_idIngreso;
COMMIT WORK;
END mod_ingreso;
/

--Borrar Ingreso
CREATE OR REPLACE PROCEDURE del_ingreso(
w_idIngreso IN ingresos.idIngreso%TYPE) IS
BEGIN
DELETE FROM ingresos WHERE idIngreso = w_idIngreso;
COMMIT WORK;
END del_ingreso;
/

--------------------------------------------------------
-- Creacion Procedimientos LÍNEAS FACTURAS
--------------------------------------------------------
--Nueva Línea Factura
CREATE OR REPLACE PROCEDURE nueva_lineaFactura(	
w_nombreArticulo IN lineasFactura.nombreArticulo%TYPE,
w_cantidad IN lineasFactura.cantidad%TYPE,
w_precioUnidad IN lineasFactura.precioUnidad%TYPE, 
w_precioTotal IN lineasFactura.precioTotal%TYPE) IS 
BEGIN
INSERT INTO lineasFactura(nombreArticulo, cantidad, precioUnidad, precioTotal,idFactura,idVendido)
VALUES (w_nombreArticulo, w_cantidad, w_precioUnidad, w_precioTotal,sec_fac.currval,sec_artven.currval);
COMMIT WORK;
END nueva_lineaFactura;
/

--Modificar Linea Factura
CREATE OR REPLACE PROCEDURE mod_lineaFactura(
w_idFactura IN lineasFactura.idFactura%TYPE,
w_nombreArticulo IN lineasFactura.nombreArticulo%TYPE,
w_cantidad IN lineasFactura.cantidad%TYPE,
w_precioUnidad IN lineasFactura.precioUnidad%TYPE, 
w_precioTotal IN lineasFactura.precioTotal%TYPE) IS 
BEGIN
UPDATE lineasFactura
SET cantidad = w_cantidad, precioUnidad = w_precioUnidad, precioTotal = w_precioTotal
WHERE nombreArticulo = w_nombreArticulo AND idFactura=w_idFactura;
COMMIT WORK;
END mod_lineaFactura;
/

--Borrar Linea Factura
CREATE OR REPLACE PROCEDURE del_lineaFactura(
w_idFactura IN lineasFactura.idFactura%TYPE,
w_nombreArticulo IN lineasFactura.nombreArticulo%TYPE) IS
BEGIN
DELETE FROM lineasFactura WHERE nombreArticulo = w_nombreArticulo AND idFactura=w_idFactura;
COMMIT WORK;
END del_lineaFactura;
/

--------------------------------------------------------
-- Creacion Procedimientos MÁQUINAS
--------------------------------------------------------
--Insertar Máquina
CREATE OR REPLACE PROCEDURE nueva_maquina(
w_nombreBar IN maquinas.nombreBar%TYPE,
w_fechaUltimaReposicion IN maquinas.fechaUltimaReposicion%TYPE) IS
BEGIN
INSERT INTO maquinas(idMaquina, nombreBar,fechaUltimaReposicion)
VALUES (sec_maq.nextval, w_nombreBar, w_fechaUltimaReposicion);
COMMIT WORK;
END nueva_maquina;
/

--Modificar Máquina
CREATE OR REPLACE PROCEDURE mod_maquina(
w_idMaquina IN maquinas.idMaquina%TYPE,
w_nombreBar IN maquinas.nombreBar%TYPE,
w_fechaUltimaReposicion IN maquinas.fechaUltimaReposicion%TYPE) IS
BEGIN
UPDATE maquinas
SET nombreBar=w_nombreBar,fechaUltimaReposicion = w_fechaUltimaReposicion
WHERE idMaquina = w_idMaquina;
COMMIT WORK;
END mod_maquina;
/

--Borrar Máquina
CREATE OR REPLACE PROCEDURE del_maquina(
w_idMaquina IN maquinas.idMaquina%TYPE) IS
BEGIN
DELETE FROM maquinas WHERE idMaquina = w_idMaquina;
COMMIT WORK;
END del_maquina;
/

--------------------------------------------------------
-- Creacion Procedimientos PEDIDOS
--------------------------------------------------------

--Insertar Pedido
CREATE OR REPLACE PROCEDURE nuevo_pedido(
w_fechaRealizacion IN pedidos.fechaRealizacion%TYPE,
w_fechaEntrega IN pedidos.fechaEntrega%TYPE,
w_importeCompra IN pedidos.importeCompra%TYPE,
w_idAlmacen IN pedidos.idAlmacen%TYPE,
w_idProveedor IN pedidos.idProveedor%TYPE) IS
BEGIN
INSERT INTO pedidos(idPedido,fechaRealizacion, fechaEntrega,importeCompra,idAlmacen,idProveedor)
VALUES (sec_pedido.nextval, w_fechaRealizacion, w_fechaEntrega,w_importeCompra,w_idAlmacen,w_idProveedor);
COMMIT WORK;
END nuevo_pedido;
/

--Modificar Pedido
CREATE OR REPLACE PROCEDURE mod_pedido(
w_idPedido IN pedidos.idPedido%TYPE,
w_fechaRealizacion IN pedidos.fechaRealizacion%TYPE,
w_fechaEntrega IN pedidos.fechaEntrega%TYPE,
w_importeCompra IN pedidos.importeCompra%TYPE) IS
BEGIN
UPDATE pedidos
SET fechaRealizacion = w_fechaRealizacion, fechaEntrega = w_fechaEntrega, importeCompra = w_importeCompra
WHERE idPedido=w_idPedido;
COMMIT WORK;
END mod_pedido;
/

--Borrar Pedido
CREATE OR REPLACE PROCEDURE del_pedido(
w_idPedido IN pedidos.idPedido%TYPE) IS
BEGIN
DELETE FROM pedidos WHERE idPedido=w_idPedido;
COMMIT WORK;
END del_pedido;
/

--------------------------------------------------------
-- Creacion Procedimientos PROMOCIONES
--------------------------------------------------------
--Insertar Promoción
CREATE OR REPLACE PROCEDURE crear_promo(
w_descripcion IN promociones.descripcion%TYPE,
w_fechaInicio IN promociones.fechaInicio%TYPE,
w_fechaFin IN promociones.fechaFin%TYPE) IS
BEGIN
INSERT INTO promociones(idPromocion, descripcion, fechaInicio, fechaFin)
VALUES (sec_promo.nextval, w_descripcion, w_fechaInicio, w_fechaFin);
COMMIT WORK;
END crear_promo;
/

--Modificar Promoción
CREATE OR REPLACE PROCEDURE mod_promo(
w_idPromocion IN promociones.idPromocion%TYPE,
w_descripcion IN promociones.descripcion%TYPE,
w_fechaInicio IN promociones.fechaInicio%TYPE,
w_fechaFin IN promociones.fechaFin%TYPE) IS
BEGIN
UPDATE promociones
SET descripcion = w_descripcion, fechaInicio = w_fechaInicio, fechaFin = w_fechaFin
WHERE idPromocion = w_idPromocion;
COMMIT WORK;
END mod_promo;
/

--Borrar Promoción
CREATE OR REPLACE PROCEDURE del_promo(
w_idPromocion IN promociones.idPromocion%TYPE) IS
BEGIN
DELETE FROM promociones WHERE idPromocion=w_idPromocion;
COMMIT WORK;
END del_promo;
/


--------------------------------------------------------
-- Creacion Procedimientos PROVEEDORES
--------------------------------------------------------

--Insertar Proveedor
CREATE OR REPLACE PROCEDURE nuevo_proveedor(
w_cif IN proveedores.cif%TYPE,
w_nombre IN proveedores.nombre%TYPE,
w_telefono IN proveedores.telefono%TYPE,
w_nSanitario IN proveedores.nSanitario%TYPE,
w_emailContacto IN proveedores.emailContacto%TYPE,
w_tipo IN proveedores.tipo%TYPE) IS
BEGIN
INSERT INTO proveedores(idProveedor, cif, nombre, telefono, nSanitario, emailContacto, tipo)
VALUES (sec_prov.nextval,w_cif, w_nombre, w_telefono, w_nSanitario, w_emailContacto, w_tipo);
COMMIT WORK;
END nuevo_proveedor;
/

--Modificar Pedido
CREATE OR REPLACE PROCEDURE mod_proveedor(
w_idProveedor IN proveedores.idProveedor%TYPE,
w_cif IN proveedores.cif%TYPE,
w_nombre IN proveedores.nombre%TYPE,
w_telefono IN proveedores.telefono%TYPE,
w_nSanitario IN proveedores.nSanitario%TYPE,
w_emailContacto IN proveedores.emailContacto%TYPE,
w_tipo IN proveedores.tipo%TYPE) IS
BEGIN
UPDATE proveedores
SET nombre = w_nombre, telefono = w_telefono, nSanitario = w_nSanitario, emailContacto = w_emailContacto, tipo = w_tipo
WHERE idProveedor=w_idProveedor;
COMMIT WORK;
END mod_proveedor;
/

--Borrar Pedido
CREATE OR REPLACE PROCEDURE del_proveedor(
w_idProveedor IN proveedores.idProveedor%TYPE) IS
BEGIN
DELETE FROM proveedores WHERE idProveedor=w_idProveedor;
COMMIT WORK;
END del_proveedor;
/

--------------------------------------------------------
-- Creacion Procedimientos VENTA
--------------------------------------------------------
--Nueva Venta
CREATE OR REPLACE PROCEDURE nueva_venta(
w_fecha IN ventas.fecha%TYPE,
w_importe IN ventas.importe%TYPE,
w_idEmpleado IN ventas.idEmpleado%TYPE, 
w_fiado IN ventas.fiado%TYPE,
w_idclienteRegistrado IN ventas.idclienteregistrado%TYPE) IS
BEGIN
INSERT INTO ventas(idVenta,fecha, importe, idEmpleado, fiado,idCaja,idIngreso,idClienteRegistrado)
VALUES (sec_ven.nextval, w_fecha, w_importe,w_idEmpleado, w_fiado,sec_arqueo.currval,sec_ingresos.currval,w_idclienteRegistrado);
COMMIT WORK;
END nueva_venta;
/

--Modificar Venta
CREATE OR REPLACE PROCEDURE mod_venta(
w_idVenta IN ventas.idVenta%TYPE,
w_fecha IN ventas.fecha%TYPE,
w_importe IN ventas.importe%TYPE,
w_idEmpleado IN ventas.idEmpleado%TYPE, 
w_fiado IN ventas.fiado%TYPE,
w_idClienteRegistrado IN ventas.idclienteregistrado%TYPE) IS
BEGIN
UPDATE ventas
SET fecha = w_fecha, importe = w_importe, idEmpleado = w_idEmpleado, fiado=w_fiado,idclienteregistrado=w_idClienteRegistrado
WHERE idVenta=w_idVenta;
COMMIT WORK;
END mod_venta;
/

--Borrar Venta
CREATE OR REPLACE PROCEDURE del_venta(
w_idVenta IN ventas.idVenta%TYPE) IS
BEGIN
DELETE FROM ventas WHERE idVenta = w_idVenta;
COMMIT WORK;
END del_venta;
/

--------------------------------------------------------
-- Creacion Procedimientos VENTA MÁQUINA
--------------------------------------------------------
--Insertar Venta Máquina
CREATE OR REPLACE PROCEDURE nueva_ventamaq(
w_idMaquina IN ventasMaquinas.idMaquina%TYPE,
w_idArticuloMaquina IN ventasMaquinas.idArticuloMaquina%TYPE,
w_fecha IN ventasmaquinas.fecha%TYPE,
w_importe IN ventasmaquinas.importe%TYPE,
w_importeIva IN ventasmaquinas.importeiva%TYPE,
w_nombre IN ventasmaquinas.nombre%TYPE,
w_precioVenta IN ventasMaquinas.precioVenta%TYPE,
w_precioCosto IN ventasMaquinas.precioCosto%TYPE,
w_baseImponible IN ventasmaquinas.baseImponible%TYPE,
w_tipoIva IN ventasMaquinas.tipoIva%TYPE,
w_margen IN ventasMaquinas.margen%TYPE) IS
BEGIN
INSERT INTO ventasMaquinas(idVentaMaquina, idMaquina, idIngreso,idArticuloMaquina,
fecha,importe,importeIva,nombre, precioVenta, precioCosto,baseImponible, tipoIva,margen)
VALUES (sec_ventmaq.nextval, w_idMaquina, sec_ingresos.currval,w_idArticuloMaquina,
w_fecha,w_importe,w_importeIva,w_nombre,w_baseImponible, w_precioVenta, w_precioCosto, w_tipoIva, w_margen);
COMMIT WORK;
END nueva_ventamaq;
/

--Modificar Venta Maquina
CREATE OR REPLACE PROCEDURE mod_ventamaq(
w_idVentaMaquina IN ventasMaquinas.idVentaMaquina%TYPE,
w_idMaquina IN ventasMaquinas.idMaquina%TYPE,
w_fecha IN ventasmaquinas.fecha%TYPE,
w_importe IN ventasmaquinas.importe%TYPE,
w_importeIva IN ventasmaquinas.importeiva%TYPE,
w_nombre IN ventasmaquinas.nombre%TYPE,
w_idIngreso IN ventasMaquinas.idIngreso%TYPE,
w_precioVenta IN ventasMaquinas.precioVenta%TYPE,
w_precioCosto IN ventasMaquinas.precioCosto%TYPE,
w_baseImponible IN ventasmaquinas.baseImponible%TYPE,
w_iva IN ventasMaquinas.tipoiva%TYPE,
w_margen IN ventasMaquinas.margen%TYPE,
w_idArticuloMaquina IN ventasMaquinas.idarticulomaquina%TYPE) IS
BEGIN
UPDATE ventasMaquinas
SET idMaquina = w_idMaquina, idArticuloMaquina = w_idArticuloMaquina,nombre=w_nombre,baseImponible=w_baseImponible,fecha=w_fecha,importe=w_importe,importeIva=w_importeIva
WHERE idVentaMaquina = w_idVentaMaquina;
COMMIT WORK;
END mod_ventamaq;
/

--Borrar ventamaq
CREATE OR REPLACE PROCEDURE del_ventamaq(
w_idVentaMaquina IN ventasMaquinas.idVentaMaquina%TYPE) IS
BEGIN
DELETE FROM ventasMaquinas WHERE idVentaMaquina = w_idVentaMaquina;
COMMIT WORK;
END del_ventamaq;
/

CREATE OR REPLACE PROCEDURE INSERTAR_NUEVO_CLIENTE(
   P_NOM IN CLIENTES.NOMBRE%TYPE,
   P_APE IN CLIENTES.APELLIDOS%TYPE,
   P_FECHA_NAC IN CLIENTES.FECHA_NACIMIENTO%TYPE,
   P_EMAIL IN CLIENTES.EMAIL%TYPE,
   P_PASS IN CLIENTES.PASS%TYPE) IS
BEGIN
  INSERT INTO CLIENTES(IDCLIENTE,NOMBRE,APELLIDOS,FECHA_NACIMIENTO,EMAIL,PASS,ACEPTADO,TIPO)
  VALUES (SEC_IDCLIENTE.nextval,P_NOM,P_APE,P_FECHA_NAC,P_EMAIL,P_PASS,'0','Cliente');
END INSERTAR_NUEVO_CLIENTE;
/

CREATE OR REPLACE PROCEDURE MOD_CLIENTE(
   P_IDCLIENTE IN CLIENTES.IDCLIENTE%TYPE,
   P_NOM IN CLIENTES.NOMBRE%TYPE,
   P_APE IN CLIENTES.APELLIDOS%TYPE,
   P_FECHA_NAC IN CLIENTES.FECHA_NACIMIENTO%TYPE) IS
BEGIN
UPDATE CLIENTES
SET NOMBRE = P_NOM,APELLIDOS = P_APE,FECHA_NACIMIENTO = P_FECHA_NAC
WHERE IDCLIENTE = P_IDCLIENTE;
COMMIT WORK;
END MOD_CLIENTE;
/

CREATE OR REPLACE PROCEDURE ACEPTAR_CLIENTE(
P_IDCLIENTE IN CLIENTES.IDCLIENTE%TYPE)IS
BEGIN
UPDATE CLIENTES
SET ACEPTADO = '1'
WHERE IDCLIENTE = P_IDCLIENTE;
COMMIT WORK;
END ACEPTAR_CLIENTE;
/

CREATE OR REPLACE PROCEDURE DEL_CLIENTE(
W_IDCLIENTE IN CLIENTES.IDCLIENTE%TYPE) IS
BEGIN
DELETE FROM CLIENTES WHERE IDCLIENTE = W_IDCLIENTE;
COMMIT WORK;
END DEL_CLIENTE;
/

CREATE OR REPLACE PROCEDURE NUEVO_CONTACTO(
   P_NOM IN CONTACTOS.NOMBRE%TYPE,
   P_APE IN CONTACTOS.APELLIDOS%TYPE,
   P_EMAIL IN CONTACTOS.EMAIL%TYPE,
   P_MENSAJE IN CONTACTOS.MENSAJE%TYPE) IS
BEGIN
  INSERT INTO CONTACTOS(IDCONTACTO,NOMBRE,APELLIDOS,EMAIL,MENSAJE)
  VALUES (sec_idcontacto.nextval,P_NOM,P_APE,P_EMAIL,P_MENSAJE);
END NUEVO_CONTACTO;
/

CREATE OR REPLACE PROCEDURE DEL_CONTACTO(
W_IDCONTACTO IN CONTACTOS.IDCONTACTO%TYPE) IS
BEGIN
DELETE FROM CONTACTOS WHERE IDCONTACTO = W_IDCONTACTO;
COMMIT WORK;
END DEL_CONTACTO;
/

CREATE OR REPLACE PROCEDURE MOD_NOMBRE_ARTICULO(
   P_IDARTICULO IN ARTICULOS.IDARTICULO%TYPE,
   P_NOM IN ARTICULOS.NOMBRE%TYPE) IS
BEGIN
UPDATE ARTICULOS
SET NOMBRE = P_NOM
WHERE IDARTICULO = P_IDARTICULO;
COMMIT WORK;
END MOD_NOMBRE_ARTICULO;
/

CREATE OR REPLACE PROCEDURE MOD_DESC_ARTICULO(
   P_IDARTICULO IN ARTICULOS.IDARTICULO%TYPE,
   P_DESC IN ARTICULOS.DESCRIPCION%TYPE) IS
BEGIN
UPDATE ARTICULOS
SET DESCRIPCION = P_DESC
WHERE IDARTICULO = P_IDARTICULO;
COMMIT WORK;
END MOD_DESC_ARTICULO;
/

CREATE OR REPLACE PROCEDURE MOD_PV_ARTICULO(
   P_IDARTICULO IN ARTICULOS.IDARTICULO%TYPE,
   P_PV IN ARTICULOS.PRECIOVENTA%TYPE) IS
BEGIN
UPDATE ARTICULOS
SET PRECIOVENTA = P_PV
WHERE IDARTICULO = P_IDARTICULO;
COMMIT WORK;
END MOD_PV_ARTICULO;
/