DROP TABLE IF EXISTS weborderline;
DROP TABLE IF EXISTS weborder;
DROP TABLE IF EXISTS StockItemImage;
DROP TABLE IF EXISTS Image;
DROP TABLE IF EXISTS account_owner;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE account_owner (
owner_id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
first_name VARCHAR(45),
last_name VARCHAR(45),
city VARCHAR(45),
zip_code VARCHAR(45),
streetname VARCHAR(45),
house_number INT,
email_address VARCHAR(70),

PRIMARY KEY (owner_id),
FOREIGN KEY (user_id) REFERENCES users(id)
);


CREATE TABLE weborder (
    order_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    PRIMARY KEY (order_id),
	FOREIGN KEY (user_id) REFERENCES users(id)
    );
    

    CREATE TABLE weborderline (
    orderline_id INT NOT NULL AUTO_INCREMENT,
    order_id INT NOT NULL,
    stockitemid INT NOT NULL,
    quantity INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    PRIMARY KEY (orderline_id),
	FOREIGN KEY (order_id) REFERENCES weborder(order_id)
    );
    



CREATE TABLE Image(
PhotoID INT AUTO_INCREMENT PRIMARY KEY,
ImgPath VARCHAR(45)
);

CREATE TABLE StockItemImage(
StockItemID INT,
PhotoID INT,

PRIMARY KEY (StockItemID, PhotoID),
foreign key (StockItemID) REFERENCES stockitems(StockItemID),
foreign key (PhotoID) REFERENCES Image (PhotoID));



INSERT INTO image values (1, 'img/Furry_Footware/brown/1.jpg');
INSERT INTO image values (2, 'img/Furry_Footware/brown/2.jpg');
INSERT INTO image values (3, 'img/Furry_Footware/brown/3.jpg');
INSERT INTO stockitemimage VALUES (134, 1);
INSERT INTO stockitemimage VALUES (134, 2);
INSERT INTO stockitemimage VALUES (134, 3);
INSERT INTO stockitemimage VALUES (135, 1);
INSERT INTO stockitemimage VALUES (135, 2);
INSERT INTO stockitemimage VALUES (135, 3);
INSERT INTO stockitemimage VALUES (136, 1);
INSERT INTO stockitemimage VALUES (136, 2);
INSERT INTO stockitemimage VALUES (136, 3);
INSERT INTO stockitemimage VALUES (137, 1);
INSERT INTO stockitemimage VALUES (137, 2);
INSERT INTO stockitemimage VALUES (137, 3);

INSERT INTO image values (4, 'img/Furry_Footware/dinosaur/1.jpg');
INSERT INTO image values (5, 'img/Furry_Footware/dinosaur/2.jpg');
INSERT INTO image values (6, 'img/Furry_Footware/dinosaur/3.jpg');
INSERT INTO stockitemimage VALUES (118, 4);
INSERT INTO stockitemimage VALUES (118, 5);
INSERT INTO stockitemimage VALUES (118, 6);
INSERT INTO stockitemimage VALUES (119, 4);
INSERT INTO stockitemimage VALUES (119, 5);
INSERT INTO stockitemimage VALUES (119, 6);
INSERT INTO stockitemimage VALUES (120, 4);
INSERT INTO stockitemimage VALUES (120, 5);
INSERT INTO stockitemimage VALUES (120, 6);
INSERT INTO stockitemimage VALUES (121, 4);
INSERT INTO stockitemimage VALUES (121, 5);
INSERT INTO stockitemimage VALUES (121, 6);

INSERT INTO image values (7, 'img/Furry_Footware/Pink/1.jpg');
INSERT INTO image values (8, 'img/Furry_Footware/Pink/2.jpg');
INSERT INTO image values (9, 'img/Furry_Footware/Pink/3.jpg');
INSERT INTO stockitemimage VALUES (138, 7);
INSERT INTO stockitemimage VALUES (138, 8);
INSERT INTO stockitemimage VALUES (138, 9);
INSERT INTO stockitemimage VALUES (139, 7);
INSERT INTO stockitemimage VALUES (139, 8);
INSERT INTO stockitemimage VALUES (139, 9);
INSERT INTO stockitemimage VALUES (140, 7);
INSERT INTO stockitemimage VALUES (140, 8);
INSERT INTO stockitemimage VALUES (140, 9);
INSERT INTO stockitemimage VALUES (141, 7);
INSERT INTO stockitemimage VALUES (141, 8);
INSERT INTO stockitemimage VALUES (141, 9);

