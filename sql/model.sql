-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'users'
-- 
-- ---

DROP TABLE IF EXISTS `users`;
		
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `anniversaire` DATE NOT NULL,
  `adresse` VARCHAR(100) NOT NULL,
  `code_postal` VARCHAR(50) NOT NULL,
  `ville_id` INT NOT NULL,
  `telephone` VARCHAR(50) NOT NULL,
  `telephone_portable` VARCHAR(50) NOT NULL,
  `courriel` VARCHAR(100) NOT NULL,
  `mdp` VARCHAR(100) NOT NULL,
  `privilege_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`courriel`)
);

-- ---
-- Table 'privileges'
-- 
-- ---

DROP TABLE IF EXISTS `privileges`;
		
CREATE TABLE `privileges` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pri_role_fr` VARCHAR(50) NOT NULL,
  `pri_role_en` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'journal_connexions'
-- 
-- ---

DROP TABLE IF EXISTS `journal_connexions`;
		
CREATE TABLE `journal_connexions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `jc_date` DATE NOT NULL,
  `jc_adresse_IP` VARCHAR(100) NOT NULL,
  `jc_utilisateur_id` INT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'voitures'
-- 
-- ---

DROP TABLE IF EXISTS `voitures`;
		
CREATE TABLE `voitures` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `annee` YEAR NOT NULL,
  `modele_id` INT NOT NULL,
  `date_arrivee` DATE NOT NULL,
  `employe_id` INT NOT NULL,
  `prix_base` DOUBLE NOT NULL,
  `taux_augmenter` DOUBLE NOT NULL,
  `commande_id` INT NOT NULL,
  `prix_paye` DOUBLE NOT NULL,
  `pays_id` INT NOT NULL,
  `description_en` VARCHAR(100) NOT NULL,
  `description_fr` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'user_reserves'
-- 
-- ---

DROP TABLE IF EXISTS `user_reserves`;
		
CREATE TABLE `user_reserves` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ur_utilisateur_id` INT NOT NULL,
  `ur_voiture_id` INT NOT NULL,
  `date_reserver` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'commandes'
-- 
-- ---

DROP TABLE IF EXISTS `commandes`;
		
CREATE TABLE `commandes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `commande_utilisateur_id` INT NOT NULL,
  `date_commande` DATE NOT NULL,
  `mode_paiement_id` INT NOT NULL,
  `expedition_id` INT NOT NULL,
  `statut_id` INT NOT NULL,
  `taxe_rate_paye` DOUBLE NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'taxes'
-- 
-- ---

DROP TABLE IF EXISTS `taxes`;
		
CREATE TABLE `taxes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `taxe_province_id` INT NOT NULL,
  `TVP/TVQ` DECIMAL NOT NULL,
  `TPS` INT NOT NULL,
  `TVH` INT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'photos'
-- 
-- ---

DROP TABLE IF EXISTS `photos`;
		
CREATE TABLE `photos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `photo_titre` VARCHAR(100) NOT NULL,
  `photo_voiture_id` INT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'provinces'
-- 
-- ---

DROP TABLE IF EXISTS `provinces`;
		
CREATE TABLE `provinces` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `privince_en` VARCHAR(50) NOT NULL,
  `province_fr` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'villes'
-- 
-- ---

DROP TABLE IF EXISTS `villes`;
		
CREATE TABLE `villes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ville_en` VARCHAR(50) NOT NULL,
  `ville_fr` VARCHAR(50) NOT NULL,
  `ville_province_id` INT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'modeles'
-- 
-- ---

DROP TABLE IF EXISTS `modeles`;
		
CREATE TABLE `modeles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modele_en` VARCHAR(50) NOT NULL,
  `modele_fr` VARCHAR(50) NOT NULL,
  `modele_marque_id` INT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'marques'
-- 
-- ---

DROP TABLE IF EXISTS `marques`;
		
CREATE TABLE `marques` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marque_en` VARCHAR(100) NOT NULL,
  `marque_fr` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'expeditions'
-- 
-- ---

DROP TABLE IF EXISTS `expeditions`;
		
CREATE TABLE `expeditions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `expedition_en` VARCHAR(50) NOT NULL,
  `expedition_fr` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'statut_commandes'
-- 
-- ---

DROP TABLE IF EXISTS `statut_commandes`;
		
CREATE TABLE `statut_commandes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `statut_en` VARCHAR(50) NOT NULL,
  `statut_fr` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'pays'
-- 
-- ---

DROP TABLE IF EXISTS `pays`;
		
CREATE TABLE `pays` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pays_en` VARCHAR(50) NOT NULL,
  `pays_fr` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'mode_paiements'
-- 
-- ---

DROP TABLE IF EXISTS `mode_paiements`;
		
CREATE TABLE `mode_paiements` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mode_paiement_en` VARCHAR(50) NOT NULL,
  `mode_paiement_fr` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `users` ADD FOREIGN KEY (ville_id) REFERENCES `villes` (`id`);
