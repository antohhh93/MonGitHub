SET SERVEROUTPUT ON SIZE UNLIMITED;
drop role adm;
create role adm identified by chicharito;

/** ********************************** mon Dictionnaire ********************************************* **/
/** affichage de la structure **/
desc dictionary;
/** afficher tout a table dictionnaire **/
select *  from DICTIONARY;

/** 1 - DBA_ROLE_PRIVS : décrit les rôles accordés à tous les utilisateurs et rôles dans la base de données. **/
select *  from DICTIONARY
where TABLE_NAME = 'DBA_ROLE_PRIVS' ;

/** 2 - DBA_CATALOG affiche toutes les tables, clusters, vues, synonymes et séquences dans l'ensemble de la base de données.**/
select *  from DICTIONARY
where TABLE_NAME = 'DBA_CATALOG' ;

/** 3 - DBA_TABLES décrit toutes les tables relationnelles dans la base de données. Ses colonnes sont les mêmes que celles de ALL_TABLES.
Pour collecter des statistiques pour cette vue, utilisez l' ANALYZEinstruction SQL. **/
select *  from DICTIONARY
where TABLE_NAME = 'DBA_TABLES' ;

/** 4 -  DBA_VIEWS décrit toutes les vues de la base de données. Ses colonnes sont les mêmes que celles de ALL_VIEWS. **/
select *  from DICTIONARY
where TABLE_NAME = 'DBA_VIEWS' ;

/** 5 - DBA_ERRORSdécrit les erreurs actuelles sur tous les objets stockés
(vues, procédures, fonctions, packages et corps de package) dans la base de données. Ses colonnes sont les mêmes que celles de "ALL_ERRORS" . **/
select *  from DICTIONARY
where TABLE_NAME = 'DBA_ERRORS' ;


GRANT SELECT  ON  EMP TO  ADM ;
savepoint grant_adm;

select * from role_tab_privs WHERE role = UPPER( 'adm');

/** ****************************!!pour enlever un privilege !! ***************************************** **/

/**REVOKE ADM  FROM ZDJELLAL;**/
REVOKE ADM from ZDJELLAL;

/** annuler le revoke :) **/
ROLLBACK grant_adm;

/** =========================================!! ALL_USERS !!========================================================== **/

/** on parcourt un peu la tale all_users :
a) pour selectionner tout les users **/

select * from all_users; 
/** b) pour selectionner un seules user **/
select * from all_users
where username = upper('ZDJELLAL');

/** pour LA structure **/
desc ALL_USERS;
 
/** =========================================!! ALL_CATALOG !!========================================================== **/
SELECT * FROM ALL_CATALOG
WHERE OWNER = UPPER('ZDJELLAL');

/** structure **/
desc ALL_CATALOG;
/** =========================================!! ALL_PRIVIGLEGE !!========================================================== **/

 SELECT * FROM ALL_TAB_PRIVS
 WHERE GRANTOR = UPPER('ZDJELLAL');
 /** STRUCTURE **/
 desc ALL_TAB_PRIVS;
 
 /** ========================================!! ALL_TRIGGER !!============================================================= **/

/** A) structure **/
desc ALL_TRIGGERS;

SELECT * FROM ALL_TRIGGERS
WHERE OWNER = 'ZDJELLAL';
/** AFFICHE TOU LES TRIGGERS CREER AVEC LES INFORMATION CONCERNANT CE DERNIER ! **/
 