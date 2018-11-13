/*queries that reflect on what we want the website to do.
Will add website integration later
*/

/*shows all the tools available in a certain box.
The number should be what the user picks
*/
select *
from tool
where tool.box_id = '01'

/*shows employee id, name, photo, and tool id of employees who did not check back in a tool
Checks for time_out is NULL because that means the tool wasn't returned
*/
select employee.e_id, e_name, tool_id, employee.photo
from employee, checksOut
where checksOut.time_out IS NULL;

/*same as above but puts result in a view table.
This way might be easier to record results.
*/
create view returned as
select employee.e_id, e_name, tool_id, employee.photo
from employee, checksOut
where checksOut.time_out IS NULL;

select *
from returned;

/*shows employee name and photo.
For login in, as employees insert their id and password
*/
select S.e_name, S.photo
from employee as S, employee as T
where S.e_id = T.e_id and S.password = T.password;
