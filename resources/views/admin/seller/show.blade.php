    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('seller::seller.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#seller-seller-entry' data-href='{{guard_url('seller/seller/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($seller->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#seller-seller-entry' data-href='{{ guard_url('seller/seller') }}/{{$seller->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#seller-seller-entry' data-datatable='#seller-seller-list' data-href='{{ guard_url('seller/seller') }}/{{$seller->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('seller-seller-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('seller/seller'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('seller::seller.name') !!}  [{!! $seller->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('seller::admin.seller.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>