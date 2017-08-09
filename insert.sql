---------INSERTION DEPARTEMENT
INSERT INTO departement(
            id_departement, departement)
    VALUES (1, 'DGDN');
INSERT INTO departement(
            id_departement, departement)
    VALUES (2, 'DGO');
INSERT INTO departement(
            id_departement, departement)
    VALUES (3, 'Cabinet');

INSERT INTO departement(
		id_departement, departement)
VALUES (4, 'SG');
	
--INSERTION DIRECTION


INSERT INTO direction(id_direction, id_departement, nom_direction)
    VALUES (1, null, 'Logistique et Patrimoine');

	INSERT INTO services(id_service, id_direction, service)
    VALUES (1, 1, 'Service Patrimoine');
		
		
		
	INSERT INTO services(id_service, id_direction, service)
    VALUES (2, 1, 'Service Logistique');
		
		
	INSERT INTO services(id_service, id_direction, service)
    VALUES (3, 1, 'Service Comptabilité Matières');
	

	
INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (2, 1, 'Juridique');

	INSERT INTO services(id_service, id_direction, service)
    VALUES (6,  2, 'Service législation');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 7, 2, 'Service Contentieux');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 8, 2, 'Service Environnement');
	

INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (3, 1, 'Gouvernance du numérique');

	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 9, 3, 'Service Planification et Coordination');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 10, 3, 'Service Orientation Technique');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 11, 3, 'Service des Usages et des contenus numériques');

INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (4, 1, 'Projets et du Partenariat');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 12, 4, 'Service Etude et conception');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 13, 4, 'Service Partenariat Public Privé');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 14, 4, 'Service Relation Extérieure');


INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (5, 1, 'Ecosystème et de l''intégration du numérique');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 15, 5, 'Service appropriation');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 16, 5, 'Service Base des données');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 17, 5, 'Service Statistique');


	
INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (6, 2, 'Vulgarisation des TIC');

	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 18, 6, 'Service Production des contenues');
	
		
		
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 19, 6, 'Service Suivi des projets');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 20, 6, 'Service d''appui interne');
	
	
INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (7, 2, 'Suivi Technique');

	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 21, 7, 'Service Développement des Infrastructures');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 22, 7, 'Service Suivi des Travaux');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (23,  7, 'Service Traitement et Analyse');

	
INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (8, 2, 'Systèmes d''information');

	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 24, 8, 'Service Veille Technologique');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (25, 8, 'Service Coordination E-gouvernance');
	INSERT INTO services(id_service, id_direction, service)
    VALUES ( 26, 8, 'Service Développement des Applicatifs');
	
INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (9, 2, 'Communication');

	INSERT INTO services(id_service, id_direction, service)
    VALUES (27,  9, 'Service Communication Interne');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (28, 9, 'Service Information Education et Communication');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (29, 9, 'Service Relation Publique');
	
	
INSERT INTO direction(id_direction , nom_direction)
VALUES (10, 'Direction Administrative et Financière');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (30,  10, 'Service Programmation,Suivi, Evaluation');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (31, 10, 'Service Comptabilité');
	INSERT INTO services(id_service, id_direction, service)
    VALUES (32, 10, 'Service Appui à l''Exécution budgétaire');
	
