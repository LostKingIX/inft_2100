create extension if not exists pgcrypto;

-- clearing any previously existing tables for data integrity
drop sequence if exists Users_id seq; 
drop table if exists Users;

-- creating table users

create table Users (
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
    'mohantak@dcmail.ca', crypt('123abc', gen_salt('bf')) -- NOTE: bf stands for blowfish
    'John','Doe', '2020-06-22 19:10:25', '2020-08-22 11:11:11', true, 's'
    
    );

SELECT * FROM users;