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
    Shop_Image VARCHAR2(255),
    Status VARCHAR(255)
);

INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role, Status) VALUES (145, 'Butcher', 'nitinutsav555@gmail.com', '9809876543', 'Butcher', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Butcher', 'Meat.png', 'trader', 'Not Verified');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role, Status) VALUES (144, 'Delicatessen', 'Delicatessen@gmail.com', '9809876999', 'Delicatessen', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Delicatessen', 'delicatessen.png', 'trader', 'Verified');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role, Status) VALUES (143, 'Greengrocer', 'Greengrocer@gmail.com', '9809878883', 'Greengrocer', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Greengrocer', 'Grocery.png', 'trader', 'Verified');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role, Status) VALUES (142, 'Fishmonger', 'Fishmonger@gmail.com', '98098766643', 'Fishmonger', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Fishmonger', 'Fish.png', 'trader', 'Verified');
INSERT INTO user_master(User_ID, Name, Email, Phone, Username, Password, Shop_Type, Shop_Image, Role, Status) VALUES (141, 'Bakery', 'Bakery@gmail.com', '980966776543', 'Bakery', '$2a$12$YSJbm0jLp.SDxB.kPcqtJeSEeXqZnGmwQwqQ.VRY2Z0OY2g9EhCY.', 'Bakery', 'bakery.png', 'trader', 'Verified');
INSERT INTO user_master(User_ID, Name, Email, Username, Password, Role, Status) VALUES (180, 'Administrator', 'admin@gmail.com', 'Admin', '$2y$10$ehXykFG7aXMwRNMOMM/O9.8y/zQ9KxXMWpF/GBLPB5v21ngof6Qdq', 'admin', 'Verified');
INSERT INTO user_master(User_ID, Name, Gender, Email, Username, Password, Role, Phone, Age, Status) VALUES (240, 'Customer', 'Male', 'customer@gmail.com', 'Customer', '$2y$10$YuPUXKU6OJRCe907xKWCeusVah8PXbxxqBobqy6jwrkvjgGkS8QV.', 'customer', '9878345654', '18-24', 'Verified');
INSERT INTO user_master(User_ID, Name, Gender, Email, Username, Password, Role, Phone, Age, Status) VALUES (241, 'Customer2', 'Male', 'customer2@gmail.com', 'Customer2', '$2y$10$YuPUXKU6OJRCe907xKWCeusVah8PXbxxqBobqy6jwrkvjgGkS8QV.', 'customer', '9878345654', 'Above 30', 'Verified');

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DROP TABLE cart CASCADE CONSTRAINT;

CREATE TABLE cart(
	ID	INTEGER NOT NULL,
    Quantity INTEGER,
    FK1_User_ID	INTEGER NOT NULL,
    FK2_PRODUCT_ID INTEGER NOT NULL,
    CONSTRAINT	PK_cart PRIMARY KEY (ID) 
);
ALTER TABLE cart ADD CONSTRAINT FK1_cart_TO_User FOREIGN KEY(FK1_User_ID) REFERENCES user_master(User_ID) ON DELETE CASCADE;
ALTER TABLE cart ADD CONSTRAINT FK2_cart_TO_Product FOREIGN KEY(FK2_PRODUCT_ID) REFERENCES PRODUCT(PRODUCT_ID) ON DELETE CASCADE;





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


