-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: university
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allowance`
--

DROP TABLE IF EXISTS `allowance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allowance` (
  `Allowance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Code` int(11) DEFAULT NULL,
  `Basic_Pay` decimal(9,2) DEFAULT '0.00',
  `Fixed_Pay` decimal(9,2) DEFAULT '0.00',
  `Personal_Pay` decimal(9,2) DEFAULT '0.00',
  `Hreant1_All` decimal(9,2) DEFAULT '0.00',
  `Hrent_Sub_All` decimal(9,2) DEFAULT '0.00',
  `Convence_All` decimal(9,2) DEFAULT '0.00',
  `Adhoc_Rel_2010` decimal(9,2) DEFAULT '0.00',
  `Computer_All` decimal(9,2) DEFAULT '0.00',
  `Private_All` decimal(9,2) DEFAULT '0.00',
  `Extra_All` decimal(9,2) DEFAULT '0.00',
  `Senior_p_All` decimal(9,2) DEFAULT '0.00',
  `Med_All` decimal(9,2) DEFAULT '0.00',
  `ENT_All` decimal(9,2) DEFAULT '0.00',
  `Dean_All` decimal(9,2) DEFAULT '0.00',
  `intgrated_All` decimal(9,2) DEFAULT '0.00',
  `Spec_Add_All` decimal(9,2) DEFAULT '0.00',
  `Teach_All` decimal(7,2) DEFAULT '0.00',
  `Orderly_All` decimal(7,2) DEFAULT '0.00',
  `Oth_All` decimal(9,2) DEFAULT '0.00',
  `Brain_Drain` decimal(9,2) DEFAULT '0.00',
  `ARA_2016_10PERCENT` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`Allowance_ID`),
  UNIQUE KEY `Allowance_ID` (`Allowance_ID`),
  UNIQUE KEY `Employee_Code` (`Employee_Code`),
  KEY `EMP_FPK_ALLOWANCE_idx` (`Employee_Code`),
  CONSTRAINT `EMP_FPK_ALLOWANCE` FOREIGN KEY (`Employee_Code`) REFERENCES `employee` (`Employee_Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allowance`
--

LOCK TABLES `allowance` WRITE;
/*!40000 ALTER TABLE `allowance` DISABLE KEYS */;
INSERT INTO `allowance` VALUES (13,1,1.00,2.00,3.00,4.00,5.00,6.00,7.00,8.00,9.00,10.00,11.00,12.00,13.00,14.00,15.00,16.00,17.00,18.00,19.00,20.00,21.00),(14,2,8040.00,0.00,13565.00,0.00,1413.00,1785.00,0.00,0.00,0.00,0.00,0.00,2814.00,0.00,0.00,300.00,0.00,0.00,0.00,0.00,3216.00,0.00),(15,3,15880.00,0.00,33800.00,0.00,2727.00,5000.00,0.00,0.00,0.00,0.00,0.00,2779.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,6352.00,0.00),(16,4,4000.00,0.00,83660.00,0.00,10505.00,5000.00,11673.00,10000.00,0.00,0.00,1250.00,4160.00,600.00,0.00,0.00,0.00,700.00,12000.00,0.00,22964.00,0.00),(17,5,57410.00,0.00,83660.00,0.00,10505.00,5000.00,11673.00,0.00,0.00,0.00,1250.00,4160.00,600.00,0.00,0.00,0.00,700.00,12000.00,0.00,0.00,0.00),(27,6,0.00,40000.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(28,7,0.00,12000.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(29,8,11930.00,0.00,11930.00,0.00,2090.00,2856.00,0.00,0.00,0.00,0.00,0.00,2087.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(30,9,0.00,50000.00,0.00,0.00,0.00,0.00,0.00,2500.00,0.00,0.00,0.00,2000.00,0.00,0.00,300.00,0.00,0.00,0.00,0.00,0.00,0.00),(31,10,11930.00,0.00,11930.00,0.00,2090.00,2856.00,0.00,0.00,0.00,0.00,0.00,2087.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1193.00),(32,11,11930.00,232333.00,11930.00,0.00,2090.00,2856.00,0.00,2500.00,0.00,0.00,0.00,2087.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1193.00),(33,12,11930.00,232333.00,11930.00,0.00,2090.00,2856.00,0.00,2500.00,0.00,0.00,0.00,2087.75,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1193.00),(34,13,13510.00,0.00,13510.00,0.00,2349.00,2856.00,0.00,2500.00,0.00,0.00,0.00,2364.25,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1351.00),(35,14,13510.00,0.00,13510.00,0.00,1566.00,2856.00,0.00,2500.00,0.00,0.00,0.00,2364.25,0.00,0.00,300.00,0.00,0.00,0.00,0.00,0.00,1351.00),(36,15,25440.00,0.00,25440.00,0.00,4433.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2544.00),(37,16,25440.00,0.00,25440.00,0.00,4433.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,2544.00),(38,17,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(39,18,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(40,19,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(41,20,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(42,21,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(43,22,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(44,23,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(45,24,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(46,25,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(47,26,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(48,27,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(49,28,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(50,29,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(51,30,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(52,31,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(53,32,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(54,33,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(55,34,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(56,35,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(57,36,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(58,37,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00),(59,38,31890.00,0.00,31890.00,0.00,5810.00,5000.00,0.00,2500.00,0.00,0.00,0.00,4160.00,0.00,0.00,0.00,0.00,500.00,0.00,0.00,0.00,3189.00);
/*!40000 ALTER TABLE `allowance` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `university`.`allowance_AFTER_INSERT` AFTER INSERT ON `allowance` FOR EACH ROW
BEGIN
declare Total decimal(11,2) ;
declare id int ;

set id = new.Employee_Code ;
set Total = NEW.Basic_Pay + NEW.Fixed_Pay + NEW.Personal_Pay + NEW.Hreant1_All + NEW.Hrent_Sub_All + NEW.Convence_All + NEW.Adhoc_Rel_2010 + NEW.Computer_All + NEW.Private_All + NEW.Extra_All + NEW.Senior_p_All + NEW.Med_All + NEW.ENT_All + NEW.Dean_All + NEW.intgrated_All + NEW.Spec_Add_All + NEW.Teach_All + NEW.Orderly_All + NEW.Oth_All + NEW.Brain_Drain + NEW.ARA_2016_10PERCENT;

/*
Check if employee not exist already then insert otherwise update Gross_Pay
 
SELECT 1 FROM MyTable WHERE... LIMIT 1
use select 1 to to prevent the checking of unnecessary fields.
uss LIMIT 1 to prevent the checking of unnecessary rows.
*/
IF NOT EXISTS ( SELECT 1 FROM netsalary WHERE Employee_Code = id LIMIT 1)
THEN
    insert into netsalary (Employee_Code , Gross_Pay) values (id , Total) ;
ELSE
	update netsalary set Gross_Pay = Total where Employee_Code = id ;
END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `university`.`allowance_AFTER_UPDATE` AFTER UPDATE ON `allowance` FOR EACH ROW
BEGIN
declare Total decimal(11,2) ;
declare id int ;

select old.Employee_Code into id ;
set Total = NEW.Basic_Pay + NEW.Fixed_Pay + NEW.Personal_Pay + NEW.Hreant1_All + NEW.Hrent_Sub_All + NEW.Convence_All + NEW.Adhoc_Rel_2010 + NEW.Computer_All + NEW.Private_All + NEW.Extra_All + NEW.Senior_p_All + NEW.Med_All + NEW.ENT_All + NEW.Dean_All + NEW.intgrated_All + NEW.Spec_Add_All + NEW.Teach_All + NEW.Orderly_All + NEW.Oth_All + NEW.Brain_Drain + NEW.ARA_2016_10PERCENT;

update netsalary set Gross_Pay = Total where Employee_Code = id ;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `allownces_history`
--

DROP TABLE IF EXISTS `allownces_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allownces_history` (
  `allownces_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Code` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Basic_Pay` decimal(9,2) DEFAULT '0.00',
  `Fixed_Pay` decimal(9,2) DEFAULT '0.00',
  `Personal_Pay` decimal(9,2) DEFAULT '0.00',
  `Hreant1_All` decimal(9,2) DEFAULT '0.00',
  `Hrent_Sub_All` decimal(9,2) DEFAULT '0.00',
  `Convence_All` decimal(9,2) DEFAULT '0.00',
  `Adhoc_Rel_2010` decimal(9,2) DEFAULT '0.00',
  `Computer_All` decimal(9,2) DEFAULT '0.00',
  `Private_All` decimal(9,2) DEFAULT '0.00',
  `Extra_All` decimal(9,2) DEFAULT '0.00',
  `Senior_p_All` decimal(9,2) DEFAULT '0.00',
  `Med_All` decimal(9,2) DEFAULT '0.00',
  `ENT_All` decimal(9,2) DEFAULT '0.00',
  `Dean_All` decimal(9,2) DEFAULT '0.00',
  `intgrated_All` decimal(9,2) DEFAULT '0.00',
  `Spec_Add_All` decimal(9,2) DEFAULT '0.00',
  `Teach_All` decimal(9,2) DEFAULT '0.00',
  `Orderly_All` decimal(9,2) DEFAULT '0.00',
  `Oth_All` decimal(9,2) DEFAULT '0.00',
  `Brain_Drain` decimal(9,2) DEFAULT '0.00',
  `ARA_2016_10PERCENT` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`allownces_history_id`),
  UNIQUE KEY `allownces_history_id` (`allownces_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allownces_history`
--

LOCK TABLES `allownces_history` WRITE;
/*!40000 ALTER TABLE `allownces_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `allownces_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campus` (
  `Campus_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Campus` varchar(15) NOT NULL,
  PRIMARY KEY (`Campus_ID`),
  UNIQUE KEY `Campus_ID` (`Campus_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campus`
--

LOCK TABLES `campus` WRITE;
/*!40000 ALTER TABLE `campus` DISABLE KEYS */;
INSERT INTO `campus` VALUES (1,'Main'),(2,'Abottabad'),(3,'Bannu'),(4,'Jalozai'),(5,'Kohat'),(6,'Mardan');
/*!40000 ALTER TABLE `campus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deduction`
--

DROP TABLE IF EXISTS `deduction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deduction` (
  `Deduction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Code` int(11) DEFAULT NULL,
  `House_Rent_1` decimal(7,2) DEFAULT '0.00',
  `House_Rent_2` decimal(7,2) DEFAULT '0.00',
  `Electric_Charges_1` decimal(7,2) DEFAULT '0.00',
  `Electric_Charges_2` decimal(7,2) DEFAULT '0.00',
  `SuiGas_Charges` decimal(7,2) DEFAULT '0.00',
  `Water_Tax1_Charges` decimal(7,2) DEFAULT '0.00',
  `Water_Tax2_Charges` decimal(7,2) DEFAULT '0.00',
  `Endovement_Fund` decimal(7,2) DEFAULT '0.00',
  `B_Fund` decimal(7,2) DEFAULT '0.00',
  `House_Build_Loan` decimal(7,2) DEFAULT '0.00',
  `Convence_Loan` decimal(7,2) DEFAULT '0.00',
  `GP_Fund_Regular` decimal(7,2) DEFAULT '0.00',
  `GP_Fund_Advence` decimal(7,2) DEFAULT '0.00',
  `Eid_Advance` decimal(7,2) DEFAULT '0.00',
  `Union_Fund_1` decimal(7,2) DEFAULT '0.00',
  `Union_Fund_2` decimal(7,2) DEFAULT '0.00',
  `Vehicle_Charges_Other` decimal(7,2) DEFAULT '0.00',
  `Vehicle_Charges_Teacher` decimal(7,2) DEFAULT '0.00',
  `Upkeep_Ded` decimal(7,2) DEFAULT '0.00',
  `R_Leave_Without_Pay` decimal(7,2) DEFAULT '0.00',
  `Recovery_Gap_CA` decimal(7,2) DEFAULT '0.00',
  `Income_Tax` decimal(7,2) DEFAULT '0.00',
  `Group_Insurance` decimal(7,2) DEFAULT '0.00',
  `Other` decimal(7,2) DEFAULT '0.00',
  PRIMARY KEY (`Deduction_ID`),
  UNIQUE KEY `Deduction_ID` (`Deduction_ID`),
  UNIQUE KEY `Employee_Code` (`Employee_Code`),
  KEY `EMP_FPK_DEDUCTION_idx` (`Employee_Code`),
  CONSTRAINT `EMP_FPK_DEDUCTION` FOREIGN KEY (`Employee_Code`) REFERENCES `employee` (`Employee_Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deduction`
--

LOCK TABLES `deduction` WRITE;
/*!40000 ALTER TABLE `deduction` DISABLE KEYS */;
INSERT INTO `deduction` VALUES (12,1,21.00,22.00,23.00,24.00,25.00,26.00,27.00,28.00,29.00,30.00,31.00,32.00,33.00,34.00,35.00,36.00,37.00,38.00,39.00,40.00,41.00,42.00,43.00,44.00),(13,2,0.00,1080.25,0.00,0.00,0.00,0.00,0.00,0.00,15.00,0.00,0.00,522.00,0.00,0.00,0.00,25.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(14,3,0.00,2484.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,2275.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(15,4,0.00,7053.50,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,5444.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(16,5,0.00,7053.50,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,5444.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(26,6,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(27,7,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(28,8,0.00,1193.00,0.00,0.00,0.00,0.00,0.00,0.00,20.00,0.00,0.00,1634.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(29,9,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,0.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(30,10,1193.00,1193.00,0.00,0.00,0.00,0.00,0.00,0.00,20.00,0.00,0.00,1634.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(31,11,1193.00,1193.00,0.00,0.00,0.00,0.00,0.00,0.00,20.00,0.00,0.00,1634.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(32,12,1193.00,1193.00,0.00,0.00,0.00,0.00,0.00,0.00,20.00,0.00,0.00,1634.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(33,13,1351.00,1351.00,0.00,0.00,0.00,0.00,0.00,0.00,20.00,0.00,0.00,1965.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(34,14,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,20.00,0.00,0.00,1965.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(35,15,2544.00,2544.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,2898.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(36,16,2544.00,2544.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,2898.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(37,17,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(38,18,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(39,19,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(40,20,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(41,21,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(42,22,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(43,23,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(44,24,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(45,25,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(46,26,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(47,27,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(48,28,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(49,29,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(50,30,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(51,31,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(52,32,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(53,33,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(54,34,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(55,35,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(56,36,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(57,37,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00),(58,38,3189.00,3189.00,0.00,0.00,0.00,0.00,0.00,0.00,55.00,0.00,0.00,3635.00,0.00,0.00,200.00,0.00,0.00,0.00,50.00,0.00,0.00,0.00,0.00,0.00);
/*!40000 ALTER TABLE `deduction` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `university`.`deduction_AFTER_INSERT` AFTER INSERT ON `deduction` FOR EACH ROW
BEGIN
declare Total decimal(11,2) ;
declare id int ;

set id = new.Employee_Code ;
set Total = NEW.House_Rent_1 + NEW.House_Rent_2 + NEW.Electric_Charges_1 + NEW.Electric_Charges_2 + NEW.SuiGas_Charges + NEW.Water_Tax1_Charges + NEW.Water_Tax2_Charges + NEW.Endovement_Fund + NEW.B_Fund + NEW.House_Build_Loan + NEW.Convence_Loan + NEW.GP_Fund_Regular + NEW.GP_Fund_Advence + NEW.Eid_Advance + NEW.Union_Fund_1 + NEW.Union_Fund_2 + NEW.Vehicle_Charges_Other + NEW.Vehicle_Charges_Teacher+ NEW.Upkeep_Ded + NEW.R_Leave_Without_Pay + NEW.Recovery_Gap_CA + NEW.Income_Tax + NEW.Group_Insurance + NEW.Other ;

/*
Check if employee not exist already then insert otherwise update totalDeduction
 
SELECT 1 FROM MyTable WHERE... LIMIT 1
use select 1 to to prevent the checking of unnecessary fields.
uss LIMIT 1 to prevent the checking of unnecessary rows.
*/

IF NOT EXISTS ( SELECT 1 FROM netsalary WHERE Employee_Code = id LIMIT 1)
THEN
    insert into netsalary (Employee_Code , totalDeduction) values (id , Total) ;
ELSE
	update netsalary set totalDeduction = Total where Employee_Code = id ;
END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `university`.`deduction_AFTER_UPDATE` AFTER UPDATE ON `deduction` FOR EACH ROW
BEGIN

declare Total decimal(11,2) ;
declare id int ;

select old.Employee_Code into id ;
set Total = NEW.House_Rent_1 + NEW.House_Rent_2 + NEW.Electric_Charges_1 + NEW.Electric_Charges_2 + NEW.SuiGas_Charges + NEW.Water_Tax1_Charges + NEW.Water_Tax2_Charges + NEW.Endovement_Fund + NEW.B_Fund + NEW.House_Build_Loan + NEW.Convence_Loan + NEW.GP_Fund_Regular + NEW.GP_Fund_Advence + NEW.Eid_Advance + NEW.Union_Fund_1 + NEW.Union_Fund_2 + NEW.Vehicle_Charges_Other + NEW.Vehicle_Charges_Teacher+ NEW.Upkeep_Ded + NEW.R_Leave_Without_Pay + NEW.Recovery_Gap_CA + NEW.Income_Tax + NEW.Group_Insurance + NEW.Other ;
update netsalary set totalDeduction = Total where Employee_Code = id ;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `deduction_history`
--

DROP TABLE IF EXISTS `deduction_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deduction_history` (
  `deduction_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Code` int(11) NOT NULL,
  `Date` date NOT NULL,
  `House_Rent_1` decimal(9,2) DEFAULT '0.00',
  `House_Rent_2` decimal(9,2) DEFAULT '0.00',
  `Electric_Charges_1` decimal(9,2) DEFAULT '0.00',
  `Electric_Charges_2` decimal(9,2) DEFAULT '0.00',
  `SuiGas_Charges` decimal(9,2) DEFAULT '0.00',
  `Water_Tax1_Charges` decimal(9,2) DEFAULT '0.00',
  `Water_Tax2_Charges` decimal(9,2) DEFAULT '0.00',
  `Endovement_Fund` decimal(9,2) DEFAULT '0.00',
  `B_Fund` decimal(9,2) DEFAULT '0.00',
  `House_Build_Loan` decimal(9,2) DEFAULT '0.00',
  `Convence_Loan` decimal(9,2) DEFAULT '0.00',
  `GP_Fund_Regular` decimal(9,2) DEFAULT '0.00',
  `GP_Fund_Advence` decimal(9,2) DEFAULT '0.00',
  `Eid_Advance` decimal(9,2) DEFAULT '0.00',
  `Union_Fund_1` decimal(9,2) DEFAULT '0.00',
  `Union_Fund_2` decimal(9,2) DEFAULT '0.00',
  `Vehicle_Charges_Other` decimal(9,2) DEFAULT '0.00',
  `Vehicle_Charges_Teacher` decimal(9,2) DEFAULT '0.00',
  `Upkeep_Ded` decimal(9,2) DEFAULT '0.00',
  `R_Leave_Without_Pay` decimal(9,2) DEFAULT '0.00',
  `Recovery_Gap_CA` decimal(9,2) DEFAULT '0.00',
  `Income_Tax` decimal(9,2) DEFAULT '0.00',
  `Group_Insurance` decimal(9,2) DEFAULT '0.00',
  `Other` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`deduction_history_id`),
  UNIQUE KEY `deduction_history_id` (`deduction_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deduction_history`
--

LOCK TABLES `deduction_history` WRITE;
/*!40000 ALTER TABLE `deduction_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `deduction_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Department_ID`),
  UNIQUE KEY `Department_Name` (`Department_Name`),
  UNIQUE KEY `Department_ID` (`Department_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Agricultural Engineering'),(2,'Basic Sciences & Islamiyat'),(5,'Chemical Engineering'),(6,'Civil Engineering'),(3,'Computer Sciences & Information Technology'),(4,'Computer System Engineering'),(7,'Electrical Engineering'),(8,'Industrial Engineering'),(9,'Mechanical Engineering'),(10,'Mechatronics Engineering'),(11,'Mining Engineering'),(12,'Software Engineering');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designation` (
  `Designation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(25) NOT NULL,
  PRIMARY KEY (`Designation_ID`),
  UNIQUE KEY `Designation` (`Designation`),
  UNIQUE KEY `Designation_ID` (`Designation_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` VALUES (4,'Assistant Professor'),(1,'Associate Professor'),(3,'Chairman'),(7,'Driver'),(6,'Lab Engineer'),(5,'Lecturer'),(2,'Professor');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `Employee_Code` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Name` varchar(30) NOT NULL,
  `Father_Name` varchar(30) NOT NULL,
  `BPS` tinyint(4) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `NTN` varchar(50) DEFAULT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `Fix` varchar(1) NOT NULL,
  `Staff` varchar(1) NOT NULL,
  `Admin_Position` varchar(15) NOT NULL,
  `House` tinyint(1) NOT NULL,
  `vehicle` tinyint(1) NOT NULL,
  `Marital_Status` tinyint(1) NOT NULL,
  `Join_Date` date NOT NULL,
  `Monthly_Salary_Generate` tinyint(1) NOT NULL DEFAULT '0',
  `Department_ID` int(11) NOT NULL,
  `Qualification_ID` int(11) NOT NULL,
  `Designation_ID` int(11) NOT NULL,
  `Campus_ID` int(11) NOT NULL,
  PRIMARY KEY (`Employee_Code`),
  UNIQUE KEY `Employee_Code` (`Employee_Code`),
  KEY `Department_ID_FPK_idx` (`Department_ID`),
  KEY `Qualification_ID_FPK_idx` (`Qualification_ID`),
  KEY `Designation_ID_FPK_idx` (`Designation_ID`),
  KEY `Campus_ID_FPK_idx` (`Campus_ID`),
  KEY `Department_ID` (`Department_ID`),
  KEY `Qualification_ID` (`Qualification_ID`),
  KEY `Designation_ID` (`Designation_ID`),
  KEY `BPS` (`BPS`),
  KEY `Campus_ID` (`Campus_ID`),
  CONSTRAINT `EMP_FPK_BPS` FOREIGN KEY (`BPS`) REFERENCES `scale` (`BPS`),
  CONSTRAINT `EMP_FPK_Campus_ID` FOREIGN KEY (`Campus_ID`) REFERENCES `campus` (`Campus_ID`),
  CONSTRAINT `EMP_FPK_Department_ID` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`),
  CONSTRAINT `EMP_FPK_Designation_ID` FOREIGN KEY (`Designation_ID`) REFERENCES `designation` (`Designation_ID`),
  CONSTRAINT `EMP_FPK_Qualification_ID` FOREIGN KEY (`Qualification_ID`) REFERENCES `qualification` (`Qualification_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Alam','Khan',17,'1234512345123','Buner','','1333','R','T','None',0,0,0,'2015-09-01',1,5,2,4,2),(2,'Habib','Ali',3,'1010101010101','Peshawar','123123','101025','R','N','Dean',0,1,1,'2000-01-02',1,5,0,4,1),(3,'Azaz','Ali',16,'1510126907987','Buner','3216','1452036985412','R','N','Chairman',1,0,0,'2003-02-03',1,5,0,4,1),(4,'Raja','Khan',20,'1234567891234','Peshawar','10100','1659874523652','R','T','Dean',1,0,0,'2010-01-01',1,5,3,4,1),(5,'Sulaimans','khan',20,'1234567899877','Peshawar','123','120','F','T','Dean',1,0,0,'2010-01-01',1,1,1,4,1),(6,'Khan','Khan',12,'1231212133234','Nothing','','','N','T','None',1,0,0,'2009-09-29',1,5,1,4,1),(7,'Alam','Khan',10,'2332223232222','Nothing','','','N','N','None',1,0,1,'2017-05-15',1,5,0,1,2),(8,'Khan','Khan',13,'2332223232565','Nothing','','1233256','R','N','Dean',1,0,0,'2017-05-15',1,5,0,4,1),(9,'Snail','Khan',0,'1010101010175','KPK','','','N','T','None',1,0,1,'2017-05-16',1,5,2,4,1),(10,'Khan','Khan',13,'1231212132323','Nothing','','133333','R','N','None',1,1,0,'2017-05-19',1,5,0,5,1),(11,'Khan','Khan',13,'1231212132323','Nothing','','133333','N','T','None',1,1,0,'2017-05-19',1,5,2,5,1),(12,'ddfdf','Khan',13,'1231212132323','Nothing','','133333','F','T','None',1,1,0,'2017-05-19',1,5,2,5,1),(13,'ddfdf','Khan',15,'1231212132323','Nothing','','13333333','R','T','None',1,1,0,'2017-05-19',1,5,2,6,1),(14,'ddfdf','Khan',15,'1231212132323','Nothing','','1333333332','F','T','Chairman',1,1,0,'2017-05-19',1,5,2,7,2),(15,'ddfdf','Khan',17,'1231212132323','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',1,5,2,3,1),(16,'ddfdf','Khan',17,'3234342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',1,5,2,1,1),(17,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',1,5,2,4,1),(18,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',1,5,2,4,1),(19,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',1,5,2,4,1),(20,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',1,5,2,4,1),(21,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(22,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(23,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(24,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(25,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(26,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(27,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(28,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(29,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(30,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(31,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(32,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(33,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(34,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(35,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(36,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(37,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1),(38,'ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19',0,5,2,4,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_history`
--

DROP TABLE IF EXISTS `employee_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_history` (
  `Employee_Code` int(11) NOT NULL,
  `DeleteDate` date NOT NULL,
  `Employee_Name` varchar(30) NOT NULL,
  `Father_Name` varchar(30) NOT NULL,
  `BPS` tinyint(4) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `NTN` varchar(50) DEFAULT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `Fix` varchar(1) NOT NULL,
  `Staff` varchar(1) NOT NULL,
  `Admin_Position` varchar(15) NOT NULL,
  `House` tinyint(1) NOT NULL,
  `vehicle` tinyint(1) NOT NULL,
  `Marital_Status` tinyint(1) NOT NULL,
  `Join_Date` date NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Qualification` varchar(10) NOT NULL,
  `Designation` varchar(25) NOT NULL,
  `Campus` varchar(15) NOT NULL,
  PRIMARY KEY (`Employee_Code`,`DeleteDate`),
  UNIQUE KEY `Employee_Code` (`Employee_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_history`
--

LOCK TABLES `employee_history` WRITE;
/*!40000 ALTER TABLE `employee_history` DISABLE KEYS */;
INSERT INTO `employee_history` VALUES (21,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(22,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(23,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(24,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(25,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(26,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(27,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(28,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(29,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(30,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(31,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(32,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(33,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(34,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(35,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(36,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(37,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main'),(38,'2017-05-20','ddfdf','Khan',18,'2342342342342','Nothing','','233332','R','T','Chairman',1,1,0,'2017-05-19','Chemical Engineering','MS','Assistant Professor','Main');
/*!40000 ALTER TABLE `employee_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `netsalary`
--

DROP TABLE IF EXISTS `netsalary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `netsalary` (
  `Employee_Code` int(11) NOT NULL,
  `Gross_Pay` decimal(11,2) DEFAULT '0.00',
  `totalDeduction` decimal(11,2) DEFAULT '0.00',
  `Net_Salary` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`Employee_Code`),
  UNIQUE KEY `Employee_Code` (`Employee_Code`),
  CONSTRAINT `EMP_FPK_NETSALARY` FOREIGN KEY (`Employee_Code`) REFERENCES `employee` (`Employee_Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `netsalary`
--

LOCK TABLES `netsalary` WRITE;
/*!40000 ALTER TABLE `netsalary` DISABLE KEYS */;
INSERT INTO `netsalary` VALUES (1,231.00,780.00,0.00),(2,31133.00,1642.25,0.00),(3,66538.00,5064.00,0.00),(4,166512.00,12802.50,0.00),(5,186958.00,12802.50,0.00),(6,40000.00,0.00,0.00),(7,12000.00,0.00,0.00),(8,30893.75,2897.00,0.00),(9,54800.00,305.00,0.00),(10,32086.75,4090.00,0.00),(11,266919.75,4290.00,0.00),(12,266919.75,4290.00,0.00),(13,38440.25,4937.00,0.00),(14,37957.25,2235.00,0.00),(15,69517.00,8291.00,0.00),(16,69517.00,8291.00,0.00),(17,84939.00,10318.00,0.00),(18,84939.00,10318.00,0.00),(19,84939.00,10318.00,0.00),(20,84939.00,10318.00,0.00),(21,84939.00,10318.00,0.00),(22,84939.00,10318.00,0.00),(23,84939.00,10318.00,0.00),(24,84939.00,10318.00,0.00),(25,84939.00,10318.00,0.00),(26,84939.00,10318.00,0.00),(27,84939.00,10318.00,0.00),(28,84939.00,10318.00,0.00),(29,84939.00,10318.00,0.00),(30,84939.00,10318.00,0.00),(31,84939.00,10318.00,0.00),(32,84939.00,10318.00,0.00),(33,84939.00,10318.00,0.00),(34,84939.00,10318.00,0.00),(35,84939.00,10318.00,0.00),(36,84939.00,10318.00,0.00),(37,84939.00,10318.00,0.00),(38,84939.00,10318.00,0.00);
/*!40000 ALTER TABLE `netsalary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `netsalary_history`
--

DROP TABLE IF EXISTS `netsalary_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `netsalary_history` (
  `Employee_Code` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Gross_Pay` decimal(11,2) DEFAULT '0.00',
  `totalDeduction` decimal(11,2) DEFAULT '0.00',
  `Net_Salary` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`Employee_Code`,`Date`),
  UNIQUE KEY `Employee_Code` (`Employee_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `netsalary_history`
--

LOCK TABLES `netsalary_history` WRITE;
/*!40000 ALTER TABLE `netsalary_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `netsalary_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification` (
  `Qualification_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Qualification` varchar(10) NOT NULL,
  `Computer_Allownces` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`Qualification_ID`),
  UNIQUE KEY `Qualification` (`Qualification`),
  UNIQUE KEY `Qualification_ID` (`Qualification_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualification`
--

LOCK TABLES `qualification` WRITE;
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;
INSERT INTO `qualification` VALUES (0,'None',0.00),(1,'BS',0.00),(2,'MS',2500.00),(3,'Phd',10000.00);
/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scale`
--

DROP TABLE IF EXISTS `scale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scale` (
  `BPS` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Basic_Pay_MIN` decimal(9,2) DEFAULT '0.00',
  `INCR` decimal(9,2) DEFAULT '0.00',
  `Basic_Pay_MAX` decimal(9,2) DEFAULT '0.00',
  `Convence_All` decimal(9,2) DEFAULT '0.00',
  `House_Rent_Main` decimal(7,2) DEFAULT '0.00',
  `House_Rent_Remote` decimal(7,2) DEFAULT '0.00',
  `Senior_p_All` decimal(7,2) DEFAULT '0.00',
  `ENT_All` decimal(7,2) DEFAULT '0.00',
  `Teach_All` decimal(7,2) DEFAULT '0.00',
  `Orderly_All` decimal(7,2) DEFAULT '0.00',
  `Spec_Add_All` decimal(9,2) DEFAULT '0.00',
  `GP_Fund_Regular` decimal(9,2) DEFAULT '0.00',
  `Adhoc_Rel_2010` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`BPS`),
  UNIQUE KEY `BPS` (`BPS`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scale`
--

LOCK TABLES `scale` WRITE;
/*!40000 ALTER TABLE `scale` DISABLE KEYS */;
INSERT INTO `scale` VALUES (0,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(1,7640.00,240.00,14840.00,1785.00,1337.00,891.00,0.00,0.00,0.00,0.00,0.00,274.00,1485.00),(2,7790.00,275.00,16040.00,1785.00,1366.00,911.00,0.00,0.00,0.00,0.00,0.00,482.00,1518.00),(3,8040.00,325.00,17790.00,1785.00,1413.00,942.00,0.00,0.00,0.00,0.00,0.00,522.00,1570.00),(4,8220.00,370.00,19380.00,1785.00,1458.00,972.00,0.00,0.00,0.00,0.00,0.00,562.00,1620.00),(5,8590.00,420.00,21190.00,1932.00,1503.00,1002.00,0.00,0.00,0.00,0.00,0.00,604.00,1670.00),(6,8900.00,470.00,23000.00,1932.00,1544.00,1029.00,0.00,0.00,0.00,0.00,0.00,643.00,1715.00),(7,9220.00,510.00,24520.00,1932.00,1589.00,1059.00,0.00,0.00,0.00,0.00,0.00,686.00,1765.00),(8,9540.00,560.00,26340.00,1932.00,1649.00,1100.00,0.00,0.00,0.00,0.00,0.00,729.00,1833.00),(9,9860.00,610.00,28160.00,1932.00,1719.00,1146.00,0.00,0.00,0.00,0.00,0.00,772.00,1910.00),(10,10180.00,670.00,30280.00,1932.00,1780.00,1187.00,0.00,0.00,0.00,0.00,0.00,822.00,1978.00),(11,10510.00,740.00,32710.00,2856.00,1852.00,1235.00,0.00,0.00,0.00,0.00,0.00,873.00,2058.00),(12,11140.00,800.00,35140.00,2856.00,1960.00,1307.00,0.00,0.00,0.00,0.00,0.00,1504.00,2178.00),(13,11930.00,880.00,38330.00,2856.00,2090.00,1394.00,0.00,0.00,0.00,0.00,0.00,1634.00,2323.00),(14,12720.00,980.00,42120.00,2856.00,2214.00,1476.00,0.00,0.00,0.00,0.00,0.00,1775.00,2460.00),(15,13510.00,1120.00,47110.00,2856.00,2349.00,1566.00,0.00,0.00,0.00,0.00,0.00,1965.00,2610.00),(16,15880.00,1280.00,54280.00,5000.00,2727.00,1818.00,0.00,0.00,0.00,0.00,0.00,2275.00,3030.00),(17,25440.00,1930.00,64040.00,5000.00,4433.00,2955.00,0.00,0.00,0.00,0.00,0.00,2898.00,4925.00),(18,31890.00,2400.00,79890.00,5000.00,5810.00,3873.00,0.00,0.00,500.00,0.00,5000.00,3635.00,6455.00),(19,49370.00,2560.00,100570.00,5000.00,8856.00,5904.00,0.00,500.00,600.00,0.00,7000.00,4872.00,9840.00),(20,57410.00,3750.00,109910.00,5000.00,10505.00,7004.00,1250.00,600.00,700.00,12000.00,10000.00,5444.00,11673.00),(21,63780.00,4150.00,121880.00,5000.00,11646.00,7764.00,1350.00,700.00,700.00,12000.00,10000.00,6041.00,12940.00),(22,68540.00,4870.00,136720.00,5000.00,12456.00,0.00,1750.00,975.00,0.00,12000.00,0.00,6678.00,0.00);
/*!40000 ALTER TABLE `scale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `User_ID` (`User_ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2a$10$DYzNHdhYk73dcda1D4c9o.gI.2j0ZePawxamC0SQh/.cOV5u7rHn6'),(6,'alam','$2a$10$3w0biKK32Hmo11bSw733xuNpsSFl7FQ89O4r3TTa93oNZR.9gnBQW'),(8,'habib','$2a$10$ATpkR1O1ysZcfl8HTFbGVO3trvOKLk6LgMXmZUrwcOV6KitSCDzMy');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'university'
--

--
-- Dumping routines for database 'university'
--
/*!50003 DROP FUNCTION IF EXISTS `total` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `total`(id int) RETURNS int(11)
BEGIN

declare total int ;
select (`Basic_Pay` + `Fixed_Pay` + `Personal_Pay`) into total from allowance where Allowance_ID = id ;
RETURN (total);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Add_Employee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Employee`(
									Employee_Code_P int,
                                    Employee_Name_P varchar(30),
                                    Father_Name_P varchar(30),
                                    CNIC_P VARCHAR(13),
                                    Address_P VARCHAR(100),
                                    NTN_P varchar(50),
                                    FIX_P VARCHAR(1),
                                    Staff_P VARCHAR(1),
                                    Qualification_ID_P INT,
                                    Admin_Position_P varchar(15),
                                    House_P BOOL,
                                    vehicle_P bool,
                                    Marital_Status_P bool,
                                    Join_Date_P date,
                                    Account_P varchar(20), 
                                    Department_ID_P int,
                                    Designation_ID_P int,
                                    Campus_ID_P int,
                                    BPS_P int,
                                    Fixed_Pay_P DECIMAL(9,2)
                                    
)
BEGIN
	
    /* First of all add employee record in employee table (no need a processing) */
	INSERT into Employee 
	VALUES (Employee_Code_P,Employee_Name_P,Father_Name_P,CNIC_P,Address_P,NTN_P,Fix_P,Staff_P,
			Admin_Position_P,House_P, vehicle_P,Marital_Status_P,Join_Date_P, Account_P,Department_ID_P,
			Qualification_ID_P, Designation_ID_P,BPS_P, Campus_ID_P
    );
	
    /*
      Second Add allownces for employee before duduction 
	  because some duduction attribute calculation depend on allownces table attributes
	*/
    CALL allownce_populate(Employee_Code_P,FIX_P,Staff_P,Qualification_ID_P,Admin_Position_P,House_P,vehicle_P,
							Marital_Status_P,Join_Date_P,Department_ID_P,Designation_ID_P,
							Campus_ID_P,BPS_P,Fixed_Pay_P) ;
    
    /* Populate Deduction Table */
    CALL deduction_populate (Employee_Code_P,FIX_P,Staff_P,House_P, BPS_P,Campus_ID_P);


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `allownce_populate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `allownce_populate`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `Qualification_ID_P` INT, IN `Admin_Position_P` VARCHAR(15), IN `House_P` BOOLEAN, IN `vehicle_P` BOOLEAN, IN `Marital_Status_P` BOOLEAN, IN `Join_Date_P` DATE, IN `Department_ID_P` INT, IN `Designation_ID_P` INT, IN `Campus_ID_P` INT, IN `BPS_P` INT, IN `Fixed_Pay_P` DECIMAL(9,2))
BEGIN

/* Local Variable Decleration */
DECLARE Basic_Pay_MIN_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE Basic_Pay_MAX_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE INCR_Local FLOAT DEFAULT 00.00;				/* Depend on BPS value get from scale table */
DECLARE Personal_Pay_Local FLOAT DEFAULT 00.00;		
DECLARE House_Rent_Local FLOAT DEFAULT 00.00;
DECLARE Convence_All_Local FLOAT DEFAULT 00.00;
DECLARE Adhoc_Rel_2010_Local FLOAT DEFAULT 00.00;
DECLARE Computer_Allownce_Local FLOAT DEFAULT 00.00;
DECLARE Senior_p_All_Local FLOAT DEFAULT 00.00;
DECLARE Med_All_Local FLOAT DEFAULT 00.00;
DECLARE ENT_All_Local FLOAT DEFAULT 00.00;
DECLARE intgrated_All_Local FLOAT DEFAULT 00.00;
DECLARE Spec_Add_All_Local FLOAT DEFAULT 00.00;
DECLARE Orderly_All_Local FLOAT DEFAULT 00.00;
DECLARE Curent_Year INT DEFAULT 00.00;
DECLARE Join_Year INT DEFAULT 00.00;
DECLARE Experience_Year INT DEFAULT 00.00;
DECLARE Teach_All_Local FLOAT DEFAULT 00.00;
DECLARE ARA_2016_10PERCENT_Local FLOAT DEFAULT 00.00;
DECLARE Brain_Drain_Local FLOAT DEFAULT 00.00;

/* Temporary Variable */
DECLARE Designation_ID_Temp VARCHAR(25);

	
	/* 
		Getting value which will be (Maybe) used in calculation later and only Depend on BPS
		1) Basic Pay
		6) Convence All
		11) Senior_p All
		13) Entertainment All
		18) Orderly All 
		INCR is used only for calculation
		

		Note:Following Attributes calculation not present here because they are Manual
		and by defualt value is 0.00
		2) Fixed Pay 		if fixed = R or F then Zero always 
		4) Hrent1 All
		9) Private_All
		10) ExtraD/All
		14) Dean All 		but If fixed = F then Zero always
		21) Other Allowance 

	*/
	SELECT Basic_Pay_MIN,Basic_Pay_MAX,INCR,Convence_All,Senior_p_All,ENT_All ,Orderly_All
	  INTO Basic_Pay_MIN_Local,Basic_Pay_MAX_Local, INCR_Local,Convence_All_Local ,Senior_p_All_Local,ENT_All_Local,Orderly_All_Local
			from Scale WHERE BPS = BPS_P;
    
    
    SET Curent_Year = EXTRACT(YEAR FROM CURRENT_DATE);
    SET Join_Year = EXTRACT(YEAR FROM Join_Date_P);

    IF Join_Year > Curent_Year THEN			
		SET Experience_Year = 0;
    else
		SET Experience_Year = Curent_Year - Join_Year;
	END IF;
    /* ---------------------------------------------------------------------------------- */
    

    /* 3) Personal Pay Calculations */
    SET Personal_Pay_Local = Basic_Pay_MIN_Local + (INCR_Local * Experience_Year);
		IF Personal_Pay_Local > Basic_Pay_MAX_Local THEN
			set Personal_Pay_Local = Personal_Pay_Local - Basic_Pay_MAX;
		END IF;

	/* ********************************************************************************* */

	/* 5) Hrent Sub All Calculations 1 Mean Main Campus */
    IF Campus_ID_P = 1 THEN			
		select House_Rent_Main into House_Rent_Local from Scale WHERE BPS = BPS_P;
    else
		select House_Rent_Remote into House_Rent_Local from Scale WHERE BPS = BPS_P;
	END IF;
	
    /* ********************************************************************************* */

    /* 7) Adhoc_Rel_2010 50% calculation */
    IF Join_Year = 2010 THEN
		SELECT Adhoc_Rel_2010 INTO Adhoc_Rel_2010_Local FROM Scale WHERE BPS = BPS_P;
    else
		SET Adhoc_Rel_2010_Local = 0.00 ;
	END IF;
    
    /* ********************************************************************************* */
    
    /*8) Compute All Calculation T mean Teaching*/
    IF Staff_P = 'T' THEN			
		select Computer_Allownces into Computer_Allownce_Local from Qualification WHERE Qualification_ID = Qualification_ID_P;
    else
		set Computer_Allownce_Local = 00.00 ;
	END IF;
    
	/* ********************************************************************************* */

	/* 12) Medical All Calculation False mean Un-Married*/
    IF Marital_Status_P = FALSE THEN			
		SET Med_All_Local = Basic_Pay_MIN_Local * (17.5/100) ;
        IF Med_All_Local < 1000  THEN
			SET Med_All_Local = 1000 ;
		elseif Med_All_Local > 4160  THEN
			SET Med_All_Local = 4160;
		END IF;   
    else
		SET Med_All_Local = Basic_Pay_MIN_Local * (35/100) ;
        IF Med_All_Local < 2000  THEN
			SET Med_All_Local = 2000 ;
		elseif Med_All_Local > 8320  THEN
			SET Med_All_Local = 8320;
		END IF;   
	END IF;

	/* ********************************************************************************* */

	/* 15) Integrated Allowance calculation */
	SELECT Designation_ID INTO Designation_ID_Temp FROM Designation WHERE Designation = "Driver";
    IF BPS_P < 4 OR Designation_ID_P = Designation_ID_Temp THEN
		SET intgrated_All_Local = 300 ;
	else
		SET intgrated_All_Local = 00.00;
	END IF; 
    
    /* ********************************************************************************* */

	/* 16) Spec_Add calculation 1 mean Main Campus*/
    IF Staff_P = 'T' AND Campus_ID_P != 1 THEN
		select Spec_Add_All into Spec_Add_All_Local from Scale WHERE BPS = BPS_P;		
	else
		SET Spec_Add_All_Local = 00.00 ;
	END IF;

    
    
  	/* ********************************************************************************* */

	/* 17) Teacher Allowance calculation */
    IF Staff_P = 'T' THEN			
		select Teach_All into Teach_All_Local from Scale WHERE BPS = BPS_P;
    else
		set Teach_All_Local = 00.00 ;
	END IF;
    
    /* ********************************************************************************* */
    
    /* 19) ARA_2010_10% calculation */
	SET ARA_2016_10PERCENT_Local = Basic_Pay_MIN_Local * (10/100) ;
    
    /* ********************************************************************************* */

	/* 20) Brain Drain calculation 3 mean Phd */
    IF Qualification_ID_P = 3 THEN
		SET Brain_Drain_Local = Basic_Pay_MIN_Local * (40/100);
		IF Brain_Drain_Local > 50000  THEN
			SET Brain_Drain_Local = 50000 ;
		END IF;	
    ELSE
		 SET Brain_Drain_Local = 00.00;
    END IF;

    /* ********************************************************************************* */



    /* 
    	Allownces Data Entry
    	1) Basic Pay = Basic_Pay_MIN_Local

    */

    INSERT INTO Allowance (Employee_Code, Basic_Pay,Fixed_Pay,Personal_Pay,Hrent_Sub_All,Convence_All,Adhoc_Rel_2010,Computer_All,Senior_p_All,Med_All,ENT_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Brain_Drain,ARA_2016_10PERCENT) 
		   VALUES(Employee_Code_P, Basic_Pay_MIN_Local,Fixed_Pay_P,Personal_Pay_Local,House_Rent_Local,Convence_All_Local,Adhoc_Rel_2010_Local,Computer_Allownce_Local,Senior_p_All_Local,Med_All_Local,ENT_All_Local,intgrated_All_Local,Spec_Add_All_Local,Teach_All_Local,Orderly_All_Local,Brain_Drain_Local,ARA_2016_10PERCENT_Local);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deduction_populate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deduction_populate`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `House_P` BOOLEAN, IN `BPS_P` INT, Campus_ID_P int)
    NO SQL
BEGIN


 /* Manual Variables doesn't need a calculation
	3) Electric_Charges_1
	4) Electric_Charges_2
	5) SuiGas_Charges_Local
	6) Water_Tax1_Charges
	7) Water_Tax2_Charges
	8) Endovement_Fund
	10) Convence_Loan
	11) House_Build_Loan
	13) GP_Fund_Advence 
	14) Eid_Advance
	17) Vehicle_Charges_Other
	18) Vehicle_Charges_Teacher
	20) R_Leave_Without_Pay
	21) Recovery_Gap_CA
	24) Other
 */

/* Local Variable Decleration */
DECLARE House_Rent_1_Local FLOAT DEFAULT 00.00;
DECLARE House_Rent_2_Local FLOAT DEFAULT 00.00;
DECLARE B_Fund_Local FLOAT DEFAULT 00.00;
DECLARE GP_Fund_Regular_Local FLOAT DEFAULT 00.00;
DECLARE Union_Fund_1_Local FLOAT DEFAULT 00.00;
DECLARE Union_Fund_2_Local FLOAT DEFAULT 00.00;
DECLARE Upkeep_Ded_Local FLOAT DEFAULT 00.00;
DECLARE Income_Tax_Local FLOAT DEFAULT 00.00;
DECLARE Group_Insurance_Local FLOAT DEFAULT 00.00;


/* Needed for Deduction Calculations */
DECLARE Basic_Pay_NEW FLOAT DEFAULT 00.00;
DECLARE Personal_Pay_NEW FLOAT DEFAULT 00.00;
DECLARE Designation_ID_Temp VARCHAR(25);
DECLARE Income_Temp FLOAT DEFAULT 00.00;


    
    SELECT Basic_Pay,Personal_Pay INTO Basic_Pay_NEW,Personal_Pay_NEW FROM Allowance WHERE Employee_Code = Employee_Code_P;
    
    /* 1) House RENT 1 Calculation */
    IF Campus_ID_P = 1 AND House_P = 1 THEN
		SET House_Rent_1_Local = (Basic_Pay_NEW+Personal_Pay_NEW) * 0.05;
	ELSE
		SET House_Rent_1_Local = 0.00;
	END IF;
    
    /* 2) House RENT 2 Calculation */
    IF Campus_ID_P = 1 AND House_P = 1 THEN
		SET House_Rent_2_Local = (Basic_Pay_NEW+Personal_Pay_NEW) * 0.05;
	ELSE
		SET House_Rent_2_Local = 0.00;
	END IF;
    
    
    /* ********************************************************************************* */
    
    /* 9) B_Fund Ded Calculation */
	IF BPS_P >=1 AND BPS_P <=4 THEN
		SET B_Fund_Local = 15.0;
	ELSEIF  BPS_P >=5 AND BPS_P <=15 THEN
		SET B_Fund_Local = 20.0;
	ELSE 
		SET B_Fund_Local = 55.0;
	END IF;
    /* ********************************************************************************* */
	
	/* 12) GP FUND Recovery Regular Calculation */
	SELECT GP_Fund_Regular INTO GP_Fund_Regular_Local FROM Scale WHERE BPS = BPS_P;
    /* ********************************************************************************* */  
      
    /* 15,16) Union Funds1 and Union Funds2 Calculation */  
	IF Staff_P = 'T' THEN			
		SET Union_Fund_1_Local = 200.0;
		SET Union_Fund_2_Local = 00.00 ;
	ELSE
		SET Union_Fund_1_Local = 00.00;
		IF BPS_P >=1 and BPS_P <=4 THEN
				SET Union_Fund_2_Local = 25.0 ;
		ELSE 
			SET Union_Fund_2_Local = 50.0;
		END IF;			 	
	END IF;
	/* ********************************************************************************* */
    
        
        
	/* 19) Upkeep Ded Calculation 1 mean Yes */
	IF Staff_P = 'T' AND House_P = 1 THEN
		SET Upkeep_Ded_Local = 50.0;
	ELSE
		SET Upkeep_Ded_Local = 0.00;
	END IF;
    /* ********************************************************************************* */
    
    /*Income_Tax_Local*/
	SET Income_Tax_Local = 00.00 ;
    
    
    /*Group_Insurance_Local*/
    SET Group_Insurance_Local = 00.00 ;
   
    
	INSERT INTO Deduction(Employee_Code,House_Rent_1,House_Rent_2,B_Fund,GP_Fund_Regular, Union_Fund_1, Union_Fund_2,
                           Upkeep_Ded, Income_Tax, Group_Insurance
                           )
                    VALUES (
                            Employee_Code_P,House_Rent_1_Local,House_Rent_2_Local,B_Fund_Local,GP_Fund_Regular_Local,Union_Fund_1_Local,Union_Fund_2_Local,
							Upkeep_Ded_Local,Income_Tax_Local,Group_Insurance_Local
                            );


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_allownce` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_allownce`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `Qualification_ID_P` INT, IN `Admin_Position_P` VARCHAR(15), IN `House_P` BOOLEAN, IN `vehicle_P` BOOLEAN, IN `Marital_Status_P` BOOLEAN, IN `Join_Date_P` DATE, IN `Department_ID_P` INT, IN `Designation_ID_P` INT, IN `Campus_ID_P` INT, IN `BPS_P` INT, IN `Fixed_Pay_P` DECIMAL(9,2))
BEGIN

/* Local Variable Decleration */
DECLARE Basic_Pay_MIN_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE Basic_Pay_MAX_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE INCR_Local FLOAT DEFAULT 00.00;				/* Depend on BPS value get from scale table */
DECLARE Personal_Pay_Local FLOAT DEFAULT 00.00;		
DECLARE Hreant1_All_Local FLOAT DEFAULT 00.00;
DECLARE House_Rent_Local FLOAT DEFAULT 00.00;
DECLARE Convence_All_Local FLOAT DEFAULT 00.00;
DECLARE Adhoc_Rel_2010_Local FLOAT DEFAULT 00.00;
DECLARE Computer_Allownce_Local FLOAT DEFAULT 00.00;
DECLARE Private_All_Local FLOAT DEFAULT 00.00;
DECLARE ExtraD_Local FLOAT DEFAULT 00.00;
DECLARE Senior_p_All_Local FLOAT DEFAULT 00.00;
DECLARE Med_All_Local FLOAT DEFAULT 00.00;
DECLARE ENT_All_Local FLOAT DEFAULT 00.00;
DECLARE Dean_All_Local FLOAT DEFAULT 00.00;
DECLARE intgrated_All_Local FLOAT DEFAULT 00.00;
DECLARE Spec_Add_All_Local FLOAT DEFAULT 00.00;
DECLARE Teach_All_Local FLOAT DEFAULT 00.00;
DECLARE Orderly_All_Local FLOAT DEFAULT 00.00;
DECLARE Oth_All_Local FLOAT DEFAULT 00.00;
DECLARE Brain_Drain_Local FLOAT DEFAULT 00.00;
DECLARE ARA_2016_10PERCENT_Local FLOAT DEFAULT 00.00;


DECLARE Curent_Year INT DEFAULT 00.00;
DECLARE Join_Year INT DEFAULT 00.00;
DECLARE Experience_Year INT DEFAULT 00.00;
/* Temporary Variable */
DECLARE Designation_ID_Temp VARCHAR(25);
	
	/* 
		Getting value which will be (Maybe) used in calculation later and only Depend on BPS
		1) Basic Pay
		6) Convence All
		11) Senior_p All
		13) Entertainment All
		18) Orderly All 
		INCR is used only for calculation
		

		Note:Following Attributes calculation not present here because they are Manual
		and by defualt value is 0.00
		2) Fixed Pay(Fixed_Pay_P) 		if fixed = R or F then Zero always 
		4) Hrent1 All
		9) Private_All
		10) ExtraD/All
		14) Dean All 		but If fixed = F then Zero always
		21) Other Allowance 

	*/
	SELECT Basic_Pay_MIN,Basic_Pay_MAX,INCR,Convence_All,Senior_p_All,ENT_All ,Orderly_All
	  INTO Basic_Pay_MIN_Local,Basic_Pay_MAX_Local, INCR_Local,Convence_All_Local ,Senior_p_All_Local,ENT_All_Local,Orderly_All_Local
			from Scale WHERE BPS = BPS_P;
    
    
    SET Curent_Year = EXTRACT(YEAR FROM CURRENT_DATE);
    SET Join_Year = EXTRACT(YEAR FROM Join_Date_P);	/*Date Format=yyyy-mm-dd*/

    IF Join_Year > Curent_Year THEN			
		SET Experience_Year = 0;
    else
		SET Experience_Year = Curent_Year - Join_Year;
	END IF;
    /* ---------------------------------------------------------------------------------- */
    

    /* 3) Personal Pay Calculations */
    SET Personal_Pay_Local = Basic_Pay_MIN_Local + (INCR_Local * Experience_Year);
		IF Personal_Pay_Local > Basic_Pay_MAX_Local THEN
			set Personal_Pay_Local = Personal_Pay_Local - Basic_Pay_MAX;
		END IF;

	/* ********************************************************************************* */

	/* 5) Hrent Sub All Calculations 1 Mean Main Campus */
    IF Campus_ID_P = 1 THEN			
		select House_Rent_Main into House_Rent_Local from Scale WHERE BPS = BPS_P;
    else
		select House_Rent_Remote into House_Rent_Local from Scale WHERE BPS = BPS_P;
	END IF;
	
    /* ********************************************************************************* */

    /* 7) Adhoc_Rel_2010 50% calculation */
    IF Join_Year = 2010 THEN
		SELECT Adhoc_Rel_2010 INTO Adhoc_Rel_2010_Local FROM Scale WHERE BPS = BPS_P;
    else
		SET Adhoc_Rel_2010_Local = 0.00 ;
	END IF;
    
    /* ********************************************************************************* */
    
    /*8) Compute All Calculation T mean Teaching*/
    IF Staff_P = 'T' THEN			
		select Computer_Allownces into Computer_Allownce_Local from Qualification WHERE Qualification_ID = Qualification_ID_P;
    else
		set Computer_Allownce_Local = 00.00 ;
	END IF;
    
	/* ********************************************************************************* */

	/* 12) Medical All Calculation False mean Un-Married*/
    IF Marital_Status_P = FALSE THEN			
		SET Med_All_Local = Basic_Pay_MIN_Local * (17.5/100) ;
        IF Med_All_Local < 1000  THEN
			SET Med_All_Local = 1000 ;
		elseif Med_All_Local > 4160  THEN
			SET Med_All_Local = 4160;
		END IF;   
    else
		SET Med_All_Local = Basic_Pay_MIN_Local * (35/100) ;
        IF Med_All_Local < 2000  THEN
			SET Med_All_Local = 2000 ;
		elseif Med_All_Local > 8320  THEN
			SET Med_All_Local = 8320;
		END IF;   
	END IF;

	/* ********************************************************************************* */

	/* 15) Integrated Allowance calculation */
	SELECT Designation_ID INTO Designation_ID_Temp FROM Designation WHERE Designation = "Driver";
    IF BPS_P < 4 OR Designation_ID_P = Designation_ID_Temp THEN
		SET intgrated_All_Local = 300 ;
	else
		SET intgrated_All_Local = 00.00;
	END IF; 
    
    /* ********************************************************************************* */

	/* 16) Spec_Add calculation 1 mean Main Campus*/
    IF Staff_P = 'T' AND Campus_ID_P != 1 THEN
		select Spec_Add_All into Spec_Add_All_Local from Scale WHERE BPS = BPS_P;		
	else
		SET Spec_Add_All_Local = 00.00 ;
	END IF;

    
    
  	/* ********************************************************************************* */

	/* 17) Teacher Allowance calculation */
    IF Staff_P = 'T' THEN			
		select Teach_All into Teach_All_Local from Scale WHERE BPS = BPS_P;
    else
		set Teach_All_Local = 00.00 ;
	END IF;
    
    /* ********************************************************************************* */
    
    /* 19) ARA_2010_10% calculation */
	SET ARA_2016_10PERCENT_Local = Basic_Pay_MIN_Local * (10/100) ;
    
    /* ********************************************************************************* */

	/* 20) Brain Drain calculation 3 mean Phd */
    IF Qualification_ID_P = 3 THEN
		SET Brain_Drain_Local = Basic_Pay_MIN_Local * (40/100);
		IF Brain_Drain_Local > 50000  THEN
			SET Brain_Drain_Local = 50000 ;
		END IF;	
    ELSE
		 SET Brain_Drain_Local = 00.00;
    END IF;

    /* ********************************************************************************* */



    /* 
    	Allocate(Update) New Allownces
    	1) Basic Pay = Basic_Pay_MIN_Local

    */
	UPDATE Allowance 
	SET Basic_Pay = Basic_Pay_MIN_Local,
    Fixed_Pay = Fixed_Pay_P,
	Personal_Pay  = Personal_Pay_Local ,
    Hreant1_All = Hreant1_All_Local ,
	Hrent_Sub_All = House_Rent_Local ,
	Convence_All = Convence_All_Local,
	Adhoc_Rel_2010 = Adhoc_Rel_2010_Local,
	Computer_All = Computer_Allownce_Local,
    Private_All = Private_All_Local,
    Extra_All = ExtraD_Local,
	Senior_p_All = Senior_p_All_Local ,
	Med_All = Med_All_Local,
    ENT_All = ENT_All_Local,
    Dean_All = Dean_All_Local,
    intgrated_All = intgrated_All_Local,
    Spec_Add_All = Spec_Add_All_Local,
    Teach_All = Teach_All_Local,
    Orderly_All = Orderly_All_Local,
    Oth_All = Oth_All_Local,
    Brain_Drain = Brain_Drain_Local,
    ARA_2016_10PERCENT = ARA_2016_10PERCENT_Local
	WHERE Employee_Code=Employee_Code_P;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_deduction` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_deduction`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `House_P` BOOLEAN, IN `BPS_P` INT, Campus_ID_P INT)
    NO SQL
BEGIN


 /* Manual Variables doesn't need a calculation
	3) Electric_Charges_1
	4) Electric_Charges_2
	5) SuiGas_Charges_Local
	6) Water_Tax1_Charges
	7) Water_Tax2_Charges
	8) Endovement_Fund
	10) Convence_Loan
	11) House_Build_Loan
	13) GP_Fund_Advence 
	14) Eid_Advance
	17) Vehicle_Charges_Other
	18) Vehicle_Charges_Teacher
	20) R_Leave_Without_Pay
	21) Recovery_Gap_CA
	24) Other
 */

/* Local Variable Decleration */
DECLARE House_Rent_1_Local FLOAT DEFAULT 00.00;
DECLARE House_Rent_2_Local FLOAT DEFAULT 00.00;
DECLARE Electric_Charges_1_Local FLOAT DEFAULT 00.00;
DECLARE Electric_Charges_2_Local FLOAT DEFAULT 00.00;
DECLARE SuiGas_Charges_Local FLOAT DEFAULT 00.00;
DECLARE Water_Tax1_Charges_Local FLOAT DEFAULT 00.00;
DECLARE Water_Tax2_Charges_Local FLOAT DEFAULT 00.00;
DECLARE Endovement_Fund_Local FLOAT DEFAULT 00.00;
DECLARE B_Fund_Local FLOAT DEFAULT 00.00;
DECLARE Convence_Loan_Local FLOAT DEFAULT 00.00;
DECLARE House_Build_Loan_Local FLOAT DEFAULT 00.00;
DECLARE GP_Fund_Regular_Local FLOAT DEFAULT 00.00;
DECLARE GP_Fund_Advence_Local FLOAT DEFAULT 00.00;
DECLARE Eid_Advance_Local FLOAT DEFAULT 00.00;
DECLARE Union_Fund_1_Local FLOAT DEFAULT 00.00;
DECLARE Union_Fund_2_Local FLOAT DEFAULT 00.00;
DECLARE Upkeep_Ded_Local FLOAT DEFAULT 00.00;
DECLARE Vehicle_Charges_Other_Local FLOAT DEFAULT 00.00;
DECLARE Vehicle_Charges_Teacher_Local FLOAT DEFAULT 00.00;
DECLARE Income_Tax_Local FLOAT DEFAULT 00.00;
DECLARE R_Leave_Without_Pay_Local FLOAT DEFAULT 00.00;
DECLARE Recovery_Gap_CA_Local FLOAT DEFAULT 00.00;
DECLARE Group_Insurance_Local FLOAT DEFAULT 00.00;
DECLARE Other_Local FLOAT DEFAULT 00.00;

/* Needed for Deduction Calculations */
DECLARE Basic_Pay_NEW FLOAT DEFAULT 00.00;
DECLARE Personal_Pay_NEW FLOAT DEFAULT 00.00;
DECLARE Designation_ID_Temp VARCHAR(25);
DECLARE Income_Temp FLOAT DEFAULT 00.00;

    /* 1) House RENT 1 Calculation */
    IF Campus_ID_P = 1 AND House_P = 1 THEN
		SET House_Rent_1_Local = (Basic_Pay_NEW+Personal_Pay_NEW) * 0.05;
	ELSE
		SET House_Rent_1_Local = 0.00;
	END IF;
    
    /* 2) House RENT 2 Calculation */
    IF Campus_ID_P = 1 AND House_P = 1 THEN
		SET House_Rent_2_Local = (Basic_Pay_NEW+Personal_Pay_NEW) * 0.05;
	ELSE
		SET House_Rent_2_Local = 0.00;
	END IF;
    
    /* ********************************************************************************* */
    
    /* 9) B_Fund Ded Calculation */
	IF BPS_P >=1 AND BPS_P <=4 THEN
		SET B_Fund_Local = 15.0;
	ELSEIF  BPS_P >=5 AND BPS_P <=15 THEN
		SET B_Fund_Local = 20.0;
	ELSE 
		SET B_Fund_Local = 55.0;
	END IF;
    /* ********************************************************************************* */
	
	/* 12) GP FUND Recovery Regular Calculation */
	SELECT GP_Fund_Regular INTO GP_Fund_Regular_Local FROM Scale WHERE BPS = BPS_P;
    /* ********************************************************************************* */  
      
    /* 15,16) Union Funds1 and Union Funds2 Calculation */  
	IF Staff_P = 'T' THEN			
		SET Union_Fund_1_Local = 200.0;
		SET Union_Fund_2_Local = 00.00 ;
	ELSE
		SET Union_Fund_1_Local = 00.00;
		IF BPS_P >=1 and BPS_P <=4 THEN
				SET Union_Fund_2_Local = 25.0 ;
		ELSE 
			SET Union_Fund_2_Local = 50.0;
		END IF;			 	
	END IF;
	/* ********************************************************************************* */
    
        
        
	/* 19) Upkeep Ded Calculation 1 mean Yes */
	IF Staff_P = 'T' AND House_P = 1 THEN
		SET Upkeep_Ded_Local = 50.0;
	ELSE
		SET Upkeep_Ded_Local = 0.00;
	END IF;
    /* ********************************************************************************* */
    
    /*Income_Tax_Local*/
	SET Income_Tax_Local = 00.00 ;
    
    
    /*Group_Insurance_Local*/
    SET Group_Insurance_Local = 00.00 ;
   
    UPDATE Deduction 
	SET House_Rent_1 = House_Rent_1_Local,
    House_Rent_2 = House_Rent_2_Local,
    Electric_Charges_1 = Electric_Charges_1_Local,
    Electric_Charges_2 = Electric_Charges_2_Local,
    SuiGas_Charges = SuiGas_Charges_Local,
    Water_Tax1_Charges = Water_Tax1_Charges_Local,
    Water_Tax2_Charges = Water_Tax2_Charges_Local,
    Endovement_Fund = Endovement_Fund_Local,
    B_Fund = B_Fund_Local,
    House_Build_Loan = House_Build_Loan_Local,
	Convence_Loan = Convence_Loan_Local,
    GP_Fund_Regular = GP_Fund_Regular_Local,
    GP_Fund_Advence = GP_Fund_Advence_Local,
    Eid_Advance = Eid_Advance_Local,
    Union_Fund_1 = Union_Fund_1_Local,
    Union_Fund_2 = Union_Fund_2_Local,
    Vehicle_Charges_Other = Vehicle_Charges_Other_Local,
    Vehicle_Charges_Teacher = Vehicle_Charges_Teacher_Local,
    Upkeep_Ded = Upkeep_Ded_Local,
    R_Leave_Without_Pay = R_Leave_Without_Pay_Local,
    Recovery_Gap_CA = Recovery_Gap_CA_Local,
    Income_Tax = Income_Tax_Local,
    Group_Insurance = Group_Insurance_Local,
    Other = Other_Local
	WHERE Employee_Code=Employee_Code_P;                        

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_employee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_employee`(
									Employee_Code_P int,
                                    Employee_Name_P varchar(30),
                                    Father_Name_P varchar(30),
                                    CNIC_P VARCHAR(13),
                                    Address_P VARCHAR(100),
                                    NTN_P varchar(50),
                                    FIX_P VARCHAR(1),
                                    Staff_P VARCHAR(1),
                                    Qualification_ID_P INT,
                                    Admin_Position_P varchar(15),
                                    House_P BOOL,
                                    vehicle_P bool,
                                    Marital_Status_P bool,
                                    Join_Date_P date,
                                    Account_P varchar(20), 
                                    Department_ID_P int,
                                    Designation_ID_P int,
                                    Campus_ID_P int,
                                    BPS_P int,
                                    Fixed_Pay_P DECIMAL(9,2)
                                    
)
BEGIN
	/* This procedure is called when employee change from by-cash to regular|fixed */
    
    UPDATE Employee 
	SET Employee_Name = Employee_Name_P,
	Father_Name  = Father_Name_P ,
	CNIC = CNIC_P ,
	Address = Address_P,
	NTN = NTN_P,
	Fix = FIX_P,
	Staff = Staff_P ,
	Admin_Position = Admin_Position_P,
	House = House_P,
	Vehicle = vehicle_P,
	Marital_Status = Marital_Status_P,
	Join_Date = Join_Date_P ,
	Account = Account_P ,
	Department_ID = Department_ID_P ,
	Qualification_ID = Qualification_ID_P,
	Designation_ID = Designation_ID_P,
	BPS = BPS_P ,
	Campus_ID = Campus_ID_P
	WHERE Employee_Code=Employee_Code_P;
	
    /*
      Second update allownces for employee before duduction 
	  because some duduction attribute calculation depend on allownces table attributes
	*/
    CALL update_allownce(Employee_Code_P,FIX_P,Staff_P,Qualification_ID_P,Admin_Position_P,House_P,vehicle_P,
							Marital_Status_P,Join_Date_P,Department_ID_P,Designation_ID_P,
							Campus_ID_P,BPS_P,Fixed_Pay_P) ;
    
    /* update Deduction Table */
    CALL update_deduction(Employee_Code_P,FIX_P,Staff_P,House_P, BPS_P,Campus_ID_P);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-20 14:35:47
