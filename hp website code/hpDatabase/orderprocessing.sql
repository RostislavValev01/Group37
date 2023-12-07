CREATE TABLE orderprocessing (
    OrderNumber INT NOT NULL AUTO_INCREMENT,
    OrderTotal DECIMAL(10, 2) NOT NULL,
    CustomerID INT NOT NULL,
    ProductID INT NOT NULL,
    PRIMARY KEY (OrderNumber),
    FOREIGN KEY (CustomerID) REFERENCES accountdetails(Customer_ID),
    FOREIGN KEY (ProductSKU) REFERENCES stock(ProductSKU)
);

INSERT INTO orderprocessing (OrderTotal, CustomerID, ProductSKU) VALUES ('1000.00', '220021', '1001'); 
INSERT INTO orderprocessing (OrderTotal, CustomerID, ProductSKU) VALUES ('2000.00', '909987', '1002');
