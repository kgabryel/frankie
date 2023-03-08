<?php

namespace App;

use Composer\Installer\PackageEvent;

class Installer
{
    public static function postInstall(PackageEvent $event): void
    {
        $event->stopPropagation();
        $name = $event->getOperation()->getPackage()->getName();
        if (str_starts_with($name, 'frankie/')) {
            $installClass = ucwords($name, '/') . '/Installer';
            $installClass = str_replace('/', '\\', $installClass);
            if (!class_exists($installClass)) {
                return;
            }
            $class = new \ReflectionClass($installClass);
            if (method_exists($installClass, 'install')) {
                $method = $class->getMethod('install');
                if ($method->isStatic() && $method->isPublic()) {
                    $installClass::install();
                }
            }
        }
    }
}