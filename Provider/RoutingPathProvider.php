<?php

use Frankie\Core\AppHelper;
use Frankie\Core\Provider\RoutingPathProvider;

$routingPathProvider = new RoutingPathProvider();

$routingPathProvider->setAdditionalRoutesPath(function() {
    return AppHelper::basePath(sprintf('routing%sadditional.yaml', DIRECTORY_SEPARATOR));
});

$routingPathProvider->setResourceRoutesPath(function() {
    return AppHelper::basePath(sprintf('routing%sresource.yaml', DIRECTORY_SEPARATOR));
});
return $routingPathProvider;