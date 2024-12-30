.headers on
.mode columns
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS ParticipantLecture;
DROP TABLE IF EXISTS ParticipantWorkshop;
DROP TABLE IF EXISTS PersonCoffeeBreak;
DROP TABLE IF EXISTS Workshop;
DROP TABLE IF EXISTS CoffeeBreak;
DROP TABLE IF EXISTS Menu;
DROP TABLE IF EXISTS Lecture;
DROP TABLE IF EXISTS Activity;
DROP TABLE IF EXISTS Participant;
DROP TABLE IF EXISTS Registration;
DROP TABLE IF EXISTS SpeakerWorkshop;
DROP TABLE IF EXISTS SpeakerLecture;
DROP TABLE IF EXISTS Hotel;
DROP TABLE IF EXISTS Travel;
DROP TABLE IF EXISTS Person;

CREATE TABLE Person (
    identifier TEXT PRIMARY KEY, 
    name TEXT,
    age INTEGER CHECK(age>0),
    job_description TEXT,
    food_restrictions TEXT,
    password TEXT,
    photo TEXT
);

CREATE TABLE Travel (
    travel_id TEXT PRIMARY KEY,
    departure_time TEXT, 
    arrival_time TEXT,
    start_location TEXT NOT NULL,
    end_location TEXT NOT NULL,
    CHECK(arrival_time IS NULL OR strftime('%s', arrival_time) > strftime('%s', departure_time))
);

CREATE TABLE Hotel (
    reservation_id TEXT PRIMARY KEY,
    name TEXT,
    address TEXT
);

CREATE TABLE SpeakerLecture (
    identifier TEXT PRIMARY KEY REFERENCES Person, 
    nationality TEXT,
    place_residence TEXT,
    travel INTEGER REFERENCES Travel,
    hotel INTEGER REFERENCES Hotel
);

CREATE TABLE SpeakerWorkshop (
    identifier TEXT PRIMARY KEY REFERENCES Person,
    nationality TEXT,
    place_residence TEXT
);

CREATE TABLE Registration (
    registration_id TEXT PRIMARY KEY, 
    date_admitted TEXT NOT NULL
);

CREATE TABLE Participant (
    identifier TEXT PRIMARY KEY REFERENCES Person, 
    registration_id TEXT REFERENCES Registration
);

CREATE TABLE Activity (
    room TEXT,
    start_time TEXT NOT NULL,
    end_time TEXT NOT NULL,
    CHECK(end_time IS NULL OR strftime('%s', end_time) > strftime('%s', start_time)),
    PRIMARY KEY (room, start_time)
);

CREATE TABLE Lecture (
    room TEXT,
    start_time TEXT,
    capacity INTEGER NOT NULL CHECK (capacity>0),
    title TEXT,
    lecture_description TEXT,
    identifier TEXT NOT NULL REFERENCES SpeakerLecture,
    PRIMARY KEY(room, start_time),
    FOREIGN KEY (room, start_time) REFERENCES Activity(room, start_time)
);

CREATE TABLE Menu (
  menu_id INTEGER PRIMARY KEY,
  meat TEXT,
  veggie TEXT,
  vegan TEXT,
  gluten_free TEXT
);

CREATE TABLE CoffeeBreak (
    room TEXT,
    start_time TEXT,
    menu_id INTEGER NOT NULL REFERENCES Menu,
    PRIMARY KEY (room, start_time),
    FOREIGN KEY (room, start_time) REFERENCES Activity(room, start_time)
);

CREATE TABLE Workshop (
    room TEXT,
    start_time TEXT,
    title TEXT,
    capacity INTEGER NOT NULL,
    price REAL,
    workshop_description TEXT,
    identifier TEXT NOT NULL REFERENCES SpeakerWorkshop,
    PRIMARY KEY (room, start_time),
    FOREIGN KEY (room, start_time) REFERENCES Activity(room, start_time)
);

CREATE TABLE PersonCoffeeBreak (
    identifier TEXT NOT NULL REFERENCES Person(identifier),
    room TEXT NOT NULL,
    start_time TEXT NOT NULL,
    PRIMARY KEY (identifier, room, start_time),
    FOREIGN KEY (room, start_time) REFERENCES CoffeeBreak(room, start_time)
);

CREATE TABLE ParticipantWorkshop (
    participant TEXT NOT NULL REFERENCES Participant(identifier),
    room TEXT NOT NULL,
    start_time TEXT NOT NULL,
    PRIMARY KEY (participant, room, start_time),
    FOREIGN KEY (room, start_time) REFERENCES Workshop(room, start_time)
);

