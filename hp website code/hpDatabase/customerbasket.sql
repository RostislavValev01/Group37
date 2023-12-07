CREATE TABLE customerbasket (
    CustomerBasketID INT NOT NULL AUTO_INCREMENT,
    Customer_ID INT NOT NULL,
    ProductName VARCHAR(40) NOT NULL,
    ProductID INT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    Quantity INT NOT NULL,
    PRIMARY KEY (CustomerBasketID),
    FOREIGN KEY (Customer_ID) REFERENCES accountdetails(Customer_ID)
    );



INSERT INTO customerbasket (Customer_ID, ProductName, ProductID, Price, Quantity)
VALUES ('220021','Smartphone', '1000', '600.00', '1');

INSERT INTO customerbasket (Customer_ID, ProductName, ProductID, Price, Quantity)
VALUES ('220021','Laptop', '1001', '1000.00', '1');

INSERT INTO customerbasket (Customer_ID, ProductName, ProductID, Price, Quantity)
VALUES ('909987','Tablet', '1002', '500.00', '2');