INSERT INTO image values (10, 'img/Furry_Footware/Shark/1.jpg');
INSERT INTO image values (11, 'img/Furry_Footware/Shark/2.jpg');
INSERT INTO image values (12, 'img/Furry_Footware/Shark/3.jpg');
INSERT INTO stockitemimage VALUES (126, 10);
INSERT INTO stockitemimage VALUES (126, 11);
INSERT INTO stockitemimage VALUES (126, 12);
INSERT INTO stockitemimage VALUES (127, 10);
INSERT INTO stockitemimage VALUES (127, 11);
INSERT INTO stockitemimage VALUES (127, 12);
INSERT INTO stockitemimage VALUES (128, 10);
INSERT INTO stockitemimage VALUES (128, 11);
INSERT INTO stockitemimage VALUES (128, 12);
INSERT INTO stockitemimage VALUES (129, 10);
INSERT INTO stockitemimage VALUES (129, 11);
INSERT INTO stockitemimage VALUES (129, 12);

INSERT INTO image values (13, 'img/Furry_Footware/Gorilla/1.jpg');
INSERT INTO image values (14, 'img/Furry_Footware/Gorilla/2.jpg');
INSERT INTO image values (15, 'img/Furry_Footware/Gorilla/3.jpg');
INSERT INTO stockitemimage VALUES (130, 13);
INSERT INTO stockitemimage VALUES (130, 14);
INSERT INTO stockitemimage VALUES (130, 15);
INSERT INTO stockitemimage VALUES (131, 13);
INSERT INTO stockitemimage VALUES (131, 14);
INSERT INTO stockitemimage VALUES (131, 15);
INSERT INTO stockitemimage VALUES (132, 13);
INSERT INTO stockitemimage VALUES (132, 14);
INSERT INTO stockitemimage VALUES (132, 15);
INSERT INTO stockitemimage VALUES (133, 13);
INSERT INTO stockitemimage VALUES (133, 14);
INSERT INTO stockitemimage VALUES (133, 15);

INSERT INTO image values (16, 'img/Furry_Footware/Ogre/1.jpg');
INSERT INTO image values (17, 'img/Furry_Footware/Ogre/2.jpg');
INSERT INTO image values (18, 'img/Furry_Footware/Ogre/3.jpg');
INSERT INTO stockitemimage VALUES (122, 16);
INSERT INTO stockitemimage VALUES (122, 17);
INSERT INTO stockitemimage VALUES (122, 18);
INSERT INTO stockitemimage VALUES (123, 16);
INSERT INTO stockitemimage VALUES (123, 17);
INSERT INTO stockitemimage VALUES (123, 18);
INSERT INTO stockitemimage VALUES (124, 16);
INSERT INTO stockitemimage VALUES (124, 17);
INSERT INTO stockitemimage VALUES (124, 18);
INSERT INTO stockitemimage VALUES (125, 16);
INSERT INTO stockitemimage VALUES (125, 17);
INSERT INTO stockitemimage VALUES (125, 18);

INSERT INTO image values (19, 'img/Clothing/Alien/1.jpg');
INSERT INTO image values (20, 'img/Clothing/Alien/2.jpg');
INSERT INTO image values (21, 'img/Clothing/Alien/3.jpg');
INSERT INTO stockitemimage VALUES (102, 19);
INSERT INTO stockitemimage VALUES (102, 20);
INSERT INTO stockitemimage VALUES (102, 21);
INSERT INTO stockitemimage VALUES (103, 19);
INSERT INTO stockitemimage VALUES (103, 20);
INSERT INTO stockitemimage VALUES (103, 21);
INSERT INTO stockitemimage VALUES (104, 19);
INSERT INTO stockitemimage VALUES (104, 20);
INSERT INTO stockitemimage VALUES (104, 21);
INSERT INTO stockitemimage VALUES (105, 19);
INSERT INTO stockitemimage VALUES (105, 20);
INSERT INTO stockitemimage VALUES (105, 21);
INSERT INTO stockitemimage VALUES (106, 19);
INSERT INTO stockitemimage VALUES (106, 20);
INSERT INTO stockitemimage VALUES (106, 21);

INSERT INTO image values (22, 'img/Clothing/Skull/1.jpg');
INSERT INTO image values (23, 'img/Clothing/Skull/2.jpg');
INSERT INTO image values (24, 'img/Clothing/Skull/3.jpg');
INSERT INTO stockitemimage VALUES (146, 22);
INSERT INTO stockitemimage VALUES (146, 23);
INSERT INTO stockitemimage VALUES (146, 24);
INSERT INTO stockitemimage VALUES (147, 22);
INSERT INTO stockitemimage VALUES (147, 23);
INSERT INTO stockitemimage VALUES (147, 24);
INSERT INTO stockitemimage VALUES (148, 22);
INSERT INTO stockitemimage VALUES (148, 23);
INSERT INTO stockitemimage VALUES (148, 24);
INSERT INTO stockitemimage VALUES (149, 22);
INSERT INTO stockitemimage VALUES (149, 23);
INSERT INTO stockitemimage VALUES (149, 24);

