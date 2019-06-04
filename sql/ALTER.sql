---------------------------------------------------comp2411_shakemart.sql-----------------------------------------------------
ALTER TABLE `advertisingPlans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurantId`) USING BTREE;
--add a primary key"id" and foreign key restaurantId column which links to the restaurant table to the table advertisingPlans

ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planId` (`planId`) USING BTREE;
--add primary key "id" and the foreign key planId which links to advertisingPlans table to coupons table

ALTER TABLE `customers`
  ADD PRIMARY KEY (`userId`);
--add primary key to customer table

ALTER TABLE `generatedCoupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`ownerUid`),
  ADD KEY `couponId` (`couponId`);
--add primary key and two foreign key ownerUid and couponId to TABLE `generatedCoupons`,then it can links to coupon and customers table

ALTER TABLE `paymentRecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planId` (`planId`);
--add primary key "id" and the foreign key planId which links to advertisingPlans table to paymentRecord table


ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
--add a primary key to restaurants table

ALTER TABLE `paymentRecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--ensure the id column is not null because it is a primary key, and also set a default value to id and increase automatically when there is new data insert to the table

ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--ensure the id column is not null because it is a primary key, and also set id =18 and increase automatically when there is new data insert to the table

ALTER TABLE `sessions`
  MODIFY `sessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--ensure the sessionId column is not null because it is a primary key, and also set sessionId =123 and increase automatically when there is new data insert to the table

ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--ensure the uid column is not null because it is a primary key, and also set uid =75 and increase automatically when there is new data insert to the table

ALTER TABLE `advertisingPlans`
  ADD CONSTRAINT `advertisingPlans_ibfk_1` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--add a foreign key restaurantId to TABLE `advertisingPlans` and it links to restaurants id column, if id column is deleted, the foreign key at TABLE `advertisingPlans` will be deleted too

ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `advertisingPlans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--add a foreign key planId to TABLE `coupons` and it links to  advertisingPlans id column, if id column is deleted, the foreign key at TABLE `coupons` will be deleted too


ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionId`),
  ADD KEY `userId` (`userId`);
--add a primary key sessionId to table sessions and userId column which links to customer uid

ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);
--add a primary key uid to users table and a username column to record the unique username of users

ALTER TABLE `advertisingPlans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--ensure the id column is not null because it is a primary key, and also set id =6 and increase automatically when there is new data insert to the table

ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--ensure the id column is not null because it is a primary key, and also set id =5 and increase automatically when there is new data insert to the table

ALTER TABLE `generatedCoupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--ensure the id column is not null because it is a primary key, and also set id =2 and increase automatically when there is new data insert to the table

ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
--add a foreign key userId to TABLE `customers` and it links to  user table uid column, if uid column is deleted, the foreign key at TABLE `customers` will be deleted too


ALTER TABLE `generatedCoupons`
  ADD CONSTRAINT `generatedCoupons_ibfk_1` FOREIGN KEY (`couponId`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
--add a foreign key userId to TABLE `generatedCoupons` and it links to coupons table id column, if id column is deleted, the foreign key at TABLE `generatedCoupons` will be deleted too

  ADD CONSTRAINT `generatedCoupons_ibfk_2` FOREIGN KEY (`ownerUid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
--add a foreign key userId to TABLE `generatedCoupons` and it links to users table uid column, if uid column is deleted, the foreign key at TABLE `generatedCoupons` will be deleted too

ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`belongedUser`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
--add a foreign key userId to TABLE `restaurants` and it links to users table uid column, if uid column is deleted, the foreign key at TABLE `restaurants` will be deleted too


ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
--add a foreign key userId to TABLE `sessions` and it links to users table uid column, if uid column is deleted, the foreign key at TABLE `sessions` will be deleted too