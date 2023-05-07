CREATE TABLE IF NOT EXISTS `users`
(
    `id`       int UNSIGNED                            NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_general_ci UNIQUE NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL

    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;
