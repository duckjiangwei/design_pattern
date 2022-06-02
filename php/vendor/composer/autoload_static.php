<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit57631de62f4c0cf9c4c2be802046ea91
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wanzi\\Design\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wanzi\\Design\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit57631de62f4c0cf9c4c2be802046ea91::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit57631de62f4c0cf9c4c2be802046ea91::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit57631de62f4c0cf9c4c2be802046ea91::$classMap;

        }, null, ClassLoader::class);
    }
}