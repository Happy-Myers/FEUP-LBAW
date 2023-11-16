<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("/*update product score on reviews*/

        CREATE OR REPLACE FUNCTION update_product_score() 
        RETURNS TRIGGER 
        AS
        \$BODY$
        BEGIN
            UPDATE product 
            SET score = (SELECT AVG(score) FROM reviews WHERE id_product = NEW.id_product) 
            WHERE id = NEW.id_product;
            RETURN NEW;
        END;
        \$BODY$
        LANGUAGE plpgsql;
        
        CREATE TRIGGER update_score 
        AFTER INSERT OR UPDATE OR DELETE 
        ON reviews
        FOR EACH ROW
        EXECUTE PROCEDURE update_product_score();
        
        /*remove stock from product after purchases*/
        CREATE OR REPLACE FUNCTION update_stock() 
        RETURNS TRIGGER 
        AS
        \$BODY$
        BEGIN
            UPDATE product
            SET quantity = quantity - NEW.quantity 
            WHERE id = NEW.id_product;
            RETURN NEW;
        END;
        \$BODY$
        LANGUAGE plpgsql;
        
        CREATE TRIGGER update_stock 
        AFTER INSERT 
        ON product_purchase
        FOR EACH ROW
        EXECUTE PROCEDURE update_stock();
        
        /*can't add over the current stock to cart*/
        
        CREATE OR REPLACE FUNCTION check_cart_quantity() 
        RETURNS TRIGGER 
        AS
        \$BODY$
        BEGIN
            IF NOT EXISTS (SELECT quantity FROM product WHERE id = NEW.id_product AND quantity >= NEW.quantity) THEN
                RAISE EXCEPTION 'Not enough items of %', NEW.id_product;
            END IF;
            RETURN NEW;
        END;
        \$BODY$
        LANGUAGE plpgsql;
        
        CREATE TRIGGER check_valid_cart 
        BEFORE INSERT 
        ON cart
        FOR EACH ROW
        EXECUTE PROCEDURE check_cart_quantity();
        
        /*delete cart after a purchases*/
        
        CREATE OR REPLACE FUNCTION clear_cart() 
        RETURNS TRIGGER 
        AS
        \$BODY$
        BEGIN
            DELETE FROM cart
            WHERE id_user = NEW.id_user;
            RETURN NEW;
        END;
        \$BODY$
        LANGUAGE plpgsql;
        
        CREATE TRIGGER clear_cart 
        AFTER INSERT 
        ON purchases
        FOR EACH ROW 
        EXECUTE PROCEDURE clear_cart();
        
        /*delete from wishlist*/
        
        CREATE OR REPLACE FUNCTION clear_wishlist() 
        RETURNS TRIGGER 
        AS
        \$BODY$
        BEGIN
            DELETE FROM wishlist
            WHERE id_user = (SELECT id_user FROM purchases WHERE id = NEW.id_purchase) AND id_product = NEW.id_product;
            RETURN NEW;
        END;
        \$BODY$
        LANGUAGE plpgsql;
        
        CREATE TRIGGER clear_wishlist 
        AFTER INSERT 
        ON product_purchase
        FOR EACH ROW
        EXECUTE PROCEDURE clear_wishlist();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
        DROP TRIGGER IF EXISTS update_score ON reviews;
        DROP TRIGGER IF EXISTS update_stock ON product_purchase;
        DROP TRIGGER IF EXISTS check_valid_cart ON cart;
        DROP TRIGGER IF EXISTS clear_cart ON purchases;
        DROP TRIGGER IF EXISTS clear_wishlist ON product_purchase;

        DROP FUNCTION IF EXISTS update_product_score();
        DROP FUNCTION IF EXISTS update_stock();
        DROP FUNCTION IF EXISTS check_cart_quantity();
        DROP FUNCTION IF EXISTS clear_cart();
        DROP FUNCTION IF EXISTS clear_wishlist();
    ');
    }
};
