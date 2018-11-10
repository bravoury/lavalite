<?php

namespace Shopping;

use DB;
use Illuminate\Database\Seeder;

class SellerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sellers')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'seller.seller.view',
                'name'      => 'View Seller',
            ],
            [
                'slug'      => 'seller.seller.create',
                'name'      => 'Create Seller',
            ],
            [
                'slug'      => 'seller.seller.edit',
                'name'      => 'Update Seller',
            ],
            [
                'slug'      => 'seller.seller.delete',
                'name'      => 'Delete Seller',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/seller/seller',
                'name'        => 'Seller',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/seller/seller',
                'name'        => 'Seller',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'seller',
                'name'        => 'Seller',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Seller',
                'module'    => 'Seller',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'seller.seller.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
