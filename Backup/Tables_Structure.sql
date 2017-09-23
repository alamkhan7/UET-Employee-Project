/*

(C) Habibullah Unixian@outlook.com
	https://github.com/Habibullah-UET
    
	21/02/2017
    
Database  Tables Structure

*/

CREATE DATABASE University;
USE University;

/* Department Table */
CREATE TABLE Department (
						 Department_ID INT NOT NULL AUTO_INCREMENT,
                         Department_Name VARCHAR(50) UNIQUE,
                         PRIMARY KEY (Department_ID)
						);

/* Qualification Table */
CREATE TABLE Qualification (
						 Qualification_ID INT NOT NULL AUTO_INCREMENT,
                         Qualification VARCHAR(10) UNIQUE,
                         Computer_Allownces DECIMAL(9,2),
                         
                         PRIMARY KEY (Qualification_ID)
						);                        
                        
/* Designation Table */
-- id 6 for driver
CREATE TABLE Designation (
						  Designation_ID INT NOT NULL AUTO_INCREMENT,
                          Designation VARCHAR(25) UNIQUE,
                          PRIMARY KEY (Designation_ID)
						);

/* Scales Table  (BPS-17, BPS-18 ...) */    
             
CREATE TABLE Scale   (
						  BPS TINYINT NOT NULL AUTO_INCREMENT check(BPS <= 22),
		
						  Basic_Pay_MIN DECIMAL(9,2) DEFAULT 00.00,
                          INCR DECIMAL(9,2) DEFAULT 00.00,
						  Basic_Pay_MAX DECIMAL(9,2) DEFAULT 00.00,
                          Convence_All DECIMAL(9,2) DEFAULT 00.00,
                          House_Rent_Main DECIMAL(7,2) DEFAULT 00.00,
                          House_Rent_Remote DECIMAL(7,2) DEFAULT 00.00,
                          Senior_p_All DECIMAL(7,2) DEFAULT 00.00,
                          ENT_All DECIMAL(7,2) DEFAULT 00.00,
                          Teach_All DECIMAL(7,2) DEFAULT 00.00,
                          Orderly_All DECIMAL(7,2) DEFAULT 00.00,
                          Spec_Add_All DECIMAL(9,2) DEFAULT 00.00,
                          PRIMARY KEY (BPS)
                          
					  );


 CREATE TABLE Campus (
						 Campus_ID INT AUTO_INCREMENT NOT NULL,
						 Campus VARCHAR(15),
						 PRIMARY KEY (Campus_ID)
					 );
                     
/* Employee Table : Employee Personal Info */                            
CREATE TABLE Employee (
							Employee_Code INT AUTO_INCREMENT NOT NULL,
							Employee_Name VARCHAR(30),
							Father_Name VARCHAR(30),
                            CNIC VARCHAR(13),
                            Address VARCHAR(100),
                            NTN VARCHAR(50),
                            Fix VARCHAR(1)
								check (Fix in ('R','F','N')),
                            Staff VARCHAR(1)
								check (Staff in ('T','N')),
                                
                            Admin_Position VARCHAR(15)
								check (Admin_Position in ('None','Dean','Chairman')),
                            House BOOL,
                            vehicle BOOL,
                            Marital_Status BOOL,
                            Join_Date Date,
                            
							Account VARCHAR(20) UNIQUE,
                            
                            /* Information From Other Tables */
                            Department_ID INT,
                            FOREIGN KEY (Department_ID) REFERENCES  Department(Department_ID),
                            
                            Qualification_ID INT,
                            FOREIGN KEY (Qualification_ID) REFERENCES  Qualification(Qualification_ID), 
                            
                            Designation_ID INT,
                            FOREIGN KEY (Designation_ID) REFERENCES Designation(Designation_ID),
                            
                            BPS INT,
                            FOREIGN KEY (BPS) REFERENCES  Scale(BPS),
                            
                            Campus_ID INT,
                            FOREIGN KEY (Campus_ID) REFERENCES Campus(Campus_ID),
							
                            PRIMARY KEY (Employee_Code)
						);-
                  
