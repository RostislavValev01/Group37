CREATE TABLE accountdetails (
    Customer_ID  INT NOT NULL AUTO-INCREMENT,
    FirstName VARCHAR(40) NOT NULL,
    Surname VARCHAR(40) NOT NULL,
    MobileNumber VARCHAR(11) NOT NULL,
    Email VARCHAR(40) NOT NULL,
    CustomerAddress VARCHAR(40) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Admin_ID VARCHAR(11) NULL,
    AdminStatus BOOLEAN NOT NULL,
    PRIMARY KEY (Customer_ID)
    
    );


ALTER TABLE accountdetails
ADD AdminStatus BOOLEAN NULL;

ALTER TABLE accountdetails
DROP PRIMARY KEY;

ALTER TABLE accountdetails
ADD PRIMARY KEY (Customer_ID);




INSERT INTO accountdetails (Customer_ID, FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, Admin_ID, AdminStatus)
VALUES ('220021','Ellen', 'Smith', '07456128791', 'ellen12@gmail.com', 
        '44 Springfield Road, Birmingham, B12 3BE', '1982/01/09', '109817', '1');  --auto-increment function for customer_ID doesn't work--


INSERT INTO accountdetails (FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, Admin_ID, AdminStatus)                         
VALUES('Bob', 'Stone', '07129844651', 
       'stone@yahoo.com', 
       '102 Yardley Road , Coventry, CV12 9RU', '1987/09/15', 
       '909987', '1');    --auto-increment function for customer_ID works now--


INSERT INTO accountdetails (FirstName, Surname, MobileNumber, Email, CustomerAddress, DateOfBirth, Admin_ID, AdminStatus)                         
VALUES('Emily', 'Mitchells', '07198842650', 
       'emilyM@yahoo.com', 
       '98 Spring Road, Birmingham, B10 0AA', '1990/05/01', '',
       '0');  



