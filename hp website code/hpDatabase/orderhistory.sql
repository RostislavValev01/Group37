CREATE TABLE orderhistory (
    OrderID INT NOT NULL AUTO_INCREMENT,
    Customer_ID INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    ProductDescription VARCHAR(6000) NOT NULL,
    Quantity INT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    ProductSKU INT NOT NULL,
    OrderDate DATE NOT NULL,
    OrderStatus ENUM ('Pending', 'Processing', 'Shipped', 'Delivered') NOT NULL,
    PRIMARY KEY (OrderID),
    FOREIGN KEY (Customer_ID) REFERENCES accountdetails(Customer_ID),
    FOREIGN KEY (ProductSKU) REFERENCES stock(ProductSKU)
    );



INSERT INTO orderhistory (Customer_ID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('220021','Selsun 2.5% selenium sulphide shampoo','2.5% selenium sulphide. Medicated shampoo. Reduces greasiness of scalp. Slows down the growth of skin on scalp that causes flakes', '3', '12', '1', '2022-03-13', 'Shipped');

INSERT INTO orderhistory (Customer_ID, ProductName, ProductDescription, Quantity, Price, ProductSKU, OrderDate, OrderStatus)
VALUES ('220022','Difflam Mouth Spray','Suitable for adults, the elderly and children. With benzydamine hydrochloride. Targets mouth and throat pain', '1', '7.99', '2', '2023-12-06', 'Delivered');














