--ALTER TABLE materiel add column image character varying(75);

UPDATE materiel
   SET image='bureau-malgapan-3-marron-fonce.jpg'
 WHERE id_materiel=1;

UPDATE materiel
   SET image='bureau-malgapan-pm-3-tiroirs.JPG'
 WHERE id_materiel=2;

UPDATE materiel
SET image='table-ordi-jaune.jpg'
WHERE id_materiel=3;

UPDATE materiel
SET image='table-ordi-beige.jpg'
WHERE id_materiel=4;

UPDATE materiel
SET image='armoire-2-porte.jpg'
WHERE id_materiel=5;

UPDATE materiel
SET image='classeur-3-etage-gris.jpg'
WHERE id_materiel=6;

UPDATE materiel
SET image='fauteuil-accoudoir-noir.jpg'
WHERE id_materiel=7;

UPDATE materiel
SET image='chaise-accoudoir-noir.jpg'
WHERE id_materiel=8;