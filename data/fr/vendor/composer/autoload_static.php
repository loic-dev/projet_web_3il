<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita380abea1fd6e1e9790391d64289cbc6
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WebPConvert\\' => 12,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'LocateBinaries\\' => 15,
        ),
        'I' => 
        array (
            'ImageMimeTypeSniffer\\' => 21,
            'ImageMimeTypeGuesser\\' => 21,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
            'FileUtil\\' => 9,
        ),
        'E' => 
        array (
            'ExecWithFallback\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WebPConvert\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/webp-convert/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'LocateBinaries\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/locate-binaries/src',
        ),
        'ImageMimeTypeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/image-mime-type-sniffer/src',
        ),
        'ImageMimeTypeGuesser\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'FileUtil\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/file-util/src',
        ),
        'ExecWithFallback\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/exec-with-fallback/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita380abea1fd6e1e9790391d64289cbc6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita380abea1fd6e1e9790391d64289cbc6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita380abea1fd6e1e9790391d64289cbc6::$classMap;

        }, null, ClassLoader::class);
    }
}
