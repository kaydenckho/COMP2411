-- api/customer/updateInfo/index.php
UPDATE `customers` SET gender=?, age=? WHERE userId=?

-- This statement is used in the customer update account information function which allows customers to set their gender and age.

-- api\restaurant\updateInfo\index.php
UPDATE `restaurants` SET name=?, targetedDistrict=?, address=?, description=?, openingTime=?, closingTime=? WHERE belongedUser=?

-- This statement is used in the restaurant update account information function which allows restaurants to set their name, targetedDistrict, address, description, openingTime and closingTime.
