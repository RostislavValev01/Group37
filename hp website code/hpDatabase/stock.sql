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

ALTER TABLE stock
ADD COLUMN Price INT;
