<?php

use Frankie\Core\Provider\ResourceRoutingProvider;
use Frankie\Request\Request\RequestInterface;
use Frankie\Routing\Parser\ResourceRoute;

$resourceRoutingProvider = new ResourceRoutingProvider();
$resourceRoutingProvider->add('findAll', new ResourceRoute('/', 'findAll', RequestInterface::METHOD_GET));
$resourceRoutingProvider->add('find', new ResourceRoute('/{id}', 'find', RequestInterface::METHOD_GET));
$resourceRoutingProvider->add('remove', new ResourceRoute('/{id}', 'remove', RequestInterface::METHOD_DELETE));
$resourceRoutingProvider->add('create', new ResourceRoute('/', 'create', RequestInterface::METHOD_POST, 'create'));
$resourceRoutingProvider->add('update', new ResourceRoute('/{id}', 'update', RequestInterface::METHOD_PUT));
$resourceRoutingProvider->add('partUpdate', new ResourceRoute('/{id}', 'partUpdate', RequestInterface::METHOD_PATCH));

return $resourceRoutingProvider;