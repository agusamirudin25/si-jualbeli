/*
 Navicat Premium Data Transfer

 Source Server         : kominfo
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : jualbeli

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 19/05/2020 01:13:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id_customer` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_customer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_tlp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('CST001', 'PT. Supravisi', '08123635812', 'Karawang');
INSERT INTO `customer` VALUES ('CST002', 'PT. Wahana', '081235745912', 'Bekasi');
INSERT INTO `customer` VALUES ('CST003', 'PT. IPS', '08218030476', 'Jakarta');

-- ----------------------------
-- Table structure for faktur
-- ----------------------------
DROP TABLE IF EXISTS `faktur`;
CREATE TABLE `faktur`  (
  `no_faktur` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_penjualan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_customer` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_size` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jml_hrg` int(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bukti` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`no_faktur`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faktur
-- ----------------------------
INSERT INTO `faktur` VALUES ('FK000001', 'JL000001', 'CST001', 'SZ0003', 3960000, '2020-06-01', 'images/bukti/buktiFK000001.jpg');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id_pembelian` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_suplier` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_size` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('BL000001', 'SPL001', 'OUTER COMMUNITY CO FLAT WAFFLE CONE', 'SZ0002', 3000, 300, '2020-05-01', '2020-06-01', 'BELUM LUNAS');
INSERT INTO `pembelian` VALUES ('BL000002', 'SPL002', 'PARTISI MCD', 'SZ0001', 2000, 200, '2020-05-02', '2020-06-02', 'BELUM LUNAS');
INSERT INTO `pembelian` VALUES ('BL000003', 'SPL001', 'AK-Box', 'SZ0002', 3000, 100, '2020-05-07', '2020-06-07', 'BELUM LUNAS');
INSERT INTO `pembelian` VALUES ('BL000004', 'SPL001', 'VPC', 'SZ0001', 2000, 40, '2020-05-16', '2020-06-16', 'BELUM LUNAS');
INSERT INTO `pembelian` VALUES ('BL000005', 'SPL002', 'Pembelian Pertama', 'SZ0001', 2000, 20, '2020-05-01', '2020-05-03', 'Belum Lunas');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_penjualan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_customer` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_size` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('JL000001', 'CST001', 'Carton Box PPG', 'SZ0003', 8800, 450, '2020-05-01', '2020-06-01', 'BELUM LUNAS');
INSERT INTO `penjualan` VALUES ('JL000002', 'CST002', 'CB-SI-V-1647', 'SZ0005', 7395, 350, '2020-04-09', '2020-06-09', 'LUNAS');
INSERT INTO `penjualan` VALUES ('JL000003', 'CST002', 'DMC 6', 'SZ0004', 4600, 20, '2020-04-27', '2020-05-27', 'LUNAS');
INSERT INTO `penjualan` VALUES ('JL000004', 'CST001', 'Jual Beli', 'SZ0001', 2000, 10, '2020-05-01', '2020-05-10', 'Kantor');

-- ----------------------------
-- Table structure for size
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size`  (
  `id_size` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `size_karton` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(10) NOT NULL,
  PRIMARY KEY (`id_size`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES ('SZ0001', '317 X 239 X 285 B-WK200/M125/K125', 'Pcs', 2000);
INSERT INTO `size` VALUES ('SZ0002', '325 X 105 X 80 B-WK200/M125/K125', 'Pcs', 3000);
INSERT INTO `size` VALUES ('SZ0003', '355 X 345 X 185', 'Pcs', 8800);
INSERT INTO `size` VALUES ('SZ0004', '25 X 21 X 15', 'Pcs', 4600);
INSERT INTO `size` VALUES ('SZ0005', '535 X 130 X 100', 'Pcs', 7395);

-- ----------------------------
-- Table structure for suplier
-- ----------------------------
DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier`  (
  `id_suplier` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_suplier` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_tlp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_suplier`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suplier
-- ----------------------------
INSERT INTO `suplier` VALUES ('SPL001', 'PT. Cakrawala Mega', '081235745912', 'Cikarang');
INSERT INTO `suplier` VALUES ('SPL002', 'PT. Indo Maju', '082112037027', 'Cikarang');

-- ----------------------------
-- Table structure for suratjalan
-- ----------------------------
DROP TABLE IF EXISTS `suratjalan`;
CREATE TABLE `suratjalan`  (
  `no_suratjalan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_penjualan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_customer` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_size` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty` int(10) NOT NULL,
  `tanggal_sj` date NOT NULL,
  PRIMARY KEY (`no_suratjalan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_tlp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('USR01', 'Nida Fuadiyah', '081212037027', '21232f297a57a5a743894a0e4a801fc3', 'Admin');
INSERT INTO `user` VALUES ('USR02', 'Wiwik Widiawati', '08128030476', 'c84258e9c39059a89ab77d846ddab909', 'Admin');
INSERT INTO `user` VALUES ('USR03', 'Della Istiqomah', '08123635822', '32cacb2f994f6b42183a1300d9a3e8d6', 'Admin');
INSERT INTO `user` VALUES ('USR04', 'Nanang Abdul Aziz', '082186778941', 'c769c2bd15500dd906102d9be97fdceb', 'Marketing');
INSERT INTO `user` VALUES ('USR05', 'Alex Surya Kusuma', '081212332890', '9f66bd415053adeec208fd1f64fe4e88', 'Pimpinan Perusahaan');

SET FOREIGN_KEY_CHECKS = 1;
