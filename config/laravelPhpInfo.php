<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel PHP Info settings
    |--------------------------------------------------------------------------
    */

    // The parent blade file
    'laravelPhpInfoBladeExtended'   => 'layouts.admin', // 'laravelusers::layouts.app' // 'blog.app',

    // Enable `auth` middleware
    'authEnabled'                   => true,

    // Enable Optional Roles Middleware
    'rolesEnabled'                  => true,

    // Optional Roles Middleware
    'rolesMiddlware'                => 'permission:perms.super.admin',

    // Switch Between bootstrap 3 `panel` and bootstrap 4 `card` classes
    'bootstapVersion'               => '4',

    // Additional Card classes for styling -
    // See: https://getbootstrap.com/docs/4.0/components/card/#background-and-color
    // Example classes: 'text-white bg-primary mb-3'
    'bootstrapCardClasses'          => 'mb-3',

    // Inline CSS
    'usePHPinfoCSS'                 => true,

];
