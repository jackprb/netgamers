-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 16, 2023 alle 10:10
-- Versione del server: 10.4.20-MariaDB
-- Versione PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netgamers`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `dateTime` date NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `comment_images`
--

CREATE TABLE `comment_images` (
  `ID` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `altText` varchar(500) NOT NULL,
  `longdesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `follow`
--

CREATE TABLE `follow` (
  `userFollowing` int(11) NOT NULL,
  `userFollowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `follow`
--

INSERT INTO `follow` (`userFollowing`, `userFollowed`) VALUES
(2, 1),
(3, 1),
(4, 1),
(6, 1),
(1, 2),
(5, 2),
(1, 3),
(2, 3),
(2, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(20) NOT NULL,
  `dateTimeCreated` datetime NOT NULL,
  `dateTimeViewed` datetime DEFAULT NULL,
  `userSrc` int(11) NOT NULL,
  `userDest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `notifications`
--

INSERT INTO `notifications` (`ID`, `content`, `viewed`, `type`, `dateTimeCreated`, `dateTimeViewed`, `userSrc`, `userDest`) VALUES
(1, 'MSG di prova 1 - nuovo commento', 0, 'NCOMMENT', '2023-06-12 18:45:25', '0000-00-00 00:00:00', 1, 2),
(2, 'MSG di prova 2 - nuovo follower', 1, 'NFOLLOWER', '2023-06-12 18:55:25', '2023-06-15 16:24:47', 1, 2),
(3, 'MSG di prova 3 - nuovo like a commento', 1, 'NLIKECOMMENT', '2023-06-12 09:45:25', '2023-06-15 15:00:12', 1, 2),
(4, 'MSG di prova 4 - nuovo like a post', 1, 'NLIKEPOST', '2023-06-12 08:45:25', '2023-06-15 16:24:32', 1, 2),
(5, 'MSG di prova 5 - nuovo posto su feed', 1, 'NPOSTFEED', '2023-06-12 18:45:25', '2023-06-15 15:00:15', 1, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `dateTimePublished` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`ID`, `img`, `title`, `text`, `dateTimePublished`, `userID`) VALUES
(2, '2', 'Il nuovo RPG fantasy che farà esplodere la tua immaginazione!', 'Ciao a tutti, sono TechWiz e ho una notizia mozzafiato da condividere con voi oggi! Siete pronti a vivere un\'avventura epica in un mondo fantastico? Un rinomato studio di sviluppo ha annunciato un nuovo RPG fantasy che promette di far esplodere la nostra immaginazione! Preparatevi a esplorare terre misteriose, combattere creature leggendarie e immergervi in una trama avvincente. Non vedo l\'ora di tuffarmi in questo nuovo universo e condividere con voi ogni dettaglio emozionante. Tenetevi pronti per l\'avventura più epica di tutti i tempi! \r\n', '2023-06-16 09:56:47', 7),
(3, NULL, 'Le ultime scoperte tecnologiche!', 'Ciao a tutti! Alex, il vostro TechWiz di fiducia, con le ultime scoperte tecnologiche! Ho trovato uno smartphone super avanzato e un\'app di realtà aumentata incredibile. Sono entusiasta di sperimentarli!', '2023-06-16 09:57:06', 7),
(4, NULL, 'Mi presento', 'Ciao a tutti, sono Emma \"GameMaster\" Martinez! Sono una giocatrice esperta e competitiva, e mi piace condividere strategie e consigli per migliorare le vostre abilità di gioco. Sono qui per aiutarvi, quindi non esitate a chiedere! - Emma \"GameMaster\" Martinez\r\n', '2023-06-16 09:58:08', 8),
(5, '3', 'Aggiornanto torneo eSport', 'Bella a tutti! Sono entusiasta di condividere con voi la mia ultima vittoria! Dopo mesi di impegno e allenamento intenso, sono riuscita a conquistare il primo posto in un torneo di eSport. È stata un\'esperienza incredibile e gratificante, e sono grata per tutto il supporto ricevuto dalla comunità di giocatori. Voglio ringraziare i miei compagni di squadra che hanno giocato con grande determinazione e tutti coloro che mi hanno sostenuto lungo il percorso.', '2023-06-16 10:03:10', 8),
(6, NULL, 'Questo sono io', 'Ciao, sono Luca Rossi, noto come \"PixelArtist\". Sono un artista digitale specializzato nella grafica per videogiochi e disponibile per collaborazioni con sviluppatori indie o team di giochi.\r\n', '2023-06-16 10:04:58', 9),
(7, NULL, 'L\'epica avventura di \'Realm of Legends\' in un mondo magico', '\'Realm of Legends\' è un\'avventura epica in un mondo magico che ti lascerà senza fiato. Scopri un regno incantato ricco di personaggi straordinari, ambientazioni suggestive e una trama coinvolgente.\r\nEsplora terre sconosciute, combatti contro nemici temibili e risolvi enigmi avvincenti. Personalizza il tuo eroe con abilità uniche e unisciti ad altri giocatori in battaglie multiplayer che ti metteranno alla prova.\r\nPreparati a vivere un\'avventura indimenticabile in \'Realm of Legends\', il gioco che ti porterà in mondi fantastici e ti farà sentire un vero eroe.', '2023-06-16 10:06:09', 10),
(8, NULL, 'Le 5 gemme nascoste dei giochi mobili!', '1.\"Forgotten Memories: Alternate Realities\"\r\n2.\"Monument Valley\"\r\n3.\"Swordigo\"\r\n4.\"Mini Metro\"\r\n5.\"Alto\'s Adventure\"\r\nQueste sono solo alcune delle gemme nascoste che il vasto mondo dei giochi mobili ha da offrire. Spero che questa lista vi abbia dato qualche idea su quali giochi provare successivamente. Stay tuned per scoprire di cosa trattano questi singoli giochi', '2023-06-16 10:06:52', 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `post_images`
--

CREATE TABLE `post_images` (
  `ID` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `altText` varchar(500) NOT NULL,
  `longdesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `post_images`
--

INSERT INTO `post_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(2, 'post1.png', 'TechWiz\'s post image: Fantasy Landscape', 'TechWiz\'s post image. Details: Fantasy Ladscape del nuovo fantastico gioco rpg Fantasy'),
(3, 'post4.png', 'GameMaster\'s post image: eSport Cup image ', 'GameMaster\'s post image. Details: La mia coppa eSoprt cheho vinto oggi ');

-- --------------------------------------------------------

--
-- Struttura della tabella `preferences`
--

CREATE TABLE `preferences` (
  `type` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `preferences`
--

INSERT INTO `preferences` (`type`, `userID`, `value`) VALUES
('NCOMMENT', 1, 1),
('NCOMMENT', 2, 1),
('NCOMMENT', 3, 1),
('NCOMMENT', 4, 1),
('NCOMMENT', 5, 1),
('NCOMMENT', 6, 0),
('NCOMMENT', 7, 1),
('NCOMMENT', 8, 1),
('NCOMMENT', 9, 1),
('NCOMMENT', 10, 1),
('NCOMMENT', 11, 1),
('NFOLLOWER', 1, 1),
('NFOLLOWER', 2, 1),
('NFOLLOWER', 3, 1),
('NFOLLOWER', 4, 1),
('NFOLLOWER', 5, 1),
('NFOLLOWER', 6, 0),
('NFOLLOWER', 7, 1),
('NFOLLOWER', 8, 1),
('NFOLLOWER', 9, 1),
('NFOLLOWER', 10, 1),
('NFOLLOWER', 11, 1),
('NLIKECOMMENT', 1, 0),
('NLIKECOMMENT', 2, 0),
('NLIKECOMMENT', 3, 0),
('NLIKECOMMENT', 4, 0),
('NLIKECOMMENT', 5, 0),
('NLIKECOMMENT', 6, 1),
('NLIKECOMMENT', 7, 0),
('NLIKECOMMENT', 8, 0),
('NLIKECOMMENT', 9, 0),
('NLIKECOMMENT', 10, 0),
('NLIKECOMMENT', 11, 0),
('NLIKEPOST', 1, 0),
('NLIKEPOST', 2, 0),
('NLIKEPOST', 3, 0),
('NLIKEPOST', 4, 0),
('NLIKEPOST', 5, 0),
('NLIKEPOST', 6, 1),
('NLIKEPOST', 7, 0),
('NLIKEPOST', 8, 0),
('NLIKEPOST', 9, 0),
('NLIKEPOST', 10, 0),
('NLIKEPOST', 11, 0),
('NPOSTFEED', 1, 0),
('NPOSTFEED', 2, 0),
('NPOSTFEED', 3, 0),
('NPOSTFEED', 4, 0),
('NPOSTFEED', 5, 0),
('NPOSTFEED', 6, 0),
('NPOSTFEED', 7, 0),
('NPOSTFEED', 8, 0),
('NPOSTFEED', 9, 0),
('NPOSTFEED', 10, 0),
('NPOSTFEED', 11, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `profile_images`
--

CREATE TABLE `profile_images` (
  `ID` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `altText` varchar(500) NOT NULL,
  `longdesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `profile_images`
--

INSERT INTO `profile_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(1, 'default.png', 'Default user profile image.', 'Default user profile image. A blue user silhouette with transparent background.');

-- --------------------------------------------------------

--
-- Struttura della tabella `reply`
--

CREATE TABLE `reply` (
  `repliesToCommentID` int(11) NOT NULL,
  `repliedCommentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `psw` varchar(500) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `registrationDate` date NOT NULL,
  `userImg` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID`, `email`, `username`, `psw`, `name`, `surname`, `country`, `language`, `bio`, `registrationDate`, `userImg`, `active`) VALUES
(1, 'utente1@mail.it', 'utente1', '$2y$10$4NQdbmnS7zOVH2NMpvU0CultKoR/T658lF2RNWZEbB70YU.tgNLyy', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(2, 'utente2@mail.it', 'utente2', '$2y$10$vx/mddD.cZgS/hLwmnQ.y.cZDejNYTcSLtQJxLMqVuMnwh.Sdfv1S', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(3, 'utente3@mail.it', 'utente3', '$2y$10$pM3GRVHK4tHqtcTGn8TZJ.zRG8cFR88IfQWp6JXUgFpt3CIyGYhI2', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(4, 'utente4@mail.it', 'utente4', '$2y$10$N9VG/CsId.ks2i7ItsNgeumFlGDLjZRP1ISjm707eB8YYP6Uj5aCO', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(5, 'utente5@mail.it', 'utente5', '$2y$10$0wy/537mx9njs9KSH/qakOUr0BCZfoKyTybaqCX4qalI3UIFZvfpu', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(6, 'utente6@mail.it', 'utente6', '$2y$10$sJo1MV433eU4PFXnRIPxN.HmP2YXs8w2hhuQMUB7XmPN9dBduUNo6', NULL, NULL, NULL, NULL, NULL, '2023-06-02', 1, 1),
(7, 'alex.johnson@email.com', 'TechWiz', '$2y$10$0sRDFD.Tm2z48P/QPhiT.uxTqtaAjbyiYdTHdUWqVY6X6g1T03DKy', NULL, NULL, NULL, NULL, NULL, '2023-06-15', 1, 1),
(8, 'emma.martinez@email.com', 'GameMaster', '$2y$10$nhdyvHYvRfTPsBF9tQXeR.jTlAOdgoha9UggfTggYM.YFZck107Ja', NULL, NULL, NULL, NULL, NULL, '2023-06-15', 1, 1),
(9, 'luca.rossi@email.com', 'PixelArtist', '$2y$10$PvtcapUbP4//MoMS4M.Jt..BL3vPq2SaKsBdpUNarw8f.uOuqTu7u', NULL, NULL, NULL, NULL, NULL, '2023-06-15', 1, 1),
(10, 'sofia.andersson@email.com', 'QuestSeeker', '$2y$10$SEqw0xJMki6VR1rA3swSX.93nlKmFdCxTj6YHZz6FfO/4p1qmdhka', NULL, NULL, NULL, NULL, NULL, '2023-06-15', 1, 1),
(11, 'sara.costa@email.com', 'MobileGamer', '$2y$10$zE6Pb6QANYG5R5/j1J08eOn0ckNb6tuIF6jk6L8ApCaamueF/ZPB6', NULL, NULL, NULL, NULL, NULL, '2023-06-15', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_like_comment`
--

CREATE TABLE `user_like_comment` (
  `commentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user_like_post`
--

CREATE TABLE `user_like_post` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FKCOMMENT_IMAGE_ID` (`img`),
  ADD KEY `FKUSER_WRITE_COMMENT` (`userID`),
  ADD KEY `FKCOMMENT_POST` (`postID`);

--
-- Indici per le tabelle `comment_images`
--
ALTER TABLE `comment_images`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`userFollowed`,`userFollowing`),
  ADD KEY `FKfollowing` (`userFollowing`);

--
-- Indici per le tabelle `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKSRC_USER` (`userSrc`),
  ADD KEY `FKDEST_USER` (`userDest`);

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKUSER_WRITE_POST` (`userID`);

--
-- Indici per le tabelle `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`type`,`userID`),
  ADD KEY `FKR` (`userID`);

--
-- Indici per le tabelle `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`repliesToCommentID`,`repliedCommentID`),
  ADD KEY `FKreplied` (`repliedCommentID`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `user_like_comment`
--
ALTER TABLE `user_like_comment`
  ADD PRIMARY KEY (`commentID`,`userID`),
  ADD KEY `FKUSER_USE` (`userID`);

--
-- Indici per le tabelle `user_like_post`
--
ALTER TABLE `user_like_post`
  ADD PRIMARY KEY (`postID`,`userID`),
  ADD KEY `FKUSE_USE` (`userID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `comment_images`
--
ALTER TABLE `comment_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `post_images`
--
ALTER TABLE `post_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FKCOMMENT_IMAGE_FK` FOREIGN KEY (`img`) REFERENCES `comment_images` (`ID`),
  ADD CONSTRAINT `FKCOMMENT_POST` FOREIGN KEY (`postID`) REFERENCES `posts` (`ID`),
  ADD CONSTRAINT `FKUSER_WRITE_COMMENT` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `FKfollowed` FOREIGN KEY (`userFollowed`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `FKfollowing` FOREIGN KEY (`userFollowing`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FKDEST_USER` FOREIGN KEY (`userDest`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `FKSRC_USER` FOREIGN KEY (`userSrc`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FKUSER_WRITE_POST` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `FKR` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `FKreplied` FOREIGN KEY (`repliedCommentID`) REFERENCES `comments` (`ID`),
  ADD CONSTRAINT `FKrepliesTo` FOREIGN KEY (`repliesToCommentID`) REFERENCES `comments` (`ID`);

--
-- Limiti per la tabella `user_like_comment`
--
ALTER TABLE `user_like_comment`
  ADD CONSTRAINT `FKUSER_USE` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `FKUSE_COM` FOREIGN KEY (`commentID`) REFERENCES `comments` (`ID`);

--
-- Limiti per la tabella `user_like_post`
--
ALTER TABLE `user_like_post`
  ADD CONSTRAINT `FKUSE_POS` FOREIGN KEY (`postID`) REFERENCES `posts` (`ID`),
  ADD CONSTRAINT `FKUSE_USE` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
