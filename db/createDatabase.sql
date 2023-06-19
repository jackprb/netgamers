
-- Database Section
-- ________________ 

create database netgamers;
use netgamers;


-- Tables Section
-- _____________ 

create table COMMENTS (
     ID INT not null auto_increment,
     `text` varchar(1000) not null,
     `dateTime` datetime not null,
     userID INT not null,
     postID INT not null,
     constraint IDCOMMENT primary key (ID));

create table PROFILE_IMAGES (
     ID INT not null auto_increment,
     `path` varchar(500) not null,
     altText varchar(500) not null,
     longdesc varchar(1000) not null,
     constraint IDIMAGE_ID primary key (ID));

create table POST_IMAGES (
     ID INT not null auto_increment,
     `path` varchar(500) not null,
     altText varchar(500) not null,
     longdesc varchar(1000) not null,
     constraint IDIMAGE_ID primary key (ID));

create table NOTIFICATIONS (
     ID INT not null auto_increment,
     content varchar(2000) not null,
     viewed boolean not null default false,
     `type` varchar(30) not null,
     dateTimeCreated datetime not null,
     dateTimeViewed datetime null,
     userSrc INT not null,
     userDest INT not null,
     constraint IDNOTIFICATION primary key (ID));

create table FOLLOW (
	 userFollowing INT not null,
     userFollowed INT not null,
     constraint IDFOLLOW primary key (userFollowed, userFollowing));

create table POSTS (
     ID INT not null auto_increment,
     img INT null,
     title varchar(500) not null,
     `text` varchar(2000) not null,
     dateTimePublished datetime not null,
     userID INT not null,
     constraint IDPOST primary key (ID));

create table USER_LIKE_COMMENT (
     commentID INT not null,
     userID INT not null,
     constraint IDUSER_LIKE_COMMENT primary key (commentID, userID));

create table USER_LIKE_POST (
     postID INT not null,
     userID INT not null,
     constraint IDUSER_LIKE_POST primary key (postID, userID));

create table PREFERENCES (
     `type` varchar(20) not null,
     userID INT not null,
     `value` boolean not null,
     constraint IDPREFERENCES primary key (`type`, userID));

create table USERS (
     ID INT not null auto_increment,
     email varchar(100) not null,
     username varchar(100) not null,
	 psw varchar(500) not null,
     `name` varchar(100) null,
     surname varchar(100) null,
     country varchar(100) null,
     `language` varchar(100) null,
     bio varchar(1000) null,
     registrationDate date not null,
     userImg INT not null default 1,
     `active` boolean not null default 1,
     constraint IDUSER primary key (ID));


-- Constraints Section
-- ___________________ 

alter table COMMENTS add constraint FKUSER_WRITE_COMMENT
     foreign key (userID)
     references USERS (ID);

alter table COMMENTS add constraint FKCOMMENT_POST
     foreign key (postID)
     references POSTS (ID);

alter table NOTIFICATIONS add constraint FKSRC_USER
     foreign key (userSrc)
     references USERS (ID);

alter table NOTIFICATIONS add constraint FKDEST_USER
     foreign key (userDest)
     references USERS (ID);

alter table FOLLOW add constraint FKfollowing
     foreign key (userFollowing)
     references USERS (ID);

alter table FOLLOW add constraint FKfollowed
     foreign key (userFollowed)
     references USERS (ID);

alter table POSTS add constraint FKUSER_WRITE_POST
     foreign key (userId)
     references USERS (ID);

alter table USER_LIKE_COMMENT add constraint FKUSER_USE
     foreign key (userID)
     references USERS (ID);

alter table USER_LIKE_COMMENT add constraint FKUSE_COM
     foreign key (commentID)
     references COMMENTS (ID);

alter table USER_LIKE_POST add constraint FKUSE_USE
     foreign key (userID)
     references USERS (ID);

alter table USER_LIKE_POST add constraint FKUSE_POS
     foreign key (postID)
     references POSTS (ID);

