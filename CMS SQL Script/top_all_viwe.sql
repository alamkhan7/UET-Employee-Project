SELECT DISTINCT
Camp.Campus_ID,
Camp.campus,
Emp.staff,
Emp.Fix,
SUM(Allow.Basic_Pay),
SUM(Allow.Fixed_Pay),
SUM(Allow.Personal_Pay),
SUM(Allow.Hreant1_All),
SUM(Allow.Hrent_Sub_All),
SUM(Allow.Convence_All),
SUM(Allow.Adhoc_Rel_2010),
SUM(Allow.Computer_All),
SUM(Allow.Private_All),
SUM(Allow.Extra_All),
SUM(Allow.Senior_p_All),
SUM(Allow.Med_All),
SUM(Allow.ENT_All),
SUM(Allow.Dean_All),
SUM(Allow.intgrated_All),
SUM(Allow.Spec_Add_All),
SUM(Allow.Teach_All),
SUM(Allow.Orderly_All),
SUM(Allow.Oth_All),
SUM(Allow.Brain_Drain),
SUM(Allow.ARA_2016_10PERCENT)
FROM allowance Allow, employee Emp, campus Camp
WHERE Allow.employee_code=Emp.employee_code AND Emp.campus_id=Camp.campus_id
GROUP BY Emp.campus_id