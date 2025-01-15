SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`
(
    `id`            INT            NOT NULL AUTO_INCREMENT,
    `ISO`           CHAR(2)        NOT NULL,
    `country_name`  VARCHAR(30)    NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ISO_unique` (`ISO`),
    UNIQUE KEY `country_name_unique` (`country_name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `countries` (`ISO`, `country_name`)
VALUES
    ('GB', 'United Kingdom'),
    ('FR', 'France'),
    ('DE', 'Germany'),
    ('AE', 'United Arab Emirates'),
    ('AU', 'Australia'),
    ('US', 'United States'),
    ('IN', 'India'),
    ('JP', 'Japan'),
    ('CA', 'Canada'),
    ('IT', 'Italy'),
    ('ES', 'Spain'),
    ('BR', 'Brazil'),
    ('HK', 'Hong Kong'),
    ('TR', 'Turkey'),
    ('QA', 'Qatar'),
    ('CN', 'China'),
    ('RU', 'Russia'),
    ('ZA', 'South Africa'),
    ('NG', 'Nigeria'),
    ('MX', 'Mexico'),
    ('KR', 'South Korea'),
    ('SE', 'Sweden'),
    ('NL', 'Netherlands'),
    ('NO', 'Norway'),
    ('FI', 'Finland'),
    ('DK', 'Denmark'),
    ('PL', 'Poland'),
    ('SG', 'Singapore'),
    ('PH', 'Philippines'),
    ('TH', 'Thailand'),
    ('MY', 'Malaysia'),
    ('ID', 'Indonesia'),
    ('KW', 'Kuwait'),
    ('AR', 'Argentina'),
    ('EG', 'Egypt'),
    ('IL', 'Israel'),
    ('CH', 'Switzerland'),
    ('AT', 'Austria'),
    ('BE', 'Belgium'),
    ('PT', 'Portugal'),
    ('SA', 'Saudi Arabia'),
    ('VN', 'Vietnam'),
    ('PK', 'Pakistan'),
    ('PE', 'Peru'),
    ('CO', 'Colombia'),
    ('CL', 'Chile'),
    ('BD', 'Bangladesh'),
    ('IQ', 'Iraq');
