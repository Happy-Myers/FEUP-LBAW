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
  (5, 'Linda Davis', '999-111-2222', 'linda.davis@example.com', 'linda123', '70.00', 'User'),
  (6, 'John Doe', '565-555-5555', 'john.doe@example.com', 'john123', '50.00', 'User'),
  (7, 'Alice Johnson', '787-777-7777', 'alice.johnson@example.com', 'alice123', '100.00', 'User'),
  (8, 'Eve Adams', '555-143-4567', 'eve.adams@example.com', 'eve123', '60.00', 'User'),
  (9, 'David Brown', '777-555-8898', 'david.brown@example.com', 'david123', '75.00', 'User'),
  (10, 'Olivia Parker', '888-444-1111', 'olivia.parker@example.com', 'olivia123', '55.00', 'User'),
  (11, 'William Smith', '777-555-1234', 'william.smith@example.com', 'william123', '65.00', 'User'),
  (12, 'Sophia Johnson', '999-222-3333', 'sophia.johnson@example.com', 'sophia123', '75.00', 'User'),
  (13, 'James Davis', '888-123-4567', 'james.davis@example.com', 'james123', '45.00', 'User'),
  (14, 'Emma Wilson', '777-666-7777', 'emma.wilson@example.com', 'emma123', '80.00', 'User');


INSERT INTO addresses (id, street, city, postal_code, id_user)
VALUES
  (1, '789 Oak Ave', 'Villageton', '67890', 1),
  (2, '456 Elm St', 'Cityville', '12345', 2),
  (3, '321 Pine Rd', 'Suburbia', '98765', 3),
  (4, '123 Oak Lane', 'Townsville', '54321', 4),
  (5, '789 Maple Ave', 'Suburbia', '98765', 5),
  (6, '123 Game Street', 'Gamer City', '12345', 6),
  (7, '456 Game Blvd', 'Gameville', '54321', 7),
  (8, '789 Gamer Avenue', 'Playtown', '98765', 8),
  (9, '101 Console Lane', 'Gamer City', '23456', 9),
  (10, '321 Arcade Road', 'Gameville', '87654', 6);

INSERT INTO platform (id, name)
VALUES
  (1, 'PC'),
  (2, 'PlayStation 5'),
  (3, 'Xbox Series X'),
  (4, 'Nintendo Switch'),
  (5, 'PlayStation 4'),
  (6, 'Xbox One');

INSERT INTO category (id, name)
VALUES
  (1, 'Simulation'),
  (2, 'Sports'),
  (3, 'Strategy'),
  (4, 'Racing'),
  (5, 'Action'),
  (6, 'Adventure'),
  (7, 'Puzzle'),
  (8, 'Role-Playing'),
  (9, 'Mental'),
  (10, 'Horror'),
  (11, 'Music'),
  (12, 'Fighting'),
  (13, 'Educational'),
  (14, 'Shooter'),
  (16, 'Platformer');

