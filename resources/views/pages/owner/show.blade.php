@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('owner.show') }}
                </h3>
                <div class="pull-right btn-group">
                    <a class="btn btn-warning"
                       href="{{ route('owner.edit',
                   ['owner' => $owner->id]) }}">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-primary"
                       href="{{ route('owner.index') }}">
                        <i class="fa fa-list"></i> {{ trans('owner.index') }}
                    </a>
                </div>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <div class="col-sm-6">
                    <table class="table table-hover">
                        <tr>
                            <td>{{ trans('owner.firstname') }}</td>
                            <td>{{ $owner->firstname }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('owner.lastname') }}</td>
                            <td>{{ $owner->lastname }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('owner.email') }}</td>
                            <td>{{ $owner->email }}</td>
                        </tr>
                    </table>
                </div>
                <div class="thumbnail col-sm-6">
                    @if($owner->image)
                        {!! Html::image($owner->image->url, 'big image', ['width' => config('constants.image.width'), 'height' => config('constants.image.height')]) !!}
                    @else
                        {!! Html::image('assets/img/no-image.png', 'big image', ['width' => config('constants.image.width'), 'height' => config('constants.image.height')]) !!}
                    @endif
                </div>
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('owner.cars') }}</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{ trans('common.id') }}</th>
                                    <th>{{ trans('common.thumb') }}</th>
                                    <th>{{ trans('car.fields.brand') }}</th>
                                    <th>{{ trans('car.fields.model') }}</th>
                                    <th>{{ trans('car.fields.number') }}</th>
                                    <th>{{ trans('car.fields.in_garage') }}</th>
                                    <th>{{ trans('common.options') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($owner->cars as $car)
                                    <tr>
                                        <td>{{ $car->id }}</td>
                                        <td>
                                            @if($car->image)
                                                {!! Html::image($car->image->url, 'thumb', ['width' => config('constants.thumb.width'), 'height' => config('constants.thumb.height')]) !!}
                                            @else
                                                {!! Html::image('assets/img/no-image.png', 'thumb', ['width' => config('constants.thumb.width'), 'height' => config('constants.thumb.height')]) !!}
                                            @endif
                                        </td>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->number }}</td>
                                        <td>
                                            @if($car->in_garage)
                                                <div class="col-sm-1 text-success">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            @else
                                                <div class="col-sm-1 text-danger">
                                                    <i class="fa fa-close"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                               href="{{ route('car.show',
                                                    ['car' => $car->id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