INSERT INTO image values (25, 'img/Clothing/Zombie/1.jpg');
INSERT INTO image values (26, 'img/Clothing/Zombie/2.jpg');
INSERT INTO image values (27, 'img/Clothing/Zombie/3.jpg');
INSERT INTO stockitemimage VALUES (142, 25);
INSERT INTO stockitemimage VALUES (142, 26);
INSERT INTO stockitemimage VALUES (142, 27);
INSERT INTO stockitemimage VALUES (143, 25);
INSERT INTO stockitemimage VALUES (143, 26);
INSERT INTO stockitemimage VALUES (143, 27);
INSERT INTO stockitemimage VALUES (144, 25);
INSERT INTO stockitemimage VALUES (144, 26);
INSERT INTO stockitemimage VALUES (144, 27);
INSERT INTO stockitemimage VALUES (145, 25);
INSERT INTO stockitemimage VALUES (145, 26);
INSERT INTO stockitemimage VALUES (145, 27);

INSERT INTO image values (28, 'img/Clothing/Action/1.jpg');
INSERT INTO image values (29, 'img/Clothing/Action/2.jpg');
INSERT INTO image values (30, 'img/Clothing/Action/3.jpg');
INSERT INTO stockitemimage VALUES (107, 28);
INSERT INTO stockitemimage VALUES (107, 29);
INSERT INTO stockitemimage VALUES (107, 30);
INSERT INTO stockitemimage VALUES (108, 28);
INSERT INTO stockitemimage VALUES (108, 29);
INSERT INTO stockitemimage VALUES (108, 30);
INSERT INTO stockitemimage VALUES (109, 28);
INSERT INTO stockitemimage VALUES (109, 29);
INSERT INTO stockitemimage VALUES (109, 30);
INSERT INTO stockitemimage VALUES (110, 28);
INSERT INTO stockitemimage VALUES (110, 29);
INSERT INTO stockitemimage VALUES (110, 30);
INSERT INTO stockitemimage VALUES (111, 28);
INSERT INTO stockitemimage VALUES (111, 29);
INSERT INTO stockitemimage VALUES (111, 30);
INSERT INTO stockitemimage VALUES (112, 28);
INSERT INTO stockitemimage VALUES (112, 29);
INSERT INTO stockitemimage VALUES (112, 30);
INSERT INTO stockitemimage VALUES (113, 28);
INSERT INTO stockitemimage VALUES (113, 29);
INSERT INTO stockitemimage VALUES (113, 30);
INSERT INTO stockitemimage VALUES (114, 28);
INSERT INTO stockitemimage VALUES (114, 29);
INSERT INTO stockitemimage VALUES (114, 30);
INSERT INTO stockitemimage VALUES (115, 28);
INSERT INTO stockitemimage VALUES (115, 29);
INSERT INTO stockitemimage VALUES (115, 30);
INSERT INTO stockitemimage VALUES (116, 28);
INSERT INTO stockitemimage VALUES (116, 29);
INSERT INTO stockitemimage VALUES (116, 30);
INSERT INTO stockitemimage VALUES (117, 28);
INSERT INTO stockitemimage VALUES (117, 29);
INSERT INTO stockitemimage VALUES (117, 30);

INSERT INTO image values (31, 'img/Computing_Novelties/Office/1.jpg');
INSERT INTO image values (32, 'img/Computing_Novelties/Office/2.jpg');
INSERT INTO stockitemimage VALUES (3, 31);
INSERT INTO stockitemimage VALUES (3, 32);

