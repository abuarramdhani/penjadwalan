/*
SQLyog Community v13.0.1 (32 bit)
MySQL - 10.1.21-MariaDB : Database - penjadwalan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`penjadwalan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `penjadwalan`;

/*Table structure for table `alat_sewa_event` */

DROP TABLE IF EXISTS `alat_sewa_event`;

CREATE TABLE `alat_sewa_event` (
  `urut` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pemesanan` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `kd_vendor` int(10) NOT NULL,
  PRIMARY KEY (`urut`),
  KEY `FK_alat_sewa_event1` (`kd_pemesanan`),
  KEY `FK_alat_sewa_event2` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `alat_sewa_event` */

insert  into `alat_sewa_event`(`urut`,`kd_pemesanan`,`nama`,`jumlah`,`harga`,`kd_vendor`) values 
(1,5,'Sony A7s',1,1000000,4);

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `kd_area` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `uang_makan` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_area`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`kd_area`,`nama`,`uang_makan`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Dalam Kota',20000,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(2,'Luar Kota Area I',35000,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Luar Kota Area II',75000,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Luar Kota Area III',100000,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Luar Kota Area IV',100000,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Luar Negeri',200000,'on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `detail_pemesanan` */

DROP TABLE IF EXISTS `detail_pemesanan`;

CREATE TABLE `detail_pemesanan` (
  `kd_detail_pemesanan` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pemesanan` int(10) NOT NULL,
  `kd_jenis_pesanan` int(10) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `tgl` text,
  `keterangan` text,
  UNIQUE KEY `urut` (`kd_detail_pemesanan`),
  KEY `FK_detail_pesanan1` (`kd_jenis_pesanan`),
  KEY `FK_detail_pesanan2` (`kd_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `detail_pemesanan` */

insert  into `detail_pemesanan`(`kd_detail_pemesanan`,`kd_pemesanan`,`kd_jenis_pesanan`,`harga_jual`,`tgl`,`keterangan`) values 
(1,1,2,20000000,'12-02-2019, 13-02-2019','3 Kamera'),
(5,4,5,4000000,NULL,'3 kamera'),
(6,3,7,80000000,'23-02-2019, 24-02-2019','4 kamera'),
(7,2,10,5000000,'26-02-2019','2 Kamera'),
(8,2,12,2000000,'26-02-2019','1 Album'),
(9,5,7,20000000,'23-02-2019, 24-02-2019','2 kamera'),
(10,5,12,2000000,'24-02-2019','-');

/*Table structure for table `detail_peminjaman` */

DROP TABLE IF EXISTS `detail_peminjaman`;

CREATE TABLE `detail_peminjaman` (
  `kd_detail_peminjaman` int(10) NOT NULL AUTO_INCREMENT,
  `kd_peminjaman` int(10) NOT NULL,
  `nama_alat` varchar(150) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_sewa` int(15) NOT NULL,
  UNIQUE KEY `urut` (`kd_detail_peminjaman`),
  KEY `FK_detail_peminjaman` (`kd_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `detail_peminjaman` */

insert  into `detail_peminjaman`(`kd_detail_peminjaman`,`kd_peminjaman`,`nama_alat`,`jumlah`,`harga_sewa`) values 
(1,1,'Drone',3,1000000);

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `kd_gaji` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pekerjaan` int(10) NOT NULL,
  `kd_area` int(10) NOT NULL,
  `gaji` int(10) NOT NULL,
  `gaji_magang` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_gaji`),
  KEY `FK_gaji1` (`kd_pekerjaan`),
  KEY `FK_gaji2` (`kd_area`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

/*Data for the table `gaji` */

insert  into `gaji`(`kd_gaji`,`kd_pekerjaan`,`kd_area`,`gaji`,`gaji_magang`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(9,-2,1,10000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(10,-2,2,15000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(11,-2,3,20000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(12,-2,4,25000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(13,-2,5,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(14,-2,6,40000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(15,-1,2,50000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(16,-1,3,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(17,-1,4,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(18,-1,5,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(19,2,1,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(20,2,2,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(21,2,3,275000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(22,2,4,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(23,2,5,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(24,2,6,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(25,3,1,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(26,3,2,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(27,3,3,375000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(28,3,4,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(29,3,5,450000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(30,3,6,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(31,1,1,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(32,1,2,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(33,1,3,325000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(34,1,4,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(35,1,5,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(36,1,6,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(37,4,1,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(38,4,2,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(39,4,3,275000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(40,4,4,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(41,4,5,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(42,4,6,450000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(43,6,1,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(44,6,2,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(45,6,3,125000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(46,6,4,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(47,6,5,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(48,6,6,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(49,7,1,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(50,7,2,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(51,7,3,375000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(52,7,4,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(53,7,5,450000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(54,7,6,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(55,5,1,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(56,5,2,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(57,5,3,275000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(58,5,4,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(59,5,5,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(60,5,6,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(61,8,1,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(62,8,2,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(63,8,3,375000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(64,8,4,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(65,8,5,450000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(66,8,6,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(67,9,1,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(68,9,2,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(69,9,3,525000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(70,9,4,550000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(71,9,5,600000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(72,9,6,650000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(73,10,1,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(74,10,2,300000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(75,10,3,325000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(76,10,4,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(77,10,5,400000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(78,10,6,500000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(79,11,1,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(80,11,2,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(81,11,3,170000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(82,11,4,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(83,11,5,250000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(84,11,6,350000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(85,12,1,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(86,12,2,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(87,12,3,85000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(88,12,4,1000000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(89,12,5,125000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(90,12,6,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(91,13,1,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(92,13,2,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(93,13,3,85000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(94,13,4,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(95,13,5,125000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(96,13,6,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(97,14,1,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(98,14,2,75000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(99,14,3,85000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(100,14,4,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(101,14,5,125000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(102,14,6,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(103,15,1,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(104,15,2,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(105,15,3,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(106,15,4,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(107,15,5,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(108,15,6,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(109,16,1,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(110,16,2,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(111,16,3,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(112,16,4,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(113,16,5,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(114,16,6,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(115,17,1,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(116,17,2,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(117,17,3,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(118,17,4,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(119,17,5,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(120,17,6,50000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(121,18,1,15000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(122,18,2,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(123,18,3,50000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(124,18,4,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(125,18,5,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(126,18,6,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(127,19,1,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(128,19,2,30000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(129,19,3,50000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(130,19,4,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(131,19,5,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(132,19,6,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(133,20,1,20000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(134,20,2,35000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(135,20,3,50000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(136,20,4,100000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(137,20,5,150000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(138,20,6,200000,25,'on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `kd_jabatan` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`kd_jabatan`,`nama`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Admin','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(2,'Oprasional','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Keuangan','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Direktur','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Marketing','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Equipment','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(7,'Produksi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(8,'Editing','on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `jenis_pengeluaran` */

DROP TABLE IF EXISTS `jenis_pengeluaran`;

CREATE TABLE `jenis_pengeluaran` (
  `kd_jenis_pengeluaran` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `kategori_biaya` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_jenis_pengeluaran`)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_pengeluaran` */

insert  into `jenis_pengeluaran`(`kd_jenis_pengeluaran`,`nama`,`kategori_biaya`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Bensin','513 - Transportasi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(2,'Baterai','518 - Habis Pakai','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Parkir','513 - Transportasi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Timbangan Polisi','513 - Transportasi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Sewa / Tiket Transportasi','513 - Transportasi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Konsumsi Setting','512 - Konsumsi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(7,'Snack Perjalanan','512 - Konsumsi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(8,'Makan Perjalanan','512 - Konsumsi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(9,'Hotel','515 - Akomodasi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(10,'Lakban','518 - Habis Pakai','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(11,'Fee Marketing','519 - Marketing','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(12,'Cetak Kolase','517 - Cetak','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(13,'Cetak Magnetik','517 - Cetak','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(14,'Entertainment Client','519 - Marketing','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(15,'Lainnya','529 - Lain-lain','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(777,'Fee Penjualan','520 - Fee Penjualan','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(888,'Sewa Alat','514 - Sewa Alat','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(999,'Gaji','511 - Gaji','on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `jenis_pesanan` */

DROP TABLE IF EXISTS `jenis_pesanan`;

CREATE TABLE `jenis_pesanan` (
  `kd_jenis_pesanan` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_jenis_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_pesanan` */

insert  into `jenis_pesanan`(`kd_jenis_pesanan`,`nama`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'LED Wall','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(2,'Liputan Video DSLR','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Rental Alat','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Live Event','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(7,'Liputan Video','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(8,'Video Profile / Clip / Iklan / Film','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(9,'Liputan Foto Tanpa Cetak','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(10,'Liputan Foto Cetak Kolase','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(11,'Liputan Foto Cetak Magnetik','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(12,'Editing','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(15,'Copy DVD','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(16,'Cetak Foto','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(17,'Tukar Alat Baru / Hilang / Rusak','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(18,'Transportasi','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(19,'Tenaga SDM','on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kd_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`kd_kategori`,`nama`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Kamera','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Lighting','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Drone','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(7,'Monitor','on','rifki','2019-02-19 20:28:44',NULL,NULL);

/*Table structure for table `klien` */

DROP TABLE IF EXISTS `klien`;

CREATE TABLE `klien` (
  `kd_klien` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_klien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `klien` */

insert  into `klien`(`kd_klien`,`nama`,`no_hp`,`alamat`,`email`,`company`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Rendra','081122334455','Jakarta','rendra@gmail.com','Personal','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(2,'Yofan','08123456789','Medan','yofan@gmail.com','Personal','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Yoga','08123456789','Kebumen','yoga@gmail.com','Personal','on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `kota` */

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `kd_kota` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `kd_area` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_kota`),
  KEY `FK_kota` (`kd_area`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

/*Data for the table `kota` */

insert  into `kota`(`kd_kota`,`nama`,`kd_area`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Yogyakarta',1,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Kediri',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Solo',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Wonogiri',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(7,'Klaten',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(8,'Sragen',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(9,'Karanganyar',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(10,'Muntilan',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(11,'Magelang',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(12,'Temanggung',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(13,'Kartasura',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(14,'Salatiga',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(15,'Boyolali',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(16,'Delanggu',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(17,'Ambarawa',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(18,'Purworejo',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(19,'Kutoarjo',2,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(20,'Magetan',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(21,'Ponorogo',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(22,'Madiun',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(23,'Ngawi',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(24,'Trenggalek',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(25,'Tulung Agung',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(26,'Nganjuk',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(27,'Kertosono',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(28,'Blitar',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(29,'Bojonegoro',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(30,'Tuban',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(31,'Blora',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(32,'Rembang',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(33,'Jepara',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(34,'Demak',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(35,'Kudus',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(36,'Semarang',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(37,'Kendal',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(38,'Pekalongan',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(39,'Tegal',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(40,'Brebes',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(41,'Kebumen',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(42,'Banjarnegara',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(43,'Purwokerto',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(44,'Cilacap',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(45,'Pemalang',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(46,'Tasikmalaya',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(47,'Garut',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(48,'Majalengka',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(49,'Cirebon',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(50,'Purwakarta',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(51,'Jakarta',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(52,'Bogor',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(53,'Sukabumi',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(54,'Banten',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(55,'Malang',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(56,'Sidoarjo',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(57,'Surabaya',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(58,'Madura',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(59,'Bali',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(60,'Probolinggo',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(61,'Lumajang',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(62,'Jember',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(63,'Banyuwangi',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(64,'Lampung',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(65,'Riau',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(66,'Sumatra',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(67,'Jambi',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(68,'Palembang',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(69,'Pekanbaru',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(70,'Batam',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(71,'Medan',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(72,'Aceh',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(73,'Pontianak',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(74,'Palangkaraya',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(75,'Balikpapan',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(76,'Samarinda',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(77,'Banjarmasin',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(78,'Palu',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(79,'Makassar',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(80,'Kendari',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(81,'Mataram',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(82,'Ende',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(83,'Sumba',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(84,'Flores',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(85,'Kupang',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(86,'Ambon',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(88,'Papua',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(89,'Ternate',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(90,'Sorong',5,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(91,'Luar Negeri',6,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(92,'Bandung',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(93,'Bekasi',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(94,'Karawang',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(95,'Pacitan',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(96,'Depok',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(97,'Tangerang',4,'on','rifki','2019-02-18 08:00:00',NULL,NULL),
(98,'Pati',3,'on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `merk` */

DROP TABLE IF EXISTS `merk`;

CREATE TABLE `merk` (
  `kd_merk` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `merk` */

insert  into `merk`(`kd_merk`,`nama`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Canon','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Nikon','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Samsung','on','rifki','2019-02-19 20:26:14',NULL,NULL),
(6,'Sony','on','rifki','2019-02-19 20:26:28',NULL,NULL),
(7,'Fujifilm','on','rifki','2019-02-19 20:26:53',NULL,NULL),
(8,'Sigma','on','rifki','2019-02-19 20:27:13',NULL,NULL),
(9,'Olympus','on','rifki','2019-02-19 20:27:28',NULL,NULL),
(10,'DJI','on','rifki','2019-02-19 20:33:35',NULL,NULL);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `username` varchar(150) NOT NULL,
  `kd_jabatan` int(10) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_pegawai` enum('tetap','magang') NOT NULL,
  `status_user` enum('superadmin','user') NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `FK_pegawai` (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`username`,`kd_jabatan`,`nama`,`mulai_kerja`,`no_hp`,`alamat`,`npwp`,`email`,`password`,`status_pegawai`,`status_user`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
('alvaro',2,'Alvaro Argi','2018-10-01','081234567890','klaten','1234567890','alvaro@gmail.com','98db6b79acb71383b5a83e0bbc1cadd4','magang','user','on','rifki','2019-02-18 08:00:00','rifki','2019-02-19 22:40:27'),
('elvan',2,'Adhitama Elvan','2019-02-05','0812345678','Jogja','1234567890','muhammad.rifki@student.uty.ac.id','66c08732e3aea176afcd3eb236c4ebba','tetap','user','on','rifki','2019-02-19 22:38:13',NULL,NULL),
('gavin',2,'Adhlino Gavin','2019-02-05','08123456789','Bandung','1234567890','gavin@gmail.com','1adba86c435b5fe0f7ea043370b1636b','tetap','user','on','rifki','2019-02-19 22:40:10',NULL,NULL),
('reiki',2,'Reiki Savian','0000-00-00','08123456789','Jogja','1234567890','rifki.mrkoding@gmail.com','f21f2d175edd74fefea053696c7d02d1','tetap','user','on','rifki','2019-02-19 22:35:11',NULL,NULL),
('rifki',1,'Muhammad Rifki','2018-07-30','081234567890','medan','1234567890','mrif.ki8696@gmail.com','2a5c4c5a5ba1c332279685ddec507cd9','tetap','superadmin','on','rifki','2019-02-18 08:00:00',NULL,NULL),
('ruri',2,'Ruri Narendra','2018-09-25','081234567890','kebumen','1234567890','ruri@gmail.com','7bb5d94c9c5db30136a0711e9c51e36f','magang','user','on','rifki','2019-02-18 08:00:00',NULL,NULL),
('superadmin',1,'Super Admin','2019-01-30','08123456789','Jogja','1234567890','alexrins77@gmail.com','17c4520f6cfd1ab53d8745e84681eb49','tetap','superadmin','on','rifki','2019-02-18 08:00:00',NULL,NULL),
('user',2,'User','2019-02-18','08123456789','Yogyakarta','1234567890','user@gmail.com','ee11cbb19052e40b07aac0ca060c23ee','tetap','user','on','rifki','2019-02-19 22:15:20',NULL,NULL);

/*Table structure for table `pekerjaan` */

DROP TABLE IF EXISTS `pekerjaan`;

CREATE TABLE `pekerjaan` (
  `kd_pekerjaan` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_pekerjaan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `pekerjaan` */

insert  into `pekerjaan`(`kd_pekerjaan`,`nama`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(-2,'Pemegang RAB','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(-1,'Driver','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(1,'Operator LED','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(2,'Kameramen','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Mixerman Live','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Operator Laptop','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Pilot Drone','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Runner / Assisten','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(7,'Opr Jib','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(8,'Photographer','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(9,'Photographer Dengan Alat','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(10,'Manager LED','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(11,'Pasang Bongkar LED','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(12,'Pasang LED','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(13,'Bongkar LED','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(14,'Jaga LED Hari Kedua dst','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(15,'Editor Video','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(16,'Editor Album Kolase','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(17,'Editor Album Magnetik','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(18,'Pasang Alat','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(19,'Bongkar Alat','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(20,'Jaga Alat (Diatas 4 Jam)','on','rifki','2019-02-18 08:00:00',NULL,NULL);

/*Table structure for table `pemesanan_klien` */

DROP TABLE IF EXISTS `pemesanan_klien`;

CREATE TABLE `pemesanan_klien` (
  `kd_pemesanan` int(10) NOT NULL AUTO_INCREMENT,
  `tipe_pesanan` enum('Alat','Alat & Jasa') NOT NULL,
  `kd_klien` int(10) NOT NULL,
  `kd_kota` varchar(10) DEFAULT NULL,
  `nama_event` varchar(200) DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `pemegang_rab` varchar(10) DEFAULT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('menunggu','diproses','dibatalkan','selesai') NOT NULL,
  `jumlah_rab` bigint(15) DEFAULT '0',
  `diskon` bigint(15) DEFAULT '0',
  `fee_penjualan` varchar(150) DEFAULT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_pemesanan`),
  KEY `FK_pemesanan_klien1` (`kd_klien`),
  KEY `FK_pemesanan_klien2` (`kd_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pemesanan_klien` */

insert  into `pemesanan_klien`(`kd_pemesanan`,`tipe_pesanan`,`kd_klien`,`kd_kota`,`nama_event`,`lokasi`,`pemegang_rab`,`tgl_mulai`,`tgl_selesai`,`status`,`jumlah_rab`,`diskon`,`fee_penjualan`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Alat & Jasa',4,'52','Event 1','The Espemia Convention Hall','rifki','2019-02-12','2019-02-13 23:00:00','selesai',4400000,0,'reiki','user','2019-02-20 06:08:43',NULL,NULL),
(2,'Alat & Jasa',2,'1','Event 2','Jogja Rich Hotel',NULL,'2019-02-26','2019-02-26 23:00:00','diproses',NULL,0,NULL,'user','2019-02-20 06:17:31','user','2019-02-20 06:27:13'),
(3,'Alat & Jasa',3,'71','Event 3','Grand Aston City Hall Medan',NULL,'2019-02-23','2019-02-24 23:00:00','dibatalkan',0,0,NULL,'user','2019-02-20 06:21:59','user','2019-02-20 06:26:01'),
(4,'Alat',1,NULL,NULL,NULL,NULL,'2019-02-20','2019-02-22 23:00:00','menunggu',0,0,NULL,'user','2019-02-20 06:24:59',NULL,NULL),
(5,'Alat & Jasa',5,'51','Event 5','JCC','rifki','2019-02-23','2019-02-24 23:00:00','diproses',2600000,0,'user','user','2019-02-20 08:33:51',NULL,NULL);

/*Table structure for table `peminjaman_vendor` */

DROP TABLE IF EXISTS `peminjaman_vendor`;

CREATE TABLE `peminjaman_vendor` (
  `kd_peminjaman` int(10) NOT NULL AUTO_INCREMENT,
  `kd_vendor` int(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('dipinjam','dikembalikan','dibatalkan') NOT NULL,
  PRIMARY KEY (`kd_peminjaman`),
  KEY `FK_peminjaman_vendor` (`kd_vendor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman_vendor` */

insert  into `peminjaman_vendor`(`kd_peminjaman`,`kd_vendor`,`tgl_pinjam`,`tgl_kembali`,`status`) values 
(1,1,'2019-01-05','2019-01-05','dipinjam');

/*Table structure for table `pengeluaran_event` */

DROP TABLE IF EXISTS `pengeluaran_event`;

CREATE TABLE `pengeluaran_event` (
  `urut` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pemesanan` int(10) NOT NULL,
  `kd_jenis_pengeluaran` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `keterangan` text,
  UNIQUE KEY `urut` (`urut`),
  KEY `FK_pengeluaran_event2` (`kd_jenis_pengeluaran`),
  KEY `FK_pengeluaran_event3` (`kd_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pengeluaran_event` */

insert  into `pengeluaran_event`(`urut`,`kd_pemesanan`,`kd_jenis_pengeluaran`,`harga`,`keterangan`) values 
(1,1,999,2400000,NULL),
(2,1,9,2000000,'1 hari'),
(3,5,888,1000000,NULL),
(4,5,999,1600000,NULL),
(5,5,777,1100000,'5'),
(6,1,777,1000000,'5');

/*Table structure for table `pengembalian_klien` */

DROP TABLE IF EXISTS `pengembalian_klien`;

CREATE TABLE `pengembalian_klien` (
  `kd_pengembalian_klien` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pemesanan` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_pengembalian_klien`),
  KEY `FK_pengembalian_klien` (`kd_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pengembalian_klien` */

insert  into `pengembalian_klien`(`kd_pengembalian_klien`,`kd_pemesanan`,`tgl`,`tambah`,`waktu_tambah`) values 
(1,1,'2019-02-14','rifki','2019-02-20 06:40:36');

/*Table structure for table `pengembalian_vendor` */

DROP TABLE IF EXISTS `pengembalian_vendor`;

CREATE TABLE `pengembalian_vendor` (
  `kd_pengembalian_vendor` int(10) NOT NULL AUTO_INCREMENT,
  `kd_peminjaman` int(10) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`kd_pengembalian_vendor`),
  KEY `FK_pengembalian_vendor` (`kd_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengembalian_vendor` */

/*Table structure for table `peralatan` */

DROP TABLE IF EXISTS `peralatan`;

CREATE TABLE `peralatan` (
  `kd_peralatan` varchar(150) NOT NULL,
  `kd_tipe` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_peralatan`),
  KEY `FK_peralatan1` (`kd_tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peralatan` */

insert  into `peralatan`(`kd_peralatan`,`kd_tipe`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
('A-A7 Mark III',8,'on','rifki','2019-02-19 21:04:40',NULL,NULL),
('A-A7s',7,'on','rifki','2019-02-19 21:03:28',NULL,NULL),
('A-D3X',10,'on','rifki','2019-02-19 20:59:03',NULL,NULL),
('A-DDW-LW5501 55 inch',13,'on','rifki','2019-02-19 21:00:18',NULL,NULL),
('A-EOS 1D',9,'on','rifki','2019-02-19 20:52:58',NULL,NULL),
('A-EOS 5D Mark IV',5,'on','rifki','2019-02-19 20:52:10',NULL,NULL),
('A-OM-D EM-1 Mark II',12,'on','rifki','2019-02-19 20:54:33',NULL,NULL),
('A-Spark',6,'on','rifki','2019-02-19 20:55:29',NULL,NULL),
('A-XT1',11,'on','rifki','2019-02-19 20:57:29',NULL,NULL),
('B-A7 Mark III',8,'on','rifki','2019-02-19 21:04:53',NULL,NULL),
('B-A7s',7,'on','rifki','2019-02-19 21:03:44',NULL,NULL),
('B-D3X',10,'on','rifki','2019-02-19 20:59:17',NULL,NULL),
('B-DDW-LW5501 55 inch',13,'on','rifki','2019-02-19 21:00:52',NULL,NULL),
('B-EOS 1D',9,'on','rifki','2019-02-19 20:53:09',NULL,NULL),
('B-EOS 5D Mark IV',5,'on','rifki','2019-02-19 20:52:18',NULL,NULL),
('B-OM-D EM-1 Mark II',12,'on','rifki','2019-02-19 20:54:50',NULL,NULL),
('B-Spark',6,'on','rifki','2019-02-19 20:55:40',NULL,NULL),
('B-XT1',11,'on','rifki','2019-02-19 20:57:42',NULL,NULL),
('C-A7 Mark III',8,'on','rifki','2019-02-19 21:05:04',NULL,NULL),
('C-A7s',7,'on','rifki','2019-02-19 21:04:11',NULL,NULL),
('C-D3X',10,'on','rifki','2019-02-19 20:59:26',NULL,NULL),
('C-DDW-LW5501 55 inch',13,'on','rifki','2019-02-19 21:01:04',NULL,NULL),
('C-EOS 1D',9,'on','rifki','2019-02-19 20:53:17',NULL,NULL),
('C-EOS 5D Mark IV',5,'on','rifki','2019-02-19 20:52:27',NULL,NULL),
('C-OM-D EM-1 Mark II',12,'on','rifki','2019-02-19 20:55:00',NULL,NULL),
('C-Spark',6,'on','rifki','2019-02-19 20:56:53',NULL,NULL),
('C-XT1',11,'on','rifki','2019-02-19 20:57:52',NULL,NULL),
('D-A7 Mark III',8,'on','rifki','2019-02-19 21:05:14',NULL,NULL),
('D-A7s',7,'on','rifki','2019-02-19 21:04:20',NULL,NULL),
('D-D3X',10,'on','rifki','2019-02-19 20:59:36',NULL,NULL),
('D-DDW-LW5501 55 inch',13,'on','rifki','2019-02-19 21:02:23',NULL,NULL),
('D-EOS 1D',9,'on','rifki','2019-02-19 20:53:27',NULL,NULL),
('D-EOS 5D Mark IV',5,'on','rifki','2019-02-19 20:52:34',NULL,NULL),
('D-OM-D EM-1 Mark II',12,'on','rifki','2019-02-19 20:55:10',NULL,NULL),
('D-Spark',6,'on','rifki','2019-02-19 20:57:09',NULL,NULL),
('D-XT1',11,'on','rifki','2019-02-19 20:58:13',NULL,NULL),
('E-A7 Mark III',8,'on','rifki','2019-02-19 21:05:30',NULL,NULL),
('E-A7s',7,'on','rifki','2019-02-19 21:04:30',NULL,NULL),
('E-D3X',10,'on','rifki','2019-02-19 20:59:51',NULL,NULL),
('E-DDW-LW5501 55 inch',13,'on','rifki','2019-02-19 21:02:33',NULL,NULL),
('E-EOS 1D',9,'on','rifki','2019-02-19 20:53:36',NULL,NULL),
('E-EOS 5D Mark IV',5,'on','rifki','2019-02-19 20:52:42',NULL,NULL),
('E-OM-D EM-1 Mark II',12,'on','rifki','2019-02-19 20:55:20',NULL,NULL),
('E-Spark',6,'on','rifki','2019-02-19 20:57:20',NULL,NULL),
('E-XT1',11,'on','rifki','2019-02-19 20:58:38',NULL,NULL);

/*Table structure for table `peralatan_event` */

DROP TABLE IF EXISTS `peralatan_event`;

CREATE TABLE `peralatan_event` (
  `urut` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pemesanan` int(10) NOT NULL,
  `kd_peralatan` varchar(150) NOT NULL,
  PRIMARY KEY (`urut`),
  KEY `FK_peralatan_event` (`kd_pemesanan`),
  KEY `FK_peralatan_event1` (`kd_peralatan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `peralatan_event` */

insert  into `peralatan_event`(`urut`,`kd_pemesanan`,`kd_peralatan`) values 
(1,1,'A-EOS 1D'),
(2,1,'B-EOS 1D'),
(3,1,'C-EOS 1D'),
(4,2,'A-EOS 5D Mark IV'),
(5,2,'B-EOS 5D Mark IV'),
(6,5,'A-EOS 5D Mark IV'),
(7,5,'B-EOS 5D Mark IV');

/*Table structure for table `sdm_event` */

DROP TABLE IF EXISTS `sdm_event`;

CREATE TABLE `sdm_event` (
  `urut` int(10) NOT NULL AUTO_INCREMENT,
  `kd_pemesanan` int(10) NOT NULL,
  `username` varchar(150) NOT NULL,
  `pekerjaan1` varchar(10) DEFAULT NULL,
  `pekerjaan2` varchar(10) DEFAULT NULL,
  `pekerjaan3` varchar(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `gaji` int(10) DEFAULT NULL,
  `uang_makan` int(10) DEFAULT NULL,
  UNIQUE KEY `urut` (`urut`),
  KEY `FK_sdm_event` (`kd_pemesanan`),
  KEY `FK_sdm_event1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `sdm_event` */

insert  into `sdm_event`(`urut`,`kd_pemesanan`,`username`,`pekerjaan1`,`pekerjaan2`,`pekerjaan3`,`tgl`,`gaji`,`uang_makan`) values 
(1,1,'elvan','2','-','-','2019-02-12',300000,100000),
(2,1,'elvan','2','-','-','2019-02-13',300000,100000),
(3,1,'rifki','2','-','-','2019-02-12',300000,100000),
(4,1,'rifki','2','-','-','2019-02-13',300000,100000),
(5,1,'user','2','-','-','2019-02-12',300000,100000),
(6,1,'user','2','-','-','2019-02-13',300000,100000),
(7,1,'rifki','-2',NULL,NULL,NULL,25000,0),
(8,5,'rifki','2','-','-','2019-02-23',300000,100000),
(9,5,'rifki','2','-','-','2019-02-24',300000,100000),
(10,5,'user','2','-','-','2019-02-23',300000,100000),
(11,5,'user','2','-','-','2019-02-24',300000,100000),
(12,5,'rifki','-2',NULL,NULL,NULL,25000,0);

/*Table structure for table `sdm_temp` */

DROP TABLE IF EXISTS `sdm_temp`;

CREATE TABLE `sdm_temp` (
  `nomer` varchar(10) DEFAULT NULL,
  `kd_pemesanan` varchar(10) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `pekerjaan1` varchar(10) DEFAULT NULL,
  `pekerjaan2` varchar(10) DEFAULT NULL,
  `pekerjaan3` varchar(10) DEFAULT NULL,
  `tgl` varchar(20) DEFAULT NULL,
  `gaji` int(10) DEFAULT NULL,
  `uang_makan` int(10) DEFAULT NULL,
  `cek` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sdm_temp` */

/*Table structure for table `tipe` */

DROP TABLE IF EXISTS `tipe`;

CREATE TABLE `tipe` (
  `kd_tipe` int(10) NOT NULL AUTO_INCREMENT,
  `kd_kategori` int(10) NOT NULL,
  `kd_merk` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_tipe`),
  KEY `FK_tipe` (`kd_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tipe` */

insert  into `tipe`(`kd_tipe`,`kd_kategori`,`kd_merk`,`nama`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(2,1,2,'D3100','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,1,1,'EOS 5D Mark IV','on','rifki','2019-02-19 20:33:06','rifki','2019-02-19 20:39:54'),
(6,5,10,'Spark','on','rifki','2019-02-19 20:35:05',NULL,NULL),
(7,1,6,'A7s','on','rifki','2019-02-19 20:38:25',NULL,NULL),
(8,1,6,'A7 Mark III','on','rifki','2019-02-19 20:38:48',NULL,NULL),
(9,1,1,'EOS 1D','on','rifki','2019-02-19 20:41:32',NULL,NULL),
(10,1,4,'D3X','on','rifki','2019-02-19 20:42:22',NULL,NULL),
(11,1,7,'XT1','on','rifki','2019-02-19 20:43:45',NULL,NULL),
(12,1,1,'OM-D EM-1 Mark II','on','rifki','2019-02-19 20:45:05',NULL,NULL),
(13,7,5,'DDW-LW5501 55 inch','on','rifki','2019-02-19 20:47:08','rifki','2019-02-19 20:47:26');

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `kd_vendor` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `status` enum('on','off') NOT NULL,
  `tambah` varchar(150) DEFAULT NULL,
  `waktu_tambah` datetime DEFAULT NULL,
  `ubah` varchar(150) DEFAULT NULL,
  `waktu_ubah` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_vendor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `vendor` */

insert  into `vendor`(`kd_vendor`,`nama`,`no_hp`,`alamat`,`email`,`status`,`tambah`,`waktu_tambah`,`ubah`,`waktu_ubah`) values 
(1,'Magma','081122334455','Yogyakarta','magma@gmail.com','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(3,'Rentalindo','08123456789','Yogyakarta','rentalindo@gmail.com','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(4,'Evi Studio','08123456789','Yogyakarta','evi@gmail.com','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(5,'Palosa','08123456789','Yogyakarta','palosa@gmail.com','on','rifki','2019-02-18 08:00:00',NULL,NULL),
(6,'Lensa Jogja','08123456789','Yogyakarta','lensajogja@gmail.com','on','rifki','2019-02-18 08:00:00',NULL,NULL);

/* Trigger structure for table `pemesanan_klien` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_pemesanan_klien` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_pemesanan_klien` AFTER DELETE ON `pemesanan_klien` FOR EACH ROW BEGIN
    DELETE FROM pengembalian_klien WHERE kd_pemesanan = OLD.kd_pemesanan;
    DELETE FROM sdm_event WHERE kd_pemesanan = OLD.kd_pemesanan;
    DELETE FROM peralatan_event WHERE kd_pemesanan = OLD.kd_pemesanan;
    DELETE FROM alat_sewa_event WHERE kd_pemesanan = OLD.kd_pemesanan;
    DELETE FROM pengeluaran_event WHERE kd_pemesanan = OLD.kd_pemesanan;
    END */$$


DELIMITER ;

/* Trigger structure for table `peminjaman_vendor` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_pengembalian_vendor` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_pengembalian_vendor` AFTER DELETE ON `peminjaman_vendor` FOR EACH ROW BEGIN
    DELETE from pengembalian_vendor where kd_peminjaman = OLD.kd_peminjaman;
    END */$$


DELIMITER ;

/* Trigger structure for table `pengembalian_klien` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pengembalian_klien` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pengembalian_klien` AFTER INSERT ON `pengembalian_klien` FOR EACH ROW BEGIN
    UPDATE pemesanan_klien
	SET status = 'selesai'
	WHERE
	kd_pemesanan = NEW.kd_pemesanan;
    END */$$


DELIMITER ;

/* Trigger structure for table `pengembalian_vendor` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pengembalian_vendor` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pengembalian_vendor` AFTER INSERT ON `pengembalian_vendor` FOR EACH ROW BEGIN
    UPDATE peminjaman_vendor
	SET status = 'dikembalikan'
	WHERE
	kd_peminjaman = NEW.kd_peminjaman;
    END */$$


DELIMITER ;

/* Trigger structure for table `peralatan_event` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `peralatan_event` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `peralatan_event` AFTER INSERT ON `peralatan_event` FOR EACH ROW BEGIN
    UPDATE pemesanan_klien
	SET STATUS = 'diproses'
	WHERE
	kd_pemesanan = NEW.kd_pemesanan;

    END */$$


DELIMITER ;

/* Trigger structure for table `sdm_event` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `sdm_event` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `sdm_event` AFTER INSERT ON `sdm_event` FOR EACH ROW BEGIN
    UPDATE pemesanan_klien
	SET STATUS = 'diproses'
	WHERE
	kd_pemesanan = NEW.kd_pemesanan;

    END */$$


DELIMITER ;

/* Procedure structure for procedure `ketersediaan_alat` */

/*!50003 DROP PROCEDURE IF EXISTS  `ketersediaan_alat` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ketersediaan_alat`(IN `tgl_mulai_param` DATE, IN `tgl_selesai_param` DATE)
BEGIN
    
	SELECT A.nama AS tipe, count(peralatan.kd_peralatan) as jumlah, B.nama AS merk, C.nama AS kategori
              FROM peralatan
              JOIN tipe as A ON A.kd_tipe = peralatan.kd_tipe
	      JOIN merk AS B ON B.kd_merk = A.kd_merk
	      JOIN kategori AS C ON C.kd_kategori = A.kd_kategori AND peralatan.status = 'on'
            AND peralatan.kd_peralatan
            NOT IN (SELECT a.kd_peralatan	FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)
	            AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai))
	          AND	peralatan.kd_peralatan
            NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
              WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	            AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	         AND peralatan.kd_peralatan
           NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)
	            AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	         AND peralatan.kd_peralatan
           NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	            AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)) group by tipe;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `ketersediaan_alat_kategori` */

/*!50003 DROP PROCEDURE IF EXISTS  `ketersediaan_alat_kategori` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ketersediaan_alat_kategori`(IN `tgl_mulai_param` DATE, IN `tgl_selesai_param` DATE)
BEGIN
	SELECT COUNT(peralatan.kd_peralatan) as jumlah, C.nama AS kategori
              FROM peralatan
              JOIN tipe AS A ON A.kd_tipe = peralatan.kd_tipe
	      JOIN merk AS B ON B.kd_merk = A.kd_merk
	      JOIN kategori AS C ON C.kd_kategori = A.kd_kategori AND peralatan.status = 'on'
            AND peralatan.kd_peralatan
            NOT IN (SELECT a.kd_peralatan	FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)
	            AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai))
	          AND	peralatan.kd_peralatan
            NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
              WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	            AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	         AND peralatan.kd_peralatan
           NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)
	            AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	         AND peralatan.kd_peralatan
           NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	            AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai))GROUP BY kategori;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `ketersediaan_pegawai` */

/*!50003 DROP PROCEDURE IF EXISTS  `ketersediaan_pegawai` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ketersediaan_pegawai`(IN `tgl_mulai_param` DATE, IN `tgl_selesai_param` DATE)
BEGIN
    
	SELECT pegawai.*, jabatan.nama AS jabatan
        FROM pegawai
	JOIN jabatan ON pegawai.kd_jabatan = jabatan.kd_jabatan and pegawai.status = 'on'
	and pegawai.username NOT IN (
	SELECT a.username
	FROM sdm_event AS a, pemesanan_klien AS b
	WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai) 
	AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai))
	
	AND pegawai.username NOT IN (
	SELECT a.username
	FROM sdm_event AS a, pemesanan_klien AS b
	WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	AND date(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	AND pegawai.username NOT IN (
	SELECT a.username
	FROM sdm_event AS a, pemesanan_klien AS b
	WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai) 
	AND dATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	
	AND pegawai.username NOT IN (
	SELECT a.username
	FROM sdm_event AS a, pemesanan_klien AS b
	WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai));
    END */$$
DELIMITER ;

/* Procedure structure for procedure `pilih_peralatan` */

/*!50003 DROP PROCEDURE IF EXISTS  `pilih_peralatan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pilih_peralatan`(IN `tgl_mulai_param` DATE, IN `tgl_selesai_param` DATE, IN `kd_pemesanan_param` VARCHAR(10))
BEGIN
	    (SELECT peralatan.kd_peralatan, A.nama AS tipe, B.nama AS merk, C.nama AS kategori
              FROM peralatan
              JOIN tipe AS A ON A.kd_tipe = peralatan.kd_tipe
	      JOIN merk AS B ON B.kd_merk = A.kd_merk
	      JOIN kategori AS C ON C.kd_kategori = A.kd_kategori AND peralatan.status = 'on'
            AND peralatan.kd_peralatan
            NOT IN (SELECT a.kd_peralatan	FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)
	            AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai))
	          AND	peralatan.kd_peralatan
            NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
              WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	            AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	         AND peralatan.kd_peralatan
           NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)
	            AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	         AND peralatan.kd_peralatan
           NOT IN (SELECT a.kd_peralatan FROM peralatan_event AS a, pemesanan_klien AS b
	            WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
	            AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
	            AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)))
	  union 
	  
	  (SELECT peralatan_event.kd_peralatan, B.nama AS tipe, C.nama AS merk, D.nama AS kategori
              FROM peralatan_event
              JOIN peralatan AS A ON peralatan_event.kd_peralatan = A.kd_peralatan
              JOIN tipe AS B ON A.kd_tipe = B.kd_tipe
	      JOIN merk AS C ON B.kd_merk = C.kd_merk
	      JOIN kategori AS D ON D.kd_kategori = B.kd_kategori AND peralatan_event.kd_pemesanan = kd_pemesanan_param);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `pilih_sdm` */

/*!50003 DROP PROCEDURE IF EXISTS  `pilih_sdm` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pilih_sdm`(IN `tgl_mulai_param` DATE, IN `tgl_selesai_param` DATE, IN `kd_pemesanan_param` VARCHAR(10))
BEGIN
	
	(SELECT pegawai.username, pegawai.status_pegawai
		FROM pegawai 
		WHERE pegawai.status = 'on' 
	
	AND pegawai.username NOT IN (
		SELECT a.username
		FROM sdm_event AS a, pemesanan_klien AS b
		WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
		AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai) 
		AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai))
		
	AND pegawai.username NOT IN (
		SELECT a.username
		FROM sdm_event AS a, pemesanan_klien AS b
		WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
		AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
		AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
		AND pegawai.username NOT IN (
		SELECT a.username
		FROM sdm_event AS a, pemesanan_klien AS b
		WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
		AND tgl_mulai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai) 
		AND DATE(b.tgl_selesai) BETWEEN tgl_mulai_param AND tgl_selesai_param)
	
	AND pegawai.username NOT IN (
		SELECT a.username
		FROM sdm_event AS a, pemesanan_klien AS b
		WHERE a.kd_pemesanan = b.kd_pemesanan AND b.status = 'diproses'
		AND b.tgl_mulai BETWEEN tgl_mulai_param AND tgl_selesai_param
		AND tgl_selesai_param BETWEEN b.tgl_mulai AND DATE(b.tgl_selesai)))
		
	UNION (SELECT a.username, b.status_pegawai
		FROM  sdm_event AS a 
		JOIN pegawai AS b ON a.username = b.username AND a.kd_pemesanan = kd_pemesanan_param);

	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
