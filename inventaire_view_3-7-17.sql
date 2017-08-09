CREATE VIEW entree_inventaire_view AS SELECT mvt.id_materiel, SUM(mvt.quantite) quantite_total_entree From mvt_de_stock mvt WHERE type = 'entrée' GROUP BY mvt.id_materiel ;



CREATE VIEW sortie_view_inventaire AS SELECT mvt.id_materiel, SUM(mvt.quantite) quantite_total_sortie From mvt_de_stock mvt WHERE type = 'sortie' GROUP BY mvt.id_materiel;

CREATE VIEW quantite_stock_restant AS SELECT entree.id_materiel, (entree.quantite_total_entree - quantite_total_sortie) quantite_restant FROM entree_inventaire_view entree JOIN sortie_view_inventaire sortie ON entree.id_materiel = sortie.id_materiel; 

CREATE VIEW inventaire_view AS SELECT qr.*, m.reference_materiel, m.designation, u.unite FROM quantite_stock_restant qr JOIN materiel m ON qr.id_materiel = m.id_materiel JOIN unite u ON u.id_unite = m.id_unite;



------------------------------Last inventaire
  SELECT entree.id_materiel,
    entree.quantite_total_entree - sortie.quantite_total_sortie AS quantite_restant, m.reference_materiel, m.designation, u.unite
    FROM (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt < '2017-04-06'
  GROUP BY mvt.id_materiel) entree JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt < '2017-04-06'
  GROUP BY mvt.id_materiel) sortie ON entree.id_materiel = sortie.id_materiel JOIN materiel m ON entree.id_materiel = m.id_materiel JOIN unite u ON u.id_unite = m.id_unite;
  
  -----------------------------------Last etat mvt stock
  
SELECT entree.id_materiel, m.reference_materiel, m.designation,
    entree.quantite_total_entree - sortie.quantite_total_sortie AS quantite_initiale , etat_entree.entree, etat_sortie.sortie, (((entree.quantite_total_entree - sortie.quantite_total_sortie) + etat_entree.entree) - etat_sortie.sortie) quantite_finale, u.unite  
    FROM (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt < '2017-7-7'
  GROUP BY mvt.id_materiel) entree JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt < '2017-7-7'
  GROUP BY mvt.id_materiel) sortie ON entree.id_materiel = sortie.id_materiel JOIN materiel m ON entree.id_materiel = m.id_materiel JOIN unite u ON u.id_unite = m.id_unite JOIN (SELECT 
    mvt.id_materiel, sum(mvt.quantite) AS entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt > '2016-7-7' AND mvt.date_mvt < '2017-7-7'  GROUP BY mvt.id_materiel) AS etat_entree ON etat_entree.id_materiel = entree.id_materiel JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt > '2016-7-7' AND mvt.date_mvt < '2017-7-7'  GROUP BY mvt.id_materiel) AS etat_sortie ON etat_sortie.id_materiel = entree.id_materiel;  
 


  