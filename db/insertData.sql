INSERT INTO `profile_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(1, 'default.png', 'Default user profile image.', 'Default user profile image. A blue user silhouette with transparent background.');


INSERT INTO `post_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(1, 'post1.png', 'Fantasy Landscape', 'Fantasy Ladscape del nuovo fantastico gioco rpg Fantasy'),
(2, 'post4.png', 'eSport Cup image', 'La coppa eSport che ho vinto oggi');


INSERT INTO `users` (`ID`, `email`, `username`, `psw`, `name`, `surname`, `country`, `language`, `bio`, `registrationDate`, `userImg`, `active`) VALUES
(1, 'utente1@mail.it', 'utente1', '$2y$10$4NQdbmnS7zOVH2NMpvU0CultKoR/T658lF2RNWZEbB70YU.tgNLyy', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(2, 'utente2@mail.it', 'utente2', '$2y$10$vx/mddD.cZgS/hLwmnQ.y.cZDejNYTcSLtQJxLMqVuMnwh.Sdfv1S', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(3, 'utente3@mail.it', 'utente3', '$2y$10$pM3GRVHK4tHqtcTGn8TZJ.zRG8cFR88IfQWp6JXUgFpt3CIyGYhI2', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(4, 'utente4@mail.it', 'utente4', '$2y$10$N9VG/CsId.ks2i7ItsNgeumFlGDLjZRP1ISjm707eB8YYP6Uj5aCO', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(5, 'utente5@mail.it', 'utente5', '$2y$10$0wy/537mx9njs9KSH/qakOUr0BCZfoKyTybaqCX4qalI3UIFZvfpu', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(6, 'utente6@mail.it', 'utente6', '$2y$10$sJo1MV433eU4PFXnRIPxN.HmP2YXs8w2hhuQMUB7XmPN9dBduUNo6', NULL, NULL, NULL, NULL, NULL, '2023-06-02', 1, 1),
(7, 'alex.johnson@email.com', 'TechWiz', '$2y$10$HeeTG73RlMuBijdLPmAEe.ev/fTiYQwULy/N8EKAMjWnNxdijCNum', 'Alex', 'Johnson', 'Bangladesh', 'Polski', 'Ciao sono Alex, vi posso aiutare se avete problemi tecnici', '2023-06-19', 1, 1),
(8, 'sara.costa@email.com', 'MobileGamer', '$2y$10$tsOyjiNmoTAq6TW/Rx2Y2O5Roh9Niez5U9Yg04sbJRulbRBYG.BPO', NULL, NULL, NULL, NULL, NULL, '2023-06-19', 1, 1),
(9, 'luca.rossi@email.com', 'PixelArtist', '$2y$10$gLetcMScjTIZjiDkb3uEO.LQgQZ.GxATOlfsVeqvRcYjmTjoLmx7e', NULL, NULL, NULL, NULL, NULL, '2023-06-19', 1, 1),
(10, 'emma.martinez@email.com', 'GameMaster', '$2y$10$zJp2R2eQkLcOAbXb1aL8huT1IniBQJY6TifUt.2L8dtAlllsaZRzW', NULL, NULL, NULL, NULL, NULL, '2023-06-19', 1, 1),
(11, 'sofia.andersson@email.com', 'QuestSeeker', '$2y$10$sOf5zCRS.LTJ8Z5.Mio15uK7XxJtZJGqQ6g8efNC9y3.9WAec3Qam', NULL, NULL, NULL, NULL, NULL, '2023-06-19', 1, 1);


INSERT INTO `posts` (`ID`, `img`, `title`, `text`, `dateTimePublished`, `userID`) VALUES
(1, 1, 'Il nuovo RPG fantasy che farà esplodere la tua immaginazione!', "Ciao a tutti, sono TechWiz e ho una notizia mozzafiato da condividere con voi oggi! Siete pronti a vivere un'avventura epica in un mondo fantastico? Un rinomato studio di sviluppo ha annunciato un nuovo RPG fantasy che promette di far esplodere la nostra immaginazione! Preparatevi a esplorare terre misteriose, combattere creature leggendarie e immergervi in una trama avvincente. Non vedo l'ora di tuffarmi in questo nuovo universo e condividere con voi ogni dettaglio emozionante. Tenetevi pronti per l'avventura più epica di tutti i tempi!", '2023-06-19 11:58:37', 7),
(2, NULL, "Le ultime scoperte tecnologiche!", "Ciao a tutti! Alex, il vostro TechWiz di fiducia, con le ultime scoperte tecnologiche! Ho trovato uno smartphone super avanzato e un'app di realtà aumentata incredibile. Sono entusiasta di sperimentarli!\n", '2023-06-19 12:04:28', 7),
(3, NULL, "Mi presento", 'Ciao a tutti, sono Emma \"GameMaster\" Martinez! Sono una giocatrice esperta e competitiva, e mi piace condividere strategie e consigli per migliorare le vostre abilità di gioco. Sono qui per aiutarvi, quindi non esitate a chiedere! - Emma \"GameMaster\" Martinez', '2023-06-19 12:05:19', 10),
(4, 2, 'Aggiornamento torneo', "Ciao a tutti! Sono entusiasta di condividere con voi la mia ultima vittoria! Dopo mesi di impegno e allenamento intenso, sono riuscita a conquistare il primo posto in un torneo di eSport. È stata un'esperienza incredibile e gratificante, e sono grata per tutto il supporto ricevuto dalla comunità di giocatori. Voglio ringraziare i miei compagni di squadra che hanno giocato con grande determinazione e tutti coloro che mi hanno sostenuto lungo il percorso. Continuerò a lavorare duramente per migliorare e affrontare nuove sfide. Ricordate, con impegno e dedizione, ogni vittoria è possibile! - Emma 'GameMaster' Martinez", '2023-06-19 12:06:56', 10),
(5, NULL, 'Questo sono io', 'Ciao, sono Luca Rossi, noto come \"PixelArtist\". Sono un artista digitale specializzato nella grafica per videogiochi e disponibile per collaborazioni con sviluppatori indie o team di giochi.\n', '2023-06-19 12:08:10', 9),
(6, NULL, "L'epica avventura di 'Realm of Legends' in un mondo magico", "'Realm of Legends' è un'avventura epica in un mondo magico che ti lascerà senza fiato. Scopri un regno incantato ricco di personaggi straordinari, ambientazioni suggestive e una trama coinvolgente.\nEsplora terre sconosciute, combatti contro nemici temibili e risolvi enigmi avvincenti. Personalizza il tuo eroe con abilità uniche e unisciti ad altri giocatori in battaglie multiplayer che ti metteranno alla prova.\n'Realm of Legends' offre un'esperienza visiva sorprendente, con grafica dettagliata che ti farà sentire immerso completamente nel mondo di gioco.\nPreparati a vivere un'avventura indimenticabile in'Realm of Legends', il gioco che ti porterà in mondi fantastici e ti farà sentire un vero eroe.", '2023-06-19 12:09:56', 11),
(7, NULL, "Le 5 gemme nascoste dei giochi mobili!", '1.\"Forgotten Memories: Alternate Realities\"\n2.\"Monument Valley\"\n3.\"Swordigo\"\n4.\"Mini Metro\"\n5.\"Alto\'s Adventure\"\nQueste sono solo alcune delle gemme nascoste che il vasto mondo dei giochi mobili ha da offrire. Spero che questa lista vi abbia dato qualche idea su quali giochi provare successivamente. Stay tuned per scoprire di cosa trattano questi singoli giochi\n', '2023-06-19 12:11:21', 8);


INSERT INTO `follow` (`userFollowing`, `userFollowed`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),

(2, 1),
(2, 3),
(2, 5),
(2, 10),
(2, 11),

(3, 1),
(3, 9),
(3, 11),

(4, 1),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),

(5, 2),
(5, 3),
(5, 5),
(5, 9),
(5, 11),

(6, 1),
(6, 8),
(6, 9),
(6, 11),

(7, 3),
(7, 5),
(7, 6),
(7, 9),
(7, 11),

(8, 2),
(8, 6),
(8, 7),
(8, 11),

(9, 4),
(9, 5),
(9, 7),
(9, 11),

(10, 7),
(10, 11),

(11, 2),
(11, 9),
(11, 10);


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