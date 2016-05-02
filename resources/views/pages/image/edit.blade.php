@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('image.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('image.index') }}">
                    {{ trans('image.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($image, ['method' => 'PATCH', 'files' => true,
                    'url' => route('image.update', ['image' => $image]),
                    'class' => 'image-form']) !!}
                @include('pages.image._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
