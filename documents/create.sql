-- SCHEMA: lbaw2245

DROP SCHEMA IF EXISTS lbaw23154 CASCADE;

CREATE SCHEMA IF NOT EXISTS lbaw23154;

SET search_path TO lbaw23154;
	
DROP TYPE IF EXISTS deliveryProgress CASCADE;
DROP TYPE IF EXISTS userPermission CASCADE;

CREATE TYPE deliveryProgress AS ENUM ('Processing', 'Shipped', 'Delivered');
CREATE TYPE userPermission AS ENUM ('User', 'Admin');
