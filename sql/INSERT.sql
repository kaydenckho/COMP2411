-- comp2411_shakemart.sql
INSERT INTO `advertisingPlans` (`id`, `restaurantId`, `campaignTitle`, `promotionType`, `timestamp`) VALUES
(1, 16, 'Campaign 0', 'Sweet', '2018-11-16 15:50:27'),
(5, 16, 'Campaign 1', 'Sweet', '2018-11-16 17:42:52');

-- This statement two sets of test data into table "advertisingPlans", with corresponding attributes:
-- `id`, `restaurantId`, `campaignTitle`, `promotionType`, `timestamp`
-- set1 (1, 16, 'Campaign 0', 'Sweet', '2018-11-16 15:50:27'),
-- set2 (5, 16, 'Campaign 1', 'Sweet', '2018-11-16 17:42:52');

INSERT INTO `coupons` (`id`, `planId`, `distributionQuantity`, `title`, `content`, `image`) VALUES
(2, 5, 100, '20% OFF CHA SIU FAN', '20% OFF CHA SIU FAN From HelloRest', ''),
(4, 1, 100, '10% OFF CHA SIU FAN', '10% OFF CHA SIU FAN From HelloRest so good so yummy', '');

-- This statement two sets of test data into table "coupons", with corresponding attributes:
-- `id`, `planId`, `distributionQuantity`, `title`, `content`, `image`
-- set1 (2, 5, 100, '20% OFF CHA SIU FAN', '20% OFF CHA SIU FAN From HelloRest', ''),
-- set2 (4, 1, 100, '10% OFF CHA SIU FAN', '10% OFF CHA SIU FAN From HelloRest so good so yummy', '').

INSERT INTO `customers` (`userId`, `gender`, `age`) VALUES
(70, 'Female', 16),
(73, 'Female', 12);

-- This statement two sets of test data into table "customers", with corresponding attributes:
-- `userId`, `gender`, `age`
-- set1 (70, 'Female', 16),
-- set2 (73, 'Female', 12);

INSERT INTO `generatedCoupons` (`id`, `couponId`, `claimed`, `ownerUid`, `claimedDate`, `expiryDate`) VALUES
(1, 2, 0, 70, '2018-11-17', '2018-11-19');

-- This statement a set of test data into table "customers", with corresponding attributes:
-- `id`, `couponId`, `claimed`, `ownerUid`, `claimedDate`, `expiryDate`
-- (1, 2, 0, 70, '2018-11-17', '2018-11-19');

INSERT INTO `restaurants` (`id`, `name`, `belongedUser`, `targetedDistrict`, `address`, `description`, `openingTime`, `closingTime`) VALUES
(16, 'Hello Restaurant', 71, 'Yuen Long', 'Street no. 18', 'So yummy', '07:00:00', '21:00:00'),
(17, 'Hello Restaurant II', 74, 'Yuen Long', 'Street no. 18', 'So yummy', '07:00:00', '21:00:00');

-- This statement two set of test data into table "restaurants", with corresponding attributes:
-- `id`, `name`, `belongedUser`, `targetedDistrict`, `address`, `description`, `openingTime`, `closingTime`
-- set1 (16, 'Hello Restaurant', 71, 'Yuen Long', 'Street no. 18', 'So yummy', '07:00:00', '21:00:00'),
-- set2 (17, 'Hello Restaurant II', 74, 'Yuen Long', 'Street no. 18', 'So yummy', '07:00:00', '21:00:00');

INSERT INTO `sessions` (`sessionId`, `userId`, `dateGenerated`) VALUES
(35, 1, '2018-11-12 12:24:42'),
(108, 70, '2018-11-16 17:46:18'),
(110, 71, '2018-11-16 17:48:15'),
(111, 71, '2018-11-16 18:10:04'),
(112, 71, '2018-11-16 21:51:20'),
(113, 73, '2018-11-16 21:52:35'),
(114, 71, '2018-11-16 21:53:40'),
(115, 71, '2018-11-16 22:47:33'),
(116, 71, '2018-11-16 23:01:01'),
(117, 71, '2018-11-17 00:07:17'),
(119, 71, '2018-11-17 02:12:33'),
(120, 71, '2018-11-17 02:18:52'),
(121, 71, '2018-11-17 02:24:07'),
(122, 71, '2018-11-17 03:10:11');

