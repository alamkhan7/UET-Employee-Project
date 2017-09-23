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
	
    /* Allownces Data Entry*/
    INSERT INTO Allowance (Employee_Code, Basic_Pay,Personal_Pay,Hrent_Sub_All,Convence_All,Computer_All,Senior_p_All,Med_All,ENT_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Brain_Drain) 
		   VALUES(Employee_Code_P, Basic_Pay_MIN_Local,Personal_Pay_Local,House_Rent_Local,Convence_All_Local,Computer_Allownce_Local,Senior_p_All_Local,Med_All_Local,ENT_All_Local,intgrated_All_Local,Spec_Add_All_Local,Teach_All_Local,Orderly_All_Local,Brain_Drain_Local);
    
    
    
    /* DEDUCTION */
    
    /* House RENT 2 Calculation */
    SELECT Basic_Pay,Personal_Pay INTO Basic_Pay_NEW,Personal_Pay_NEW FROM Allowance WHERE Employee_Code = Employee_Code_P;
    SET House_Rent_2_Local = (Basic_Pay_NEW+Personal_Pay_NEW) * 0.05;
    
	/* Manual */
	SET House_Rent_1_Local = 0.0 ;
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
	
    

END