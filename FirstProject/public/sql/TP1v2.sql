#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: service
#------------------------------------------------------------

CREATE TABLE service(
        serviceid   Int  Auto_increment  NOT NULL ,
        serviceName Varchar (50) NOT NULL ,
        description Varchar (100) NOT NULL
	,CONSTRAINT service_PK PRIMARY KEY (serviceid)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        userid     Int  Auto_increment  NOT NULL ,
        lastname   Varchar (50) NOT NULL ,
        firstname  Varchar (50) NOT NULL ,
        birthdate  Date NOT NULL ,
        address    Text NOT NULL ,
        postalcode Int NOT NULL ,
        phone      Varchar (10) NOT NULL ,
        serviceid  Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (userid)

	,CONSTRAINT user_service_FK FOREIGN KEY (serviceid) REFERENCES service(serviceid)
)ENGINE=InnoDB;

