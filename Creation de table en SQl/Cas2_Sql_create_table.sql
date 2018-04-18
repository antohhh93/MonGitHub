drop table if exists emp;

/**create table emp
(
matrEmp integer primary key not null,
nomEmp varchar(30) not null,
posteEmp varchar(40),
dateEmbE date ,
supEmp int , 
salaireEmp int ,
commieEmp varchar(30),
numDeptEmp int(2),
foreign key(matrEmp) references emp (supEmp),
foreign key(numDeptEmp) references dept(numdept)
);
ALTER TABLE `emp` ENGINE=InnoDB;
**/
	
create table jou(
id_jou integer not null primary key auto_increment,
nom_jou varchar(20) not null ,
age_jou integer,
date_enre_jou datetime 

);