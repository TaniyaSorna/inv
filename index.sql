-- Active: 1708937091942@@127.0.0.1@3306@inv_crud

SHOW DATABASES

SELECT * FROM invoice

INSERT INTO
    invoice (product_name, price, qty)
VALUES ('2pic', 1100, 100)

UPDATE invoice
set
    product_name = 'Velbet Churi',
    price = 300,
    qty = 24,
    img = '$img_url'
where
    id = 10;

TRUNCATE TABLE invoice