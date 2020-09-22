-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2019 at 08:33 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.2.11-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simita_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(30) NOT NULL DEFAULT '',
  `id_kategori` int(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `merek_barang` varchar(30) DEFAULT NULL,
  `spesifikasi` varchar(250) DEFAULT NULL,
  `satuan` enum('PCS','PACK','UNIT','ROLL','METER','BUAH') DEFAULT 'PCS',
  `gid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `id_kategori`, `nama_barang`, `merek_barang`, `spesifikasi`, `satuan`, `gid`) VALUES
('B013.0007', 5, 'WIFI ', 'Cisco Linksys', 'Linksys Dual-Band N900 Router, Model: EA4500-Ap', 'PCS', 1),
('B013.0008', 4, 'POWER SUPLY', 'ADVANCE', 'ADVANCE 450W', 'PCS', 1),
('B013.0009', 4, 'RAM DDR2 V-GEN', 'V-GEN', 'V-GEN DDR2 1GB', 'PCS', 1),
('B013.0010', 1, 'PERSONAL COMPUTER', 'GIGABYTE', 'DUAL CORE 3,0 GHZ, GIGABYTE, HDD 500 GB, RAM DDR3 1 GB ', 'UNIT', 1),
('B013.0011', 7, 'LED', 'LG', 'LG FLATRON E1642 15,6"', 'UNIT', 1),
('B013.0012', 3, 'UPS', 'ICA', 'ICA UPS 2000 VA', 'UNIT', 1),
('B013.0013', 3, 'MOUSE PS2', 'GENIUS', 'GENIUS PS/2 MOUSE', 'PCS', 1),
('B013.0014', 3, 'MOUSE USB', 'GENIUS', 'GENIUS USB MOUSE', 'PCS', 1),
('B013.0015', 5, 'KONEKTOR RJ45', 'AMP', 'CONECTOR RJ45 AMP (50)', 'PACK', 1),
('B013.0017', 8, 'DESJET', 'CANNON', 'PRINTER CANON MP237', 'UNIT', 1),
('B013.0018', 3, 'FLASHDISK', 'KINGSTONE', 'KINGSTONE 8GB', 'PCS', 1),
('B013.0019', 5, 'SWITCH', 'TP-LINK', 'TP-LINK TL-SG1008D GIGABIT 8 PORT', 'UNIT', 1),
('B013.0020', 3, 'UPS', 'ICA', 'ICA 1200VA', 'UNIT', 1),
('B013.0022', 4, 'RAM DDR3 4 GB server', 'V-GEN', 'DDR3 4GB, v-GEN', 'PCS', 1),
('B013.0023', 1, 'PC+LCD+keybrd,Mouse', 'GIGABYTE', 'Mb; GA_H61M-DS2, RAM DDR3 1GB, HDD 500GB WD, LED LG 16EN33, Keyboard+mouse EPRAIZER', 'UNIT', 1),
('B013.0024', 4, 'RAM DDR3', 'V-GEN', 'V-GEN DDR3 1GB', 'PCS', 1),
('B013.0026', 8, 'PRINTER  L110', 'Epson', 'Epson L110', 'UNIT', 1),
('B013.0027', 3, 'FLASDISK 16 GB', 'Kingston', 'Kingston 16 GB', 'PCS', 1),
('B013.0028', 3, 'Keyboard PS/2', 'Genius', 'PS/2 Genius', 'PCS', 1),
('B013.0029', 3, 'Keyboard USB', 'Genius', 'keyboard Genius USB', 'PCS', 1),
('B013.0030', 4, 'HARDISK SATA 500 GB', 'WESTERN DIGITAL', 'WESTERN DIGITAL SATA 500 GB', 'PCS', 1),
('B013.0031', 5, 'KABEL UTP CAT 5E', 'BELDEN', 'BELDEN UTP CATEGORY 5E USA', 'ROLL', 1),
('B013.0032', 9, 'LAN TESTER', 'CABLE TESTER', 'CABLE TESTER NETWORK ', 'PCS', 1),
('B013.0033', 4, 'HARDISK LAPTOP', 'HGST', 'HGST 500 GB', 'PCS', 1),
('B013.0034', 4, 'RAM LAPTOP DDR3 4 GB', 'V-GEN', 'V-GEN DDR 3 4 GB', 'PCS', 1),
('B013.0035', 10, 'REFILL EPSON LXXX', 'EPSON ', 'EPSON BK T6641, C T6642, M T6643, Y T6644', 'ROLL', 1),
('B013.0036', 10, 'REFILL TINTA T6641 BK', 'EPSON', 'EPSON T6641 BLACK', 'PCS', 1),
('B013.0038', 2, 'LAPTOP ASUS', 'ASUS X450 CC', 'CORE i3 , HDD 500 GB, RAM 2 GB, 14"', 'UNIT', 1),
('B013.0039', 4, 'CHARGER LAPTOP', 'ACER 4732Z', 'ACER 4732Z MODEL PA-1650-02 19V OUTPUT', 'UNIT', 1),
('B013.0040', 8, 'DOTMATRIX', 'EPSON ', 'EPSON LX-310', 'UNIT', 1),
('B013.0041', 7, 'LED LG 16EN33', 'LG ', 'LG FLATRON 16EN33 15.6"', 'UNIT', 1),
('B013.0042', 5, 'LAN CARD GIGABIT', 'D-LINK', 'DGE-528T GIGABIT', 'UNIT', 1),
('B013.0044', 5, 'WIFI CISCO', 'CISCO LINKSYS EA4500 ', 'LINKSYS EA4500 GIGABIT DUAL-BAND N900', 'UNIT', 1),
('B013.0046', 4, 'FAN COOLER SCORPION', 'SCORPION KING', 'SCORPION KING FAN COOLER HF-560', 'UNIT', 1),
('B013.0047', 4, 'KABEL VGA 1.5M', 'DIGILINK', 'DIGILINK VGA CABLE 1.5M', 'PCS', 1),
('B013.0048', 7, 'LED LG 19EN33', 'LG', 'LG FLATRON 16EN33 19.6"', 'UNIT', 1),
('B013.0050', 2, 'LAPTOP SONY VAIO', 'SONY VAIO SVT11215SG', 'Intel Core i5 4210Y 1.5GHz, RAM DDR3 4GB, HDD SSD 128 GB', 'UNIT', 1),
('B013.0051', 3, 'UPS 1200VA', 'ICA', 'ICA CE 1200VA', 'UNIT', 1),
('B013.0052', 8, 'PRINTER L800', 'EPSON', 'EPSON L800', 'UNIT', 1),
('B013.0053', 8, 'PRINTER L210', 'EPSON', 'EPSON L210 ALL IN PRINTER', 'UNIT', 1),
('B013.0054', 3, 'KEYBOARD , MOUSE WIFI', 'LOGITECH', 'LOGITECH WIRELESS COMBO MK220', 'UNIT', 1),
('B013.0058', 3, 'MOUSE WIFI', 'LOGITECH', 'LOGITECH WIRELESS MOUSE M185', 'UNIT', 1),
('B013.0059', 10, 'CATRIDGE TX110 B', 'EPSON', 'EPSON CATRIDGE TX110 BLACK', 'UNIT', 1),
('B013.0060', 10, 'CATRIDGE TX110 M', 'EPSON', 'EPSON CATRIDGE TX1100 MAGENTA', 'UNIT', 1),
('B013.0061', 10, 'CATRIDGE TX110 Y', 'EPSON', 'EPSON CATRIDGE TX1100 YELLOW', 'UNIT', 1),
('B013.0062', 10, 'CATRIDGE TX110 C', 'EPSON', 'EPSON CATRIDGE TX1100 CYAN', 'UNIT', 1),
('B013.0063', 5, 'SWITCH 16 PORT', 'D-LINK', 'D-LINK DGS 1015D 16 PORT', 'UNIT', 1),
('B013.0064', 5, 'WIFI CARD TP-LINK', 'TP-LINK', '150Mbps Wifi PCI Card TL-WN781ND', 'UNIT', 1),
('B013.0065', 3, 'FLASHDISK TOSHIBA ', 'TOSHIBA', 'TOSHIBA 4 GB', 'UNIT', 1),
('B013.0066', 1, 'COMPUTER CORE 2 DUO', 'Gigabyte', 'INTEL CORE 2 DUO 3.00 GHz ; HDD 500 GB ; RAM 1 GB', 'UNIT', 1),
('B013.0067', 8, 'PRINTER EPSON L550', 'EPSON', 'EPSON L550', 'UNIT', 1),
('B013.0068', 2, 'LAPTOP ASUS', 'ASUS X451C', 'Intel Core i3-3217U CPU @1.80 GHz, RAM 2 GB, HDD 500 GB', 'UNIT', 1),
('B013.0069', 4, 'HDD IBM 600GB', 'IBM ', 'IBM 600 GB 15 K SAS 3.5 Inch', 'UNIT', 1),
('B013.0070', 4, 'RAM DDR3 4GB', 'V-GEN', 'DDR3 4GB', 'UNIT', 1),
('B013.0071', 10, 'DVD BLANK', 'MAXELL', 'DVD-R 4.7GB', 'PCS', 1),
('B013.0072', 5, 'LAN CARD PCI EXPRESS GIGABIT', 'TP-LINK', 'GIGABIT PCI EXPRESS TG-3468', 'PCS', 1),
('B013.0073', 3, 'FLASHDISK 16GB', 'TRANSCEND', 'TRANSCEND 16 GB USB ', 'PCS', 1),
('B013.0074', 3, 'SCANNER CANON 110', 'CANON', 'CANONSCAN LIDE 110', 'UNIT', 1),
('B013.0075', 5, 'KABEL UTP CAT 6', 'AMP', 'UTP AMP CATEGORY 6', 'ROLL', 1),
('B013.0076', 1, 'COMPUTER BUILTUP LENOVO', 'LENOVO', 'Lenovo E93-1A Desktop\r Core i3 4130 ( 3,46 Ghz , 3M cache )\r 4 GB DDR3 PC3 12800 of RAM\r 500 GB HDD SATA 7200 rpm, Memory Card Reader\r DVDRW Multiburner ', 'UNIT', 2),
('B013.0077', 7, 'LED LENOVO', 'LENOVO', 'LED LENOVO 18.5"', 'UNIT', 1),
('B013.0078', 4, 'BATERAI BIOS', 'MAXELL', 'MAXELL MICRO LITHIUM CELL', 'UNIT', 1),
('B013.0079', 8, 'PRINTER L120', 'EPSON', 'EPSON L120', 'UNIT', 1),
('B013.0080', 3, 'PROJECTOR NEC', 'NEC', 'NEC VE281 HDMI', 'UNIT', 1),
('B013.0081', 9, 'STORAGE SERVER', 'LENOVO EMC Storcenter ix2 (355', 'LENOVO EMC Storcenter ix2 (35552) 2 TB', 'UNIT', 1),
('B013.0082', 3, 'MOUSE PEN WACOOM', 'WACOM ', 'WACOM INTUOS ', 'UNIT', 1),
('B013.0083', 5, 'WIFI ROUTER TP-LINK TL-WA5110G', 'TP-LINK', '54 Mbps', 'PCS', 1),
('B013.0084', 10, 'CD KOSONG', 'MEDIATECH', '700 MB', 'PCS', 1),
('B013.0085', 4, 'Memory V-GEN SO-DIMM DDR3 4GB', 'V-GEN', '4GB PC12800', 'PCS', 1),
('B013.0087', 5, 'MIKROTIK ROUTHERBOARD ', 'MIKROTIK', 'CRS 125-24G-1S-RM', 'UNIT', 1),
('B013.0088', 5, 'Wallmountrack', 'Wallmountrack', 'Wallmountrack 19" 8U-450mm', 'PCS', 1),
('B013.0089', 3, 'MOUSE USB', 'LOGITECH', 'LOGITECH B100', 'PCS', 1),
('B016.0001', 4, 'HARDDISK SATA 2TB SEAGATE', 'SEAGATE', '2TB', 'PCS', 1),
('B016.0002', 4, 'MOTHERBOARD', 'GIGABYTE', 'LG-775', 'PCS', 1),
('B016.0003', 9, 'CONVERTER USB TO IDE/SATA', 'CABLEMAX', 'USB 2.0 TO SATA IDE CABLE', 'PCS', 1),
('B016.0004', 4, 'PROCESSOR', 'Intel', 'CORE 2 DUO', 'PCS', 1),
('B016.0005', 10, 'TERMAL PASTA', 'HC131', 'Headsink Compounds HC131', 'PCS', 1),
('B016.0006', 5, 'MIKROTIK 2S+RM', 'Mikrotik', 'MIKROTIKROUTHERBOARD CRS 226-24G-2S+RM', 'UNIT', 1),
('B016.0007', 8, 'PRINTER IP2770', 'CANON', 'CANON PIXMA IP 2770', 'UNIT', 1),
('B016.0009', 8, 'PRINTER', 'HP LASER JET PRO', 'HP LASER JET PRO P1102', 'UNIT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id_dept` int(10) NOT NULL,
  `gid` int(10) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `ruang` varchar(200) NOT NULL,
  `parent` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_dept`, `gid`, `nama`, `ruang`, `parent`) VALUES
(1, 1, 'UTILITY & POWER SUPPLY', '', 0),
(2, 1, 'TECHNIC', '', 1),
(3, 1, 'CIVIL', '', 1),
(4, 1, 'IPAL', '', 1),
(5, 1, 'QUALITY ASS & FINISH GOODS', '', 0),
(6, 1, 'QUALITY CONTROL', '', 5),
(7, 1, 'PROSES CONTROL', '', 5),
(8, 1, 'JAHIT/ KEMAS', '', 5),
(9, 1, 'KEMAS', '', 8),
(10, 1, 'DISTRIBUSI', '', 8),
(12, 1, 'HRD & PERSONAL', '', 11),
(13, 1, 'INDUSTRIAL RELATIONSHIP', '', 11),
(14, 1, 'GENERAL AFFAIR', '', 11),
(15, 1, 'FINISHING', '', 0),
(16, 1, 'FINISHING', '', 15),
(17, 1, 'PRINTING PREP', '', 15),
(18, 1, 'PRINTING PROD', '', 15),
(19, 1, 'DESIGNER PRINTING', '', 15),
(20, 1, 'DYEING', '', 0),
(21, 1, 'DYEING', '', 20),
(22, 1, 'LOG & PURCH', '', 0),
(23, 1, 'WAREHOUSE', '', 22),
(24, 1, 'PURCHASING', '', 22),
(25, 1, 'MATERIAL CONTROL', '', 22),
(26, 1, 'PPIC', '', 0),
(27, 1, 'PPIC PPC', '', 26),
(28, 1, 'MATERIAL CONTROL', '', 26),
(32, 1, 'PRODUKSI', '', 0),
(33, 1, 'PRODUKSI PPIC', '', 32),
(35, 1, 'WEAVING 2 DAN 3 ', '', 32),
(36, 1, 'QC WEAVING', '', 32),
(37, 1, 'FINANCE & ACCOUNTING', '', 0),
(38, 1, 'FINANCE', '', 37),
(39, 1, 'ACCOUNTING', '', 37),
(40, 1, 'ICT', '', 0),
(41, 1, 'SYS DEV', '', 40),
(42, 1, 'NET WARE', '', 40),
(43, 1, 'WEB', '', 40),
(47, 1, 'SALES', '', 0),
(48, 1, 'SALES 1', '', 47),
(49, 1, 'SALES 2', '', 47),
(57, 2, 'TEKNIK', '', 0),
(58, 2, 'HRD & GA', '', 0),
(59, 2, 'FINANCE & ACCOUNTING', '', 0),
(70, 2, 'ICT', '', 0),
(71, 2, 'NETWARE', '', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tb_group`
--

CREATE TABLE `tb_group` (
  `gid` int(11) NOT NULL,
  `nama_group` varchar(20) NOT NULL,
  `nama_alias` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `logo_dashboard` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_group`
--

INSERT INTO `tb_group` (`gid`, `nama_group`, `nama_alias`, `alamat`, `logo`, `logo_dashboard`) VALUES
(1, 'Kantor 1', 'KA1', 'Kantor 1, Kab. Pekalongan', 'k1.png', 'k1.png'),
(2, 'Kantor 2', 'KA2', 'Kantor 2, Pekalongan', 'k7.png', 'k7.jpg'),
(3, 'Kantor 3', 'KA3', 'kantor 3, Semarang', 'k3.png', 'k3.png'),
(4, 'Kantor 4', 'KA4', 'kantor 4, Surabaya', 'k4.png', 'k4.png'),
(5, 'Kantor 5', 'KA4', 'Kantor4, Jakarta', 'k5.png', 'k5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_history`
--

CREATE TABLE `tb_inv_history` (
  `id_history` int(11) NOT NULL,
  `no_inventaris` varchar(20) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `status` enum('Buat Baru','Dipinjamkan','Kembali','Mutasi') DEFAULT 'Buat Baru',
  `admin` varchar(30) DEFAULT NULL,
  `id_pengguna_awal` varchar(30) DEFAULT NULL,
  `id_pengguna` varchar(30) DEFAULT NULL,
  `lokasi` varchar(50) NOT NULL,
  `note` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_history`
--

INSERT INTO `tb_inv_history` (`id_history`, `no_inventaris`, `tgl_update`, `status`, `admin`, `id_pengguna_awal`, `id_pengguna`, `lokasi`, `note`) VALUES
(1, 'LAP-KA1-17001', '2017-02-03 10:44:56', 'Buat Baru', 'admin kantor1', 'U016.0004', 'U016.0004', '', 'Inventory Baru'),
(2, 'LAP-KA1-17002', '2017-02-03 10:46:03', 'Buat Baru', 'admin kantor1', 'U016.0002', 'U016.0002', '', 'Inventory Baru'),
(3, 'CPU-KA1-17001', '2017-02-03 10:47:51', 'Buat Baru', 'admin kantor1', 'U016.0001', 'U016.0001', '', 'Inventory Baru'),
(4, 'CPU-KA1-17002', '2017-02-03 10:48:41', 'Buat Baru', 'admin kantor1', 'U016.0007', 'U016.0007', '', 'Inventory Baru'),
(5, 'LAP-KA2-17001', '2017-02-03 12:46:37', 'Buat Baru', 'Kantor2', 'U017.0001', 'U017.0001', '', 'Inventory Baru'),
(6, 'CPU-KA2-17001', '2017-02-03 13:27:13', 'Buat Baru', 'Kantor2', 'U017.0002', 'U017.0002', '', 'Inventory Baru'),
(7, 'LAP-KA1-17003', '2017-02-17 11:26:59', 'Buat Baru', 'administrator', 'U016.0005', 'U016.0005', '', 'Inventory Baru'),
(8, 'LAP-KA1-17004', '2017-02-17 11:27:32', 'Buat Baru', 'administrator', 'U016.0006', 'U016.0006', '', 'Inventory Baru'),
(9, 'PRI-KA1-17001', '2017-02-17 15:23:48', 'Buat Baru', 'admin kantor1', NULL, 'U016.0005', '', 'New Inventory'),
(10, 'PRI-KA1-17002', '2017-02-17 15:24:09', 'Buat Baru', 'admin kantor1', NULL, 'U016.0002', '', 'New Inventory'),
(11, 'MON-KA1-17001', '2017-02-17 15:28:17', 'Buat Baru', 'admin kantor1', 'U016.0007', 'U016.0007', '', 'Inventory Baru'),
(12, 'LAP-KA1-19001', '2019-03-17 10:01:08', 'Buat Baru', 'administrator', 'U016.0005', 'U016.0005', '', 'Inventory Baru'),
(13, 'NET-KA1-190001', '2019-03-17 10:50:48', 'Buat Baru', 'administrator', NULL, NULL, 'Ruang Server', 'New Inventory'),
(14, 'CPU-KA1-19001', '2019-04-04 14:24:45', 'Buat Baru', 'admin kantor1', 'U016.0007', 'U016.0007', '', 'Inventory Baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_komputer`
--

CREATE TABLE `tb_inv_komputer` (
  `id_komputer` int(20) NOT NULL,
  `kode_komputer` varchar(20) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `id_pengguna` varchar(30) DEFAULT NULL,
  `nama_komputer` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(200) DEFAULT NULL,
  `serial_number` varchar(20) DEFAULT NULL,
  `id_lisence` varchar(30) DEFAULT NULL,
  `network` varchar(30) DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `remote_akses` varchar(200) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `status` enum('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN','ARSIP/DISIMPAN','RUSAK/NOT FIXABLE','HILANG/DICURI') DEFAULT 'DIGUNAKAN',
  `note` varchar(30) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_komputer`
--

INSERT INTO `tb_inv_komputer` (`id_komputer`, `kode_komputer`, `barcode`, `id_pengguna`, `nama_komputer`, `spesifikasi`, `serial_number`, `id_lisence`, `network`, `tgl_inv`, `remote_akses`, `harga_beli`, `status`, `note`, `gid`) VALUES
(1, 'CPU-KA1-17001', 'CPU-KA1-17001.png', 'U016.0001', 'GIGABITE', 'INTEL CORE 2 DUO @ 3.00 GHz ; HDD 500 GB ; RAM 1 GB', '819392183', NULL, '0.0.0.0', '2016-03-04', '', '3500000', 'DIPERBAIKI', NULL, 1),
(2, 'CPU-KA1-17002', 'CPU-KA1-17002.png', 'U016.0007', 'GIGABITE', 'INTEL CORE 2 CPU E5800@3.20GHZ ; HDD 500 GB ; RAM 1 GB DDR3', '718378', NULL, '0.0.0.0', '2016-06-02', '', '3600000', 'ARSIP/DISIMPAN', '0', 1),
(3, 'CPU-KA2-17001', 'CPU-KA2-17001.png', 'U017.0002', 'VARO', 'Intel CORE 2 DUO @3,0Ghz , HDD 500GB, RAM 2GB', '2138217837', NULL, '0.0.0.0', '2017-02-01', '', '3000000', 'DIGUNAKAN', NULL, 2),
(4, 'CPU-KA1-19001', 'CPU-KA1-19001.png', 'U016.0007', 'Asus', 'Intel Core i5', '12/absc-pc/03/2019', NULL, '0.0.0.0', '2019-04-04', 'ID temviewer : 4545454\r\npaswd: admin', '5500000', 'DIGUNAKAN', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_laptop`
--

CREATE TABLE `tb_inv_laptop` (
  `id_laptop` int(30) NOT NULL,
  `kode_laptop` varchar(20) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `id_pengguna` varchar(30) DEFAULT NULL,
  `nama_laptop` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(200) DEFAULT NULL,
  `serial_number` varchar(20) DEFAULT NULL,
  `id_lisence` varchar(30) DEFAULT NULL,
  `network` varchar(30) DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `remote_akses` varchar(200) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `status` enum('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN','ARSIP/DISIMPAN','RUSAK/NOT FIXABLE','HILANG/DICURI') DEFAULT 'DIGUNAKAN',
  `note` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_laptop`
--

INSERT INTO `tb_inv_laptop` (`id_laptop`, `kode_laptop`, `barcode`, `id_pengguna`, `nama_laptop`, `spesifikasi`, `serial_number`, `id_lisence`, `network`, `tgl_inv`, `remote_akses`, `harga_beli`, `status`, `note`, `gid`) VALUES
(1, 'LAP-KA1-17001', 'LAP-KA1-17001.png', 'U016.0004', 'ASUS', 'ASUS EE PC 2 GB RAM 320HDD, intel Atom ', '0012381', NULL, '0.0.0.0', '2016-03-02', '', '2500000', 'DIGUNAKAN', NULL, 1),
(2, 'LAP-KA1-17002', 'LAP-KA1-17002.png', 'U016.0002', 'LENOVO', 'LENOVO G480, Intel Core-i3, 2Gb Ram 500HDD, 14"', '9183921839', NULL, '0.0.0.0', '2015-04-10', '', '4500000', 'DIGUNAKAN', NULL, 1),
(3, 'LAP-KA2-17001', 'LAP-KA2-17001.png', 'U017.0001', 'DELL', 'DELL Inspiron Corei3, 2GB Ram, 500HDD', '89238192389', NULL, '0.0.0.0', '2016-07-06', '', '4000000', 'DIGUNAKAN', NULL, 1),
(4, 'LAP-KA1-17003', 'LAP-KA1-17003.png', 'U016.0005', 'DELL', 'DELL coare i3 ram 4 GB 500 HD', '21389138', NULL, '0.0.0.0', '2016-06-24', '', '4000000', 'DIGUNAKAN', NULL, 1),
(5, 'LAP-KA1-17004', 'LAP-KA1-17004.png', 'U016.0006', 'LENOVO', 'Thinkpad core i3', '81923729', NULL, '10.62.8.135', '2017-02-10', 'id temviewer : 6544545\r\npasswd : 123456', '50000000', 'DIGUNAKAN', 'ryufj', 1),
(16, 'LAP-KA1-19001', 'LAP-KA1-19001.png', 'U016.0005', 'LENOVO', 'LENOVO Core i3', '00989898', NULL, '192.168.1.90', '2019-03-17', '', '2000000', 'ARSIP/DISIMPAN', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_monitor`
--

CREATE TABLE `tb_inv_monitor` (
  `id_monitor` int(30) NOT NULL,
  `kode_monitor` varchar(30) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `id_pengguna` varchar(30) DEFAULT NULL,
  `jenis_monitor` enum('LED','LCD','CRT','TOUCH SCREEN') DEFAULT 'LED',
  `spesifikasi` varchar(200) DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `status` enum('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN','ARSIP/DISIMPAN','RUSAK/NOT FIXABLE','DIJUAL/HILANG') DEFAULT 'DIGUNAKAN',
  `note` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_monitor`
--

INSERT INTO `tb_inv_monitor` (`id_monitor`, `kode_monitor`, `barcode`, `id_pengguna`, `jenis_monitor`, `spesifikasi`, `tgl_inv`, `harga_beli`, `status`, `note`, `gid`) VALUES
(1, 'MON-KA1-17001', 'MON-KA1-17001.png', 'U016.0007', 'LED', 'LG 15"', '2017-02-01', '1000000', 'RUSAK/NOT FIXABLE', '0', 1),
(3, 'MON-KA1-17002', 'MON-KA1-17002.png', 'U016.0007', 'LED', 'LG 15"', '2017-02-01', '1000000', 'DIGUNAKAN', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_network`
--

CREATE TABLE `tb_inv_network` (
  `id_network` int(20) NOT NULL,
  `kode_network` varchar(30) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `jenis_network` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(200) DEFAULT NULL,
  `sn` varchar(20) DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `status` enum('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN','ARSIP/DISIMPAN','RUSAK/NOT FIXABLE','HILANG/DICURI') DEFAULT 'DIGUNAKAN',
  `gid` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_network`
--

INSERT INTO `tb_inv_network` (`id_network`, `kode_network`, `barcode`, `id_pengguna`, `lokasi`, `jenis_network`, `spesifikasi`, `sn`, `tgl_inv`, `harga_beli`, `status`, `gid`) VALUES
(1, 'NET-KA1-190001', 'NET-KA1-190001.png', 'U016.0002', 'Ruang Server', 'Switch', 'TP-LINK TL 1600D', NULL, '2019-03-17', '2000000', 'RUSAK/NOT FIXABLE', 1),
(9, 'NET-PMT-0001', 'NET-PMT-0001.png', 'U016.0002', 'DI EDP', 'SWITCH MANAGE', 'CISCO SG300-20 20 PORT', '', '2014-01-09', '0', 'DIGUNAKAN', 1),
(10, 'NET-PMT-0002', 'NET-PMT-0002.png', 'U016.0002', 'DI EDP', 'MIKROTIK', 'RB 450G', '', '2014-01-09', '0', 'DIGUNAKAN', 1),
(11, 'NET-PMT-0003', 'NET-PMT-0003.png', 'U016.0002', 'DI EDP', 'SWITCH', 'D-LINK DES-1008D', '', '2014-01-09', '0', 'DIGUNAKAN', 1),
(12, 'NET-PMT-0004', 'NET-PMT-0004.png', 'U016.0002', 'DI EDP', 'MIKROTIK', 'RB 750G', '', '2014-01-09', '0', 'DIGUNAKAN', 1),
(13, 'NET-PMT-0005', 'NET-PMT-0005.png', 'U016.0002', 'DI EDP', 'MIKROTIK', 'RB 750G', '', '2014-01-09', '0', 'DIGUNAKAN', 1),
(14, 'NET-PMT-0006', 'NET-PMT-0006.png', 'U016.0002', 'DI EDP', 'MIKROTIK', 'RB 750G', '', '2014-01-09', '0', 'DIGUNAKAN', 1),
(15, 'NET-PMT-0007', 'NET-PMT-0007.png', 'U016.0002', 'DI EDP', 'ROUTER', 'TP-LINK TD-8817', '', '2014-01-09', '0', 'DIGUNAKAN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_printer`
--

CREATE TABLE `tb_inv_printer` (
  `id_printer` int(20) NOT NULL,
  `kode_printer` varchar(30) DEFAULT NULL,
  `barcode` varchar(30) NOT NULL,
  `id_pengguna` varchar(30) DEFAULT NULL,
  `jenis_printer` enum('DESKJET','LASERJET','DOTMATRIX','ALL-IN','SCANER','FAX') DEFAULT 'DESKJET',
  `spesifikasi` varchar(200) DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `status` enum('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN','ARSIP/DISIMPAN','RUSAK/NOT FIXABLE','HILANG/DICURI') DEFAULT 'DIGUNAKAN',
  `note` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_printer`
--

INSERT INTO `tb_inv_printer` (`id_printer`, `kode_printer`, `barcode`, `id_pengguna`, `jenis_printer`, `spesifikasi`, `tgl_inv`, `harga_beli`, `status`, `note`, `gid`) VALUES
(1, 'PRI-KA1-17001', 'PRI-KA1-17001.png', 'U016.0005', 'DESKJET', 'Epson l210', '2017-02-09', '1200000', 'DIGUNAKAN', NULL, 1),
(2, 'PRI-KA1-17002', 'PRI-KA1-17002.png', 'U016.0002', 'DESKJET', 'Epson L800', '2017-02-04', '3500000', 'DIGUNAKAN', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(30) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `jobdes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `jobdes`) VALUES
(1, 'DIRECTUR', ''),
(2, 'GENERAL MANAGER', ''),
(3, 'DEPT HEAD', ''),
(4, 'SUB DEPT HEAD', ''),
(5, 'SECTION HEAD', ''),
(6, 'GROUP LEADER', ''),
(7, 'STAFF', ''),
(8, 'ADMIN', ''),
(9, 'OPERATOR', ''),
(10, 'HELP DESK', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komputer'),
(2, 'Laptop'),
(3, 'Periferal'),
(4, 'Separepart'),
(5, 'Network Device'),
(6, 'ATK'),
(7, 'Monitor'),
(8, 'Printer'),
(9, 'Alat'),
(10, 'Habis Pakai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `no_permohonan` varchar(15) NOT NULL DEFAULT '',
  `tgl_permohonan` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `jenis_permohonan` varchar(50) DEFAULT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  `no_inventaris` varchar(20) DEFAULT NULL,
  `catatan_pemohon` varchar(100) DEFAULT NULL,
  `nama_pemohon` varchar(50) DEFAULT 'Admin',
  `catatan_perbaikan` varchar(100) DEFAULT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `biaya` decimal(10,0) DEFAULT NULL,
  `status` enum('OPEN','PROCESS','PENDING','CLOSED') DEFAULT 'OPEN',
  `gid` int(11) DEFAULT NULL,
  `ip_address` varchar(200) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `file_lampiran` varchar(200) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`no_permohonan`, `tgl_permohonan`, `tgl_selesai`, `jenis_permohonan`, `nama_kategori`, `no_inventaris`, `catatan_pemohon`, `nama_pemohon`, `catatan_perbaikan`, `nama_supplier`, `biaya`, `status`, `gid`, `ip_address`, `browser`, `file_lampiran`, `size`) VALUES
('B1.0203.001', '2017-02-03 11:44:11', NULL, NULL, 'Laptop', 'LAP-KA1-17002', 'kyeboard mati jon', 'U016.0002', NULL, NULL, NULL, 'OPEN', 1, '', '', '', ''),
('B1.0203.002', '2017-02-03 12:37:23', NULL, NULL, 'Laptop', 'LAP-KA1-17002', 'aosajodj', 'U016.0006', NULL, NULL, NULL, 'OPEN', 1, '', '', '', ''),
('B1.0203.003', '2017-02-03 12:41:15', NULL, NULL, 'Komputer', 'CPU-KA1-17002', 'komputer mati total', 'Tutik', NULL, NULL, NULL, 'OPEN', 1, '', '', '', ''),
('B1.0317.001', '2019-03-17 12:49:07', NULL, NULL, 'Laptop', 'LAP-KA1-17001', 'testing gan ', 'ander', NULL, NULL, NULL, 'OPEN', 1, '::1', 'Chrome', NULL, NULL),
('B1.0317.002', '2019-03-17 12:52:42', '0000-00-00 00:00:00', 'Hardware', 'Komputer', 'CPU-KA1-17001', 'komputer tidak bisa konek internet', 'ander2', 'okj waiting', 'MS COMPUTER', '0', 'PROCESS', 1, '::1', 'Chrome', '38da42b3aed7476abc82c5a3cc02c790.PNG', '32.6'),
('B1.0321.001', '2019-03-01 09:58:00', '2019-03-14 09:03:00', 'Software', 'Laptop', 'LAP-KA1-17004', 'windows error', 'Admin', 'install  windows', '', '0', 'OPEN', 1, '', '', NULL, NULL),
('B1.0411.001', '2019-04-11 14:48:00', '2019-04-12 14:04:00', 'Software', 'Komputer', 'CPU-KA1-19001', 'Windows error', 'Admin', 'install ulang ', 'LAZADO', '250000', 'CLOSED', 1, '', '', NULL, NULL),
('B1.0513.001', '2019-05-13 10:12:11', NULL, NULL, 'Laptop', 'LAP-KA1-17001', 'fikri test', 'Jojon', NULL, NULL, NULL, 'OPEN', 1, '103.18.30.53', 'Chrome', NULL, NULL),
('B1.0513.002', '2019-05-13 10:12:55', NULL, NULL, 'Komputer', 'CPU-KA1-17001', 'okes', 'Andrian', NULL, NULL, NULL, 'OPEN', 1, '103.18.30.53', 'Chrome', NULL, NULL),
('B1.1225.001', '2017-12-25 10:12:48', NULL, NULL, 'Laptop', 'LAP-KA1-17001', 'laptop tidak bisa login', 'ander', NULL, NULL, NULL, 'OPEN', 1, '', '', '', ''),
('B2.0203.001', '2017-02-03 13:35:44', '0000-00-00 00:00:00', 'Hardware', 'Laptop', 'LAP-KA2-17001', 'laptop rusak parah', 'BUDI', '-', '', '0', 'PROCESS', 2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance_detail`
--

CREATE TABLE `tb_maintenance_detail` (
  `id_detail` int(50) NOT NULL,
  `no_permohonan` varchar(15) NOT NULL DEFAULT '',
  `tgl_proses` datetime DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `user` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_maintenance_detail`
--

INSERT INTO `tb_maintenance_detail` (`id_detail`, `no_permohonan`, `tgl_proses`, `catatan`, `user`) VALUES
(1, 'B1.0203.001', '2017-02-03 11:44:11', 'kyeboard mati jon', 'U016.0002'),
(2, 'B1.0203.002', '2017-02-03 12:37:23', 'aosajodj', 'U016.0006'),
(3, 'B1.0203.003', '2017-02-03 12:41:15', 'komputer mati total', 'Tutik'),
(4, 'B2.0203.001', '2017-02-03 13:35:44', 'laptop rusak parah', 'BUDI'),
(5, 'B1.1225.001', '2017-12-25 10:12:48', 'laptop tidak bisa login', 'ander'),
(6, 'B1.1225.001', '2019-03-10 12:07:15', 'sadada', 'Guest'),
(7, 'B1.0317.001', '2019-03-17 12:26:00', 'rusak bos', 'User'),
(8, 'B1.0317.001', '2019-03-17 12:49:07', 'testing gan ', 'ander'),
(9, 'B1.0317.002', '2019-03-17 12:52:42', 'komputer tidak bisa konek internet', 'ander2'),
(10, 'B1.0203.001', '2019-03-21 09:31:07', 'segera di ganti ya\r\n', 'Guest'),
(11, 'B1.0321.001', '2019-03-21 09:58:51', 'windows error', 'User'),
(12, 'B1.0317.002', '2019-03-30 22:48:35', 'ghfh', 'Guest'),
(13, 'B1.0411.001', '2019-04-11 14:49:38', 'Windows error', 'User'),
(14, 'B1.0411.001', '2019-04-12 10:21:41', 'tes', 'Admin'),
(15, 'B1.0513.001', '2019-05-13 10:12:11', 'fikri test', 'Jojon'),
(16, 'B1.0513.002', '2019-05-13 10:12:55', 'okes', 'Andrian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(30) NOT NULL,
  `parent` int(11) NOT NULL,
  `role` enum('Administrator','Admin') DEFAULT 'Admin',
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `icon`, `link`, `parent`, `role`, `aktif`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', 'dashboard', 0, 'Admin', 'Y'),
(2, 'Master', 'fa fa-suitcase', '#', 0, 'Admin', 'Y'),
(3, 'Barang', 'fa fa-plus-square text-aqua', 'barang', 2, 'Admin', 'Y'),
(4, 'Supplier', 'fa fa-truck text-aqua', 'supplier', 2, 'Admin', 'Y'),
(5, 'Pengguna', 'fa fa-user text-aqua', 'pengguna', 2, 'Admin', 'Y'),
(6, 'Inventory', 'fa fa-archive', '#', 0, 'Admin', 'Y'),
(7, 'Laptop', 'fa fa-laptop text-aqua', 'laptop', 6, 'Admin', 'Y'),
(8, 'PC/ Komputer', 'fa fa-desktop text-aqua', 'komputer', 6, 'Admin', 'Y'),
(9, 'Monitor', 'fa fa-barcode text-aqua', 'monitor', 6, 'Admin', 'Y'),
(10, 'Printer', 'fa fa-print text-aqua', 'printer', 6, 'Admin', 'Y'),
(11, 'Device Suport', 'fa fa-sitemap text-aqua', 'device', 6, 'Admin', 'Y'),
(12, 'Transaksi', 'fa fa-th-list', '#', 0, 'Admin', 'Y'),
(13, 'Barang Masuk', 'fa fa-shopping-cart text-aqua', 'masuk', 12, 'Admin', 'Y'),
(14, 'Barang Keluar', 'fa fa-minus-square text-aqua', 'keluar', 12, 'Admin', 'Y'),
(16, 'Stok Barang', 'fa fa-th-large text-aqua', 'stok', 12, 'Admin', 'Y'),
(17, 'Maintenance', 'fa fa-wrench', '#', 0, 'Admin', 'Y'),
(19, 'Dedpartemen', 'fa fa-align-center text-aqua', 'departemen', 2, 'Admin', 'Y'),
(20, 'Inventory', 'fa fa-hdd-o text-aqua', 'maintenance', 17, 'Admin', 'Y'),
(22, 'Seting', 'fa fa-gears', '#', 0, 'Administrator', 'Y'),
(23, 'Menu seting', 'fa  fa-bars text-aqua', 'menu', 22, 'Administrator', 'Y'),
(24, 'User Seting', 'fa fa-users text-aqua', 'user', 22, 'Administrator', 'Y'),
(25, 'Archived', 'fa fa-save text-aqua', 'archived', 6, 'Admin', 'Y'),
(26, 'Group Seting', 'fa fa-gear text-aqua', 'group', 22, 'Admin', 'Y'),
(27, 'Pengajuan Barang', 'fa fa-archive', 'pengajuan', 0, 'Admin', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id` int(11) NOT NULL,
  `tgl_pelayanan` datetime DEFAULT NULL,
  `id_pengguna` varchar(50) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_inv`
--

CREATE TABLE `tb_pengajuan_inv` (
  `no_pengajuan` varchar(20) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `jenis` enum('Baru','Pinjam','','') NOT NULL DEFAULT 'Baru',
  `nama_pemohon` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `departemen` varchar(30) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `kantor` varchar(100) DEFAULT NULL,
  `jenis_inventory` varchar(50) DEFAULT NULL,
  `status` enum('Pengajuan','Menunggu Stok','Approved IT','Approved Assmen','Approved GM','Ditolak') DEFAULT 'Pengajuan',
  `gid` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan_inv`
--

INSERT INTO `tb_pengajuan_inv` (`no_pengajuan`, `tanggal_pengajuan`, `tanggal_disetujui`, `jenis`, `nama_pemohon`, `jenis_kelamin`, `departemen`, `jabatan`, `email`, `no_hp`, `kantor`, `jenis_inventory`, `status`, `gid`, `created_at`, `updated_at`) VALUES
('190506001', '2019-05-06', NULL, 'Pinjam', 'ander', 'Laki-Laki', '2', 'staf', 'ander@gmail.com', NULL, 'kantor1', 'Laptop', 'Approved Assmen', 1, '2019-05-06 14:36:24', '2019-05-15 02:42:32'),
('190506002', '2019-05-06', NULL, 'Pinjam', 'ander', 'Laki-Laki', '2', 'staf', 'ander@gmail.com', NULL, 'kantor1', 'Laptop', 'Approved IT', 1, '2019-05-06 14:39:26', '2019-05-15 02:42:36'),
('190506003', '2019-05-06', NULL, 'Baru', 'meong', 'Laki-Laki', '8', 'staff', 'meong@gmai.com', NULL, 'kantor2', 'Laptop', 'Approved IT', 1, '2019-05-06 14:40:19', '2019-05-11 01:52:29'),
('190506004', '2019-05-06', NULL, 'Baru', 'admin', 'Laki-Laki', '3', 'admin', 'admin@gmail.com', NULL, 'kantor pusat', 'Laptop', 'Approved IT', 1, '2019-05-06 14:46:29', '2019-05-11 01:52:28'),
('190506005', '2019-05-06', NULL, 'Baru', 'admin', 'Laki-Laki', '12', 'admin', 'admin@gmail.com', NULL, 'kantor3', 'Laptop', 'Approved IT', 1, '2019-05-06 14:48:08', '2019-05-11 01:52:12'),
('190509001', '2019-05-09', NULL, 'Baru', 'zx', 'Laki-Laki', '4', 'ass', 'Zxzxz', '21414134', 'zxzx', 'Komputer', 'Approved IT', 1, '2019-05-09 03:32:04', '2019-05-09 03:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(30) NOT NULL DEFAULT '',
  `nik` varchar(30) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `id_dept` int(30) NOT NULL,
  `id_jabatan` int(30) NOT NULL,
  `ruang_kantor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nik`, `nama_pengguna`, `id_dept`, `id_jabatan`, `ruang_kantor`) VALUES
('U016.0001', '0001', 'Andrian', 42, 1, 'Kontor ICT'),
('U016.0002', '003', 'Joko', 12, 5, 'Kantor HRD'),
('U016.0003', '0003', 'Budi ', 34, 7, 'Kantor Produksi 1'),
('U016.0004', '004', 'Jojon', 13, 6, 'Kantor HRD'),
('U016.0005', '005', 'elia', 48, 7, 'Kontor Sales'),
('U016.0006', '006', 'Sulis', 38, 8, 'Kantor Akunting'),
('U016.0007', '007', 'Tutik', 16, 7, 'Kantor Finishing'),
('U017.0001', '123456', 'BUDI', 57, 3, 'R. Teknik'),
('U017.0002', '342324', 'RUDI ', 58, 5, 'Kantor HRD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(10) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nama_status`) VALUES
(1, 'DIGUNAKAN'),
(2, 'SIAP DIGUNAKAN'),
(3, 'DIPERBAIKI'),
(4, 'ARSIP/DISIMPAN'),
(5, 'RUSAK/NOT FIXABLE'),
(6, 'DIJUAL/HILANG'),
(7, 'DIPINJAMKAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(20) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon`) VALUES
(1, 'SKI-Komputer', 'Pekalongan', ''),
(2, 'MItra komputer', 'Jl. Agus Salim pekalongan', ''),
(3, 'PT. MITRA INFOSARANA', 'JL. Nginden Semolo 101 Kav.15 ', ''),
(5, 'PT. SGA', 'Surabaya', ''),
(6, 'MS COMPUTER', 'JL. GAJAHMADA PEKALONGAN', ''),
(7, 'Blintzar Computer', 'Jl. Baros Pekalongan', ''),
(8, 'PT BINAREKA TATAMAND', 'JL. Tanah Abang IV No.32 Jakar', ''),
(9, 'PISMA SURABAYA', 'JL. WR.SUPRATMAN', ''),
(10, 'LAZADO', 'JL.PEMUDA NO.91 C SEMARANG', ''),
(11, 'CV. SURYA JAYA PRATA', 'JL. Dr.Sutomo Ruko Grosir MM B', ''),
(12, 'MS COMPUTER', 'JL. GAJAH MADA ', ''),
(13, 'DANI PRINTER', 'JL. KH MAS MANSYUR GG.4 NO 12A PODOSUGIH - PKL', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_detail`
--

CREATE TABLE `tb_trans_detail` (
  `id_trans_detail` int(30) NOT NULL,
  `kode_transaksi` varchar(30) DEFAULT NULL,
  `jenis_transaksi` enum('Masuk','Keluar','','') NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_barang` varchar(30) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `qty_masuk` int(10) DEFAULT NULL,
  `qty_keluar` int(10) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `gid` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trans_detail`
--

INSERT INTO `tb_trans_detail` (`id_trans_detail`, `kode_transaksi`, `jenis_transaksi`, `tgl_transaksi`, `kode_barang`, `harga`, `qty_masuk`, `qty_keluar`, `catatan`, `status`, `gid`) VALUES
(5, 'BM-KA1-03.001', 'Masuk', '2019-03-17', 'B013.0010', '5000000', 2, NULL, 'untuk IT', '1', 1),
(7, 'BK-KA1-03.001', 'Keluar', '2019-03-17', 'B013.0010', '5000000', NULL, 1, 'untuk edp', '1', 1),
(8, 'BM-KA1-03.002', 'Masuk', '2019-03-21', 'B013.0010', '5000000', 2, NULL, 'untuk bagian IT', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_keluar`
--

CREATE TABLE `tb_trans_keluar` (
  `id_transaksi` int(30) NOT NULL,
  `kode_transaksi` varchar(30) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `id_pengguna` varchar(30) DEFAULT NULL,
  `gid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trans_keluar`
--

INSERT INTO `tb_trans_keluar` (`id_transaksi`, `kode_transaksi`, `tgl_transaksi`, `id_pengguna`, `gid`) VALUES
(1, 'BK-KA1-03.001', '2019-03-17', 'U016.0005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_masuk`
--

CREATE TABLE `tb_trans_masuk` (
  `id_transaksi` int(30) NOT NULL,
  `kode_transaksi` varchar(30) DEFAULT NULL,
  `no_po` varchar(30) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `id_supplier` int(20) DEFAULT NULL,
  `gid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trans_masuk`
--

INSERT INTO `tb_trans_masuk` (`id_transaksi`, `kode_transaksi`, `no_po`, `tgl_transaksi`, `id_supplier`, `gid`) VALUES
(1, 'BM-KA1-03.001', '12345', '2019-03-17', 7, 1),
(2, 'BM-KA1-03.002', '00123', '2019-03-21', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `role` enum('Administrator','General Manager','Asisten Manager','Admin') COLLATE latin1_general_ci DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `role`, `last_login`, `gid`) VALUES
(1, 'administrator', 'root', '$2a$08$mhdBDK/p6a.aQwYta5sbvuAnQWV2vCuMxDLuTzIj/N5V5uF5iHAKm', 'Administrator', '2019-05-15 11:08:25', 1),
(5, 'adnrianext', 'administrator', '$2a$08$Np.qyhXB/L9.oBrxHUCyx.cR4qXARfZM1Wya37HROjP4U8RW4zbiS', 'Administrator', '2019-05-14 09:24:57', 1),
(14, 'admin kantor1', 'kantor1', '$2a$08$E0qeGcfopt/8BrGuWiYcp.CsDG5kshth6badwpaTM6.uUkX7IgOcq', 'Admin', '2019-05-09 06:49:55', 1),
(15, 'Kantor2', 'kantor2', '$2a$08$A1duq2flj8JwWtw.1AKqxulSVtMuYbPxuvF1kgCCgG1NVYooPo0L6', 'Admin', '2019-03-10 20:57:08', 2),
(18, 'asisten manager', 'assmen', '$2a$08$3KbPxa7iiskKEYpmCC.0V.Bvc9syaTZ4xmq4XotPnH1je04QJfYFG', 'Asisten Manager', '2019-05-09 10:27:38', 1),
(19, 'general manager', 'gm', '$2a$08$HEFk1cE2WywBCxvpRFQA9.xGfwzH5yiw.x89NGq2BFLj4w71fgnFC', 'General Manager', '2019-05-09 07:03:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_barcode`
--

CREATE TABLE `temp_barcode` (
  `id` int(30) NOT NULL,
  `barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_barcode`
--

INSERT INTO `temp_barcode` (`id`, `barcode`) VALUES
(1, 'LAP-KA1-17001.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `tb_inv_history`
--
ALTER TABLE `tb_inv_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tb_inv_komputer`
--
ALTER TABLE `tb_inv_komputer`
  ADD PRIMARY KEY (`id_komputer`),
  ADD UNIQUE KEY `kode_komputer` (`kode_komputer`);

--
-- Indexes for table `tb_inv_laptop`
--
ALTER TABLE `tb_inv_laptop`
  ADD PRIMARY KEY (`id_laptop`),
  ADD UNIQUE KEY `kode_laptop` (`kode_laptop`);

--
-- Indexes for table `tb_inv_monitor`
--
ALTER TABLE `tb_inv_monitor`
  ADD PRIMARY KEY (`id_monitor`),
  ADD UNIQUE KEY `kode_monitor` (`kode_monitor`);

--
-- Indexes for table `tb_inv_network`
--
ALTER TABLE `tb_inv_network`
  ADD PRIMARY KEY (`id_network`),
  ADD UNIQUE KEY `kode_network` (`kode_network`);

--
-- Indexes for table `tb_inv_printer`
--
ALTER TABLE `tb_inv_printer`
  ADD PRIMARY KEY (`id_printer`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  ADD PRIMARY KEY (`no_permohonan`);

--
-- Indexes for table `tb_maintenance_detail`
--
ALTER TABLE `tb_maintenance_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_inv`
--
ALTER TABLE `tb_pengajuan_inv`
  ADD PRIMARY KEY (`no_pengajuan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_trans_detail`
--
ALTER TABLE `tb_trans_detail`
  ADD PRIMARY KEY (`id_trans_detail`);

--
-- Indexes for table `tb_trans_keluar`
--
ALTER TABLE `tb_trans_keluar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_trans_masuk`
--
ALTER TABLE `tb_trans_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `temp_barcode`
--
ALTER TABLE `temp_barcode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  MODIFY `id_dept` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_inv_history`
--
ALTER TABLE `tb_inv_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_inv_komputer`
--
ALTER TABLE `tb_inv_komputer`
  MODIFY `id_komputer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_inv_laptop`
--
ALTER TABLE `tb_inv_laptop`
  MODIFY `id_laptop` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_inv_monitor`
--
ALTER TABLE `tb_inv_monitor`
  MODIFY `id_monitor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_inv_network`
--
ALTER TABLE `tb_inv_network`
  MODIFY `id_network` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_inv_printer`
--
ALTER TABLE `tb_inv_printer`
  MODIFY `id_printer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_maintenance_detail`
--
ALTER TABLE `tb_maintenance_detail`
  MODIFY `id_detail` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_trans_detail`
--
ALTER TABLE `tb_trans_detail`
  MODIFY `id_trans_detail` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_trans_keluar`
--
ALTER TABLE `tb_trans_keluar`
  MODIFY `id_transaksi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_trans_masuk`
--
ALTER TABLE `tb_trans_masuk`
  MODIFY `id_transaksi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `temp_barcode`
--
ALTER TABLE `temp_barcode`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
