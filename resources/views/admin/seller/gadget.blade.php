@forelse($seller as $key => $val)
<div class="seller-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="seller-gadget-box">
    <p>No Seller</p>
</div>
@endif