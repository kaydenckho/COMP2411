-- comp2411_shakemart.sql
CREATE TABLE `advertisingPlans` (
  `id` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `campaignTitle` varchar(255) NOT NULL,
  `promotionType` enum('Sweet','Prize','Jackpot','') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `planId` int(11) NOT NULL,
  `distributionQuantity` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(2047) NOT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'image_path'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `customers` (
  `userId` int(11) NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL DEFAULT 'Others',
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `generatedCoupons` (
  `id` int(11) NOT NULL,
  `couponId` int(11) NOT NULL,
  `claimed` tinyint(1) NOT NULL,
  `ownerUid` int(11) NOT NULL,
  `claimedDate` date NOT NULL,
  `expiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `paymentRecord` (
  `id` int(11) NOT NULL,
  `planId` int(11) NOT NULL,
  `transactionDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `belongedUser` int(11) NOT NULL,
  `targetedDistrict` enum('Islands','Kwai Tsing','North','Sai Kung','Sha Tin','Tai Po','Tsuen Wan','Tuen Mun','Yuen Long','Kowloon City','Kwun Tong','Sham Shui Po','Wong Tai Sin','Yau Tsim Mong','Central & Western','Eastern','Southern','Wan Chai') NOT NULL,
  `address` varchar(1023) NOT NULL,
  `description` varchar(2047) NOT NULL,
  `openingTime` time DEFAULT NULL,
  `closingTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sessions` (
  `sessionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateGenerated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  `accountType` enum('admin','customer','restaurant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- Create a table called `advertisingPlans` with attributes `id`, `restaurantId`, `campaignTitle`, `promotionType` and `timestamp`
