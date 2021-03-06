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

-- 10/5/19
CREATE TABLE `user_areas_of_specialty` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `area_of_specialty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_areas_of_specialty`
--

INSERT INTO `user_areas_of_specialty` (`id`, `user_id`, `area_of_specialty_id`) VALUES
(2, 1, 17),
(3, 1, 0),
(5, 1, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_areas_of_specialty`
--
ALTER TABLE `user_areas_of_specialty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_areas_of_specialty`
--
ALTER TABLE `user_areas_of_specialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadFeeTypes`()
BEGIN
 
SELECT 
	`id`, 
	`feeTypeName` 
FROM
	`fee_types` 
ORDER BY
	`feeTypeName`;
  
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserAreaOfSpecialty`(IN `pUserId` INT(11), IN `pAreaOfSpecialtyId` INT(11), IN `pStatus` INT(1))
BEGIN

	DECLARE spResult varchar(50);
	SET spResult = 'No Update Action Taken';
	
	IF (NOT EXISTS (SELECT 1 FROM `user_areas_of_specialty` WHERE `user_areas_of_specialty`.`user_id`=`pUserId` AND `user_areas_of_specialty`.`area_of_specialty_id`=`pAreaOfSpecialtyId`) AND pStatus = 1) THEN

		INSERT INTO `user_areas_of_specialty` (
	   	  `user_id`, 
		  `area_of_specialty_id`
		) 
		VALUES (
		  `pUserId`, 
		  `pAreaOfSpecialtyId`
		);

		SET spResult = 'User Area of Specialty Inserted';
	
	END IF;

	IF (EXISTS (SELECT 1 FROM `user_areas_of_specialty` WHERE `user_areas_of_specialty`.`user_id`=`pUserId` AND `user_areas_of_specialty`.`area_of_specialty_id`=`pAreaOfSpecialtyId`) AND pStatus = 0) THEN

		DELETE FROM `user_areas_of_specialty` 
		WHERE `user_areas_of_specialty`.`user_id`=`pUserId` 
		  AND `user_areas_of_specialty`.`area_of_specialty_id`=`pAreaOfSpecialtyId`;

		SET spResult = 'User Area of Specialty Deleted';
	
   END IF;
   
	SELECT spResult as ResultCode;		
  
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserFreeConsultation`(IN `pUserId` INT(11), IN `pStatus` INT (1))
BEGIN

	DECLARE spResult varchar(50);

	UPDATE 
	  `user_profiles`
	SET 
	  `offersFreeConsultations` = `pStatus`
	WHERE 
	  user_id = `pUserId`;

	SET spResult = "Free Consultation Status Updated";
   
	SELECT spResult as ResultCode;		
  
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUserFee`(IN `pUserFeeId` INT(11))
BEGIN

DECLARE spResult varchar(50);

DELETE FROM
	user_fees
WHERE 
	id = pUserFeeId;


SET spResult = "User Fee Deleted";
   
SELECT spResult as ResultCode;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadBillingTypes`()
BEGIN
 
SELECT 
	`id`, 
	`billingTypeName` 
FROM
	`billing_types` 
ORDER BY
	`billingTypeName`;
  
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserAreasOfSpecialty`(IN `pUserId` INT(11))
BEGIN

SELECT 
   a.id, 
   a.name, 
   u.area_of_specialty_id 
FROM 
   areas_of_specialty a
LEFT JOIN 
   user_areas_of_specialty u ON u.area_of_specialty_id = a.id 
   AND u.user_id = pUserId;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserFees`(IN `pUserId` INT(11))
BEGIN

SELECT
	f.id,
	ft.feeTypeName,
	f.amount,
	b.billingTypeName,
	f.displayOrder
FROM 
	`user_fees` f 
LEFT JOIN billing_types b ON b.id = f.billingTypeId
LEFT JOIN fee_types ft ON ft.id = f.feeTypeId
ORDER BY 
	f.displayOrder;

END$$
DELIMITER ;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserAboutMe`(IN `pUserId` INT(11))
BEGIN
 
SELECT 
	`short_description`, 
	`long_description` 
FROM
	`user_profiles` 
WHERE 
	`user_id` = `pUserId`;
  
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveUserAboutMe`(IN `pUserId` INT(11), IN `pShortDescription` VARCHAR(255), IN `pLongDescription` text)
BEGIN

	DECLARE spResult varchar(50);
 
   IF (EXISTS (SELECT 1 FROM `user_profiles` WHERE `user_profiles`.`user_id`=`pUserId`)) THEN
	   UPDATE 
		`user_profiles` 
	   SET
	    `short_description` = `pShortDescription`,
		`long_description` = `pLongDescription`,
		`ModifiedOn` = NOW()
	   WHERE 
		`user_id` = `pUserId`;

	SET spResult = 'User Profile Updated';
	
   ELSE 
   
       INSERT INTO `user_profiles` (
	   	`user_id`, 
		`short_description`, 
		`long_description`,
		`CreatedOn`
		) 
	  VALUES (
		`pUserId`, 
		`pShortDescription`, 
		`pLongDescription`,
		NOW()
		);
		
	SET spResult = 'User Profile Created';
	
   END IF;
   
	SELECT spResult as ResultCode;		
  
END$$
DELIMITER ;


CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `abbr` varchar(2) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `state` (`id`, `abbr`, `name`) VALUES
(1, 'AL', 'Alabama'),
(2, 'AK', 'Alaska'),
(3, 'AZ', 'Arizona'),
(4, 'AR', 'Arkansas'),
(5, 'CA', 'California'),
(6, 'CO', 'Colorado'),
(7, 'CT', 'Connecticut'),
(8, 'DE', 'Delaware'),
(9, 'DC', 'District of Columbia'),
(10, 'FL', 'Florida'),
(11, 'GA', 'Georgia'),
(12, 'HI', 'Hawaii'),
(13, 'ID', 'Idaho'),
(14, 'IL', 'Illinois'),
(15, 'IN', 'Indiana'),
(16, 'IA', 'Iowa'),
(17, 'KS', 'Kansas'),
(18, 'KY', 'Kentucky'),
(19, 'LA', 'Louisiana'),
(20, 'ME', 'Maine'),
(21, 'MD', 'Maryland'),
(22, 'MA', 'Massachusetts'),
(23, 'MI', 'Michigan'),
(24, 'MN', 'Minnesota'),
(25, 'MS', 'Mississippi'),
(26, 'MO', 'Missouri'),
(27, 'MT', 'Montana'),
(28, 'NE', 'Nebraska'),
(29, 'NV', 'Nevada'),
(30, 'NH', 'New Hampshire'),
(31, 'NJ', 'New Jersey'),
(32, 'NM', 'New Mexico'),
(33, 'NY', 'New York'),
(34, 'NC', 'North Carolina'),
(35, 'ND', 'North Dakota'),
(36, 'OH', 'Ohio'),
(37, 'OK', 'Oklahoma'),
(38, 'OR', 'Oregon'),
(39, 'PA', 'Pennsylvania'),
(40, 'RI', 'Rhode Island'),
(41, 'SC', 'South Carolina'),
(42, 'SD', 'South Dakota'),
(43, 'TN', 'Tennessee'),
(44, 'TX', 'Texas'),
(45, 'UT', 'Utah'),
(46, 'VT', 'Vermont'),
(47, 'VA', 'Virginia'),
(48, 'WA', 'Washington'),
(49, 'WV', 'West Virginia'),
(50, 'WI', 'Wisconsin'),
(51, 'WY', 'Wyoming');

ALTER TABLE `state`   ADD PRIMARY KEY (`id`);
ALTER TABLE `state`   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

CREATE TABLE `billing_types` (
  `id` int(11) NOT NULL,
  `billingTypeName` varchar(255) NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `billing_types` (`id`, `billingTypeName`, `createdByUserId`, `createdOn`) VALUES
(1, 'Per hour', 1, '2019-05-10 00:00:00'),
(2, 'Per item', 1, '2019-05-10 00:00:00'),
(3, 'Per month', 1, '2019-05-10 00:00:00');



CREATE TABLE `fee_types` (
  `id` int(11) NOT NULL,
  `feeTypeName` varchar(255) NOT NULL,
  `createdByUserId` int(11) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `fee_types` (`id`, `feeTypeName`, `createdByUserId`, `createdOn`) VALUES
(1, 'FREE 30 minute consultation', 1, '2019-05-09 00:00:00'),
(2, 'One-time application and setup fee', 1, '2019-05-09 00:00:00'),
(3, 'Dispute per item per bureau', 1, '2019-05-09 00:00:00');

ALTER TABLE `billing_types`   ADD PRIMARY KEY (`id`),  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `fee_types`   ADD PRIMARY KEY (`id`),  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `billing_types`   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `fee_types`   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE TABLE `user_fees` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `billingTypeId` int(11) NOT NULL,
  `feeTypeId` int(11) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `displayOrder` int(11) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-

INSERT INTO `user_fees` (`id`, `userId`, `billingTypeId`, `feeTypeId`, `amount`, `displayOrder`, `createdOn`) VALUES
(1, 1, 1, 1, '$ 200', 1, '2019-05-10 00:00:00');


ALTER TABLE `user_fees`   ADD PRIMARY KEY (`id`),   ADD UNIQUE KEY `id` (`id`),  ADD KEY `userId` (`userId`);

ALTER TABLE `user_fees`   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



-- 15/5/2019
DROP PROCEDURE `loadUserCompanyProfile`; CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserCompanyProfile`(IN `pUserId` INT(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT `company_name`, `address1`, `city`, `state_id`, `zip`, `public_phone`, `website_url`, `scheduling_url`, `facebook_url`, `twitter_url`, `youtube_url`, `linkedin_url`, `instagram_url`, `offersFreeConsultations` FROM `user_profiles` WHERE `user_id` = `pUserId`; END

-- 18/5/2019
DROP PROCEDURE `loadUserFees`; CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserFees`(IN `pUserId` INT(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT f.id, ft.feeTypeName, f.amount, b.billingTypeName, f.displayOrder FROM `user_fees` f LEFT JOIN billing_types b ON b.id = f.billingTypeId LEFT JOIN fee_types ft ON ft.id = f.feeTypeId WHERE f.userId = `pUserId` ORDER BY f.displayOrder; END 

-- 20/5/2019
DROP PROCEDURE `saveTag`; CREATE DEFINER=`root`@`localhost` PROCEDURE `saveTag`(IN `pUserId` INT(11), IN `pTagName` VARCHAR(255)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN DECLARE `pTagId` Int(11); IF (NOT EXISTS ( SELECT 1 FROM `tags` WHERE `tags`.`tagName`=`pTagName`)) THEN INSERT INTO `tags` ( `tagName`, `createdByUserId`, `createdOn`) VALUES ( `pTagName`, `pUserId`, NOW()); END IF; SET `pTagId` = (SELECT `id`FROM tags WHERE `tagName` = `pTagName` AND `createdByUserId` = `pUserId`); IF (NOT EXISTS ( SELECT 1 FROM `user_tags` WHERE `user_tags`.`tagId`=`pTagId` AND `user_tags`.`userId` = `pUserId`) ) THEN INSERT INTO `user_tags` ( `tagId`, `userId`, `createdOn`) VALUES ( `pTagId`, `pUserId`, NOW()); END IF; SELECT `id`, `tagName`, `createdByUserId` FROM tags WHERE `tagName` = `pTagName` AND `createdByUserId` = `pUserId`; END 

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUserTag`(IN `pUserId` INT, IN `pTagName` VARCHAR(255)) DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN DECLARE `pTagId` Int(11); DECLARE spResult varchar(50); IF (EXISTS ( SELECT 1 FROM `tags` WHERE `tags`.`tagName`=`pTagName`)) THEN SET `pTagId` = (SELECT `id`FROM tags WHERE `tagName` = `pTagName` AND `createdByUserId` = `pUserId`); DELETE FROM `user_tags` WHERE `userId` = `pUserId` AND `tagId` = `pTagId`; END IF; SET spResult = "User tag deleted"; SELECT spResult as ResultCode; END



-- 10/06/2019
DELIMITER $$
CREATE DEFINER = `root`@`localhost` 
PROCEDURE `viewUserAreasOfSpeciality`(IN `pQuery` VARCHAR(255)) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
BEGIN
    SELECT
        `u`.`user_id` AS `id`,
        CONCAT(`ud`.`firstName`, ' ', `ud`.`lastName`) AS `name`,
        `a`.`name` AS `area_name`,
        `u`.`area_of_specialty_id` AS `area_of_specialty_id`
    FROM
        (
            (
                `areas_of_specialty` `a`
            LEFT JOIN `user_areas_of_specialty` `u` ON
                (`u`.`area_of_specialty_id` = `a`.`id`)
            )
        LEFT JOIN `users` `ud` ON
            (`u`.`user_id` = `ud`.`userId`)
        )
    WHERE
        `u`.`user_id` IS NOT NULL AND(
            `ud`.`firstName` LIKE CONCAT('%', LOWER(TRIM(`pQuery`)),
            '%') OR `ud`.`lastName` LIKE CONCAT('%', LOWER(TRIM(`pQuery`)),
            '%')
        )
    GROUP BY
        `u`.`user_id`;




END$$
DELIMITER ;

-- DELIMITER $$
-- CREATE DEFINER = `root` @`localhost` PROCEDURE `viewZipCodesByNum`(IN `pQuery` VARCHAR(255)) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
-- BEGIN
--     SELECT
--         *
--     FROM
--         (
--         SELECT
--             `zipcodes`.`id`,
--             CONCAT(
--                 `zipcodes`.`ZIPCode`,
--                 ' ',
--                 `zipcodes`.`CityName`,
--                 ', ',
--                 `zipcodes`.`StateAbbr`
--             ) AS NAME
--         FROM
--             `zipcodes`
--     ) AS z
-- WHERE
--     `z`.`name` LIKE CONCAT('%', LOWER(TRIM(`pQuery`)),
--     '%');
-- END$$
-- DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `viewZipCodesByNum`(IN `pQuery` VARCHAR(255))
    NO SQL
SELECT id, CONCAT(
                 `zipcodes`.`ZIPCode`,
                ' ',
                 `zipcodes`.`CityName`,
                 ', ',
                 `zipcodes`.`StateAbbr`
             ) AS name FROM zipcodes WHERE `ZIPCode` LIKE CONCAT('%', LOWER(TRIM(`pQuery`)), '%')$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `viewZipCodesStateByText`(IN `pQuery` VARCHAR(255))
    NO SQL
SELECT id, CONCAT(StateName, ', ', StateAbbr) as name
FROM 
zipcodes
WHERE
`StateName` LIKE CONCAT('%', LOWER(TRIM('New')), '%')
GROUP BY StateName$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `viewZipCodesCityByText`(IN `pQuery` VARCHAR(255))
    NO SQL
SELECT id, CityName as name
FROM 
zipcodes
WHERE
`CityName` LIKE CONCAT('%', LOWER(TRIM(`pQuery`)), '%')
GROUP BY CityName$$
DELIMITER ;



-- 14/06/2019
DROP PROCEDURE `saveTag`; CREATE DEFINER=`root`@`localhost` PROCEDURE `saveTag`(IN `pUserId` INT(11), IN `pTagName` VARCHAR(255)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN DECLARE `pTagId` Int(11); IF (NOT EXISTS ( SELECT 1 FROM `tags` WHERE `tags`.`tagName`=`pTagName`)) THEN INSERT INTO `tags` ( `tagName`, `createdByUserId`, `createdOn`) VALUES ( `pTagName`, `pUserId`, NOW()); END IF; SET `pTagId` = (SELECT `id`FROM tags WHERE `tagName` = `pTagName`); IF (NOT EXISTS ( SELECT 1 FROM `user_tags` WHERE `user_tags`.`tagId`=`pTagId` AND `user_tags`.`userId` = `pUserId`) ) THEN INSERT INTO `user_tags` ( `tagId`, `userId`, `createdOn`) VALUES ( `pTagId`, `pUserId`, NOW()); END IF; SELECT `id`, `tagName`, `createdByUserId` FROM tags WHERE `tagName` = `pTagName` AND `createdByUserId` = `pUserId`; END



-- 28/06/2019
ALTER TABLE `users` ADD `question` VARCHAR(255) NOT NULL AFTER `facebookId`, ADD `answer` VARCHAR(500) NOT NULL AFTER `question`;

-- 06/07/2019
CREATE DEFINER=`root`@`localhost` PROCEDURE `reviewCount`(IN `pUserId` INT) DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT COUNT(*) as total_review, AVG(rating) as avg_review FROM user_reviews WHERE user_id = `pUserId` and review_type = 1 AND is_approved =1; END
CREATE DEFINER=`root`@`localhost` PROCEDURE `endorsementCount`(IN `pUserId` INT) DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT COUNT(*) as total_endorsement FROM user_reviews WHERE user_id = `pUserId` and review_type = 2 AND is_approved =1; END
CREATE DEFINER=`root`@`localhost` PROCEDURE `reviewAllDetails`(IN `pUserId` INT) DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT * FROM user_reviews as ur LEFT JOIN users as u ON (ur.reviewer_user_id = u.userId) WHERE ur.user_id = `pUserId` AND ur.is_approved =1; END


-- 09/07/2019
CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserProfile`(IN `pProfileId` INT, IN `pUserId` INT) DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN

SELECT
    u.userId,
    u.firstName,
    u.lastName,
    u.profile_image,
    up.company_name,
    up.address1,
    up.address2,
    up.city,
    s.abbr as 'state_abbr',
    s.name as 'state_name',
    up.zip,
    (SELECT latitude FROM zipcodes WHERE ZIPcode = up.zip LIMIT 1) as 'Latitude1',
    (SELECT longitude FROM zipcodes WHERE ZIPcode = up.zip LIMIT 1) as 'Longitude1',
    up.public_phone,
    up.website_url,
    up.scheduling_url,
    up.facebook_url,
    up.twitter_url,
    up.youtube_url,
    up.linkedin_url,
    up.instagram_url,
    up.short_description,
    up.long_description,
    up.offersFreeConsultations,
    up.isPremium,
    u.isCreditRepairService,
    u.isCreditRepairIndustry,
    r.id as 'reviewId',
    e.id as 'endorsementId',
    (SELECT AVG(rating) FROM `user_reviews` WHERE user_id = pProfileId AND review_type = 1 AND is_approved = 1) as 'avgRating',
    (SELECT COUNT(*) FROM `user_reviews` WHERE user_id = pProfileId AND review_type = 1 AND is_approved = 1) as 'reviewCount',
    (SELECT COUNT(*) FROM `user_reviews` WHERE user_id = pProfileId AND review_type = 2 AND is_approved = 1) as 'endorsementCount'

FROM
	`users` u
LEFT JOIN `user_profiles` up ON up.user_id = u.userId
LEFT JOIN `state` s on s.id = up.state_id
LEFT JOIN `user_reviews` r ON r.user_id = u.userId AND r.reviewer_user_id = pUserId AND r.review_type = 1
LEFT JOIN `user_reviews` e ON e.user_id = u.userId AND e.reviewer_user_id = pUserId AND e.review_type = 2

WHERE
	u.userId = pProfileId;
END

DROP PROCEDURE `reviewAllDetails`; CREATE DEFINER=`root`@`localhost` PROCEDURE `reviewAllDetails`(IN `pUserId` INT) DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT * FROM user_reviews as ur LEFT JOIN users as u ON (ur.reviewer_user_id = u.userId) WHERE ur.user_id = `pUserId` AND ur.is_approved =1; END




-- 11/07/2019
DROP PROCEDURE `loadUserTags`; CREATE DEFINER=`root`@`localhost` PROCEDURE `loadUserTags`(IN `pUserId` INT(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT `ut`.`id` as userTagId, `t`.`tagName` as tagname FROM `user_tags` ut LEFT JOIN `tags` t on (`ut`.`tagId` = `t`.`id` AND `ut`.`userId` = `t`.`createdByUserId`) WHERE `ut`.`userId` = `pUserId`; END
DROP PROCEDURE `saveTag`;
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveTag`(IN `pUserId` INT(11), IN `pTagName` VARCHAR(255)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN
	DECLARE `pTagId` Int(11);
IF (NOT EXISTS (
    SELECT 1 FROM `tags` WHERE `tags`.`tagName`=`pTagName` AND `tags`.`createdByUserId`=`pUserId`)) THEN
	INSERT INTO `tags` (
	`tagName`,
	`createdByUserId`,
	`createdOn`)
	VALUES (
    `pTagName`,
	`pUserId`,
	NOW());

END IF;

    SET `pTagId` = (SELECT `id`FROM tags
    WHERE `tagName` = `pTagName` AND `tags`.`createdByUserId`=`pUserId`);
    IF (NOT EXISTS (
    SELECT 1 FROM `user_tags` WHERE `user_tags`.`tagId`=`pTagId` AND `user_tags`.`userId` = `pUserId`) ) THEN
	INSERT INTO `user_tags` (
	`tagId`,
	`userId`,
	`createdOn`)
	VALUES (
    `pTagId`,
	`pUserId`,
	NOW());
    END IF;

	SELECT `id`, `tagName`, `createdByUserId`
    FROM tags
    WHERE `tagName` = `pTagName` AND `createdByUserId` = `pUserId`;

END