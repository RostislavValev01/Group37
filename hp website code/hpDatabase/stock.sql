CREATE TABLE stock( 
    ProductSKU INT NOT NULL AUTO_INCREMENT,
    Quantity INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    Product_Description VARCHAR (255) NOT NULL,
    Barcode INT NOT NULL,
    Product_Status ENUM('In stock', 'Not in Stock') NOT NULL,
    Product_Category ENUM('General', 'SkinCare', 'Vitamins_Supplements', 'DentalCare', 'HairCare'),
    Price DECIMAL NOT NULL,
    PRIMARY KEY(ProductSKU)
    );




INSERT INTO `stock` (`ProductSKU`, `Quantity`, `ProductName`, `Product_Description`, `Barcode`, `Product_Status`, `Product_Category`, `Price`) VALUES
(1, 27, 'Selsun 2.5% selenium sulphide shampoo', '2.5% selenium sulphide. Medicated shampoo. Reduces greasiness of scalp. Slows down the growth of skin on scalp that causes flakes', 14956, 'In stock', 'Haircare', 4.09),
(2, 23, 'Regaine minoxidil', 'Increases blood flow to follicles. Results can be noticed in 8 weeks. Thicker, longer, more visible hair. Does not affect male hormones. Contains minoxidil', 19342, 'In stock', 'Haircare', 54.99),
(6, 40, 'Piriton allergy tablets', 'Piriton allergy tablets is an antihistamine containing Chlorphenamine Maleate which can help to relieve the symptoms of some allergies and itchy skin rashes.', 17564, 'In stock', 'General', 3.99),
(11, 35, 'Difflam Mouth Spray', 'Suitable for adults, the elderly and children. With benzydamine hydrochloride. Targets mouth and throat pain', 17568, 'In stock', 'DentalCare', 7.99),
(12, 40, 'Orajel dental gel', 'Benzocaine:use up to four times per day. Relieves tooth pain.', 12453, 'In stock', 'DentalCare', 5.99);
(7, 45, 'Gaviscon Advance', 'For heartburn and acid indigestion. 10ml dose contains 4.6 mmol of sodium, 2.0 mmol of potassium & 2.0 mmol of calcium.', 25304, 'In stock', 'General', 9.99),
(16, 59, 'Centrum Advance Multivitamins', '24 tablets. Each tablet includes, Vitamin C, Vitamin B12 and Vitamin D.', 98345, 'In stock', 'Vitamins_Supplements', 13.99),
(21, 54, 'Simple Moisturising Face Wash', 'Warning: for external usage only. Avoid getting into your eyes.', 36743, 'In stock', 'SkinCare', 3.80),
(17, 37, 'Seven Seas Omega-3 Fish Oil', 'No other leading brand has a higher level of Omega-3 in just one daily capsule 1250 mg Fish Oil, 1063 mg Omega-3; Vitamin D for bones, teeth, and to support the normal functioning of the immune system.', 24754, 'In stock', 'Vitamins_Supplements', 19.99),
(22, 28, 'Anthisan bite & sting', 'Containing the active ingredient Mepyramine Maleate 2% w/w, use as soon as possible after the bite or sting to help relieve itching, pain, swelling and inflammation. ', 21675, 'In stock', 'SkinCare', 4.95);


