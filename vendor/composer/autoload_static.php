<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit491bb65d3ba70a8551be8cc9860f80b2
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'App\\Core\\Router' => __DIR__ . '/../..' . '/App/Core/Router.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit491bb65d3ba70a8551be8cc9860f80b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit491bb65d3ba70a8551be8cc9860f80b2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit491bb65d3ba70a8551be8cc9860f80b2::$classMap;

        }, null, ClassLoader::class);
    }
}
