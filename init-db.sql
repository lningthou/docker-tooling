CREATE TABLE todos (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT FALSE
);

INSERT INTO todos (title, completed) VALUES ('Buy groceries', FALSE);
INSERT INTO todos (title, completed) VALUES ('Read a book', TRUE);
INSERT INTO todos (title, completed) VALUES ('Learn Docker', FALSE);