CREATE TABLE `linking_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(50) NOT NULL, 
  `provider_user_id` varchar(255) DEFAULT NULL, 
  `access_token` varchar(500) DEFAULT NULL, 
  `refresh_token` varchar(500) DEFAULT NULL, 
  `user_id` int(11) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Add foreign key constraint if applicable:
  -- FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
