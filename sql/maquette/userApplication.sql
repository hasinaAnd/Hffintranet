

CREATE TABLE users_applications (
	user_id int NOT NULL,
	application_id int NOT NULL,
	CONSTRAINT PK_users_applications PRIMARY KEY (user_id,application_id)
);

INSERT INTO
users_applications(user_id, application_id)
VALUES (1,1)

