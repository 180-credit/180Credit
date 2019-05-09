-- 6/5/19
ALTER TABLE `users` ADD `profile_image` TEXT NULL AFTER `verificationToken`;
ALTER TABLE `users` ADD `isCreditRepairService` BOOLEAN NOT NULL DEFAULT FALSE AFTER `profile_image`, ADD `isCreditRepairIndustry` BOOLEAN NOT NULL DEFAULT FALSE AFTER `isCreditRepairService`;

-- 8/5/19
ALTER TABLE `users` ADD `googleId` VARCHAR(100) NULL AFTER `verificationToken`, ADD `facebookId` VARCHAR(100) NULL AFTER `googleId`;

-- 9/5/19
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `public_phone` varchar(15) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `scheduling_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `offersFreeConsultations` int(1) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_profiles` (`id`, `user_id`, `company_name`, `address1`, `address2`, `city`, `state_id`, `zip`, `public_phone`, `website_url`, `scheduling_url`, `facebook_url`, `twitter_url`, `youtube_url`, `linkedin_url`, `instagram_url`, `short_description`, `long_description`, `offersFreeConsultations`, `CreatedOn`, `ModifiedOn`) VALUES
(1, 1, 'Company name', '4 Main Street - Suite 200', NULL, 'Oaklyn', 5, '08035', '(856) 397-0063', 'http://website.com', 'http://website.com/schedule', 'http://facebook.com', 'http://twitter.com', 'http://youtube.com', 'http://linkedin.com', 'http://instagram.com', 'Short company description', 'Detailed description of my company and services.  La, la, la...', 1, '2019-05-09 00:00:00', NULL);
ALTER TABLE `user_profiles`   ADD PRIMARY KEY (`id`),  ADD UNIQUE KEY `id` (`id`);
ALTER TABLE `user_profiles`   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

CREATE TABLE `areas_of_specialty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `areas_of_specialty` (`id`, `name`) VALUES
(1, 'Authorized User Accounts'),
(16, 'Bankruptcy'),
(17, 'Budget and Savings'),
(18, 'Chargeoffs'),
(19, 'Collections'),
(20, 'Consumer Credit Counseling'),
(21, 'Credit Cards'),
(22, 'Credit Inquiries'),
(23, 'Credit Repair'),
(24, 'Credit Repair Mistakes'),
(25, 'Credit Reports'),
(26, 'Credit Scores'),
(27, 'Debt Consolidation');
ALTER TABLE `areas_of_specialty`   ADD PRIMARY KEY (`id`),  ADD UNIQUE KEY `id` (`id`);
ALTER TABLE `areas_of_specialty`   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveUserCompanyProfile`(IN `pUserId` INT(11), IN `pCompanyName` VARCHAR(255), IN `pAddress` VARCHAR(255), IN `pCity` VARCHAR(45), IN `pStateId` INT(11), IN `pZip` VARCHAR(15), IN `pPublicPhone` VARCHAR(15), IN `pWebsiteUrl` VARCHAR(255), IN `pScheduleUrl` VARCHAR(255), IN `pFacebookUrl` VARCHAR(255), IN `pTwitterUrl` VARCHAR(255), IN `pYouTubeUrl` VARCHAR(255), IN `pLinkedinUrl` VARCHAR(255), IN `pInstagramUrl` VARCHAR(255))
BEGIN

	DECLARE spResult varchar(50);
 
   IF (EXISTS (SELECT 1 FROM `user_profiles` WHERE `user_profiles`.`user_id`=`pUserId`)) THEN
	   UPDATE 
		`user_profiles` 
	   SET
	    `company_name` = `pCompanyName`,
		`address1` = `pAddress`,
		`city` = `pCity`,
		`state_id` = `pStateId`,
		`zip` = `pZip`,
		`public_phone` = `pPublicPhone`,
		`website_url` = `pWebsiteUrl`,
		`scheduling_url` = `pScheduleUrl`,
		`facebook_url` = `pFacebookUrl`,
		`twitter_url` = `pTwitterUrl`,
		`youtube_url` = `pYouTubeUrl`,
		`linkedin_url` = `pLinkedinUrl`,
		`instagram_url` = `pInstagramUrl`,
		`ModifiedOn` = NOW()
	   WHERE 
		`user_id` = `pUserId`;

	SET spResult = 'User Profile Updated';
	
   ELSE 
   
       INSERT INTO `user_profiles` (
	   	`user_id`, 
		`company_name`, 
		`address1`, 
		`city`, 
		`state_id`, 
		`zip`, 
		`public_phone`, 
		`website_url`, 
		`scheduling_url`, 
		`facebook_url`, 
		`twitter_url`, 
		`youtube_url`, 
		`linkedin_url`, 
		`instagram_url`,
		`CreatedOn`
		) 
	  VALUES (
		`pUserId`, 
		`pCompanyName`, 
		`pAddress`,
		`pCity`,
		`pStateId`,
		`pZip`,
		`pPublicPhone`,
		`pWebsiteUrl`,
		`pScheduleUrl`,
		`pFacebookUrl`,
		`pTwitterUrl`,
		`pYouTubeUrl`,
		`pLinkedinUrl`,
		`pInstagramUrl`,
		NOW()
		);
		
	SET spResult = 'User Profile Created';
	
   END IF;
   
	SELECT spResult as ResultCode;		
  
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadAreasOfSpecialty`()
BEGIN
 
SELECT 
	`id`, 
	`name` 
FROM
	`areas_of_specialty` 
ORDER BY
	`name`;
  
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserCompanyProfile`(IN `pUserId` INT(11))
BEGIN
 
SELECT 
	`company_name`, 
	`address1`, 
	`city`, 
	`state_id`, 
	`zip`, 
	`public_phone`, 
	`website_url`, 
	`scheduling_url`, 
	`facebook_url`, 
	`twitter_url`, 
	`youtube_url`, 
	`linkedin_url`, 
	`instagram_url`
FROM
	`user_profiles` 
WHERE 
	`user_id` = `pUserId`;
  
END$$
DELIMITER ;