CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `employee_view` AS
    SELECT 
        `emp`.`Employee_Code` AS `Employee_Code`,
        `emp`.`Employee_Name` AS `Employee_Name`,
        `emp`.`Father_Name` AS `Father_Name`,
        `emp`.`BPS` AS `BPS`,
        `emp`.`CNIC` AS `CNIC`,
        `emp`.`Address` AS `Address`,
        `emp`.`Email` AS `Email`,
        `emp`.`NTN` AS `NTN`,
        `emp`.`Account` AS `Account`,
        `emp`.`Fix` AS `Fix`,
        `emp`.`Staff` AS `Staff`,
        `emp`.`House` AS `House`,
        `emp`.`vehicle` AS `vehicle`,
        `emp`.`Marital_Status` AS `Marital_Status`,
        `emp`.`Join_Date` AS `Join_Date`,
        `emp`.`Monthly_Salary_Generate` AS `Monthly_Salary_Generate`,
        `emp-teach`.`Admin_Position` AS `Admin_Position`,
        `desig`.`Designation` AS `Designation`,
        `camp`.`Campus` AS `Campus`,
        `dept`.`Department_Name` AS `Department_Name`,
        `qual`.`Qualification` AS `Qualification`,
        `sect`.`Section_Name` AS `Section_Name`
    FROM
        ((((((((`employee` `emp`
        JOIN `employee_teaching` `emp-teach`)
        JOIN `employee_non_teaching` `emp-non`)
        JOIN `employee_nebqasid` `emp-neb`)
        JOIN `designation` `desig`)
        JOIN `campus` `camp`)
        JOIN `department` `dept`)
        JOIN `qualification` `qual`)
        JOIN `section` `sect`)
    WHERE
        ((`emp`.`Employee_Code` = `emp-teach`.`Employee_Code`)
            OR (`emp`.`Employee_Code` = `emp-non`.`Employee_Code`)
            OR ((`emp`.`Employee_Code` = `emp-neb`.`Employee_Code`)
            AND (`emp`.`Designation_ID` = `desig`.`Designation_ID`)
            AND (`emp`.`Campus_ID` = `camp`.`Campus_ID`)
            AND (`emp-teach`.`Department_ID` = `dept`.`Department_ID`)
            AND (`emp-teach`.`Qualification_ID` = `qual`.`Qualification_ID`)
            AND (`emp-non`.`Section_ID` = `sect`.`Section_ID`)))