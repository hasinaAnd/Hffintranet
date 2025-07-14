

CREATE TABLE agence_service (
	agence_id int NOT NULL,
	service_id int NOT NULL,
	CONSTRAINT PK_agence_service PRIMARY KEY (agence_id,service_id)
);


-- ALTER TABLE agence_service ADD CONSTRAINT FK_agence_service_agence_id FOREIGN KEY (agence_id) REFERENCES agences(id);
-- ALTER TABLE agence_service ADD CONSTRAINT FK_agence_service_service_id FOREIGN KEY (service_id) REFERENCES services(id);


INSERT INTO agence_service
(agence_id, service_id)
VALUES
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,7),
(1,31),
(1,36),
(1,37),
(2,1),
(2,3),
(2,9),
(3,1),
(3,3),
(3,37),
(4,1),
(4,3),
(4,8),
(4,31),
(5,1),
(5,3),
(5,9),
(5,31),
(5,40),
(6,9),
(6,24),
(6,25),
(6,26),
(6,41),
(6,42),
(6,47),
(7,1),
(7,3),
(7,37),
(8,10),
(8,11),
(8,12),
(8,13),
(8,14),
(8,15),
(8,16),
(8,17),
(9,2),
(9,46),
(10,33),
(10,34),
(10,35),
(10,45),
(11,27),
(11,28),
(11,29),
(11,30),
(11,43),
(11,44),
(12,48);