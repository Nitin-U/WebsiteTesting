-- Create a Database table to represent the "PRODUCT" entity.

DROP TABLE PRODUCT_HOME CASCADE CONSTRAINT;

CREATE TABLE PRODUCT_HOME(
	PRODUCT_ID	INTEGER NOT NULL PRIMARY KEY,
    PRODUCT_IMAGE VARCHAR2(255),
    PRODUCT_NAME VARCHAR2(255),
    PRODUCT_PRICE DECIMAL(10,2),
    PRODUCT_TYPE VARCHAR(255)
);

INSERT INTO PRODUCT_HOME VALUES (1, 'food1.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (2, 'food2.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (3, 'food3.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (4, 'food4.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (5, 'food1.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (6, 'food2.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (7, 'food3.jpg', 'Fish', 9.99, 'Recommended');
INSERT INTO PRODUCT_HOME VALUES (8, 'food4.jpg', 'Fish', 9.99, 'Recommended');
                                 
INSERT INTO PRODUCT_HOME VALUES (9, 'food1.jpg', 'Meat', 9.99, 'Hot');  
INSERT INTO PRODUCT_HOME VALUES (10, 'food2.jpg', 'Meat', 9.99, 'Hot');
INSERT INTO PRODUCT_HOME VALUES (11, 'food3.jpg', 'Meat', 9.99, 'Hot');
INSERT INTO PRODUCT_HOME VALUES (12, 'food4.jpg', 'Meat', 9.99, 'Hot');                                 
INSERT INTO PRODUCT_HOME VALUES (13, 'food1.jpg', 'Meat', 9.99, 'Hot');
INSERT INTO PRODUCT_HOME VALUES (14, 'food2.jpg', 'Meat', 9.99, 'Hot');                                 
INSERT INTO PRODUCT_HOME VALUES (15, 'food3.jpg', 'Meat', 9.99, 'Hot');                                 
INSERT INTO PRODUCT_HOME VALUES (16, 'food4.jpg', 'Meat', 9.99, 'Hot');                                 