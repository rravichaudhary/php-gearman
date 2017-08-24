<?php

Class Mails{	
 public static function sendMail($job=NULL){
		  $workload = $job->workload();
		  $workload_size = $job->workloadSize();

		  echo "Workload: $workload ($workload_size)\n";

		  # This status loop is not needed, just showing how it works
		  for ($x= 0; $x < $workload_size; $x++)
		  {
			echo "Sending status: " + $x + 1 . "/$workload_size complete\n";
			$job->sendStatus($x+1, $workload_size);
			$job->sendData(substr($workload, $x, 1));
			sleep(1);
		  }
		  
		  
		  
		print 'sending..';
	}

}
