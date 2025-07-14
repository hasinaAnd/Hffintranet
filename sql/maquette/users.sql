CREATE TABLE users
(
    id INT IDENTITY (1, 1),
    nom_utilisateur VARCHAR(100),
    matricule INT,
    mail VARCHAR(255),
    personnel_id INT,
    agence_utilisateur INT,
    societe_id INT,
    date_creation DATE,
    date_modification DATE,
    CONSTRAINT PK_users_id PRIMARY KEY (id)
);

INSERT INTO
users
    (
    nom_utilisateur,
    matricule,
    mail,
    personnel_id,
    agence_utilisateur,
    societe_id,
    date_creation,
    date_modification
    )
VALUES
    (
        'testd',
        0012,
        'test@hff.mg',
        1,
        8,
        1,
        '2024-07-16',
        '2024-07-16'
    )