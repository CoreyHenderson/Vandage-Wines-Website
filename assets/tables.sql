DROP TABLE Orders;

CREATE TABLE Orders
     ( FirstName VARCHAR2(50),
	   LastName VARCHAR2(50),
       Email VARCHAR2(50),
       Phone VARCHAR2(15),
	   Address VARCHAR2(40),
	   City VARCHAR2(40),
	   Country VARCHAR2(40),
	   Postcode VARCHAR2(4),
	   Product VARCHAR2(40),
	   Quantity VARCHAR2(2),
       Price VARCHAR2(6),
	   Subtotal VARCHAR2(10),
	   CardName VARCHAR2(50),
	   CardNumber VARCHAR2(16),
	   CardExpiry VARCHAR2(5),
	   CardCVV VARCHAR2(5)
     );

DROP TABLE Products;

CREATE TABLE Products
     ( ID NUMBER(4) NOT NULL, 
       Name VARCHAR2(20), 
       Vintage VARCHAR2(10), 
	   Price VARCHAR2(7),
       Photo VARCHAR2(50),
       Primary key (ID) 
     );

INSERT INTO Products VALUES (1, 'Chardonnay', '2012', '$24.00', 'chardonnay.png');
INSERT INTO Products VALUES (2, 'Sauvignon Blanc', '2009', '$29.00', 'sauvignon-blanc.png');
INSERT INTO Products VALUES (3, 'Pinot Grigio', '2011', '$99.00', 'pinot-grigio.png');
INSERT INTO Products VALUES (4, 'White Merlot', '2011', '$140.00', 'white-merlot.png');
INSERT INTO Products VALUES (5, 'Cabernet Sauvignon', '2008', '$35.00', 'cabernet-sauvignon.png');
INSERT INTO Products VALUES (6, 'Merlot', '2005', '$420.00', 'merlot.png');
INSERT INTO Products VALUES (7, 'Shiraz', '2008', '$59.90', 'shiraz.png');
INSERT INTO Products VALUES (8, 'Sweet Red', '2009', '$34.00', 'sweet-red.png');

DROP TABLE Contacts;

CREATE TABLE Contacts
     ( firstName VARCHAR2(50), 
       lastName VARCHAR2(50), 
       ContactNumber VARCHAR2(15), 
       Email VARCHAR2(50), 
       CommentIssue VARCHAR2(200)
     );