INSERT INTO image values (34, 'img/Mugs/Black/1.jpg');
INSERT INTO image values (35, 'img/Mugs/Black/2.jpg');
INSERT INTO image values (36, 'img/Mugs/Black/3.jpg');
INSERT INTO stockitemimage VALUES (17, 34);
INSERT INTO stockitemimage VALUES (17, 35);
INSERT INTO stockitemimage VALUES (17, 36);
INSERT INTO stockitemimage VALUES (19, 34);
INSERT INTO stockitemimage VALUES (19, 35);
INSERT INTO stockitemimage VALUES (19, 36);
INSERT INTO stockitemimage VALUES (21, 34);
INSERT INTO stockitemimage VALUES (21, 35);
INSERT INTO stockitemimage VALUES (21, 36);
INSERT INTO stockitemimage VALUES (23, 34);
INSERT INTO stockitemimage VALUES (23, 35);
INSERT INTO stockitemimage VALUES (23, 36);
INSERT INTO stockitemimage VALUES (25, 34);
INSERT INTO stockitemimage VALUES (25, 35);
INSERT INTO stockitemimage VALUES (25, 36);
INSERT INTO stockitemimage VALUES (27, 34);
INSERT INTO stockitemimage VALUES (27, 35);
INSERT INTO stockitemimage VALUES (27, 36);
INSERT INTO stockitemimage VALUES (29, 34);
INSERT INTO stockitemimage VALUES (29, 35);
INSERT INTO stockitemimage VALUES (29, 36);
INSERT INTO stockitemimage VALUES (31, 34);
INSERT INTO stockitemimage VALUES (31, 35);
INSERT INTO stockitemimage VALUES (31, 36);
INSERT INTO stockitemimage VALUES (33, 34);
INSERT INTO stockitemimage VALUES (33, 35);
INSERT INTO stockitemimage VALUES (33, 36);
INSERT INTO stockitemimage VALUES (35, 34);
INSERT INTO stockitemimage VALUES (35, 35);
INSERT INTO stockitemimage VALUES (35, 36);
INSERT INTO stockitemimage VALUES (37, 34);
INSERT INTO stockitemimage VALUES (37, 35);
INSERT INTO stockitemimage VALUES (37, 36);
INSERT INTO stockitemimage VALUES (39, 34);
INSERT INTO stockitemimage VALUES (39, 35);
INSERT INTO stockitemimage VALUES (39, 36);
INSERT INTO stockitemimage VALUES (41, 34);
INSERT INTO stockitemimage VALUES (41, 35);
INSERT INTO stockitemimage VALUES (41, 36);
INSERT INTO stockitemimage VALUES (43, 34);
INSERT INTO stockitemimage VALUES (43, 35);
INSERT INTO stockitemimage VALUES (43, 36);
INSERT INTO stockitemimage VALUES (45, 34);
INSERT INTO stockitemimage VALUES (45, 35);
INSERT INTO stockitemimage VALUES (45, 36);
INSERT INTO stockitemimage VALUES (47, 34);
INSERT INTO stockitemimage VALUES (47, 35);
INSERT INTO stockitemimage VALUES (47, 36);
INSERT INTO stockitemimage VALUES (49, 34);
INSERT INTO stockitemimage VALUES (49, 35);
INSERT INTO stockitemimage VALUES (49, 36);
INSERT INTO stockitemimage VALUES (51, 34);
INSERT INTO stockitemimage VALUES (51, 35);
INSERT INTO stockitemimage VALUES (51, 36);
INSERT INTO stockitemimage VALUES (53, 34);
INSERT INTO stockitemimage VALUES (53, 35);
INSERT INTO stockitemimage VALUES (53, 36);
INSERT INTO stockitemimage VALUES (55, 34);
INSERT INTO stockitemimage VALUES (55, 35);
INSERT INTO stockitemimage VALUES (55, 36);
INSERT INTO stockitemimage VALUES (57, 34);
INSERT INTO stockitemimage VALUES (57, 35);
INSERT INTO stockitemimage VALUES (57, 36);

INSERT INTO image values (37, 'img/Mugs/White/1.jpg');
INSERT INTO image values (38, 'img/Mugs/White/2.jpg');
INSERT INTO image values (39, 'img/Mugs/White/3.jpg');
INSERT INTO stockitemimage VALUES (16, 37);
INSERT INTO stockitemimage VALUES (16, 38);
INSERT INTO stockitemimage VALUES (16, 39);
INSERT INTO stockitemimage VALUES (18, 37);
INSERT INTO stockitemimage VALUES (18, 38);
INSERT INTO stockitemimage VALUES (18, 39);
INSERT INTO stockitemimage VALUES (20, 37);
INSERT INTO stockitemimage VALUES (20, 38);
INSERT INTO stockitemimage VALUES (20, 39);
INSERT INTO stockitemimage VALUES (22, 37);
INSERT INTO stockitemimage VALUES (22, 38);
INSERT INTO stockitemimage VALUES (22, 39);
INSERT INTO stockitemimage VALUES (24, 37);
INSERT INTO stockitemimage VALUES (24, 38);
INSERT INTO stockitemimage VALUES (24, 39);
INSERT INTO stockitemimage VALUES (26, 37);
INSERT INTO stockitemimage VALUES (26, 38);
INSERT INTO stockitemimage VALUES (26, 39);
INSERT INTO stockitemimage VALUES (28, 37);
INSERT INTO stockitemimage VALUES (28, 38);
INSERT INTO stockitemimage VALUES (28, 39);
INSERT INTO stockitemimage VALUES (30, 37);
INSERT INTO stockitemimage VALUES (30, 38);
INSERT INTO stockitemimage VALUES (30, 39);
INSERT INTO stockitemimage VALUES (32, 37);
INSERT INTO stockitemimage VALUES (32, 38);
INSERT INTO stockitemimage VALUES (32, 39);
INSERT INTO stockitemimage VALUES (34, 37);
INSERT INTO stockitemimage VALUES (34, 38);
INSERT INTO stockitemimage VALUES (34, 39);
INSERT INTO stockitemimage VALUES (36, 37);
INSERT INTO stockitemimage VALUES (36, 38);
INSERT INTO stockitemimage VALUES (36, 39);
INSERT INTO stockitemimage VALUES (38, 37);
INSERT INTO stockitemimage VALUES (38, 38);
INSERT INTO stockitemimage VALUES (38, 39);
INSERT INTO stockitemimage VALUES (40, 37);
INSERT INTO stockitemimage VALUES (40, 38);
INSERT INTO stockitemimage VALUES (40, 39);
INSERT INTO stockitemimage VALUES (42, 37);
INSERT INTO stockitemimage VALUES (42, 38);
INSERT INTO stockitemimage VALUES (42, 39);
INSERT INTO stockitemimage VALUES (44, 37);
INSERT INTO stockitemimage VALUES (44, 38);
INSERT INTO stockitemimage VALUES (44, 39);
INSERT INTO stockitemimage VALUES (46, 37);
INSERT INTO stockitemimage VALUES (46, 38);
INSERT INTO stockitemimage VALUES (46, 39);
INSERT INTO stockitemimage VALUES (48, 37);
INSERT INTO stockitemimage VALUES (48, 38);
INSERT INTO stockitemimage VALUES (48, 39);
INSERT INTO stockitemimage VALUES (50, 37);
INSERT INTO stockitemimage VALUES (50, 38);
INSERT INTO stockitemimage VALUES (50, 39);
INSERT INTO stockitemimage VALUES (52, 37);
INSERT INTO stockitemimage VALUES (52, 38);
INSERT INTO stockitemimage VALUES (52, 39);
INSERT INTO stockitemimage VALUES (54, 37);
INSERT INTO stockitemimage VALUES (54, 38);
INSERT INTO stockitemimage VALUES (54, 39);
INSERT INTO stockitemimage VALUES (56, 37);
INSERT INTO stockitemimage VALUES (56, 38);
INSERT INTO stockitemimage VALUES (56, 39);

