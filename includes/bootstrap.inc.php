<?php
/**
 * Bootstrap file.
 * File must be included in every file. It initiates the database and includes some necessary files.
 *
 * @package    NatuurkundeProject
 * @author     Rick Bakker <rickb@kker.net>
 * @copyright  2015 Rick Bakker
 */

require_once 'configuration.inc.php';

try {
    $db = new PDO('mysql:dbname=' . $config['db']['dbase'] . ';host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass']);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	exit();
}

require_once __DIR__ . '/classes/template.class.php';
require_once __DIR__ . '/classes/hash.class.php';