-- This statement 14 set of test data into table "sessions", with corresponding attributes:
-- `sessionId`, `userId`, `dateGenerated`
-- set1 (35, 1, '2018-11-12 12:24:42'),
-- set2 (108, 70, '2018-11-16 17:46:18'),
-- set3 (110, 71, '2018-11-16 17:48:15'),
-- set4 (111, 71, '2018-11-16 18:10:04'),
-- set5 (112, 71, '2018-11-16 21:51:20'),
-- set6 (113, 73, '2018-11-16 21:52:35'),
-- set7 (114, 71, '2018-11-16 21:53:40'),
-- set8 (115, 71, '2018-11-16 22:47:33'),
-- set9 (116, 71, '2018-11-16 23:01:01'),
-- set10 (117, 71, '2018-11-17 00:07:17'),
---set11 (119, 71, '2018-11-17 02:12:33'),
-- set12 (120, 71, '2018-11-17 02:18:52'),
-- set13 (121, 71, '2018-11-17 02:24:07'),
-- set14 (122, 71, '2018-11-17 03:10:11');

INSERT INTO `users` (`uid`, `username`, `email`, `passwordHash`, `accountType`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$9GVHR6jDfrQTKB7LS18CdeGNPjZuXMpug2xO2eWvqNuB.GKjtKenu', 'admin'),
(70, 'testAccount0', 'hellokitty@example.com', '$2y$10$Zlq5bHT.DjnZ/KtFcMMEPO3p/o2XT7V8nV6pZ.26siuUWnrGOdRHu', 'customer'),
(71, 'helloRest', 'helloRest@example.com', '$2y$10$jw.fpze0EJRvcuCk00LM.eL54CiZQ2NaPHXV6fdQS9pv2aa6oeJI2', 'restaurant'),
(73, 'testAccount1', 'hellokitty@example.com', '$2y$10$3xd3nkglrbqoMYvqY5VYu.IBMvgx.W/s8SIj1/lJh1F3EmnM6d//y', 'customer'),
(74, 'helloRest2', 'helloRest@example.com', '$2y$10$g/ztYP5ccDPr.jnHRibREOnTZ23KmTizii4NR1Zn.zfAT64uGSZr2', 'restaurant');

-- This statement 5 set of test data into table "sessions", with corresponding attributes:
-- `uid`, `username`, `email`, `passwordHash`, `accountType`
-- set1 (1, 'admin', 'admin@example.com', '$2y$10$9GVHR6jDfrQTKB7LS18CdeGNPjZuXMpug2xO2eWvqNuB.GKjtKenu', 'admin'),
-- set2 (70, 'testAccount0', 'hellokitty@example.com', '$2y$10$Zlq5bHT.DjnZ/KtFcMMEPO3p/o2XT7V8nV6pZ.26siuUWnrGOdRHu', 'customer'),
-- set3 (71, 'helloRest', 'helloRest@example.com', '$2y$10$jw.fpze0EJRvcuCk00LM.eL54CiZQ2NaPHXV6fdQS9pv2aa6oeJI2', 'restaurant'),
-- set4 (73, 'testAccount1', 'hellokitty@example.com', '$2y$10$3xd3nkglrbqoMYvqY5VYu.IBMvgx.W/s8SIj1/lJh1F3EmnM6d//y', 'customer'),
-- set5 (74, 'helloRest2', 'helloRest@example.com', '$2y$10$g/ztYP5ccDPr.jnHRibREOnTZ23KmTizii4NR1Zn.zfAT64uGSZr2', 'restaurant');

-- api\auth\index.php
INSERT INTO `sessions` (`userId`, `dateGenerated`) VALUES (?, CURRENT_TIMESTAMP)

-- This statement is used for inserting a new session with userID and the current time into the database.

-- api\newUser\common\newUser.php
INSERT INTO `users` (`username`, `email`, `passwordHash`, `accountType`) VALUES (?, ?, ?, ?)

-- This statement is used for inserting a new record of user information(`username`, `email`, `passwordHash`, `accountType`) when users sign up.

-- api\newUser\customer\index.php
INSERT INTO `customers` (`userId`, `gender`, `age`) VALUES (?, ?, ?)

-- This statement is used for inserting a new record of customer information(`userId`, `gender`, `age`) only when customer sign up.

-- api\newUser\restaurant\index.php
INSERT INTO `restaurants` (`name`, `belongedUser`, `targetedDistrict`, `address`, `description`, `openingTime`, `closingTime`) VALUES (?, ?, ?, ?, ?, ?, ?)

-- This statement is used for inserting a new record of restaurant information(`name`, `belongedUser`, `targetedDistrict`, `address`, `description`, `openingTime`, `closingTime`) only when restaurant sign up.

-- api\restaurant\addPlan\index.php
INSERT INTO `advertisingPlans` (`restaurantId`, `campaignTitle`, `promotionType`) VALUES (?, ?, ?)

-- This statement is used for inserting a new record of advertising plan information(`restaurantId`, `campaignTitle`, `promotionType`) when restaurants make new advertising plan.

INSERT INTO `coupons` (`planId`, `distributionQuantity`, `title`, `content`, `image`) VALUES (?, ?, ?, ?, ?)

-- This statement is used for inserting a new record of coupons information(`planId`, `distributionQuantity`, `title`, `content`, `image`) when restaurants make new advertising plan.
