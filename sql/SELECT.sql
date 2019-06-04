--api/auth/index.php
SELECT uid, passwordHash, accountType FROM `users` WHERE username = ?

-- This statement is used in the login function which obtains the information(uid, passwordHash, accountType) to authenticate users' identity.

--api/customer/getInfo/index.php
SELECT * FROM `customers` WHERE `userId` = ?

-- This statement is used in the account information function, which obtains users' information according to the "userId" and will be displayed to the users.

-------------api/include/adminOnlyResponse/index.php-----------------
SELECT `accountType` FROM `users` WHERE `uid` = ?

-- This statement is used in the admin control function, which obtains users' account information according to the "userId" and will be displayed to the admin.

-------------api/include/tokenRequiredResponse/index.php-----------------
SELECT `userId` FROM `sessions` WHERE `sessionId` = ?

--This statement is used in the session control function, which obtains "userId" "according to the "sessionId" and will be used for controlling thee sessions.

--------------api\newUser\common\checkAvailability.php---------------------
SELECT uid FROM `users` WHERE `username` = ?

-- This statement is used in the signup function, which obtains existing userIds from database and check whether the inputted userId is available to register.

-------------api\restaurant\common\restaurantIdRequiredResponse.php------------
SELECT `belongedUser` FROM `restaurants` WHERE `id` = ?

-- This statement is used in the restaurant functions, which check whether the inputted id is belonged to specific user.

--------------api\restaurant\getInfo\index.php-------------
-- SELECT * FROM `restaurants` WHERE `belongedUser` = ?

--This statement is used the account information function, which obtains all the information of specific user and display it to the user.

-------------api\restaurant\getPlans\index.php-------------
SELECT `id`, `campaignTitle`, `promotionType`, `timestamp` FROM `advertisingPlans` WHERE `restaurantId` = ?

-- This statement is used in the account information function, which obtains the information of all advertising plan the restaurant has ordered and display it for the user.

SELECT SUM(`distributionQuantity`) FROM `coupons` WHERE `planId` = ?

-- This statement will sum up the quantity of all coupons of specific advertising plan.

SELECT COUNT(*) FROM `generatedCoupons` WHERE `couponId` IN ( SELECT `id` FROM `coupons` WHERE `planId` = ? )

-- This statement will count the number of generated coupons in specific advertising plan.
