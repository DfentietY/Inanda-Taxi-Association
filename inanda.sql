/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.1.30-community : Database - inanda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inanda` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inanda`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `an_username` varchar(25) DEFAULT NULL,
  `an_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

/*Table structure for table `tbl_driver` */

DROP TABLE IF EXISTS `tbl_driver`;

CREATE TABLE `tbl_driver` (
  `dr_idnumber` varchar(13) NOT NULL,
  `dr_surname` varchar(25) DEFAULT NULL,
  `dr_name` varchar(25) DEFAULT NULL,
  `dr_assoc_name` varchar(30) NOT NULL DEFAULT 'INANDA TAXI OWNER ASSOCIATION',
  `dr_app_num` varchar(10) NOT NULL,
  `dr_oper_num` varchar(18) NOT NULL,
  `dr_street` varchar(20) DEFAULT NULL,
  `dr_suburb` varchar(20) DEFAULT NULL,
  `dr_province` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`dr_idnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_driver` */

insert  into `tbl_driver`(`dr_idnumber`,`dr_surname`,`dr_name`,`dr_assoc_name`,`dr_app_num`,`dr_oper_num`,`dr_street`,`dr_suburb`,`dr_province`) values ('5508275658083','Sindane','Sipho Alfred','INANDA TAXI OWNER ASSOCIATION','APP0012874','LGKZN1403000003/2','07 DOUGLAS ROAD','DURBAN NORTH','KWAZULU-NATAL');

/*Table structure for table `tbl_oper_licence` */

DROP TABLE IF EXISTS `tbl_oper_licence`;

CREATE TABLE `tbl_oper_licence` (
  `op_oper_num` varchar(18) NOT NULL,
  `op_cross_border` tinyint(1) DEFAULT '0',
  `op_start_date` date DEFAULT NULL,
  `op_expiry_date` date DEFAULT NULL,
  PRIMARY KEY (`op_oper_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_oper_licence` */

insert  into `tbl_oper_licence`(`op_oper_num`,`op_cross_border`,`op_start_date`,`op_expiry_date`) values ('APP0012874',0,'2014-05-06','2017-08-06');

/*Table structure for table `tbl_taxi` */

DROP TABLE IF EXISTS `tbl_taxi`;

CREATE TABLE `tbl_taxi` (
  `txi_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `txi_reg_num` varchar(10) DEFAULT NULL,
  `txi_gross_mass` int(6) DEFAULT NULL,
  `txi_engine_num` varchar(15) DEFAULT NULL,
  `txi_chasis_num` varchar(20) DEFAULT NULL,
  `txi_manufacturer` varchar(15) DEFAULT NULL,
  `txi_passenger_num` int(2) DEFAULT NULL,
  `txi_description` varchar(100) DEFAULT NULL,
  `txi_year_reg` varchar(4) DEFAULT NULL,
  `dr_idnumber` varchar(13) DEFAULT NULL,
  `own_id` int(5) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`txi_id`),
  KEY `dr_idnumber` (`dr_idnumber`),
  CONSTRAINT `tbl_taxi_ibfk_1` FOREIGN KEY (`dr_idnumber`) REFERENCES `tbl_driver` (`dr_idnumber`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_taxi` */

insert  into `tbl_taxi`(`txi_id`,`txi_reg_num`,`txi_gross_mass`,`txi_engine_num`,`txi_chasis_num`,`txi_manufacturer`,`txi_passenger_num`,`txi_description`,`txi_year_reg`,`dr_idnumber`,`own_id`) values (00001,'ND358732',3390,'2KDA474059','AHTSS22P807006972','TOYOTA',15,'MINIBUS','2014','5508275658083',NULL);

/*Table structure for table `tbl_taxiowner` */

DROP TABLE IF EXISTS `tbl_taxiowner`;

CREATE TABLE `tbl_taxiowner` (
  `own_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `own_name` varchar(25) DEFAULT NULL,
  `own_surname` varchar(25) DEFAULT NULL,
  `own_username` varchar(25) DEFAULT NULL,
  `own_password` varchar(25) DEFAULT NULL,
  `own_street` varchar(25) DEFAULT NULL,
  `own_suburb` varchar(25) DEFAULT NULL,
  `own_province` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`own_id`),
  CONSTRAINT `tbl_taxiowner_ibfk_1` FOREIGN KEY (`own_id`) REFERENCES `tbl_taxi` (`txi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_taxiowner` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
