ALTER TABLE mvt_de_stock ALTER COLUMN date_mvt TYPE timestamp without time zone;

CREATE VIEW materiel_unite_view AS SELECT m.*,u.unite FROM materiel m JOIN unite u ON m.id_unite=u.id_unite;

CREATE VIEW mvt_stock_materiel_view AS SELECT mvt_stock.*,m.designation FROM mvt_de_stock mvt_stock JOIN materiel m ON m.id_materiel = mvt_stock.id_materiel;