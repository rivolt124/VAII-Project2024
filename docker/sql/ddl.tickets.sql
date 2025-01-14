SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `ticket_number` INT             NOT NULL,
    `flight_number` varchar(6)      NOT NULL,
    `passport_id`   INT             NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ticket_number_unique` (`ticket_number`),
    CONSTRAINT `fk_ticket_flight`
        FOREIGN KEY (`flight_number`)
            REFERENCES `flights` (`flight_number`)
            ON DELETE CASCADE,
    CONSTRAINT `fk_ticket_passenger`
        FOREIGN KEY (`passport_id`)
            REFERENCES `passengers` (`PASSPORT_ID`)
            ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `tickets` (`ticket_number`, `flight_number`, `passport_id`)
VALUES
    (102, 'LH102', 87654321),
    (103, 'AF203', 11223344),
    (104, 'EK104', 99887766),
    (105, 'SQ105', 22334455),
    (106, 'AA206', 33445566),
    (107, 'QF207', 44556677),
    (108, 'CX208', 55667788),
    (109, 'DL209', 66778899),
    (110, 'UA210', 77889900),
    (111, 'NZ211', 88990011),
    (112, 'LS212', 99001122),
    (113, 'OS213', 10111223),
    (114, 'TK214', 12131415),
    (115, 'BA301', 14151617),
    (116, 'LH302', 16171819),
    (117, 'AF303', 18192021),
    (118, 'EK304', 19202122),
    (119, 'SQ305', 21222324),
    (120, 'AA406', 23242526),
    (121, 'QF407', 24252627),
    (122, 'CX408', 25262728),
    (123, 'DL409', 26272829),
    (124, 'UA410', 27282930),
    (125, 'NZ411', 28293031),
    (126, 'LS412', 29303132),
    (127, 'OS413', 30313233),
    (128, 'TK414', 31323334),
    (129, 'BA505', 32333435),
    (130, 'LH506', 33343536),
    (131, 'AF507', 34353637);