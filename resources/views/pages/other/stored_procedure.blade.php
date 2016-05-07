@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('other.stored_procedure.index') }}
                </h3>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <div class="filter-form">
                    {!! Form::open(['method' => 'GET']) !!}
                    <div class="form-group">
                        <div class="col-sm-2">
                            {!! Form::text('firstname', Request::input('firstname'),
                            ['class' => 'form-control',
                            'placeholder' => trans('other.stored_procedure.firstname')]) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::submit(trans('common.search'),
                            ['class' => 'btn btn-primary col-sm-12']) !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    {!! Form::close() !!}
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('other.stored_procedure.fields.id') }}</th>
                        <th>{{ trans('other.stored_procedure.fields.firstname') }}</th>
                        <th>{{ trans('other.stored_procedure.fields.lastname') }}</th>
                        <th>{{ trans('other.stored_procedure.fields.email') }}</th>
                        <th>{{ trans('other.stored_procedure.fields.created_at') }}</th>
                        <th>{{ trans('other.stored_procedure.fields.updated_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($results as $result)
                        <tr>
                            <td>{{ $result->id }}</td>
                            <td>{{ $result->firstname }}</td>
                            <td>{{ $result->lastname }}</td>
                            <td>{{ $result->email }}</td>
                            <td>{{ $result->created_at }}</td>
                            <td>{{ $result->updated_at }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-info">
                            {{ trans('other.stored_procedure.error_firstname') }}
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
