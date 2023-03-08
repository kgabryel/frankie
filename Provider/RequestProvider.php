<?php

use Frankie\Core\Provider\RequestProvider;
use Frankie\Request\Request\Request;

$requestProvider = new RequestProvider();
$requestProvider->set(static fn() => Request::createFromGlobal());

return $requestProvider;