

CREATE TABLE user_roles
(
    user_id int NOT NULL,
    role_id int NOT NULL,
    CONSTRAINT PK__user_roles PRIMARY KEY (user_id,role_id)
);

INSERT INTO user_roles
    (user_id, role_id)
VALUES(1, 1);