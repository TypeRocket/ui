<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd064852c5d8fbcf78fb94f0815d2abfa
{
    public static $files = array (
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TypeRocket\\' => 11,
        )
    );

    public static $prefixDirsPsr4 = array (
        'TypeRocket\\' => 
        array (
            0 => __DIR__ . '/..' . '/typerocket/core/src',
        )
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php'
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd064852c5d8fbcf78fb94f0815d2abfa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd064852c5d8fbcf78fb94f0815d2abfa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd064852c5d8fbcf78fb94f0815d2abfa::$classMap;

        }, null, ClassLoader::class);
    }
}