/*INSERT INTO PRODUCT VALUES (1, 'Strawberries.png', '4star.jpg','strawberries', 'Is lovely for your smoothies, jams or baking.', 'Allergy Information', 8.99 , 2.99 , 'Recommended', 2, 4, 1);
INSERT INTO PRODUCT VALUES (2, 'Pineapple.png', '4star.jpg','pineapple', 'Perfect balance of sweet and tart, Exceptional juiciness with a vibrant, tropical flavor, Excellent source of manganese and vitamin C', 'Allergy Information', 9.99 , 2.99 , 'Hot', 2, 4, 1);
INSERT INTO PRODUCT VALUES (3, 'Watermelon.png', '3star.jpg','watermelon', 'Is juicy, sweet and grainy textured flesh is filled with 12-14% of sugar content, making it a healthy alternative to sugary carbonated drinks.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (4, 'Mango.png', '3star.jpg','mango', 'Exceptionally richness in provitamin A and vitamin C the mango provides an “extra security” regarding these two vitamins.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (5, 'Pomegranate.png', '4star.jpg','pomegranate', 'Description', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (6, 'Apple.png', '4star.jpg','apple', 'The healthiest fruit with high nutritive value. It is the most consumed and grown or cultivated fruit in the world due to its high nutritional content. Apples belong to the Rosaceae family.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (7, 'Banana.png', '4star.jpg','banana', 'One of the most common types of bananas, as well as the most popular dessert banana, in the Philippines.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (8, 'Blackberries.png', '4star.jpg','blackberries', 'Rich in nutricents and dark in colour that requires quality growing environment for its exotic, crisp taste.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (9, 'Blueberries.png', '4star.jpg','blueberries', 'Fantastically sweet in taste and very luscious in texture. The exciting bluish purple-coloured berries grow on shrubs in bunches.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (10, 'Cherries.png', '4star.jpg','cherries', 'Their pleasant appearance they recall real jewels: red and shiny like rubies, they have the characteristic of being large and consistent, ending in point and possessing a long peduncle.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (11, 'Coconuts.png', '4star.jpg','coconuts', 'Enriched with various nutrients including fibers, vitamins and minerals which offers various health benefits to the end user and weight loss', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (12, 'Grapes.png', '4star.jpg','grapes', 'Contains Vitamin C, Vitamin K, amino acid.Green Grapes help relieve stress, enhance vision, and boost immune system.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (13, 'Green Apple.png', '4star.jpg','green apple', 'Sweet, sour and fruity with delicate acidity of green apples.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (14, 'Guava.png', '4star.jpg','guava', 'A sweeter and crisper taste than a typical apple. Additionally, the guava fruit can be eaten raw, blended or added to salads.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);
INSERT INTO PRODUCT VALUES (15, 'Jackfruits.png', '4star.jpg','jackfruits', 'Despite its intimidating green spiny knobbed skin, the jackfruit welcomes your taste buds to an exotic burst of flavors, including hints of mango, pineapple and banana.', 'Allergy Information', 25.99 , 2.99 , '', 2, 4, 1);

INSERT INTO PRODUCT VALUES (16, 'Redchilli.png', '4star.jpg','redchilli', 'Chili peppers are widely used in cuisines around the world and are often dried and ground into powders', 'Allergy Information', 18.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (17, 'Beans.png', '4.5star.jpg','beans', 'Medium sized seed, light yellow, rich in zinc and iron, grows best in low – mid altitude.', 'Allergy Information', 28.99 , 2.99 , 'Hot', 2, 4, 2);
INSERT INTO PRODUCT VALUES (18, 'Cabbage.png', '4star.jpg','cabbage', 'Improves brain health and vision. Best for people who want to lose weight in a healthy way.', 'Allergy Information', 7.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (19, 'Green Bean.png', '4.5star.jpg','green bean', 'Good at decreasing blood sugar levels and cholestrol levels. Because they are organically grown, they are free from chemical residues and completely natural. Broad beans can be used in simple vegetables dish in combination.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (20, 'Brocolli.png', '4star.jpg','brocolli', 'Minimize dehydration and weight loss, thereby preserving firmness. Preventing decay, preventing discoloration & yellowing and slowing senescence (aging)', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (21, 'Carrot.png', '4star.jpg',' carrot', 'A superfood that is not only healthy but also can be eaten in so many ways, carrots are one of them. Eat them raw, steam them or even cook them as you like. Carrots are one of the most versatile organic vegetables out there.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (22, 'Cauliflower.png', '4star.jpg','califlower', 'An extremely healthy, rich in nutrients vegetable. It contains very low calories, but is high in vitamins. Almost every vitamins and mineral, which we need for our body can been found in it.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (23, 'chickenpeas.png', '4star.jpg','chickenpeas', 'As a rich source of vitamins, minerals and fiber, chickpeas may offer a variety of health benefits, such as improving digestion', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (24, 'Cinnamon.png', '4star.jpg','cinnamon  ', 'Is a highly delicious spice.It has been prized for its medicinal properties for thousands of years. Modern science has now confirmed what people have known for ages.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (25, 'Corindor.png', '4star.jpg','corrindor', 'The entire world agrees coriander leaves are one of the oldest herbs that can brighten up your dish and make it look appealing and tempting.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (26, 'Corn.png', '4star.jpg','corn', 'A midseason tendersweet variety giving superior sweetness with a softer, less chewy texture than conventional supersweets. The large cobs, packed with golden, thin-skinned kernels, are delicious picked fresh from the garden.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (27, 'Cucumber.png', '4star.jpg','cucumber  ', 'Fast growing and high resistant to disease.  They are ideal for detoxification and preventing dehydration. Cucumbers are rich in phytonutrients and vitamin K.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (28, 'Garlic.png', '4star.jpg','garlic ', 'Contains superior flavoring that is used in cuisine throughout the world. It has nutritious contents and has many health benefits', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (29, 'Leek.png', '4star.jpg','leek', 'A member of the onion family. The lower white base is the most used part of the vegetable, sliced thinly and used to top salads, sauteed with other vegetables or commonly used for soup stock.', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);
INSERT INTO PRODUCT VALUES (30, 'Potato.png', '4star.jpg','potato', 'A nutrient-dense, non-fattening and have reasonable amount of calories. Include them in your regular meals so that the body receives a good supply of carbohydrates, dietary fibers and essential minerals such as copper, magnesium, and iron. ', 'Allergy Information', 8.99 , 2.99 , '', 2, 4, 2);



INSERT INTO PRODUCT VALUES (31, 'Beef Meat.png', '4star.jpg','beef Meat', 'We are wholesale suppliers, bulk exporters of Beef.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (32, 'Bine Beef.png', '4star.jpg','bine Beef', 'Beef, flesh of mature cattle, as distinguished from veal, the flesh of calves.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (33, 'Skin Beef.png', '4star.jpg','skin Beef', 'Beef provides nutrients like zinc, iron, protein and B vitamins, and half of the fat found in beef is monounsaturated, the same heart-healthy fats found in olive oil. ', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (34, 'Boneless Mutton.png', '4star.jpg','boneless Mutton', 'Minimum quantity for "Buffalo Meat steak Standard Boneless (Imported) 1kg" .', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (35, 'Buffalo Steak.png', '4star.jpg','buffalo Steak', 'There is many ways to cook mutton, stew was one of the best ways to bring out the flavor of mutton. Mutton cooked with the fat on it actually makes the meat more juicer &amp;', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (36, 'Frozen Muttton.png', '4star.jpg','frozen Muttton', 'There is many ways to cook mutton, stew was one of the best ways to bring out the flavor of mutton. Mutton cooked with the fat on it actually makes the meat more juicer &amp; tender, it seems to shrink less during cooking and there ends up being more ', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (37, 'Slice Beefs.png', '4star.jpg','slice Beefs', 'Ideal for all manner of dishes, our classic Sliced Beef boasts the standout flavour that sets our beef apart, with a good ratio of fat to meat to give melting tenderness and real taste upon cooking', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (38, 'Frozen Pork.png', '4star.jpg','frozen Pork', 'We make available highly hygienically processed Frozen Pork. Product are a quality driven and make sure that the offered lot is prepared using the premium grade raw material.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (39, 'Beef Flank.png', '4star.jpg','beef Flank', 'These are the delicious beef flanks offer superior versatility, are easy to prepare and sub in nicely for cuts like skirt steak.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (40, 'Beef Heart.png', '4star.jpg','beef Heart', 'The Heart of the cow is a muscle, and thus shares many similarities with steak, roasts, and ground beef. Extremely high in protein, thiamine, folate, zinc and a great way to rack up amino acids that helps improve your metabolism', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (41, 'Sheep Mutton.png', '4star.jpg','sheep Mutton', 'When stored under freezing conditions, boneless meat stays fresh for a longer time duration', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (42, 'Lamb.png', '4star.jpg','lamb', 'There is little fat or dense muscle, resulting in mild, moist, and tender meat.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (43, 'Pork Meat.png', '4star.jpg','pork Meat', 'Pork meat is available highly hygienically processed Pork. Product are a quality driven and make sure that the offered lot is prepared using the premium grade raw material.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (44, 'Beef Leg.png', '4star.jpg','beef Leg', 'This beef leg is perfect for roasting and grilling. Cow meat has low amount of saturated fats It also has considerably low amounts of cholesterol making it one of the healthiest meats available.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);
INSERT INTO PRODUCT VALUES (45, 'Salami.png', '4star.jpg','salami', 'Beef salami is refined with a delicate mixture of spices and a little garlic.', 'Allergy Information',  46.99 , 2.99 , '', 2, 4, 3);

INSERT INTO PRODUCT VALUES (46, 'Chicken Superme.png', '4star.jpg','chicken supreme', 'This is a skin on chicken fillet with a one bone wing attached. Perfect if you prefer breast to leg meat but like the extra flavour provided by the skin.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (47, 'Range Chicken.png', '4star.jpg','range chicken', 'The only chicken that makes it into our online butcher, which means that you are getting great quality as well as flavour.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (48, 'Boiler Chicken.png', '4star.jpg','boiler chicken', 'boiler chickens have smaller breasts and meatier legs and thighs, perfect for dark meat lovers. Great for roasting.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (49, 'Chicken Wings.png', '4star.jpg','chicken wings', 'In order to keep pace with the never-ending demands of customers, we are involved in offering a wide range of Fresh Chicken Wing.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (50, 'Chciken Breast.png', '4star.jpg','chicken breast', 'It is low in Fat and Cholesterol and is carb-free', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (51, 'Chicken Feets.png', '4star.jpg','chicken feets', 'It is low in Fat and Cholesterol and is carb-free', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (52, 'Chicken Legs.png', '4star.jpg','chicken legs', 'A cut that comprises of dark meat. Chicken legs are split at the knee joint to separate the thigh from the drumstick. Drumsticks are usually cooked bone in, while thighs can be deboned and skinned to use in a variety of dishes.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (53, 'Chicken Livers.png', '4star.jpg','chicken livers', 'chicken liver has a ton of vitamin A—an essential nutrient that can be toxic when consumed in excess.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (54, 'Chicken Gizzard.png', '4star.jpg','chicken gizzard', 'Despite being the smallest part of the chicken, the gizzard is undoubtedly the tastiest part of any chicken', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (55, 'Chcicken Heart.png', '4star.jpg','chicken heart', 'skin chickens have smaller breasts and meatier legs and thighs, perfect for dark meat lovers. Great for roasting', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (56, 'Whole Chicken.png', '4star.jpg','whole chicken', 'Local Ontario raised, free range, all natural, without the use of any antibiotics or animal bi-products or added hormones.High in protein and amino acids', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (57, 'Frozen Legpiece.png', '4star.jpg','frozen legpiece', 'Fresh/Frozen Whole Big Hard Boiler Chicken/Hen (Per kg) range chicken is the only chicken that makes it into our online butcher, which means that you are getting great quality as well as flavour.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (58, 'Whole SmallChicken.png', '4star.jpg','whole smallchicken', 'It is low in Fat and Cholesterol and is carb-free', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (59, 'Leg Piece.png', '4star.jpg','leg piece', 'Chicken legs are split at the knee joint to separate the thigh from the drumstick', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);
INSERT INTO PRODUCT VALUES (60, 'Chicken Wings.png', '4star.jpg','chicken wings', 'wings are perfect for people that don’t want to make a whole turkey, or maybe your family just like the wings.', 'Allergy Information', 9.99 ,  2.99 , '', 2, 4, 4);



INSERT INTO PRODUCT VALUES (61, 'Butter BlackGarlic.png', '4star.jpg','butter blackGarlic', 'Garlic is fermented for two weeks to caramelise it and then added to Abernethys rich creamy butter, giving a subtle sweetness', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (62, 'Butter Dulse.png', '4star.jpg','butter dulse', 'Handmade butter with Atlantic sea sat and dulse (dried seaweed) harvested from the North Coast of Ireland.  Shelf life of 12 weeks.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (63, 'Ballymaloe Mayo.png', '4star.jpg','ballymaloe Mayo', ' produces is  delicious relish for markets at home and abroad.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (64, 'Ballymaloe.png', '4star.jpg','ballymaloe', 'Delicious with cheese, sandwiches, cold meats and burgers', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (65, 'PastaSauce.png', '4star.jpg','pastasauce', 'Ballymaloe Italian Tomato Pasta Sauce is just that; using Italian tomatoes they create a classic pasta sauce filled with fresh ingredients.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (66, 'BlackOlive.png', '4star.jpg','blackolive', 'Grilled and sun dried peppers, black olives, sun-dried tomatoes, capers & lemon juice are combined to give a rustic texture as perfect for a French baguette as it is for spooning over chicken and grilling.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (67, 'Paprika Tomato.png', '4star.jpg','paprika tomato', 'Sun-dried and semi-dried tomato pesto combined with their signature Rose Harissa gives this paste a deep, rich flavour with a distinct yet subtle heat.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (68, 'Roasted Pepper.png', '4star.jpg','roasted pepper', 'The blend of grilled red peppers, tomato and garlic, adds a vibrant burst of colour and flavour to a dish, and is a wonderfully versatile tapenade', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (69, 'Tomato Olive.png', '4star.jpg','tomato olive', 'black, naturally-ripened Beldi olives blended with capers, garlic and sundried tomatoes to make an umami rich paste that picked up a Great Taste Star', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (70, 'Blackfire.png', '4star.jpg','blackfire', 'Rich, black, naturally-ripened Beldi olives blended with capers, garlic and sundried tomatoes to make an umami rich paste that picked up a Great Taste Star in 2012. ', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (71, 'Olive Oil.png', '4star.jpg','olive oil', 'Sweet roasted peppers and a generous lashing of Carolina Reapers, the world’s hottest pepper, make this sauce more than just heat and vinegar. ', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (72, 'Small Onio.png', '4star.jpg','small onio', 'vinegar of Modena infused with roast onion. Add to a sausage casserole', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (73, 'OnionJam.png', '4star.jpg','onionjam', 'onion jam, stir into a gravy to add a rich flavour, great in sandwiches and of course with cheese.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (74, 'Chili Cone.png', '4star.jpg','chili cone', 'Made out of fresh corn.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);
INSERT INTO PRODUCT VALUES (75, 'Sauce.png', '4star.jpg','sauce', 'Toast that bun, melt the cheese, pile on those pickles. Get ready for a feast.  Nothing artificial, just full-on flavour.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 5);

INSERT INTO PRODUCT VALUES (76, 'PearMango.png', '4star.jpg','pearmango', 'A fresh and fiery relish made by chef Declan& using only the perfect jalapeño sweets.. ', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (77, 'Apple Juice.png', '4star.jpg','apple juice', 'This Long Meadow Still Apple Juice is bursting with 100% natural apple freshness and can be enjoyed best when cooled in the fridge.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (78, 'Biscuits.png', '4star.jpg','biscuits', 'A cool contrast to the fire. Just flour and water - no salt, no anything. Flame-baked in a flash, for a toasty finish. ', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (79, 'Chai.png', '4star.jpg','chai', 'David Rios signature and award winning chai is a rich and creamy mixture of black tea and premium spices, including cinnamon, cardamom, and clove.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (80, 'Brown DarkChocolates.png', '4star.jpg','brown darkchocolates', 'Cobden+Brown 60% dark chocolate with tangerine is made from fine forastero cocoa beans. Infused with a hint of tangerine it has an elegant citrus finish with a low bitter content.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (81, 'Coffee Bean.png', '4star.jpg','coffee bean', 'Whole bean for home grinding, dark chocolate and caramel taste profile.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (82, 'ErniGrove.png', '4star.jpg','ernigrove', 'Delicious goes with toast or any bread.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (83, 'Blackcurrant Preserve.png', '4star.jpg','blackcurrant preserve', 'Great Taste Awards - 3 Star, 2017', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (84, 'Raspberry Preserve.png', '4star.jpg','raspberry preserve', 'Great Taste Awards - 2 Star, 2013', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (85, 'MangoChutney.png', '4star.jpg','mangochutney', 'Great Taste Awards - 1 Star, 2013', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (86, 'FieryJalapenoRelis.png', '4star.jpg','fieryjalapenorelis', 'Great Taste Awards - 3 Star, 2013', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (87, 'IrisStoutChutney.png', '4star.jpg','irisstoutchutney', 'Great Taste Awards - 3 Star, 2013', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (88, 'MilkChoclate.png', '4star.jpg','milkchoclate', 'Great Taste Awards - 3 Star, 2013', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (89, 'GrannyShaws.png', '4star.jpg','grannyshaws', 'A beautiful sweet, savoury & moreiish chutney made by chef Declan ODonoghue & using only the smoothest source of stout', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);
INSERT INTO PRODUCT VALUES (90, 'Lemonade.png', '4star.jpg','lemonade', 'Forest Feast Brazil Nuts are sustainably hand-gathered from within the Amazonian Rainforest. They generously drench them in creamy Belgian milk Chocolate for a classic yet delicious combination of textures with a rich chocolatey finish.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 6);




INSERT INTO PRODUCT VALUES (91, 'Fish Meat.png', '4star.jpg','fish meat', '1-2 pcs Per 500gm The freshwater Basa Boneless (Cubes) is a delicious ingredient for tikkas and continental and oriental dishes.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (92, 'Sliced Fish.png', '4star.jpg','sliced fish', '4 -6 pcs Per 500gm A perfect slice of pure and rich flavor is just a bite away, right off the water, just off the dock.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (93, 'Skinless Fish.png', '4star.jpg','skinless fish', 'This freshwater fish is famous for its subtle taste and soft texture. This bony fish makes curries a fragrant dish with distinct flavours. Try it & discover why it is the fish of choice in Asian curries.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (94, 'Fresh Fish.png', '4star.jpg','fresh fish', '1 pcs Per 500gm Salmons are rich and delicate with oily flavor with every mouthful.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (95, 'Fish Pices.png', '4star.jpg','fish pices', 'this freshwater fish is famous for its subtle taste and soft texture. This bony fish makes curries a fragrant dish with distinct flavours. Try it & discover why it is the fish of choice in Asian curries.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (96, 'Kingfisher Meat.png', '4star.jpg','kingfisher meat', '4 -6 pcs Per 500gm , as it is popularly called this, is a moist, succulent fish that is delicate to handle.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (97, 'Frozen Kingfisher.png', '4star.jpg','frozen kingfisher', 'This freshwater fish is famous for its subtle taste and soft texture', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (98, 'Bhetki Fish.png', '4star.jpg','bhetki fish', 'This fish makes curries a fragrant dish with distinct flavours. ', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (99, 'Whole Fish.png', '4star.jpg','whole fish', ' it the fish of choice in Asian curries.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (100, 'Fish SLices.png', '4star.jpg','fish slices', 'delicate with oily flavor with every mouthful.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (101, 'Fish.png', '4star.jpg','fish', 'A perfect slice of pure and rich flavor is just a bite away, right off the water', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (102, 'Boneless Fish.png', '4star.jpg','boneless fish', 'The freshwater Basa Boneless (Cubes) is a delicious ingredient.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (103, 'Salmon Steaks.png', '4star.jpg','salmon steaks', 'very popular with Asian food restaurants.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (104, 'Small ScaleFish.png', '4star.jpg','small scalefish', '2 -3 pcs Per 500gm The mild sweetness and firm texture make the Tilapia fish very popular with Asian food restaurants.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);
INSERT INTO PRODUCT VALUES (105, 'Fresh Fish.png', '4star.jpg','fresh fish', 'A delight for fish lovers, this lean, bony fish elevates your curries with its tender and delicate flavour.', 'Allergy Information', 22.99 , 2.99 , '', 2, 4, 7);


INSERT INTO PRODUCT VALUES (106, 'Lobster.png', '4star.jpg','lobster', 'The Noway lobster is a very European crustacean! It lives on the shores of the Atlantic, from Scandinavia to North Africa. There is also a small number in the Mediterranean.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (107, 'Blueprawn.png', '4star.jpg','blueprawn', 'A type of fish that is distinguished from other fish by their shell. The shell is a type of external skeleton that gives protection and structural support to the shellfish. Their shells range in degree of hardness.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (108, 'Raw Oyster.png', '4star.jpg','raw oyster', 'They grow in abundance in clear Cornish waters and have sublime, fresh taste.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (109, 'Dungeness Crab.png', '4star.jpg','dungness crab', 'Arriving whole and live, they require shucking, but it’s not too complicated a job to get to that delicate, soft meat inside', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (110, 'Kingcrab ShelllessMeat.png', '4star.jpg','kingcrab shelllessmeat', 'the experts behind the seafood counter  always sell fresh crabs, and they’re willing to clean and crack them.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (111, 'Crab Meat.png', '4star.jpg','crab meat', 'Raw King Crab - Meat only, no shell 130g+', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (112, 'Lobster.png', '4star.jpg','lobster', 'Caught wild and frozen within hours of catching.Pure, fresh and organic.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (113, 'Jumbo Prawns.png', '4star.jpg','jumbo prawns', 'Delicious Indian Ocean variety.Caught wild and frozen within hours of catching. Pure, fresh and organic.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (114, 'Boston Lobster.png', '4star.jpg','boston lobster', 'Boston lobster of 300-400GM.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (115, 'Fresh Crayfish.png', '4star.jpg','fresh crayfish', 'Their exquisite taste makes them an excellent addition to many dishes.This delicious seafood is packed with high-quality natural protein!', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (116, 'Crues Prawn.png', '4star.jpg','crues prawn', 'Soft meat from claw and stomach cleaned and ready to use.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (117, 'Raw Crabmeat.png', '4star.jpg','raw crabmeat', 'Safe packaging, Purity, Good for health', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (118, 'Frozen Prawn.png', '4star.jpg','frozen prawn', 'Delicious found in Indian Ocean.Caught wild and frozen within hours of catching.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (119, 'Crab Legs.png', '4star.jpg','crab legs', 'The king crab legs at Costco are amazing and if you are looking for something special for a holiday meal, a romantic dinner or just feel like splurging on yourself then these are absolutely perfect.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);
INSERT INTO PRODUCT VALUES (120, 'Frozen Crab.png', '4star.jpg','frozen crab', 'Banking on the skills of our qualified team of professionals, we are involved in providing a high-quality range of Frozen Crab Meat.', 'Allergy Information', 36.99 , 2.99 , '', 2, 4, 8);




INSERT INTO PRODUCT VALUES (121, 'Bread Slice.png', '4star.jpg','bread slice', 'This farmhouse wheaten is dense, moist & deliciously full of flavor. Lovely toasted & buttered or have it with a soup.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (122, 'Bread wheaten.png', '4star.jpg','bread wheaten', 'French Village traditional sourdough - dough goes through a long fermentation process which gives it that distinctive tang.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (123, 'Pan Loaf.png', '4star.jpg','pan loaf', 'A sliced, catering sized Granary Pullman style loaf. The perfect foundation to a killer sandwich', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (124, 'Bread loaf.png', '4star.jpg','bread loaf', 'Good old fashioned white pan bread. A sliced, catering sized white Pullman style loaf.   This is a classic old school loaf and we bake ours soft and fluffy', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (125, 'Raspberry Slice loaf.png', '4star.jpg','raspberry slice', 'Scones with a delicate crumb, mixed with real raspberries & Belgium chocolate.  Fill with clotted cream. Scones with a delicate crumb, mixed with real raspberries & Belgium chocolate.  Fill with clotted cream.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (126, 'Corns Bun.png', '4star.jpg','corns bun', 'Generous sized traditional scones.  Split and fill with local butter, corn and homemade jam.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (127, 'Macarons.png', '4star.jpg','macarons', 'Macaron is a French cookie made from alamode flour, sugar and egg whites. It has a delicate crispy shell and a soft and chewy center', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (128, 'Coconut Fingers.png', '4star.jpg','coconut fingers', 'Coconut lovers will adore this sweet and moist Coconut Fingers. Perfect for a brunch table or for a snack, this bread is addicting and delicious.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (129, 'Fannel Rolls.png', '4star.jpg','fannel rolls', 'Flaky, soft, and buttery, these fresh dinner rolls outshine any main dish.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (130, 'Biscuits.png', '4star.jpg','biscuits', 'Biscuits filled with 50% Raspberry Conserve.  A great mid- afternoon pick me up with a big mug of tea.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (131, 'Cream Bread.png', '4star.jpg','cream bread', 'Generously sized buttermilk, cream bread.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (132, 'Croissants.png', '4star.jpg','croissants', 'Croissants made with all-butter, deliciously moreish and the perfect accompaniment to some freshly brewed coffee. ', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (133, 'Sausage Rolls.png', '4star.jpg','sausage rolls', 'Slice a farl in half, griddle & whack it around a fried egg, bacon, sausage and some brown or red sauce for the ultimate on the go breakfast', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (134, 'Small Baps.png', '4star.jpg','small baps', 'A sweet dough, dipped in fondant glaze and covered in coconut.  This one is a great lunch box filler', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);
INSERT INTO PRODUCT VALUES (135, 'Coco Buns.png', '4star.jpg','coco buns', 'Orange flavoured scone with milk chocolate chunks and drizzled with chocolate.  This tastes lovely gently warmed.', 'Allergy Information', 18.99 , 2.99 , 'Recommended', 2, 4, 9);


INSERT INTO PRODUCT VALUES (136, 'Lemon Cake.png', '4star.jpg','lemon cake', 'Deliciously moist, full of zingy citrus flavour & drizzled with icing, our light & fluffy classic lemon sponge won’t disappoint. Lemon flavoured crème cake with lashings of fondant icing & dusted with ', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (137, 'Raspberry Cake.png', '4star.jpg','raspberry cake', ' Light vanilla sponge with raspberries & chunks of creamy white chocolate make this a real crowd pleaser', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (138, 'Carrot Cake.png', '4star.jpg','carrot cake', 'A delightfully moist and satisfying carrot cake with a mellow hint of ginger & a delicious covering of butter cream frosting & walnuts.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (139, 'Caramel Slice.png', '4star.jpg','caramel slice', 'Gooey caramel, shortbread crunch and chocolate topping...the ultimate sweet treat & a dessert so rich some call it Millionaire’s shortbread! Our classic Caramel Slice comes as a whole slab ready for you to portion.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (140, 'Brownie Stack.png', '4star.jpg','brownie stack', 'Chocolately, fudgey goodness with a creamy salted caramel, our brownie comes as a whole slab in a foil tray - perfect for heating in the oven and ready for you to portion.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (141, 'Biscoff Brownie.png', '4star.jpg','biscoff brownie', ' A brownie and a chocolate chip cookie, mixed with the caramel crunch of Lotus Biscoff Biscuits.  Swirled with Biscoff cookie butter & creamy white chocolate.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (142, 'Cupcakes.png', '4star.jpg','cupcakes', 'Skillfully hand crafted, expertly decorated and full of fantastic flavour.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (143, 'Banana Cake.png', '4star.jpg','banana cake', 'Deliciously moist and best served in thick slices, banana lovers, this one’s for you! Forget the butter here as this ones perfect served just on it own', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (144, 'Fifteen SLice.png', '4star.jpg','fifteen slice ', 'Dense, moist and utterly moreish!  This classic Northern Irish treat combines digestive biscuits, marshmallows and glacé cherrie', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (145, 'Biscoff Hero.png', '4star.jpg','biscoff hero', 'Creamy white chocolate cheesecake, made with real Belgium white chocolate, whipping cream & cream cheese from our local creamery. Then topped generously with Biscoff cookie butter, Biscoff crumbs, and a whole Biscoff biscuit.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (146, 'Chocolate Hero.png', '4star.jpg','chocolate hero', 'A smooth chocolate cheesecake stuffed with gooey caramel and topped chunks of our Salted Caramel Brownie, chocolate crumb, chewy fudge pieces and drizzled with chocolate and even more caramel.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (147, 'Apple Tart.png', '4star.jpg','apple tart', 'Shortcrust pastry filled with Bramley apples grown in Ireland.  Serve with heap of whipped cream.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (148, 'Quispies.png', '4star.jpg','quispies', 'A unique French Village Creation - Chocolatey, Caramel Stuffed Rice Cereal Treats.  Bend it until it breaks and then watch the caramel flow out', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (149, 'Rhubarb Tart Cake.png', '4star.jpg','rhubarb tart', 'Shortcrust pastry filled with rhubard filling.  Serve with hot, or cold custard.', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);
INSERT INTO PRODUCT VALUES (150, 'Cupcakes Dazzlebox.png', '4star.jpg','cupcake Dazzlebox', 'Vanilla crème cake baked with a raspberry jam filling and topped with raspberry frosting, a drizzle of even more jam and scattered with white chocolate shavings', 'Allergy Information', 19.99 , 2.99 , '', 2, 4, 10);

*/

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DROP TABLE PASSWORD_RESET CASCADE CONSTRAINT;

CREATE TABLE PASSWORD_RESET(
	TOKEN VARCHAR2(255),
    FK1_User_ID	INTEGER NOT NULL,
    VALID_TILL TIMESTAMP
);
ALTER TABLE PASSWORD_RESET ADD CONSTRAINT FK1_RESET_TO_USER FOREIGN KEY(FK1_User_ID) REFERENCES user_master(User_ID) ON DELETE CASCADE;


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
