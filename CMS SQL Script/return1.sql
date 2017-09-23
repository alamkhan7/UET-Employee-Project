CREATE DEFINER=`root`@`localhost` PROCEDURE `return_teaching_emp_info`(IN Employee_Code_P INT,
																	   OUT Employee_Name VARCHAR(30),
																	   OUT Father_Name VARCHAR(30),
																	   OUT BPS INT,
																	   OUT CNIC VARCHAR(13),
																	   OUT Address VARCHAR(100),
																	   OUT Email VARCHAR(50),
                                                                       OUT Account VARCHAR(20), 
																	   OUT NTN VARCHAR(50),
																	   OUT FIX VARCHAR(1),
                                                                       OUT Designation VARCHAR(25),
																	   OUT Staff VARCHAR(1),
                                                                       OUT Department_Name VARCHAR(50),
																	   OUT Qualification VARCHAR(10),
																	   OUT Admin_Position VARCHAR(20),
                                                                       OUT Campus VARCHAR(15),
																	   OUT House BOOL,
																	   OUT vehicle BOOL,
																	   OUT Marital_Status BOOL,
																	   OUT Join_Date date)
    NO SQL
BEGIN

SELECT 
        `Employee_Name` = `emp`.`Employee_Name` ,
        `Father_Name` = `emp`.`Father_Name` ,
        `BPS` = `emp`.`BPS`,
        `CNIC` = `emp`.`CNIC`,
        `Address` = `emp`.`Address`,
        `Email` = `emp`.`Email`,
        `NTN` = `emp`.`NTN` ,
        `Account` = `emp`.`Account`,
        `Fix` = `emp`.`Fix`,
        `Staff` = `emp`.`Staff`,
        `House` = `emp`.`House`,
        `vehicle` = `emp`.`vehicle`,
        `Marital_Status` = `emp`.`Marital_Status`,
        `Join_Date` = `emp`.`Join_Date`,
        `Monthly_Salary_Generate` = `emp`.`Monthly_Salary_Generate`,
        `Admin_Position` = `emp-teach`.`Admin_Position`,
        `Qualification` = `qual`.`Qualification`,
        `Department_Name` = `dept`.`Department_Name`,
        `Designation` = `desig`.`Designation`,
        `Campus` = `camp`.`Campus`
    FROM
        `employee` AS `emp`,
        `employee_teaching` AS `emp-teach`,
        `department` AS `dept`,
        `designation` AS `desig`,
        `qualification` AS `qual`,
        `campus` AS `camp`
    WHERE
        `emp`.`Employee_Code` = `Employee_Code_P` AND
        `emp-teach`.`Employee_Code` = `Employee_Code_P` AND
        `emp-teach`.`Department_ID` = `dept`.`Department_ID` AND
        `emp-teach`.`Qualification_ID` = `qual`.`Qualification_ID` AND
		`emp`.`Campus_ID` = `camp`.`Campus_ID` AND
        `emp`.`Designation_ID` = `desig`.`Designation_ID` ;

END