CREATE TABLE Kayttaja(
id SERIAL PRIMARY KEY,
username varchar(50) NOT NULL,
password varchar(50) NOT NULL UNIQUE,
nimi varchar(50) NOT NULL
);
CREATE TABLE Ryhma(
id SERIAL PRIMARY KEY,
nimi varchar(50) NOT NULL,
kuvaus varchar(500) NOT NULL,
perustettu Timestamp NOT NULL
);
CREATE TABLE Liitostaulu(
kayttaja_id INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE,
ryhma_id INTEGER REFERENCES Ryhma(id) ON DELETE CASCADE
);
CREATE TABLE Tapahtuma(
id SERIAL PRIMARY KEY,
ryhma_id INTEGER REFERENCES Ryhma(id) ON DELETE CASCADE,
nimi varchar(50) NOT NULL,
kuvaus varchar(500) NOT NULL,
aika varchar(50) NOT NULL
);
CREATE TABLE Ryhmaperustaja(
ryhma_id INTEGER REFERENCES Ryhma(id) ON DELETE CASCADE,
kayttaja_id INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE
);
CREATE TABLE Tapahtumaperustaja(
tapahtuma_id INTEGER REFERENCES Tapahtuma(id) ON DELETE CASCADE,
kayttaja_id INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE
);