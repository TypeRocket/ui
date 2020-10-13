<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Extensions
    |--------------------------------------------------------------------------
    |
    | The class names of the TypeRocket extensions you wish to enable.
    |
    */
    'extensions' => [
        '\TypeRocket\Extensions\TypeRocketUI',
        '\TypeRocket\Extensions\PostMessages',
    ],

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Services you want loaded into the container as singletons. You can also
    | create your own services. TypeRocket some with the following builtin:
    |
    |    - \App\Services\AuthService
    |
    */
    'services' => [
        /*
         * Application Service Providers...
         */
        '\TR_UI\Services\AuthService',
    ],

    /*
    |--------------------------------------------------------------------------
    | Front-end
    |--------------------------------------------------------------------------
    |
    | Require TypeRocket on the front-end.
    |
    */
    'frontend' => false,

    /*
    |--------------------------------------------------------------------------
    | Debug
    |--------------------------------------------------------------------------
    |
    | Turn on Debugging for TypeRocket. Set to false to disable.
    |
    */
    'debug' => false,

    /*
    |--------------------------------------------------------------------------
    | Seed
    |--------------------------------------------------------------------------
    |
    | A 'random' string of text to help with security from time to time.
    |
    */
    'seed' => 'seed_5f84fd5bbdb85',

    /*
    |--------------------------------------------------------------------------
    | Class Overrides
    |--------------------------------------------------------------------------
    |
    | Set the classes to use as the default for helper functions.
    |
    */
    'class' => [
        'form' => '\TR_UI\Elements\Form',
    ],

    /*
    |--------------------------------------------------------------------------
    | Template Engine
    |--------------------------------------------------------------------------
    |
    | The template engine used to build views for the front-end and admin.
    |
    | Pro Only:
    |    - \TypeRocket\Template\TachyonTemplateEngine
    |    - \TypeRocket\Template\TwigTemplateEngine
    |
    */
    'templates' => [
        'views' => '\TypeRocket\Template\TemplateEngine',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rooting
    |--------------------------------------------------------------------------
    |
    | The templates to use for the TypeRocket theme. Must be using TypeRocket
    | as root for this feature to work.
    |
    */
    'root' => [
        'wordpress' => 'wordpress',
        'themes' => [
            'override' => false,
            'flush' => false,
            'theme' => 'templates',
            'stylesheet' => 'theme/theme.css',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Reporting
    |--------------------------------------------------------------------------
    */
    'report' => [
        'error' => '\TypeRocket\Utility\ExceptionReport'
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Handling
    |--------------------------------------------------------------------------
    */
    'errors' => [
        /*
        |--------------------------------------------------------------------------
        | Pro Only - Whoops PHP
        |--------------------------------------------------------------------------
        |
        | Use Whoops PHP when TypeRocket debugging is enabled.
        |
        */
        'whoops' => false,

        /*
        |--------------------------------------------------------------------------
        | Throw Errors
        |--------------------------------------------------------------------------
        |
        | TypeRocket defines an error handler function that throws \ErrorException.
        | You can disable this functionality but it may impact the template error
        | system that allows you to define 500.php theme templates.
        |
        | @link https://www.php.net/manual/en/function.set-error-handler.php
        |
        | Recommended Levels: `E_ALL` or `E_ERROR | E_PARSE`
        |
        */
        'throw' => false,
        'level' => E_ERROR | E_PARSE
    ]
];