INSERT INTO image values (40, 'img/Novelty_Items/echidnas/1.jpg');
INSERT INTO stockitemimage VALUES (222, 40);
INSERT INTO stockitemimage VALUES (223, 40);

INSERT INTO image values (41, 'img/Novelty_Items/Other/1.jpg');
INSERT INTO image values (42, 'img/Novelty_Items/Other/2.jpg');
INSERT INTO image values (43, 'img/Novelty_Items/Other/3.jpg');
INSERT INTO stockitemimage VALUES (220, 41);
INSERT INTO stockitemimage VALUES (220, 42);
INSERT INTO stockitemimage VALUES (220, 43);
INSERT INTO stockitemimage VALUES (221, 41);
INSERT INTO stockitemimage VALUES (221, 42);
INSERT INTO stockitemimage VALUES (221, 43);
INSERT INTO stockitemimage VALUES (224, 41);
INSERT INTO stockitemimage VALUES (224, 42);
INSERT INTO stockitemimage VALUES (224, 43);
INSERT INTO stockitemimage VALUES (225, 41);
INSERT INTO stockitemimage VALUES (225, 42);
INSERT INTO stockitemimage VALUES (225, 43);
INSERT INTO stockitemimage VALUES (226, 41);
INSERT INTO stockitemimage VALUES (226, 42);
INSERT INTO stockitemimage VALUES (226, 43);
INSERT INTO stockitemimage VALUES (227, 41);
INSERT INTO stockitemimage VALUES (227, 42);
INSERT INTO stockitemimage VALUES (227, 43);

