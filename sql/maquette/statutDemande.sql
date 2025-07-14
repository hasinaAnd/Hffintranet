
CREATE TABLE Statut_demande
(
    ID_Statut_Demande int IDENTITY(1,1) NOT NULL,
    Code_Application varchar(3) COLLATE French_CI_AS NOT NULL,
    Code_Statut varchar(3) COLLATE French_CI_AS NULL,
    Description nvarchar(100) COLLATE French_CI_AS NULL,
    Date_creation date NOT NULL,
    date_modification date NULL
);

INSERT INTO 
Statut_demande
    (Code_Application, Code_Statut, Description, Date_creation, date_modification)
VALUES
    ('DOM', 'OUV', 'OUVERT', '2024-01-26', ''),
    ('DOM', 'ENC', 'ENCOURS', '2024-01-26', ''),
    ('DOM', 'CLO', 'CLOTURE', '2024-01-26', ''),
    ('DOM', 'CPT', 'COMPTA', '2024-02-10', ''),
    ('DOM', 'PAY', 'PAYE', '2024-02-10', ''),
    ('DOM', 'ANN', 'ANNULE', '2024-02-27', ''),
    ('DOM', 'ANN', 'ANNULE CHEF DE SERVICE', '2024-05-08', ''),
    ('DOM', 'ANN', 'ANNULE COMPTABILITE', '2024-05-08', ''),
    ('DOM', 'ANN', 'ANNULE SECRETARIAT RH', '2024-05-08', ''),
    ('DOM', 'OUV', 'ATTENTE PAIEMENT', '2024-05-08', ''),
    ('DOM', 'OUV', 'CONTROLE SERVICE', '2024-05-08', ''),
    ('DOM', 'OUV', 'VALIDATION DG', '2024-05-08', ''),
    ('DOM', 'OUV', 'VALIDATION RH', '2024-05-08', ''),
    ('DOM', 'OUV', 'VALIDE COMPTABILITE', '2024-05-08', ''),
    ('DOM', 'OUV', 'VALIDE', '2024-05-08', ''),
    ('DOM', 'OUV', 'PRE-CONTROLE ATELIER', '2024-06-11', ''),
    ('DOM', 'OUV', 'VALIDATION COMPTA', '2024-06-11', ''),
    ('DOM', 'ANN', 'ANNULE RH', '2024-06-11', ''),
    ('DOM', 'OUV', 'ATTENTE PAIEMENT', '2024-06-11', '');