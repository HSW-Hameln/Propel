<?php
// setup the autoloading
require_once 'vendor/autoload.php';
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('konditorei'/* Projektname */, 'mysql');
$manager = new ConnectionManagerSingle();
$manager->setConfiguration(array (
    'dsn'      => 'mysql:host=localhost;dbname=konditorei',
    'user'     => 'root',
    'password' => '',
));
$serviceContainer->setConnectionManager('konditorei', $manager);

$meinKuchen = new Kuchen();
$meinKuchen->setName("Schwarzwaelderkirschtorte");
$meinKuchen->setArt("Torte");
$meinKuchen->save();


$kuchenSollgeladenwerden = new KuchenQuery();
$kuchen = $kuchenSollgeladenwerden->findByName("*");

foreach($kuchen as $k){
    echo($k->getName()."\n");
}