/* Allownace Table */
CREATE TABLE Allowance (
						  Allowance_ID INT NOT NULL AUTO_INCREMENT,
						  Basic_Pay DECIMAL(9,2) DEFAULT 00.00,
                          
                          Fixed_Pay DECIMAL(9,2) DEFAULT 00.00,
                          Personal_Pay DECIMAL(9,2) DEFAULT 00.00,
                          Hreant1_All DECIMAL(9,2) DEFAULT 00.00,
                          Hrent_Sub_All DECIMAL(9,2) DEFAULT 00.00,
                          Convence_All DECIMAL(9,2) DEFAULT 00.00,
                          Adhoc_Rel_2010 DECIMAL(9,2)  DEFAULT 00.00, -- 50% of Basic Pay (2010)
                          Computer_All DECIMAL(9,2) DEFAULT 00.00, 
                          Private_All DECIMAL(9,2) DEFAULT 00.00,
                          Extra_All DECIMAL(9,2) DEFAULT 00.00,
                          
                          Senior_p_All DECIMAL(9,2) DEFAULT 00.00,
                          Med_All DECIMAL(9,2) DEFAULT 00.00,
                          ENT_All DECIMAL(9,2) DEFAULT 00.00,
                          Dean_All DECIMAL(9,2) DEFAULT 00.00,
                          intgrated_All DECIMAL(9,2) DEFAULT 00.00,
                          Spec_Add_All DECIMAL(9,2) DEFAULT 00.00,
                          Teach_All DECIMAL(7,2) DEFAULT 00.00,
                          Orderly_All DECIMAL(7,2) DEFAULT 00.00,
                          Oth_All DECIMAL(9,2) DEFAULT 00.00,
                          
                          Brain_Drain DECIMAL(9,2) DEFAULT 00.00,
                          ARA_2016_10PERCENT DECIMAL(7,2)  AS (Basic_Pay * (10/100)) , -- 10% of Basic Pay (2016) 
						  PRIMARY KEY (Allowance_ID),
						   	
						   /* Each Allownace Must be Connected to a Specefic Employee */
						   Employee_Code INT,
						   FOREIGN KEY (Employee_Code) REFERENCES Employee (Employee_Code)

						);

/* Deductions Table */                       
CREATE TABLE Deduction (
						Deduction_ID INT NOT NULL AUTO_INCREMENT,
						
                        House_Rent_1 DECIMAL(7,2) DEFAULT 00.00,
                        House_Rent_2 DECIMAL(7,2) DEFAULT 00.00,
						
						Electric_Charges_1 DECIMAL(7,2) DEFAULT 00.00,
						Electric_Charges_2 DECIMAL(7,2) DEFAULT 00.00,
						
                        SuiGas_Charges DECIMAL(7,2) DEFAULT 00.00,
						
                        Water_Tax1_Charges DECIMAL(7,2) DEFAULT 00.00,
						Water_Tax2_Charges DECIMAL(7,2) DEFAULT 00.00,
						
                        Endovement_Fund DECIMAL(7,2) DEFAULT 00.00,
						B_Fund DECIMAL(7,2) DEFAULT 00.00,
                        
						House_Build_Loan DECIMAL(7,2) DEFAULT 00.00,
						Convence_Loan DECIMAL(7,2) DEFAULT 00.00,
						
                        GP_Fund_Regular DECIMAL(7,2) DEFAULT 00.00,
						GP_Fund_Advence DECIMAL(7,2) DEFAULT 00.00,
						
                        Eid_Advance DECIMAL(7,2) DEFAULT 00.00,
						
                        Union_Fund_1 DECIMAL(7,2) DEFAULT 00.00,
						Union_Fund_2 DECIMAL(7,2) DEFAULT 00.00,
						
                        Vehicle_Charges_Other DECIMAL(7,2) DEFAULT 00.00,
						Vehicle_Charges_Teacher DECIMAL(7,2) DEFAULT 00.00,
						
                        Upkeep_Ded DECIMAL(7,2) DEFAULT 00.00,
                        
                        R_Leave_Without_Pay DECIMAL(7,2) DEFAULT 00.00,
                        
						Recovery_Gap_CA DECIMAL(7,2) DEFAULT 00.00,
						
                        Income_Tax DECIMAL(7,2) DEFAULT 00.00,
						Group_Insurance  DECIMAL(7,2) DEFAULT 00.00,
						
						Other DECIMAL(7,2) DEFAULT 00.00,
                        
   
   						PRIMARY KEY (Deduction_ID),
                        
					/* Each Deduction Must be Connected to a Specefic Employee */

						Employee_Code INT,
						FOREIGN KEY (Employee_Code) REFERENCES Employee (Employee_Code)

						);                       
                        
CREATE TABLE User (
					User_ID INT NOT NULL AUTO_INCREMENT,
                    Username VARCHAR (50) UNIQUE,
                    Password VARCHAR (12),
                    PRIMARY KEY (User_ID)
					);                        