<?php

$client= new GearmanClient();
$client->addServer();
$result = $client->do("sendMail", 'sfsf');



do
{
var_dump($client->returnCode());
switch($client->returnCode())
  {
    case GEARMAN_WORK_DATA:
      echo "Data: $result\n";
      break;
    case GEARMAN_WORK_STATUS:
      list($numerator, $denominator)= $client->doStatus();
      echo "Status: $numerator/$denominator complete\n";
      break;
    case GEARMAN_WORK_FAIL:
      echo "Failed\n";
      exit;
    case GEARMAN_SUCCESS:
      break;
    default:
      echo "RET: " . $client->returnCode() . "\n";
      echo "Error: " . $client->error() . "\n";
      echo "Errno: " . $client->getErrno() . "\n";
      exit;
  }
}
while($client->returnCode() != GEARMAN_SUCCESS);

echo "Success: $result\n";

var_dump($result);
?>