INSERT INTO product (id, name, price, photo, score, description, hardware, id_platform)
VALUES
  (1, 'Game 3', 39.99, 'game3.jpg', 4, 'Description of Game 3', true, 1),
  (2, 'Game 4', 49.99, 'game4.jpg', 5, 'Description of Game 4', true, 2),
  (3, 'Game 5', 29.99, 'game5.jpg', 4, 'Description of Game 5', false, 3),
  (4, 'Game 6', 19.99, 'game6.jpg', 3, 'Description of Game 6', false, 1),
  (5, 'Racing Game 1', 29.99, 'racing_game1.jpg', 4, 'High-speed racing experience.', true, 4),
  (6, 'Action Game 1', 49.99, 'action_game1.jpg', 5, 'Intense action-packed adventure.', true, 5),
  (7, 'Adventure Game 1', 39.99, 'adventure_game1.jpg', 4, 'Epic quest and exploration.', true, 6),
  (8, 'Adventure Game 2', 34.99, 'adventure_game2.jpg', 4.5, 'Exciting journey in a fantasy world.', true, 6),
  (9, 'Racing Game 2', 29.99, 'racing_game2.jpg', 4, 'Compete in high-speed races.', true, 4),
  (10, 'Action Game 2', 54.99, 'action_game2.jpg', 4.5, 'Intense combat and thrilling missions.', true, 5),
  (11, 'Strategy Game 2', 39.99, 'strategy_game2.jpg', 4, 'Lead your forces to victory.', true, 1),
  (12, 'Simulation Game 2', 44.99, 'simulation_game2.jpg', 4, 'Experience realistic simulations.', true, 2),
  (13, 'Puzzle Game 1', 19.99, 'puzzle_game1.jpg', 4.5, 'Solve challenging puzzles.', false, 3),
  (14, 'Role-Playing Game 1', 49.99, 'rpg_game1.jpg', 4, 'Embark on epic quests and adventures.', true, 1),
  (15, 'Music Game 1', 24.99, 'music_game1.jpg', 4.5, 'Create and play music in this rhythm game.', true, 2),
  (16, 'Adventure Game 3', 39.99, 'adventure_game3.jpg', 4.5, 'Explore a vast open world and uncover hidden treasures.', true, 4),
  (17, 'Sports Game 1', 49.99, 'sports_game1.jpg', 4, 'Compete in various sports events and championships.', true, 6),
  (18, 'Horror Game 1', 29.99, 'horror_game1.jpg', 4.5, 'Experience a spine-tingling horror adventure.', true, 1),
  (19, 'Fighting Game 1', 34.99, 'fighting_game1.jpg', 4, 'Engage in epic martial arts battles with diverse characters.', true, 3),
  (20, 'Simulation Game 3', 54.99, 'simulation_game3.jpg', 4, 'Simulate real-life scenarios and challenges.', false, 2),
  (21, 'Puzzle Game 2', 19.99, 'puzzle_game2.jpg', 4, 'Solve mind-bending puzzles and brain teasers.', false, 5),
  (22, 'Shooter Game 1', 59.99, 'shooter_game1.jpg', 4.5, 'Enter the battlefield and engage in intense shooting action.', true, 4),
  (23, 'Music Game 2', 24.99, 'music_game2.jpg', 4, 'Compose and perform music in this creative game.', true, 1),
  (24, 'Racing Game 3', 39.99, 'racing_game3.jpg', 4.5, 'Race through exotic locations and master high-speed vehicles.', true, 5),
  (25, 'Educational Game 1', 19.99, 'educational_game1.jpg', 4, 'Learn while having fun with educational games for all ages.', false, 1),
  (26, 'Platformer Game 1', 29.99, 'platformer_game1.jpg', 4, 'Embark on a classic platformer adventure with challenging levels.', true, 2),
  (27, 'Strategy Game 3', 44.99, 'strategy_game3.jpg', 4.5, 'Plan and strategize to conquer your opponents in this RTS game.', true, 3),
  (28, 'Action Game 3', 49.99, 'action_game3.jpg', 4, 'Unleash chaos and action in a thrilling and explosive game.', true, 4),
  (29, 'Horror Game 2', 39.99, 'horror_game2.jpg', 4.5, 'Survive a terrifying horror experience filled with dread and suspense.', true, 6),
  (30, 'Role-Playing Game 2', 54.99, 'rpg_game2.jpg', 4, 'Create your hero and embark on an epic role-playing adventure.', true, 1),
  (31, 'Sports Game 2', 59.99, 'sports_game2.jpg', 4.5, 'Compete in a wide range of sports and become a champion athlete.', true, 2),
  (32, 'Adventure Game 4', 44.99, 'adventure_game4.jpg', 4.0, 'Embark on a mysterious adventure in an enchanted world.', true, 3),
  (33, 'Sports Game 3', 49.99, 'sports_game3.jpg', 4.5, 'Compete in various sports and leagues with realistic gameplay.', true, 6),
  (34, 'Mystery Game 1', 29.99, 'mystery_game1.jpg', 4.0, 'Solve intricate mysteries and uncover hidden secrets.', true, 4),
  (35, 'Fighting Game 2', 39.99, 'fighting_game2.jpg', 4.5, 'Engage in epic battles with powerful combatants in arenas.', true, 5),
  (36, 'Simulation Game 4', 34.99, 'simulation_game4.jpg', 4.0, 'Experience real-world simulations with stunning realism.', true, 2),
  (37, 'Puzzle Game 3', 24.99, 'puzzle_game3.jpg', 4.5, 'Challenge your brain with a collection of mind-bending puzzles.', false, 1),
  (38, 'Shooter Game 2', 54.99, 'shooter_game2.jpg', 4.0, 'Engage in intense shooting battles with a wide array of weapons.', true, 3),
  (39, 'Music Game 3', 19.99, 'music_game3.jpg', 4.5, 'Compose music and create your tracks in a creative music game.', true, 4),
  (40, 'Racing Game 4', 39.99, 'racing_game4.jpg', 4.5, 'Experience high-speed racing action on thrilling tracks.', true, 4),
  (41, 'Educational Game 2', 29.99, 'educational_game2.jpg', 4.0, 'Explore fun and educational activities for kids and families.', false, 6),
  (42, 'Platformer Game 2', 24.99, 'platformer_game2.jpg', 4.5, 'Jump and run through challenging platformer levels with precision.', true, 3),
  (43, 'Strategy Game 4', 49.99, 'strategy_game4.jpg', 4.0, 'Lead your armies to victory in a complex strategy game.', true, 5),
  (44, 'Action Game 4', 54.99, 'action_game4.jpg', 4.5, 'Dive into intense action sequences and thrilling combat.', true, 1),
  (45, 'Horror Game 3', 44.99, 'horror_game3.jpg', 4.0, 'Face your fears in a bone-chilling horror game with dark mysteries.', true, 2),
  (46, 'Role-Playing Game 3', 59.99, 'rpg_game3.jpg', 4.5, 'Create your character and explore a rich fantasy world in an RPG.', true, 4),
  (47, 'Sports Game 4', 34.99, 'sports_game4.jpg', 4.0, 'Become a sports superstar and dominate in various sports disciplines.', true, 6);


