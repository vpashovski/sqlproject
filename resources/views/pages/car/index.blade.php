@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('car.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                   href="{{ route('car.create') }}">
                    {{ trans('car.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('pages.car._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('car.fields.brand') }}</th>
                        <th>{{ trans('car.fields.model') }}</th>
                        <th>{{ trans('car.fields.number') }}</th>
                        <th>{{ trans('car.fields.owner') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->number }}</td>
                            <td>{{ $car->owner }}</td>
                            <td>{{ $car->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                   href="{{ route('car.show',
                                    ['car' => $car->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                   href="{{ route('car.edit',
                                    ['car' => $car->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('car.destroy',
                                    ['car' => $car->id]) }}"
                                   data-text="{{ trans('common.destroy_car',
                                   ['number' => $car->number]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $cars->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('partials.modals.destroy')
@endsection
