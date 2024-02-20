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


INSERT INTO websitereviews(CustomerID, FirstName, LastName, ReviewRating, Description)
VALUES ('220021', 'Ellen', 'Smith', '4', 'Easy to navigate');

INSERT INTO websitereviews(CustomerID, FirstName, LastName, ReviewRating, Description)
VALUES ('220023','Emily', 'Mitchells', '5', 'Variety of products');
