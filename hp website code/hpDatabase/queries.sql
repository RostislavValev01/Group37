

CREATE TABLE queries(      
    Customer_ID INT NULL,
    Query_ref INT NOT NULL AUTO_INCREMENT,
    First_Name VARCHAR(255) NOT NULL,
    Surname VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Query_description TEXT NOT NULL,
    PRIMARY KEY (Query_ref),
    FOREIGN KEY (Customer_ID) REFERENCES accountdetails(Customer_ID);
    );



INSERT INTO queries (Customer_ID, Query_ref, First_Name, Surname, Email, Query_description)                         
VALUES('220023', '121230', 'Emily', 'Mitchells', 'emilyM@yahoo.com', 'My order did not arrive yet');  -- at the moment only customers are allowed to make queries--


INSERT INTO queries (First_Name, Surname, Email, Query_description)                         
VALUES( 'Kelly', 'Parks', 'kells@yahoo.com', 'Cannot create an account'); -- now guests can make queries as well (the customer_id filed in the queries table will be NULL)--


