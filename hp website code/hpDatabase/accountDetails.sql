CREATE TABLE accountDetails (
    Customer_ID  VARCHAR(11) NOT NULL,
    FirstName VARCHAR(40) NOT NULL,
    Surname VARCHAR(40) NOT NULL,
    MobileNumber INT NOT NULL,
    Email VARCHAR(40) NOT NULL,
    CustomerAddress VARCHAR(40) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Admin_ID VARCHAR(11) NOT NULL,
    AdminStatus BOOLEAN NOT NULL,
    PRIMARY KEY (Customer_ID, Admin_ID)
    
    );


ALTER TABLE accountdetails
ADD AdminStatus BOOLEAN NOT NULL;

ALTER TABLE accountdetails
DROP PRIMARY KEY;

ALTER TABLE accountdetails
ADD PRIMARY KEY (Customer_ID);

ALTER TABLE accountdetails
ADD INDEX idx_Customer_ID (Customer_ID);

ALTER TABLE accountdetails 
MODIFY COLUMN Customer_ID VARCHAR AUTO_INCREMENT;


