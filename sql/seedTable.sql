INSERT INTO users (id, name, email, balance, created_at, updated_at) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com', 100.00, NOW(), NOW()),
(2, 'Ana López', 'ana.lopez@example.com', 150.00, NOW(), NOW());

INSERT INTO sports_events (id, name, event_date, sport_type, created_at, updated_at) VALUES
(1, 'Real Madrid vs Barcelona', '2025-01-15 20:00:00', 'Fútbol', NOW(), NOW()),
(2, 'Lakers vs Warriors', '2025-01-16 18:00:00', 'Baloncesto', NOW(), NOW());

INSERT INTO bets (id, user_id, event_id, amount, odds, status, created_at, updated_at) VALUES
(1, 1, 1, 50.00, 2.5, 'pending', NOW(), NOW()),
(2, 2, 2, 30.00, 3.0, 'pending', NOW(), NOW());
