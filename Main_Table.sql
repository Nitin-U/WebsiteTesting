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

INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (145, 'Butcher', 'Butcher@gmail.com', '9809876543', 'Butcher', '$2y$10$46ZlWCE4tU1ygQ2laZ6KvOvr2nmRNaIjVgJ.6elStPdQi2JtR1Qfe', 'Butcher', 'Meat.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (144, 'Delicatessen', 'Delicatessen@gmail.com', '9809876999', 'Delicatessen', '$2y$10$46ZlWCE4tU1ygQ2laZ6KvOvr2nmRNaIjVgJ.6elStPdQi2JtR1Qfe', 'Delicatessen', 'Meat.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (143, 'Greengrocer', 'Greengrocer@gmail.com', '9809878883', 'Greengrocer', '$2y$10$46ZlWCE4tU1ygQ2laZ6KvOvr2nmRNaIjVgJ.6elStPdQi2JtR1Qfe', 'Greengrocer', 'Meat.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (142, 'Fishmonger', 'Fishmonger@gmail.com', '98098766643', 'Fishmonger', '$2y$10$46ZlWCE4tU1ygQ2laZ6KvOvr2nmRNaIjVgJ.6elStPdQi2JtR1Qfe', 'Fishmonger', 'Meat.png', 'trader');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role) VALUES (141, 'Bakery', 'Bakery@gmail.com', '980966776543', 'Bakery', '$2y$10$46ZlWCE4tU1ygQ2laZ6KvOvr2nmRNaIjVgJ.6elStPdQi2JtR1Qfe', 'Bakery`', 'Meat.png', 'trader');

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DROP TABLE SHOP CASCADE CONSTRAINT;

CREATE TABLE SHOP(
	SHOP_ID	INTEGER NOT NULL,
    SHOP_NAME VARCHAR2(255),
    SHOP VARCHAR2(255),
    FK1_User_ID	INTEGER NOT NULL,
    CONSTRAINT	PK_SHOP PRIMARY KEY (SHOP_ID)
);
ALTER TABLE SHOP ADD CONSTRAINT FK1_SHOP_TO_TRADER FOREIGN KEY(FK1_User_ID) REFERENCES user_master(User_ID);

INSERT INTO SHOP VALUES (1, 'Greengrocer', 'Fruit', 143);
INSERT INTO SHOP VALUES (2, 'Greengrocer', 'Vegetable', 143);

INSERT INTO SHOP VALUES (3, 'Butcher', 'Red Meat', 145);
INSERT INTO SHOP VALUES (4, 'Butcher', 'White Meat', 145);

INSERT INTO SHOP VALUES (5, 'Delicatessen', 'Sweet', 144);
INSERT INTO SHOP VALUES (6, 'Delicatessen', 'Salty', 144);

INSERT INTO SHOP VALUES (7, 'Fishmonger', 'Shellfish', 142);
INSERT INTO SHOP VALUES (8, 'Fishmonger', 'Freshfish', 142);

INSERT INTO SHOP VALUES (9, 'Bakery', 'Donut', 141);
INSERT INTO SHOP VALUES (10, 'Bakery', 'Cake', 141);

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

ALTER TABLE PRODUCT ADD CONSTRAINT FK1_PRODUCT_TO_SHOP FOREIGN KEY(FK1_SHOP_ID) REFERENCES SHOP(SHOP_ID);

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
INSERT INTO PRODUCT VALUES (36, 'whole boiler chicken.jpg', '4star.jpg','boiler chicken', 'Description', 'Allergy Information', 19.99 , 2.99 , 'Recommended', 2, 4, 4);;
INSERT INTO PRODUCT VALUES (37, 'range chicken.jpg', '4star.jpg','range chicken', 'Description', 'Allergy Information', 10.99 , 2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (38, 'large chicken wings.jpg', '4star.jpg','large chicken wings', 'Description', 'Allergy Information', 8.99 , 2.99 , 'Hot', 2, 4, 4);
INSERT INTO PRODUCT VALUES (39, 'frozen wing.png', '4star.jpg','frozen wing', 'Description', 'Allergy Information', 5.99 , 2.99 , '', 2, 4, 4);


---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*INSERT INTO PRODUCT_HOME VALUES (1, 'tuna fish meat.jpg', '4.5star.jpg', 'Tuna', 13.99, 'Fishmonger','Recommended');  
INSERT INTO PRODUCT_HOME VALUES (2, 'Strawberries.jpg', '4star.jpg','Strawberries', 7.99, 'Greengrocer','Recommended');
INSERT INTO PRODUCT_HOME VALUES (3, 'muffin.jpg', '4.5star.jpg','Muffin', 5.99, 'Bakery','Recommended');
INSERT INTO PRODUCT_HOME VALUES (4, 'green pepper.jpg', '5star.jpg','Green Pepper', 7.99, 'Greengrocer','Recommended');                                 
INSERT INTO PRODUCT_HOME VALUES (5, 'bean.jpg', '4star.jpg','Bean', 8.99, 'Greengrocer','Recommended');
INSERT INTO PRODUCT_HOME VALUES (6, 'bread.jpg', '4.5star.jpg','Bread', 2.99, 'Bakery','Recommended');                                 
INSERT INTO PRODUCT_HOME VALUES (7, 'Salami.jpg', '4.5star.jpg','Salami', 19.99, 'Fishmonger','Recommended');                                 
INSERT INTO PRODUCT_HOME VALUES (8, 'fresh beef (hamburger) patties.jpg', '5star.jpg','Fresh Beef Patties', 13.99, 'Butcher','Recommended'); 
                                 
INSERT INTO PRODUCT_HOME VALUES (9, 'Chicken Drumsticks Raw.jpg', '3star.jpg','Chicken Drumstick', 3.99, 'Delicatessen','Hot');  
INSERT INTO PRODUCT_HOME VALUES (10, 'crab meat.jpg', '4star.jpg','Crab Meat', 28.99, 'Delicatessen','Hot');
INSERT INTO PRODUCT_HOME VALUES (11, 'pancake.jpg', '5star.jpg','Pancake', 11.99, 'Bakery','Hot');
INSERT INTO PRODUCT_HOME VALUES (12, 'mushrooms.jpg', '4star.jpg','Mushroom', 3.99, 'Butcher','Hot');                                 
INSERT INTO PRODUCT_HOME VALUES (13, 'pancake.jpg', '4.5star.jpg','Pancake', 15.99, 'Bakery','Hot');
INSERT INTO PRODUCT_HOME VALUES (14, 'Pies.jpg', '3star.jpg','Apple Pie', 18.99, 'Bakery','Hot');                                 
INSERT INTO PRODUCT_HOME VALUES (15, 'Pitaya (Dragonfruit).jpg', '5star.jpg','Pitaya Dragon Fruit', 10.99, 'Greengrocer','Hot');                                 
INSERT INTO PRODUCT_HOME VALUES (16, 'gehakt (chopped meat).jpg', '4.5star.jpg','Chopped Meat', 13.99, 'Butcher','Hot');  
*/

-- Create a Database table to represent the "cart" entity.

DROP TABLE cart CASCADE CONSTRAINT;

CREATE TABLE cart(
	ID	INTEGER NOT NULL PRIMARY KEY,
    Name VARCHAR2(255),
    Price VARCHAR2(255),
    Image VARCHAR2(255),
    Quantity INTEGER
 
);
