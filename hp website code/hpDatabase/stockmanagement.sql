CREATE TABLE stock2(
    SKU_number INT NOT NULL,
    Quantity INT,
    Product VARCHAR(60),
    Product_Description VARCHAR (60),
    Barcode VARCHAR(60) NOT NULL,
    Product_Status ENUM('In stock', 'Not in Stock') NOT NULL,
    Product_Category ENUM('General', 'SkinCare', 'Vitamins_Supplements', 'DentalCare', 'Haircare'),
    PRIMARY KEY(SKU_number)
    );

ALTER TABLE stock
ALTER COLUMN SKU_number varchar();

ALTER TABLE stock
ALTER COLUMN Barcode int();

INSERT INTO stock2 (Product)
VALUES (LOAD_FILE("C:\Users\carla\OneDrive - Aston University\2nd Year\CS2TP\skincare product.png"));
