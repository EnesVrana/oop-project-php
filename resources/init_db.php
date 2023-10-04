<?php

/*
 * SETTINGS!
 */
$databaseName = 'welcome';
$databaseUser = 'root';
$databasePassword = '';

/*
 * CREATE THE DATABASE
 */
$pdoDatabase = new PDO('mysql:host=localhost', $databaseUser, $databasePassword);
$pdoDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdoDatabase->exec('CREATE DATABASE IF NOT EXISTS welcome');

/*
 * CREATE THE TABLE
 */
$pdo = new PDO('mysql:host=localhost;dbname='.$databaseName, $databaseUser, $databasePassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// initialize the table
//$pdo->exec('DROP TABLE IF EXISTS user;');

$pdo->exec('CREATE TABLE IF NOT EXISTS `user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `firstName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
 `lastName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
 `birthday` date NOT NULL,
 `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
 `emailAddress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
 `password` (50) COLLATE utf8mb4_unicode_ci NOT NULL,
 `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

/*
 * INSERT SOME DATA!
 */
//$pdo->exec('INSERT INTO ship
//    (name, weapon_power, jedi_factor, strength, team) VALUES
//    ("Jedi Starfighter", 5, 15, 30, "rebel")'
//);
//$pdo->exec('INSERT INTO ship
//    (name, weapon_power, jedi_factor, strength, team) VALUES
//    ("CloakShape Fighter", 2, 2, 70, "rebel")'
//);
//$pdo->exec('INSERT INTO ship
//    (name, weapon_power, jedi_factor, strength, team) VALUES
//    ("Super Star Destroyer", 70, 0, 500, "empire")'
//);
//$pdo->exec('INSERT INTO ship
//    (name, weapon_power, jedi_factor, strength, team) VALUES
//    ("RZ-1 A-wing interceptor", 4, 4, 50, "empire")'
//);

echo "Ding!\n";
