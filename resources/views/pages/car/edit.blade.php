@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('car.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('car.index') }}">
                    {{ trans('car.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($car, ['method' => 'PATCH', 'files' => true,
                    'url' => route('car.update', ['car' => $car]),
                    'class' => 'car-form']) !!}
                @include('pages.car._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    {{-- @include('backend.partials.modals.select_image') --}}
    {{-- @include('backend.partials.modals.upload_image') --}}
@endsection
