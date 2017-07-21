<?php

require_once('autoload.php');
require_once('config.php');

$worker= new GearmanWorker();
$worker->addServer();
if(!empty($config)){
	foreach($config as $function=>$class){
		$worker->addFunction($function,$class);
		print 'Registered Functions:: '. $class.PHP_EOL;
	}

}
while($worker->work())
{
  if ($worker->returnCode() != GEARMAN_SUCCESS)
  {
    echo "return_code: " . $gmworker->returnCode() . "\n";
    break;
  }
}


?>
