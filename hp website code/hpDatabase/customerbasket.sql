CREATE TABLE customerbasket (
    BasketID INT NOT NULL AUTO_INCREMENT,
    CustomerID INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    ProductID INT NOT NULL,
    Price DECIMAL(5,2) NOT NULL,
    Quantity INT NOT NULL,
    PRIMARY KEY (BasketID),
    FOREIGN KEY (CustomerID) REFERENCES accountdetails(Customer_ID)
);

INSERT INTO customerbasket (CustomerID, ProductName, ProductID, Price, Quantity) VALUES ('220021', 'Product 1', '1001', '9.99', '2');

