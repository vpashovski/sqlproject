<div class="filter-form">
    {!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
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
        <div class="col-sm-3">
            {!! Form::text('email', Request::input('email'),
            ['class' => 'form-control',
            'placeholder' => trans('common.email')]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
    {!! Form::close() !!}
</div>
