@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('car.show') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('car.index') }}">
                    {{ trans('car.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {{--TODO--}}
                {{ $car->brand }}
                <br />
                {{ $car->model }}
                <br />
                {{ $car->number }}
            </div>
        </section>
    </div>
@endsection
