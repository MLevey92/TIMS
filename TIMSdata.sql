/*sample data that can be used to test the database
Feel free to add any entries to give our tables some size
Also, I used a lot of placeholders in the entries,
so if anybody knows how to make the data more realistic as far as military ID's... feel free to edit
*/

delete from employee;
insert into employee values(1000, 'Bob', 'division1', 1);

delete from supervisor;
insert into supervisor values(1000, 2001);

delete from checksOut;
insert into checksOut values(10001, 01, 'division1', '2018-07-20 08:10:58', '2018-07-21 10:38:32', 1000, '1234567');

delete from division;
insert into division values('division1', 'location', '1234567')

delete from tool;
insert into tool values(10001, 01, 'division1', 'wrench');

delete from maintAction;
insert into maintAction values('1234567', 'aircraft1');

