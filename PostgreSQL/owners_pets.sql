-- Database: owners_pets

-- DROP DATABASE owners_pets;

CREATE DATABASE owners_pets
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_India.1252'
    LC_CTYPE = 'English_India.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;


	--Section 3 chalenge
	--Create owners table
	
	CREATE TABLE owners(id SERIAL PRIMARY KEY, first_name varchar(30), last_name varchar(30), city varchar(30), state char(2));
	
	--Create pets table
	CREATE TABLE pets(id SERIAL PRIMARY KEY, species varchar(30), full_name varchar(30), age INT, owners_id INT REFERENCES owners(id));
	
	--Add email address column to owners table
	ALTER TABLE owners ADD COLUMN email varchar(30) UNIQUE;
	
	-- Change the data type of last name column in owners table to varchar(50)
	ALTER TABLE owners ALTER COLUMN last_name TYPE varchar(50);
	
	
	--Section 4 challenge
	--INSRT THE DATA INTO OWNERS TABLE
	INSERT INTO owners (first_name, last_name, city, state, email)
	VALUES ('Samuel', 'Smith', 'Boston', 'MA', 'samsmith@gmail.com'),
	('Emma', 'Johnson', 'Seattle', 'WA', 'enjohnson@gmail.com'),
	('John', 'Oliver', 'New York', 'NY', 'johnoliver@gmail.com'),
	('Olivia', 'Brown', 'San Francisco', 'CA', 'oliviabrown@gmail.com'),
	('Simon', 'Smith', 'Dallas', 'TX', 'sismith@gmail.com'),
	(null, 'Maxwell', null, 'CA', 'lordmaxwell@gmail.com');
	
	SELECT * FROM owners;




-- Insert data into pets table
INSERT INTO pets (species, full_name, age, Owners_id)
VALUES ('Dog', 'REx', 6, 1),
('Rabbit', 'Fluffy', 2, 5),
('Cat', 'Tom', 8, 2),
('Mouse', 'Jerry', 2, 2),
('Dog','Biggles', 4, 2),
('Tortiose', 'Squirtle', 42, 3);

-- Update fliffy the rabbits gae to 3
UPDATE pets
SET age = 3
Where full_name = 'Fluffy';

--DELETE Mr Maxwell from the owners table
DELETE FROM owners WHERE last_name = 'Maxwell';
