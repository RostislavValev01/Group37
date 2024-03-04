CREATE TABLE productreviews (
    ReviewID INT NOT NULL AUTO_INCREMENT,
    CustomerID INT NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    ProductSKU INT NOT NULL,
    ReviewRating INT NOT NULL,
    Description TEXT NOT NULL,
    PRIMARY KEY (ReviewID),
    FOREIGN KEY (CustomerID) REFERENCES accountdetails(Customer_ID),
    FOREIGN KEY (ProductSKU) REFERENCES stock(ProductSKU)
);

INSERT INTO productreviews (CustomerID, FirstName, LastName, ProductSKU, ReviewRating, Description) VALUES ('220021', 'Ellen', 'Smith', '1', '4', 'This product is great! I highly recommend it.');

INSERT INTO productreviews (CustomerID, FirstName, LastName, ProductSKU, ReviewRating, Description) VALUES ('220022', 'Bob', 'Stone', '7', '5', 'Awesome product! Just what I needed.');
