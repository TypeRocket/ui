<?php
$root = plugins_url( '/typerocket/wordpress/assets/', TYPEROCKET_PATH );

return [
    /*
    |--------------------------------------------------------------------------
    | Assets
    |--------------------------------------------------------------------------
    |
    | The URL where TypeRocket assets are found.
    |
    */
    'assets' => $root,

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | The URL where TypeRocket component assets are found.
    |
    */
    'components' => $root . '/components',

    /*
    |--------------------------------------------------------------------------
    | Typerocket Assets
    |--------------------------------------------------------------------------
    |
    | The URL where TypeRocket Core assets are found.
    |
    */
    'typerocket' => $root . '/typerocket',
];
