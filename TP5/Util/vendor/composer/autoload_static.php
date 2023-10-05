<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba1585c17468b3b8ace7df3cebb30966
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        '6849dc9b0ebd4a5e94b1a098400b5c75' => __DIR__ . '/..' . '/nutgram/nutgram/src/Support/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Uala\\' => 5,
        ),
        'S' => 
        array (
            'SergiX44\\Nutgram\\' => 17,
            'SergiX44\\Hydrator\\' => 18,
            'SergiX44\\Container\\' => 19,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'Psr\\Container\\' => 14,
        ),
        'L' => 
        array (
            'Laravel\\SerializableClosure\\' => 28,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Uala\\' => 
        array (
            0 => __DIR__ . '/..' . '/uala-bis/ualabis-php/src/SDK',
        ),
        'SergiX44\\Nutgram\\' => 
        array (
            0 => __DIR__ . '/..' . '/nutgram/nutgram/src',
        ),
        'SergiX44\\Hydrator\\' => 
        array (
            0 => __DIR__ . '/..' . '/nutgram/hydrator/src',
        ),
        'SergiX44\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/sergix44/container/src',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
            1 => __DIR__ . '/..' . '/psr/http-factory/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Laravel\\SerializableClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/laravel/serializable-closure/src',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/macroable',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba1585c17468b3b8ace7df3cebb30966::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba1585c17468b3b8ace7df3cebb30966::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba1585c17468b3b8ace7df3cebb30966::$classMap;

        }, null, ClassLoader::class);
    }
}
