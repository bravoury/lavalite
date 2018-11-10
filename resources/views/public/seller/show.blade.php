            @include('seller::public.seller.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('seller::public.seller.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($seller->defaultImage('images' , 'xl'))!!}" alt="{{$seller->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('seller::seller.label.id') !!}
                </label><br />
                    {!! $seller['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('seller::seller.label.order') !!}
                </label><br />
                    {!! $seller['order'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('seller::seller.label.slug') !!}
                </label><br />
                    {!! $seller['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('seller::seller.label.name') !!}
                </label><br />
                    {!! $seller['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="description">
                    {!! trans('seller::seller.label.description') !!}
                </label><br />
                    {!! $seller['description'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="image">
                    {!! trans('seller::seller.label.image') !!}
                </label><br />
                    {!! $seller['image'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="keywords">
                    {!! trans('seller::seller.label.keywords') !!}
                </label><br />
                    {!! $seller['keywords'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('seller::seller.label.created_at') !!}
                </label><br />
                    {!! $seller['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('seller::seller.label.updated_at') !!}
                </label><br />
                    {!! $seller['updated_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('seller::seller.label.deleted_at') !!}
                </label><br />
                    {!! $seller['deleted_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order')
                       -> label(trans('seller::seller.label.order'))
                       -> placeholder(trans('seller::seller.placeholder.order'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('seller::seller.label.name'))
                       -> placeholder(trans('seller::seller.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('description')
                    -> label(trans('seller::seller.label.description'))
                    -> placeholder(trans('seller::seller.placeholder.description'))!!}
                </div>

                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('seller::seller.label.image') }}
                        </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $seller->files('image')
                            ->url($seller->getUploadUrl('image'))
                            ->mime(config('filer.image_extensions'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                        {!! $seller->files('image')
                        ->editor()!!}
                        </div>
                    </div>
                </div>
                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('keywords')
                    -> label(trans('seller::seller.label.keywords'))
                    -> placeholder(trans('seller::seller.placeholder.keywords'))!!}
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



