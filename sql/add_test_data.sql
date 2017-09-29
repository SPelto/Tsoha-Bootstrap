INSERT INTO Kayttaja (nimi, puhelinnumero, username, password) VALUES ('Joni',050123123, 'Jon', 'Snow');
INSERT INTO Kayttaja (nimi, puhelinnumero, username, password) VALUES ('Matti',050345345, 'Mati', 'salasana');
INSERT INTO Kayttaja (nimi, puhelinnumero, username, password) VALUES ('Akseli',040123123, 'Aksu', 'tiistai');
INSERT INTO Kayttaja (nimi, puhelinnumero, username, password) VALUES ('Hannu',050000000, 'Hansu', '1234');



INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Jonittajat','Tässä ryhmässä Jonitetaan', Now());
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Shakin pelaajat','Tässä ryhmässä pelataan shakkia', Now());
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Shakin harrastelijat','Tässä ryhmässä harrastellaan shakkia', Now());
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Kuvaajat','Tässä ryhmässä kuvataan', Now());

INSERT INTO Tapahtuma (nimi, kuvaus, aika) VALUES ('Jonitus', 'Jonitetaaaaan', Now());
INSERT INTO Tapahtuma (nimi, kuvaus, aika) VALUES ('Shakkiturnaus', 'Shakkiturnaus kaikille kiinnostuneille', Now());
INSERT INTO Tapahtuma (nimi, kuvaus, aika) VALUES ('Valokuvaamista', 'Harjoitellaan valokuvaamista', Now());
INSERT INTO Tapahtuma (nimi, kuvaus, aika) VALUES ('1v1 Shakkimatsi', 'Raivokas 1v1 ottelu', Now());


INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Jonittajat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Matti'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin pelaajat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Akseli'), (SELECT id FROM Ryhma WHERE nimi = 'Kuvaajat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin harrastelijat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Matti'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin harrastelijat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Akseli'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin harrastelijat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Hannu'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin harrastelijat'));

-- Perustajia
INSERT INTO Perustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Jonittajat'));

INSERT INTO Perustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Matti'), (SELECT id FROM Ryhma WHERE nimi = 'Shakkiturnaus'));

INSERT INTO Perustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = '1v1 Shakkimatsi'));


-- -- Player-taulun testidata
-- INSERT INTO Player (name, password) VALUES ('Kalle', 'Kalle123'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- INSERT INTO Player (name, password) VALUES ('Henri', 'Henri123');
-- -- Game taulun testidata
-- INSERT INTO Game (name, description, published, publisher, added) VALUES ('The Elder Scrolls V: Skyrim', 'Arrow to the knee', '2011-11-11', 'Bethesda Softworks', NOW());