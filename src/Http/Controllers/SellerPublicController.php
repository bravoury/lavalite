<?php

namespace Shopping\Seller\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Shopping\Seller\Interfaces\SellerRepositoryInterface;

class SellerPublicController extends BaseController
{
    // use SellerWorkflow;

    /**
     * Constructor.
     *
     * @param type \Shopping\Seller\Interfaces\SellerRepositoryInterface $seller
     *
     * @return type
     */
    public function __construct(SellerRepositoryInterface $seller)
    {
        $this->repository = $seller;
        parent::__construct();
    }

    /**
     * Show seller's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $sellers = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->title(trans('$seller::$seller.names'))
            ->view('$seller::public.seller.index')
            ->data(compact('$sellers'))
            ->output();
    }

    /**
     * Show seller's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $sellers = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->title(trans('$seller::$seller.names'))
            ->view('$seller::public.seller.index')
            ->data(compact('$sellers'))
            ->output();
    }

    /**
     * Show seller.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $seller = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->title($$seller->name . trans('$seller::$seller.name'))
            ->view('$seller::public.seller.show')
            ->data(compact('$seller'))
            ->output();
    }

}
