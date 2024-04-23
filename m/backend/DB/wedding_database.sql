-- Domka SQL
DROP TABLE IF EXISTS `wedding`.`domka`;
CREATE TABLE `wedding`.`domka`(
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `surname` VARCHAR(200),
  `dob` DATE,
  `email` VARCHAR(200),
  `age` DECIMAL(10, 0),
  `hobbies` VARCHAR(200),
  `hairColor` VARCHAR(200),
  `height` INT(10),
  `favColor` VARCHAR(200),
  `sentFirstMessage` BOOLEAN,
  `isAllCorrect` BOOLEAN,
  PRIMARY KEY(`id`)
);

INSERT INTO wedding.domka (id, surname, dob, email, age, hobbies, hairColor, height, favColor, sentFirstMessage, isAllCorrect) VALUES (
  1,
  'Fedorková',
  "1996-07-19",
  "dominika.fedorkova1@gmail.com",
  27,
  '["Pečenie", "Túry", "Rozprávanie", "Mitko"]',
  "Blond",
  163,
  "Žltá",
  0,
  1
);

/*AS ( TRUNCATE( (DATEDIFF(CURDATE(), '1996-07-19')/365.25), 0))*/

DELIMITER $$

DROP EVENT IF EXISTS `wedding`.`age_update_domka`$$
CREATE DEFINER=`root`@`domkamichal.eu` EVENT `wedding`.`age_update_domka` 
ON SCHEDULE EVERY 1 YEAR STARTS '2024-07-19 00:00:00' 
ON COMPLETION NOT PRESERVE ENABLE DO BEGIN 

UPDATE wedding.domka 
SET age = ( TRUNCATE( (DATEDIFF(CURDATE(), '1996-07-19')/365.25), 0)) 
WHERE id = 1; END

DELIMITER ;


-- Mitko SQL
DROP TABLE IF EXISTS `wedding`.`mitko`;
CREATE TABLE `wedding`.`mitko`(
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `surname` VARCHAR(200),
  `dob` DATE,
  `meetingPlace` VARCHAR(200),
  `age` DECIMAL(10, 0),
  `hobbies` VARCHAR(200),
  `car` VARCHAR(200),
  `height` INT(10),
  `favSport` VARCHAR(200),
  `hasSeenParentsFirst` BOOLEAN,
  `isAllCorrect` BOOLEAN,
  PRIMARY KEY(`id`)
);

INSERT INTO wedding.mitko (id, surname, dob, meetingPlace, age, hobbies, car, height, favSport, hasSeenParentsFirst, isAllCorrect) VALUES (
  1,
  'Drotár',
  "1996-07-26",
  "Zoznamka",
  27,
  '["Šport", "Hudba", "Chodiť pešo", "Domka"]',
  "Ford C-Max",
  193,
  "Hokej",
  1,
  1
);

/*AS ( TRUNCATE( (DATEDIFF(CURDATE(), '1996-07-19')/365.25), 0))*/

DELIMITER $$

DROP EVENT IF EXISTS `wedding`.`age_update_mitko`$$
CREATE DEFINER=`root`@`domkamichal.eu` EVENT `wedding`.`age_update_mitko` 
ON SCHEDULE EVERY 1 YEAR STARTS '2024-07-26 00:00:00' 
ON COMPLETION NOT PRESERVE ENABLE DO BEGIN 

UPDATE wedding.mitko 
SET age = ( TRUNCATE( (DATEDIFF(CURDATE(), '1996-07-26')/365.25), 0)) 
WHERE id = 1; END

DELIMITER ;

DROP TABLE IF EXISTS `wedding`.`preserve_permissions`;
CREATE TABLE preserve_permissions (
  permission_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  FOREIGN KEY (permission_id) REFERENCES wedding.domka (id),
  FOREIGN KEY (permission_id) REFERENCES wedding.mitko (id)
);

INSERT INTO wedding.preserve_permissions (permission_id) VALUES (1);