ALTER TABLE `users` ADD FOREIGN KEY (privilege_id) REFERENCES `privileges` (`id`);
ALTER TABLE `journal_connexions` ADD FOREIGN KEY (jc_utilisateur_id) REFERENCES `users` (`id`);
ALTER TABLE `voitures` ADD FOREIGN KEY (modele_id) REFERENCES `modeles` (`id`);
ALTER TABLE `voitures` ADD FOREIGN KEY (employe_id) REFERENCES `users` (`id`);
ALTER TABLE `voitures` ADD FOREIGN KEY (commande_id) REFERENCES `commandes` (`id`);
ALTER TABLE `voitures` ADD FOREIGN KEY (pays_id) REFERENCES `pays` (`id`);
ALTER TABLE `user_reserves` ADD FOREIGN KEY (ur_utilisateur_id) REFERENCES `users` (`id`);
ALTER TABLE `user_reserves` ADD FOREIGN KEY (ur_voiture_id) REFERENCES `voitures` (`id`);
ALTER TABLE `commandes` ADD FOREIGN KEY (commande_utilisateur_id) REFERENCES `users` (`id`);
ALTER TABLE `commandes` ADD FOREIGN KEY (mode_paiement_id) REFERENCES `mode_paiements` (`id`);
ALTER TABLE `commandes` ADD FOREIGN KEY (expedition_id) REFERENCES `expeditions` (`id`);
ALTER TABLE `commandes` ADD FOREIGN KEY (statut_id) REFERENCES `statut_commandes` (`id`);
ALTER TABLE `taxes` ADD FOREIGN KEY (taxe_province_id) REFERENCES `provinces` (`id`);
ALTER TABLE `photos` ADD FOREIGN KEY (photo_voiture_id) REFERENCES `voitures` (`id`);
ALTER TABLE `villes` ADD FOREIGN KEY (ville_province_id) REFERENCES `provinces` (`id`);
ALTER TABLE `modeles` ADD FOREIGN KEY (modele_marque_id) REFERENCES `marques` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `privileges` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `journal_connexions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `voitures` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_reserves` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `commandes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `taxes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `photos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `provinces` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `villes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `modeles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `marques` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `expeditions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `statut_commandes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pays` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `mode_paiements` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `users` (`id`,`nom`,`prenom`,`anniversaire`,`adresse`,`code_postal`,`ville_id`,`telephone`,`telephone_portable`,`courriel`,`mdp`,`privilege_id`) VALUES
-- ('','','','','','','','','','','','');
-- INSERT INTO `privileges` (`id`,`pri_role_fr`,`pri_role_en`) VALUES
-- ('','','');
-- INSERT INTO `journal_connexions` (`id`,`jc_date`,`jc_adresse_IP`,`jc_utilisateur_id`) VALUES
-- ('','','','');
-- INSERT INTO `voitures` (`id`,`annee`,`modele_id`,`date_arrivee`,`employe_id`,`prix_base`,`taux_augmenter`,`commande_id`,`prix_paye`,`pays_id`,`description_en`,`description_fr`) VALUES
-- ('','','','','','','','','','','','');
-- INSERT INTO `user_reserves` (`id`,`ur_utilisateur_id`,`ur_voiture_id`,`date_reserver`) VALUES
-- ('','','','');
-- INSERT INTO `commandes` (`id`,`commande_utilisateur_id`,`date_commande`,`mode_paiement_id`,`expedition_id`,`statut_id`,`taxe_rate_paye`) VALUES
-- ('','','','','','','');
-- INSERT INTO `taxes` (`id`,`taxe_province_id`,`TVP/TVQ`,`TPS`,`TVH`) VALUES
-- ('','','','','');
-- INSERT INTO `photos` (`id`,`photo_titre`,`photo_voiture_id`) VALUES
-- ('','','');
-- INSERT INTO `provinces` (`id`,`privince_en`,`province_fr`) VALUES
-- ('','','');
-- INSERT INTO `villes` (`id`,`ville_en`,`ville_fr`,`ville_province_id`) VALUES
-- ('','','','');
-- INSERT INTO `modeles` (`id`,`modele_en`,`modele_fr`,`modele_marque_id`) VALUES
-- ('','','','');
-- INSERT INTO `marques` (`id`,`marque_en`,`marque_fr`) VALUES
-- ('','','');
-- INSERT INTO `expeditions` (`id`,`expedition_en`,`expedition_fr`) VALUES
-- ('','','');
-- INSERT INTO `statut_commandes` (`id`,`statut_en`,`statut_fr`) VALUES
-- ('','','');
-- INSERT INTO `pays` (`id`,`pays_en`,`pays_fr`) VALUES
-- ('','','');
-- INSERT INTO `mode_paiements` (`id`,`mode_paiement_en`,`mode_paiement_fr`) VALUES
-- ('','','');