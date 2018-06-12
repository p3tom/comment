CREATE TABLE reply (
	replyid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    cid int NOT NULL,
    uid varchar(128) not null,
    date datetime not null,
    message TEXT not null,
    FOREIGN KEY (cid) REFERENCES question(cid));
)


CREATE TABLE question ( 
	cid int NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	uid varchar(128) not null,
	date datetime not null,
	message TEXT NOT NULL, 
	replyid int NOT NULL );