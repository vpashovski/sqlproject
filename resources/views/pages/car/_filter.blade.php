<div class="filter-form">
    {!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('brand', Request::input('brand'),
            ['class' => 'form-control',
            'placeholder' => trans('common.brand')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('model', Request::input('model'),
            ['class' => 'form-control',
            'placeholder' => trans('common.model')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('number', Request::input('number'),
            ['class' => 'form-control',
            'placeholder' => trans('common.number')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('owner_id', Request::input('owner_id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.owner')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
    {!! Form::close() !!}
</div>
