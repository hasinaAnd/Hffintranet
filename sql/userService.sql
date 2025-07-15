

CREATE TABLE users_service (
	user_id int NOT NULL,
	service_id int NOT NULL,
	CONSTRAINT PK_users_service PRIMARY KEY (user_id,service_id)
);


INSERT INTO HFF_INTRANET.dbo.users_service
(user_id, service_id)
VALUES(1, 13);