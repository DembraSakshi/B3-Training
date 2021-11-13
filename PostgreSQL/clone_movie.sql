-- Database: clone_movie

-- DROP DATABASE clone_movie;

CREATE DATABASE clone_movie
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_India.1252'
    LC_CTYPE = 'English_India.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;
	
	

--Section 10 Challenge 1
 
--Select the directors first and last names and movie names in upper case.

SELECT UPPER(d.first_name), UPPER(d.last_name), UPPER(m.movie_name) FROM directors d
JOIN movies m ON d.director_id = m.director_id;

--Select the first and last names, in initial capitalisation format, of all the actors
-- who have starred in a Chinese or Korean movie.

SELECT DISTINCT INITCAP(a.first_name), INITCAP(a.last_name) FROM actors a 
JOIN movies_actors ma ON a.actor_id = ma.actor_id 
JOIN movies m ON m.movie_id = ma.movie_id
WHERE m.movie_lang IN ('Chinese','Korean');

--Retrieve the reversed first and last names of each directors and the first three 
-- characters of their nationality. 

SELECT REVERSE(first_name), REVERSE(last_name), LEFT(nationality, 3) FROM directors;

--Retrieve the initials of each director and display it in one column named ‘initials’. 

SELECT CONCAT_WS('.',LEFT(first_name, 1),LEFT(last_name, 1)) AS initials, first_name, last_name 
FROM directors;


--Section 10 Challenge 2

--Use the substring function to retrieve the first 6 characters of each movie 
-- name and the year they released.

SELECT SUBSTRING(movie_name, 1, 6) AS movie_name, SUBSTRING(release_date::TEXT, 1, 4) AS year
FROM movies;

--Retrieve the first name initial and last name of every actor born in May.

SELECT SUBSTRING(first_name, 1, 1) AS fn_initial, last_name, date_of_birth FROM actors
WHERE SPLIT_PART(date_of_birth::TEXT, '-', 2) = '05';

--Replace the movie language for all English language movies, with age certificate
-- rating 18, to ‘Eng’. 

UPDATE movies 
SET movie_lang = REPLACE(movie_lang, 'English', 'Eng')
WHERE age_certificate = '18';

SELECT * FROM movies;

