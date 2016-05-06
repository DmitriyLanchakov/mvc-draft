SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `BalconyType` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `BalconyType` (`id`, `title`) VALUES
(1, 'Балкон'),
(2, 'Лоджия');

CREATE TABLE `BathroomType` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `BathroomType` (`id`, `title`) VALUES
(1, 'Раздельный'),
(2, 'Совмещённый');

CREATE TABLE `CommunicationType` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `CommunicationType` (`id`, `title`) VALUES
(1, 'Электричество'),
(2, 'Интернет'),
(3, 'Горячая вода'),
(4, 'Холодная вода'),
(5, 'Канализация'),
(6, 'Газ'),
(7, 'Центральное отопление'),
(8, 'Сигнализация'),
(9, 'Телефон');

CREATE TABLE `Farm` (
  `id` int(11) NOT NULL,
  `farm_type_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `area` int(11) NOT NULL,
  `buildings` text NOT NULL,
  `transport_accessibility` varchar(300) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Farm` (`id`, `farm_type_id`, `address`, `area`, `buildings`, `transport_accessibility`, `cost`) VALUES
(1, 1, 'Ленина', 22222, 'Баня', '1 км от дороги', 222222),
(2, 1, 'Красная 8', 100, 'Баня', 'Пешком', 1000000),
(3, 2, 'Линава 8', 10000, 'Сарай', '1 км от дороги', 100000),
(4, 1, 'Кирова 929292', 22222, 'Сарай', '4444 м', 1000000);

CREATE TABLE `FarmCommunicationType` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `communication_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FarmCommunicationType` (`id`, `farm_id`, `communication_type_id`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 5),
(4, 3, 6),
(5, 4, 1);

CREATE TABLE `FarmImage` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FarmImage` (`id`, `farm_id`, `image_id`) VALUES
(1, 1, 5),
(2, 2, 8),
(3, 3, 9),
(4, 4, 10);

CREATE TABLE `FarmType` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FarmType` (`id`, `title`) VALUES
(1, 'Земледелие'),
(2, 'Животноводство');

CREATE TABLE `Flat` (
  `id` int(11) NOT NULL,
  `gross_area` int(11) NOT NULL,
  `kitchen_area` int(11) NOT NULL,
  `room_amount` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `floor_amount` int(11) DEFAULT NULL,
  `address` varchar(300) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Flat` (`id`, `gross_area`, `kitchen_area`, `room_amount`, `floor`, `floor_amount`, `address`, `cost`) VALUES
(1, 100, 20, 2, 1, 5, 'Кирова 929292', 444444),
(2, 50000, 500, 3, 2, 7, 'Ленина', 1555555),
(3, 555555, 222, 2, 1, 5, 'Петрова', 1000000);

CREATE TABLE `FlatBalconyType` (
  `id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `balcony_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FlatBalconyType` (`id`, `flat_id`, `balcony_type_id`, `amount`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 1),
(4, 2, 2, 1),
(5, 3, 1, 1),
(6, 3, 2, 1);

CREATE TABLE `FlatBathroomType` (
  `id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `bathroom_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FlatBathroomType` (`id`, `flat_id`, `bathroom_type_id`, `amount`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 1, 2),
(4, 2, 2, 1),
(5, 3, 1, 2),
(6, 3, 2, 1);

CREATE TABLE `FlatImage` (
  `id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FlatImage` (`id`, `flat_id`, `image_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 6);

CREATE TABLE `House` (
  `id` int(11) NOT NULL,
  `gross_area` int(11) NOT NULL,
  `kitchen_area` int(11) NOT NULL,
  `room_amount` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `land_area` int(11) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `House` (`id`, `gross_area`, `kitchen_area`, `room_amount`, `address`, `land_area`, `cost`) VALUES
(1, 10000, 200, 2, 'Куницина 120101', 9996, 1000),
(2, 300, 2, 2, 'Жукрова 4', 100000, 10000000),
(3, 1000, 122, 1, 'Кирова 2', 1, 44444444),
(4, 1100, 122, 1, 'Жукрова 2', 1, 44444444),
(5, 11000, 12, 1, 'Жукрова 3', 1, 44444444),
(6, 10110, 1234, 1234, 'Жукрова 3', 14, 2222),
(7, 5, 2, 1, 'Жукрова 4', 1, 1111111),
(8, 777, 77, 2, '1235', 0, 2222222),
(9, 1, 1, 1, '12431', 1, 1111111111),
(10, 444, 44, 22, '11', 33333, 3333333),
(11, 888, 22, 2, 'Кулева 2', 442, 222222);

CREATE TABLE `HouseBalconyType` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `balcony_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `HouseBathroomType` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `bathroom_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `HouseBathroomType` (`id`, `house_id`, `bathroom_type_id`, `amount`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 2, 1, 1),
(4, 2, 2, 1),
(5, 3, 1, 1),
(6, 3, 2, 1),
(7, 4, 1, 1),
(8, 4, 2, 1),
(9, 5, 1, 1),
(10, 5, 2, 1),
(11, 6, 1, 111),
(12, 6, 2, 222),
(13, 7, 1, 11),
(14, 7, 2, 11),
(15, 8, 1, 1),
(16, 8, 2, 1),
(17, 9, 1, 1),
(18, 9, 2, 1),
(19, 10, 1, 1),
(20, 10, 2, 1),
(21, 11, 1, 2),
(22, 11, 2, 1);

CREATE TABLE `HouseCommunicationType` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `communication_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `HouseCommunicationType` (`id`, `house_id`, `communication_type_id`) VALUES
(1, 1, 2),
(2, 2, 4),
(3, 2, 5),
(4, 3, 5),
(5, 4, 5),
(6, 5, 5),
(7, 6, 2),
(8, 7, 7),
(9, 8, 8),
(10, 8, 9),
(11, 9, 1),
(12, 10, 2),
(13, 11, 7),
(14, 11, 8);

CREATE TABLE `HouseFloorArea` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `area` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `HouseFloorArea` (`id`, `house_id`, `number`, `area`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 20),
(3, 2, 1, 100),
(4, 2, 2, 200),
(5, 3, 1, 1),
(6, 4, 1, 1),
(7, 5, 1, 1),
(8, 6, 1, 1243),
(9, 7, 1, 5),
(10, 8, 1, 1),
(11, 9, 1, 1),
(12, 10, 1, 22),
(13, 10, 2, 2),
(14, 11, 1, 800),
(15, 11, 2, 88);

CREATE TABLE `HouseImage` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `HouseImage` (`id`, `house_id`, `image_id`) VALUES
(1, 10, 19),
(2, 11, 20);

CREATE TABLE `Image` (
  `id` int(11) NOT NULL,
  `src` varchar(300) NOT NULL,
  `title` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Image` (`id`, `src`, `title`) VALUES
(1, './upload/1.jpg', ''),
(2, './upload/2.jpg', ''),
(3, './upload/3.jpg', ''),
(4, './upload/4.jpg', ''),
(5, './upload/5.jpg', ''),
(6, './upload/6.jpg', ''),
(7, './upload/7.jpg', ''),
(8, './upload/8.jpg', ''),
(9, './upload/9.jpg', ''),
(10, './upload/10.jpg', ''),
(11, './upload/11.jpg', ''),
(12, './upload/12.jpg', ''),
(13, './upload/13.jpg', ''),
(14, './upload/14.jpg', ''),
(15, './upload/15.jpg', ''),
(16, './upload/16.jpg', ''),
(17, './upload/17.jpg', ''),
(18, './upload/18.jpg', ''),
(19, './upload/19.jpg', ''),
(20, './upload/20.jpg', '');


ALTER TABLE `BalconyType`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `BathroomType`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `CommunicationType`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Farm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm__to__farm_type` (`farm_type_id`);

ALTER TABLE `FarmCommunicationType`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `farm_id__communication_type_id__unique` (`farm_id`,`communication_type_id`) USING BTREE,
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `communication_type_id` (`communication_type_id`) USING BTREE;

ALTER TABLE `FarmImage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_image__to__farm` (`farm_id`),
  ADD KEY `farm_image__to__image` (`image_id`);

ALTER TABLE `FarmType`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Flat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `FlatBalconyType`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flat_id` (`flat_id`),
  ADD KEY `balcony_type_id` (`balcony_type_id`);

ALTER TABLE `FlatBathroomType`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flat_id` (`flat_id`),
  ADD KEY `bathroom_type_id` (`bathroom_type_id`);

ALTER TABLE `FlatImage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flat_image__to__flat` (`flat_id`),
  ADD KEY `flat_image__to__image` (`image_id`);

ALTER TABLE `House`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `HouseBalconyType`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balcony_type_id` (`balcony_type_id`) USING BTREE,
  ADD KEY `house_id` (`house_id`);

ALTER TABLE `HouseBathroomType`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_bathrom_type__to__bathroom_type` (`bathroom_type_id`),
  ADD KEY `house_bathrom_type__to__house` (`house_id`);

ALTER TABLE `HouseCommunicationType`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_communication_type__to__communication_type` (`communication_type_id`),
  ADD KEY `house_communication_type__to__house` (`house_id`);

ALTER TABLE `HouseFloorArea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_floor_area__to__house` (`house_id`);

ALTER TABLE `HouseImage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_image__to__house` (`house_id`),
  ADD KEY `house_image__to__image` (`image_id`);

ALTER TABLE `Image`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `BalconyType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `BathroomType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `CommunicationType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `Farm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `FarmCommunicationType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `FarmImage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `FarmType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `Flat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `FlatBalconyType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `FlatBathroomType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `FlatImage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `House`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `HouseBalconyType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `HouseBathroomType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `HouseCommunicationType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `HouseFloorArea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `HouseImage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `Image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;


ALTER TABLE `Farm`
  ADD CONSTRAINT `farm__to__farm_type` FOREIGN KEY (`farm_type_id`) REFERENCES `FarmType` (`id`) ON DELETE CASCADE;

ALTER TABLE `FarmCommunicationType`
  ADD CONSTRAINT `farm_communication_type__to__communication_type` FOREIGN KEY (`communication_type_id`) REFERENCES `CommunicationType` (`id`) ON DELETE CASCADE;

ALTER TABLE `FarmImage`
  ADD CONSTRAINT `farm_image__to__farm` FOREIGN KEY (`farm_id`) REFERENCES `Farm` (`id`),
  ADD CONSTRAINT `farm_image__to__image` FOREIGN KEY (`image_id`) REFERENCES `Image` (`id`);

ALTER TABLE `FlatBalconyType`
  ADD CONSTRAINT `flat_balcony_type__to__balcony_type` FOREIGN KEY (`balcony_type_id`) REFERENCES `BalconyType` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flat_balcony_type__to__flat` FOREIGN KEY (`flat_id`) REFERENCES `Flat` (`id`) ON DELETE CASCADE;

ALTER TABLE `FlatBathroomType`
  ADD CONSTRAINT `flat_bathrom_type__to__bathroom_type` FOREIGN KEY (`bathroom_type_id`) REFERENCES `BathroomType` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flat_bathrom_type__to__flat` FOREIGN KEY (`flat_id`) REFERENCES `Flat` (`id`) ON DELETE CASCADE;

ALTER TABLE `FlatImage`
  ADD CONSTRAINT `flat_image__to__flat` FOREIGN KEY (`flat_id`) REFERENCES `Flat` (`id`),
  ADD CONSTRAINT `flat_image__to__image` FOREIGN KEY (`image_id`) REFERENCES `Image` (`id`);

ALTER TABLE `HouseBalconyType`
  ADD CONSTRAINT `house_balcony_type__to__balcony_type` FOREIGN KEY (`balcony_type_id`) REFERENCES `BalconyType` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `house_balcony_type__to__house` FOREIGN KEY (`house_id`) REFERENCES `House` (`id`) ON DELETE CASCADE;

ALTER TABLE `HouseBathroomType`
  ADD CONSTRAINT `house_bathrom_type__to__bathroom_type` FOREIGN KEY (`bathroom_type_id`) REFERENCES `BathroomType` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `house_bathrom_type__to__house` FOREIGN KEY (`house_id`) REFERENCES `House` (`id`) ON DELETE CASCADE;

ALTER TABLE `HouseCommunicationType`
  ADD CONSTRAINT `house_communication_type__to__communication_type` FOREIGN KEY (`communication_type_id`) REFERENCES `CommunicationType` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `house_communication_type__to__house` FOREIGN KEY (`house_id`) REFERENCES `House` (`id`) ON DELETE CASCADE;

ALTER TABLE `HouseFloorArea`
  ADD CONSTRAINT `house_floor_area__to__house` FOREIGN KEY (`house_id`) REFERENCES `House` (`id`) ON DELETE CASCADE;

ALTER TABLE `HouseImage`
  ADD CONSTRAINT `house_image__to__house` FOREIGN KEY (`house_id`) REFERENCES `House` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `house_image__to__image` FOREIGN KEY (`image_id`) REFERENCES `Image` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
