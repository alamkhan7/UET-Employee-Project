CREATE DEFINER=`root`@`localhost` TRIGGER `university`.`deduction_AFTER_DELETE` AFTER DELETE ON `deduction` FOR EACH ROW
BEGIN

declare id int ;
select old.Employee_Code into id ;

/*
Check if employee record already deleted or not?
 
SELECT 1 FROM MyTable WHERE... LIMIT 1
use select 1 to to prevent the checking of unnecessary fields.
uss LIMIT 1 to prevent the checking of unnecessary rows.
*/
IF EXISTS ( SELECT 1 FROM netsalary WHERE Employee_Code = id LIMIT 1)
THEN
    DELETE FROM netsalary WHERE Employee_Code=id; 
END IF;

END