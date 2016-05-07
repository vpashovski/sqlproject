@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('home.index') }}
                </h3>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('pages.home._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('home.fields.firstname') }}</th>
                        <th>{{ trans('home.fields.lastname') }}</th>
                        <th>{{ trans('home.fields.brand') }}</th>
                        <th>{{ trans('home.fields.model') }}</th>
                        <th>{{ trans('home.fields.number') }}</th>
                        <th>{{ trans('home.fields.in_garage') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($owners_to_cars as $owner_to_car)
                        <tr>
                            <td>{{ $owner_to_car->firstname }}</td>
                            <td>{{ $owner_to_car->lastname }}</td>
                            <td>{{ $owner_to_car->brand }}</td>
                            <td>{{ $owner_to_car->model }}</td>
                            <td>{{ $owner_to_car->number }}</td>
                            <td>
                                @if($owner_to_car->in_garage)
                                    <div class="col-sm-1 text-success">
                                        <i class="fa fa-check"></i>
                                    </div>
                                @else
                                    <div class="col-sm-1 text-danger">
                                        <i class="fa fa-close"></i>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! \App\OwnersToCars::paginate(config('constants.per_page')) !!}
                </div>
            </div>
        </section>
    </div>
@endsection
