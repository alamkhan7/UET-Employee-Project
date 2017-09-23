CREATE DEFINER=`root`@`localhost` PROCEDURE `allownce_populate`(IN `Employee_Code_P` INT, IN `FIX_P` VARCHAR(1), IN `Staff_P` VARCHAR(1), IN `Qualification_ID_P` INT, IN `Admin_Position_P` VARCHAR(15), IN `House_P` BOOLEAN, IN `vehicle_P` BOOLEAN, IN `Marital_Status_P` BOOLEAN, IN `Join_Date_P` DATE, IN `Department_ID_P` INT, IN `Designation_ID_P` INT, IN `Campus_ID_P` INT, IN `BPS_P` INT, IN `Fixed_Pay_P` DECIMAL(9,2))
    NO SQL
BEGIN

/* Local Variable Decleration */
DECLARE Basic_Pay_MIN_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE Basic_Pay_MAX_Local FLOAT DEFAULT 00.00;	/* Depend on BPS value get from scale table */
DECLARE INCR_Local FLOAT DEFAULT 00.00;				/* Depend on BPS value get from scale table */
DECLARE Personal_Pay_Local FLOAT DEFAULT 00.00;		
DECLARE House_Rent_Local FLOAT DEFAULT 00.00;
DECLARE Convence_All_Local FLOAT DEFAULT 00.00;
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
DECLARE Brain_Drain_Local FLOAT DEFAULT 00.00;

/* Temporary Variable */
DECLARE Designation_ID_Temp VARCHAR(25);

/*
	Allowance table attributes will be only fill for Fixed(Fix_P) is Regular or Fixed
	and Fixed = ByCash (N) Only Fixed Pay have value. 
*/
IF Fix_P = 'R' OR Fix_P= 'F' THEN
	
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
		4) Hrent1 All:
		7) Adhoc_Rel_2010 50%
		9) Private_All
		10) ExtraD/All
		14) Dean All 		but If fixed = F then Zero always
		19) ARA_2016_10PERCENT
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

    INSERT INTO Allowance (Employee_Code, Basic_Pay,Personal_Pay,Hrent_Sub_All,Convence_All,Computer_All,Senior_p_All,Med_All,ENT_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Brain_Drain) 
		   VALUES(Employee_Code_P, Basic_Pay_MIN_Local,Personal_Pay_Local,House_Rent_Local,Convence_All_Local,Computer_Allownce_Local,Senior_p_All_Local,Med_All_Local,ENT_All_Local,intgrated_All_Local,Spec_Add_All_Local,Teach_All_Local,Orderly_All_Local,Brain_Drain_Local);
    
ELSEIF Fix_P= 'N' THEN
	/*
		IF Fixed = ByCash (N) Only Fixed Pay have value. 
	*/
	INSERT INTO Allowance (Employee_Code,Fixed_Pay) VALUES(Employee_Code_P,Fixed_Pay_P); 
    
END IF;

END