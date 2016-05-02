@foreach($images as $image)
    <div class="col-sm-6 thumbnail option" data-image_id="{{ $image->id }}">
        {!! Html::image($image->url, $image->title) !!}<br />
        <p><span class="label label-default">{{ $image->title }}</span></p>
    </div>
@endforeach
<div class="ajax-pagination text-center">
    {!! $images->appends(Request::all())->render() !!}
</div>
