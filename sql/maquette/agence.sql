

CREATE TABLE agences
(
    id int IDENTITY(1,1) NOT NULL,
    code_agence varchar(2) COLLATE French_CI_AS NULL,
    libelle_agence varchar(255) COLLATE French_CI_AS NULL,
    date_creation date NULL,
    date_modification date NULL,
    CONSTRAINT PK_agence_id PRIMARY KEY (id)
);

INSERT INTO
agences
    (
    code_agence, libelle_agence, date_creation, date_modification
    )
VALUES
    ('01', 'ANTANANARIVO', '2024-06-27', '2025-05-19'),
    ('02', 'CESSNA IVATO', '2024-06-27', '2024-06-27'),
    ('20', 'FORT DAUPHIN', '2024-06-27', '2024-06-27'),
    ('30', 'AMBATOVY', '2024-06-27', '2024-06-27'),
    ('40', 'TAMATAVE', '2024-06-27', '2024-06-27'),
    ('50', 'RENTAL', '2024-06-27', '2025-02-03'),
    ('60', 'PNEU - OUTIL - LUB', '2024-06-27', '2024-06-27'),
    ('80', 'ADMINISTRATION', '2024-06-27', '2024-06-27'),
    ('90', 'COMM ENERGIE', '2024-06-27', '2024-06-27'),
    ('91', 'ENERGIE DURABLE', '2024-06-27', '2024-06-27'),
    ('92', 'ENERGIE JIRAMA', '2024-06-27', '2024-06-27'),
    ('C1', 'TRAVEL AIRWAYS', '2025-02-25', '2025-02-25')
;




