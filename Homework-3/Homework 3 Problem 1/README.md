# How to Setup
## Prerequisites:
Apache, MYSQL server, PHP, Bootstrap, Javascript, HTML,CSS  
## Steps to setup and the code flow during execution:
1. Import the dataset 'Data Set For Homework 3 Problem 1.sql' into the database.
2. The scripts and style folder is used for Bootstrap library to implement the datetimepicker.
2. The first page is loaded through restaurant.php which will display the initial form.
3. After entering the data and clicking on submit, the user entered data is sent to Form_Submit.php which will display the list of available restaurants or will display "NO RESTAURANT IS AVAILABLE FOR BOOKING".
4. After clicking on Book,if the user is a registered user the restaurant is booked and all the bookings of the customer are displayed.If the user is not a registered user it will ask for more information i.e the customer phone number.All this is handled by Booking.php.
5. After entering the phone number incase of a user that is not registered and clicking on submit,the user entry is created in the customer table and the booking is done all the bookings of the customer are displayed.This is handled by Newuser.php  
