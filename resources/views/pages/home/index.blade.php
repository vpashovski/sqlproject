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
