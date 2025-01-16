SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE `passengers`
(
    `id`             INT             NOT NULL AUTO_INCREMENT,
    `PASSPORT_ID`    INTEGER         NOT NULL,
    `name`           VARCHAR(20)     DEFAULT NULL,
    `surname`        VARCHAR(20)     DEFAULT NULL,
    `birth_number`   CHAR(11)        NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `passport_id_unique` (`PASSPORT_ID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `passengers` (`PASSPORT_ID`, `name`, `surname`, `birth_number`)
VALUES
    (12345678, 'John', 'Doe', '8701011234'),
    (87654321, 'Jane', 'Smith', '8502022345'),
    (11223344, 'Alice', 'Johnson', '9003033456'),
    (99887766, 'Bob', 'Williams', '9204044567'),
    (33445566, 'Charlie', 'Brown', '9405055678'),
    (44556677, 'David', 'Davis', '8606066789'),
    (55667788, 'Eve', 'Miller', '8907077890'),
    (66778899, 'Frank', 'Wilson', '8108088901');
