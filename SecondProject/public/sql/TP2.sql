#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: maritalStatus
#------------------------------------------------------------

CREATE TABLE maritalStatus(
        idMaritalStatus Int  Auto_increment  NOT NULL ,
        status          Varchar (50) NOT NULL
	,CONSTRAINT maritalStatus_PK PRIMARY KEY (idMaritalStatus)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        idClient        Int  Auto_increment  NOT NULL ,
        lastname        Varchar (50) NOT NULL ,
        firstname       Varchar (50) NOT NULL ,
        birthdate       Date NOT NULL ,
        address         Text NOT NULL ,
        postalcode      Varchar (5) NOT NULL ,
        phone           Varchar (10) NOT NULL ,
        idMaritalStatus Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (idClient)

	,CONSTRAINT client_maritalStatus_FK FOREIGN KEY (idMaritalStatus) REFERENCES maritalStatus(idMaritalStatus)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: credit
#------------------------------------------------------------

CREATE TABLE credit(
        idCredit     Int  Auto_increment  NOT NULL ,
        organization Varchar (50) NOT NULL ,
        amount       Double NOT NULL ,
        idClient     Int NOT NULL
	,CONSTRAINT credit_PK PRIMARY KEY (idCredit)

	,CONSTRAINT credit_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
)ENGINE=InnoDB;

