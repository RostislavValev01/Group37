CREATE TABLE stock(
    SKU_number INT NOT NULL,
    Quantity INT,
    Product VARCHAR(60),
    Product_Description VARCHAR (60),
    Barcode VARCHAR(60) NOT NULL,
    Product_Status ENUM('Pending', 'Order Confirmed', 'Shipped', 'Delivered') NOT NULL,
    Product_Category ENUM('General', 'SkinCare', 'Vitamins_Supplements', 'DentalCare', 'Haircare'),
    PRIMARY KEY(SKU_number)
    );

   ALTER TABLE stock
   ALTER COLUMN SKU_number varchar();
