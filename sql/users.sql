create extension if not exists pgcrypto;

drop sequence if exists users_id seq; 

drop table if exists users;

-- creating table Users

create table users (
    Id INT PRIMARY KEY DEFAULT nextcal ('users_id_seq'),
    EmailAddress VARCHAR (255) UNIQUE,
    Password VARCHAR (255) NOT NULL,
    FirstName VARCHAR (128),
    LastName VARCHAR (128),
    LastAccess TIMESTAMP,
    EnrolDate TIMESTAMP,
    Enable BOOLEAN,
    Type VARCHAR (2)

);

-- Creating Statement Queries 

INSERT INTO Users (EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, Type) VALUES (
    'mohantak@dcmail.ca', crypt('123abc', gen_salt('bf')) --
)