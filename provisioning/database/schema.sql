CREATE TABLE news (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title varchar(128) NOT NULL,
	slug varchar(128) NOT NULL,
	text text NOT NULL,,
	KEY slug (slug)
);