INSERT INTO category_product (id_category, id_product)
VALUES
  (1, 1),
  (1, 2),
  (2, 2),
  (2, 3),
  (3, 4),
  (4, 16),
  (5, 17),
  (6, 18),
  (7, 19),
  (8, 20),
  (9, 21),
  (10, 22),
  (11, 23),
  (12, 24),
  (13, 25);

INSERT INTO review (id, id_user, id_product, score, comment)
VALUES
  (1, 1, 1, 4, 'Enjoyable simulation game.'),
  (2, 2, 2, 5, 'Fantastic game on the PlayStation 5'),
  (3, 3, 3, 3, 'Not my favorite, but still fun.'),
  (4, 4, 4, 4, 'Great game for the Xbox Series X'),
  (5, 6, 7, 4, 'Exciting racing game.'),
  (6, 7, 5, 5, 'Incredible action game.'),
  (7, 8, 4, 4, 'Great adventure with an open world.'),
  (8, 9, 7, 4, 'Great racing game with realistic graphics.'),
  (9, 5, 3, 4, 'Fun game, but it could use some improvements.'),
  (10, 7, 2, 4, 'Enjoyable action game with excellent graphics.'),
  (11, 10, 8, 5, 'Fantastic adventure game with an open world.'),
  (12, 11, 12, 4, 'Good fighting game with diverse characters.'),
  (13, 12, 11, 4, 'A fun music game with a great soundtrack.'),
  (14, 13, 14, 3, 'Challenging puzzle game with unique puzzles.'),
  (15, 14, 9, 4, 'Engaging role-playing game with a deep story.'),
  (16, 1, 10, 4, 'Mental game that tests your cognitive skills.'),
  (17, 2, 10, 4, 'A horror game that keeps you on the edge of your seat.'),
  (18, 3, 9, 5, 'Music game with a wide variety of songs to play.');

INSERT INTO review_vote (id, vote, id_user, id_product)
VALUES
  (1, true, 2, 4),
  (2, true, 3, 4),
  (3, true, 4, 6),
  (4, true, 5, 7),
  (5, true, 6, 5),
  (6, false, 10, 16),
  (7, true, 11, 17),
  (8, true, 12, 18),
  (9, false, 13, 19),
  (10, true, 14, 20),
  (11, false, 1, 21),
  (12, true, 2, 22),
  (13, true, 3, 23),
  (14, false, 4, 24),
  (15, true, 5, 25),
  (16, true, 6, 26),
  (17, false, 7, 27),
  (18, true, 8, 28),
  (19, false, 9, 29),
  (20, true, 10, 30),
  (21, true, 11, 31),
  (22, false, 12, 32),
  (23, true, 13, 33),
  (24, false, 14, 34),
  (25, true, 1, 35);

