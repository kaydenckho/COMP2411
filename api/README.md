User registration / login could now be fully implemented using the api:  

Send the requests listed below for different operations:  

!!! Every api call ends with a backslash / !!!   

To login:  
POST > https://comp2411.tsytang.pro/api/auth/  
Data required: username, password  
Output: token => A string of "password" you need to provide for future request, save it  

To logout:  
POST > https://comp2411.tsytang.pro/api/logout/  
Data required: token  
Output: successful => Whether logout is successful  

To check if a username is being used:  
GET > https://comp2411.tsytang.pro/api/newUser/checkAvailability/  
Data required: username  
Output: available => Whether a username is available  

To create a customer account:  
POST > https://comp2411.tsytang.pro/api/newUser/customer/  
Data required: username, password, gender (Male, Female, Others), age, email  
Output: successful => Whether the account creation is successful  

To create a restaurant account:  
POST > https://comp2411.tsytang.pro/api/newUser/restaurant/  
Data required: username, password, token, name, targetedDistrict, address, description, openingTime (hh:mm), closingTime (hh:mm), email  
Output: successful => Whether the account creation is successful  
Note: Please refer to the source code for the values you can use for targetedDistrict  

To update a restaurant entry:  
POST > https://comp2411.tsytang.pro/api/restaurant/updateInfo/  
Data required: token, restaurantId, name, targetedDistrict, address, description, openingTime (hh:mm), closingTime (hh:mm), contactEmail  
Output: successful => Whether the operation is successful  

To update customer account info:  
POST > https://comp2411.tsytang.pro/api/customer/updateInfo/  
Data required: token, gender (Male, Female, Others), age, email  
Output: successful => Whether the account creation is successful  

To get all the restaurant info related to a restaurant user:  
POST > https://comp2411.tsytang.pro/api/restaurant/getInfo/  
Data required: token  
Output: restaurants => All the restaurant info  

To get all the info related to a customer:  
POST > https://comp2411.tsytang.pro/api/customer/getInfo/  
Data required: token  
Output: restaurants => All the info about the customer  

If you want more information, please refer to the comment I've written in the respective source code.  
Please look up how to send POST/GET requests on Google if you don't know already, it is easy  

If anyone would like to write documentation for me in gitlab (or make this a markdown), it would be much appreciated.  

I'll be working on the update / delete features of the said information, new information might be added to the database when we implement new features.  
Try reading the source code to see if it makes sense, if you can help me implement some features I'd be very happy :D  
