SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id`             INT             NOT NULL AUTO_INCREMENT,
    `password`       VARCHAR(50)     NOT NULL,
    `email`          VARCHAR(50)     NOT NULL,
    `name`           VARCHAR(50)     DEFAULT NULL,
    `access`         INT(1)          NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `password_unique` (`password`),
    UNIQUE KEY `email_unique` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `users` (`password`, `email`, `name`, `access`)
VALUES
    ('adminer', 'admin1@gmail.com','ADMIN',1),
    ('user1', 'user1@gmail.com', 'Jozko Vajda',0),
    ('user2', 'user2@gmail.com', 'Meky Zbirka',0);