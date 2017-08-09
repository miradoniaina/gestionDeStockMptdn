--ALTER TABLE mvt_de_stock ALTER COLUMN date_mvt TYPE timestamp without time zone;

INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (1, 1, null, null, 3
            , 'entrée', '2017-1-3', 'commentaire');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (2, 1, null, null, 4
            , 'entrée', '2017-1-29', 'commentaire');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (3, 1, null, null, 5
            , 'entrée', '2017-2-2', 'commentaire');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (4, 1, null, null, 2
            , 'sortie', '2017-3-2', 'commentaire sortie');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (5, 1, null, null, 1
            , 'sortie', '2017-3-3', 'commentaire sortie');
			

INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (6, 2, null, null, 4
            , 'entrée', '2017-2-3', 'commentaire entrée');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (7, 2, null, null, 5
            , 'entrée', '2017-2-20', 'commentaire');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (8, 2, null, null, 7
            , 'entrée', '2017-3-2', 'commentaire');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (9, 2, null, null, 2
            , 'sortie', '2017-4-5', 'commentaire sortie');
			
INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (10, 2, null, null, 4
            , 'sortie', '2017-4-6', 'commentaire sortie');
		

--sequence
ALTER SEQUENCE mvt_de_stock_id_mvt_stock_seq RESTART WITH 11;
