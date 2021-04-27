## Kanban

## Primeiros passos
Tendo um servidor PHP e SQLServer rodando localmente, basta baixar o arquivo ZIP do projeto e inicia-lo em:
views/index

## Execute a query no seu banco 
(mysql)

CREATE TABLE `lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 13 DEFAULT CHARSET = utf8mb4


CREATE TABLE `item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `listaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listaId` (`listaId`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`listaId`) REFERENCES `lista` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 26 DEFAULT CHARSET = utf8mb4

## Não esqueca de trocar seu banco de dados no arquivo de configuração.


## Licensas
[The Movie Database](https://www.themoviedb.org/)
