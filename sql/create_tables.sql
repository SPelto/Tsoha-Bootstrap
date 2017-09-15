CREATE TABLE Kayttaja(
id SERIAL PRIMARY KEY,
nimi varchar(50) NOT NULL
);
CREATE TABLE Ryhma(
id SERIAL PRIMARY KEY,
ryhma_nimi varchar(50) NOT NULL,
Ryhma_kuvaus varchar(500) NOT NULL
);
CREATE TABLE Liitostaulu(
Kayttaja_id INTEGER REFERENCES Kayttaja(id),
Ryhma_id INTEGER REFERENCES Ryhma(id)
);
CREATE TABLE Tapahtuma(
Ryhma_id INTEGER REFERENCES Ryhma(id),
Tapahtuma_nimi varchar(50) NOT NULL,
Tapahtuma_kuvaus varchar(500) NOT NULL
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


