SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE `passengers`
(
    `id`            INT             NOT NULL AUTO_INCREMENT,
    `PASSPORT_ID`    INTEGER         NOT NULL,
    `name`           VARCHAR(20)     NOT NULL,
    `surname`        VARCHAR(20)     NOT NULL,
    `birth_number`   CHAR(11)        NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `passport_id_unique` (`PASSPORT_ID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `passengers` (`PASSPORT_ID`, `name`, `surname`, `birth_number`)
VALUES
    (1001, 'John', 'Doe', '12345678901'),
    (1002, 'Jane', 'Smith', '23456789012'),
    (1003, 'Alice', 'Johnson', '34567890123'),
    (1004, 'Bob', 'Williams', '45678901234'),
    (1005, 'Charlie', 'Brown', '56789012345'),
    (1006, 'David', 'Davis', '67890123456'),
    (1007, 'Eve', 'Miller', '78901234567'),
    (1008, 'Frank', 'Wilson', '89012345678'),
    (1009, 'Grace', 'Moore', '90123456789'),
    (1010, 'Henry', 'Taylor', '01234567890'),
    (1011, 'Isabel', 'Anderson', '12345678901'),
    (1012, 'Jack', 'Thomas', '23456789012'),
    (1013, 'Karen', 'Jackson', '34567890123'),
    (1014, 'Leo', 'White', '45678901234'),
    (1015, 'Mia', 'Harris', '56789012345'),
    (1016, 'Noah', 'Martin', '67890123456'),
    (1017, 'Olivia', 'Garcia', '78901234567'),
    (1018, 'Paul', 'Rodriguez', '89012345678'),
    (1019, 'Quincy', 'Lopez', '90123456789'),
    (1020, 'Rita', 'Gonzalez', '01234567890'),
    (1021, 'Samuel', 'Perez', '12345678901'),
    (1022, 'Tina', 'Sanchez', '23456789012'),
    (1023, 'Ursula', 'Clark', '34567890123'),
    (1024, 'Victor', 'Lewis', '45678901234'),
    (1025, 'Walter', 'Young', '56789012345'),
    (1026, 'Xander', 'King', '67890123456'),
    (1027, 'Yvonne', 'Scott', '78901234567'),
    (1028, 'Zane', 'Green', '89012345678'),
    (1029, 'Abigail', 'Adams', '90123456789'),
    (1030, 'Benjamin', 'Nelson', '01234567890');
