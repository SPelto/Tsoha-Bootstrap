CREATE TABLE Kayttaja(
id SERIAL PRIMARY KEY,
username varchar(50) NOT NULL,
password varchar(50) NOT NULL,
nimi varchar(50) NOT NULL,
puhelinnumero varchar(13)
);
CREATE TABLE Ryhma(
id SERIAL PRIMARY KEY,
nimi varchar(50) NOT NULL,
kuvaus varchar(500) NOT NULL,
perustettu Timestamp NOT NULL
);
CREATE TABLE Liitostaulu(
kayttaja_id INTEGER REFERENCES Kayttaja(id),
ryhma_id INTEGER REFERENCES Ryhma(id)
);
CREATE TABLE Tapahtuma(
id SERIAL PRIMARY KEY,
ryhma_id INTEGER REFERENCES Ryhma(id),
nimi varchar(50) NOT NULL,
kuvaus varchar(500) NOT NULL,
aika varchar(50) NOT NULL
);
CREATE TABLE Ryhmaperustaja(
ryhma_id INTEGER REFERENCES Ryhma(id),
kayttaja_id INTEGER REFERENCES Kayttaja(id)
);
CREATE TABLE Tapahtumaperustaja(
tapahtuma_id INTEGER REFERENCES Tapahtuma(id),
kayttaja_id INTEGER REFERENCES Kayttaja(id)
);
-- CREATE TABLE Player(
--   id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
--   name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
--   password varchar(50) NOT NULL
-- );
-- 
-- CREATE TABLE Game(
--   id SERIAL PRIMARY KEY,
--   player_id INTEGER REFERENCES Player(id), -- Viiteavain Player-tauluun
--   name varchar(50) NOT NULL,
--   played boolean DEFAULT FALSE,
--   description varchar(400),
--   published DATE,
--   publisher varchar(50),
--   added DATE
-- );









-- 


