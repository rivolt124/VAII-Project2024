SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `IATA`          CHAR(3)         NOT NULL,
    `airport_name`  VARCHAR(50)     NOT NULL,
    `country`       CHAR(2)         NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `IATA_unique` (`IATA`),
    UNIQUE KEY `airport_name_unique` (`airport_name`),
    CONSTRAINT `fk_country` FOREIGN KEY (`country`) REFERENCES `countries` (`ISO`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `airports` (`IATA`, `airport_name`, `country`)
VALUES
    ('LHR', 'Heathrow', 'GB'),
    ('CDG', 'Charles de Gaulle', 'FR'),
    ('FRA', 'Frankfurt', 'DE'),
    ('DXB', 'Dubai International', 'AE'),
    ('JFK', 'John F. Kennedy International', 'US'),
    ('LAX', 'Los Angeles International', 'US'),
    ('ORD', 'OHare International', 'US'),
    ('HKG', 'Hong Kong International', 'HK'),
    ('BKK', 'Suvarnabhumi', 'TH'),
    ('NRT', 'Narita', 'JP'),
    ('ICN', 'Incheon International', 'KR'),
    ('SIN', 'Changi Airport', 'SG'),
    ('KUL', 'Kuala Lumpur International', 'MY'),
    ('CGK', 'Soekarno–Hatta International', 'ID'),
    ('AMS', 'Schiphol', 'NL'),
    ('MAD', 'Madrid-Barajas', 'ES'),
    ('BCN', 'El Prat', 'ES'),
    ('SFO', 'San Francisco International', 'US'),
    ('ATL', 'Hartsfield-Jackson', 'US'),
    ('YYZ', 'Toronto Pearson', 'CA'),
    ('MEX', 'Benito Juárez International', 'MX'),
    ('MUC', 'Munich Airport', 'DE'),
    ('FCO', 'Fiumicino', 'IT'),
    ('IST', 'Istanbul Airport', 'TR'),
    ('SYD', 'Sydney Kingsford Smith', 'AU'),
    ('LGW', 'Gatwick', 'GB'),
    ('BOM', 'Chhatrapati Shivaji International', 'IN'),
    ('DEL', 'Indira Gandhi International', 'IN'),
    ('SCL', 'Arturo Merino Benítez International', 'CL'),
    ('DOH', 'Hamad International', 'QA'),
    ('EZE', 'Ezeiza International', 'AR'),
    ('JNB', 'O.R. Tambo International', 'ZA'),
    ('AEP', 'Aeroparque Jorge Newbery', 'AR'),
    ('GIG', 'Galeão International', 'BR'),
    ('LIM', 'Jorge Chavez International', 'PE'),
    ('AAL', 'Aalborg Airport', 'DK'),
    ('ZRH', 'Zurich Airport', 'CH'),
    ('SVO', 'Sheremetyevo International', 'RU'),
    ('LIS', 'Lisbon Airport', 'PT'),
    ('YVR', 'Vancouver International', 'CA'),
    ('MEL', 'Melbourne Tullamarine', 'AU'),
    ('WAW', 'Warsaw Chopin', 'PL'),
    ('CPT', 'Cape Town International', 'ZA');
