/*
SQLyog Community v12.2.6 (64 bit)
MySQL - 10.1.25-MariaDB : Database - eko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eko` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `eko`;

/*Table structure for table `detail_aset` */

DROP TABLE IF EXISTS `detail_aset`;

CREATE TABLE `detail_aset` (
  `da_id` int(11) NOT NULL AUTO_INCREMENT,
  `da_aset` int(11) DEFAULT NULL,
  `da_nama` varchar(300) DEFAULT NULL,
  `da_ket` text,
  `da_harga` int(11) DEFAULT NULL,
  `da_foto` text,
  `da_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`da_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `detail_aset` */

insert  into `detail_aset`(`da_id`,`da_aset`,`da_nama`,`da_ket`,`da_harga`,`da_foto`,`da_status`) values 
(1,1,'Lapangan 2','ini adalah langganan mas mas ',20000,NULL,1),
(2,1,'tenis','wkwwk',50000,NULL,1),
(3,1,'Omah Kayu','heheh sangar mas ',200000,NULL,1),
(4,4,'lapangan tenis ',NULL,NULL,NULL,1);

/*Table structure for table `history_login` */

DROP TABLE IF EXISTS `history_login`;

CREATE TABLE `history_login` (
  `his_id` int(11) NOT NULL AUTO_INCREMENT,
  `his_login` int(11) DEFAULT NULL,
  `his_ip` varchar(20) DEFAULT NULL,
  `his_masuk` datetime DEFAULT NULL,
  `his_keluar` datetime DEFAULT NULL,
  `his_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`his_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `history_login` */

insert  into `history_login`(`his_id`,`his_login`,`his_ip`,`his_masuk`,`his_keluar`,`his_status`) values 
(1,1,'','2018-12-15 06:19:00',NULL,1),
(2,1,'','2018-12-15 06:20:00',NULL,1),
(3,1,'','2018-12-15 06:25:00',NULL,1),
(4,1,'','2018-12-15 06:28:00',NULL,1),
(5,1,'','2018-12-15 12:56:00',NULL,1),
(6,1,'','2018-12-15 10:09:00',NULL,1),
(7,1,'','2018-12-16 02:53:00',NULL,1),
(8,1,'','2018-12-16 05:42:00',NULL,1);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_username` varchar(200) DEFAULT NULL,
  `log_password` varchar(200) DEFAULT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_daftar` datetime DEFAULT NULL,
  `log_lastlogin` datetime DEFAULT NULL,
  `log_ip` varchar(20) DEFAULT NULL,
  `log_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`log_id`,`log_username`,`log_password`,`log_user`,`log_daftar`,`log_lastlogin`,`log_ip`,`log_status`) values 
(1,'eko','28b662d883b6d76fd96e4ddc5e9ba780',1,NULL,'2018-12-16 05:42:00',NULL,1);

/*Table structure for table `m_aset` */

DROP TABLE IF EXISTS `m_aset`;

CREATE TABLE `m_aset` (
  `aset_id` int(11) NOT NULL AUTO_INCREMENT,
  `aset_nama` varchar(300) DEFAULT NULL,
  `aset_alamat` text,
  `aset_desa` varchar(200) DEFAULT NULL,
  `aset_user` int(11) DEFAULT NULL,
  `aset_jenis` int(11) DEFAULT NULL,
  `aset_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`aset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `m_aset` */

insert  into `m_aset`(`aset_id`,`aset_nama`,`aset_alamat`,`aset_desa`,`aset_user`,`aset_jenis`,`aset_status`) values 
(1,'Lapangan 1','jalan brawijaya mas ','Malang',1,1,1),
(3,'nama aset','alamat aset','desa aset',1,2,2),
(4,'lapangan tenis ','kepet','desa',1,2,1);

/*Table structure for table `m_jenis` */

DROP TABLE IF EXISTS `m_jenis`;

CREATE TABLE `m_jenis` (
  `jns_id` int(11) NOT NULL AUTO_INCREMENT,
  `jns_nama` varchar(300) DEFAULT NULL,
  `jns_ket` text,
  `jns_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`jns_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_jenis` */

insert  into `m_jenis`(`jns_id`,`jns_nama`,`jns_ket`,`jns_status`) values 
(1,'Lapangan Futsal','ini adalah fasilitas lapangan futsal',1),
(2,'Gedung','ini fasilitas Gedung',1);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_da` int(11) DEFAULT NULL,
  `tran_hari` date DEFAULT NULL,
  `tran_jam` int(11) DEFAULT NULL,
  `tran_pesan` datetime DEFAULT NULL,
  `tran_nama` varchar(300) DEFAULT NULL,
  `tran_org` varchar(300) DEFAULT NULL,
  `tran_hp` varchar(15) DEFAULT NULL,
  `tran_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`tran_id`,`tran_da`,`tran_hari`,`tran_jam`,`tran_pesan`,`tran_nama`,`tran_org`,`tran_hp`,`tran_status`) values 
(1,1,'2018-12-18',12,'2018-12-19 12:09:05','Kipli','Sayur Kol','0812345678',1),
(2,2,'2018-12-20',20,NULL,'pemesan','barcelona','08123456789',NULL),
(3,3,'2018-12-20',15,NULL,'kept','asjhd','asdjkh',NULL),
(4,3,'2018-12-20',17,NULL,'asfdsgd','sadsdf','sadsf',NULL),
(5,3,'2018-12-25',9,NULL,'sapi','sapi','sapi',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(300) DEFAULT NULL,
  `user_alamat` text NOT NULL,
  `user_tlp` int(11) DEFAULT NULL,
  `user_kec` int(11) DEFAULT NULL,
  `user_kab` int(11) DEFAULT NULL,
  `user_foto` varchar(50) DEFAULT 'default.jpg',
  `user_status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`user_nama`,`user_alamat`,`user_tlp`,`user_kec`,`user_kab`,`user_foto`,`user_status`) values 
(1,'sapiteng','malang',NULL,NULL,NULL,'default.jpg',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
