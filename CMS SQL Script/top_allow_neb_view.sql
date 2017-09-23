select distinct
emp.campus_id,
camp.campus,
dept.department_name,
emp.staff,
emp.fix,
sum(allow.Basic_Pay),
sum(allow.Fixed_Pay),
SUM(allow.Basic_Pay),
SUM(allow.Fixed_Pay),
SUM(allow.Personal_Pay),
SUM(allow.Hreant1_All),
SUM(allow.Hrent_Sub_All),
SUM(allow.Convence_All),
SUM(allow.Adhoc_Rel_2010),
SUM(allow.Computer_All),
SUM(allow.Private_All),
SUM(allow.Extra_All),
SUM(allow.Senior_p_All),
SUM(allow.Med_All),
SUM(allow.ENT_All),
SUM(allow.Dean_All),
SUM(allow.intgrated_All),
SUM(allow.Spec_Add_All),
SUM(allow.Teach_All),
SUM(allow.Orderly_All),
SUM(allow.Oth_All),
SUM(allow.Brain_Drain),
SUM(allow.ARA_2016_10PERCENT),
sum(net.Gross_pay)
from allowance allow, employee emp, employee_nebqasid empneb, department dept, campus camp, netsalary net
where emp.employee_code=empneb.employee_code AND allow.employee_code=emp.employee_code and empneb.department_id=dept.department_id
and camp.campus_id=emp.campus_id and emp.employee_code=net.employee_code
group by dept.department_id