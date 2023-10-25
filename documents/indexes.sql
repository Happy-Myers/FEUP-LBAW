-- performance indexes
CREATE INDEX product_reviews ON reviews USING hash (id_product);
CREATE INDEX price_products ON product USING btree (price);

-- full-text search indexes

