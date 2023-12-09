CREATE TABLE orderprocessing (
    OrderNumber INT NOT NULL AUTO_INCREMENT,
    OrderTotal DECIMAL(10, 2) NOT NULL,
    CustomerID INT NOT NULL,
    ProductSKU INT NOT NULL,
    OrderStatus STRING,
    PRIMARY KEY (OrderNumber),
    FOREIGN KEY (CustomerID) REFERENCES accountdetails(Customer_ID),
    FOREIGN KEY (ProductSKU) REFERENCES stock(ProductSKU)
);

INSERT INTO orderprocessing (OrderTotal, CustomerID, ProductSKU, OrderStatus) VALUES ('1000.00', '220021', '1001', 'Pending'); 
INSERT INTO orderprocessing (OrderTotal, CustomerID, ProductSKU, OrderStatus) VALUES ('2000.00', '909987', '1002'. 'Pending');
