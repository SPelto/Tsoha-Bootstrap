INSERT INTO Kayttaja (nimi, puhelinnumero) VALUES ('Joni',050123123);
INSERT INTO Ryhma (nimi, kuvaus, perustettu) VALUES ('Jonittajat','Tässä ryhmässä Jonitetaan', Now());
INSERT INTO Tapahtuma (nimi, kuvaus, aika) VALUES ('Jonitus', 'Jonitetaaaaan', Now());


-- -- Player-taulun testidata
-- INSERT INTO Player (name, password) VALUES ('Kalle', 'Kalle123'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- INSERT INTO Player (name, password) VALUES ('Henri', 'Henri123');
-- -- Game taulun testidata
-- INSERT INTO Game (name, description, published, publisher, added) VALUES ('The Elder Scrolls V: Skyrim', 'Arrow to the knee', '2011-11-11', 'Bethesda Softworks', NOW());