INSERT INTO image values (44, 'img/Packaging_Materials/bubble/1.jpg');
INSERT INTO image values (45, 'img/Packaging_Materials/bubble/2.jpg');
INSERT INTO image values (46, 'img/Packaging_Materials/bubble/3.jpg');
INSERT INTO stockitemimage VALUES (153, 44);
INSERT INTO stockitemimage VALUES (153, 45);
INSERT INTO stockitemimage VALUES (153, 46);
INSERT INTO stockitemimage VALUES (154, 44);
INSERT INTO stockitemimage VALUES (154, 45);
INSERT INTO stockitemimage VALUES (154, 46);
INSERT INTO stockitemimage VALUES (155, 44);
INSERT INTO stockitemimage VALUES (155, 45);
INSERT INTO stockitemimage VALUES (155, 46);
INSERT INTO stockitemimage VALUES (156, 44);
INSERT INTO stockitemimage VALUES (156, 45);
INSERT INTO stockitemimage VALUES (156, 46);
INSERT INTO stockitemimage VALUES (157, 44);
INSERT INTO stockitemimage VALUES (157, 45);
INSERT INTO stockitemimage VALUES (157, 46);
INSERT INTO stockitemimage VALUES (158, 44);
INSERT INTO stockitemimage VALUES (158, 45);
INSERT INTO stockitemimage VALUES (158, 46);
INSERT INTO stockitemimage VALUES (159, 44);
INSERT INTO stockitemimage VALUES (159, 45);
INSERT INTO stockitemimage VALUES (159, 46);
INSERT INTO stockitemimage VALUES (160, 44);
INSERT INTO stockitemimage VALUES (160, 45);
INSERT INTO stockitemimage VALUES (160, 46);
INSERT INTO stockitemimage VALUES (161, 44);
INSERT INTO stockitemimage VALUES (161, 45);
INSERT INTO stockitemimage VALUES (161, 46);
INSERT INTO stockitemimage VALUES (162, 44);
INSERT INTO stockitemimage VALUES (162, 45);
INSERT INTO stockitemimage VALUES (162, 46);
INSERT INTO stockitemimage VALUES (163, 44);
INSERT INTO stockitemimage VALUES (163, 45);
INSERT INTO stockitemimage VALUES (163, 46);
INSERT INTO stockitemimage VALUES (164, 44);
INSERT INTO stockitemimage VALUES (164, 45);
INSERT INTO stockitemimage VALUES (164, 46);
INSERT INTO stockitemimage VALUES (165, 44);
INSERT INTO stockitemimage VALUES (165, 45);
INSERT INTO stockitemimage VALUES (165, 46);
INSERT INTO stockitemimage VALUES (166, 44);
INSERT INTO stockitemimage VALUES (166, 45);
INSERT INTO stockitemimage VALUES (166, 46);
INSERT INTO stockitemimage VALUES (167, 44);
INSERT INTO stockitemimage VALUES (167, 45);
INSERT INTO stockitemimage VALUES (167, 46);
INSERT INTO stockitemimage VALUES (168, 44);
INSERT INTO stockitemimage VALUES (168, 45);
INSERT INTO stockitemimage VALUES (168, 46);
INSERT INTO stockitemimage VALUES (169, 44);
INSERT INTO stockitemimage VALUES (169, 45);
INSERT INTO stockitemimage VALUES (169, 46);
INSERT INTO stockitemimage VALUES (170, 44);
INSERT INTO stockitemimage VALUES (170, 45);
INSERT INTO stockitemimage VALUES (170, 46);
INSERT INTO stockitemimage VALUES (171, 44);
INSERT INTO stockitemimage VALUES (171, 45);
INSERT INTO stockitemimage VALUES (171, 46);
INSERT INTO stockitemimage VALUES (172, 44);
INSERT INTO stockitemimage VALUES (172, 45);
INSERT INTO stockitemimage VALUES (172, 46);
INSERT INTO stockitemimage VALUES (173, 44);
INSERT INTO stockitemimage VALUES (173, 45);
INSERT INTO stockitemimage VALUES (173, 46);
INSERT INTO stockitemimage VALUES (174, 44);
INSERT INTO stockitemimage VALUES (174, 45);
INSERT INTO stockitemimage VALUES (174, 46);
INSERT INTO stockitemimage VALUES (175, 44);
INSERT INTO stockitemimage VALUES (175, 45);
INSERT INTO stockitemimage VALUES (175, 46);
INSERT INTO stockitemimage VALUES (176, 44);
INSERT INTO stockitemimage VALUES (176, 45);
INSERT INTO stockitemimage VALUES (176, 46);

INSERT INTO image values (47, 'img/Packaging_Materials/post/1.jpg');
INSERT INTO image values (48, 'img/Packaging_Materials/post/2.jpg');
INSERT INTO stockitemimage VALUES (187, 47);
INSERT INTO stockitemimage VALUES (187, 48);
INSERT INTO stockitemimage VALUES (188, 47);
INSERT INTO stockitemimage VALUES (188, 48);

INSERT INTO image values (49, 'img/Toys/Action/1.jpg');
INSERT INTO image values (50, 'img/Toys/Action/2.jpg');
INSERT INTO stockitemimage VALUES (150, 49);
INSERT INTO stockitemimage VALUES (150, 50);
INSERT INTO stockitemimage VALUES (151, 49);
INSERT INTO stockitemimage VALUES (151, 50);
INSERT INTO stockitemimage VALUES (152, 49);
INSERT INTO stockitemimage VALUES (152, 50);

INSERT INTO image values (51, 'img/Toys/RC/1.jpg');
INSERT INTO image values (52, 'img/Toys/RC/2.jpg');
INSERT INTO image values (53, 'img/Toys/RC/3.jpg');
INSERT INTO stockitemimage VALUES (58, 51);
INSERT INTO stockitemimage VALUES (58, 52);
INSERT INTO stockitemimage VALUES (58, 53);
INSERT INTO stockitemimage VALUES (59, 51);
INSERT INTO stockitemimage VALUES (59, 52);
INSERT INTO stockitemimage VALUES (59, 53);
INSERT INTO stockitemimage VALUES (60, 51);
INSERT INTO stockitemimage VALUES (60, 52);
INSERT INTO stockitemimage VALUES (60, 53);
INSERT INTO stockitemimage VALUES (61, 51);
INSERT INTO stockitemimage VALUES (61, 52);
INSERT INTO stockitemimage VALUES (61, 53);
INSERT INTO stockitemimage VALUES (62, 51);
INSERT INTO stockitemimage VALUES (62, 52);
INSERT INTO stockitemimage VALUES (62, 53);
INSERT INTO stockitemimage VALUES (63, 51);
INSERT INTO stockitemimage VALUES (63, 52);
INSERT INTO stockitemimage VALUES (63, 53);
INSERT INTO stockitemimage VALUES (64, 51);
INSERT INTO stockitemimage VALUES (64, 52);
INSERT INTO stockitemimage VALUES (64, 53);
INSERT INTO stockitemimage VALUES (65, 51);
INSERT INTO stockitemimage VALUES (65, 52);
INSERT INTO stockitemimage VALUES (65, 53);
INSERT INTO stockitemimage VALUES (66, 51);
INSERT INTO stockitemimage VALUES (66, 52);
INSERT INTO stockitemimage VALUES (66, 53);

