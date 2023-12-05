CREATE TABLE loginclient(
	Customer_ID INT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    PRIMARY KEY(Customer_ID),
    FOREIGN KEY (Customer_ID) REFERENCES accountdetails(Customer_ID));