INSERT INTO direction(id_direction, id_departement, nom_direction)
VALUES (11, 4, 'Affaire Générales');
	

	
	/*
INSERT INTO departement(
        id_departement, nom_departement)
VALUES (2, 'SP DLP');


INSERT INTO departement(
            id_departement, nom_departement)
VALUES (3, 'DIRCAB');

INSERT INTO departement(
            id_departement, nom_departement)
VALUES (4, 'DGO');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (5, 'Secréteriat Général');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (6, 'Inspecteur non permanent');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (7, 'Inspecteur d''Etat Directeur CDE');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (8, 'CDE');	
	
INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (9, 'PRMP');	
	
	
INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (9, 'Budget');    --2

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (10, 'Chef du service comptabilité');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (11, 'Service Comptabilité (Solde)');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (12, 'Chef SAG');

INSERT INTO departement(
            id_departement, nom_departement)
    VALUES (13, 'secretariat SG');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (14, 'Chef Protocole');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (15, 'DAF');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (16, 'Secretariat DAF');

 INSERT INTO departement(
		id_departement, nom_departement)
VALUES (17, 'Audit Interne'); 

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (18, 'DSI');  --2

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (20, 'Programmation');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (21, 'Bureau du courier');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (22, 'Assistant DST');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (23, 'DST');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (24, 'DIRCOM');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (25, 'DVTIC');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (26, 'DRH');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (27, 'SFGC');  		/*2 	--2

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (28, 'SERVICE DVTIC');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (29, 'Salle de conférence');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (30, 'Affaire Générale');

INSERT INTO departement(
		id_departement, nom_departement)
VALUES (31, 'Secrétariat DGO/DVTIC/DSI');

*/
---------------------------------insertion fournisseur
INSERT INTO fournisseur(
             id_fournisseur, societe, sigle, web, adresse, code, nom, prenom, 
            poste, contact, mail)
    VALUES (1, 'Mass''in', '', '', 'Lot IV andravoahangy', '', 'RAKOTOMASS', 'masy', 
            'Vendeur', '034 46 566 65', 'massin@gmail.com');

INSERT INTO fournisseur(
             id_fournisseur, societe, sigle, web, adresse, code, nom, prenom, 
            poste, contact, mail)
    VALUES (2, 'Optimus', '', '', 'Lot V Behoririka', '', 'RAKOTOPTIM', 'mus', 
            'Directeur', '033 47 566 55', 'optimus@gmail.com');
			
INSERT INTO fournisseur(
             id_fournisseur, societe, sigle, web, adresse, code, nom, prenom, 
            poste, contact, mail)
    VALUES (3, 'It-tech', '', '', 'Lot VIII Behoririka', '', 'RAKOTOTECH', 'Hasina', 
            'Agent commerciaux', '033 44 566 55', 'hasina@gmail.com');
			
INSERT INTO fournisseur(
             id_fournisseur, societe, sigle, web, adresse, code, nom, prenom, 
            poste, contact, mail)
    VALUES (4, 'Elech-tech', '', '', 'Lot X Behoririka', '', 'RABETEKA', 'Tovo', 
            'Vendeur', '033 44 800 55', 'tovo@gmail.com');
			
			
--insert famille matériels
INSERT INTO famille(
             id_famille, famille)
    VALUES (1, 'Consommable de bureau');
	
INSERT INTO famille(
             id_famille, famille)
    VALUES (2, 'Produit Informatique');
	
INSERT INTO famille(
            id_famille, famille)
    VALUES (3, 'Consommable informatique');
	
INSERT INTO famille(
            id_famille, famille)
    VALUES (4, 'Meubles');
	
-- insertion unité
INSERT INTO unite(
             id_unite, unite)
    VALUES (1, 'nombre(s)');
	
INSERT INTO unite(
            id_unite, unite)
    VALUES (2, 'pièce(s)');
	
INSERT INTO unite(
             id_unite, unite)
    VALUES (3, 'litre(s)');

INSERT INTO unite(
             id_unite, unite)
    VALUES (4, 'packet(s)');
	
INSERT INTO unite(
             id_unite, unite)
    VALUES (5, 'carton(s)');

INSERT INTO unite(
             id_unite, unite)
    VALUES (6, 'unité(s)');
--insertion matériels

INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (1, 1, 4, 'refbureaumalgapan', 'bureau malgapan trois tiroirs couleur marron foncé', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (2, 1, 4, 'refbureaumalgapan2', 'table malgapan PM 3 tiroirs couleur marron', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (3, 1, 4, 'reftableordinateur1', 'table ordinateur couleur Jaune', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (4, 1, 4, 'reftableordinateur2', 'table ordinateur couleur Beige PM', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (5, 1, 4, 'refarmoire2p', 'armoire 2 portes couleur  marron claire', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (6, 1, 4, 'refarmoire2p1', 'classeur de rangement 3 étage couleur gris', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (7, 1, 4, 'reffautteuil', 'fauteuil avec accoudoir cuir noir', 
            '');
			
INSERT INTO materiel(
            id_materiel, id_unite, id_famille, reference_materiel, designation,details_materiel)
    VALUES (8, 1, 4, 'refchaise', 'chaise en cuir noir  avec accoudoir', 
            '');
			
			
-----------insertion role
INSERT INTO role(
            id_role_personnel, role)
    VALUES (1, 'super-admin');

INSERT INTO role(
            id_role_personnel, role)
    VALUES (2, 'admin');
	
INSERT INTO role(
            id_role_personnel, role)
    VALUES (3, 'chef de département');
	
INSERT INTO role(
            id_role_personnel, role)
    VALUES (4, 'simple employé');
	
--INSERT INTO PORTE
	
INSERT INTO porte(id_porte, id_direction, numero)
    VALUES (1, 8, '116');
    
		
INSERT INTO porte(id_porte, id_direction, numero)
		VALUES (2, 8, '116 bis');
		
INSERT INTO porte(
             id_porte , numero)
		VALUES (3, '117');
		
INSERT INTO porte(id_porte, id_direction, numero)
		VALUES (4, 9, '204');
		
		
INSERT INTO porte(id_porte, id_direction, numero)
		VALUES (5, 10, '107');

		
INSERT INTO porte(id_porte, id_direction, numero)
		VALUES (6, 10, '106');

INSERT INTO porte(id_porte, id_direction, numero)
		VALUES (7, 11, '112');
	
--insertion personnel
			
INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (1, 29, 1, 3, '339 708', 'ANDRIAMANANJARA', 
            'Noronirina Lalaina', '034 02 792 17', 'noronirina@gmail.com', 'itu', '', 'Assistante DGO');
			
INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (2, 18, 1, 3, '293 875', 'SAHOLINIRINA', 
            'Felicité', '034 02 191 22', 'felicite@gmail.com', 'itu', '', 'Secretaire DVTIC');
			
INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (3, 26, 1, 3, '375 309', 'RANDRIAMAHEFA', 
            'Ainarijaona Rado', '033 01 694 68', 'rado@gmail.com', 'itu', '', 'Assitant DSI');
			

INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (4, 32, 1, 5, '293 806', 'RAVELOARISOA', 
            'Juliette', '', 'juliette@gmail.com', 'itu', '', 'Assitant');

INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (5, 31, 1, 5, '376 639', 'Linah Harizo', 
            'Nantenaina', '', 'harizo@gmail.com', 'itu', '', 'Gestionnaire');
			
INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (6, 31, 1, 5, '375 757', 'RAVAKA', 
            'Julie', '', 'ravaka@gmail.com', 'itu', '', '');

INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (7, 32, 1, 6, '3 923', 'RANDRIAMISAINA', 
            'Hanitriniala Tantelinjatovo', '', 'tantely@gmail.com', 'itu', '', '');
			
INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (8, 32, 1, 6, '', 'RAKOTOZAFY', 
            'Bodonavalona', '', 'bodo@gmail.com', 'itu', '', '');
			
INSERT INTO personnel(
            id_personnel, id_service, id_role_personnel, id_porte, matricule, 
            nom, prenom, contact, email, mdp, detenteur, poste)
    VALUES (9, 32, 1, 6, '', 'RANDRIANAVALONA', 
            'Jean Claude', '', 'claude@gmail.com', 'itu', '', '');
		
--sequence
ALTER SEQUENCE departement_id_departement_seq RESTART WITH 5;
ALTER SEQUENCE direction_id_direction_seq RESTART WITH 12;
ALTER SEQUENCE famille_id_famille_seq RESTART WITH 5;
ALTER SEQUENCE fournisseur_id_fournisseur_seq RESTART WITH 5;
ALTER SEQUENCE materiel_id_materiel_seq RESTART WITH 9;
ALTER SEQUENCE personnel_id_personnel_seq RESTART WITH 10;
ALTER SEQUENCE porte_id_porte_seq RESTART WITH 8;
ALTER SEQUENCE role_id_role_personnel_seq RESTART WITH 5;
ALTER SEQUENCE services_id_service_seq RESTART WITH 33;
ALTER SEQUENCE unite_id_unite_seq RESTART WITH 7;