INSERT INTO cart (id_user, id_product, quantity)
VALUES
  (1, 3, 1),
  (2, 4, 2),
  (1, 4, 1),
  (3, 3, 3),
  (4, 2, 2),
  (2, 1, 1),
  (8, 5, 2),
  (9, 7, 3),
  (6, 6, 1),
  (7, 5, 2),
  (1, 8, 1),
  (2, 9, 2),
  (3, 10, 1),
  (4, 11, 3),
  (5, 12, 2),
  (6, 13, 1),
  (7, 20, 2),
  (8, 21, 1),
  (9, 22, 3),
  (10, 23, 2),
  (1, 24, 1),
  (2, 25, 4);

INSERT INTO wishlist (id_user, id_product)
VALUES
  (3, 2),
  (4, 3),
  (1, 2),
  (2, 1),
  (5, 4),
  (1, 3),
  (8, 4),
  (7, 6),
  (6, 7),
  (9, 5),
  (7, 14),
  (8, 15),
  (9, 16),
  (10, 17),
  (1, 18),
  (2, 19),
  (3, 26),
  (4, 27),
  (5, 28),
  (6, 29),
  (7, 30),
  (8, 31);

INSERT INTO purchase (id, id_user, total, delivery_progress, id_address)
VALUES
  (1, 3, 79.98, 'Shipped', 4),
  (2, 4, 99.99, 'Delivered', 1),
  (3, 1, 129.98, 'Delivered', 3),
  (4, 2, 199.99, 'Processing', 2),
  (5, 5, 59.99, 'Shipped', 5),
  (6, 3, 199.98, 'Delivered', 2),
  (7, 6, 99.99, 'Shipped', 10),
  (8, 7, 49.99, 'Delivered', 9),
  (9, 8, 79.99, 'Delivered', 8),
  (10, 9, 29.99, 'Processing', 7);

INSERT INTO purchase_product (id_purchase, id_product, quantity)
VALUES
  (1, 3, 1),
  (2, 4, 2),
  (3, 1, 2),
  (4, 2, 1),
  (5, 2, 3),
  (6, 4, 2),
  (7, 7, 1),
  (8, 5, 2),
  (9, 4, 3),
  (10, 6, 2);


INSERT INTO faq (question, answer)
VALUES
  ('How can I reset my password?', 'You can reset your password by clicking on the "Forgot Password" link on the login page. Follow the instructions in the email we send you to reset your password.'),
  ('What payment methods do you accept?', 'We accept major credit cards, including Visa, MasterCard, and American Express, as well as PayPal for online payments.'),
  ('Can I change my email address associated with my account?', 'Yes, you can update your email address in your account settings. Please make sure to verify your new email address for security purposes.'),
  ('Is there a return policy for physical products?', 'Yes, we have a return policy for physical products. Please review our return policy on our website for details and instructions.'),
  ('How do I redeem a game key or code?', 'To redeem a game key or code, go to your account settings and find the "Redeem Key" option. Enter your key or code, and the game will be added to your library.'),
  ('What are the system requirements for PC games?', 'System requirements can vary by game. Check the product page for the specific game to find information on its system requirements.'),
  ('Do you offer pre-orders for upcoming games?', 'Yes, we offer pre-orders for select upcoming games. You can pre-order them on our website and receive exclusive bonuses.'),
  ('How can I request a refund for a digital purchase?', 'If you are not satisfied with a digital purchase, please contact our customer support team within 14 days of purchase to request a refund.'),
  ('Is there a mobile app available for your platform?', 'Yes, we have a mobile app that allows you to access your account, purchase games, and stay updated on the latest releases.'),
  ('Can I gift a game to a friend?', 'Yes, you can gift games to friends. On the product page, look for the "Gift" option and follow the instructions to send the game as a gift to another user.');
