-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: mero_diet_planner
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text,
  `image` varchar(255) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'My First Blog Post','blog-post-1.jpg','2023-04-28','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis purus at semper auctor. Phasellus ac est sed ex rutrum convallis sed quis lacus. Donec eget ipsum sed nisl fermentum blandit in a velit. Proin eu augue dapibus, placerat tellus sed, euismod tellus. Sed sed nunc et diam convallis feugiat vitae vel justo.'),(2,'10 Tips for Better Sleep','blog-post-2.jpg','2023-04-30','Are you struggling to get a good night\'s sleep? Here are 10 tips to help you sleep better: 1. Stick to a regular sleep schedule. 2. Create a relaxing bedtime routine. 3. Make sure your bedroom is comfortable and quiet. 4. Avoid caffeine and alcohol before bedtime. 5. Limit screen time before bed. 6. Exercise regularly. 7. Eat a healthy diet. 8. Manage stress levels. 9. Consider natural sleep aids. 10. Consult with your doctor if you have persistent sleep problems.'),(3,'How to Build a Successful Career in Tech','blog-post-3.jpg','2023-05-01','Are you interested in building a successful career in the tech industry? Here are some tips to help you get started: 1. Develop technical skills through education and training. 2. Gain practical experience through internships and projects. 3. Build a professional network through networking events and online communities. 4. Stay up-to-date with industry trends and news. 5. Consider pursuing specialized certifications. 6. Cultivate soft skills such as communication and teamwork. 7. Find a mentor or coach to guide you. 8. Be open to learning and adapting to change. 9. Seek out opportunities for leadership and responsibility. 10. Stay passionate and motivated about your work! '),(4,'The Importance of Regular Exercise','https://www.example.com/images/exercise.jpg','2022-04-23','Regular exercise has numerous health benefits, including reducing the risk of chronic diseases, improving mood and mental health, and increasing overall fitness.'),(5,'How to Cook the Perfect Steak','https://www.example.com/images/steak.jpg','2022-04-20','Cooking a steak to perfection requires attention to detail, including selecting the right cut, seasoning properly, and cooking to the desired temperature.'),(6,'The Benefits of Meditation','https://www.example.com/images/meditation.jpg','2022-04-18','Meditation can help reduce stress, improve focus and concentration, and promote overall well-being.'),(7,'10 Simple Ways to Reduce Your Carbon Footprint','https://www.example.com/images/carbon_footprint.jpg','2022-04-15','Reducing your carbon footprint can have a significant impact on the environment. Some simple ways to reduce your carbon footprint include driving less, eating a plant-based diet, and reducing energy consumption.'),(8,'The Benefits of Reading','https://www.example.com/images/reading.jpg','2022-04-12','Reading has numerous benefits, including improving cognitive function, reducing stress, and expanding knowledge and vocabulary.'),(9,'The Importance of Sleep for Health and Well-Being','https://www.example.com/images/sleep.jpg','2022-04-09','Getting enough quality sleep is crucial for overall health and well-being, including reducing the risk of chronic diseases, improving mental health, and enhancing physical performance.'),(10,'10 Simple Tips for Improving Your Mental Health','https://www.example.com/images/mental_health.jpg','2022-04-06','Improving mental health can involve simple lifestyle changes, such as practicing mindfulness, getting regular exercise, and socializing with friends and family.'),(11,'How to Start a Successful Blog','https://www.example.com/images/blogging.jpg','2022-04-03','Starting a successful blog requires a combination of skills, including writing, marketing, and web design. However, with dedication and hard work, it is possible to create a successful blog.'),(12,'The Benefits of Yoga','https://www.example.com/images/yoga.jpg','2022-03-31','Yoga has numerous physical and mental health benefits, including improving flexibility, reducing stress, and promoting relaxation and mindfulness.'),(13,'The Top 10 Destinations for Adventure Travel','https://www.example.com/images/adventure_travel.jpg','2022-03-28','For adventure seekers, there are numerous exciting travel destinations to choose from, including hiking in the Rocky Mountains, surfing in Bali, and bungee jumping in New Zealand.'),(14,'10 Tips for Eating a Healthy Diet on a Budget','https://www.example.com/images/healthy_food.jpg','2022-03-25','Eating a healthy diet can be expensive, but there are ways to save money while still eating nutritious foods. Some tips include buying in bulk, meal planning, and cooking at home.'),(15,'The Importance of Goal Setting for Personal and Professional Success','https://www.example.com/images/goal_setting.jpg','2022-03-22','Setting goals can help improve motivation, productivity, and overall success, both in personal and professional endeavors.');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diet_plan`
--

DROP TABLE IF EXISTS `diet_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diet_plan` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `food_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `diet_plan_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diet_plan`
--

LOCK TABLES `diet_plan` WRITE;
/*!40000 ALTER TABLE `diet_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `diet_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `food` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_status` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'rajan','dotel','rajandotel@gmail.com','$2y$10$rVhH.WgfuaoqYDOC8FJuoODInO0IZ37c9Mxn05OdEi66UmRdDaS9e',0),(2,'Anil','Maharjan','anil@gmail.com','$2y$10$rVhH.WgfuaoqYDOC8FJuoODInO0IZ37c9Mxn05OdEi66UmRdDaS9e',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-27  7:29:07
