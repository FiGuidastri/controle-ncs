CREATE DATABASE IF NOT EXISTS controle_ncs CHARACTER SET = 'utf8mb4';

USE controle_ncs;

CREATE TABLE gestores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    area VARCHAR(100) NOT NULL
);

CREATE TABLE notificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_notificacao VARCHAR(50) NOT NULL,
    area_responsavel VARCHAR(100) NOT NULL,
    data_recebimento DATE NOT NULL,
    prazo INT NOT NULL,
    data_final DATE NOT NULL,
    descricao TEXT NOT NULL
);

CREATE TABLE areas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_area VARCHAR(255) NOT NULL
);

ALTER TABLE gestores ADD COLUMN id_area INT;
ALTER TABLE gestores ADD CONSTRAINT fk_area FOREIGN KEY (id_area) REFERENCES areas(id);

ALTER TABLE notificacoes ADD COLUMN id_area INT;
ALTER TABLE notificacoes ADD CONSTRAINT fk_notificacao_area FOREIGN KEY (id_area) REFERENCES areas(id);

INSERT INTO areas (nome_area) VALUES 
('Meio Ambiente'), 
('RH'), 
('Operações'), 
('Pedágio'), 
('TI'), 
('Engenharia'), 
('Conservação'), 
('Comunicação'), 
('Financeiro'), 
('Contabilidade');

ALTER TABLE notificacoes DROP COLUMN area_responsavel;

SELECT * FROM gestores;

SELECT * FROM areas;

ALTER TABLE gestores ADD FOREIGN KEY (id_area) REFERENCES areas(id); -- Define a chave estrangeira

ALTER TABLE gestores DROP COLUMN area;

SELECT * FROM notificacoes;