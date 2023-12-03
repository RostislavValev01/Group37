--CREATE TABLE queries2(        --This table is in the queries database--
   -- Customer_ID VARCHAR(20) NOT NULL,
   --Query_ref VARCHAR (20) NOT NULL,
   -- First_Name VARCHAR(25) NOT NULL,
   -- Surname VARCHAR(40) NOT NULL,
   -- Email VARCHAR(100) NOT NULL,
   -- Query_description VARCHAR(2000) NOT NULL
   -- );--


--ALTER TABLE queries2
--ADD PRIMARY KEY (Query_ref);

--Because queries2 and clientDetails2 were two tables in two different databases I wasn't able to make Customer_ID a foreign key in the queries2 table--


CREATE TABLE queries(      --This table is in the hp_db database
    Customer_ID INT NOT NULL,
    Query_ref INT NOT NULL AUTO-INCREMENT,
    First_Name VARCHAR(25) NOT NULL,
    Surname VARCHAR(40) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Query_description VARCHAR(2000) NOT NULL,
    PRIMARY KEY (Query_ref)
    );

ALTER TABLE queries
ADD FOREIGN KEY (Customer_ID) REFERENCES accountdetails(Customer_ID);

INSERT INTO queries (Customer_ID, Query_ref, First_Name, Surname, Email, Query_description)                         
VALUES('220023', '121230', 'Emily', 'Mitchells', 'emilyM@yahoo.com', 'My order did not arrive yet'); 


