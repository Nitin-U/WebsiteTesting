-- Create a Database table to represent the "Register_Customer" entity.

DROP TABLE Register_Customer CASCADE CONSTRAINT;

CREATE TABLE Register_Customer(
    Customer_ID	INTEGER NOT NULL PRIMARY KEY,
    Customer_Name VARCHAR2(255),
    Customer_Email VARCHAR2(255),
    Customer_Phone VARCHAR2(255),
    Customer_Age VARCHAR2(255),
    Customer_Gender VARCHAR(255),
    Customer_Username VARCHAR2(255),
    Customer_Pass VARCHAR2(255)
);
	
-- Create a Database table to represent the "Register_Trader" entity.

/*DROP TABLE Register_Trader CASCADE CONSTRAINT;

CREATE TABLE Register_Trader(
    Trader_ID	INTEGER NOT NULL PRIMARY KEY,
    Trader_Name VARCHAR2(255),
    Trader_Email VARCHAR2(255),
    Trader_Phone VARCHAR2(255),
    Trader_Username VARCHAR2(255),
    Trader_Password VARCHAR(255),
    Trader_Type VARCHAR2(255),
    Trader_Shop VARCHAR2(255),
    Trader_Image VARCHAR2(255)
);*/