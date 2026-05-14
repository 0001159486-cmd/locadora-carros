-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para locar
CREATE DATABASE IF NOT EXISTS `locar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `locar`;

-- Copiando estrutura para tabela locar.agendamentos
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `carro_id` bigint unsigned NOT NULL,
  `nome_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_retirada` date NOT NULL,
  `data_prevista_devolucao` date NOT NULL,
  `status` enum('Ativo','Finalizado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendamentos_carro_id_foreign` (`carro_id`),
  CONSTRAINT `agendamentos_carro_id_foreign` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.agendamentos: ~2 rows (aproximadamente)
INSERT INTO `agendamentos` (`id`, `carro_id`, `nome_cliente`, `data_retirada`, `data_prevista_devolucao`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Cliente Inicial HB20', '2026-05-13', '2026-05-18', 'Ativo', '2026-05-14 01:42:42', '2026-05-14 01:42:42'),
	(2, 4, 'Cliente Inicial Mobi', '2026-05-13', '2026-05-16', 'Ativo', '2026-05-14 01:42:42', '2026-05-14 01:42:42');

-- Copiando estrutura para tabela locar.carros
CREATE TABLE IF NOT EXISTS `carros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` int NOT NULL,
  `status` enum('Disponível','Agendado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disponível',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `carros_placa_unique` (`placa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.carros: ~5 rows (aproximadamente)
INSERT INTO `carros` (`id`, `modelo`, `marca`, `placa`, `ano`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Onix LT', 'Chevrolet', 'ABC1D23', 2022, 'Disponível', '2026-05-14 01:42:42', '2026-05-14 01:42:42'),
	(2, 'HB20 Comfort', 'Hyundai', 'DEF4E56', 2021, 'Agendado', '2026-05-14 01:42:42', '2026-05-14 01:42:42'),
	(3, 'Renegade Sport', 'Jeep', 'GHI7F89', 2023, 'Disponível', '2026-05-14 01:42:42', '2026-05-14 01:42:42'),
	(4, 'Mobi Like', 'Fiat', 'JKL2G34', 2020, 'Agendado', '2026-05-14 01:42:42', '2026-05-14 01:42:42'),
	(5, 'Corolla XEi', 'Toyota', 'MNO9H87', 2022, 'Disponível', '2026-05-14 01:42:42', '2026-05-14 01:42:42');

-- Copiando estrutura para tabela locar.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela locar.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2026_05_13_215930_create_carros_table', 1),
	(6, '2026_05_13_215942_create_agendamentos_table', 1);

-- Copiando estrutura para tabela locar.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela locar.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela locar.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_login_unique` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locar.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `nome`, `login`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'admin', '123', '2026-05-14 01:42:42', '2026-05-14 01:42:42'),
	(2, 'Atendente', 'atendente', 'qwer', '2026-05-14 01:42:42', '2026-05-14 01:42:42');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
