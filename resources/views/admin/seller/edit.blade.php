    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#seller" data-toggle="tab">{!! trans('seller::seller.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#seller-seller-edit'  data-load-to='#seller-seller-entry' data-datatable='#seller-seller-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#seller-seller-entry' data-href='{{guard_url('seller/seller')}}/{{$seller->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('seller-seller-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('seller/seller/'. $seller->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="seller">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('seller::seller.name') !!} [{!!$seller->name!!}] </div>
                @include('seller::admin.seller.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>