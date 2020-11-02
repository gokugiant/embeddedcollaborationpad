<?php
/**
 * A complete login script with registration and members area.
 *
 * @author: Nils Reimers / http://www.php-einfach.de/experte/php-codebeispiele/loginscript/
 * @license: GNU GPLv3
 */
 
//Tragt hier eure Verbindungsdaten zur Datenbank ein
$db_host = 'embedded.hrw-fablab.de';
$db_name = 'embedded';
$db_user = 'embedded';
$db_password = '2lC*r74k';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);