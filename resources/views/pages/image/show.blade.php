@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('image.show') }}
                </h3>
                <div class="pull-right btn-group">
                    <a class="btn btn-warning"
                       href="{{ route('image.edit',
                          ['image' => $image->id]) }}">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-primary"
                       href="{{ route('image.index') }}">
                        <i class="fa fa-list"></i> {{ trans('image.index') }}
                    </a>
                </div>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $image->title }}</h3>
                    </div>
                    <div class="panel-body">
                        {!! Html::image($image->url, 'big image') !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
