<?php
class Connect{
    public static function conexion(){
        $mysqli=new mysqli("localhost","root","root","accounts");
        $mysqli->set_charset("utf8");
        return $mysqli;
    }
}

/* Script for the creation of the database:

Create DATABASE IF NOT EXISTS accounts;
USE accounts;

DROP TABLE IF EXISTS files;
CREATE TABLE files (
	username VARCHAR(25),
    file_add VARCHAR(500)
);

DROP TABLE IF EXISTS users;
Create table users (
	mail VARCHAR(100) NOT NULL,
    username VARCHAR(25) NOT NULL UNIQUE,
    pwd_hash VARCHAR(60) NOT NULL,
    ver_hash VARCHAR(60) NOT NULL UNIQUE,
	verification BOOLEAN NOT NULL,
    creation_date DATETIME NOT NULL
);

ALTER TABLE users ADD CONSTRAINT pk_mail PRIMARY KEY(mail);

ALTER TABLE files ADD CONSTRAINT pk_file PRIMARY KEY(file_add);
ALTER TABLE files ADD CONSTRAINT fk_username FOREIGN KEY(username) REFERENCES users(username);
#DATETIME FORMAT: YYYY-MM-DD hh:mm:ss


SELECT * FROM users;
SELECT * FROM files;


*/

?>
