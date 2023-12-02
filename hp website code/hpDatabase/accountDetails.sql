CREATE TABLE accountDetails (
    Customer_ID  VARCHAR(11) NOT NULL,
    FirstName VARCHAR(40) NOT NULL,
    Surname VARCHAR(40) NOT NULL,
    MobileNumber VARCHAR(11) NOT NULL,
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




INSERT INTO accountDetails (Customer_ID, FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, Admin_ID, AdminStatus)
VALUES ('220021','Ellen', 'Smith', '07456128791', 'ellen12@gmail.com', 
        '44 Springfield Road, Birmingham, B12 3BE', '1982/01/09', '109817', '1');




