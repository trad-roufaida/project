<?php
$db = mysqli_connect('localhost', 'root', '', 'memoire');
if (!$db) {
  die("echec de connectiona la base de données".mysqli_error($db));
}

/*
define("DB_HOST", "localhost");
define("DB_NAME", "memoire");
// define("DB_NAME", "id6507755_projet");
define("DB_SERVER", "mysql:host=".DB_HOST.";dbname=".DB_NAME."; charset=utf8"); 
// define("DB_USER", "id6507755_projetuser");
//  define("DB_PASS", "5328954");
define("DB_USER", "root");
 define("DB_PASS", "");



session_start();


/**
 * function responsable de nous connecté a la BDD en PDO
 * @return PDO
 */
/*function db_connect()
{

    try {
        $db = new PDO (DB_SERVER, DB_USER, DB_PASS );
        return $db;
// connection successful
    } catch (Exception $error) {
        die("Connection failed: " . $error->getMessage());
    }


}

;*/?>