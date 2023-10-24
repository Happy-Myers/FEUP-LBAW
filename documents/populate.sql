-- Inserting sample data into the 'users' table
INSERT INTO users (name, phone_number, email, password, credits, permissions)
VALUES
  ('John Doe', '123-456-7890', 'john.doe@example.com', 'password123', '100.00', 'Admin'),
  ('Alice Smith', '987-654-3210', 'alice.smith@example.com', 'alice123', '50.00', 'User');

-- Inserting sample data into the 'addresses' table
INSERT INTO addresses (street, city, postal_code, id_user)
VALUES
  ('123 Main St', 'Cityville', '12345', 1),
  ('456 Elm St', 'Townsville', '54321', 2);

-- Inserting sample data into the 'platform' table
INSERT INTO platform (name)
VALUES
  ('PlayStation'),
  ('Xbox'),
  ('Nintendo Switch');

-- Inserting sample data into the 'category' table
INSERT INTO category (name)
VALUES
  ('Action'),
  ('Adventure'),
  ('RPG');

-- Inserting sample data into the 'product' table
INSERT INTO product (name, price, photo, score, description, hardware, id_platform)
VALUES
  ('Game 1', 29.99, 'game1.jpg', 4, 'Description of Game 1', true, 1),
  ('Game 2', 19.99, 'game2.jpg', 3, 'Description of Game 2', false, 2);

-- Inserting sample data into the 'category_product' table
INSERT INTO category_product (id_category, id_product)
VALUES
  (1, 1),
  (2, 1),
  (1, 2);

-- Inserting sample data into the 'review' table
INSERT INTO review (id_user, id_product, score, comment)
VALUES
  (1, 1, 5, 'Great game!'),
  (2, 1, 4, 'Enjoyed playing this.');

-- Inserting sample data into the 'review_vote' table
INSERT INTO review_vote (vote, id_user, id_product)
VALUES
  (true, 1, 1),
  (false, 2, 1);

-- Inserting sample data into the 'cart' table
INSERT INTO cart (id_user, id_product, quantity)
VALUES
  (1, 1, 2),
  (2, 2, 1);

-- Inserting sample data into the 'wishlist' table
INSERT INTO wishlist (id_user, id_product)
VALUES
  (1, 2),
  (2, 1);

-- Inserting sample data into the 'purchase' table
INSERT INTO purchase (id_user, total, delivery_progress, id_address)
VALUES
  (1, 59.98, 'Processing', 1),
  (2, 19.99, 'Shipped', 2);

-- Inserting sample data into the 'purchase_product' table
INSERT INTO purchase_product (id_purchase, id_product, quantity)
VALUES
  (1, 1, 2),
  (2, 2, 1);

-- Inserting sample data into the 'faq' table
INSERT INTO faq (question, answer)
VALUES
  ('How do I reset my password?', 'You can reset your password by clicking on the "Forgot Password" link on the login page.'),
  ('What are the accepted payment methods?', 'We accept credit cards and PayPal for payments.');
