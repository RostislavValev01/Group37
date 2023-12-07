CREATE TABLE stock( 
    ProductSKU INT NOT NULL,
    Quantity INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    Product_Description VARCHAR (255) NOT NULL,
    Barcode INT NOT NULL,
    Product_Status ENUM('In stock', 'Not in Stock') NOT NULL,
    Product_Category ENUM('General', 'SkinCare', 'Vitamins_Supplements', 'DentalCare', 'HairCare'),
    Price DECIMAL NOT NULL,
    PRIMARY KEY(ProductSKU)
    );


ALTER TABLE `stock` 
MODIFY COLUMN SKU_number INT AUTO_INCREMENT;


INSERT INTO stock (Quantity, ProductName, Product_Description, Barcode, Product_Status, Product_Category, Price)
VALUES ('10', 'Cerave Cleanser', 'Foam Cleanser for all skin types', '4958', 'In stock', 'SkinCare', '15.00');


