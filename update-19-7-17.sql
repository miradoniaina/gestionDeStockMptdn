ALTER TABLE transfert ALTER COLUMN date_transfert TYPE timestamp without time zone; 

ALTER TABLE detail_transfert ALTER COLUMN date_recuperation TYPE timestamp without time zone;

ALTER TABLE retour_materiel ALTER COLUMN date_retour TYPE timestamp without time zone;