

CREATE TABLE agence_user (
	agence_id int NOT NULL,
	user_id int NOT NULL,
	CONSTRAINT PK__agence_user PRIMARY KEY (agence_id,user_id)
);

INSERT INTO
agence_user(agence_id, user_id)
VALUES (8,1)
