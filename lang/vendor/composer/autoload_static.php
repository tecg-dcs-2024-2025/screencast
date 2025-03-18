<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8fb1192370760ecf7ff68bdd805372c0
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tecgdcs\\Animal\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tecgdcs\\Animal\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8fb1192370760ecf7ff68bdd805372c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8fb1192370760ecf7ff68bdd805372c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8fb1192370760ecf7ff68bdd805372c0::$classMap;

        }, null, ClassLoader::class);
    }
}
