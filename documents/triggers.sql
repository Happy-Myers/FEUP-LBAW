/*update product score on review*/

CREATE FUNCTION update_product_score() RETURNS TRIGGER AS
$BODY$
BEGIN
    UPDATE product 
    SET score = (AVG(score) FROM review WHERE id_product = New.id_product) WHERE id = New.id_product 
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_score AFTER INSERT OR UPDATE OR DELETE ON review
FOR EACH ROW
EXECUTE PROCEDURE update_product_score();

/*remove stock from product after purchase*/
CREATE FUNCTION update_stock() RETURNS TRIGGER AS
$BODY$
BEGIN
    UPDATE product
    SET quantity = quantity - New.quantity WHERE id = New.id_product;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_stock AFTER INSERT ON purchase_product
FOR EACH ROW
EXECUTE PROCEDURE update_stock();

/*can't add over the current stock to cart*/

CREATE FUNCTION check_cart_quantity() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF
        NOT EXISTS(SELECT quantity FROM product WHERE id = New.id_product AND quantity >= New.quantity)
    THEN
        RAISE EXCEPTION 'Not enough items of %', New.id_product
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER check_valid_cart BEFORE INSERT
ON cart
EXECUTE PROCEDURE check_cart_quantity();

/*delete cart after a purchase*/

CREATE FUNCTION clear_cart() RETURNS TRIGGER AS
$BODY$
BEGIN
    DELETE FROM cart
    WHERE id_user = New.id_user
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER clear_cart AFTER INSERT
ON purchase
EXECUTE PROCEDURE clear_cart();


/*delete from wishlist*/

CREATE FUNCTION clear_wishlist() RETURNS TRIGGER AS
$BODY$
BEGIN
    DELETE FROM wishlist
    WHERE id_user = (SELECT id_user FROM purchase WHERE id = New.id_purchase) AND id_product = NEW.id_product
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER clear_wishlist AFTER INSERT
ON purchase_product
FOR EACH ROW
EXECUTE PROCEDURE clear_wishlist();










