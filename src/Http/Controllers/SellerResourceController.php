<?php

namespace Shopping\Seller\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Shopping\Seller\Http\Requests\SellerRequest;
use Shopping\Seller\Interfaces\SellerRepositoryInterface;
use Shopping\Seller\Models\Seller;

/**
 * Resource controller class for seller.
 */
class SellerResourceController extends BaseController
{

    /**
     * Initialize seller resource controller.
     *
     * @param type SellerRepositoryInterface $seller
     *
     * @return null
     */
    public function __construct(SellerRepositoryInterface $seller)
    {
        parent::__construct();
        $this->repository = $seller;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Shopping\Seller\Repositories\Criteria\SellerResourceCriteria::class);
    }

    /**
     * Display a list of seller.
     *
     * @return Response
     */
    public function index(SellerRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Shopping\Seller\Repositories\Presenter\SellerPresenter::class)
                ->$function();
        }

        $sellers = $this->repository->paginate();

        return $this->response->title(trans('seller::seller.names'))
            ->view('seller::seller.index', true)
            ->data(compact('sellers'))
            ->output();
    }

    /**
     * Display seller.
     *
     * @param Request $request
     * @param Model   $seller
     *
     * @return Response
     */
    public function show(SellerRequest $request, Seller $seller)
    {

        if ($seller->exists) {
            $view = 'seller::seller.show';
        } else {
            $view = 'seller::seller.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('seller::seller.name'))
            ->data(compact('seller'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new seller.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(SellerRequest $request)
    {

        $seller = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('seller::seller.name')) 
            ->view('seller::seller.create', true) 
            ->data(compact('seller'))
            ->output();
    }

    /**
     * Create new seller.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(SellerRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $seller                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('seller::seller.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('seller/seller/' . $seller->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/seller/seller'))
                ->redirect();
        }

    }

    /**
     * Show seller for editing.
     *
     * @param Request $request
     * @param Model   $seller
     *
     * @return Response
     */
    public function edit(SellerRequest $request, Seller $seller)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('seller::seller.name'))
            ->view('seller::seller.edit', true)
            ->data(compact('seller'))
            ->output();
    }

    /**
     * Update the seller.
     *
     * @param Request $request
     * @param Model   $seller
     *
     * @return Response
     */
    public function update(SellerRequest $request, Seller $seller)
    {
        try {
            $attributes = $request->all();

            $seller->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('seller::seller.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('seller/seller/' . $seller->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('seller/seller/' . $seller->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the seller.
     *
     * @param Model   $seller
     *
     * @return Response
     */
    public function destroy(SellerRequest $request, Seller $seller)
    {
        try {

            $seller->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('seller::seller.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('seller/seller/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('seller/seller/' . $seller->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple seller.
     *
     * @param Model   $seller
     *
     * @return Response
     */
    public function delete(SellerRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('seller::seller.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('seller/seller'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/seller/seller'))
                ->redirect();
        }

    }

    /**
     * Restore deleted sellers.
     *
     * @param Model   $seller
     *
     * @return Response
     */
    public function restore(SellerRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('seller::seller.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/seller/seller'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/seller/seller/'))
                ->redirect();
        }

    }

}
