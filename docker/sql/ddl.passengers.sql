SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE `passengers`
(
    `id`             INT             NOT NULL AUTO_INCREMENT,
    `PASSPORT_ID`    INTEGER(5)      NOT NULL,
    `email`          VARCHAR(50)     NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `passport_id_unique` (`PASSPORT_ID`),
    CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;