CREATE TABLE ParticipantLecture (
    participant TEXT NOT NULL REFERENCES Participant(identifier),
    room TEXT NOT NULL,
    start_time TEXT NOT NULL,
    PRIMARY KEY (participant, room, start_time),
    FOREIGN KEY (room, start_time) REFERENCES Lecture(room, start_time)
);

INSERT INTO Person (identifier) 
VALUES 
('L1'),
('L2'),
('L3');

INSERT INTO Person (identifier) 
VALUES 
('W1'),
('W2'),
('W3');

INSERT INTO Travel (travel_id, departure_time, arrival_time, start_location, end_location)
VALUES 
('L1', '2025-03-14 06:00:00', '2025-03-14 16:30:00', 'Boston, USA', 'Porto, Portugal'),
('L2', '2025-03-14 18:45:00', '2025-03-15 04:20:00', 'Estocolmo, Suécia', 'Porto, Portugal');

INSERT INTO Hotel (reservation_id, name, address)
VALUES 
('L1', 'Axis Porto Business & SPA Hotel', 'R. Maria Feliciana 100, 4465-283 São Mamede de Infesta'),
('L2', 'Eurostars Oporto', 'R. Mte. Guilherme Camarinha 212, 4200-537 Porto'),
('L3', 'Axis Porto Business & SPA Hotel', 'R. Maria Feliciana 100, 4465-283 São Mamede de Infesta');

INSERT INTO Menu (menu_id, meat, veggie, vegan, gluten_free) 
VALUES 
(1,'Smoked Turkey, Tuna and Herb Cream Cheese Submarine, Banana Muffin, Lemonade and Coffee & Tea', 'Vegetables Crostini with Feta Crumble, Deep Fried Vegetarian Samosa, Crispy Mango, Yam Net Roll', 'Carrot Cake, Vegan Sandwiches', 'Trufa Raw Orange, Chocolate Cake'),
(2, 'Honey Chicken Char Siew Pau, Crystal Dumpling with Sweet Sauce, Baked Peach Jalousies, Orange Juice and Coffee & Tea', 'Tomato and Morzzarella Bruschetta, Golden Cheese Croquette with Avocado Dip and Salmon Quiche with Chive Sour Cream', 'Tofu and Kimchi Salad, Banana Bread', 'Trufa Raw Coco, Apple Cake');

INSERT INTO SpeakerLecture (identifier, travel, hotel)
VALUES 
('L1', 'L1', 'L1'),
('L2', 'L2', 'L2'),
('L3', NULL, 'L3');

INSERT INTO SpeakerWorkshop (identifier)
VALUES 
('W1'),
('W2'),
('W3');

INSERT INTO Activity (room, start_time, end_time)
VALUES 
('B001', '2025-03-15 08:00:00', '2025-03-15 09:00:00'),
('B001', '2025-03-15 09:00:00', '2025-03-15 10:00:00'),
('Auditorium', '2025-03-15 16:30:00', '2025-03-15 17:30:00'),
('B317', '2025-03-15 14:30:00', '2025-03-15 16:00:00'),
('B105', '2025-03-15 17:00:00', '2025-03-15 18:00:00'),
('B018', '2025-03-15 09:00:00', '2025-03-15 10:00:00'),
('Coffee Lounge', '2025-03-15 10:00:00', '2025-03-15 10:30:00'),
('Coffee Lounge', '2025-03-15 16:00:00', '2025-03-15 16:30:00');


INSERT INTO Lecture (room, start_time, capacity, identifier) 
VALUES 
('Auditorium', '2025-03-15 16:30:00', 50, 'L1'),
('B001', '2025-03-15 08:00:00', 20, 'L2'),
('B001', '2025-03-15 09:00:00', 20, 'L3');

INSERT INTO CoffeeBreak (room, start_time, menu_id)
VALUES 
('Coffee Lounge', '2025-03-15 10:00:00', 1),
('Coffee Lounge', '2025-03-15 16:00:00', 2);

INSERT INTO Workshop (room, start_time, capacity, price, identifier) 
VALUES 
('B317', '2025-03-15 14:30:00', 15, 5, 'W1'),
('B105', '2025-03-15 17:00:00', 10, 10, 'W2'),
('B018', '2025-03-15 09:00:00', 15, 5, 'W3');
