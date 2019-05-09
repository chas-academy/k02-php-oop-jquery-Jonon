# TwitterClone

This is a simple clone of the famous website Twitter

Website: <https://pure-savannah-86037.herokuapp.com>

Here you can find my design, sitemap, personas and user stories for the website

design: <https://www.figma.com/file/dflGb31g9ZmDoXkLFqfzQpsw/Twitter-clone?node-id=0%3A1>

persona: <https://drive.google.com/open?id=1BkE-9yxQJgf3GLUfRXhCrj7kGLpwitYR>

persona: <https://drive.google.com/open?id=1WFP4XA9og51_dEKGASm-0bVtXl11z2_R6GrrsfSaerE>

user stories <https://drive.google.com/open?id=1tVWdk5y2dB61QLlovy0mV6-F8MBhOxRalsPYh9QHfGo>

## Getting Started

These are the things you will need to get the app up and running on your local machine

### Prerequisites

This is what you will need

- php
- mysql

You will need to install these aditional programs to get the app working on your local machine. If you are using Linux, you can simply install it with a few commands. If you are using Winderp everything as a developer becomes slightly more annoying, but I would advice you to use vagrant or a server like WAMP.

When you have done this you will need to create a database and these tables:

```mysql
CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(250) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  joinDate DATE NOT NULL,
  description VARCHAR(250) NOT NULL DEFAULT 'Please write something here...');

CREATE TABLE tweets (
  tweetId INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tweet VARCHAR(255) NOT NULL,
  Id INT(11) NOT NULL,
  INDEX FK_id_tweets (Id ASC),
  CONSTRAINT FK_id_tweets
    FOREIGN KEY (Id)
    REFERENCES users (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE followers (
  userId INT(11) NOT NULL,
  followerId INT(11) NOT NULL,
  INDEX userId (userId ASC),
  INDEX followerId (followerId ASC),
  CONSTRAINT followers_ibfk_1
    FOREIGN KEY (userId)
    REFERENCES users (id)
    ON UPDATE CASCADE,
  CONSTRAINT followers_ibfk_2
    FOREIGN KEY (followerId)
    REFERENCES users (id)
    ON UPDATE CASCADE);
```

In aditiion to this, you will also need to create a file called credentials.php and put in in the config folder. This file should not be pushed to github.

In the file you will need to include this:

```php
putenv("DB_DSN=mysql:host=127.0.0.1;dbname=mydatabase");
putenv("DB_USER=username");
putenv("DB_PASSWORD=password");
```

### Built with

- HTML
- php
- MVC
- [Bootstrap](https://getbootstrap.com/)
