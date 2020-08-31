-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sgp
CREATE DATABASE IF NOT EXISTS `sgp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sgp`;

-- Copiando estrutura para tabela sgp.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(40) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `numero` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `telefone` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cpf` varchar(40) NOT NULL,
  `rg` varchar(40) NOT NULL,
  `idInstituicao` varchar(40) NOT NULL,
  `matricula` varchar(40) NOT NULL,
  `cursoLeciona` varchar(40) DEFAULT NULL,
  `senha` varchar(40) NOT NULL,
  `cep` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgp.usuario: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`nome`, `endereco`, `bairro`, `numero`, `cidade`, `estado`, `telefone`, `email`, `cpf`, `rg`, `idInstituicao`, `matricula`, `cursoLeciona`, `senha`, `cep`) VALUES
	('fabricio', 'josecarneiro', 'santa margarida', '167', 'salgueiro', 'pernambuco', '91372728', 'biu2@gmail.com', '123', '123456789', '123456789', '123456789', 'edificaçoes', '123', '56000000'),
	('fabricio', 'josecarneiro', 'santa margarida', '167', 'salgueiro', 'pernambuco', '91372728', 'biu@gmail.com', '123456789', '123456789', '123456789', '123456789', 'edificaçoes', '123456789', '56000000'),
	('dsdsd', 'fdfd', 'eere', '-1', 'eerer', 'ererer', '23234545', 'fabricio@hhhjh', '12451157401', '1012212121', '1121212', '12121212', 'alimentos', '1234', '56000000'),
	('dsdsd', 'fdfd', 'eere', '-1', 'eerer', 'ererer', '23234545', 'fabricio@hhhjh', '12451157402', '1012212121', '1121212', '12121212', 'fisica', '2222', '56000000'),
	('fabricio', 'josecarneiro', 'santa margarida', '167', 'salgueiro', 'pernambuco', '91372728', 'biu2@gmail.com', '132323', '123456789', '123456789', '123456789', ' agropecuaria', '111111', '56000000');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
