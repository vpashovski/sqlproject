@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('car.create') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('car.index') }}">
                    {{ trans('car.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('car.store'),
                    'class' => 'car-form']) !!}
                @include('pages.car._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    {{-- @include('backend.partials.modals.select_image') --}}
    {{-- @include('backend.partials.modals.upload_image') --}}
@endsection