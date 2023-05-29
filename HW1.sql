CREATE DATABASE HW1;

USE HW1;

CREATE TABLE utenti (
  Nome VARCHAR(255),
  Cognome VARCHAR(255),
  Email VARCHAR(255),
  Username VARCHAR(255),
  Password VARCHAR(255),
  UNIQUE (Email)
);

CREATE TABLE giocatori (
  Username VARCHAR(255),
  Giocatore VARCHAR(255),
  Foto VARCHAR(255),
  UNIQUE (Username, Giocatore)
);

CREATE TABLE partite (
  Username VARCHAR(255),
  IdPartita INT,
  Squadra1 VARCHAR(255),
  Squadra2 VARCHAR(255),
  Casa VARCHAR(255),
  Ospite VARCHAR(255),
  Competizione VARCHAR(255),
  Stadio VARCHAR(255),
  Orario VARCHAR(255),
  DataPartita DATE,
  UNIQUE (Username, IdPartita)
);

CREATE TABLE stadi (
  Username VARCHAR(255),
  Stadio VARCHAR(255),
  Foto VARCHAR(255),
  UNIQUE (Username, Stadio)
);
