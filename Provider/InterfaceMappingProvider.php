<?php

use Frankie\Core\Logger\Logger;
use Frankie\Core\Logger\LoggerInterface;
use Frankie\Core\Provider\InterfaceMapping;
use Frankie\Core\Provider\InterfaceMappingProvider;
use Frankie\Core\Provider\LogExceptionPathProvider;
use Frankie\ExceptionHandler\PathProviderInterface as ExceptionPathProviderInterface;
use Frankie\Request\Request\Request;
use Frankie\Request\Request\RequestInterface;
use Frankie\Response\Response;
use Frankie\Response\ResponseInterface;

$interfaceMappingProvider = new InterfaceMappingProvider();
$interfaceMappingProvider->set(static function() {
    $interfaceMapping = new InterfaceMapping();
    $interfaceMapping->add(RequestInterface::class, Request::class);
    $interfaceMapping->add(ResponseInterface::class, Response::class);
    $interfaceMapping->add(ExceptionPathProviderInterface::class, LogExceptionPathProvider::class);
    $interfaceMapping->add(LoggerInterface::class, Logger::class);

    return $interfaceMapping;
});

return $interfaceMappingProvider;