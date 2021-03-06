<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit183f4007ea2bf0e5453db085774594e9
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit183f4007ea2bf0e5453db085774594e9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit183f4007ea2bf0e5453db085774594e9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit183f4007ea2bf0e5453db085774594e9::$classMap;

        }, null, ClassLoader::class);
    }
}
