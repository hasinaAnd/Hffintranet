-- Créer la table roles avec une contrainte de clé primaire nommée
CREATE TABLE roles
(
    id INT IDENTITY (1, 1),
    role_name VARCHAR(255) NOT NULL,
    date_creation DATE,
    date_modification DATE,
    CONSTRAINT PK_roles_id PRIMARY KEY (id)
);

INSERT INTO 
roles
    (
    role_name,
    date_creation,
    date_modification
    )
VALUES
    (
        'ADMINISTRATEUR',
        '2024-07-16',
        '2024-07-16'
),
    (
        'VALIDATEUR',
        '2024-07-16',
        '2024-07-16'
),
    (
        'UTILISATEUR',
        '2024-07-16',
        '2024-07-16'
),
    (
        'ROLE_ATELIER',
        '2024-07-16',
        '2024-07-16'
),
    (
        'ROLE_ENERGIE',
        '2024-07-16',
        '2024-07-16'
),
    (
        'MULTI-SUCURSALES',
        '2024-07-16',
        '2024-07-16'
),
    (
        'SUPER ADMINISTRATEUR',
        '2024-07-16',
        '2024-07-16'
),
    (
        'INTERVENANT',
        '2024-07-16',
        '2024-07-16'
),
    (
        'PROFIL_CHEF_ATELIER',
        '2024-07-16',
        '2024-07-16'
)
;