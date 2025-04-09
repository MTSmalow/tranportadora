CREATE DATABASE transportadora;
USE transportadora;

CREATE Table regiao(
    id_regiao INTEGER NOT NULL AUTO_INCREMENT,
    regiao VARCHAR(80) NOT NULL UNIQUE,
    PRIMARY KEY(id_regiao),
)engine = innodb;

CREATE Table frota (
    id_frota INTEGER NOT NULL AUTO_INCREMENT,
    nome_frota VARCHAR(80) NOT NULL UNIQUE,
    regiao INTEGER NOT NULL,
    PRIMARY KEY(id_frota)
)engine = innodb;


CREATE Table caminhao (
    id_caminhao INTEGER NOT NULL AUTO_INCREMENT,
    nome_caminhao VARCHAR(80) NOT NULL UNIQUE,
    capacidade INTEGER NOT NULL,
    frota INTEGER NOT NULL,
    descritivo VARCHAR(255) NOT NULL,
    consumo INTEGER NOT NULL,
    PRIMARY KEY(id_caminhao),
    FOREIGN KEY(frota) REFERENCES frota(id_frota) ON DELETE CASCADE,
)engine = innodb;