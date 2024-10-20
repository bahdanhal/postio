CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    role VARCHAR(255) NOT NULL,
    login VARCHAR(255) NOT NULL,
    passwordHash VARCHAR(255) NOT NULL,
    authToken VARCHAR(255),
    PRIMARY KEY (id),
    UNIQUE (login)
);

INSERT INTO users(id, role, login, passwordHash, authToken) VALUES
(1, 'admin', 'admin', '098f6bcd4621d373cade4e832627b4f6', NULL);

CREATE TABLE posts (
    id int NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id),
);
