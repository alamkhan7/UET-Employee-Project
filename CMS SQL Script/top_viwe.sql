/*
SELECT dept.Department_Name 
FROM allowance allow, employee emp, department dept
WHERE emp.campus_id=1 AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID
GROUP BY dept.Department_ID
*/
/*
SELECT dept.Department_Name, camp.Campus, 
SUM(allow.Basic_pay) As Basic_Pay,
SUM(allow.Fixed_Pay) As Fixed_Pay,
SUM(allow.Personal_Pay) As Personal_Pay,
SUM(allow.Hreant1_All) As Hreant1_All,
SUM(allow.Hrent_Sub_All) As Hrent_Sub_All,
SUM(allow.Convence_All) As Convence_All,
SUM(allow.Adhoc_Rel_2010) As Adhoc_Rel_2010,
SUM(allow.Computer_All) As Computer_All,
SUM(allow.Private_All) As Private_All,
SUM(allow.Extra_All) As Extra_All,
SUM(allow.Senior_p_All) As Senior_p_All,
SUM(allow.Med_All) As Med_All,
SUM(allow.ENT_All) As ENT_All,
SUM(allow.Dean_All) As Dean_All,
SUM(allow.intgrated_All) As intgrated_All,
SUM(allow.Spec_Add_All) As Spec_Add_All,
SUM(allow.Teach_All) As Teach_All,
SUM(allow.Orderly_All) As Orderly_All,
SUM(allow.Oth_All) As Oth_All,
SUM(allow.Brain_Drain) As Brain_Drain,
SUM(allow.ARA_2016_10PERCENT) As ARA_2016_10PERCENT
FROM 
allowance allow, employee emp, department dept, campus camp 
WHERE emp.campus_id='$campID' AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID
GROUP BY dept.Department_ID
*/


/*

SELECT dept.Department_Name
FROM allowance allow, employee emp, department dept, campus camp 
WHERE emp.campus_id=1 AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID 
AND emp.Campus_ID = camp.Campus_ID AND emp.Fix='R'
GROUP BY dept.Department_ID
 */
/* 
SELECT dept.Department_Name, camp.Campus, 
SUM(allow.Basic_pay) As Basic_Pay,
SUM(allow.Fixed_Pay) As Fixed_Pay,
SUM(allow.Personal_Pay) As Personal_Pay,
SUM(allow.Hreant1_All) As Hreant1_All,
SUM(allow.Hrent_Sub_All) As Hrent_Sub_All,
SUM(allow.Convence_All) As Convence_All,
SUM(allow.Adhoc_Rel_2010) As Adhoc_Rel_2010,
SUM(allow.Computer_All) As Computer_All,
SUM(allow.Private_All) As Private_All,
SUM(allow.Extra_All) As Extra_All,
SUM(allow.Senior_p_All) As Senior_p_All,
SUM(allow.Med_All) As Med_All,
SUM(allow.ENT_All) As ENT_All,
SUM(allow.Dean_All) As Dean_All,
SUM(allow.intgrated_All) As intgrated_All,
SUM(allow.Spec_Add_All) As Spec_Add_All,
SUM(allow.Teach_All) As Teach_All,
SUM(allow.Orderly_All) As Orderly_All,
SUM(allow.Oth_All) As Oth_All,
SUM(allow.Brain_Drain) As Brain_Drain,
SUM(allow.ARA_2016_10PERCENT) As ARA_2016_10PERCENT
FROM 
allowance allow, employee emp, department dept, campus camp  
WHERE emp.campus_id='$campID' AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID 
AND emp.Campus_ID = camp.Campus_ID AND emp.Fix='$fix'
GROUP BY dept.Department_ID
*/

/*------------------------------------------*/

/*
SELECT dept.Department_Name, camp.Campus, 
SUM(ded.House_Rent_1) As House_Rent_1,
SUM(ded.House_Rent_2) As House_Rent_2,
SUM(ded.Electric_Charges_1) As Electric_Charges_1,
SUM(ded.Electric_Charges_2) As Electric_Charges_2,
SUM(ded.SuiGas_Charges) As SuiGas_Charges,
SUM(ded.Water_Tax1_Charges) As Water_Tax1_Charges,
SUM(ded.Water_Tax2_Charges) As Water_Tax2_Charges,
SUM(ded.Endovement_Fund) As Endovement_Fund,
SUM(ded.B_Fund) As B_Fund,
SUM(ded.House_Build_Loan) As House_Build_Loan,
SUM(ded.Convence_Loan) As Convence_Loan,
SUM(ded.GP_Fund_Regular) As GP_Fund_Regular,
SUM(ded.GP_Fund_Advence) As GP_Fund_Advence,
SUM(ded.Eid_Advance) As Eid_Advance,
SUM(ded.Union_Fund_1) As Union_Fund_1,
SUM(ded.Union_Fund_2) As Union_Fund_2,
SUM(ded.Vehicle_Charges_Other) As Vehicle_Charges_Other,
SUM(ded.Vehicle_Charges_Teacher) As Vehicle_Charges_Teacher,
SUM(ded.Upkeep_Ded) As Upkeep_Ded,
SUM(ded.R_Leave_Without_Pay) As R_Leave_Without_Pay,
SUM(ded.Recovery_Gap_CA) As Recovery_Gap_CA,
SUM(ded.Income_Tax) As Income_Tax,
SUM(ded.Group_Insurance) As Group_Insurance,
SUM(ded.Other) As Other
FROM 
deduction ded, employee emp, department dept, campus camp 
WHERE emp.campus_id='$campID' AND emp.employee_code = ded.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID
GROUP BY dept.Department_ID
*/