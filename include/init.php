<?php
//----------------- BDD -------------------//
$bdd = new PDO('mysql:host=localhost;dbname=tchat2', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//----------------- SESSION -------------------//
session_start();

//---------------- CONSTANTE ------------------//
define("URL", "http://localhost/Tchat2/");