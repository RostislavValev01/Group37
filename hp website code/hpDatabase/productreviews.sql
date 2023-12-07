CREATE TABLE productreviews (
    ReviewID INT NOT NULL AUTO_INCREMENT,
    CustomerID INT NOT NULL,
    FirstName VARCHAR(40) NOT NULL,
    LastName VARCHAR(40) NOT NULL,
    SKUNumber INT NOT NULL,
    ReviewRating INT NOT NULL,
    Description TEXT NOT NULL,
    PRIMARY KEY (ReviewID),
    FOREIGN KEY (CustomerID) REFERENCES accountDetails.sql(Customer_ID),
    FOREIGN KEY (SKUNumber) REFERENCES stockmanagement.sql(SKU)
);

INSERT INTO productreviews (CustomerID, FirstName, LastName, SKUNumber, ReviewRating, Description) VALUES ('220021', 'Ellen', 'Smith', '1001', '4', 'This product is great! I highly recommend it.');
INSERT INTO productreviews (CustomerID, FirstName, LastName, SKUNumber, ReviewRating, Description) VALUES ('909987', 'Bob', 'Stone', '1002', '5', 'Awesome product! Just what I needed.');
