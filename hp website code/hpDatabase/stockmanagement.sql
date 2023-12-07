CREATE TABLE stock(  --this table is in the healthpointdb database--
    SKU_number INT NOT NULL,
    Quantity INT,
    Product LONGBLOB,
    Product_Description VARCHAR (60),
    Barcode INT NOT NULL,
    Product_Status ENUM('In stock', 'Not in Stock') NOT NULL,
    Product_Category ENUM('General', 'SkinCare', 'Vitamins_Supplements', 'DentalCare', 'HairCare'),
    PRIMARY KEY(SKU_number)
    );


ALTER TABLE `stock` 
MODIFY COLUMN SKU_number INT AUTO_INCREMENT;

ALTER TABLE stock
ADD COLUMN Price INT;
