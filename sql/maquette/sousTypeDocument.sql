CREATE TABLE Sous_type_document
(
    ID_Sous_Type_Document INT IDENTITY (1, 1),
    Code_Document VARCHAR(4),
    Code_Sous_type VARCHAR(50),
    date_creation DATE NOT NULL,
    date_modification DATE NOT NULL,
    CONSTRAINT PK_sous_type_document PRIMARY KEY (ID_Sous_Type_Document),
);


INSERT INTO 
Sous_type_document
    (
    Code_Document,
    Code_Sous_Type,
    date_creation,
    date_modification
    )
VALUES
    (
        'ORM',
        'MISSION',
        '2024-07-16',
        '2024-07-16'
),
    (
        'ORM',
        'COMPLEMENT',
        '2024-07-16',
        '2024-07-16'
),
    (
        'ORM',
        'MUTATION',
        '2024-07-16',
        '2024-07-16'
),
    (
        'ORM',
        'FRAIS EXCEPTIONNEL',
        '2024-07-16',
        '2024-07-16'
),
    (
        'ORM',
        'TROP PERCU',
        '2024-07-16',
        '2024-07-16'
)
;