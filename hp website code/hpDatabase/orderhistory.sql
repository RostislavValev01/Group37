CREATE TABLE orderhistory (
    OrderID INT NOT NULL AUTO_INCREMENT,
    Customer_ID INT NOT NULL,
    ProductName VARCHAR(40) NOT NULL,
    ProductDescription VARCHAR(255) NOT NULL,
    Quantity INT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    ProductSKU INT NOT NULL,
    OrderDate DATE NOT NULL,
    OrderStatus VARCHAR(40) NOT NULL,
    PRIMARY KEY (OrderID),
    FOREIGN KEY (Customer_ID) REFERENCES accountdetails(Customer_ID),
    FOREIGN KEY (ProductSKU) REFERENCES stock(ProductSKU)
    );



INSERT INTO orderhistory (Customer_ID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('220021','Selsun 2.5% selenium sulphide shampoo','2.5% selenium sulphide. Medicated shampoo. Reduces greasiness of scalp. Slows down the growth of skin on scalp that causes flakes', '3', '12', '1', '2022-03-13', 'Shipped');

INSERT INTO orderhistory (Customer_ID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('220022','Difflam Mouth Spray','Suitable for adults, the elderly and children. With benzydamine hydrochloride. Targets mouth and throat pain', '1', '7.99', '2', '2023-12-06', 'Delivered');











INSERT INTO orderhistory (Customer_ID, ProductID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('220021','1000','Smartphone','Intel Core i5, 128GB SSD, 5.44" QHD+ Display', '1', '600.00', 'SKU-001', '2022-03-12', 'Shipped');

INSERT INTO orderhistory (Customer_ID, ProductID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('220021','1001','Laptop','Intel Core i7, 256GB SSD, 15.6" Full HD Display', '1', '1000.00', 'SKU-002', '2022-03-13', 'Shipped');

INSERT INTO orderhistory (Customer_ID, ProductID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('909987','1002','Tablet','Apple A12 Chip, 128GB SSD, 10.5" Display', '2', '500.00', 'SKU-003', '2022-03-14', 'Shipped');



