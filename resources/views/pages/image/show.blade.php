@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('image.show') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('image.index') }}">
                    {{ trans('image.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {{--TODO--}}
            </div>
        </section>
    </div>
@endsection
