--- Credits André Restivo
--- Modified for SQLite by João Rocha da Silva
--- Revised by Gonçalo Gonçalves

PRAGMA foreign_keys = ON;
.headers on
.mode columns

DROP TABLE IF EXISTS OrderProduct;
DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Users;

CREATE TABLE Category (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL
);

CREATE TABLE Product (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  price FLOAT NOT NULL,
  cat_id INTEGER NOT NULL REFERENCES Category
);

CREATE TABLE Users (
  username TEXT PRIMARY KEY,
  password TEXT
);

CREATE TABLE Orders (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date INTEGER NOT NULL,
  username TEXT NOT NULL REFERENCES Users
);

CREATE TABLE OrderProduct (
  order_id INTEGER REFERENCES Orders,
  prod_id INTEGER REFERENCES Product,
  quantity INTEGER NOT NULL,
  PRIMARY KEY (order_id, prod_id)
);


INSERT INTO Category (name) VALUES ('Fruits');
INSERT INTO Category (name) VALUES ('Clothes');

INSERT INTO Product (name, price, cat_id) VALUES ('Apples', '9.99', 1);
INSERT INTO Product (name, price, cat_id) VALUES ('Oranges', '4.99', 1);
INSERT INTO Product (name, price, cat_id) VALUES ('Pears', '3.99', 1);
INSERT INTO Product (name, price, cat_id) VALUES ('Pineapples', '2.99', 1);
INSERT INTO Product (name, price, cat_id) VALUES ('Bananas', '7.99', 1); 
INSERT INTO Product (name, price, cat_id) VALUES ('Shirt', '3.99', 2);
INSERT INTO Product (name, price, cat_id) VALUES ('Jeans', '12.99', 2);
INSERT INTO Product (name, price, cat_id) VALUES ('Sweat Shirt', '9.99', 2);
