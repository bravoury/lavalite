<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for seller in seller package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  seller module in seller package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Seller',
    'names'         => 'Sellers',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Sellers',
        'sub'   => 'Sellers',
        'list'  => 'List of sellers',
        'edit'  => 'Edit seller',
        'create'    => 'Create new seller'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'order'                      => 'Please enter order',
        'slug'                       => 'Please enter slug',
        'name'                       => 'Please enter name',
        'description'                => 'Please enter description',
        'image'                      => 'Please enter image',
        'keywords'                   => 'Please enter keywords',
        'created_at'                 => 'Please select created',
        'updated_at'                 => 'Please select updated',
        'deleted_at'                 => 'Please select deleted',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'order'                      => 'Order',
        'slug'                       => 'Slug',
        'name'                       => 'Name',
        'description'                => 'Description',
        'image'                      => 'Image',
        'keywords'                   => 'Keywords',
        'created_at'                 => 'Created',
        'updated_at'                 => 'Updated',
        'deleted_at'                 => 'Deleted',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'order'                      => ['name' => 'Order', 'data-column' => 1, 'checked'],
        'name'                       => ['name' => 'Name', 'data-column' => 2, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Sellers',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
