
-- Database Section
-- ________________ 

CREATE DATABASE IF NOT EXISTS netgamers;
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
     constraint IDIMAGE_ID primary key (ID));

create table POST_IMAGES (
     ID INT not null auto_increment,
     `path` varchar(500) not null,
     altText varchar(500) not null,
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