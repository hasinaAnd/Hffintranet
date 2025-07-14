<?php

require_once 'doctrineBootstrap.php';

$metadata = $entityManager->getMetadataFactory()->getAllMetadata();
$entityManager->getProxyFactory()->generateProxyClasses($metadata);
