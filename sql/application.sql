--crée la table application
CREATE TABLE applications
(
    id INT IDENTITY (1, 1),
    nom VARCHAR(255) NOT NULL,
    code_app VARCHAR(3) NOT NULL,
    derniere_id VARCHAR(20),
    date_creation DATE NOT NULL,
    date_modification DATE NOT NULL,
    CONSTRAINT PK_applications_id PRIMARY KEY (id)
)

INSERT INTO
applications
    (
    nom,
    code_app,
    derniere_id,
    date_creation,
    date_modification
    )
VALUES
    (
        'DEMANDE D''ORDRE DE MISSION',
        'DOM',
        'DOM25070300',
        '2024-07-16',
        '2024-07-16'
);