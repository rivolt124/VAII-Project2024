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
    (66778899, 'Frank', 'Wilson', '8108088901'),
    (77889900, 'Grace', 'Moore', '8509099012'),
    (88990011, 'Henry', 'Taylor', '8901010123'),
    (99001122, 'Isabel', 'Anderson', '9002021234'),
    (10111223, 'Jack', 'Thomas', '9103032345'),
    (12131415, 'Karen', 'Jackson', '9204043456'),
    (14151617, 'Leo', 'White', '9305054567'),
    (16171819, 'Mia', 'Harris', '9406065678'),
    (18192021, 'Noah', 'Martin', '9507076789'),
    (19202122, 'Olivia', 'Garcia', '9608087890'),
    (21222324, 'Paul', 'Rodriguez', '9709098901'),
    (23242526, 'Quincy', 'Lopez', '9801019012'),
    (24252627, 'Rita', 'Gonzalez', '9902020123'),
    (25262728, 'Samuel', 'Perez', '0003031234'),
    (26272829, 'Tina', 'Sanchez', '0104042345'),
    (27282930, 'Ursula', 'Clark', '0205053456'),
    (28293031, 'Victor', 'Lewis', '0306064567'),
    (29303132, 'Walter', 'Young', '0407075678'),
    (30313233, 'Xander', 'King', '0508086789'),
    (31323334, 'Yvonne', 'Scott', '0609097890'),
    (32333435, 'Zane', 'Green', '0701018901'),
    (33343536, 'Abigail', 'Adams', '0802029012'),
    (34353637, 'Benjamin', 'Nelson', '0903030123');
