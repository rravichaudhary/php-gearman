<?php
// DB Tools
/**
 * generate entities from database
 * @return none
 */
function generate_doctrine_entities($em,$path="Entities"){
	
	$em->getConfiguration()
	->setMetadataDriverImpl(
			new DatabaseDriver(
					$this->em->getConnection()->getSchemaManager()
					)
			);
	
	$cmf = new DisconnectedClassMetadataFactory();
	$cmf->setEntityManager($em);
	$metadata = $cmf->getAllMetadata();
	$generator = new EntityGenerator();
	
	$generator->setUpdateEntityIfExists(true);
	$generator->setGenerateStubMethods(true);
	$generator->setGenerateAnnotations(true);
	$generator->generate($metadata, $path);
	
}

function create_update_database($em,$mode="update"){
	
	$tool = new \Doctrine\ORM\Tools\SchemaTool($em);
	
	$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
	$cmf->setEntityManager($em);
	$metadata = $cmf->getAllMetadata();
	
	if($mode == "create"){
		$queries = $tool->getCreateSchemaSql($metadata);
	}
	else{
		$queries = $tool->getUpdateSchemaSql($metadata);
	}
	echo "Total queries: ".count($queries)."<br /><br />";
	for($i=0; $i<count($queries);$i++){
		$em->getConnection()->prepare($queries[$i])->execute();
		echo $queries[$i]."<br /><br />Execution Successful: ".($i+1)."<br /><br />";
	}
}