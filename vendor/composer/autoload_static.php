<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite7d1a0ea2064add1c68b346b980dc899
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Braintree\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Braintree\\' => 
        array (
            0 => __DIR__ . '/..' . '/braintree/braintree_php/lib/Braintree',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Braintree' => 
            array (
                0 => __DIR__ . '/..' . '/braintree/braintree_php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite7d1a0ea2064add1c68b346b980dc899::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite7d1a0ea2064add1c68b346b980dc899::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite7d1a0ea2064add1c68b346b980dc899::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}