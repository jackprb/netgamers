INSERT INTO `profile_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(1, 'default.png', 'Default user profile image.', 'Default user profile image. A blue user silhouette with transparent background.'),
(2, 'techWiz.png', 'Little robot', 'Image of a robot with the name of techWiz'),
(3, 'GameMaster.png', 'Fantasy girl Tama', 'Beautiful fantasy girl of name Tama'),
(4, 'Frog.png', 'My favorite character ', 'An umanized frog drinking wine.'),
(5, 'QuestSeeker.jpeg', 'A girl in a green mist', 'A girl with a black dress in a green mist '),
(6, 'MobileGamer.jpg', 'A girl playing with her smartphone', 'A girl playing games with her smartphone');


INSERT INTO `post_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(1, 'post1.png', 'Fantasy Landscape', 'Fantasy Ladscape del nuovo fantastico gioco rpg Fantasy'),
(2, 'post4.png', 'eSport Cup image', 'La coppa eSport che ho vinto oggi'),
(3, 'GamingPC.jpg', 'Image of Acer Gaming PC', 'Image of Acer Gaming PC with RGB lights'),
(4, 'Building.png', 'A fantasy building ', 'A fantasy building in the desert with beautiful background'),
(5, 'MonsterHunter.jpg', 'A girl with a wolf in a videogame', 'A girl with a wolf in a videogame are friends'),
(6, 'MonsterHunter_2.jpg', 'QuestSeeker\'s post image: A girl with a wolf', 'QuestSeeker\'s post image. Details: A girl is friend with a wolf'),
(7, 'MobileGames.jpg', 'Some mobile games', 'A lot of mobile games picture ');


