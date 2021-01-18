CREATE DATABASE `php_mysql_contacts`;

USE `php_mysql_contacts`;

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `save_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

