create database db_desapegados;

use db_desapegados;

CREATE TABLE IF NOT EXISTS `categorias` (
    `id_categoria` INT NOT NULL AUTO_INCREMENT,
    `nome_categoria` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id_categoria`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Tabela `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
    `id_usuario` INT NOT NULL AUTO_INCREMENT,
    `nome_usuario` VARCHAR(140) NOT NULL,
    `nome_icon` LONGTEXT,
    `email` VARCHAR(190) NOT NULL,
    `telefone` VARCHAR(15) NOT NULL,
    `celular` VARCHAR(15) NOT NULL
    `status_usuario` TINYINT NOT NULL,
    `permissao` TINYINT NULL DEFAULT NULL,
    `data_nascimento` DATE NOT NULL,
    `senha` VARCHAR(250) NOT NULL,
    `cep` VARCHAR(8),
    `estado` VARCHAR(2) NOT NULL,
    `cidade` VARCHAR(45) NOT NULL,
    `bairro` VARCHAR(45) NOT NULL,
    `logradouro` VARCHAR(50) NOT NULL,
    `complemento` VARCHAR(45) NULL DEFAULT NULL,
    `num_casa` VARCHAR(45) NULL DEFAULT NULL,
    `updateDate` TIMESTAMP NULL DEFAULT NULL,
    `createDate` TIMESTAMP NULL DEFAULT NULL,
    `cpf` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id_usuario`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Tabela `anuncios`
CREATE TABLE IF NOT EXISTS `anuncios` (
    `id_anuncio` INT NOT NULL AUTO_INCREMENT,
    `id_usuario` INT NOT NULL,
    `id_categoria` INT NOT NULL,
    `nome_img` LONGTEXT,
    `nome_anuncio` VARCHAR(155) NOT NULL,
    `descricao` LONGTEXT,
    `status_anuncio` TINYINT,
    `createDate` DATETIME NOT NULL,
    `updateDate` DATETIME NULL DEFAULT NULL,
    PRIMARY KEY (`id_anuncio`),
    CONSTRAINT `fk_anuncios_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
    CONSTRAINT `fk_anuncios_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Insertar usuario de administrador
INSERT INTO `usuarios` (`nome_usuario`, `email`, `telefone`, `status_usuario`, `permissao`, `data_nascimento`, `senha`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `cpf`)
VALUES ('Administrador', 'admin@example.com', '1234567890', 1, 1, '2000-01-01', '$2a$12$b2pywJSOCgeJFyZnMngwpuydexijjYGCxAyj8ZREoee37rE1L8IR.', '89225721', 'SP', 'Sao Paulo', 'Centro', 'Rua Principal', '12345678901');

-- Insertar categorías
INSERT INTO `categorias` (`nome_categoria`) VALUES
('Electrónicos'),
('Ropa'),
('Hogar'),
('Automóviles'),
('Deportes'),
('Juguetes'),
('Muebles'),
('Belleza'),
('Libros'),
('Otro');

-- Insertar anuncios
INSERT INTO `anuncios` (`id_usuario`, `id_categoria`, `nome_anuncio`, `createDate`, `status_anuncio`)
VALUES (1, 1, 'Anuncio para Producto 1', NOW(), 1);

INSERT INTO `anuncios` (`id_usuario`, `id_categoria`, `nome_anuncio`, `createDate`, `status_anuncio`)
VALUES (1, 2, 'Anuncio para Producto 2', NOW(), 1);

INSERT INTO `anuncios` (`id_usuario`, `id_categoria`, `nome_anuncio`, `createDate`, `status_anuncio`)
VALUES (1, 3, 'Anuncio para Producto 3', NOW(), 1);
