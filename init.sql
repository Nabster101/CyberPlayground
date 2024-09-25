DROP TABLE IF EXISTS users;


CREATE TABLE users(
    id SERIAL primary key,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL
);

CREATE TABLE comments (
    id SERIAL primary key,
    username varchar(255) NOT NULL,
    comment text NOT NULL
);

INSERT INTO users (username, password, email)
VALUES
    ('admin', 'admin', 'admin@localhost'),
    ('user', 'user', 'user@localhost'),
    ('guest', 'guest', 'guest@localhost');
    