INSERT INTO image values (54, 'img/T-Shirt/Red/1.jpg');
INSERT INTO image values (55, 'img/T-Shirt/Red/2.jpg');
INSERT INTO stockitemimage VALUES (89, 54);
INSERT INTO stockitemimage VALUES (89, 55);
INSERT INTO stockitemimage VALUES (90, 54);
INSERT INTO stockitemimage VALUES (90, 55);
INSERT INTO stockitemimage VALUES (91, 54);
INSERT INTO stockitemimage VALUES (91, 55);
INSERT INTO stockitemimage VALUES (92, 54);
INSERT INTO stockitemimage VALUES (92, 55);
INSERT INTO stockitemimage VALUES (93, 54);
INSERT INTO stockitemimage VALUES (93, 55);
INSERT INTO stockitemimage VALUES (94, 54);
INSERT INTO stockitemimage VALUES (94, 55);
INSERT INTO stockitemimage VALUES (95, 54);
INSERT INTO stockitemimage VALUES (95, 55);
INSERT INTO stockitemimage VALUES (96, 54);
INSERT INTO stockitemimage VALUES (96, 55);
INSERT INTO stockitemimage VALUES (97, 54);
INSERT INTO stockitemimage VALUES (97, 55);
INSERT INTO stockitemimage VALUES (98, 54);
INSERT INTO stockitemimage VALUES (98, 55);
INSERT INTO stockitemimage VALUES (99, 54);
INSERT INTO stockitemimage VALUES (99, 55);
INSERT INTO stockitemimage VALUES (100, 54);
INSERT INTO stockitemimage VALUES (100, 55);
INSERT INTO stockitemimage VALUES (101, 54);
INSERT INTO stockitemimage VALUES (101, 55);

INSERT INTO image values (56, 'img/T-Shirt/White/1.jpg');
INSERT INTO image values (57, 'img/T-Shirt/White/2.jpg');
INSERT INTO stockitemimage VALUES (76, 56);
INSERT INTO stockitemimage VALUES (76, 57);
INSERT INTO stockitemimage VALUES (77, 56);
INSERT INTO stockitemimage VALUES (77, 57);
INSERT INTO stockitemimage VALUES (78, 56);
INSERT INTO stockitemimage VALUES (78, 57);
INSERT INTO stockitemimage VALUES (79, 56);
INSERT INTO stockitemimage VALUES (79, 57);
INSERT INTO stockitemimage VALUES (80, 56);
INSERT INTO stockitemimage VALUES (80, 57);
INSERT INTO stockitemimage VALUES (81, 56);
INSERT INTO stockitemimage VALUES (81, 57);
INSERT INTO stockitemimage VALUES (82, 56);
INSERT INTO stockitemimage VALUES (82, 57);
INSERT INTO stockitemimage VALUES (83, 56);
INSERT INTO stockitemimage VALUES (83, 57);
INSERT INTO stockitemimage VALUES (84, 56);
INSERT INTO stockitemimage VALUES (84, 57);
INSERT INTO stockitemimage VALUES (85, 56);
INSERT INTO stockitemimage VALUES (85, 57);
INSERT INTO stockitemimage VALUES (86, 56);
INSERT INTO stockitemimage VALUES (86, 57);
INSERT INTO stockitemimage VALUES (87, 56);
INSERT INTO stockitemimage VALUES (87, 57);
INSERT INTO stockitemimage VALUES (88, 56);
INSERT INTO stockitemimage VALUES (88, 57);

INSERT INTO image values (63, 'img/USB_Novelties/Other/1.jpg');
INSERT INTO image values (58, 'img/USB_Novelties/Other/2.jpg');
INSERT INTO image values (59, 'img/USB_Novelties/Other/3.jpg');
INSERT INTO stockitemimage VALUES (4, 63);
INSERT INTO stockitemimage VALUES (4, 58);
INSERT INTO stockitemimage VALUES (4, 59);
INSERT INTO stockitemimage VALUES (5, 63);
INSERT INTO stockitemimage VALUES (5, 58);
INSERT INTO stockitemimage VALUES (5, 59);
INSERT INTO stockitemimage VALUES (6, 63);
INSERT INTO stockitemimage VALUES (6, 58);
INSERT INTO stockitemimage VALUES (6, 59);
INSERT INTO stockitemimage VALUES (7, 63);
INSERT INTO stockitemimage VALUES (7, 58);
INSERT INTO stockitemimage VALUES (7, 59);
INSERT INTO stockitemimage VALUES (8, 63);
INSERT INTO stockitemimage VALUES (8, 58);
INSERT INTO stockitemimage VALUES (8, 59);
INSERT INTO stockitemimage VALUES (9, 63);
INSERT INTO stockitemimage VALUES (9, 58);
INSERT INTO stockitemimage VALUES (9, 59);
INSERT INTO stockitemimage VALUES (10, 63);
INSERT INTO stockitemimage VALUES (10, 58);
INSERT INTO stockitemimage VALUES (10, 59);
INSERT INTO stockitemimage VALUES (11, 63);
INSERT INTO stockitemimage VALUES (11, 58);
INSERT INTO stockitemimage VALUES (11, 59);
INSERT INTO stockitemimage VALUES (12, 63);
INSERT INTO stockitemimage VALUES (12, 58);
INSERT INTO stockitemimage VALUES (12, 59);
INSERT INTO stockitemimage VALUES (13, 63);
INSERT INTO stockitemimage VALUES (13, 58);
INSERT INTO stockitemimage VALUES (13, 59);
INSERT INTO stockitemimage VALUES (14, 63);
INSERT INTO stockitemimage VALUES (14, 58);
INSERT INTO stockitemimage VALUES (14, 59);
INSERT INTO stockitemimage VALUES (15, 63);
INSERT INTO stockitemimage VALUES (15, 58);
INSERT INTO stockitemimage VALUES (15, 59);

