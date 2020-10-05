--
-- Tabelstructuur voor tabel `persoon`
--

CREATE TABLE `persoon` (
  `id` int(11) NOT NULL,
  `Voornaam` varchar(40) DEFAULT NULL,
  `Tussenvoegsel` varchar(40) DEFAULT NULL,
  `Achternaam` varchar(40) DEFAULT NULL,
  `gebruikersnaam` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`id`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `persoon`
--
ALTER TABLE `persoon`
  ADD CONSTRAINT `persoon_ibfk_1` FOREIGN KEY (`id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*ADDING ADMIN USER*/
INSERT INTO persoon VALUES (1,'Admin', 'Admin', 'Admin','yourAdmin');
