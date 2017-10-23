CREATE SCHEMA crud;
USE crud;

CREATE TABLE hobby (
  id   INTEGER      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL
);

CREATE TABLE analista (
  id   INTEGER      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  genero VARCHAR(255) NOT NULL,
  idade VARCHAR(255) NOT NULL,
  hobby_id INT,
  projeto VARCHAR(255) NOT NULL,
  CONSTRAINT hobby_analista_fk
  FOREIGN KEY(hobby_id)
  REFERENCES hobby(id)
);

CREATE TABLE programador (
  id   INTEGER      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  genero VARCHAR(255) NOT NULL,
  idade VARCHAR(255) NOT NULL,
  hobby_id INT,
  linguagem VARCHAR(255) NOT NULL,
  CONSTRAINT hobby_programador_fk
  FOREIGN KEY(hobby_id)
  REFERENCES hobby(id)
);