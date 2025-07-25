

CREATE TABLE Demande_ordre_mission (
	ID_Demande_Ordre_Mission int IDENTITY(1,1) NOT NULL,
	Numero_Ordre_Mission varchar(11) COLLATE French_CI_AS NOT NULL,
	Date_Demande date NOT NULL,
	Type_Document varchar(10) COLLATE French_CI_AS NOT NULL,
	Sous_Type_Document int NULL,
	Autre_Type_Document varchar(50) COLLATE French_CI_AS NULL,
	Matricule varchar(50) COLLATE French_CI_AS NULL,
	Nom_Session_Utilisateur varchar(100) COLLATE French_CI_AS NOT NULL,
	Code_AgenceService_Debiteur varchar(6) COLLATE French_CI_AS NULL,
	Date_Debut date NOT NULL,
	Heure_Debut varchar(5) COLLATE French_CI_AS NOT NULL,
	Date_Fin date NOT NULL,
	Heure_Fin varchar(5) COLLATE French_CI_AS NOT NULL,
	Nombre_Jour int NULL,
	Motif_Deplacement varchar(100) COLLATE French_CI_AS NOT NULL,
	Client varchar(100) COLLATE French_CI_AS NOT NULL,
	Numero_OR varchar(50) COLLATE French_CI_AS NULL,
	Lieu_Intervention varchar(100) COLLATE French_CI_AS NOT NULL,
	Vehicule_Societe varchar(3) COLLATE French_CI_AS NOT NULL,
	Indemnite_Forfaitaire varchar(50) COLLATE French_CI_AS NULL,
	Total_Indemnite_Forfaitaire varchar(50) COLLATE French_CI_AS NULL,
	Motif_Autres_depense_1 varchar(50) COLLATE French_CI_AS NULL,
	Autres_depense_1 varchar(50) COLLATE French_CI_AS NULL,
	Motif_Autres_depense_2 varchar(50) COLLATE French_CI_AS NULL,
	Autres_depense_2 varchar(50) COLLATE French_CI_AS NULL,
	Motif_Autres_depense_3 varchar(50) COLLATE French_CI_AS NULL,
	Autres_depense_3 varchar(50) COLLATE French_CI_AS NULL,
	Total_Autres_Depenses varchar(50) COLLATE French_CI_AS NULL,
	Total_General_Payer varchar(50) COLLATE French_CI_AS NULL,
	Mode_Paiement varchar(50) COLLATE French_CI_AS NULL,
	Piece_Jointe_1 varchar(50) COLLATE French_CI_AS NULL,
	Piece_Jointe_2 varchar(50) COLLATE French_CI_AS NULL,
	Piece_Jointe_3 varchar(50) COLLATE French_CI_AS NULL,
	Utilisateur_Creation varchar(50) COLLATE French_CI_AS NOT NULL,
	Utilisateur_Modification varchar(50) COLLATE French_CI_AS NULL,
	Date_Modif date NULL,
	Code_Statut varchar(3) COLLATE French_CI_AS NULL,
	Numero_Tel varchar(10) COLLATE French_CI_AS NULL,
	Nom varchar(100) COLLATE French_CI_AS NULL,
	Prenom varchar(100) COLLATE French_CI_AS NULL,
	Devis varchar(3) COLLATE French_CI_AS NULL,
	LibelleCodeAgence_Service varchar(50) COLLATE French_CI_AS NULL,
	Fiche varchar(50) COLLATE French_CI_AS NULL,
	NumVehicule varchar(50) COLLATE French_CI_AS NULL,
	Doit_indemnite varchar(50) COLLATE French_CI_AS NULL,
	Categorie varchar(50) COLLATE French_CI_AS NULL,
	Site varchar(50) COLLATE French_CI_AS NULL,
	idemnity_depl varchar(50) COLLATE French_CI_AS NULL,
	Date_CPT date NULL,
	Date_PAY date NULL,
	Date_ANN date NULL,
	Emetteur varchar(50) COLLATE French_CI_AS NULL,
	Debiteur varchar(50) COLLATE French_CI_AS NULL,
	ID_Statut_Demande int NULL,
	Date_heure_modif_statut datetime NULL,
	agence_emetteur_id int NULL,
	service_emetteur_id int NULL,
	agence_debiteur_id int NULL,
	service_debiteur_id int NULL,
	site_id int NULL,
	category_id int NULL
);