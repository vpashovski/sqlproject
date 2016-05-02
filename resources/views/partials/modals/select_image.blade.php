<div aria-hidden="true" role="dialog" tabindex="-1"
     id="selectImageModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">{{ trans('common.modal.select_image') }}</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    {!! Form::open(['method' => 'get', 'id' => 'select-image-form',
                        'url' => route('image.index')]) !!}
                    <div class="form-group">
                        <div class="col-sm-3">
                            {!! Form::text('id', null,
                            ['class' => 'form-control',
                            'placeholder' => trans('common.id')]) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::text('title', null,
                            ['class' => 'form-control',
                            'placeholder' => trans('common.title')]) !!}
                        </div>
                        {!! Form::hidden('page', 1) !!}
                        <a id="select-image-form-submit-btn"
                           class="btn btn-primary col-sm-3"
                           href="javascript:void(0);">
                            {!! trans('common.search') !!}
                        </a>
                    </div>
                    {!! Form::close() !!}
                    <div id="select-image-results"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
