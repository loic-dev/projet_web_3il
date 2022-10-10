CREATE TABLE structure
(
    'id' INT PRIMARY KEY NOT NULL,
    'nom' VARCHAR(100) NOT NULL,
    'email' VARCHAR(255) NOT NULL,
    'password' VARCHAR(255) NOT NULL,
    'email_verify' BOOLEAN NOT NULL
    'created_datetime' datetime NOT NULL,
    'updated_datetime' datetime NOT NULL,
)