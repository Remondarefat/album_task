<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the library. The "public" disk is the most common choice, but
    | you may use any of the disks defined in the "filesystems" config.
    |
    */

    'default_filesystem' => 'public',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disk_names' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],
        // Add additional disk configurations here if needed
    ],

    /*
    |--------------------------------------------------------------------------
    | Media Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the filesystem disk where files associated with media files
    | are stored. By default, it uses the "public" disk, but you can
    | customize it to use any disk defined in the "filesystems" config.
    |
    */

    'media_library_filesystem' => 'public',

    /*
    |--------------------------------------------------------------------------
    | Media File Model
    |--------------------------------------------------------------------------
    |
    | This is the class responsible for storing information about files
    | associated with media files. The default value should be fine
    | in most cases, but you can customize it if necessary.
    |
    */

    'media_model' => Spatie\MediaLibrary\MediaCollections\Models\Media::class,

];
