<?php
error_reporting(-1);
require_once 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Collections\ArrayCollection;
$path = array('src');
$devMode = true;

$config = Setup::createAnnotationMetadataConfiguration(
		$path, $devMode);

$dbParams = array(
		'driver'        => 'mysqli',
		'user'        => 'root',
		'password'    => '',
		'dbname'        => 'faker_db_doctrine',
		'host'        => 'localhost'
);

$entityManager = EntityManager::create($dbParams, $config);


/*

$generator = \Faker\Factory::create();

/* Give the Faker populator the EntityManager object from
 * Doctrine, as well as the Faker Generator
 */
// $populator = new Faker\ORM\Doctrine\Populator($generator, $em);

/* Make sure to use the fully qualified class name for
 * your Entity, in this case it's \App\Entity\User, and than
 * tell Faker just how many of those you want. Here, we're
 * making 5 users.
 */
//$populator->AddEntity('Book', 5);

//You can store the fake data, as well.
//$insertedFakeData = $populator->execute();
