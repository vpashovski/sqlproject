<div class="filter-form">
    {!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::text('firstname', Request::input('firstname'),
            ['class' => 'form-control',
            'placeholder' => trans('common.firstname')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('lastname', Request::input('lastname'),
            ['class' => 'form-control',
            'placeholder' => trans('common.lastname')]) !!}
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
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
    {!! Form::close() !!}
</div>