INSERT INTO image values (60, 'img/USB_Novelties/Missile/1.jpg');
INSERT INTO image values (61, 'img/USB_Novelties/Missile/2.jpg');
INSERT INTO image values (62, 'img/USB_Novelties/Missile/3.jpg');
INSERT INTO stockitemimage VALUES (1, 60);
INSERT INTO stockitemimage VALUES (1, 61);
INSERT INTO stockitemimage VALUES (1, 62);
INSERT INTO stockitemimage VALUES (2, 60);
INSERT INTO stockitemimage VALUES (2, 61);
INSERT INTO stockitemimage VALUES (2, 62);

INSERT INTO image values (64, 'img/1.jpg');
INSERT INTO stockitemimage VALUES (67, 64);
INSERT INTO stockitemimage VALUES (68, 64);
INSERT INTO stockitemimage VALUES (69, 64);
INSERT INTO stockitemimage VALUES (70, 64);
INSERT INTO stockitemimage VALUES (71, 64);
INSERT INTO stockitemimage VALUES (72, 64);
INSERT INTO stockitemimage VALUES (73, 64);
INSERT INTO stockitemimage VALUES (74, 64);
INSERT INTO stockitemimage VALUES (75, 64);
INSERT INTO stockitemimage VALUES (177, 64);
INSERT INTO stockitemimage VALUES (178, 64);
INSERT INTO stockitemimage VALUES (179, 64);
INSERT INTO stockitemimage VALUES (180, 64);
INSERT INTO stockitemimage VALUES (181, 64);
INSERT INTO stockitemimage VALUES (182, 64);
INSERT INTO stockitemimage VALUES (183, 64);
INSERT INTO stockitemimage VALUES (184, 64);
INSERT INTO stockitemimage VALUES (185, 64);
INSERT INTO stockitemimage VALUES (186, 64);
INSERT INTO stockitemimage VALUES (187, 64);
INSERT INTO stockitemimage VALUES (188, 64);
INSERT INTO stockitemimage VALUES (189, 64);
INSERT INTO stockitemimage VALUES (190, 64);
INSERT INTO stockitemimage VALUES (191, 64);
INSERT INTO stockitemimage VALUES (192, 64);
INSERT INTO stockitemimage VALUES (193, 64);
INSERT INTO stockitemimage VALUES (194, 64);
INSERT INTO stockitemimage VALUES (195, 64);
INSERT INTO stockitemimage VALUES (196, 64);
INSERT INTO stockitemimage VALUES (197, 64);
INSERT INTO stockitemimage VALUES (198, 64);
INSERT INTO stockitemimage VALUES (199, 64);
INSERT INTO stockitemimage VALUES (200, 64);
INSERT INTO stockitemimage VALUES (201, 64);
INSERT INTO stockitemimage VALUES (202, 64);
INSERT INTO stockitemimage VALUES (203, 64);
INSERT INTO stockitemimage VALUES (204, 64);
INSERT INTO stockitemimage VALUES (205, 64);
INSERT INTO stockitemimage VALUES (206, 64);
INSERT INTO stockitemimage VALUES (207, 64);
INSERT INTO stockitemimage VALUES (208, 64);
INSERT INTO stockitemimage VALUES (209, 64);
INSERT INTO stockitemimage VALUES (210, 64);
INSERT INTO stockitemimage VALUES (211, 64);
INSERT INTO stockitemimage VALUES (212, 64);
INSERT INTO stockitemimage VALUES (213, 64);
INSERT INTO stockitemimage VALUES (214, 64);
INSERT INTO stockitemimage VALUES (215, 64);
INSERT INTO stockitemimage VALUES (216, 64);
INSERT INTO stockitemimage VALUES (217, 64);
INSERT INTO stockitemimage VALUES (218, 64);
INSERT INTO stockitemimage VALUES (219, 64);
