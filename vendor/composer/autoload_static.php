<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9df35623c46b529d7f8cc6d919e7e5f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9df35623c46b529d7f8cc6d919e7e5f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9df35623c46b529d7f8cc6d919e7e5f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9df35623c46b529d7f8cc6d919e7e5f::$classMap;

        }, null, ClassLoader::class);
    }
}
