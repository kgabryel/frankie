<?php

use Frankie\Config\ConfigRepository;
use Frankie\Core\AppHelper;
use Frankie\Core\Provider\ConfigProvider;
use Frankie\Storage\Storage;

$configProvider = new ConfigProvider();
$configProvider->set(static function() {
    $configRepository = new ConfigRepository();
    $configDirectory = AppHelper::basePath('configs');
    if (Storage::directoryExists($configDirectory)) {
        $configRepository->parseDirectory(Storage::getDirectory($configDirectory));
    }

    return $configRepository;
});

return $configProvider;