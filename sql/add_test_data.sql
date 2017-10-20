INSERT INTO Kayttaja (nimi, username, password) VALUES ('Joni', 'Jon', 'Snow');
INSERT INTO Kayttaja (nimi, username, password) VALUES ('Matti', 'Mati', 'salasana');
INSERT INTO Kayttaja (nimi, username, password) VALUES ('Akseli', 'Aksu', 'tiistai');
INSERT INTO Kayttaja (nimi, username, password) VALUES ('Hannu', 'Hansu', '1234');

INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Jonittajat','Tässä ryhmässä Jonitetaan', Now());
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Shakin pelaajat','Tässä ryhmässä pelataan shakkia', Now());
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Shakin harrastelijat','Tässä ryhmässä harrastellaan shakkia', Now());
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Kuvaajat','Tässä ryhmässä kuvataan', Now());

INSERT INTO Tapahtuma (nimi, kuvaus, aika, ryhma_id) VALUES ('Jonitus', 'Jonitetaaaaan', Now(), (SELECT id FROM Ryhma WHERE nimi = 'Jonittajat'));
INSERT INTO Tapahtuma (nimi, kuvaus, aika, ryhma_id) VALUES ('Shakkiturnaus', 'Shakkiturnaus kaikille kiinnostuneille', Now(), (SELECT id FROM Ryhma WHERE nimi = 'Shakin pelaajat'));
INSERT INTO Tapahtuma (nimi, kuvaus, aika, ryhma_id) VALUES ('Valokuvaamista', 'Harjoitellaan valokuvaamista', Now(), (SELECT id FROM Ryhma WHERE nimi = 'Shakin harrastelijat'));
INSERT INTO Tapahtuma (nimi, kuvaus, aika, ryhma_id) VALUES ('1v1 Shakkimatsi', 'Raivokas 1v1 ottelu', Now(), (SELECT id FROM Ryhma WHERE nimi = 'Kuvaajat'));


INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Jonittajat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Matti'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin pelaajat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin pelaajat'));

INSERT INTO Liitostaulu (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Kuvaajat'));

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
INSERT INTO Ryhmaperustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Jonittajat'));

INSERT INTO Ryhmaperustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Ryhma WHERE nimi = 'Shakin pelaajat'));

INSERT INTO Tapahtumaperustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Tapahtuma WHERE nimi = 'Jonitus'));

INSERT INTO Tapahtumaperustaja (Kayttaja_id, Ryhma_id) VALUES (
(SELECT id FROM Kayttaja WHERE nimi = 'Joni'), (SELECT id FROM Tapahtuma WHERE nimi = 'Valokuvaamista'));



-- -- Player-taulun testidata
-- INSERT INTO Player (name, password) VALUES ('Kalle', 'Kalle123'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- INSERT INTO Player (name, password) VALUES ('Henri', 'Henri123');
-- -- Game taulun testidata
-- INSERT INTO Game (name, description, published, publisher, added) VALUES ('The Elder Scrolls V: Skyrim', 'Arrow to the knee', '2011-11-11', 'Bethesda Softworks', NOW());