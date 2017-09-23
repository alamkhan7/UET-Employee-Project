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
INSERT INTO `netsalary` VALUES (2,31133.00,1642.25,0.00),(3,66538.00,5064.00,0.00),(4,166512.00,12802.50,0.00),(5,186958.00,12802.50,0.00);
/*!40000 ALTER TABLE `netsalary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'university'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `monthly_salary_event` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `monthly_salary_event` ON SCHEDULE EVERY 10 MINUTE STARTS '2017-05-20 21:13:16' ON COMPLETION PRESERVE ENABLE DO BEGIN
	INSERT INTO `allownces_history` (Employee_Code,Date,Basic_Pay,Fixed_Pay,Personal_Pay,Hreant1_All,Hrent_Sub_All,Convence_All,Adhoc_Rel_2010,Computer_All,Private_All,Extra_All,Senior_p_All,Med_All,ENT_All,Dean_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Oth_All,Brain_Drain,ARA_2016_10PERCENT)
	SELECT DISTINCT  
	allow.Employee_Code, CURRENT_DATE, allow.Basic_Pay, allow.Fixed_Pay, allow.Personal_Pay, allow.Hreant1_All, allow.Hrent_Sub_All, allow.Convence_All, allow.Adhoc_Rel_2010, allow.Computer_All, allow.Private_All, allow.Extra_All, allow.Senior_p_All, allow.Med_All, allow.ENT_All, allow.Dean_All, allow.intgrated_All, allow.Spec_Add_All, allow.Teach_All, allow.Orderly_All, allow.Oth_All, allow.Brain_Drain, allow.ARA_2016_10PERCENT
	FROM allowance allow, employee Emp
	WHERE allow.Employee_Code = Emp.Employee_Code AND Emp.Monthly_Salary_Generate = 0 ;

	INSERT INTO `deduction_history` (Employee_Code, Date, House_Rent_1, House_Rent_2, Electric_Charges_1, Electric_Charges_2, SuiGas_Charges, Water_Tax1_Charges, Water_Tax2_Charges, Endovement_Fund, B_Fund, House_Build_Loan, Convence_Loan, GP_Fund_Regular, GP_Fund_Advence, Eid_Advance, Union_Fund_1, Union_Fund_2, Vehicle_Charges_Other, Vehicle_Charges_Teacher, Upkeep_Ded, R_Leave_Without_Pay, Recovery_Gap_CA, Income_Tax, Group_Insurance, Other)
	SELECT DISTINCT  
	deduc.Employee_Code, CURRENT_DATE, deduc.House_Rent_1, deduc.House_Rent_2, deduc.Electric_Charges_1, deduc.Electric_Charges_2, deduc.SuiGas_Charges, deduc.Water_Tax1_Charges, deduc.Water_Tax2_Charges, deduc.Endovement_Fund, deduc.B_Fund, deduc.House_Build_Loan, deduc.Convence_Loan, deduc.GP_Fund_Regular, deduc.GP_Fund_Advence, deduc.Eid_Advance, deduc.Union_Fund_1, deduc.Union_Fund_2, deduc.Vehicle_Charges_Other, deduc.Vehicle_Charges_Teacher, deduc.Upkeep_Ded, deduc.R_Leave_Without_Pay, deduc.Recovery_Gap_CA, deduc.Income_Tax, deduc.Group_Insurance, deduc.Other 
	FROM deduction deduc, employee Emp
	WHERE deduc.Employee_Code = Emp.Employee_Code AND Emp.Monthly_Salary_Generate = 0 ;
    
    INSERT INTO `netsalary_history` (Employee_Code, Date, Gross_Pay, totalDeduction, Net_Salary)
	SELECT DISTINCT  
	Net.Employee_Code, CURRENT_DATE, Net.Gross_Pay, Net.totalDeduction, Net.Net_Salary 
	FROM netsalary Net, employee Emp
	WHERE Net.Employee_Code = Emp.Employee_Code AND Emp.Monthly_Salary_Generate = 0 ;

	UPDATE employee
	SET Monthly_Salary_Generate = 0 ;
END */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

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
                                    BPS_P int
)
BEGIN
	
    /* First of all add employee record in employee table (no need a processing) */
    DECLARE Monthly_Salary_Generate_Local INT DEFAULT 0 ;
	INSERT into Employee 
	VALUES (Employee_Code_P,Employee_Name_P,Father_Name_P,BPS_P,CNIC_P,Address_P,NTN_P,Account_P,Fix_P,Staff_P,
			Admin_Position_P,House_P, vehicle_P,Marital_Status_P,Join_Date_P,Monthly_Salary_Generate_Local,Department_ID_P,
			Qualification_ID_P, Designation_ID_P, Campus_ID_P
    );
	
    /*
      Second Add allownces for employee before duduction 
	  because some duduction attribute calculation depend on allownces table attributes
	*/
    CALL allownce_populate(Employee_Code_P,FIX_P,Staff_P,Qualification_ID_P,Admin_Position_P,House_P,vehicle_P,
							Marital_Status_P,Join_Date_P,Department_ID_P,Designation_ID_P,
							Campus_ID_P,BPS_P) ;
    
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `allownce_populate`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `Qualification_ID_P` INT, IN `Admin_Position_P` VARCHAR(15), IN `House_P` BOOLEAN, IN `vehicle_P` BOOLEAN, IN `Marital_Status_P` BOOLEAN, IN `Join_Date_P` DATE, IN `Department_ID_P` INT, IN `Designation_ID_P` INT, IN `Campus_ID_P` INT, IN `BPS_P` INT)
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
		2) Fixed Pay 
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

    INSERT INTO Allowance (Employee_Code, Basic_Pay,Personal_Pay,Hrent_Sub_All,Convence_All,Adhoc_Rel_2010,Computer_All,Senior_p_All,Med_All,ENT_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Brain_Drain,ARA_2016_10PERCENT) 
		   VALUES(Employee_Code_P, Basic_Pay_MIN_Local,Personal_Pay_Local,House_Rent_Local,Convence_All_Local,Adhoc_Rel_2010_Local,Computer_Allownce_Local,Senior_p_All_Local,Med_All_Local,ENT_All_Local,intgrated_All_Local,Spec_Add_All_Local,Teach_All_Local,Orderly_All_Local,Brain_Drain_Local,ARA_2016_10PERCENT_Local);

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
/*!50003 DROP PROCEDURE IF EXISTS `delete_employee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_employee`(IN `Employee_Code_P` INT)
    NO SQL
BEGIN

INSERT INTO employee_history (Employee_Code,DeleteDate,Employee_Name,Father_Name,BPS,CNIC,Address,NTN,Account,Fix,Staff,Admin_Position,House,vehicle,Marital_Status,Join_Date,Department,Qualification,Designation,Campus)
SELECT 
Emp.Employee_Code, CURRENT_DATE, Emp.Employee_Name , Emp.Father_Name , Emp.BPS , Emp.CNIC , Emp.Address , Emp.NTN ,Emp.Account ,Emp.Fix ,Emp.Staff , Emp.Admin_Position , Emp.House , Emp.vehicle , Emp.Marital_Status , Emp.Join_Date, Dept.Department_Name, Qual.Qualification, Desig.Designation, Camp.Campus 
FROM employee Emp, department Dept, qualification Qual, designation Desig, Campus Camp 
WHERE Emp.Department_ID = Dept.Department_ID AND Emp.Qualification_ID = Qual.Qualification_ID AND Emp.Designation_ID = Desig.Designation_ID AND Emp.Campus_ID = Camp.Campus_ID AND Emp.Employee_Code=Employee_Code_P;

DELETE FROM employee
WHERE Employee_Code = Employee_Code_P ;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_allownce`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `Qualification_ID_P` INT, IN `Admin_Position_P` VARCHAR(15), IN `House_P` BOOLEAN, IN `vehicle_P` BOOLEAN, IN `Marital_Status_P` BOOLEAN, IN `Join_Date_P` DATE, IN `Department_ID_P` INT, IN `Designation_ID_P` INT, IN `Campus_ID_P` INT, IN `BPS_P` INT)
BEGIN

/* Local Variable Decleration */
DECLARE Basic_Pay_MIN_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE Basic_Pay_MAX_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE INCR_Local FLOAT DEFAULT 00.00;				/* Depend on BPS value get from scale table */
DECLARE Personal_Pay_Local FLOAT DEFAULT 00.00;
DECLARE Fixed_Pay_Local	FLOAT DEFAULT 00.00;	
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
		2) Fixed Pay
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
    Fixed_Pay = Fixed_Pay_Local,
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
                                    BPS_P int
                                    
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
							Campus_ID_P,BPS_P) ;
    
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

-- Dump completed on 2017-05-20 23:45:59
