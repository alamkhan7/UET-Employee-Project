CREATE DATABASE  IF NOT EXISTS `university` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `university`;
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
  `ARA_2016_10PERCENT` decimal(7,2) AS ((`Basic_Pay` * (10 / 100))) VIRTUAL,
  PRIMARY KEY (`Allowance_ID`),
  KEY `EMP_FPK_ALLOWANCE_idx` (`Employee_Code`),
  CONSTRAINT `EMP_FPK_ALLOWANCE` FOREIGN KEY (`Employee_Code`) REFERENCES `employee` (`Employee_Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allowance`
--

LOCK TABLES `allowance` WRITE;
/*!40000 ALTER TABLE `allowance` DISABLE KEYS */;
INSERT INTO `allowance` VALUES (7,1,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,0.10),(8,2,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,0.20);
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
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campus` (
  `Campus_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Campus` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Campus_ID`)
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
  KEY `EMP_FPK_DEDUCTION_idx` (`Employee_Code`),
  CONSTRAINT `EMP_FPK_DEDUCTION` FOREIGN KEY (`Employee_Code`) REFERENCES `employee` (`Employee_Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deduction`
--

LOCK TABLES `deduction` WRITE;
/*!40000 ALTER TABLE `deduction` DISABLE KEYS */;
INSERT INTO `deduction` VALUES (6,1,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00),(7,2,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00);
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
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department_Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Department_ID`),
  UNIQUE KEY `Department_Name` (`Department_Name`)
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
  `Designation` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Designation_ID`),
  UNIQUE KEY `Designation` (`Designation`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
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
  `Employee_Name` varchar(30) DEFAULT NULL,
  `Father_Name` varchar(30) DEFAULT NULL,
  `CNIC` varchar(13) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `NTN` varchar(50) DEFAULT NULL,
  `Fix` varchar(1) DEFAULT NULL,
  `Staff` varchar(1) DEFAULT NULL,
  `Admin_Position` varchar(15) DEFAULT NULL,
  `House` tinyint(1) DEFAULT NULL,
  `vehicle` tinyint(1) DEFAULT NULL,
  `Marital_Status` tinyint(1) DEFAULT NULL,
  `Join_Date` date DEFAULT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `Department_ID` int(11) DEFAULT NULL,
  `Qualification_ID` int(11) DEFAULT NULL,
  `Designation_ID` int(11) DEFAULT NULL,
  `BPS` int(11) DEFAULT NULL,
  `Campus_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_Code`),
  UNIQUE KEY `Account` (`Account`),
  KEY `Department_ID_FPK_idx` (`Department_ID`),
  KEY `Qualification_ID_FPK_idx` (`Qualification_ID`),
  KEY `Designation_ID_FPK_idx` (`Designation_ID`),
  KEY `Campus_ID_FPK_idx` (`Campus_ID`),
  CONSTRAINT `Campus_ID_FPK` FOREIGN KEY (`Campus_ID`) REFERENCES `campus` (`Campus_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Department_ID_FPK` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Designation_ID_FPK` FOREIGN KEY (`Designation_ID`) REFERENCES `designation` (`Designation_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Qualification_ID_FPK` FOREIGN KEY (`Qualification_ID`) REFERENCES `qualification` (`Qualification_ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Alam','Khan','1510126907987','Buner','12345','R','N','None',1,1,0,'2017-05-01','123456',12,0,4,22,1),(2,'Habib','Ali','5646516516515','Peshawar','56651651','R','T','Dean',1,1,1,'2017-05-02','11111',1,1,4,1,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
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
  CONSTRAINT `EMP_FPK_NETSALARY` FOREIGN KEY (`Employee_Code`) REFERENCES `employee` (`Employee_Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `netsalary`
--

LOCK TABLES `netsalary` WRITE;
/*!40000 ALTER TABLE `netsalary` DISABLE KEYS */;
INSERT INTO `netsalary` VALUES (1,20.10,24.00,0.00),(2,40.20,48.00,0.00);
/*!40000 ALTER TABLE `netsalary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification` (
  `Qualification_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Qualification` varchar(10) DEFAULT NULL,
  `Computer_Allownces` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`Qualification_ID`),
  UNIQUE KEY `Qualification` (`Qualification`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
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
  PRIMARY KEY (`BPS`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scale`
--

LOCK TABLES `scale` WRITE;
/*!40000 ALTER TABLE `scale` DISABLE KEYS */;
INSERT INTO `scale` VALUES (0,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00),(1,7640.00,240.00,14840.00,1785.00,1337.00,891.00,0.00,0.00,0.00,0.00,0.00,274.00),(2,7790.00,275.00,16040.00,1785.00,1366.00,911.00,0.00,0.00,0.00,0.00,0.00,482.00),(3,8040.00,325.00,17790.00,1785.00,1413.00,942.00,0.00,0.00,0.00,0.00,0.00,522.00),(4,8220.00,370.00,19380.00,1785.00,1458.00,972.00,0.00,0.00,0.00,0.00,0.00,562.00),(5,8590.00,420.00,21190.00,1932.00,1503.00,1002.00,0.00,0.00,0.00,0.00,0.00,604.00),(6,8900.00,470.00,23000.00,1932.00,1544.00,1029.00,0.00,0.00,0.00,0.00,0.00,643.00),(7,9220.00,510.00,24520.00,1932.00,1589.00,1059.00,0.00,0.00,0.00,0.00,0.00,686.00),(8,9540.00,560.00,26340.00,1932.00,1649.00,1100.00,0.00,0.00,0.00,0.00,0.00,729.00),(9,9860.00,610.00,28160.00,1932.00,1719.00,1146.00,0.00,0.00,0.00,0.00,0.00,772.00),(10,10180.00,670.00,30280.00,1932.00,1780.00,1187.00,0.00,0.00,0.00,0.00,0.00,822.00),(11,10510.00,740.00,32710.00,2856.00,1852.00,1235.00,0.00,0.00,0.00,0.00,0.00,873.00),(12,11140.00,800.00,35140.00,2856.00,1960.00,1307.00,0.00,0.00,0.00,0.00,0.00,1504.00),(13,11930.00,880.00,38330.00,2856.00,2090.00,1394.00,0.00,0.00,0.00,0.00,0.00,1634.00),(14,12720.00,980.00,42120.00,2856.00,2214.00,1476.00,0.00,0.00,0.00,0.00,0.00,1775.00),(15,13510.00,1120.00,47110.00,2856.00,2349.00,1566.00,0.00,0.00,0.00,0.00,0.00,1965.00),(16,15880.00,1280.00,54280.00,5000.00,2727.00,1818.00,0.00,0.00,0.00,0.00,0.00,2275.00),(17,25440.00,1930.00,64040.00,5000.00,4433.00,2955.00,0.00,0.00,0.00,0.00,0.00,2898.00),(18,31890.00,2400.00,79890.00,5000.00,5810.00,3873.00,0.00,0.00,500.00,0.00,5000.00,3635.00),(19,49370.00,2560.00,100570.00,5000.00,8856.00,5904.00,0.00,500.00,600.00,0.00,7000.00,4872.00),(20,57410.00,3750.00,109910.00,5000.00,10505.00,7004.00,1250.00,600.00,700.00,12000.00,10000.00,5444.00),(21,63780.00,4150.00,121880.00,5000.00,11646.00,7764.00,1350.00,700.00,700.00,12000.00,10000.00,6041.00),(22,68540.00,4870.00,136720.00,5000.00,12456.00,0.00,1750.00,975.00,0.00,12000.00,0.00,6678.00);
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
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
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
                                    Fixed_Pay_P DECIMAL(7,2)
                                    
)
BEGIN

/* Allowances */
DECLARE Basic_Pay_MIN_Local FLOAT;
DECLARE Basic_Pay_MAX_Local FLOAT;
DECLARE INCR_Local FLOAT;
DECLARE Personal_Pay_Local FLOAT;
DECLARE House_Rent_Local FLOAT;
DECLARE Convence_All_Local FLOAT;
DECLARE Computer_Allownce_Local FLOAT;
DECLARE Senior_p_All_Local FLOAT ;
DECLARE Med_All_Local FLOAT ;
DECLARE ENT_All_Local FLOAT ;
DECLARE intgrated_All_Local FLOAT ;
DECLARE Spec_Add_All_Local FLOAT ;
DECLARE Orderly_All_Local FLOAT;
DECLARE Curent_Year INT;
DECLARE Join_Year INT;
DECLARE Experience_Year INT;
DECLARE Teach_All_Local FLOAT;
DECLARE Brain_Drain_Local FLOAT;

/* Deductions */
DECLARE House_Rent_1_Local FLOAT;
DECLARE House_Rent_2_Local FLOAT DEFAULT 0.0;
DECLARE Electric_Charges_1_Local FLOAT;
DECLARE Electric_Charges_2_Local FLOAT;
DECLARE SuiGas_Charges_Local FLOAT;

DECLARE Water_Tax1_Charges_Local FLOAT;
DECLARE Water_Tax2_Charges_Local FLOAT;

DECLARE Endovement_Fund_Local FLOAT ;
DECLARE B_Fund_Local FLOAT ;
DECLARE House_Build_Loan_Local FLOAT ;
DECLARE Convence_Loan_Local FLOAT ;

DECLARE GP_Fund_Regular_Local FLOAT ;
DECLARE GP_Fund_Advence_Local FLOAT;

DECLARE Eid_Advance_Local FLOAT ;
DECLARE Union_Fund_1_Local FLOAT;
DECLARE Union_Fund_2_Local FLOAT ;
DECLARE Vehicle_Charges_Other_Local FLOAT;
DECLARE Vehicle_Charges_Teacher_Local FLOAT ;

DECLARE Upkeep_Ded_Local FLOAT;
DECLARE R_Leave_Without_Pay_Local FLOAT ;
DECLARE Recovery_Gap_CA_Local FLOAT;

DECLARE Income_Tax_Local FLOAT;
DECLARE Group_Insurance_Local FLOAT;
DECLARE Other_Local FLOAT;

/* Needed for Deduction Calculations */
DECLARE Basic_Pay_NEW float;
DECLARE Personal_Pay_NEW float;
DECLARE GP_Fund_Regular_Temp float;

DECLARE Designation_ID_Temp VARCHAR(25);
DECLARE Income_Temp float;

IF Fix_P = 'R' OR Fix_P= 'F' THEN
	SELECT Basic_Pay_MIN,Basic_Pay_MAX,INCR,Convence_All,Senior_p_All,ENT_All ,Teach_All,Orderly_All
	  INTO Basic_Pay_MIN_Local,Basic_Pay_MAX_Local, INCR_Local,Convence_All_Local ,Senior_p_All_Local,ENT_All_Local,Teach_All_Local,Orderly_All_Local
			from Scale WHERE BPS = BPS_P;
    
    
    SET Curent_Year = EXTRACT(YEAR FROM CURRENT_DATE);
    SET Join_Year = EXTRACT(YEAR FROM Join_Date_P);
    SET Experience_Year = Curent_Year - Join_Year;
    
    
    SET Personal_Pay_Local = Basic_Pay_MIN_Local + (INCR_Local * Experience_Year);
		IF Personal_Pay_Local > Basic_Pay_MAX_Local THEN
			set Personal_Pay_Local = Personal_Pay_Local - Basic_Pay_MAX;
		END IF;

	
    IF Campus_ID_P = 1 THEN			
		select House_Rent_Main into House_Rent_Local from Scale WHERE BPS = BPS_P;
    else
		select House_Rent_Remote into House_Rent_Local from Scale WHERE BPS = BPS_P;
	END IF;
	
    
    IF Staff_P = 'T' THEN			
		select Computer_Allownces into Computer_Allownce_Local from Qualification WHERE Qualification_ID = Qualification_ID_P;
    else
		set Computer_Allownce_Local = 00.00 ;
	END IF;
    
    
    IF Marital_Status_P = FALSE THEN			
		SET Med_All_Local = Basic_Pay_MIN_Local * (17.5/100) ;
        IF Med_All_Local < 1000  THEN
			SET Med_All_Local = 1000 ;
		elseif Med_All_Local > 4000  THEN
			SET Med_All_Local = 4000;
		END IF;   
    else
		SET Med_All_Local = Basic_Pay_MIN_Local * (35/100) ;
        IF Med_All_Local < 2000  THEN
			SET Med_All_Local = 2000 ;
		elseif Med_All_Local > 8320  THEN
			SET Med_All_Local = 8320;
		END IF;   
	END IF;

    
	SELECT Designation_ID INTO Designation_ID_Temp FROM Designation WHERE Designation = "Driver";
    IF BPS_P < 4 OR Designation_ID_P = Designation_ID_Temp THEN
		SET intgrated_All_Local = 300 ;
	else
		SET intgrated_All_Local = 00.00;
	END IF; 
    
    
    IF Staff_P = 'T' AND Campus_ID_P != 1 THEN
		select Spec_Add_All into Spec_Add_All_Local from Scale WHERE BPS = BPS_P;		
	else
		SET Spec_Add_All_Local = 00.00 ;
	END IF;

    
    IF Qualification_ID_P = 3 THEN
		SET Brain_Drain_Local = Basic_Pay_MIN_Local * (40/100);
    ELSE
		 SET Brain_Drain_Local = 00.00;
    END IF;
    
  
    IF Staff_P = 'T' THEN			
		select Teach_All into Teach_All_Local from Scale WHERE BPS = BPS_P;
    else
		set Teach_All_Local = 00.00 ;
	END IF;

	INSERT into Employee 
		   VALUES (Employee_Code_P,Employee_Name_P,Father_Name_P,CNIC_P,Address_P,NTN_P,Fix_P,Staff_P,Admin_Position_P,House_P, vehicle_P,Marital_Status_P,Join_Date_P, Account_P,Department_ID_P,Qualification_ID_P, Designation_ID_P,BPS_P, Campus_ID_P);
	
    
    INSERT INTO Allowance (Employee_Code, Basic_Pay,Personal_Pay,Hrent_Sub_All,Convence_All,Computer_All,Senior_p_All,Med_All,ENT_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Brain_Drain) 
		   VALUES(Employee_Code_P, Basic_Pay_MIN_Local,Personal_Pay_Local,House_Rent_Local,Convence_All_Local,Computer_Allownce_Local,Senior_p_All_Local,Med_All_Local,ENT_All_Local,intgrated_All_Local,Spec_Add_All_Local,Teach_All_Local,Orderly_All_Local,Brain_Drain_Local);
    
    
    
    /* DEDUCTION */
    
    /* House RENT 2 Calculation */
    SELECT Basic_Pay,Personal_Pay INTO Basic_Pay_NEW,Personal_Pay_NEW FROM Allowance WHERE Employee_Code = Employee_Code_P;
    SET House_Rent_2_Local = (Basic_Pay_NEW+Personal_Pay_NEW) * 0.05;
    
	/* Manual */
	SET Electric_Charges_1_Local =0.0;
	SET Electric_Charges_2_Local =0.0;
	SET SuiGas_Charges_Local =0.0;
    SET House_Build_Loan_Local =0.0 ;
	SET Convence_Loan_Local =0.0 ;

	SET Water_Tax1_Charges_Local =0.0;
	SET Water_Tax2_Charges_Local =0.0;

	SET Endovement_Fund_Local =0.0 ;    
    
    /* B_Fund */
	IF BPS_P >=1 and BPS_P <=4 THEN
		SET B_Fund_Local = 15.0;
	Else IF  BPS_P >=5 and BPS_P <=15 THEN
		SET B_Fund_Local = 20.0;
	ELSE 
		SET B_Fund_Local = 55.0;
		END IF;
	END IF;
	
	/* GP FUND Recovery Regular */
    	SELECT GP_Fund_Regular INTO GP_Fund_Regular_Temp
			from Scale WHERE BPS = BPS_P;
        SET GP_Fund_Regular_Local = GP_Fund_Regular_Temp;    
      /* GP Fund Recovery Advance */
      SET GP_Fund_Advence_Local = 0.0;
      
      
      /* Eid Advance  (Manual) */
      SET Eid_Advance_Local = 0.0 ;
      
      
      /* Union Funds */
		IF Staff_P = 'T' THEN			
			SET Union_Fund_1_Local = 200.0;
			SET Union_Fund_2_Local = 0.0 ;
		else
			SET Union_Fund_1_Local = 0.0;
			IF BPS_P >=1 and BPS_P <=4 THEN
					SET Union_Fund_2_Local = 25.0 ;
			ELSE 
				SET Union_Fund_2_Local = 50.0;
			END IF;			 	
		END IF;
      
      /*  Veichle Charges */
		SET Vehicle_Charges_Other_Local = 0.0;
		SET Vehicle_Charges_Teacher_Local = 0.0 ;
        
        
	 /* Upkeep Charges */
	IF Staff_P = 'T' AND House_P = 1 THEN
		SET Upkeep_Ded_Local = 50.0;
	else
		SET Upkeep_Ded_Local = 0.0;
	END IF;
    
    /* R_Leave_Without_Pay_Local */
    SET R_Leave_Without_Pay_Local = 0.0;
    
    /* Recovery_Gap_CA_Local  */
    SET Recovery_Gap_CA_Local = 0.0;
    
    /*Income_Tax_Local*/
	SET Income_Tax_Local = 0.0 ;
    
    
    /*Group_Insurance_Local*/
    SET Group_Insurance_Local = 0.0 ;
    
    
    
    /* Other Manual*/
    SET Other_Local = 0.0 ;
    SET House_Rent_1_Local = 0.0 ;
    
	INSERT INTO Deduction(Employee_Code, House_Rent_1, House_Rent_2, Electric_Charges_1, Electric_Charges_2, SuiGas_Charges,
						   Water_Tax1_Charges, Water_Tax2_Charges, Endovement_Fund, B_Fund, House_Build_Loan, Convence_Loan,
                           GP_Fund_Regular, GP_Fund_Advence, Eid_Advance, Union_Fund_1, Union_Fund_2, Vehicle_Charges_Other,
                           Vehicle_Charges_Teacher, Upkeep_Ded, R_Leave_Without_Pay, Recovery_Gap_CA, Income_Tax, 
                           Group_Insurance, Other
                           )
                    VALUES (
                            Employee_Code_P,House_Rent_1_Local,House_Rent_2_Local,Electric_Charges_1_Local,Electric_Charges_2_Local,SuiGas_Charges_Local,
                            Water_Tax1_Charges_Local,Water_Tax2_Charges_Local,Endovement_Fund_Local,B_Fund_Local,House_Build_Loan_Local,Convence_Loan_Local,
                            GP_Fund_Regular_Local,GP_Fund_Advence_Local,Eid_Advance_Local,Union_Fund_1_Local,Union_Fund_2_Local,Vehicle_Charges_Other_Local,
                            Vehicle_Charges_Teacher_Local,Upkeep_Ded_Local,R_Leave_Without_Pay_Local,Recovery_Gap_CA_Local,Income_Tax_Local,
                            Group_Insurance_Local, Other_Local
                            );            





ELSEIF Fix_P= 'N' THEN
	SET Basic_Pay_MIN_Local = 0;
	INSERT into Employee VALUES (Employee_Code_P,Employee_Name_P,Father_Name_P,CNIC_P,Address_P,NTN_P,Fix_P,Staff_P,Admin_Position_P,House_P, vehicle_P,Marital_Status_P,Join_Date_P, Account_P,Department_ID_P,Qualification_ID_P, Designation_ID_P,BPS_P, Campus_ID_P);
	INSERT INTO Allowance (Employee_Code,Basic_Pay,Fixed_Pay) VALUES(Employee_Code_P, Basic_Pay_MIN_Local,Fixed_Pay_P); 
    
    INSERT INTO Deduction(Employee_Code, House_Rent_1, House_Rent_2, Electric_Charges_1, Electric_Charges_2, SuiGas_Charges,
						   Water_Tax1_Charges, Water_Tax2_Charges, Endovement_Fund, B_Fund, House_Build_Loan, Convence_Loan,
                           GP_Fund_Regular, GP_Fund_Advence, Eid_Advance, Union_Fund_1, Union_Fund_2, Vehicle_Charges_Other,
                           Vehicle_Charges_Teacher, Upkeep_Ded, R_Leave_Without_Pay, Recovery_Gap_CA, Income_Tax, 
                           Group_Insurance, Other
                           )
                    VALUES (Employee_Code_P,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
    
END IF;
	
    

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

-- Dump completed on 2017-05-11 22:35:04
