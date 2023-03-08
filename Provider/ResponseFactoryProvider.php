<?php

use Frankie\Core\Provider\ResponseFactoryProvider;
use Frankie\Response\Factory\JSONFactory;
use Frankie\Response\Factory\XMLFactory;

$responseFactoryProvider = new ResponseFactoryProvider();

$responseFactoryProvider->add('application/json', JSONFactory::class);
$responseFactoryProvider->add('application/xml', XMLFactory::class);

return $responseFactoryProvider;