alter table PREFERENCES add constraint FKR
     foreign key (userID)
     references USERS (ID);

INSERT INTO `profile_images` (`ID`, `path`, `altText`, `longdesc`) VALUES
(1, 'default.png', 'Default user profile image.', 'Default user profile image. A blue user silhouette with transparent background.');

INSERT INTO `users` (`ID`, `email`, `username`, `psw`, `name`, `surname`, `country`, `language`, `bio`, `registrationDate`, `userImg`, `active`) VALUES
(1, 'utente1@mail.it', 'utente1', '$2y$10$4NQdbmnS7zOVH2NMpvU0CultKoR/T658lF2RNWZEbB70YU.tgNLyy', NULL, NULL, NULL, NULL, NULL, '2023-06-03', '1', 1),
(2, 'utente2@mail.it', 'utente2', '$2y$10$vx/mddD.cZgS/hLwmnQ.y.cZDejNYTcSLtQJxLMqVuMnwh.Sdfv1S', NULL, NULL, NULL, NULL, NULL, '2023-06-03', '1', 1),
(3, 'utente3@mail.it', 'utente3', '$2y$10$pM3GRVHK4tHqtcTGn8TZJ.zRG8cFR88IfQWp6JXUgFpt3CIyGYhI2', NULL, NULL, NULL, NULL, NULL, '2023-06-03', '1', 1),
(4, 'utente4@mail.it', 'utente4', '$2y$10$N9VG/CsId.ks2i7ItsNgeumFlGDLjZRP1ISjm707eB8YYP6Uj5aCO', NULL, NULL, NULL, NULL, NULL, '2023-06-03', '1', 1),
(5, 'utente5@mail.it', 'utente5', '$2y$10$0wy/537mx9njs9KSH/qakOUr0BCZfoKyTybaqCX4qalI3UIFZvfpu', NULL, NULL, NULL, NULL, NULL, '2023-06-03', '1', 1),
(6, 'utente6@mail.it', 'utente6', '$2y$10$sJo1MV433eU4PFXnRIPxN.HmP2YXs8w2hhuQMUB7XmPN9dBduUNo6', NULL, NULL, NULL, NULL, NULL, '2023-06-02', '1', 1);

INSERT INTO `follow` (`userFollowing`, `userFollowed`) VALUES
(1, 6),
(6, 1),
(2, 1),
(3, 1),
(4, 1),
(1, 2),
(5, 2),
(1, 3),
(2, 3),
(2, 5);

INSERT INTO `preferences` (`type`, `userID`, `value`) VALUES
('NCOMMENT', 6, 0),
('NCOMMENT', 1, 1),
('NCOMMENT', 2, 1),
('NCOMMENT', 3, 1),
('NCOMMENT', 4, 1),
('NCOMMENT', 5, 1),
('NFOLLOWER', 6, 0),
('NFOLLOWER', 1, 1),
('NFOLLOWER', 2, 1),
('NFOLLOWER', 3, 1),
('NFOLLOWER', 4, 1),
('NFOLLOWER', 5, 1),
('NLIKECOMMENT', 6, 1),
('NLIKECOMMENT', 1, 0),
('NLIKECOMMENT', 2, 0),
('NLIKECOMMENT', 3, 0),
('NLIKECOMMENT', 4, 0),
('NLIKECOMMENT', 5, 0),
('NLIKEPOST', 6, 1),
('NLIKEPOST', 1, 0),
('NLIKEPOST', 2, 0),
('NLIKEPOST', 3, 0),
('NLIKEPOST', 4, 0),
('NLIKEPOST', 5, 0),
('NPOSTFEED', 6, 0),
('NPOSTFEED', 1, 0),
('NPOSTFEED', 2, 0),
('NPOSTFEED', 3, 0),
('NPOSTFEED', 4, 0),
('NPOSTFEED', 5, 0);