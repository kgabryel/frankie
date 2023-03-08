<?php

use Frankie\Core\Bootstrap\Actions;
use Frankie\Core\App;
use Frankie\Core\Bootstrap\ConnectToDatabase;
use Frankie\Core\Bootstrap\EnableLogger;
use Frankie\Core\Bootstrap\LoadEnv;
use Frankie\Core\Provider\ConfigProvider;
use Frankie\Core\Provider\DataParserProvider;
use Frankie\Core\Provider\InterfaceMapping;
use Frankie\Core\Provider\InterfaceMappingProvider;
use Frankie\Core\Provider\ProvidersRepository;
use Frankie\Core\Provider\RequestProvider;
use Frankie\Core\Provider\ResourceRoutingProvider;
use Frankie\Core\Provider\ResponseFactoryProvider;
use Frankie\Core\Provider\RoutingPathProvider;
use Frankie\Core\Provider\RulesProvider;
use Frankie\Core\Bootstrap\SetDebugMode;

require __DIR__ . '/../vendor/autoload.php';
$providersRepository = new ProvidersRepository();
$providersRepository->register(RulesProvider::class, __DIR__ . '/../Provider/RulesProvider.php');
$providersRepository->register(ResponseFactoryProvider::class, __DIR__ . '/../Provider/ResponseFactoryProvider.php');
$providersRepository->register(ResourceRoutingProvider::class, __DIR__ . '/../Provider/ResourceRoutingProvider.php');
$providersRepository->register(DataParserProvider::class, __DIR__ . '/../Provider/DataParserProvider.php');
$providersRepository->register(InterfaceMappingProvider::class, __DIR__ . '/../Provider/InterfaceMappingProvider.php');
$providersRepository->register(RequestProvider::class, __DIR__ . '/../Provider/RequestProvider.php');
$providersRepository->register(ConfigProvider::class, __DIR__ . '/../Provider/ConfigProvider.php');
$providersRepository->register(RoutingPathProvider::class, __DIR__ . '/../Provider/RoutingPathProvider.php');
$bootstrapActions = new Actions();
$bootstrapActions->addAction(new LoadEnv())
    ->addAction(new SetDebugMode())
    ->addAction(new EnableLogger())
    ->addAction(new ConnectToDatabase());
App::run(
    substr(__DIR__, 0, strlen(__DIR__) - strlen('/public')),
    $providersRepository->get(RoutingPathProvider::class),
    $providersRepository->get(ResponseFactoryProvider::class),
    $providersRepository->get(RequestProvider::class),
    $providersRepository->get(ConfigProvider::class),
    $providersRepository->get(InterfaceMappingProvider::class),
    $providersRepository->get(ResourceRoutingProvider::class),
    $providersRepository->get(DataParserProvider::class),
    $providersRepository->get(RulesProvider::class),
    $bootstrapActions
);