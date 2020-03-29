/*
Uncomment to drop ALL tables
*/

/*
drop table members;
drop table stats;
drop table globalmessage;
drop table localmessages;
*/

create table members (
	fname varchar(30) not null,
	lname varchar(30) not null,
	email varchar(50) not null,
	username varchar(30) not null unique,
	password varchar(128) not null,
	id int not null auto_increment primary key
	currentAction varchar(100)
	/*currentActionEndTime time*/
);

create table stats (
	id int not null primary key references members,
	userMood tinyint not null,
	energy tinyint  not null,
	grade tinyint not null,
	suspicion tinyint not null,
	hunger tinyint not null,
	caffeine tinyint not null,
	nerdStatus tinyint not null
);

create table globalmessage(
	id  int not null primary key references members,
	content varchar(255)
);

create table localmessages(
	roomID int primary key,
	id  int not null references members,
	content varchar(255)
);
