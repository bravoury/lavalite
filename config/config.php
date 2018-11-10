<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'shopping',

    /*
     * Package.
     */
    'package'   => 'seller',

    /*
     * Modules.
     */
    'modules'   => ['seller'],

    
    'seller'       => [
        'model' => [
            'model'                 => \Shopping\Seller\Models\Seller::class,
            'table'                 => 'sellers',
            'presenter'             => \Shopping\Seller\Repositories\Presenter\SellerPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'createdat', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'order',  'slug',  'name',  'description',  'image',  'keywords',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'seller/seller',
            'uploads'               => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts'                 => [
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Shopping',
            'package'   => 'Seller',
            'module'    => 'Seller',
        ],

    ],
];
