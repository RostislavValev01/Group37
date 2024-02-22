

***UPDATED ORDERPROCESSING TABLE***

CREATE TABLE orderprocessing (
    OrderNumber INT NOT NULL AUTO_INCREMENT,
    OrderTotal DECIMAL(10, 2) NOT NULL,
    CustomerID INT NOT NULL,
    OrderStatus ENUM('Pending', 'Processing', 'Shipped', 'Delivered') NOT NULL,
    Order_Description TEXT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    City VARCHAR(255) NOT NULL,
    Country VARCHAR(255) NOT NULL,
    PostCode VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR(11) NOT NULL,
    PRIMARY KEY (OrderNumber),
    FOREIGN KEY (CustomerID) REFERENCES accountdetails(Customer_ID)

);



INSERT INTO orderprocessing(OrderTotal,CustomerID, OrderStatus, Order_Description, Email, FirstName, LastName, Address, City, Country, PostCode, PhoneNumber)
VALUES ('30','220023', 'Processing', '2x Cerave Foam Cleanser', 'emilyM@yahoo.com', 'Emily', 'Mitchells', '98 Spring Road', 'Birmingham', 'England', 'B10 0AA', '07198842650');
