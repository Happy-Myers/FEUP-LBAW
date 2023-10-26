DELETE FROM users;
DELETE FROM addresses ;
DELETE FROM platform;
DELETE FROM category;
DELETE FROM product;
DELETE FROM category_product;
DELETE FROM review;
DELETE FROM review_vote;
DELETE FROM cart;
DELETE FROM wishlist;
DELETE FROM purchase;
DELETE FROM faq;

INSERT INTO users (id, name, phone_number, email, password, credits, permissions)
VALUES
  (1, 'Jane Smith', '555-555-5555', 'jane.smith@example.com', 'jane123', '75.00', 'User'),
  (2, 'Bob Johnson', '777-777-7777', 'bob.johnson@example.com', 'bob123', '120.00', 'Admin'),
  (3, 'Sarah Adams', '555-123-4567', 'sarah.adams@example.com', 'sarah123', '45.00', 'User'),
  (4, 'Michael Brown', '777-555-8888', 'michael.brown@example.com', 'michael123', '90.00', 'Admin'),
  (5, 'Linda Davis', '999-111-2222', 'linda.davis@example.com', 'linda123', '70.00', 'User');

INSERT INTO addresses (id, street, city, postal_code, id_user)
VALUES
  (1, '789 Oak Ave', 'Villageton', '67890', 1),
  (2, '456 Elm St', 'Cityville', '12345', 2),
  (3, '321 Pine Rd', 'Suburbia', '98765', 3),
  (4, '123 Oak Lane', 'Townsville', '54321', 4),
  (5, '789 Maple Ave', 'Suburbia', '98765', 5);

INSERT INTO platform (id, name)
VALUES
  (1, 'PC'),
  (2, 'PlayStation 5'),
  (3, 'Xbox Series X');

INSERT INTO category (id, name)
VALUES
  (1, 'Simulation'),
  (2, 'Sports'),
  (3, 'Strategy');

INSERT INTO product (id, name, price, photo, score, description, hardware, id_platform)
VALUES
  (1, 'Game 3', 39.99, 'game3.jpg', 4, 'Description of Game 3', true, 1),
  (2, 'Game 4', 49.99, 'game4.jpg', 5, 'Description of Game 4', true, 2),
  (3, 'Game 5', 29.99, 'game5.jpg', 4, 'Description of Game 5', false, 3),
  (4, 'Game 6', 19.99, 'game6.jpg', 3, 'Description of Game 6', false, 1);

INSERT INTO category_product (id_category, id_product)
VALUES
  (1, 1),
  (1, 2),
  (2, 2),
  (2, 3),
  (3, 4);

INSERT INTO review (id, id_user, id_product, score, comment)
VALUES
  (1, 1, 1, 4, 'Enjoyable simulation game.'),
  (2, 2, 2, 5, 'Fantastic game on the PlayStation 5'),
  (3, 3, 3, 3, 'Not my favorite, but still fun.'),
  (4, 4, 4, 4, 'Great game for the Xbox Series X');

INSERT INTO review_vote (id, vote, id_user, id_product)
VALUES
  (1, true, 2, 4),
  (2, true, 3, 4);

INSERT INTO cart (id_user, id_product, quantity)
VALUES
  (1, 3, 1),
  (2, 4, 2),
  (1, 4, 1),
  (3, 3, 3),
  (4, 2, 2),
  (2, 1, 1);

INSERT INTO wishlist (id_user, id_product)
VALUES
  (3, 2),
  (4, 3),
  (1, 2),
  (2, 1),
  (5, 4),
  (1, 3);

INSERT INTO purchase (id, id_user, total, delivery_progress, id_address)
VALUES
  (1, 3, 79.98, 'Shipped', 4),
  (2, 4, 99.99, 'Delivered', 1),
  (3, 1, 129.98, 'Delivered', 3),
  (4, 2, 199.99, 'Processing', 2),
  (5, 5, 59.99, 'Shipped', 5),
  (6, 3, 199.98, 'Delivered', 2);

INSERT INTO purchase_product (id_purchase, id_product, quantity)
VALUES
  (1, 3, 1),
  (2, 4, 2),
  (3, 1, 2),
  (4, 2, 1),
  (5, 2, 3),
  (6, 4, 2);

INSERT INTO faq (question, answer)
VALUES
  ('How can I contact customer support?', 'You can contact our customer support team at support@example.com.'),
  ('Do you offer international shipping?', 'Yes, we offer international shipping to most countries.');