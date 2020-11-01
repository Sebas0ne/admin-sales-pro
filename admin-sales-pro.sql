/*
 Navicat Premium Data Transfer

 Source Server         : MySQL Localhost
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : ventas

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 18/05/2018 21:58:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observacion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES (1, 'COMPUTO', NULL, 1);
INSERT INTO `areas` VALUES (2, 'ABARROTES', NULL, 1);
INSERT INTO `areas` VALUES (3, 'FRUTAS Y VERDURAS', NULL, 1);
INSERT INTO `areas` VALUES (4, 'CEREALES, MENESTRAS Y HARINAS', NULL, 1);
INSERT INTO `areas` VALUES (5, 'ARTICULOS E INSUMOS DE LIMPIEZA', NULL, 1);
INSERT INTO `areas` VALUES (6, 'ESCRITORIO Y OFICINA', NULL, 1);
INSERT INTO `areas` VALUES (7, 'SOUVENIRS Y REGALOS', NULL, 1);
INSERT INTO `areas` VALUES (8, 'FERRETERIA', NULL, 1);
INSERT INTO `areas` VALUES (9, 'ELECTRONICA', NULL, 1);
INSERT INTO `areas` VALUES (10, 'POLLO, PESCADOS Y CARNES', NULL, 1);
INSERT INTO `areas` VALUES (11, 'PANADERIA', NULL, 1);
INSERT INTO `areas` VALUES (12, 'ROPA Y ACCESORIOS', NULL, 1);
INSERT INTO `areas` VALUES (13, 'MULTIMEDIA', NULL, 1);
INSERT INTO `areas` VALUES (14, 'AUTOMOTRIZ', NULL, 1);

-- ----------------------------
-- Table structure for articulo
-- ----------------------------
DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_barra` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcion_corta` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `familia` int(11) NULL DEFAULT NULL,
  `cantidad_paquete` int(11) NULL DEFAULT NULL,
  `granel` int(11) NULL DEFAULT NULL,
  `unidad` int(11) NULL DEFAULT NULL,
  `marca` int(11) NULL DEFAULT NULL,
  `observacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` smallint(6) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of articulo
-- ----------------------------
INSERT INTO `articulo` VALUES (1, '10001', 'MOUSE M763', 'MOUSE M763', 1, 1, 0, 4, 3, 'producto para color', 1);
INSERT INTO `articulo` VALUES (2, '10002', 'KIT MICROSOFT RX387', 'KIT MS RX387', 1, 1, 0, 4, 3, 'producto para color', 1);
INSERT INTO `articulo` VALUES (3, '10003', 'CAMARA LOGITECH 345', 'CAM LOG 345', 1, 1, 0, 4, 4, 'producto simple', 1);
INSERT INTO `articulo` VALUES (4, '10004', 'INKA COLA 3.5 LITROS', 'INKA 3.5', 3, 6, 0, 4, 11, 'vende unidad, entra six pack', 1);
INSERT INTO `articulo` VALUES (5, '10005', 'INKA COLA SIX PACK 375 ML', 'INKA X6 375', 3, 1, 0, 6, 11, 'producto en six pack', 1);
INSERT INTO `articulo` VALUES (6, '10006', 'DETERGENTE SAPOLIO 200 GR', 'DET SAP 200GR', 4, 10, 0, 4, 2, 'producto con marca1 y presentacion 1', 1);
INSERT INTO `articulo` VALUES (7, '10007', 'DETERGENTE SAPOLIO 500 GR', 'DET SAP 500GR', 4, 10, 0, 4, 2, 'producto con marca1 y presentacion 2', 1);
INSERT INTO `articulo` VALUES (8, '10015', 'DETERGENTE ARIEL 500 GRAMOS POLVO', 'ARIEL 500 GR', 4, 12, 0, 4, 5, 'PRODUCTO EDITADO POR FORMULARIO', 1);
INSERT INTO `articulo` VALUES (9, '10009', 'ARROZ COSTA AZUL', 'ARROZ CSTA AZUL', 10, 40, 1, 2, 1, 'a granel arroz en saco x40 Kg', 1);
INSERT INTO `articulo` VALUES (10, '10010', 'MOTOROLA G5 PLUS', 'MOTO G5+', 9, 1, 0, 4, 13, 'NINGUNA', 1);

-- ----------------------------
-- Table structure for caja
-- ----------------------------
DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observacion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` smallint(6) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of caja
-- ----------------------------
INSERT INTO `caja` VALUES (1, 'caja 1', 'ejemplo', 1);
INSERT INTO `caja` VALUES (2, 'caja 2', 'ejemplo', 1);

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni_ruc` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipodocumento` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observacion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, '00000000000', 'DNI', 'SIN CLIENTE', 'SIN DIRECCION', 'aparece cuando no hay registro de clientes');
INSERT INTO `clientes` VALUES (2, '43070205', 'DNI', 'Kurt', 'Ventanilla Alta', 'cliente de ejemplo 1 (natural)');
INSERT INTO `clientes` VALUES (3, '12345678901', 'RUC', 'Overware Technology', 'Ciudad del Deporte', 'cliente de ejemplo 2 (empresa)');

-- ----------------------------
-- Table structure for colores
-- ----------------------------
DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `codigo_hex` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of colores
-- ----------------------------
INSERT INTO `colores` VALUES (1, 'SIN COLOR (NO ESPECÍFICO)', '000000');
INSERT INTO `colores` VALUES (2, 'NEGRO', '000000');
INSERT INTO `colores` VALUES (3, 'BLANCO', 'FFFFFF');
INSERT INTO `colores` VALUES (4, 'ROJO', 'FF0000');
INSERT INTO `colores` VALUES (5, 'VERDE', '00FF00');
INSERT INTO `colores` VALUES (6, 'AZUL', '0000FF');

-- ----------------------------
-- Table structure for comprobante_detalle
-- ----------------------------
DROP TABLE IF EXISTS `comprobante_detalle`;
CREATE TABLE `comprobante_detalle`  (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprobante` int(11) NULL DEFAULT NULL,
  `id_articulo` int(11) NULL DEFAULT NULL,
  `color` int(11) NULL DEFAULT NULL,
  `cantidad` decimal(7, 2) NULL DEFAULT NULL,
  `precio_unit` decimal(7, 2) NULL DEFAULT NULL,
  `subtotal` decimal(7, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_registro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comprobante_detalle
-- ----------------------------
INSERT INTO `comprobante_detalle` VALUES (1, 8, 4, 1, 3.00, 5.00, 15.00);
INSERT INTO `comprobante_detalle` VALUES (2, 9, 4, 1, 3.00, 5.00, 15.00);
INSERT INTO `comprobante_detalle` VALUES (3, 10, 4, 1, 3.00, 5.00, 15.00);
INSERT INTO `comprobante_detalle` VALUES (4, 11, 3, 3, 2.00, 120.00, 240.00);
INSERT INTO `comprobante_detalle` VALUES (5, 11, 3, 2, 3.00, 150.00, 450.00);
INSERT INTO `comprobante_detalle` VALUES (6, 12, 3, 3, 2.00, 120.00, 240.00);
INSERT INTO `comprobante_detalle` VALUES (7, 13, 3, 2, 2.00, 150.00, 300.00);
INSERT INTO `comprobante_detalle` VALUES (8, 13, 3, 3, 1.00, 120.00, 120.00);
INSERT INTO `comprobante_detalle` VALUES (9, 14, 4, 1, 2.00, 5.00, 10.00);
INSERT INTO `comprobante_detalle` VALUES (10, 17, 4, 1, 2.00, 5.00, 10.00);
INSERT INTO `comprobante_detalle` VALUES (11, 18, 3, 3, 5.00, 120.00, 600.00);
INSERT INTO `comprobante_detalle` VALUES (12, 19, 7, 1, 2.00, 2.00, 4.00);
INSERT INTO `comprobante_detalle` VALUES (13, 20, 7, 1, 2.00, 2.00, 4.00);
INSERT INTO `comprobante_detalle` VALUES (14, 21, 4, 1, 1.00, 5.00, 5.00);
INSERT INTO `comprobante_detalle` VALUES (15, 22, 4, 1, 1.00, 5.00, 5.00);

-- ----------------------------
-- Table structure for comprobante_maestro
-- ----------------------------
DROP TABLE IF EXISTS `comprobante_maestro`;
CREATE TABLE `comprobante_maestro`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primer_correlativo` int(11) NULL DEFAULT NULL,
  `segundo_correlativo` int(11) NULL DEFAULT NULL,
  `tipodocumento` int(11) NULL DEFAULT NULL,
  `correlativo` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subtotal_bruto` decimal(7, 2) NULL DEFAULT NULL,
  `impuesto` decimal(7, 2) NULL DEFAULT NULL,
  `subtotal` decimal(7, 2) NULL DEFAULT NULL,
  `descuento` decimal(7, 2) NULL DEFAULT NULL,
  `total` decimal(7, 2) NULL DEFAULT NULL,
  `cliente` int(11) NULL DEFAULT NULL,
  `nombrecliente` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentocliente` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direccioncliente` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` int(11) NULL DEFAULT NULL,
  `observacion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comprobante_maestro
-- ----------------------------
INSERT INTO `comprobante_maestro` VALUES (1, 1, 1, 1, '001-0000001', 10.00, 1.80, 11.80, 3.00, 8.80, 1, NULL, NULL, NULL, 1, 'cabecera de pruebas', '2018-05-08 13:15:39.000000');
INSERT INTO `comprobante_maestro` VALUES (3, 1, 2, 1, '001-0000002', 10.00, 1.80, 11.80, 3.00, 8.80, 1, NULL, NULL, NULL, 1, 'cabecera de pruebas', '2018-05-08 13:20:45.000000');
INSERT INTO `comprobante_maestro` VALUES (4, 1, 3, 1, '001-0000003', 10.00, 1.80, 11.80, 3.00, 8.80, 1, NULL, NULL, NULL, 1, 'cabecera de pruebas', '2018-05-08 13:26:15.000000');
INSERT INTO `comprobante_maestro` VALUES (5, 1, 4, 1, '001-0000004', 15.00, 2.70, 17.70, 0.70, 17.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 13:32:49.000000');
INSERT INTO `comprobante_maestro` VALUES (6, 1, 5, 1, '001-0000005', 15.00, 2.70, 17.70, 0.70, 17.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 13:33:09.000000');
INSERT INTO `comprobante_maestro` VALUES (7, 1, 6, 1, '001-0000006', 15.00, 2.70, 17.70, 0.70, 17.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 13:33:34.000000');
INSERT INTO `comprobante_maestro` VALUES (8, 1, 7, 1, '001-0000007', 15.00, 2.70, 17.70, 0.70, 17.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 13:34:31.000000');
INSERT INTO `comprobante_maestro` VALUES (9, 1, 8, 1, '001-0000008', 15.00, 2.70, 17.70, 0.70, 17.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 13:49:03.000000');
INSERT INTO `comprobante_maestro` VALUES (10, 1, 9, 1, '001-0000009', 15.00, 2.70, 17.70, 0.70, 17.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 14:19:19.000000');
INSERT INTO `comprobante_maestro` VALUES (11, 1, 10, 1, '001-0000010', 690.00, 124.20, 814.20, 0.20, 814.00, 1, NULL, NULL, NULL, 1, 'prueba', '2018-05-15 18:08:00.000000');
INSERT INTO `comprobante_maestro` VALUES (12, 1, 11, 1, '001-0000011', 203.39, 36.61, 240.00, 20.00, 220.00, 2, '', '', '', 1, 'prueba id cliente', '2018-05-18 14:50:07.000000');
INSERT INTO `comprobante_maestro` VALUES (13, 2, 1, 1, '002-0000001', 355.93, 64.07, 420.00, 0.00, 420.00, 2, '', '', '', 1, 'prueba id cliente', '2018-05-18 17:10:28.000000');
INSERT INTO `comprobante_maestro` VALUES (14, 1, 2, 1, '001-0000012', 8.47, 1.53, 10.00, 1.00, 9.00, 3, '', '', '', 1, 'prueba id cliente', '2018-05-18 17:29:54.000000');
INSERT INTO `comprobante_maestro` VALUES (17, 2, 3, 1, '002-0000004', 8.47, 1.53, 10.00, 1.00, 9.00, 3, '', '', '', 1, 'prueba id cliente', '2018-05-18 17:40:05.000000');
INSERT INTO `comprobante_maestro` VALUES (18, 2, 5, 1, '002-0000006', 508.47, 91.53, 600.00, 0.00, 600.00, 2, '', '', '', 1, 'prueba id cliente', '2018-05-18 18:03:30.000000');
INSERT INTO `comprobante_maestro` VALUES (19, 2, 7, 1, '002-0000008', 3.39, 0.61, 4.00, 0.00, 4.00, 3, '', '', '', 1, 'prueba id cliente', '2018-05-18 18:13:31.000000');
INSERT INTO `comprobante_maestro` VALUES (20, 2, 9, 1, '002-0000009', 3.39, 0.61, 4.00, 0.00, 4.00, 3, '', '', '', 1, 'prueba id cliente', '2018-05-18 18:17:27.000000');
INSERT INTO `comprobante_maestro` VALUES (21, 2, 10, 1, '002-0000010', 4.24, 0.76, 5.00, 0.00, 5.00, 3, '', '', '', 1, 'prueba id cliente', '2018-05-18 19:02:51.000000');
INSERT INTO `comprobante_maestro` VALUES (22, 2, 11, 2, '002-0000011', 4.24, 0.76, 5.00, 0.00, 5.00, 3, '', '', '', 1, 'prueba id cliente', '2018-05-18 19:05:30.000000');

-- ----------------------------
-- Table structure for correlativo_caja
-- ----------------------------
DROP TABLE IF EXISTS `correlativo_caja`;
CREATE TABLE `correlativo_caja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caja` int(11) NULL DEFAULT NULL,
  `correlativo_inicial` int(11) NULL DEFAULT NULL COMMENT 'no se modifica, pertenece a la propia caja',
  `correlativo_final` int(11) NULL DEFAULT NULL,
  `tipo_comprobante` smallint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of correlativo_caja
-- ----------------------------
INSERT INTO `correlativo_caja` VALUES (1, 1, 1, 12, 1);
INSERT INTO `correlativo_caja` VALUES (2, 2, 2, 11, 1);
INSERT INTO `correlativo_caja` VALUES (3, 1, 1, 0, 2);
INSERT INTO `correlativo_caja` VALUES (4, 2, 2, 0, 2);

-- ----------------------------
-- Table structure for correlativodia
-- ----------------------------
DROP TABLE IF EXISTS `correlativodia`;
CREATE TABLE `correlativodia`  (
  `idregistro` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NULL DEFAULT NULL,
  `correlativo` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idregistro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of correlativodia
-- ----------------------------
INSERT INTO `correlativodia` VALUES (1, '2018-04-26', 5);
INSERT INTO `correlativodia` VALUES (4, '2018-04-30', 3);
INSERT INTO `correlativodia` VALUES (5, '2018-05-02', 19);
INSERT INTO `correlativodia` VALUES (6, '2018-05-07', 1);
INSERT INTO `correlativodia` VALUES (7, '2018-05-15', 2);
INSERT INTO `correlativodia` VALUES (8, '2018-05-18', 22);

-- ----------------------------
-- Table structure for correlativos
-- ----------------------------
DROP TABLE IF EXISTS `correlativos`;
CREATE TABLE `correlativos`  (
  `idregistro` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` int(11) NULL DEFAULT NULL,
  `correlativo` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idregistro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of correlativos
-- ----------------------------
INSERT INTO `correlativos` VALUES (1, 1, 0);
INSERT INTO `correlativos` VALUES (2, 2, 0);
INSERT INTO `correlativos` VALUES (3, 3, 10);
INSERT INTO `correlativos` VALUES (4, 4, 16);
INSERT INTO `correlativos` VALUES (5, 5, 17);
INSERT INTO `correlativos` VALUES (6, 6, 0);
INSERT INTO `correlativos` VALUES (7, 7, 4);
INSERT INTO `correlativos` VALUES (8, 8, 0);
INSERT INTO `correlativos` VALUES (9, 9, 0);
INSERT INTO `correlativos` VALUES (10, 10, 0);

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa`  (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_vencimiento` datetime(0) NOT NULL,
  `observacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ruc` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direccion` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `igv` decimal(5, 2) NULL DEFAULT NULL,
  `registroclientes` smallint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idempresa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES (1, 'OVERWARE', 4, '2018-07-22 00:00:00', 'empresa libre de pagos', '12345678901', 'Mz G1 lote 6 Antonia Moreno de Caceres', '1234567 - 123456789', 0.18, 1);

-- ----------------------------
-- Table structure for estado_recibo
-- ----------------------------
DROP TABLE IF EXISTS `estado_recibo`;
CREATE TABLE `estado_recibo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of estado_recibo
-- ----------------------------
INSERT INTO `estado_recibo` VALUES (1, 'cobrado');
INSERT INTO `estado_recibo` VALUES (2, 'anulado');
INSERT INTO `estado_recibo` VALUES (3, 'devolucion');
INSERT INTO `estado_recibo` VALUES (4, 'problema impresion');

-- ----------------------------
-- Table structure for estadoempresa
-- ----------------------------
DROP TABLE IF EXISTS `estadoempresa`;
CREATE TABLE `estadoempresa`  (
  `idestado` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idestado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of estadoempresa
-- ----------------------------
INSERT INTO `estadoempresa` VALUES (1, 'Activo');
INSERT INTO `estadoempresa` VALUES (2, 'Inactivo');
INSERT INTO `estadoempresa` VALUES (3, 'Suspendido');
INSERT INTO `estadoempresa` VALUES (4, 'Libre');

-- ----------------------------
-- Table structure for familia
-- ----------------------------
DROP TABLE IF EXISTS `familia`;
CREATE TABLE `familia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `area` int(11) NULL DEFAULT NULL,
  `observacion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` smallint(6) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of familia
-- ----------------------------
INSERT INTO `familia` VALUES (1, 'TECLADOS Y RATONES', 1, '', 1);
INSERT INTO `familia` VALUES (2, 'CAMARAS WEB', 1, '', 1);
INSERT INTO `familia` VALUES (3, 'BEBIDAS GASEOSAS', 2, '', 1);
INSERT INTO `familia` VALUES (4, 'DETERGENTES', 5, '', 1);
INSERT INTO `familia` VALUES (5, 'LEJIAS', 5, '', 1);
INSERT INTO `familia` VALUES (6, 'CONSERVAS DE PESCADO', 2, '', 1);
INSERT INTO `familia` VALUES (7, 'ENLATADOS EN GENERAL', 2, '', 1);
INSERT INTO `familia` VALUES (8, 'PAPELERIA', 6, '', 1);
INSERT INTO `familia` VALUES (9, 'UTILES DE ESCRITORIO', 6, '', 1);
INSERT INTO `familia` VALUES (10, 'CELULARES', 9, 'creado con formulario', 1);

-- ----------------------------
-- Table structure for kardex
-- ----------------------------
DROP TABLE IF EXISTS `kardex`;
CREATE TABLE `kardex`  (
  `idregistro` int(11) NOT NULL AUTO_INCREMENT,
  `idmovimiento` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idmovimientoarticulo` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idarticulo` int(11) NULL DEFAULT NULL,
  `idproveedor` int(11) NULL DEFAULT NULL,
  `cantidad` decimal(7, 2) NULL DEFAULT NULL,
  `saldo` decimal(7, 2) NULL DEFAULT NULL,
  `precioentrada` decimal(7, 2) NULL DEFAULT NULL,
  `preciounitario` decimal(7, 2) NULL DEFAULT NULL,
  `precio_venta_unitario` decimal(7, 2) NULL DEFAULT NULL,
  `idcolor` int(11) NULL DEFAULT NULL,
  `fechahora` datetime(0) NULL DEFAULT NULL,
  `ingreso_egreso` smallint(6) NULL DEFAULT NULL,
  `estado` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`idregistro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kardex
-- ----------------------------
INSERT INTO `kardex` VALUES (1, '2018043000000001', '00000001', 5, 1, 12.00, 0.00, 24.00, 2.00, 3.00, 1, '2018-04-30 16:40:24', 0, 1);
INSERT INTO `kardex` VALUES (2, '2018043000000002', '00000002', 5, 1, 12.00, 0.00, 24.00, 2.00, 5.00, 1, '2018-04-30 17:30:06', 0, 1);
INSERT INTO `kardex` VALUES (3, '2018043000000003', '00000003', 5, 1, 12.00, 0.00, 24.00, 2.00, 3.00, 1, '2018-04-30 17:33:20', 0, 1);
INSERT INTO `kardex` VALUES (4, '2018050200000001', '00000004', 5, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 13:03:22', 1, 1);
INSERT INTO `kardex` VALUES (5, '2018050200000002', '00000005', 5, 0, 20.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 13:03:35', 1, 1);
INSERT INTO `kardex` VALUES (6, '2018050200000003', '00000006', 5, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 13:11:08', 1, 1);
INSERT INTO `kardex` VALUES (7, '2018050200000004', '00000007', 5, 0, 6.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 13:11:08', 1, 1);
INSERT INTO `kardex` VALUES (8, '2018050200000005', '00000008', 5, 0, 1.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 13:17:10', 1, 1);
INSERT INTO `kardex` VALUES (9, '2018050200000006', '00000009', 5, 0, 5.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 13:24:38', 1, 1);
INSERT INTO `kardex` VALUES (10, '2018050200000007', '00000010', 5, 1, 12.00, 2.00, 24.00, 2.00, 3.00, 1, '2018-05-02 14:03:01', 0, 1);
INSERT INTO `kardex` VALUES (13, '2018050200000010', '00000013', 5, 1, 12.00, 12.00, 24.00, 2.00, 3.00, 1, '2018-05-02 14:05:33', 0, 1);
INSERT INTO `kardex` VALUES (14, '2018050200000011', '00000014', 5, 1, 12.00, 12.00, 24.00, 2.00, 4.00, 1, '2018-05-02 14:05:35', 0, 1);
INSERT INTO `kardex` VALUES (16, '2018050200000013', '00000016', 5, 0, 5.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-02 14:07:08', 1, 1);
INSERT INTO `kardex` VALUES (17, '2018050200000014', '00000001', 7, 1, 100.00, 90.00, 150.00, 1.50, 2.00, 1, '2018-05-02 16:05:16', 0, 1);
INSERT INTO `kardex` VALUES (18, '2018050200000015', '00000001', 3, 1, 10.00, 4.00, 1250.00, 125.00, 150.00, 2, '2018-05-02 16:16:26', 0, 1);
INSERT INTO `kardex` VALUES (19, '2018050200000016', '00000002', 3, 1, 15.00, 0.00, 1350.00, 90.00, 120.00, 3, '2018-05-02 16:23:04', 0, 1);
INSERT INTO `kardex` VALUES (20, '2018050200000017', '00000003', 3, 0, 5.00, 0.00, 0.00, 0.00, 0.00, 3, '2018-05-02 16:29:08', 1, 1);
INSERT INTO `kardex` VALUES (21, '2018050200000018', '00000004', 3, 1, 15.00, 15.00, 1350.00, 90.00, 120.00, 3, '2018-05-02 16:33:11', 0, 1);
INSERT INTO `kardex` VALUES (22, '2018050200000019', '00000005', 3, 0, 4.00, 0.00, 0.00, 0.00, 0.00, 3, '2018-05-02 16:34:04', 1, 1);
INSERT INTO `kardex` VALUES (23, '2018050700000001', '00000001', 4, 1, 30.00, 4.00, 100.00, 3.00, 5.00, 1, '2018-05-07 11:49:30', 0, 1);
INSERT INTO `kardex` VALUES (24, '2018051500000001', '00000002', 4, 0, 3.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-15 13:49:03', 1, 1);
INSERT INTO `kardex` VALUES (25, '2018051500000002', '00000003', 4, 0, 3.00, 0.00, 0.00, 0.00, 0.00, 2, '2018-05-15 14:19:19', 1, 1);
INSERT INTO `kardex` VALUES (26, '2018051800000001', '00000006', 3, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 3, '2018-05-18 14:50:07', 1, 1);
INSERT INTO `kardex` VALUES (27, '2018051800000002', '00000007', 3, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 2, '2018-05-18 17:10:28', 1, 1);
INSERT INTO `kardex` VALUES (28, '2018051800000003', '00000008', 3, 0, 1.00, 0.00, 0.00, 0.00, 0.00, 3, '2018-05-18 17:10:29', 1, 1);
INSERT INTO `kardex` VALUES (29, '2018051800000004', '00000004', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:14:08', 1, 1);
INSERT INTO `kardex` VALUES (30, '2018051800000005', '00000005', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:16:23', 1, 1);
INSERT INTO `kardex` VALUES (31, '2018051800000006', '00000006', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:17:50', 1, 1);
INSERT INTO `kardex` VALUES (32, '2018051800000007', '00000007', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:19:32', 1, 1);
INSERT INTO `kardex` VALUES (33, '2018051800000008', '00000008', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:26:19', 1, 1);
INSERT INTO `kardex` VALUES (34, '2018051800000009', '00000009', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:27:25', 1, 1);
INSERT INTO `kardex` VALUES (35, '2018051800000010', '00000010', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:29:54', 1, 1);
INSERT INTO `kardex` VALUES (36, '2018051800000011', '00000011', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:31:54', 1, 1);
INSERT INTO `kardex` VALUES (37, '2018051800000012', '00000012', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:34:01', 1, 1);
INSERT INTO `kardex` VALUES (38, '2018051800000013', '00000013', 4, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 17:40:05', 1, 1);
INSERT INTO `kardex` VALUES (39, '2018051800000014', '00000009', 3, 0, 5.00, 0.00, 0.00, 0.00, 0.00, 3, '2018-05-18 18:03:30', 1, 1);
INSERT INTO `kardex` VALUES (40, '2018051800000015', '00000002', 7, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 18:13:32', 1, 1);
INSERT INTO `kardex` VALUES (41, '2018051800000016', '00000003', 7, 0, 2.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 18:17:28', 1, 1);
INSERT INTO `kardex` VALUES (42, '2018051800000017', '00000010', 3, 0, 1.00, 0.00, 0.00, 0.00, 0.00, 2, '2018-05-18 18:49:02', 1, 1);
INSERT INTO `kardex` VALUES (43, '2018051800000018', '00000017', 5, 0, 5.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 18:49:02', 1, 1);
INSERT INTO `kardex` VALUES (44, '2018051800000019', '00000004', 7, 0, 6.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 18:54:03', 1, 1);
INSERT INTO `kardex` VALUES (45, '2018051800000020', '00000014', 4, 0, 1.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 19:01:50', 1, 1);
INSERT INTO `kardex` VALUES (46, '2018051800000021', '00000015', 4, 0, 1.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 19:02:51', 1, 1);
INSERT INTO `kardex` VALUES (47, '2018051800000022', '00000016', 4, 0, 1.00, 0.00, 0.00, 0.00, 0.00, 1, '2018-05-18 19:05:30', 1, 1);

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observacion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` smallint(6) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of marca
-- ----------------------------
INSERT INTO `marca` VALUES (1, 'SIN MARCA', 'productos a granel en general', 1);
INSERT INTO `marca` VALUES (2, 'SAPOLIO', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (3, 'MICROSOFT', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (4, 'LOGITECH', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (5, 'ARIEL', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (6, 'OPAL', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (7, 'ARTESCO', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (8, 'GENIUS', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (9, 'COCA-COLA', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (10, 'PEPSI', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (11, 'INCA COLA', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (12, 'VINIFAN', 'marca de ejemplo', 1);
INSERT INTO `marca` VALUES (13, 'MOTOROLA', 'medida de prueba', 1);

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ruc` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `direccion` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono1` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo1` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo2` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono3` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo3` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES (0, 'SIN PROVEEDOR', '0', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '0000-00-00');
INSERT INTO `proveedor` VALUES (1, 'LIMBO SERVICES SA', '12345678901', 'AL LADO DEL OTRO VECINO', '123456-8725 5522-5541', 'EJEMPLO@EJEMPLO.COM', 'AMÉRICA AÑARTU', '123456', 'EJEMPLO1@EJEMPLO2.COM', 'KURT RELOAD', '970 824 716', 'KURT.RELOAD@GMAIL.COM', '', '', '', '2018-04-19');

-- ----------------------------
-- Table structure for tipodocumento
-- ----------------------------
DROP TABLE IF EXISTS `tipodocumento`;
CREATE TABLE `tipodocumento`  (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipodocumento
-- ----------------------------
INSERT INTO `tipodocumento` VALUES (1, 'BOLETA');
INSERT INTO `tipodocumento` VALUES (2, 'FACTURA');

-- ----------------------------
-- Table structure for tipousuario
-- ----------------------------
DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario`  (
  `id` smallint(6) NOT NULL,
  `descripcion` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipousuario
-- ----------------------------
INSERT INTO `tipousuario` VALUES (1, 'administrador');
INSERT INTO `tipousuario` VALUES (2, 'vendedor');
INSERT INTO `tipousuario` VALUES (3, 'almacen');
INSERT INTO `tipousuario` VALUES (4, 'vendedor y almacen');

-- ----------------------------
-- Table structure for unidades
-- ----------------------------
DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `decimales` tinyint(4) NULL DEFAULT NULL,
  `abreviacion` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observacion` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of unidades
-- ----------------------------
INSERT INTO `unidades` VALUES (1, 'SIN UNIDAD', 0, 'S/U', 'para productos tipo pollo');
INSERT INTO `unidades` VALUES (2, 'KILOGRAMO', 1, 'Kg', '');
INSERT INTO `unidades` VALUES (3, 'LITROS', 1, 'L', '');
INSERT INTO `unidades` VALUES (4, 'UNIDADES', 0, 'UNID', '');
INSERT INTO `unidades` VALUES (5, 'DOCENAS', 1, 'DOC', '');
INSERT INTO `unidades` VALUES (6, 'SIX PACK', 1, 'x6', '');
INSERT INTO `unidades` VALUES (7, 'CIENTOS', NULL, 'CIEN', 'nueva unidad');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipo` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'administrador', 'administrador', 'administrador', 1);
INSERT INTO `usuarios` VALUES (2, 'vendedor', 'vendedor', 'vendedor', 2);
INSERT INTO `usuarios` VALUES (3, 'almacen', 'almacen', 'almacen', 3);
INSERT INTO `usuarios` VALUES (4, 'vendedoralmacen', 'vendedoralmacen', 'vendedoralmacen', 4);

-- ----------------------------
-- View structure for v_articulos
-- ----------------------------
DROP VIEW IF EXISTS `v_articulos`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_articulos` AS select a.id as articulo_id, a.cod_barra, a.descripcion, a.descripcion_corta, f.id as familia_id, f.descripcion as familia, a.cantidad_paquete, a.granel, u.id as unidad_id, u.descripcion as unidad, m.id as marca_id, m.descripcion as marca, h.id as area_id, h.descripcion as area, a.observacion, a.estado as articulo_estado, ifnull(SUM(saldo),0) as saldo_total, k.idcolor as idcolor, c.descripcion as color
from articulo a inner join familia f on a.familia = f.id
inner join areas h on f.area = h.id
inner join marca m on a.marca = m.id
inner join unidades u on a.unidad = u.id 
left join kardex k on a.id = k.idarticulo
left join colores c on k.idcolor = c.id
group by a.id, a.cod_barra, a.descripcion, a.descripcion_corta, f.id, f.descripcion, a.cantidad_paquete, a.granel, u.id, u.descripcion, m.id, m.descripcion, h.id, h.descripcion, a.observacion, a.estado, k.idcolor, c.descripcion ;

-- ----------------------------
-- View structure for v_clientes
-- ----------------------------
DROP VIEW IF EXISTS `v_clientes`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_clientes` AS select id, dni_ruc, tipodocumento, nombre, direccion, observacion from clientes
where id <> 1 ;

-- ----------------------------
-- View structure for v_lista_precios_kardex
-- ----------------------------
DROP VIEW IF EXISTS `v_lista_precios_kardex`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_lista_precios_kardex` AS select k.idarticulo as id, a.cod_barra, if(c.id=1,a.descripcion,concat(a.descripcion," - ",c.descripcion)) as descripcion, a.descripcion_corta, sum(k.saldo) as saldo, u.descripcion as unidad, max(k.precio_venta_unitario) as precio_venta, c.id as idcolor 
from kardex k inner join articulo a on k.idarticulo = a.id inner join unidades u on a.unidad = u.id inner join colores c on k.idcolor = c.idwhere saldo > 0 and a.estado = 1
GROUP BY k.idarticulo, a.cod_barra, a.descripcion, a.descripcion_corta, u.descripcion, c.descripcion, c.id ;

-- ----------------------------
-- View structure for v_usuarios
-- ----------------------------
DROP VIEW IF EXISTS `v_usuarios`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuarios` AS select u.id, u.nombre, u.usuario, u.pass, t.descripcion, u.tipo 
from usuarios u inner join tipousuario t on u.tipo = t.id ;

-- ----------------------------
-- Function structure for extraer_kardex
-- ----------------------------
DROP FUNCTION IF EXISTS `extraer_kardex`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `extraer_kardex`(id_articulo int, cantidad decimal, id_color int) RETURNS varchar(50) CHARSET latin1
BEGIN
	declare var_saldo decimal(7,2);
	declare cantidad_lote decimal(7,2);
	declare id_lote varchar(16);
	declare resultado varchar(50);
	select saldo_total from v_articulos where articulo_id = id_articulo and idcolor = id_color into var_saldo;
	
	if var_saldo - cantidad >= 0 then -- procede
		while cantidad > 0 do
			select saldo from kardex where idarticulo = id_articulo and saldo > 0 order by idmovimiento asc limit 1 into cantidad_lote;
			select idmovimiento from kardex where idarticulo = id_articulo and saldo > 0 and idcolor = id_color order by idmovimiento asc limit 1 into id_lote;
			if cantidad_lote - cantidad >= 0 THEN
				update kardex set saldo = cantidad_lote - cantidad where idmovimiento = id_lote;
				select insertar_kardex(id_articulo, 0, cantidad, 0, 0, 0, id_color, 1) into resultado;
				set cantidad = 0;
			else
				select insertar_kardex(id_articulo, 0, cantidad_lote, 0, 0, 0, id_color, 1) into resultado;
				set cantidad = cantidad - cantidad_lote;
				update kardex set saldo = 0 where idmovimiento = id_lote;
			end if;
		end while;
		return 'saldo restado correctamente';
	ELSE
		return 'No existe saldo suficiente';
	end if;
end
;;
delimiter ;

-- ----------------------------
-- Function structure for guardar_comprobante_detalle
-- ----------------------------
DROP FUNCTION IF EXISTS `guardar_comprobante_detalle`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `guardar_comprobante_detalle`(var_id_comprobante int, var_id_articulo int, var_cantidad decimal(7,2), var_precio_unit decimal(7,2), var_subtotal decimal(7,2), var_color int) RETURNS varchar(50) CHARSET latin1
begin
	declare testo varchar(50);
	insert into comprobante_detalle(id_comprobante, id_articulo, cantidad, precio_unit, subtotal, color) values (var_id_comprobante, var_id_articulo, var_cantidad, var_precio_unit, var_subtotal, var_color);
	select 'detalle guardado' into testo;
	return testo;
end
;;
delimiter ;

-- ----------------------------
-- Function structure for guardar_comprobante_maestro
-- ----------------------------
DROP FUNCTION IF EXISTS `guardar_comprobante_maestro`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `guardar_comprobante_maestro`(var_caja int, tipo_documento int, var_subtotal_bruto decimal(7,2), var_impuesto decimal(7,2), var_subtotal_neto decimal(7,2), var_descuento decimal(7,2), var_total decimal(7,2), var_cliente int, var_observacion varchar(200), var_cliente_nombre varchar(50), var_cliente_direccion varchar(250), var_cliente_documento varchar(12)) RETURNS varchar(50) CHARSET latin1
begin
	declare correlativo_serie int;
	declare correlativo_numeral int;
	declare correlativo_total char(11);
	declare testo varchar(50);
	select correlativo_inicial from correlativo_caja where caja = var_caja and tipo_comprobante = tipo_documento into correlativo_serie;
	select correlativo_final + 1 from correlativo_caja where caja = var_caja and tipo_comprobante = tipo_documento into correlativo_numeral;
	select concat(lpad(correlativo_serie, 3, '0'),'-',lpad(correlativo_numeral, 7, '0')) from correlativo_caja limit 1 into correlativo_total;
	insert into comprobante_maestro(primer_correlativo, segundo_correlativo, tipodocumento, correlativo, subtotal_bruto, impuesto, subtotal, descuento, total, cliente, estado, observacion, fecha, nombrecliente, documentocliente, direccioncliente) values (correlativo_serie, correlativo_numeral, tipo_documento, correlativo_total, var_subtotal_bruto, var_impuesto, var_subtotal_neto, var_descuento, var_total, var_cliente, 1, var_observacion, now(), var_cliente_nombre, var_cliente_documento, var_cliente_direccion);
	update correlativo_caja set correlativo_final = correlativo_numeral where caja = var_caja and tipo_comprobante = tipo_documento;
	select ifnull((select id from comprobante_maestro where correlativo = correlativo_total and tipodocumento = tipo_documento),'el recibo no se guardo correctamente') into testo;
	return testo;
end
;;
delimiter ;

-- ----------------------------
-- Function structure for insertar_kardex
-- ----------------------------
DROP FUNCTION IF EXISTS `insertar_kardex`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `insertar_kardex`(id_articulo int, id_proveedor int, cantidad_in decimal, precio_ingreso decimal, precio_unitario_ingreso decimal, precio_unitario_venta decimal, id_color int, motivo int) RETURNS varchar(50) CHARSET latin1
BEGIN
	declare corre_articulo varchar(16);
	declare corre_dia varchar(16);
	
	insert into correlativodia(fecha, correlativo)
		select * from (select date(now()),0) as tmp
		where not exists (select idregistro from correlativodia where fecha = date(now())) limit 1;

	select LPAD((select correlativo + 1 from correlativos where articulo = id_articulo),8,'0') into corre_articulo;
	select CONCAT(SUBSTR(now() FROM 1 FOR 4), SUBSTR(now() FROM 6 FOR 2), SUBSTR(now() FROM 9 FOR 2), LPAD(( ver_corre_dia() + 1 ),8,'0')) into corre_dia;

  -- insert
if motivo = 0 then
	insert into kardex (idmovimiento, idmovimientoarticulo, idarticulo, idproveedor, cantidad, saldo, precioentrada, preciounitario, precio_venta_unitario, idcolor, fechahora, ingreso_egreso, estado) 
		values (corre_dia, corre_articulo, id_articulo, id_proveedor, cantidad_in, cantidad_in, precio_ingreso, precio_unitario_ingreso, precio_unitario_venta, id_color, now(), motivo, 1);
ELSE
	insert into kardex (idmovimiento, idmovimientoarticulo, idarticulo, idproveedor, cantidad, saldo, precioentrada, preciounitario, precio_venta_unitario, idcolor, fechahora, ingreso_egreso, estado) 
		values (corre_dia, corre_articulo, id_articulo, id_proveedor, cantidad_in, 0, precio_ingreso, precio_unitario_ingreso, precio_unitario_venta, id_color, now(), motivo, 1);
end if;
  -- actualizar correlativos
	update correlativodia set correlativo = correlativo + 1 where fecha = date(now());
	update correlativos set correlativo = correlativo + 1 where articulo = id_articulo;
	
	-- retorno correcto
	return 'producto guardado correctamente';
end
;;
delimiter ;

-- ----------------------------
-- Function structure for ver_corre_dia
-- ----------------------------
DROP FUNCTION IF EXISTS `ver_corre_dia`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ver_corre_dia`() RETURNS int(11)
BEGIN
	declare testo int;
	SELECT IFNULL( (SELECT correlativo FROM correlativodia WHERE fecha = date(now()) LIMIT 1) ,0) into testo;
	return testo;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
