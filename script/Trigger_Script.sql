CREATE SEQUENCE seq_PRODUCT_ID
    START WITH 100
    INCREMENT BY 1;

CREATE OR REPLACE TRIGGER trig_PRODUCT_pk
    BEFORE INSERT ON PRODUCT
    FOR EACH ROW
    WHEN(new.PRODUCT_ID IS NULL)
    BEGIN
        SELECT seq_PRODUCT_ID.nextval INTO :new.PRODUCT_ID FROM dual;
    END;
    /

--------------------------------------------------------------------------------
CREATE SEQUENCE seq_User_ID
    START WITH 100
    INCREMENT BY 1;

CREATE OR REPLACE TRIGGER trig_User_pk
    BEFORE INSERT ON user_master
    FOR EACH ROW
    WHEN(new.User_ID IS NULL)
    BEGIN
        SELECT seq_User_ID.nextval INTO :new.User_ID FROM dual;
    END;
    /
 
------------------------------------------------------------------------------- 
CREATE SEQUENCE seq_SHOP_ID
    START WITH 100
    INCREMENT BY 1;

CREATE OR REPLACE TRIGGER trig_SHOP_pk
    BEFORE INSERT ON SHOP
    FOR EACH ROW
    WHEN(new.SHOP_ID IS NULL)
    BEGIN
        SELECT seq_SHOP_ID.nextval INTO :new.SHOP_ID FROM dual;
    END;
    /

--------------------------------------------------------------------------------
CREATE SEQUENCE seq_ID
    START WITH 100
    INCREMENT BY 1;

CREATE OR REPLACE TRIGGER trig_cart_pk
    BEFORE INSERT ON cart
    FOR EACH ROW
    WHEN(new.ID IS NULL)
    BEGIN
        SELECT seq_ID.nextval INTO :new.ID FROM dual;
    END;
    /
--------------------------------------------------------------------------------
    
CREATE SEQUENCE seq_VOUCHER_ID
    START WITH 100
    INCREMENT BY 1;

CREATE OR REPLACE TRIGGER trig_VOUCHER_pk
    BEFORE INSERT ON VOUCHER
    FOR EACH ROW
    WHEN(new.VOUCHER_ID IS NULL)
    BEGIN
        SELECT seq_VOUCHER_ID.nextval INTO :new.VOUCHER_ID FROM dual;
    END;    
    
    
   
