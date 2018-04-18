drop table if exists jou;
drop table if exists info_sport;


create table jou(
id_jou integer not null primary key auto_increment,
nom_jou varchar(20) not null ,
age_jou integer,
date_enre_jou datetime ,
sport_jou varchar(30) not null , 
foreign key(sport_jou) references info_sport (nom_sport) on delete cascade
);
create table info_sport 
(
id_sport int not null primary key auto_increment,
nom_sport varchar(30) not null,
pop_sport int
)

ENGINE=innoDB;