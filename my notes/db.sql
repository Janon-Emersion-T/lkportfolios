/* Social Media */
CREATE TABLE `social_media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `platform` enum('Facebook','Twitter','LinkedIn','Instagram','YouTube','GitHub','Dribbble','Behance','Other') COLLATE utf8mb4_general_ci NOT NULL,
  `profile_url` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` datetime DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `add_to_cv` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `verifier_id` (`verifier_id`),
  CONSTRAINT `social_media_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `social_media_verifier_fk` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


/* Licences and Certifications */
CREATE TABLE `licenses_certifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `issuing_organization` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issue_month` int DEFAULT NULL,
  `issue_year` int DEFAULT NULL,
  `expiration_month` int DEFAULT NULL,
  `expiration_year` int DEFAULT NULL,
  `credential_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `credential_url` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `licenses_certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `licenses_certifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `licenses_certifications`
  ADD CONSTRAINT `licenses_certifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `licenses_certifications_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;


/* Career Break */
CREATE TABLE `career_breaks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT '0',
  `start_month` tinyint NOT NULL,
  `start_year` smallint NOT NULL,
  `end_month` tinyint DEFAULT NULL,
  `end_year` smallint DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ;

ALTER TABLE `career_breaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `career_breaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `career_breaks`
  ADD CONSTRAINT `career_breaks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `career_breaks_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* Education */
CREATE TABLE `education` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `field_of_study` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_month` tinyint NOT NULL,
  `start_year` smallint NOT NULL,
  `end_month` tinyint DEFAULT NULL,
  `end_year` smallint DEFAULT NULL,
  `grade` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '0',
  `activities` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0',
) ;

ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `education`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `education_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* experience */
CREATE TABLE `experience` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employment_type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT '0',
  `start_month` tinyint NOT NULL,
  `start_year` smallint NOT NULL,
  `end_month` tinyint DEFAULT NULL,
  `end_year` smallint DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location_type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ;

ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `experience`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* Honors and Awards */
CREATE TABLE `honors_awards` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `award_month` int DEFAULT NULL,
  `award_year` int DEFAULT NULL,
  `issuing_organization` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `credential_url` text COLLATE utf8mb4_general_ci,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `honors_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `honors_awards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `honors_awards`
  ADD CONSTRAINT `honors_awards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `honors_awards_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* Organizations */
CREATE TABLE `organization` (
  `id` bigint UNSIGNED NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `position_held` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `membership_ongoing` tinyint(1) DEFAULT '0',
  `start_month` tinyint NOT NULL,
  `start_year` smallint NOT NULL,
  `end_month` tinyint DEFAULT NULL,
  `end_year` smallint DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ;

ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `organization`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `organization`
  ADD CONSTRAINT `organizations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organizations_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;


/* Projects */
CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `start_month` tinyint NOT NULL,
  `start_year` smallint NOT NULL,
  `end_month` tinyint DEFAULT NULL,
  `end_year` smallint DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT '0',
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `contributors` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ;
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* Publications */
CREATE TABLE `publications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `publication_month` int DEFAULT NULL,
  `publication_year` int DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contributors` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `publication_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `media` json DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);
ALTER TABLE `publications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publications_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* Recommendations */
CREATE TABLE `recommendations` (
  `id` bigint UNSIGNED NOT NULL,
  `recommender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `month` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);
ALTER TABLE `recommendations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recommendations_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/* Skills */
CREATE TABLE `skills` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `skill_type` enum('Technical','Soft','Language','Other') COLLATE utf8mb4_general_ci NOT NULL,
  `skill_level` enum('Beginner','Intermediate','Advanced','Expert') COLLATE utf8mb4_general_ci NOT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` datetime DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `add_to_cv` tinyint(1) DEFAULT '0',
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);
ALTER TABLE `skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skills_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;


/* Test Scores */
CREATE TABLE `test` (
  `id` bigint UNSIGNED NOT NULL,
  `test` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `test_month` int DEFAULT NULL,
  `test_year` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `media` json DEFAULT NULL,
  `credential_url` text COLLATE utf8mb4_general_ci,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);
ALTER TABLE `test`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `test`
  ADD CONSTRAINT `test_scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_scores_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;


/* Patents */
CREATE TABLE `patents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patent_application_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `inventors` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `patent_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `media` json DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `verifier_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `add_to_cv` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verifier_id` (`verifier_id`);

ALTER TABLE `patents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patents_ibfk_2` FOREIGN KEY (`verifier_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
