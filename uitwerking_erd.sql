CREATE TABLE users(
    id INT NOT NULL,
    username VARCHAR(255),
    created_at DATETIME_INTERVAL_PRECISION,
    updated_at DATETIME_INTERVAL_PRECISION,
    PRIMARY KEY(id)
);

CREATE TABLE authors(
    id INT NOT NULL,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    created_at DATETIME_INTERVAL_PRECISION,
    updated_at DATETIME_INTERVAL_PRECISION,
    PRIMARY KEY(id)
);

CREATE TABLE books(
    id INT NOT NULL,
    title VARCHAR(255),
    FOREIGN KEY(author_id) REFERENCES authors(id),
    publishing_year VARCHAR(255),
    genre VARCHAR(255),
    created_at DATETIME_INTERVAL_PRECISION,
    updated_at DATETIME_INTERVAL_PRECISION,
    PRIMARY KEY(id)
);

CREATE TABLE favourites(
    id INT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(book_id) REFERENCES books(id),
    created_at DATETIME_INTERVAL_PRECISION,
    updated_at DATETIME_INTERVAL_PRECISION,
    PRIMARY KEY(id)
);