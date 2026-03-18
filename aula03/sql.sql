CREATE DATABASE IF NOT EXISTS syspan_estagio
 DEFAULT CHARACTER SET utf8mb4
 DEFAULT COLLATE utf8mb4_general_ci;
USE syspan_estagio;
CREATE TABLE IF NOT EXISTS clientes (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 email VARCHAR(120) NOT NULL,
 telefone VARCHAR(20) NULL,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX uk_clientes_email ON clientes(email);

INSERT INTO clientes (nome, email, telefone) VALUES ('Samuel Aragão', 'samuelag@gmail.com', '99875-4521');
INSERT INTO clientes (nome, email, telefone) VALUES ('Simone Figueiredo', 'sfigueiredo@gmail.com', '98423-1546');
INSERT INTO clientes (nome, email, telefone) VALUES ('Ana Ruiz', 'anaruiz@gmail.com', '99742-5632');
INSERT INTO clientes (nome, email, telefone) VALUES ('Pedro Assunção', 'pedro@gmail.com', '99302-8504');
INSERT INTO clientes (nome, email, telefone) VALUES ('Vicente Araújo', 'araujov@gmail.com', '98463-8102');

SELECT * FROM clientes ORDER BY nome;

SELECT * FROM clientes WHERE nome LIKE '%ara%';

UPDATE clientes SET telefone = '99978-9999' WHERE id = 5;

DELETE FROM clientes WHERE id = 2;