
CREATE TABLE Personnel
(
    id int IDENTITY(1,1) NOT NULL,
    Matricule varchar(4) COLLATE French_CI_AS NOT NULL,
    Nom varchar(200) COLLATE French_CI_AS NULL,
    Code_AgenceService_Sage varchar(4) COLLATE French_CI_AS NOT NULL,
    Numero_Compte_Bancaire varchar(26) COLLATE French_CI_AS NULL,
    Prenoms varchar(100) COLLATE French_CI_AS NULL,
    Qualification varchar(10) COLLATE French_CI_AS NULL,
    agence_service_irium_id int NULL,
    societe varchar(10) COLLATE French_CI_AS NULL
);

INSERT INTO 
Personnel
    (
    Matricule,
    Nom,
    Code_AgenceService_Sage,
    Numero_Compte_Bancaire,
    Prenoms,
    Qualification,
    agence_service_irium_id,
    societe
    )
VALUES
    (
        0012,
        'TEST D',
        'TES',
        123456789,
        'test',
        'oiu',
        18,
        'HFF'
);

--- nouveau colonne à ajouter dans la table Personnel pour la gestion des directions
ALTER TABLE Personnel ADD group_direction bit DEFAULT 0;