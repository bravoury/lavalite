<?php

namespace Shopping\Seller\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class SellerTransformer extends TransformerAbstract
{
    public function transform(\Shopping\Seller\Models\Seller $seller)
    {
        return [
            'id'                => $seller->getRouteKey(),
            'key'               => [
                'public'    => $seller->getPublicKey(),
                'route'     => $seller->getRouteKey(),
            ], 
            'id'                => $seller->id,
            'order'             => $seller->order,
            'slug'              => $seller->slug,
            'name'              => $seller->name,
            'description'       => $seller->description,
            'image'             => $seller->image,
            'keywords'          => $seller->keywords,
            'created_at'        => $seller->created_at,
            'updated_at'        => $seller->updated_at,
            'deleted_at'        => $seller->deleted_at,
            'url'               => [
                'public'    => trans_url('seller/'.$seller->getPublicKey()),
                'user'      => guard_url('seller/seller/'.$seller->getRouteKey()),
            ], 
            'status'            => trans('app.'.$seller->status),
            'created_at'        => format_date($seller->created_at),
            'updated_at'        => format_date($seller->updated_at),
        ];
    }
}