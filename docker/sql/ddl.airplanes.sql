SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `airplanes`;
CREATE TABLE `airplanes`
(
    `id`            INT                 NOT NULL AUTO_INCREMENT,
    `registration`  VARCHAR(10)         NOT NULL,
    `type`          CHAR(4)             NOT NULL,
    `picture`       VARCHAR(200)        NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `registration_unique` (`registration`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `airplanes` (`registration`, `type`, `picture`)
VALUES
    ('BGA113Y', 'A337','https://cdn.jetphotos.com/full/6/1451541_1733068038.jpg'),
    ('UAE34Y', 'A388','https://cdn.jetphotos.com/full/5/411647_1732103504.jpg'),
    ('E10E3', 'LJ35', 'https://cdn.jetphotos.com/full/6/2197953_1710963191.jpg'),
    ('NJE478E', 'CL35', 'https://cdn.jetphotos.com/full/5/887251_1710697543.jpg'),
    ('KLM37M', 'E75L', 'https://cdn.jetphotos.com/full/5/1147658_1727893519.jpg'),
    ('UAE33T', 'A388', 'https://cdn.jetphotos.com/full/5/1220365_1729726301.jpg'),
    ('AFR194', 'A359', 'https://cdn.jetphotos.com/full/6/805925_1717462972.jpg'),
    ('SXS2FC', 'B738', 'https://cdn.jetphotos.com/full/6/747549_1717952868.jpg'),
    ('CCA720', 'B789', 'https://cdn.jetphotos.com/full/5/656930_1734011619.jpg'),
    ('ITY159', 'A320', 'https://cdn.jetphotos.com/full/6/727753_1732132419.jpg'),
    ('BAW198', 'B772', 'https://cdn.jetphotos.com/full/5/698951_1720253024.jpg'),
    ('QTR780', 'B77L', 'https://cdn.jetphotos.com/full/6/935219_1727130566.jpg'),
    ('OYA5545', 'B772', 'https://cdn.jetphotos.com/full/6/1341932_1731053525.jpg');