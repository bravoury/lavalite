<?php

namespace Shopping\Seller\Repositories\Eloquent;

use Shopping\Seller\Interfaces\SellerRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class SellerRepository extends BaseRepository implements SellerRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('shopping.seller.seller.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('shopping.seller.seller.model.model');
    }
}
