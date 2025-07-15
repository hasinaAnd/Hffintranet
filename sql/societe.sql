
CREATE TABLE societe (
	id int IDENTITY(1,1) NOT NULL,
	nom varchar(255) COLLATE French_CI_AS NULL,
	code_societe varchar(2) COLLATE French_CI_AS NULL,
	date_creation date NOT NULL,
	date_modification date NOT NULL,
	CONSTRAINT PK_societe PRIMARY KEY (id)
);

INSERT INTO
societe (nom, code_societe, date_creation, date_modification)
VALUES ('HENRI FRAISE FIS & CIE',	'HF',	'2024-06-27', 	'2024-06-27')