INSERT INTO `users` (`ID`, `email`, `username`, `psw`, `name`, `surname`, `country`, `language`, `bio`, `registrationDate`, `userImg`, `active`) VALUES
(1, 'utente1@mail.it', 'utente1', '$2y$10$4NQdbmnS7zOVH2NMpvU0CultKoR/T658lF2RNWZEbB70YU.tgNLyy', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(2, 'utente2@mail.it', 'utente2', '$2y$10$vx/mddD.cZgS/hLwmnQ.y.cZDejNYTcSLtQJxLMqVuMnwh.Sdfv1S', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(3, 'utente3@mail.it', 'utente3', '$2y$10$pM3GRVHK4tHqtcTGn8TZJ.zRG8cFR88IfQWp6JXUgFpt3CIyGYhI2', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(4, 'utente4@mail.it', 'utente4', '$2y$10$N9VG/CsId.ks2i7ItsNgeumFlGDLjZRP1ISjm707eB8YYP6Uj5aCO', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(5, 'utente5@mail.it', 'utente5', '$2y$10$0wy/537mx9njs9KSH/qakOUr0BCZfoKyTybaqCX4qalI3UIFZvfpu', NULL, NULL, NULL, NULL, NULL, '2023-06-03', 1, 1),
(6, 'utente6@mail.it', 'utente6', '$2y$10$sJo1MV433eU4PFXnRIPxN.HmP2YXs8w2hhuQMUB7XmPN9dBduUNo6', NULL, NULL, NULL, NULL, NULL, '2023-06-02', 1, 1),
(7, 'alex.johnson@email.com', 'TechWiz', '$2y$10$HeeTG73RlMuBijdLPmAEe.ev/fTiYQwULy/N8EKAMjWnNxdijCNum', 'Alex', 'Johnson', NULL, NULL, 'Ciao sono Alex, vi posso aiutare se avete problemi tecnici', '2023-06-19', 2, 1),
(8, 'sara.costa@email.com', 'MobileGamer', '$2y$10$tsOyjiNmoTAq6TW/Rx2Y2O5Roh9Niez5U9Yg04sbJRulbRBYG.BPO', 'Sara', 'Costa', 'Puerto Rico', 'Espanol', 'Hola chicos, soy Sara. Me encanta jugar en mi teléfono y si también eres un jugador móvil, sígueme para conocer las últimas noticias sobre los juegos más interesantes en Play/App store. \r\nHi guys, I\'m Sarah. I love playing games on my phone and if you are also a mobile gamer then follow me to get the latest news about the most interesting games on Play/App store.', '2023-06-19', 6, 1),
(9, 'luca.rossi@email.com', 'PixelArtist', '$2y$10$gLetcMScjTIZjiDkb3uEO.LQgQZ.GxATOlfsVeqvRcYjmTjoLmx7e', 'Luca', 'Rossi', 'Italy', 'Italiano', 'Ciao ragazzi, ho due passioni: il buon vino e i videogiochi. Spesso mi piace unire le mie passioni in modo da rendere la serata ancora più divertente.\r\nHi guys, I have two passions: good wine and video games. I often like to combine my passions in order to make the evening even more fun.', '2023-06-19', 4, 1),
(10, 'emma.martinez@email.com', 'GameMaster', '$2y$10$zJp2R2eQkLcOAbXb1aL8huT1IniBQJY6TifUt.2L8dtAlllsaZRzW', 'Emma', 'Martinez', 'South Korea', 'Coreano', '안녕하세요 여러분 제 채널에 오신 것을 환영합니다! / Hi guys, welcome to my channel! \r\n\r\n\r\n\r\nsponsored by Acer Predator.', '2023-06-19', 3, 1),
(11, 'sofia.andersson@email.com', 'QuestSeeker', '$2y$10$sOf5zCRS.LTJ8Z5.Mio15uK7XxJtZJGqQ6g8efNC9y3.9WAec3Qam', 'Sofia', 'Andersson', 'Norway', 'Norsk', 'Hei folkens, er dere klare til å følge meg på de sprøeste og farligste eventyrene dere noen gang har sett? Jeg vet at du er det, så følg meg og du vil ikke angre\r\nHey guys, are you ready to join me on the craziest and most dangerous adventures you\'ve ever seen? I know you are, so follow me and you won\'t regret it', '2023-06-19', 5, 1);


INSERT INTO `posts` (`ID`, `img`, `title`, `text`, `dateTimePublished`, `userID`) VALUES
(1, 1, 'Il nuovo RPG fantasy che farà esplodere la tua immaginazione!', 'Ciao a tutti, sono TechWiz e ho una notizia mozzafiato da condividere con voi oggi! Siete pronti a vivere un\'avventura epica in un mondo fantastico? Un rinomato studio di sviluppo ha annunciato un nuovo RPG fantasy che promette di far esplodere la nostra immaginazione! Preparatevi a esplorare terre misteriose, combattere creature leggendarie e immergervi in una trama avvincente. Non vedo l\'ora di tuffarmi in questo nuovo universo e condividere con voi ogni dettaglio emozionante. Tenetevi pronti per l\'avventura più epica di tutti i tempi!', '2023-06-19 11:58:37', 7),
(2, NULL, 'Le ultime scoperte tecnologiche!', 'Ciao a tutti! Alex, il vostro TechWiz di fiducia, con le ultime scoperte tecnologiche! Ho trovato uno smartphone super avanzato e un\'app di realtà aumentata incredibile. Sono entusiasta di sperimentarli!\n', '2023-06-19 12:04:28', 7),
(3, NULL, 'Mi presento', 'Ciao a tutti, sono Emma \"GameMaster\" Martinez! Sono una giocatrice esperta e competitiva, e mi piace condividere strategie e consigli per migliorare le vostre abilità di gioco. Sono qui per aiutarvi, quindi non esitate a chiedere! - Emma \"GameMaster\" Martinez', '2023-06-19 12:05:19', 10),
(4, 2, 'Aggiornamento torneo', 'Ciao a tutti! Sono entusiasta di condividere con voi la mia ultima vittoria! Dopo mesi di impegno e allenamento intenso, sono riuscita a conquistare il primo posto in un torneo di eSport. È stata un\'esperienza incredibile e gratificante, e sono grata per tutto il supporto ricevuto dalla comunità di giocatori. Voglio ringraziare i miei compagni di squadra che hanno giocato con grande determinazione e tutti coloro che mi hanno sostenuto lungo il percorso. Continuerò a lavorare duramente per migliorare e affrontare nuove sfide. Ricordate, con impegno e dedizione, ogni vittoria è possibile! - Emma \'GameMaster\' Martinez', '2023-06-19 12:06:56', 10),
(5, NULL, 'Questo sono io', 'Ciao, sono Luca Rossi, noto come \"PixelArtist\". Sono un artista digitale specializzato nella grafica per videogiochi e disponibile per collaborazioni con sviluppatori indie o team di giochi.\n', '2023-06-19 12:08:10', 9),
(6, NULL, 'L\'epica avventura di \'Realm of Legends\' in un mondo magico', '\'Realm of Legends\' è un\'avventura epica in un mondo magico che ti lascerà senza fiato. Scopri un regno incantato ricco di personaggi straordinari, ambientazioni suggestive e una trama coinvolgente.\nEsplora terre sconosciute, combatti contro nemici temibili e risolvi enigmi avvincenti. Personalizza il tuo eroe con abilità uniche e unisciti ad altri giocatori in battaglie multiplayer che ti metteranno alla prova.\n\'Realm of Legends\' offre un\'esperienza visiva sorprendente, con grafica dettagliata che ti farà sentire immerso completamente nel mondo di gioco.\nPreparati a vivere un\'avventura indimenticabile in\'Realm of Legends\', il gioco che ti porterà in mondi fantastici e ti farà sentire un vero eroe.', '2023-06-19 12:09:56', 11),
(7, NULL, 'Le 5 gemme nascoste dei giochi mobili!', '1.\"Forgotten Memories: Alternate Realities\"\n2.\"Monument Valley\"\n3.\"Swordigo\"\n4.\"Mini Metro\"\n5.\"Alto\'s Adventure\"\nQueste sono solo alcune delle gemme nascoste che il vasto mondo dei giochi mobili ha da offrire. Spero che questa lista vi abbia dato qualche idea su quali giochi provare successivamente. Stay tuned per scoprire di cosa trattano questi singoli giochi\n', '2023-06-19 12:11:21', 8),
(8, 3, 'My new Acer Predator PC / 내 새 Acer Predator PC', 'Hi guys, my new gaming PC just arrived. Thanks to Acer Predator for this flagship PC. \r\n안녕하세요 여러분, 제 새 게임용 PC가 막 도착했습니다. 이 플래그십 PC의 Acer Predator 덕분입니다.', '2023-06-24 10:41:54', 10),
(9, 4, 'Il castello del deserto. The desert Castle', 'Ciao ragazzi ecco un concept che ho creato di un castello fantasy. Chissà se un giorno lo vedremo in qualche gioco!!\r\nHi guys here is a concept I created of a fantasy castle. Who knows if one day we will see him in some game!!', '2023-06-24 10:57:48', 9),
(10, 6, 'Monster Hunter', 'Begynnelsen på et nytt vennskap vil også være begynnelsen på et nytt eventyr.\r\nThe beginning of a new friendship will also be the beginning of a new adventure', '2023-06-24 11:12:13', 11),
(11, 7, 'Top 2022 games', 'hola a todos, estos son algunos de los mejores juegos para que prueben si aún no lo han hecho. Me gustaron mucho.\r\nHi everyone, here are some of the best games for you to try if you haven\'t already. I liked them a lot', '2023-06-24 11:24:38', 8);


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
('NLIKECOMMENT', 1, 1),
('NLIKECOMMENT', 2, 0),
('NLIKECOMMENT', 3, 0),
('NLIKECOMMENT', 4, 0),
('NLIKECOMMENT', 5, 0),
('NLIKECOMMENT', 6, 1),
('NLIKECOMMENT', 7, 0),
('NLIKECOMMENT', 8, 0),
('NLIKECOMMENT', 9, 1),
('NLIKECOMMENT', 10, 0),
('NLIKECOMMENT', 11, 0),
('NLIKEPOST', 1, 0),
('NLIKEPOST', 2, 0),
('NLIKEPOST', 3, 0),
('NLIKEPOST', 4, 0),
('NLIKEPOST', 5, 0),
('NLIKEPOST', 6, 1),
('NLIKEPOST', 7, 0),
('NLIKEPOST', 8, 1),
('NLIKEPOST', 9, 1),
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
('NPOSTFEED', 9, 1),
('NPOSTFEED', 10, 0),
('NPOSTFEED', 11, 0);


INSERT INTO `comments` (`ID`, `text`, `dateTime`, `userID`, `postID`) VALUES
(2, 'Ciao Luca! Benvenuto nella community ; )', '2023-06-23 11:53:21', 1, 5),
(3, 'WOWWWWW!!!! Che spettacolo...', '2023-06-23 11:59:18', 1, 1),
(4, 'Lo proverò assolutamente!!  : )', '2023-06-23 12:03:23', 8, 6),
(5, 'Ciao TechWiz! Facci sapere', '2023-06-23 12:04:33', 8, 2),
(7, 'Ho provato il primo e il secondo ma non mi sono piaciuti molto : - (', '2023-06-23 12:15:19', 1, 7),
(8, 'Che vinca il migliore!!!', '2023-06-24 10:18:25', 2, 4),
(9, 'Can\'t wait to see the next adventure', '2023-06-24 11:57:59', 8, 10),
(10, 'Beautiful castle', '2023-06-24 12:27:54', 2, 9);


INSERT INTO `user_like_comment` (`commentID`, `userID`) VALUES
(2, 5),
(2, 7),
(3, 5),
(4, 2),
(4, 5),
(5, 8),
(7, 5),
(7, 8),
(8, 2);


INSERT INTO `user_like_post` (`postID`, `userID`) VALUES
(1, 1),
(2, 8),
(4, 1),
(4, 2),
(5, 1),
(6, 5),
(6, 7),
(6, 8),
(7, 1),
(7, 5);


INSERT INTO `notifications` (`ID`, `content`, `viewed`, `type`, `dateTimeCreated`, `dateTimeViewed`, `userSrc`, `userDest`) VALUES
(1, '<a href=\"post.php?p=7\"> Le 5 gemme nascoste dei giochi mobili!</a>', 0, 'NLIKEPOST', '2023-06-23 11:49:02', NULL, 1, 8),
(2, '<a href=\"post.php?p=7#c1\"> comment</a>', 1, 'NLIKECOMMENT', '2023-06-23 11:51:14', '2023-06-23 12:17:43', 8, 1),
(3, '<a href=\"post.php?p=\">Le 5 gemme nascoste dei giochi mobili!</a>', 1, 'NCOMMENT', '2023-06-23 12:14:37', '2023-06-23 12:15:28', 1, 8),
(4, '<a href=\"post.php?p=7\">Le 5 gemme nascoste dei giochi mobili!</a>', 0, 'NCOMMENT', '2023-06-23 12:15:19', NULL, 1, 8),
(5, '<a href=\"post.php?p=7#c7\"> comment</a>', 1, 'NLIKECOMMENT', '2023-06-23 12:15:39', '2023-06-24 12:24:15', 8, 1),
(6, '<a href=\"post.php?p=5&s=c2\"> comment</a>', 1, 'NLIKECOMMENT', '2023-06-24 10:16:14', '2023-06-24 12:24:18', 5, 1),
(7, '<a href=\"post.php?p=1&s=c3\"> comment</a>', 1, 'NLIKECOMMENT', '2023-06-24 10:16:26', '2023-06-24 12:24:19', 5, 1),
(8, '<a href=\"post.php?p=7&s=c7\"> comment</a>', 0, 'NLIKECOMMENT', '2023-06-24 10:16:49', NULL, 5, 1),
(9, '<a href=\"post.php?p=7\"> Le 5 gemme nascoste dei giochi mobili!</a>', 0, 'NLIKEPOST', '2023-06-24 10:16:52', NULL, 5, 8),
(10, '<a href=\"post.php?p=4&s=c8\">Aggiornamento torneo</a>', 0, 'NCOMMENT', '2023-06-24 10:18:25', NULL, 2, 10),
(11, '<a href=\"post.php?p=5&s=c2\"> comment</a>', 0, 'NLIKECOMMENT', '2023-06-24 10:23:44', NULL, 7, 1),
(12, '<a href=\"post.php?p=10&s=c9\">Monster Hunter</a>', 0, 'NCOMMENT', '2023-06-24 11:57:59', NULL, 8, 11),
(13, '<a href=\"post.php?p=7&s=c7\"> comment</a>', 0, 'NLIKECOMMENT', '2023-06-24 12:23:29', NULL, 8, 1),
(14, '<a href=\"post.php?p=9&s=c10\">Il castello del deserto. The desert Castle</a>', 0, 'NCOMMENT', '2023-06-24 12:27:54', NULL, 2, 9);
