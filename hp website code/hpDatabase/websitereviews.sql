CREATE TABLE websitereviews (
    ReviewID INT NOT NULL AUTO_INCREMENT,
    CustomerID INT NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    ReviewRating INT NOT NULL,
    Description TEXT NOT NULL,
    PRIMARY KEY (ReviewID),
    FOREIGN KEY (CustomerID) REFERENCES accountdetails(Customer_ID)
);
