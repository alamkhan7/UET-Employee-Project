/*
INSERT INTO employee_history (campaign_id, mobile, vote, vote_date)  
SELECT campaign_id, from_number, received_msg, date_received
  FROM employee
 WHERE `campaign_id` = '8'
*/

/*
INSERT INTO employee_history (Employee_Code,DeleteDate,Employee_Name,Father_Name,BPS,CNIC,Address,NTN,Account,Fix,Staff,Admin_Position,House,vehicle,Marital_Status,Join_Date,Department,Qualification,Designation,Campus)
SELECT 
Emp.Employee_Code, CURRENT_DATE, Emp.Employee_Name , Emp.Father_Name , Emp.BPS , Emp.CNIC , Emp.Address , Emp.NTN ,Emp.Account ,Emp.Fix ,Emp.Staff , Emp.Admin_Position , Emp.House , Emp.vehicle , Emp.Marital_Status , Emp.Join_Date, Dept.Department_Name, Qual.Qualification, Desig.Designation, Camp.Campus 
FROM employee Emp, department Dept, qualification Qual, designation Desig, Campus Camp 
WHERE Emp.Department_ID = Dept.Department_ID AND Emp.Qualification_ID = Qual.Qualification_ID AND Emp.Designation_ID = Desig.Designation_ID AND Emp.Campus_ID = Camp.Campus_ID;
*/

/*
INSERT INTO `allownces_history` (Employee_Code,Date,Basic_Pay,Fixed_Pay,Personal_Pay,Hreant1_All,Hrent_Sub_All,Convence_All,Adhoc_Rel_2010,Computer_All,Private_All,Extra_All,Senior_p_All,Med_All,ENT_All,Dean_All,intgrated_All,Spec_Add_All,Teach_All,Orderly_All,Oth_All,Brain_Drain,ARA_2016_10PERCENT)
SELECT DISTINCT  
allow.Employee_Code, CURRENT_DATE, allow.Basic_Pay, allow.Fixed_Pay, allow.Personal_Pay, allow.Hreant1_All, allow.Hrent_Sub_All, allow.Convence_All, allow.Adhoc_Rel_2010, allow.Computer_All, allow.Private_All, allow.Extra_All, allow.Senior_p_All, allow.Med_All, allow.ENT_All, allow.Dean_All, allow.intgrated_All, allow.Spec_Add_All, allow.Teach_All, allow.Orderly_All, allow.Oth_All, allow.Brain_Drain, allow.ARA_2016_10PERCENT
FROM allowance allow, employee Emp
WHERE allow.Employee_Code = Emp.Employee_Code AND Emp.Monthly_Salary_Generate = 0 ;
*/

/*
INSERT INTO `deduction_history` (Employee_Code, Date, House_Rent_1, House_Rent_2, Electric_Charges_1, Electric_Charges_2, SuiGas_Charges, Water_Tax1_Charges, Water_Tax2_Charges, Endovement_Fund, B_Fund, House_Build_Loan, Convence_Loan, GP_Fund_Regular, GP_Fund_Advence, Eid_Advance, Union_Fund_1, Union_Fund_2, Vehicle_Charges_Other, Vehicle_Charges_Teacher, Upkeep_Ded, R_Leave_Without_Pay, Recovery_Gap_CA, Income_Tax, Group_Insurance, Other)
SELECT DISTINCT  
deduc.Employee_Code, CURRENT_DATE, deduc.House_Rent_1, deduc.House_Rent_2, deduc.Electric_Charges_1, deduc.Electric_Charges_2, deduc.SuiGas_Charges, deduc.Water_Tax1_Charges, deduc.Water_Tax2_Charges, deduc.Endovement_Fund, deduc.B_Fund, deduc.House_Build_Loan, deduc.Convence_Loan, deduc.GP_Fund_Regular, deduc.GP_Fund_Advence, deduc.Eid_Advance, deduc.Union_Fund_1, deduc.Union_Fund_2, deduc.Vehicle_Charges_Other, deduc.Vehicle_Charges_Teacher, deduc.Upkeep_Ded, deduc.R_Leave_Without_Pay, deduc.Recovery_Gap_CA, deduc.Income_Tax, deduc.Group_Insurance, deduc.Other 
FROM deduction deduc, employee Emp
WHERE deduc.Employee_Code = Emp.Employee_Code AND Emp.Monthly_Salary_Generate = 0 ;

UPDATE employee
SET Monthly_Salary_Generate = 0;
*/

/*
INSERT INTO `netsalary_history` (Employee_Code, Date, Gross_Pay, totalDeduction, Net_Salary)
SELECT DISTINCT  
Net.Employee_Code, CURRENT_DATE, Net.Gross_Pay, Net.totalDeduction, Net.Net_Salary 
FROM netsalary Net, employee Emp
WHERE Net.Employee_Code = Emp.Employee_Code AND Emp.Monthly_Salary_Generate = 0 ;
*/

/*
DELIMITER $$
CREATE EVENT event1
ON SCHEDULE EVERY '1' MONTH
STARTS '2011-05-01 00:00:00'
DO 
BEGIN
 -- your code
END$$

DELIMITER ;
*/



/*
show processlist;
SET GLOBAL event_scheduler = ON;
show events;
SELECT @@event_scheduler;
SELECT @@GLOBAL.event_scheduler;
select now();
*/

/*
delimiter |
CREATE EVENT IF NOT EXISTS monthly_salary_event 
ON SCHEDULE EVERY 1 MINUTE
STARTS NOW()
ON COMPLETION PRESERVE
DO
BEGIN
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
END |
delimiter ;
*/



# DROP EVENTS IF EXIST monthly_salary_event;