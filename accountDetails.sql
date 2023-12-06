CREATE TABLE clientDetails (
    Customer_ID  VARCHAR(11),
    FirstName VARCHAR(40),
    Surname VARCHAR(40),
    MobileNumber INT,
    Email VARCHAR(40),
    CustomerAddress VARCHAR(40),
    DateOfBirth DATE,
    Admin_ID VARCHAR(11),
    AdminStatus BOOLEAN,
    PRIMARY KEY (Customer_ID, Admin_ID)
    
    );


ALTER TABLE clientdetails
ADD AdminStatus BOOLEAN NOT NULL;

ALTER TABLE clientdetails
DROP PRIMARY KEY;

ALTER TABLE clientdetails
ADD PRIMARY KEY (Customer_ID);
