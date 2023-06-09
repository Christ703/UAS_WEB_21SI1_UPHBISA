<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fafecde6b9c5b6a9620e7548edb0d25
{
    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Upload' => 
            array (
                0 => __DIR__ . '/..' . '/codeguy/upload/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit0fafecde6b9c5b6a9620e7548edb0d25::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0fafecde6b9c5b6a9620e7548edb0d25::$classMap;

        }, null, ClassLoader::class);
    }
}
