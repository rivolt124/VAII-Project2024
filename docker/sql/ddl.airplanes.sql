SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `airplanes`;
CREATE TABLE `airplanes`
(
    `id`            INT                 NOT NULL AUTO_INCREMENT,
    `registration`  VARCHAR(20)         NOT NULL,
    `picture`       VARCHAR(200)        NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `registration_unique` (`registration`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

