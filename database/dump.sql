CREATE TABLE structure
(
    id VARCHAR(100) PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email_verify BOOLEAN NOT NULL,
    created_datetime INT NOT NULL,
    updated_datetime INT NOT NULL
);