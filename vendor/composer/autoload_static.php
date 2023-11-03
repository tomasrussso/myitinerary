<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc44e5ff7d841df87c4b4453313636016
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc44e5ff7d841df87c4b4453313636016::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc44e5ff7d841df87c4b4453313636016::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc44e5ff7d841df87c4b4453313636016::$classMap;

        }, null, ClassLoader::class);
    }
}