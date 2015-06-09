<?php
/**
 * Short file used to generate the hashed strings. (Ex. passwords)
 *
 * @package    NatuurkundeProject
 * @author     Rick Bakker <rickb@kker.net>
 * @copyright  2015 Rick Bakker
 */

require_once 'includes/bootstrap.inc.php';

if(isset($_GET['unhashed'])) {
	echo Hash::make($_GET['unhashed']);
}else{
	echo '\'unhashed\' parameter missing...';
}