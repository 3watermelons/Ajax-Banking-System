CREATE DATABASE bank;
USE bank;
CREATE TABLE customers(id INT PRIMARY KEY, name VARCHAR(200), number VARCHAR(15), balance FLOAT);
CREATE TABLE transaction(c1 VARCHAR(250), c2 VARCHAR(250), Amount FLOAT);
INSERT INTO customers(id,name,number, balance) VALUES(1,"Siddhesh Desai","7558612755", 10000);
INSERT INTO customers(id,name,number, balance) VALUES(2,"Raj Patil","9673487487", 5000);
INSERT INTO customers(id,name,number, balance) VALUES(3,"Alex Rales","775528632", 8000);
INSERT INTO customers(id,name,number, balance) VALUES(4,"Mohit Rajesh","123687292", 6000);