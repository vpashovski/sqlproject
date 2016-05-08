@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('archive.cars.index') }}
                </h3>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('archive.cars.fields.id') }}</th>
                        <th>{{ trans('archive.cars.fields.brand') }}</th>
                        <th>{{ trans('archive.cars.fields.model') }}</th>
                        <th>{{ trans('archive.cars.fields.number') }}</th>
                        <th>{{ trans('archive.cars.fields.in_garage') }}</th>
                        <th>{{ trans('archive.cars.fields.created_at') }}</th>
                        <th>{{ trans('archive.cars.fields.updated_at') }}</th>
                        <th>{{ trans('archive.cars.fields.deleted_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($car_archives as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
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
                            <td>{{ $car->created_at }}</td>
                            <td>{{ $car->updated_at }}</td>
                            <td>{{ $car->deleted_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! \App\CarArchive::paginate(config('constants.per_page')) !!}
                </div>
            </div>
        </section>
    </div>
    @include('partials.modals.destroy')
@endsection
