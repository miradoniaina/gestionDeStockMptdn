ALTER TABLE personnel ALTER COLUMN mdp TYPE character varying(255); 
--ALTER TABLE personnel ADD COLUMN salt char(22); 


UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=1;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=2;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=3;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=4;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=5;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=6;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=7;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=8;
 
 UPDATE personnel
   SET mdp='$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq', salt='s1s2s3s5s4s8s6s5s3s2s6'
 WHERE id_personnel=9;
 
