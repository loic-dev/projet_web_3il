CREATE TABLE structure
(
    id VARCHAR(100) PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email_verify BOOLEAN NOT NULL,
    created_datetime INT NOT NULL,
    updated_datetime INT NOT NULL
);

-- CREATE TABLE advert
-- (
--     id INT() PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     name VARCHAR(50) NOT NULL,
--     idInstrument FOREIGN KEY NOT NULL,
--     category FOREIGN KEY NOT NULL,
--     difficulty FOREIGN KEY NOT NULL,
--     idStruct FOREIGN KEY NOT NULL,
-- );

-- CREATE TABLE instrument
-- (
--     id INT() PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     name VARCHAR(50) NOT NULL,
-- );

-- CREATE TABLE category
-- (
--     id INT() PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     name VARCHAR(50) NOT NULL
-- );

-- CREATE TABLE difficulty
-- (
--     id INT() PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     name VARCHAR(50) NOT NULL
-- );