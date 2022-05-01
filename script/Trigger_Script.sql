CREATE SEQUENCE seq_Customer_ID
    START WITH 100
    INCREMENT BY 1;


CREATE OR REPLACE TRIGGER trig_Customer_pk
    BEFORE INSERT ON Register_Customer
    FOR EACH ROW
    WHEN(new.Customer_ID IS NULL)
    BEGIN
        SELECT seq_Customer_ID.nextval INTO :new.Customer_ID FROM dual;
    END;
    /


CREATE SEQUENCE seq_Trader_ID
    START WITH 100
    INCREMENT BY 1;


CREATE OR REPLACE TRIGGER trig_Trader_pk
    BEFORE INSERT ON Register_Trader
    FOR EACH ROW
    WHEN(new.Trader_ID IS NULL)
    BEGIN
        SELECT seq_Trader_ID.nextval INTO :new.Trader_ID FROM dual;
    END;
    /
