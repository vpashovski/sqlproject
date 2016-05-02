<div class="form-group">
    <div class="thumbnail col-sm-12 selected-image">
        <a id="remove-selected-image" href="javascript:void(0);" class="close">
            &#10006;
        </a>
        @if(isset($record) && $record->image)
            {!! Html::image($record->image->url, 'selected image') !!}
        @else
            {!! Html::image('assets/img/no-image.png', 'selected image') !!}
        @endif
    </div>
    <div class="form-group col-sm-6">
        <a href="#selectImageModal" data-toggle="modal" class="btn btn-info col-sm-12">
            <i class="fa fa-image"></i> {{ trans('common.select_image') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="form-group col-sm-6">
        <a href="#uploadImageModal" data-toggle="modal" class="btn btn-info col-sm-12">
            <i class="fa fa-upload"></i> {{ trans('common.upload_image') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
{!! Form::hidden('image_id', (isset($record) && $record->image) ? $record->image_id : '') !!}
