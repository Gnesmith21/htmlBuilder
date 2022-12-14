<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08ae2c547c529b137c8679700509fadb
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gn\\Htmlbuilder\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gn\\Htmlbuilder\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit08ae2c547c529b137c8679700509fadb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08ae2c547c529b137c8679700509fadb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit08ae2c547c529b137c8679700509fadb::$classMap;

        }, null, ClassLoader::class);
    }
}
