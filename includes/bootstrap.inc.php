<?php

require_once 'configuration.inc.php';

try {
    $db = new PDO('mysql:dbname=' . $config['db']['dbase'] . ';host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass']);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	exit();
}

require_once __DIR__ . '/classes/template.class.php';