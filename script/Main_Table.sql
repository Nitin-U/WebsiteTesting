-- Create a Database table to represent the "PRODUCT" entity.

DROP TABLE user_master CASCADE CONSTRAINT;

CREATE TABLE user_master(
    User_ID	INTEGER NOT NULL PRIMARY KEY,
    Name VARCHAR2(255),
    Email VARCHAR2(255),
    Phone VARCHAR2(255),
    Age VARCHAR2(255),
    Gender VARCHAR(255),
    Username VARCHAR2(255),
    Role VARCHAR2(255),
    Password VARCHAR2(255),
    Shop_Type VARCHAR2(255),
    Shop_Image VARCHAR2(255)
);

INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (145, 'Butcher', 'Butcher@gmail.com', '9809876543', 'Butcher', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Butcher', 'Meat.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (144, 'Delicatessen', 'Delicatessen@gmail.com', '9809876999', 'Delicatessen', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Delicatessen', 'delicatessen.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (143, 'Greengrocer', 'Greengrocer@gmail.com', '9809878883', 'Greengrocer', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Greengrocer', 'Grocery.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (142, 'Fishmonger', 'Fishmonger@gmail.com', '98098766643', 'Fishmonger', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Fishmonger', 'Fish.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (141, 'Bakery', 'Bakery@gmail.com', '980966776543', 'Bakery', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Bakery', 'bakery.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Username, Password, Role) VALUES (180, 'Administrator', 'admin@gmail.com', 'Admin', '$2y$10$ehXykFG7aXMwRNMOMM/O9.8y/zQ9KxXMWpF/GBLPB5v21ngof6Qdq', 'admin');
INSERT INTO user_master(User_ID, Name, Gender, Email, Username, Password, Role, Phone, Age) VALUES (240, 'Customer', 'Male', 'customer@gmail.com', 'Customer', '$2y$10$YuPUXKU6OJRCe907xKWCeusVah8PXbxxqBobqy6jwrkvjgGkS8QV.', 'customer', '9878345654', '18-24');
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DROP TABLE SHOP CASCADE CONSTRAINT;

CREATE TABLE SHOP(
	SHOP_ID	INTEGER NOT NULL,
    SHOP_NAME VARCHAR2(255),
    SHOP VARCHAR2(255),
    SHOP_ADDRESS VARCHAR(255),
    SHOP_PHONE VARCHAR(255),
    FK1_User_ID	INTEGER NOT NULL,
    CONSTRAINT	PK_SHOP PRIMARY KEY (SHOP_ID)
);
ALTER TABLE SHOP ADD CONSTRAINT FK1_SHOP_TO_TRADER FOREIGN KEY(FK1_User_ID) REFERENCES user_master(User_ID) ON DELETE CASCADE;

INSERT INTO SHOP VALUES (1, 'Greengrocer', 'Fruit','Cleckheaton', '9800000000', 143);
INSERT INTO SHOP VALUES (2, 'Greengrocer', 'Vegetable','Cleckheaton', '9800000000', 143);

INSERT INTO SHOP VALUES (3, 'Butcher', 'Red Meat','Cleckheaton', '9811111111', 145);
INSERT INTO SHOP VALUES (4, 'Butcher', 'White Meat','Cleckheaton', '9811111111', 145);

INSERT INTO SHOP VALUES (5, 'Delicatessen', 'Sweet','Cleckheaton', '9822222222', 144);
INSERT INTO SHOP VALUES (6, 'Delicatessen', 'Salty','Cleckheaton', '9822222222', 144);

INSERT INTO SHOP VALUES (7, 'Fishmonger', 'Shellfish','Cleckheaton', '9833333333', 142);
INSERT INTO SHOP VALUES (8, 'Fishmonger', 'Freshfish','Cleckheaton', '9833333333', 142);

INSERT INTO SHOP VALUES (9, 'Bakery', 'Donut','Cleckheaton', '9855555555', 141);
INSERT INTO SHOP VALUES (10, 'Bakery', 'Cake','Cleckheaton', '9855555555', 141);

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DROP TABLE PRODUCT CASCADE CONSTRAINT;

CREATE TABLE PRODUCT(
	PRODUCT_ID	INTEGER NOT NULL,
    PRODUCT_IMAGE VARCHAR2(255),
    PRODUCT_RATING VARCHAR2(255),
    PRODUCT_NAME VARCHAR2(255),
    PRODUCT_DESC VARCHAR2(255),
    ALLERGY_INFO VARCHAR2(255),
    PRODUCT_PRICE DECIMAL(10,2),
    PRODUCT_DISCOUNT DECIMAL(10,2),
    DISPLAY_TYPE VARCHAR(255),
    MINIMUM_QUANTITY INTEGER NOT NULL,
    MAXIMUM_QUANTITY INTEGER NOT NULL,
    FK1_SHOP_ID	INTEGER NOT NULL,
	CONSTRAINT	PK_PRODUCT PRIMARY KEY (PRODUCT_ID)
);

ALTER TABLE PRODUCT ADD CONSTRAINT FK1_PRODUCT_TO_SHOP FOREIGN KEY(FK1_SHOP_ID) REFERENCES SHOP(SHOP_ID) ON DELETE CASCADE;

INSERT INTO PRODUCT VALUES (1, 'Strawberries.jpg', '4star.jpg','Strawberries', 'Description', 'Allergy Information', 8.99 , 2.99 , 'Recommended', 2, 4, 1);
INSERT INTO PRODUCT VALUES (2, 'Coconut Meat.jpg', '4star.jpg','Coconut Meat', 'Description', 'Allergy Information', 9.99 , 2.99 , 'Hot', 2, 4, 1);
INSERT INTO PRODUCT VALUES (3, 'Watermelon.jpg', '3star.jpg','Watermelon', 'Description', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (4, 'Strawberries.jpg', '3star.jpg','Strawberries', 'Description', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (5, 'Pomegranate.jpg', '4star.jpg','Pomegranate', 'Description', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);


INSERT INTO PRODUCT VALUES (6, 'cucumber.jpg', '4star.jpg','cucumber', 'Description', 'Allergy Information', 18.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (7, 'eggplant.jpg', '4.5star.jpg','eggplant', 'Description', 'Allergy Information', 28.99 , 2.99 , 'Hot', 2, 4, 2);
INSERT INTO PRODUCT VALUES (8, 'garlic.jpg', '4star.jpg','garlic', 'Description', 'Allergy Information', 7.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (9, 'green bean.jpg', '4.5star.jpg','green bean', 'Description', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (10, 'green pepper.jpg', '4star.jpg','green pepper', 'Description', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);

INSERT INTO PRODUCT VALUES (11, 'Waffle Cone Premix.jpg', '4star.jpg','Waffle Cone Premix', 'Description', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (12, 'Rusk Toast.jpg', '4star.jpg','Rusk Toast', 'Description', 'Allergy Information', 17.99 , 2.99 , '', 2, 4, 9);
INSERT INTO PRODUCT VALUES (13, 'pancake.jpg', '4star.jpg','pancake', 'Description', 'Allergy Information', 16.99 , 2.99 , 'Hot', 2, 4, 9);
INSERT INTO PRODUCT VALUES (14, 'donets.jpg', '4star.jpg','donets', 'Description', 'Allergy Information', 15.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (15, 'donuts.jpg', '4star.jpg','donuts', 'Description', 'Allergy Information', 14.99 , 2.99 , '', 2, 4, 9);


INSERT INTO PRODUCT VALUES (16, 'sprinkled muffin.jpg', '4star.jpg','sprinkled muffin', 'Description', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (17, 'Pies.jpg', '4star.jpg','Pies', 'Description', 'Allergy Information', 21.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (18, 'Red Velvet.jpg', '4star.jpg','Red Velvet', 'Description',  'Allergy Information', 24.99 , 2.99 , 'Hot', 2, 4, 10);
INSERT INTO PRODUCT VALUES (19, 'Cake.jpg', '4star.jpg','Cake', 'Description', 'Allergy Information', 27.99 , 2.99 , 'Recommended', 2, 4, 10);


INSERT INTO PRODUCT VALUES (20, 'small-prawns.jpg', '4star.jpg','small-prawns', 'Description', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (21, 'Shrimp.jpg', '4star.jpg','Shrimp', 'Description', 'Allergy Information', 24.99 , 2.99 ,'Hot', 2, 4, 7);
INSERT INTO PRODUCT VALUES (22, 'Shrimp white.jpg', '4star.jpg','Shrimp white', 'Description', 'Allergy Information', 29.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (23, 'prown.jpg', '4star.jpg','prown', 'Description', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (24, 'crab stick.jpg', '4star.jpg','crab stick', 'Description', 'Allergy Information', 39.99 , 2.99 , 'Recommended', 2, 4, 7);

INSERT INTO PRODUCT VALUES (25, 'SALMON.jpg', '4star.jpg','SALMON', 'Description', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (26, 'small king fish.jpg', '4star.jpg','small king fish', 'Description', 'Allergy Information', 37.99 , 2.99 , 'Recommended', 2, 4, 8);
INSERT INTO PRODUCT VALUES (27, 'small fish.jpg', '4star.jpg','small fish', 'Description', 'Allergy Information', 39.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (28, 'raw fish.jpg', '4star.jpg','raw fish', 'Description', 'Allergy Information', 39.99 , 2.99 , 'Hot', 2, 4, 8);
INSERT INTO PRODUCT VALUES (29, 'king fish.jpg', '4star.jpg','king fish', 'Description', 'Allergy Information', 37.99 , 2.99 , '', 2, 4, 8);


INSERT INTO PRODUCT VALUES (30, 'beek.jpg', '4star.jpg','beek', 'Description', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (31, 'frozen meat.jpg', '4star.jpg','frozen meat', 'Description', 'Allergy Information', 48.99 , 2.99 , 'Hot', 2, 4, 3);
INSERT INTO PRODUCT VALUES (32, 'fronen mutton.jpg', '4star.jpg','fronen mutton', 'Description', 'Allergy Information', 55.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (33, 'tenderloin.jpg', '4star.jpg','tenderloin', 'Description', 'Allergy Information', 54.99 , 2.99 , 'Recommended', 2, 4, 3);
INSERT INTO PRODUCT VALUES (34, 'boneless-mutton.jpg', '4star.jpg','boneless-mutton', 'Description', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 3);


INSERT INTO PRODUCT VALUES (35, 'gizzard.jpg', '4star.jpg','gizzard', 'Description', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (36, 'whole boiler chicken.jpg', '4star.jpg','boiler chicken', 'Description', 'Allergy Information', 19.99 , 2.99 , 'Recommended', 2, 4, 4);
INSERT INTO PRODUCT VALUES (37, 'range chicken.jpg', '4star.jpg','range chicken', 'Description', 'Allergy Information', 10.99 , 2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (38, 'large chicken wings.jpg', '4star.jpg','large chicken wings', 'Description', 'Allergy Information', 8.99 , 2.99 , 'Hot', 2, 4, 4);
INSERT INTO PRODUCT VALUES (39, 'frozen wing.png', '4star.jpg','frozen wing', 'Description', 'Allergy Information', 5.99 , 2.99 , '', 2, 4, 4);


---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DROP TABLE VOUCHER CASCADE CONSTRAINT;

CREATE TABLE VOUCHER(
	VOUCHER_ID INTEGER NOT NULL PRIMARY KEY,
    CODE VARCHAR2(255),
    DISCOUNT NUMBER(10,2),
    VALID_TILL DATE
);

INSERT INTO VOUCHER VALUES (1, 'CLECK100', 3.99, '10/01/2022');
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*
DROP TABLE PRODUCT CASCADE CONSTRAINT;

CREATE TABLE PRODUCT(
	PRODUCT_ID	INTEGER NOT NULL,
    PRODUCT_IMAGE VARCHAR2(255),
    PRODUCT_RATING VARCHAR2(255),
    PRODUCT_NAME VARCHAR2(255),
    PRODUCT_DESC VARCHAR2(255),
    PRODUCT_PRICE DECIMAL(10,2),
    DISPLAY_TYPE VARCHAR(255),
    FK1_SHOP_ID	INTEGER NOT NULL,
	CONSTRAINT	PK_PRODUCT PRIMARY KEY (PRODUCT_ID)
);

ALTER TABLE PRODUCT ADD CONSTRAINT FK1_PRODUCT_TO_SHOP FOREIGN KEY(FK1_SHOP_ID) REFERENCES SHOP(SHOP_ID);

INSERT INTO PRODUCT VALUES (1, 'Strawberries.jpg', '4star.jpg','Strawberries', 'Description', 8.99 , 'Recommended', 1);
INSERT INTO PRODUCT VALUES (2, 'Coconut Meat.jpg', '4star.jpg','Coconut Meat', 'Description', 9.99 , 'Hot', 1);
INSERT INTO PRODUCT VALUES (3, 'Watermelon.jpg', '3star.jpg','Watermelon', 'Description', 19.99 , '', 1);
INSERT INTO PRODUCT VALUES (4, 'Strawberries.jpg', '3star.jpg','Strawberries', 'Description', 8.99 , '', 1);
INSERT INTO PRODUCT VALUES (5, 'Pomegranate.jpg', '4star.jpg','Pomegranate', 'Description', 25.99 , '', 1);


INSERT INTO PRODUCT VALUES (6, 'cucumber.jpg', '4star.jpg','cucumber', 'Description', 18.99 , '', 2);
INSERT INTO PRODUCT VALUES (7, 'eggplant.jpg', '4.5star.jpg','eggplant', 'Description', 28.99 , 'Hot', 2);
INSERT INTO PRODUCT VALUES (8, 'garlic.jpg', '4star.jpg','garlic', 'Description', 7.99 , '', 2);
INSERT INTO PRODUCT VALUES (9, 'green bean.jpg', '4.5star.jpg','green bean', 'Description', 8.99 , '', 2);
INSERT INTO PRODUCT VALUES (10, 'green pepper.jpg', '4star.jpg','green pepper', 'Description', 8.99 , '', 2);

INSERT INTO PRODUCT VALUES (11, 'Waffle Cone Premix.jpg', '4star.jpg','Waffle Cone Premix', 'Description', 18.99 , 'Recommended', 9);
INSERT INTO PRODUCT VALUES (12, 'Rusk Toast.jpg', '4star.jpg','Rusk Toast', 'Description', 17.99 , '', 9);
INSERT INTO PRODUCT VALUES (13, 'pancake.jpg', '4star.jpg','pancake', 'Description', 16.99 , 'Hot', 9);
INSERT INTO PRODUCT VALUES (14, 'donets.jpg', '4star.jpg','donets', 'Description', 15.99 , 'Recommended', 9);
INSERT INTO PRODUCT VALUES (15, 'donuts.jpg', '4star.jpg','donuts', 'Description', 14.99 , '', 9);


INSERT INTO PRODUCT VALUES (16, 'sprinkled muffin.jpg', '4star.jpg','sprinkled muffin', 'Description', 19.99 , '', 10);
INSERT INTO PRODUCT VALUES (17, 'Pies.jpg', '4star.jpg','Pies', 'Description', 21.99 , '', 10);
INSERT INTO PRODUCT VALUES (18, 'Red Velvet.jpg', '4star.jpg','Red Velvet', 'Description', 24.99 , 'Hot', 10);
INSERT INTO PRODUCT VALUES (19, 'Cake.jpg', '4star.jpg','Cake', 'Description', 27.99 , 'Recommended', 10);


INSERT INTO PRODUCT VALUES (20, 'small-prawns.jpg', '4star.jpg','small-prawns', 'Description', 22.99 , '', 7);
INSERT INTO PRODUCT VALUES (21, 'Shrimp.jpg', '4star.jpg','Shrimp', 'Description', 24.99 , 'Hot', 7);
INSERT INTO PRODUCT VALUES (22, 'Shrimp white.jpg', '4star.jpg','Shrimp white', 'Description', 29.99 , '', 7);
INSERT INTO PRODUCT VALUES (23, 'prown.jpg', '4star.jpg','prown', 'Description', 19.99 , '', 7);
INSERT INTO PRODUCT VALUES (24, 'crab stick.jpg', '4star.jpg','crab stick', 'Description', 39.99 , 'Recommended', 7);

INSERT INTO PRODUCT VALUES (25, 'SALMON.jpg', '4star.jpg','SALMON', 'Description', 36.99 , '', 8);
INSERT INTO PRODUCT VALUES (26, 'small king fish.jpg', '4star.jpg','small king fish', 'Description', 37.99 , 'Recommended', 8);
INSERT INTO PRODUCT VALUES (27, 'small fish.jpg', '4star.jpg','small fish', 'Description', 39.99 , '', 8);
INSERT INTO PRODUCT VALUES (28, 'raw fish.jpg', '4star.jpg','raw fish', 'Description', 39.99 , 'Hot', 8);
INSERT INTO PRODUCT VALUES (29, 'king fish.jpg', '4star.jpg','king fish', 'Description', 37.99 , '', 8);


INSERT INTO PRODUCT VALUES (30, 'beek.jpg', '4star.jpg','beek', 'Description', 46.99 , '', 3);
INSERT INTO PRODUCT VALUES (31, 'frozen meat.jpg', '4star.jpg','frozen meat', 'Description', 48.99 , 'Hot', 3);
INSERT INTO PRODUCT VALUES (32, 'fronen mutton.jpg', '4star.jpg','fronen mutton', 'Description', 55.99 , '', 3);
INSERT INTO PRODUCT VALUES (33, 'tenderloin.jpg', '4star.jpg','tenderloin', 'Description', 54.99 , 'Recommended', 3);
INSERT INTO PRODUCT VALUES (34, 'boneless-mutton.jpg', '4star.jpg','boneless-mutton', 'Description', 25.99 , '', 3);


INSERT INTO PRODUCT VALUES (35, 'gizzard.jpg', '4star.jpg','gizzard', 'Description', 9.99 , '', 4);
INSERT INTO PRODUCT VALUES (36, 'whole boiler chicken.jpg', '4star.jpg','boiler chicken', 'Description', 19.99 , 'Recommended', 4);
INSERT INTO PRODUCT VALUES (37, 'range chicken.jpg', '4star.jpg','range chicken', 'Description', 10.99 , '', 4);
INSERT INTO PRODUCT VALUES (38, 'large chicken wings.jpg', '4star.jpg','large chicken wings', 'Description', 8.99 , 'Hot', 4);
INSERT INTO PRODUCT VALUES (39, 'frozen wing.png', '4star.jpg','frozen wing', 'Description', 5.99 , '', 4);
*/
