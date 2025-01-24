CREATE TABLE `whatsapp_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_sid` varchar(250) DEFAULT NULL, 
  `auth_token` varchar(250) DEFAULT NULL, 
  `phone_number_id` varchar(250) DEFAULT NULL, 
  `user_id` int(11) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Add foreign key constraint if applicable:
  -- FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;






CREATE TABLE `linebusiness_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_secret` varchar(250) DEFAULT NULL,
  `channel_access_token` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Add foreign key constraint if applicable:
  -- FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



CREATE TABLE `twitter_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumer_key` varchar(250) DEFAULT NULL,
  `consumer_secret` varchar(250) DEFAULT NULL,
  `access_token` varchar(500) DEFAULT NULL,
  `access_token_secret` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Add foreign key constraint if applicable:
  -- FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;





CREATE TABLE `facebook_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(250) DEFAULT NULL,
  `app_secret` varchar(250) DEFAULT NULL,
  `access_token` varchar(500) DEFAULT NULL,
  `long_lived_access_token` varchar(500) DEFAULT NULL, 
  `page_id` varchar(100) DEFAULT NULL, 
  `page_access_token` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL, 
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Add foreign key constraint if applicable:
  -- FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;




CREATE TABLE `instagram_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(250) DEFAULT NULL,
  `client_secret` varchar(250) DEFAULT NULL,
  `access_token` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Add foreign key constraint if applicable:
  -- FOREIGN KEY (`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



