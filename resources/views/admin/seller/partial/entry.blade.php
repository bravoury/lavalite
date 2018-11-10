            <div class='row'>
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